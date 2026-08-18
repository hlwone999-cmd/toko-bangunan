@extends('admin.layout')

@section('title', 'Pengaturan')

@section('admin-content')
<div class="mb-lg">
    <h1 class="font-headline-lg text-headline-lg text-on-surface">Pengaturan</h1>
    <p class="font-body-lg text-body-lg text-on-surface-variant mt-xs">Kelola profil, preferensi, dan konfigurasi sistem.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">
    {{-- Profile Card }}
    <div class="md:col-span-4">
        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md flex flex-col items-center text-center">
            <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-surface mb-sm relative group cursor-pointer bg-primary-container flex items-center justify-center">
                <span class="text-on-primary font-headline-lg text-headline-lg">AD</span>
                <div class="absolute inset-0 bg-inverse-surface/50 hidden group-hover:flex items-center justify-center transition-all rounded-full">
                    <span class="material-symbols-outlined text-surface">photo_camera</span>
                </div>
            </div>
            <h2 class="font-headline-md text-headline-md text-on-surface mb-xs">Admin BuildPro</h2>
            <p class="font-body-md text-body-md text-on-surface-variant mb-lg font-label-caps text-label-caps uppercase bg-surface-container px-sm py-xs rounded-full">Warehouse Manager</p>
            <div class="w-full h-px bg-outline-variant mb-md"></div>
            <div class="w-full flex flex-col gap-sm text-left mb-lg">
                <div>
                    <span class="font-label-sm text-label-sm text-outline block">Email</span>
                    <span class="font-body-md text-body-md text-on-surface">admin@buildpro.co.id</span>
                </div>
                <div>
                    <span class="font-label-sm text-label-sm text-outline block">Lokasi</span>
                    <span class="font-body-md text-body-md text-on-surface">Central Warehouse Hub, Jkt</span>
                </div>
            </div>
            <button class="w-full bg-surface-container-lowest border-2 border-primary text-primary font-label-sm text-label-sm font-bold py-sm rounded-lg hover:bg-surface-container-low transition-colors duration-200">
                Ubah Profil
            </button>
        </div>
    </div>

    {{-- Settings Menu }}
    <div class="md:col-span-8 flex flex-col gap-sm">
        <a class="group bg-surface-container-lowest border border-outline-variant rounded-xl p-md flex items-center justify-between hover:shadow-sm hover:border-primary transition-all duration-200 cursor-pointer" href="#">
            <div class="flex items-center gap-md">
                <div class="w-12 h-12 rounded-lg bg-surface-container-low flex items-center justify-center text-primary group-hover:bg-primary-container group-hover:text-on-primary-container transition-colors">
                    <span class="material-symbols-outlined">storefront</span>
                </div>
                <div>
                    <h3 class="font-headline-md text-body-lg font-semibold text-on-surface">Informasi Toko</h3>
                    <p class="font-body-md text-label-sm text-on-surface-variant mt-1">Kelola detail toko, jam operasional, dan lokasi.</p>
                </div>
            </div>
            <span class="material-symbols-outlined text-outline group-hover:text-primary transition-colors">chevron_right</span>
        </a>

        <a class="group bg-surface-container-lowest border border-outline-variant rounded-xl p-md flex items-center justify-between hover:shadow-sm hover:border-primary transition-all duration-200 cursor-pointer" href="#">
            <div class="flex items-center gap-md">
                <div class="w-12 h-12 rounded-lg bg-surface-container-low flex items-center justify-center text-primary group-hover:bg-primary-container group-hover:text-on-primary-container transition-colors">
                    <span class="material-symbols-outlined">payments</span>
                </div>
                <div>
                    <h3 class="font-headline-md text-body-lg font-semibold text-on-surface">Metode Pembayaran</h3>
                    <p class="font-body-md text-label-sm text-on-surface-variant mt-1">Konfigurasi gateway pembayaran dan rekening bank.</p>
                </div>
            </div>
            <span class="material-symbols-outlined text-outline group-hover:text-primary transition-colors">chevron_right</span>
        </a>

        <a class="group bg-surface-container-lowest border border-outline-variant rounded-xl p-md flex items-center justify-between hover:shadow-sm hover:border-primary transition-all duration-200 cursor-pointer" href="#">
            <div class="flex items-center gap-md">
                <div class="w-12 h-12 rounded-lg bg-surface-container-low flex items-center justify-center text-primary group-hover:bg-primary-container group-hover:text-on-primary-container transition-colors">
                    <span class="material-symbols-outlined">local_shipping</span>
                </div>
                <div>
                    <h3 class="font-headline-md text-body-lg font-semibold text-on-surface">Biaya Pengiriman</h3>
                    <p class="font-body-md text-label-sm text-on-surface-variant mt-1">Atur zona pengiriman, mitra logistik, dan tarif.</p>
                </div>
            </div>
            <span class="material-symbols-outlined text-outline group-hover:text-primary transition-colors">chevron_right</span>
        </a>

        <a class="group bg-surface-container-lowest border border-outline-variant rounded-xl p-md flex items-center justify-between hover:shadow-sm hover:border-primary transition-all duration-200 cursor-pointer" href="#">
            <div class="flex items-center gap-md">
                <div class="w-12 h-12 rounded-lg bg-surface-container-low flex items-center justify-center text-primary group-hover:bg-primary-container group-hover:text-on-primary-container transition-colors">
                    <span class="material-symbols-outlined">security</span>
                </div>
                <div>
                    <h3 class="font-headline-md text-body-lg font-semibold text-on-surface">Keamanan Akun</h3>
                    <p class="font-body-md text-label-sm text-on-surface-variant mt-1">Update password, 2FA, dan manajemen sesi.</p>
                </div>
            </div>
            <span class="material-symbols-outlined text-outline group-hover:text-primary transition-colors">chevron_right</span>
        </a>

        <a class="group bg-surface-container-lowest border border-outline-variant rounded-xl p-md flex items-center justify-between hover:shadow-sm hover:border-primary transition-all duration-200 cursor-pointer" href="#">
            <div class="flex items-center gap-md">
                <div class="w-12 h-12 rounded-lg bg-surface-container-low flex items-center justify-center text-primary group-hover:bg-primary-container group-hover:text-on-primary-container transition-colors">
                    <span class="material-symbols-outlined">support_agent</span>
                </div>
                <div>
                    <h3 class="font-headline-md text-body-lg font-semibold text-on-surface">Pusat Bantuan</h3>
                    <p class="font-body-md text-label-sm text-on-surface-variant mt-1">Akses dokumentasi dan dukungan teknis.</p>
                </div>
            </div>
            <span class="material-symbols-outlined text-outline group-hover:text-primary transition-colors">chevron_right</span>
        </a>

        {{-- Logout }}
        <div class="mt-lg">
            <a href="{{ route('admin.logout') }}" class="w-full bg-surface border border-error text-error font-body-lg text-body-lg font-bold py-md rounded-xl flex items-center justify-center gap-sm hover:bg-error hover:text-on-error transition-colors duration-200">
                <span class="material-symbols-outlined">logout</span>
                Logout Session
            </a>
        </div>
    </div>
</div>
@endsection