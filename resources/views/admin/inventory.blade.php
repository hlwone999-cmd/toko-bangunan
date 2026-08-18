@extends('admin.layout')

@section('title', 'Inventaris')

@section('admin-content')
{{-- Page Header --}}
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4">
    <div>
        <h2 class="font-headline-lg text-headline-lg text-on-surface md:text-[32px] md:leading-[40px]">Inventory Management</h2>
        <p class="font-body-md text-body-md text-on-surface-variant mt-xs">Kelola stok, harga, dan kategorisasi hardware.</p>
    </div>
    <a href="{{ route('admin.products.create') }}" class="bg-[#F97316] text-on-primary px-6 py-3 rounded-lg font-bold text-label-sm text-label-sm flex items-center hover:shadow-sm transition-shadow whitespace-nowrap">
        <span class="material-symbols-outlined mr-2">add_circle</span>
        Tambah Produk Baru
    </a>
</div>

{{-- Filters --}}
<form method="GET" action="{{ route('admin.inventory') }}" class="bg-surface-container-lowest border border-outline-variant rounded-lg p-md flex flex-wrap gap-4 items-end mt-md">
    <div class="flex-1 min-w-[200px]">
        <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Cari Produk</label>
        <div class="relative">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">search</span>
            <input class="w-full bg-[#F1F5F9] border border-transparent rounded-lg pl-10 pr-4 py-2.5 text-body-md focus:border-primary focus:ring-0 transition-colors" placeholder="Cari nama, SKU..." type="text" name="search" value="{{ request('search') }}"/>
        </div>
    </div>
    <div class="min-w-[160px]">
        <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Kategori</label>
        <select class="w-full bg-[#F1F5F9] border border-transparent rounded-lg px-4 py-2.5 text-body-md focus:border-primary focus:ring-0 transition-colors" name="category">
            <option value="all" {{ request('category', 'all') == 'all' ? 'selected' : '' }}>Semua</option>
            @foreach(['Building Materials', 'Tools & Equipment', 'Paint & Finishes', 'Plumbing', 'Electrical', 'Roofing'] as $cat)
            <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
            @endforeach
        </select>
    </div>
    <div class="min-w-[140px]">
        <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Status Stok</label>
        <select class="w-full bg-[#F1F5F9] border border-transparent rounded-lg px-4 py-2.5 text-body-md focus:border-primary focus:ring-0 transition-colors" name="stock_status">
            <option value="all" {{ request('stock_status', 'all') == 'all' ? 'selected' : '' }}>Semua</option>
            <option value="in_stock" {{ request('stock_status') == 'in_stock' ? 'selected' : '' }}>Tersedia</option>
            <option value="low_stock" {{ request('stock_status') == 'low_stock' ? 'selected' : '' }}>Stok Terbatas</option>
            <option value="special_order" {{ request('stock_status') == 'special_order' ? 'selected' : '' }}>Pre-Order</option>
        </select>
    </div>
    <div class="flex gap-2">
        <button type="submit" class="bg-surface border-[1.5px] border-primary text-primary px-4 py-2.5 rounded-lg font-bold text-label-sm text-label-sm flex items-center hover:bg-surface-container transition-colors">
            <span class="material-symbols-outlined mr-1">filter_list</span>
            Filter
        </button>
        <a href="{{ route('admin.inventory') }}" class="bg-surface border border-outline-variant text-on-surface-variant px-4 py-2.5 rounded-lg font-bold text-label-sm text-label-sm flex items-center hover:bg-surface-container transition-colors">
            <span class="material-symbols-outlined mr-1">refresh</span>
            Reset
        </a>
    </div>
</form>

{{-- Desktop Table --}}
<div class="hidden md:block bg-surface-container-lowest border border-outline-variant rounded-lg overflow-hidden mt-md">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-surface border-b border-outline-variant text-on-surface-variant font-label-caps text-label-caps uppercase tracking-wider">
                <th class="py-4 px-6 font-semibold">Produk</th>
                <th class="py-4 px-6 font-semibold">SKU</th>
                <th class="py-4 px-6 font-semibold">Kategori</th>
                <th class="py-4 px-6 font-semibold">Status</th>
                <th class="py-4 px-6 font-semibold text-right">Harga (Rp)</th>
                <th class="py-4 px-6 font-semibold text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-outline-variant text-body-md">
            @foreach($products as $product)
            @php
                $stockBadge = match($product->stock_status) {
                    'in_stock' => ['text' => 'Tersedia', 'bg' => 'bg-[#DEF7EC]', 'textColor' => 'text-[#03543F]'],
                    'low_stock' => ['text' => 'Stok Terbatas', 'bg' => 'bg-[#FEF3C7]', 'textColor' => 'text-[#92400E]'],
                    'special_order' => ['text' => 'Pre-Order', 'bg' => 'bg-surface-container', 'textColor' => 'text-primary'],
                    default => ['text' => '-', 'bg' => 'bg-surface-container', 'textColor' => 'text-on-surface-variant'],
                };
            @endphp
            <tr class="hover:bg-surface transition-colors group">
                <td class="py-4 px-6">
                    <div class="flex items-center space-x-4">
                        @if($product->image_url)
                        <div class="w-12 h-12 rounded border border-outline-variant overflow-hidden flex-shrink-0 bg-white">
                            <img alt="{{ $product->name }}" class="w-full h-full object-contain p-1" src="{{ $product->image_url }}"/>
                        </div>
                        @else
                        <div class="w-12 h-12 rounded border border-outline-variant overflow-hidden flex-shrink-0 bg-surface-container flex items-center justify-center">
                            <span class="material-symbols-outlined text-outline-variant">construction</span>
                        </div>
                        @endif
                        <div>
                            <p class="font-semibold text-on-surface">{{ $product->name }}</p>
                            <p class="text-sm text-on-surface-variant">{{ Str::limit($product->description ?? '', 40) }}</p>
                        </div>
                    </div>
                </td>
                <td class="py-4 px-6 font-label-caps text-label-caps text-on-surface-variant">{{ $product->sku }}</td>
                <td class="py-4 px-6 text-on-surface-variant">{{ $product->category }}</td>
                <td class="py-4 px-6">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold {{ $stockBadge['bg'] }} {{ $stockBadge['textColor'] }}">
                        {{ $stockBadge['text'] }}
                    </span>
                </td>
                <td class="py-4 px-6 text-right font-bold text-primary">{{ number_format($product->price, 0, ',', '.') }}</td>
                <td class="py-4 px-6">
                    <div class="flex justify-center space-x-1 opacity-0 group-hover:opacity-100 transition-opacity">
                        <a href="{{ route('admin.products.edit', $product) }}" class="p-2 text-on-surface-variant hover:text-primary rounded hover:bg-surface-container transition-colors" title="Edit">
                            <span class="material-symbols-outlined">edit</span>
                        </a>
                        <form method="POST" action="{{ route('admin.products.destroy', $product) }}" onsubmit="return confirm('Yakin hapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 text-on-surface-variant hover:text-error rounded hover:bg-error-container transition-colors" title="Hapus">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="bg-surface px-6 py-4 border-t border-outline-variant flex items-center justify-between">
        <span class="text-on-surface-variant font-label-sm text-label-sm">Menampilkan {{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }} dari {{ $products->total() }} entri</span>
        <div class="flex space-x-1">
            {{ $products->appends(request()->query())->links() }}
        </div>
    </div>
</div>

{{-- Mobile Card View --}}
<div class="md:hidden mt-md flex flex-col gap-3">
    @foreach($products as $product)
    @php
        $stockBadge = match($product->stock_status) {
            'in_stock' => ['text' => 'Tersedia', 'bg' => 'bg-[#DEF7EC]', 'textColor' => 'text-[#03543F]'],
            'low_stock' => ['text' => 'Stok Terbatas', 'bg' => 'bg-[#FEF3C7]', 'textColor' => 'text-[#92400E]'],
            'special_order' => ['text' => 'Pre-Order', 'bg' => 'bg-surface-container', 'textColor' => 'text-primary'],
            default => ['text' => '-', 'bg' => 'bg-surface-container', 'textColor' => 'text-on-surface-variant'],
        };
    @endphp
    <div class="bg-surface-container-lowest border border-outline-variant rounded-lg p-4">
        <div class="flex gap-3">
            @if($product->image_url)
            <div class="w-16 h-16 rounded border border-outline-variant overflow-hidden flex-shrink-0 bg-white">
                <img alt="{{ $product->name }}" class="w-full h-full object-contain p-1" src="{{ $product->image_url }}"/>
            </div>
            @else
            <div class="w-16 h-16 rounded border border-outline-variant overflow-hidden flex-shrink-0 bg-surface-container flex items-center justify-center">
                <span class="material-symbols-outlined text-outline-variant">construction</span>
            </div>
            @endif
            <div class="flex-1 min-w-0">
                <div class="flex justify-between items-start">
                    <p class="font-semibold text-on-surface text-sm truncate pr-2">{{ $product->name }}</p>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold flex-shrink-0 {{ $stockBadge['bg'] }} {{ $stockBadge['textColor'] }}">
                        {{ $stockBadge['text'] }}
                    </span>
                </div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mt-0.5">{{ $product->sku }}</p>
                <div class="flex justify-between items-center mt-2">
                    <span class="text-xs text-on-surface-variant">{{ $product->category }}</span>
                    <span class="font-bold text-primary text-sm">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>
        <div class="flex gap-2 mt-3 pt-3 border-t border-outline-variant/50">
            <a href="{{ route('admin.products.edit', $product) }}" class="flex-1 text-center py-2 border border-outline-variant rounded-lg text-on-surface-variant text-sm font-medium hover:border-primary hover:text-primary transition-colors flex items-center justify-center gap-1">
                <span class="material-symbols-outlined text-base">edit</span> Edit
            </a>
            <form method="POST" action="{{ route('admin.products.destroy', $product) }}" onsubmit="return confirm('Yakin hapus produk ini?')" class="flex-1">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full py-2 border border-error/30 rounded-lg text-error text-sm font-medium hover:bg-error hover:text-on-error transition-colors flex items-center justify-center gap-1">
                    <span class="material-symbols-outlined text-base">delete</span> Hapus
                </button>
            </form>
        </div>
    </div>
    @endforeach

    {{-- Mobile Pagination --}}
    <div class="bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 flex flex-col items-center gap-2">
        <span class="text-on-surface-variant font-label-sm text-label-sm text-sm">{{ $products->total() }} produk</span>
        {{ $products->appends(request()->query())->links() }}
    </div>
</div>
@endsection