@extends('layouts.app')

@section('title', 'Katalog Produk')

@section('main-class', 'flex-grow max-w-7xl mx-auto w-full px-margin-mobile md:px-margin-desktop py-lg')

@section('content')
<div class="md:pt-0 pt-4">
    <div class="flex flex-col md:flex-row gap-gutter">
        {{-- Sidebar Filters (Desktop) --}}
        <aside class="hidden md:block w-64 flex-shrink-0 space-y-md">
            <div>
                <h3 class="font-headline-md text-headline-md mb-sm">Kategori</h3>
                <ul class="space-y-xs">
                    <li>
                        <label class="flex items-center gap-sm cursor-pointer">
                            <input class="rounded text-primary focus:ring-primary border-outline-variant bg-surface" type="checkbox" name="category[]" value="Building Materials" {{ request('category') == 'Building Materials' ? 'checked' : '' }} onchange="this.form.submit()"/>
                            <span class="font-body-md text-body-md text-on-surface">Bahan Bangunan</span>
                        </label>
                    </li>
                    <li>
                        <label class="flex items-center gap-sm cursor-pointer">
                            <input class="rounded text-primary focus:ring-primary border-outline-variant bg-surface" type="checkbox" name="category[]" value="Tools & Equipment" {{ request('category') == 'Tools & Equipment' ? 'checked' : '' }} onchange="this.form.submit()"/>
                            <span class="font-body-md text-body-md text-on-surface">Alat & Peralatan</span>
                        </label>
                    </li>
                    <li>
                        <label class="flex items-center gap-sm cursor-pointer">
                            <input class="rounded text-primary focus:ring-primary border-outline-variant bg-surface" type="checkbox" name="category[]" value="Paint & Finishes" {{ request('category') == 'Paint & Finishes' ? 'checked' : '' }} onchange="this.form.submit()"/>
                            <span class="font-body-md text-body-md text-on-surface">Cat & Finishing</span>
                        </label>
                    </li>
                    <li>
                        <label class="flex items-center gap-sm cursor-pointer">
                            <input class="rounded text-primary focus:ring-primary border-outline-variant bg-surface" type="checkbox" name="category[]" value="Plumbing" {{ request('category') == 'Plumbing' ? 'checked' : '' }} onchange="this.form.submit()"/>
                            <span class="font-body-md text-body-md text-on-surface">Plumbing</span>
                        </label>
                    </li>
                </ul>
            </div>
            <hr class="border-outline-variant"/>
            <div>
                <h3 class="font-headline-md text-headline-md mb-sm">Rentang Harga</h3>
                <form action="{{ route('catalog') }}" method="GET" class="flex items-center gap-sm">
                    <input class="w-full rounded-lg border-outline-variant bg-surface focus:border-primary focus:ring-primary text-body-md h-10 px-sm" placeholder="Min" type="number" name="min_price" value="{{ request('min_price') }}"/>
                    <span class="text-on-surface-variant">-</span>
                    <input class="w-full rounded-lg border-outline-variant bg-surface focus:border-primary focus:ring-primary text-body-md h-10 px-sm" placeholder="Max" type="number" name="max_price" value="{{ request('max_price') }}"/>
                    <button type="submit" class="text-primary hover:text-secondary transition-colors">
                        <span class="material-symbols-outlined">filter_alt</span>
                    </button>
                </form>
            </div>
            <hr class="border-outline-variant"/>
            <div>
                <h3 class="font-headline-md text-headline-md mb-sm">Merek</h3>
                <ul class="space-y-xs">
                    <li>
                        <label class="flex items-center gap-sm cursor-pointer">
                            <input class="rounded text-primary focus:ring-primary border-outline-variant bg-surface" type="checkbox" name="brand[]" value="Semen Indonesia" {{ request('brand') == 'Semen Indonesia' ? 'checked' : '' }} onchange="this.form.submit()"/>
                            <span class="font-body-md text-body-md text-on-surface">Semen Indonesia</span>
                        </label>
                    </li>
                    <li>
                        <label class="flex items-center gap-sm cursor-pointer">
                            <input class="rounded text-primary focus:ring-primary border-outline-variant bg-surface" type="checkbox" name="brand[]" value="Dulux" {{ request('brand') == 'Dulux' ? 'checked' : '' }} onchange="this.form.submit()"/>
                            <span class="font-body-md text-body-md text-on-surface">Dulux</span>
                        </label>
                    </li>
                    <li>
                        <label class="flex items-center gap-sm cursor-pointer">
                            <input class="rounded text-primary focus:ring-primary border-outline-variant bg-surface" type="checkbox" name="brand[]" value="Roman Ceramics" {{ request('brand') == 'Roman Ceramics' ? 'checked' : '' }} onchange="this.form.submit()"/>
                            <span class="font-body-md text-body-md text-on-surface">Roman Ceramics</span>
                        </label>
                    </li>
                </ul>
            </div>
        </aside>

        {{-- Product Grid --}}
        <div class="flex-grow">
            <div class="flex justify-between items-center mb-md">
                <h1 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-background">Katalog</h1>
                <div class="flex items-center gap-sm">
                    <span class="font-label-sm text-label-sm text-on-surface-variant hidden sm:inline">Urutkan:</span>
                    <form action="{{ route('catalog') }}" method="GET" class="flex items-center gap-sm">
                        @foreach(request()->except('sort') as $key => $value)
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}"/>
                        @endforeach
                        <select class="rounded-lg border-outline-variant bg-surface focus:border-primary focus:ring-primary font-body-md text-body-md h-10" name="sort" onchange="this.form.submit()">
                            <option value="relevance" {{ request('sort', 'relevance') == 'relevance' ? 'selected' : '' }}>Relevansi</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Harga: Rendah ke Tinggi</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Harga: Tinggi ke Rendah</option>
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Terbaru</option>
                        </select>
                    </form>
                </div>
            </div>

            {{-- Mobile Filter Bar --}}
            <div class="md:hidden flex gap-2 mb-md overflow-x-auto pb-2">
                <button id="mobile-filter-btn" class="flex items-center gap-1 px-sm py-2 rounded-lg border border-outline-variant bg-surface-container-lowest text-on-surface-variant text-label-sm whitespace-nowrap shrink-0">
                    <span class="material-symbols-outlined text-[18px]">filter_list</span> Filter
                </button>
                <a href="{{ route('catalog') }}" class="flex items-center gap-1 px-sm py-2 rounded-lg border border-outline-variant bg-surface-container-lowest text-on-surface-variant text-label-sm whitespace-nowrap shrink-0">
                    <span class="material-symbols-outlined text-[18px]">refresh</span> Reset
                </a>
            </div>

            {{-- Mobile Filter Panel --}}
            <div id="mobile-filter-panel" class="md:hidden hidden bg-surface-container-lowest border border-outline-variant rounded-xl p-md mb-md space-y-md">
                <div>
                    <h3 class="font-label-sm font-bold text-on-surface mb-sm">Kategori</h3>
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ route('catalog', array_merge(request()->query(), ['category' => 'Building Materials'])) }}" class="px-sm py-1 rounded-full text-label-sm border {{ request('category') == 'Building Materials' ? 'border-primary bg-primary text-on-primary' : 'border-outline-variant text-on-surface-variant' }}">Bahan Bangunan</a>
                        <a href="{{ route('catalog', array_merge(request()->query(), ['category' => 'Tools & Equipment'])) }}" class="px-sm py-1 rounded-full text-label-sm border {{ request('category') == 'Tools & Equipment' ? 'border-primary bg-primary text-on-primary' : 'border-outline-variant text-on-surface-variant' }}">Alat & Peralatan</a>
                        <a href="{{ route('catalog', array_merge(request()->query(), ['category' => 'Paint & Finishes'])) }}" class="px-sm py-1 rounded-full text-label-sm border {{ request('category') == 'Paint & Finishes' ? 'border-primary bg-primary text-on-primary' : 'border-outline-variant text-on-surface-variant' }}">Cat & Finishing</a>
                    </div>
                </div>
                <div>
                    <h3 class="font-label-sm font-bold text-on-surface mb-sm">Merek</h3>
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ route('catalog', array_merge(request()->query(), ['brand' => 'Semen Indonesia'])) }}" class="px-sm py-1 rounded-full text-label-sm border {{ request('brand') == 'Semen Indonesia' ? 'border-primary bg-primary text-on-primary' : 'border-outline-variant text-on-surface-variant' }}">Semen Indonesia</a>
                        <a href="{{ route('catalog', array_merge(request()->query(), ['brand' => 'Dulux'])) }}" class="px-sm py-1 rounded-full text-label-sm border {{ request('brand') == 'Dulux' ? 'border-primary bg-primary text-on-primary' : 'border-outline-variant text-on-surface-variant' }}">Dulux</a>
                        <a href="{{ route('catalog', array_merge(request()->query(), ['brand' => 'Roman Ceramics'])) }}" class="px-sm py-1 rounded-full text-label-sm border {{ request('brand') == 'Roman Ceramics' ? 'border-primary bg-primary text-on-primary' : 'border-outline-variant text-on-surface-variant' }}">Roman Ceramics</a>
                    </div>
                </div>
            </div>

            @if($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-gutter">
                @foreach($products as $product)
                <div class="bg-surface-container-lowest border border-outline-variant rounded-lg overflow-hidden group hover:shadow-lift hover:border-primary transition-all duration-200 flex flex-col h-full">
                    <a href="{{ route('product.show', $product->slug) }}" class="h-48 relative bg-surface-container flex items-center justify-center p-sm block">
                        @if($product->image_url)
                            <img class="object-contain h-full w-full" src="{{ $product->image_url }}" alt="{{ $product->name }}"/>
                        @else
                            <div class="w-full h-full bg-surface-container flex items-center justify-center">
                                <span class="material-symbols-outlined text-outline-variant text-[64px]">construction</span>
                            </div>
                        @endif
                        @php
                            $badgeClass = match($product->stock_status) {
                                'in_stock' => 'bg-[#14532D] text-white',
                                'low_stock' => 'bg-secondary-container text-white',
                                'special_order' => 'bg-primary-container text-white',
                                default => 'bg-outline text-on-surface'
                            };
                            $badgeText = match($product->stock_status) {
                                'in_stock' => 'Tersedia',
                                'low_stock' => 'Stok Terbatas',
                                'special_order' => 'Pre-Order',
                                default => ''
                            };
                        @endphp
                        <div class="absolute top-sm right-sm {{ $badgeClass }} px-2 py-1 rounded-full font-label-caps text-label-caps">{{ $badgeText }}</div>
                    </a>
                    <div class="p-sm flex flex-col flex-grow">
                        <span class="font-label-caps text-label-caps text-on-surface-variant mb-xs">{{ $product->sku }}</span>
                        <a href="{{ route('product.show', $product->slug) }}">
                            <h2 class="font-headline-md text-headline-md text-on-surface mb-xs flex-grow hover:text-primary transition-colors">{{ $product->name }}</h2>
                        </a>
                        <div class="font-headline-md text-headline-md text-primary mb-sm">{{ $product->price_display }}</div>
                        <button class="w-full bg-[#F97316] text-white font-label-sm text-label-sm font-bold py-2 px-4 rounded hover:bg-[#EA580C] transition-colors flex items-center justify-center gap-xs">
                            <span class="material-symbols-outlined text-[18px]">add_shopping_cart</span>
                            Tambah ke Keranjang
                        </button>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-lg flex justify-center">
                {{ $products->appends(request()->query())->links() }}
            </div>
            @else
            <div class="text-center py-xl">
                <span class="material-symbols-outlined text-outline-variant text-[64px] block mb-md">search_off</span>
                <h3 class="font-headline-md text-headline-md text-on-surface mb-xs">Produk Tidak Ditemukan</h3>
                <p class="font-body-md text-body-md text-on-surface-variant">Coba ubah filter atau kata kunci pencarian Anda.</p>
                <a href="{{ route('catalog') }}" class="inline-block mt-md bg-primary-container text-on-primary font-label-sm px-md py-sm rounded hover:bg-primary transition-colors">Reset Filter</a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    document.getElementById('mobile-filter-btn')?.addEventListener('click', () => {
        document.getElementById('mobile-filter-panel').classList.toggle('hidden');
    });
</script>
@endpush