<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Authentication (Simple Session-Based)
    |--------------------------------------------------------------------------
    | Default: admin / admin123
    | In production, replace with Laravel Breeze, Jetstream, or Sanctum.
    */

    public function loginForm()
    {
        if (session('admin_authenticated')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Simple hardcoded check — replace with real auth in production
        $validUsername = env('ADMIN_USERNAME', 'admin');
        $validPassword = env('ADMIN_PASSWORD', 'admin123');

        if ($credentials['username'] === $validUsername && $credentials['password'] === $validPassword) {
            session(['admin_authenticated' => true, 'admin_user' => $credentials['username']]);
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput($request->only('username'));
    }

    public function logout()
    {
        session()->forget(['admin_authenticated', 'admin_user']);
        return redirect()->route('admin.login')->with('success', 'Berhasil logout.');
    }

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    */

    public function dashboard()
    {
        $todaySales = Order::whereDate('created_at', today())->where('status', '!=', 'cancelled')->sum('total_amount');
        $totalSales = Order::where('status', '!=', 'cancelled')->sum('total_amount');
        $newOrders = Order::where('status', 'pending')->count();
        $lowStock = Product::where('stock_status', 'low_stock')->count();
        $totalProducts = Product::count();
        $recentOrders = Order::latest()->take(5)->get();

        return view('admin.dashboard', compact('todaySales', 'totalSales', 'newOrders', 'lowStock', 'totalProducts', 'recentOrders'));
    }

    /*
    |--------------------------------------------------------------------------
    | Orders
    */

    public function orders(Request $request)
    {
        $query = Order::query();

        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $query->where('order_id', 'like', '%' . $request->search . '%')
                ->orWhere('customer_name', 'like', '%' . $request->search . '%');
        }

        $orders = $query->latest()->paginate(10)->withQueryString();
        $totalOrders = Order::count();
        $pendingCount = Order::where('status', 'pending')->count();

        return view('admin.orders', compact('orders', 'totalOrders', 'pendingCount'));
    }

    public function updateOrderStatus(Request $request, Order $order)
    {
        $request->validate(['status' => 'required|in:pending,processing,completed,cancelled']);
        $order->update(['status' => $request->status]);
        return back()->with('success', 'Status pesanan berhasil diperbarui.');
    }

    /*
    |--------------------------------------------------------------------------
    | Inventory / Products CRUD
    */

    public function inventory(Request $request)
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('sku', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        if ($request->filled('stock_status') && $request->stock_status !== 'all') {
            $query->where('stock_status', $request->stock_status);
        }

        $products = $query->latest()->paginate(10)->withQueryString();
        $categories = Product::distinct()->pluck('category')->toArray();

        return view('admin.inventory', compact('products', 'categories'));
    }

    public function createProduct()
    {
        $categories = ['Building Materials', 'Tools & Equipment', 'Paint & Finishes', 'Plumbing', 'Electrical', 'Roofing'];
        $stockStatuses = ['in_stock', 'low_stock', 'special_order'];
        return view('admin.product-form', compact('categories', 'stockStatuses'));
    }

    public function storeProduct(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'sku'           => 'required|string|max:50|unique:products,sku',
            'description'   => 'nullable|string',
            'category'      => 'required|string|max:100',
            'brand'         => 'nullable|string|max:100',
            'price'         => 'required|integer|min:0',
            'unit'          => 'required|string|max:50',
            'stock_status'  => 'required|in:in_stock,low_stock,special_order',
            'stock_quantity'=> 'nullable|integer|min:0',
            'image_url'     => 'nullable|url|max:500',
            'images'        => 'nullable|string',
            'specifications'=> 'nullable|string',
        ]);

        // Auto-generate slug
        $validated['slug'] = Str::slug($validated['name']);
        $validated['price_display'] = 'Rp ' . number_format($validated['price'], 0, ',', '.');

        // Parse JSON fields
        if (!empty($validated['images'])) {
            $decoded = json_decode($validated['images'], true);
            $validated['images'] = is_array($decoded) ? $decoded : [$validated['images']];
        }
        if (!empty($validated['specifications'])) {
            $decoded = json_decode($validated['specifications'], true);
            $validated['specifications'] = is_array($decoded) ? $decoded : [];
        }

        Product::create($validated);

        return redirect()->route('admin.inventory')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function editProduct(Product $product)
    {
        $categories = ['Building Materials', 'Tools & Equipment', 'Paint & Finishes', 'Plumbing', 'Electrical', 'Roofing'];
        $stockStatuses = ['in_stock', 'low_stock', 'special_order'];
        return view('admin.product-form', compact('product', 'categories', 'stockStatuses'));
    }

    public function updateProduct(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'sku'           => 'required|string|max:50|unique:products,sku,' . $product->id,
            'description'   => 'nullable|string',
            'category'      => 'required|string|max:100',
            'brand'         => 'nullable|string|max:100',
            'price'         => 'required|integer|min:0',
            'unit'          => 'required|string|max:50',
            'stock_status'  => 'required|in:in_stock,low_stock,special_order',
            'stock_quantity'=> 'nullable|integer|min:0',
            'image_url'     => 'nullable|url|max:500',
            'images'        => 'nullable|string',
            'specifications'=> 'nullable|string',
        ]);

        // Auto-generate slug
        $validated['slug'] = Str::slug($validated['name']);
        $validated['price_display'] = 'Rp ' . number_format($validated['price'], 0, ',', '.');

        // Parse JSON fields
        if (!empty($validated['images'])) {
            $decoded = json_decode($validated['images'], true);
            $validated['images'] = is_array($decoded) ? $decoded : [$validated['images']];
        } else {
            $validated['images'] = null;
        }
        if (!empty($validated['specifications'])) {
            $decoded = json_decode($validated['specifications'], true);
            $validated['specifications'] = is_array($decoded) ? $decoded : [];
        } else {
            $validated['specifications'] = null;
        }

        $product->update($validated);

        return redirect()->route('admin.inventory')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroyProduct(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Produk berhasil dihapus.');
    }

    /*
    |--------------------------------------------------------------------------
    | Settings
    */

    public function settings()
    {
        return view('admin.settings');
    }
}
