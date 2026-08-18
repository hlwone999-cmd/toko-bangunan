@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="md:pt-0 pt-4 pb-24 md:pb-0">
<div class="max-w-7xl mx-auto w-full px-margin-mobile md:px-margin-desktop py-lg grid grid-cols-1 md:grid-cols-12 gap-gutter">

    {{-- Breadcrumbs --}}
    <div class="md:col-span-12 flex items-center gap-xs font-label-sm text-label-sm text-on-surface-variant mb-md">
        <a class="hover:text-primary transition-colors" href="{{ route('catalog') }}">Katalog</a>
        <span class="material-symbols-outlined text-sm">chevron_right</span>
        <a class="hover:text-primary transition-colors" href="{{ route('catalog', ['category' => $product->category]) }}">{{ $product->category }}</a>
        <span class="material-symbols-outlined text-sm">chevron_right</span>
        <span class="text-on-surface font-semibold">{{ $product->name }}</span>
    </div>

    {{-- Product Image Gallery (Left) --}}
    <div class="md:col-span-7 flex flex-col gap-sm">
        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md flex items-center justify-center h-[400px] md:h-[500px] relative overflow-hidden group">
            @php
                $badgeClass = match($product->stock_status) {
                    'in_stock' => 'bg-secondary text-on-secondary',
                    'low_stock' => 'bg-[#F97316] text-white',
                    'special_order' => 'bg-primary-container text-on-primary',
                    default => 'bg-outline text-on-surface'
                };
                $badgeText = match($product->stock_status) {
                    'in_stock' => 'Tersedia',
                    'low_stock' => 'Stok Terbatas',
                    'special_order' => 'Pre-Order',
                    default => ''
                };
            @endphp
            <span class="absolute top-md left-md {{ $badgeClass }} font-label-caps text-label-caps px-sm py-xs rounded-full z-10 flex items-center gap-xs">
                <span class="w-2 h-2 rounded-full bg-current opacity-50"></span> {{ $badgeText }}
            </span>
            @if($product->image_url)
                <img id="main-product-image" class="object-contain w-full h-full max-h-[350px] md:max-h-[450px] transition-transform duration-500 group-hover:scale-105" src="{{ $product->image_url }}" alt="{{ $product->name }}"/>
            @else
                <span class="material-symbols-outlined text-outline-variant text-[120px]">construction</span>
            @endif
        </div>
        @if($product->images && count($product->images) > 0)
        <div class="grid grid-cols-4 gap-sm">
            <button class="bg-surface-container-lowest border-2 border-primary-container rounded-lg p-xs h-20 md:h-24 flex items-center justify-center opacity-100 transition-opacity" onclick="document.getElementById('main-product-image').src='{{ $product->image_url }}'">
                @if($product->image_url)
                    <img class="object-contain w-full h-full" src="{{ $product->image_url }}" alt="{{ $product->name }}"/>
                @endif
            </button>
            @foreach($product->images as $i => $img)
            <button class="bg-surface-container-lowest border border-outline-variant hover:border-primary-container rounded-lg p-xs h-20 md:h-24 flex items-center justify-center opacity-70 hover:opacity-100 transition-opacity" onclick="document.getElementById('main-product-image').src='{{ $img }}'">
                <img class="object-contain w-full h-full" src="{{ $img }}" alt="{{ $product->name }} foto {{ $i + 2 }}"/>
            </button>
            @endforeach
        </div>
        @endif
    </div>

    {{-- Product Details (Right) --}}
    <div class="md:col-span-5 flex flex-col gap-md">
        <div>
            <span class="font-label-caps text-label-caps text-on-surface-variant block mb-xs">SKU: {{ $product->sku }}</span>
            <h1 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg font-bold text-on-surface mb-sm">{{ $product->name }}</h1>
            <p class="font-body-md text-body-md text-on-surface-variant">
                {{ $product->description }}
            </p>
        </div>
        <div class="border-t border-b border-outline-variant py-md my-xs">
            <div class="flex items-baseline gap-sm mb-xs">
                <span class="font-headline-lg text-headline-lg font-bold text-primary-container">{{ $product->price_display }}</span>
                <span class="font-body-md text-body-md text-on-surface-variant">/ {{ $product->unit }}</span>
            </div>
            <div class="font-label-sm text-label-sm text-on-surface-variant flex items-center gap-xs">
                <span class="material-symbols-outlined text-sm">local_shipping</span>
                Memenuhi syarat pengiriman palet.
            </div>
        </div>

        {{-- Quantity & Actions --}}
        <div class="flex flex-col gap-sm">
            <label class="font-label-sm text-label-sm text-on-surface" for="quantity">Jumlah</label>
            <div class="flex items-center gap-sm">
                <div class="flex items-center bg-surface-container-lowest border border-outline-variant rounded-lg overflow-hidden h-12 w-32 focus-within:border-primary-container transition-colors">
                    <button type="button" class="w-10 h-full flex items-center justify-center text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors" onclick="let i=document.getElementById('quantity');i.value=Math.max(1,parseInt(i.value||1)-1);">
                        <span class="material-symbols-outlined">remove</span>
                    </button>
                    <input class="w-full text-center border-none focus:ring-0 font-body-md text-body-md text-on-surface p-0 bg-transparent" id="quantity" min="1" type="number" value="1"/>
                    <button type="button" class="w-10 h-full flex items-center justify-center text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors" onclick="let i=document.getElementById('quantity');i.value=parseInt(i.value||1)+1;">
                        <span class="material-symbols-outlined">add</span>
                    </button>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-sm mt-sm">
                <button class="flex-1 bg-[#F97316] hover:bg-[#EA580C] text-white font-body-md text-body-md font-bold py-sm px-md rounded-lg flex items-center justify-center gap-xs transition-colors shadow-sm">
                    <span class="material-symbols-outlined">shopping_cart</span>
                    Tambah ke Keranjang
                </button>
                <a href="https://wa.me/6281234567890?text={{ urlencode('Halo, saya ingin memesan ' . $product->name) }}" target="_blank" class="flex-1 bg-[#25D366] hover:bg-[#1DA851] text-white font-body-md text-body-md font-bold py-sm px-md rounded-lg flex items-center justify-center gap-xs transition-colors">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"></path>
                    </svg>
                    Pesan via WhatsApp
                </a>
            </div>
        </div>

        {{-- Trust Badges --}}
        <div class="grid grid-cols-2 gap-sm mt-sm">
            <div class="flex items-center gap-xs text-on-surface-variant font-label-sm text-label-sm bg-surface-container-low p-sm rounded border border-outline-variant">
                <span class="material-symbols-outlined text-primary-container">verified</span>
                Kualitas Bersertifikat SNI
            </div>
            <div class="flex items-center gap-xs text-on-surface-variant font-label-sm text-label-sm bg-surface-container-low p-sm rounded border border-outline-variant">
                <span class="material-symbols-outlined text-primary-container">warehouse</span>
                Siap Diambil di Toko
            </div>
        </div>
    </div>

    {{-- Technical Specifications Table --}}
    @if($product->specifications && count($product->specifications) > 0)
    <div class="md:col-span-12 mt-xl">
        <h2 class="font-headline-md text-headline-md font-bold text-on-surface mb-md pb-xs border-b border-outline-variant">Spesifikasi Teknis</h2>
        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden shadow-sm">
            @foreach($product->specifications as $i => $spec)
            <div class="grid grid-cols-1 md:grid-cols-4 border-b border-outline-variant last:border-b-0">
                <div class="{{ $i % 2 === 0 ? 'bg-surface-container-low' : 'bg-surface-container-lowest' }} p-md font-label-sm text-label-sm text-on-surface-variant font-medium md:col-span-1 border-r-0 md:border-r border-outline-variant">
                    {{ $spec['label'] }}
                </div>
                <div class="p-md font-label-caps text-label-caps text-on-surface md:col-span-3 {{ $i % 2 === 0 ? '' : 'bg-surface-bright' }}">
                    {{ $spec['value'] }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Related Products --}}
    @if($related->count() > 0)
    <div class="md:col-span-12 mt-xl mb-lg">
        <h2 class="font-headline-md text-headline-md font-bold text-on-surface mb-md">Sering Dibeli Bersama</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
            @foreach($related as $rel)
            <a href="{{ route('product.show', $rel->slug) }}" class="group block bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden hover:border-primary-container hover:shadow-lift transition-all duration-300">
                <div class="h-48 bg-surface-container p-md flex items-center justify-center relative">
                    @if($rel->image_url)
                        <img class="object-contain h-full mix-blend-darken" src="{{ $rel->image_url }}" alt="{{ $rel->name }}"/>
                    @else
                        <span class="material-symbols-outlined text-outline-variant text-[64px]">construction</span>
                    @endif
                </div>
                <div class="p-md">
                    <span class="font-label-caps text-label-caps text-outline block mb-xs">{{ $rel->sku }}</span>
                    <h3 class="font-body-lg text-body-lg font-bold text-on-surface group-hover:text-primary-container transition-colors line-clamp-1">{{ $rel->name }}</h3>
                    <div class="mt-sm flex justify-between items-center">
                        <span class="font-headline-md text-headline-md font-semibold text-primary-container">{{ $rel->price_display }}</span>
                        <span class="material-symbols-outlined text-outline-variant group-hover:text-primary-container transition-colors">arrow_forward</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endif

</div>
</div>
@endsection