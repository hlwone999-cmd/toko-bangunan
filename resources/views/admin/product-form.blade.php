@extends('admin.layout')

@section('title', isset($product) ? 'Edit Produk' : 'Tambah Produk')

@section('admin-content')
{{-- Breadcrumb -->}
<nav class="flex items-center gap-2 text-sm text-on-surface-variant mb-md">
    <a href="{{ route('admin.inventory') }}" class="hover:text-primary transition-colors flex items-center gap-1">
        <span class="material-symbols-outlined text-lg">arrow_back</span>
        Inventaris
    </a>
    <span class="material-symbols-outlined text-outline text-lg">chevron_right</span>
    <span class="text-on-surface font-medium">{{ isset($product) ? 'Edit Produk' : 'Tambah Produk Baru' }}</span>
</nav>

{{-- Header -->}
<div class="mb-lg">
    <h1 class="font-headline-lg text-headline-lg text-on-surface">{{ isset($product) ? 'Edit Produk' : 'Tambah Produk Baru' }}</h1>
    <p class="font-body-lg text-body-lg text-on-surface-variant mt-xs">{{ isset($product) ? 'Perbarui informasi produk di bawah ini.' : 'Isi detail produk untuk ditambahkan ke katalog.' }}</p>
</div>

{{-- Form -->}
<form method="POST" action="{{ isset($product) ? route('admin.products.update', $product) : route('admin.products.store') }}" class="grid grid-cols-1 lg:grid-cols-12 gap-md">
    @csrf
    @if(isset($product))
        @method('PUT')
    @endif

    {{-- Left Column: Main Info -->}
    <div class="lg:col-span-8 flex flex-col gap-md">
        {{-- Product Info Card -->}
        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md">
            <h2 class="font-headline-md text-headline-md font-bold text-on-surface mb-md flex items-center gap-sm">
                <span class="material-symbols-outlined text-primary">inventory_2</span>
                Informasi Produk
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                {{-- Name -->}
                <div class="md:col-span-2">
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1.5 font-medium">Nama Produk <span class="text-error">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}" required
                        class="w-full bg-[#F1F5F9] border border-transparent rounded-lg px-4 py-3 text-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-colors outline-none"
                        placeholder="cth: Semen Portland Tipe I 50kg"/>
                    @error('name')
                    <p class="text-error text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- SKU -->}
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1.5 font-medium">SKU <span class="text-error">*</span></label>
                    <input type="text" name="sku" value="{{ old('sku', $product->sku ?? '') }}" required
                        class="w-full bg-[#F1F5F9] border border-transparent rounded-lg px-4 py-3 text-body-md font-label-caps focus:border-primary focus:ring-1 focus:ring-primary transition-colors outline-none"
                        placeholder="BP-SMN-001"/>
                    @error('sku')
                    <p class="text-error text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Brand -->}
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1.5 font-medium">Merek</label>
                    <input type="text" name="brand" value="{{ old('brand', $product->brand ?? '') }}"
                        class="w-full bg-[#F1F5F9] border border-transparent rounded-lg px-4 py-3 text-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-colors outline-none"
                        placeholder="cth: Holcim, Tiga Roda"/>
                </div>

                {{-- Category -->}
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1.5 font-medium">Kategori <span class="text-error">*</span></label>
                    <select name="category" required
                        class="w-full bg-[#F1F5F9] border border-transparent rounded-lg px-4 py-3 text-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-colors outline-none">
                        <option value="" disabled {{ empty(old('category', $product->category ?? '')) ? 'selected' : '' }}>Pilih Kategori</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ (old('category', $product->category ?? '') === $cat) ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <p class="text-error text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Unit -->}
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1.5 font-medium">Satuan <span class="text-error">*</span></label>
                    <select name="unit" required
                        class="w-full bg-[#F1F5F9] border border-transparent rounded-lg px-4 py-3 text-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-colors outline-none">
                        <option value="sak" {{ old('unit', $product->unit ?? '') === 'sak' ? 'selected' : '' }}>Sak (40/50kg)</option>
                        <option value="kg" {{ old('unit', $product->unit ?? '') === 'kg' ? 'selected' : '' }}>Kilogram</option>
                        <option value="liter" {{ old('unit', $product->unit ?? '') === 'liter' ? 'selected' : '' }}>Liter</option>
                        <option value="pcs" {{ old('unit', $product->unit ?? '') === 'pcs' ? 'selected' : '' }}>Pcs</option>
                        <option value="set" {{ old('unit', $product->unit ?? '') === 'set' ? 'selected' : '' }}>Set</option>
                        <option value="meter" {{ old('unit', $product->unit ?? '') === 'meter' ? 'selected' : '' }}>Meter</option>
                        <option value="roll" {{ old('unit', $product->unit ?? '') === 'roll' ? 'selected' : '' }}>Roll</option>
                        <option value="unit" {{ old('unit', $product->unit ?? '') === 'unit' ? 'selected' : '' }}>Unit</option>
                    </select>
                    @error('unit')
                    <p class="text-error text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Description -->}
                <div class="md:col-span-2">
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1.5 font-medium">Deskripsi</label>
                    <textarea name="description" rows="4"
                        class="w-full bg-[#F1F5F9] border border-transparent rounded-lg px-4 py-3 text-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-colors outline-none resize-y"
                        placeholder="Deskripsi lengkap produk...">{{ old('description', $product->description ?? '') }}</textarea>
                </div>
            </div>
        </div>

        {{-- Media & Specs Card -->}
        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md">
            <h2 class="font-headline-md text-headline-md font-bold text-on-surface mb-md flex items-center gap-sm">
                <span class="material-symbols-outlined text-primary">image</span>
                Media & Spesifikasi
            </h2>

            <div class="flex flex-col gap-5">
                {{-- Image URL -->}
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1.5 font-medium">URL Gambar Utama</label>
                    <input type="url" name="image_url" value="{{ old('image_url', $product->image_url ?? '') }}"
                        class="w-full bg-[#F1F5F9] border border-transparent rounded-lg px-4 py-3 text-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-colors outline-none"
                        placeholder="https://example.com/image.jpg"/>
                    @error('image_url')
                    <p class="text-error text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Additional Images (JSON) -->}
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1.5 font-medium">URL Gambar Tambahan (JSON)</label>
                    <textarea name="images" rows="2"
                        class="w-full bg-[#F1F5F9] border border-transparent rounded-lg px-4 py-3 text-body-md font-label-caps text-sm focus:border-primary focus:ring-1 focus:ring-primary transition-colors outline-none resize-y"
                        placeholder='["https://url1.jpg", "https://url2.jpg"]'>{{ old('images', isset($product) && $product->images ? json_encode($product->images) : '') }}</textarea>
                    <p class="text-xs text-on-surface-variant mt-1">Format: JSON array berisi URL gambar</p>
                </div>

                {{-- Specifications (JSON) -->}
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1.5 font-medium">Spesifikasi (JSON)</label>
                    <textarea name="specifications" rows="5"
                        class="w-full bg-[#F1F5F9] border border-transparent rounded-lg px-4 py-3 text-body-md font-label-caps text-sm focus:border-primary focus:ring-1 focus:ring-primary transition-colors outline-none resize-y"
                        placeholder='[{"label": "Berat", "value": "50 kg"}]'>{{ old('specifications', isset($product) && $product->specifications ? json_encode($product->specifications, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) : '') }}</textarea>
                    <p class="text-xs text-on-surface-variant mt-1">Format: JSON array of objects dengan key "label" dan "value"</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Right Column: Pricing & Stock -->}
    <div class="lg:col-span-4 flex flex-col gap-md">
        {{-- Pricing Card -->}
        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md">
            <h2 class="font-headline-md text-headline-md font-bold text-on-surface mb-md flex items-center gap-sm">
                <span class="material-symbols-outlined text-primary">payments</span>
                Harga & Stok
            </h2>

            <div class="flex flex-col gap-5">
                {{-- Price -->}
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1.5 font-medium">Harga (Rp) <span class="text-error">*</span></label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 font-label-caps text-label-caps text-on-surface-variant">Rp</span>
                        <input type="number" name="price" value="{{ old('price', $product->price ?? '') }}" required min="0"
                            class="w-full bg-[#F1F5F9] border border-transparent rounded-lg pl-10 pr-4 py-3 text-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-colors outline-none"
                            placeholder="65000"/>
                    </div>
                    @error('price')
                    <p class="text-error text-sm mt-1">{{ $message }}</p>
                    @enderror
                    @if(isset($product))
                    <p class="text-xs text-on-surface-variant mt-1">Harga saat ini: {{ $product->price_display }}</p>
                    @endif
                </div>

                {{-- Stock Status -->}
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1.5 font-medium">Status Stok <span class="text-error">*</span></label>
                    <select name="stock_status" required
                        class="w-full bg-[#F1F5F9] border border-transparent rounded-lg px-4 py-3 text-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-colors outline-none">
                        @foreach($stockStatuses as $status)
                            @php
                                $labels = ['in_stock' => 'Tersedia', 'low_stock' => 'Stok Terbatas', 'special_order' => 'Pre-Order'];
                            @endphp
                            <option value="{{ $status }}" {{ old('stock_status', $product->stock_status ?? '') === $status ? 'selected' : '' }}>{{ $labels[$status] }}</option>
                        @endforeach
                    </select>
                    @error('stock_status')
                    <p class="text-error text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Stock Quantity -->}
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1.5 font-medium">Jumlah Stok</label>
                    <input type="number" name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity ?? 0) }}" min="0"
                        class="w-full bg-[#F1F5F9] border border-transparent rounded-lg px-4 py-3 text-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-colors outline-none"
                        placeholder="0"/>
                </div>
            </div>
        </div>

        {{-- Actions Card -->}
        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md">
            <div class="flex flex-col gap-3">
                <button type="submit" class="w-full bg-primary text-on-primary font-label-sm text-label-sm font-bold py-3 rounded-lg hover:bg-primary-container transition-colors flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined">{{ isset($product) ? 'save' : 'add_circle' }}</span>
                    {{ isset($product) ? 'Simpan Perubahan' : 'Tambah Produk' }}
                </button>
                <a href="{{ route('admin.inventory') }}" class="w-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm font-medium py-3 rounded-lg hover:bg-surface-container-high transition-colors flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined">cancel</span>
                    Batal
                </a>
            </div>
        </div>

        {{-- Danger Zone (edit only) -->}
        @if(isset($product))
        <div class="bg-surface-container-lowest border border-error/20 rounded-xl p-md">
            <h3 class="font-label-sm text-label-sm font-bold text-error mb-sm flex items-center gap-1">
                <span class="material-symbols-outlined text-lg">warning</span>
                Zona Berbahaya
            </h3>
            <p class="text-sm text-on-surface-variant mb-sm">Menghapus produk tidak dapat dibatalkan.</p>
            <form method="POST" action="{{ route('admin.products.destroy', $product) }}" onsubmit="return confirm('Yakin hapus produk ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full border border-error text-error font-label-sm text-label-sm font-bold py-2.5 rounded-lg hover:bg-error hover:text-on-error transition-colors flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined">delete</span>
                    Hapus Produk
                </button>
            </form>
        </div>
        @endif
    </div>
</form>
@endsection
