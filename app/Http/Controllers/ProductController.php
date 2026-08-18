<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function catalog(Request $request)
    {
        $query = Product::query();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', (int) str_replace(['.', ','], '', $request->min_price));
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', (int) str_replace(['.', ','], '', $request->max_price));
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $sort = $request->get('sort', 'relevance');
        match ($sort) {
            'price_asc' => $query->orderBy('price', 'asc'),
            'price_desc' => $query->orderBy('price', 'desc'),
            'newest' => $query->orderBy('created_at', 'desc'),
            default => $query->orderBy('name', 'asc'),
        };

        $products = $query->paginate(12)->withQueryString();
        $categories = Product::distinct()->pluck('category');
        $brands = Product::distinct()->pluck('brand');

        return view('products.catalog', compact('products', 'categories', 'brands'));
    }

    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $related = Product::where('category', $product->category)
            ->where('id', '!=', $product->id)
            ->take(3)
            ->get();

        return view('products.detail', compact('product', 'related'));
    }
}
