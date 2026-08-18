<!DOCTYPE html>
<html lang="id" class="light">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'Admin') - BuildPro Hardware</title>

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="bg-surface text-on-surface font-body-md antialiased">

{{-- Mobile Top Bar --}}
<header class="md:hidden bg-surface border-b border-outline-variant sticky top-0 z-50 flex justify-between items-center px-4 h-14">
    <button id="sidebar-toggle" class="w-10 h-10 rounded-lg flex items-center justify-center text-on-surface-variant hover:bg-surface-container transition-colors -ml-2">
        <span class="material-symbols-outlined">menu</span>
    </button>
    <span class="font-headline-md text-base font-bold text-primary flex items-center gap-1.5">
        <span class="material-symbols-outlined text-lg" style="font-variation-settings: 'FILL' 1;">construction</span>
        BuildPro
    </span>
    <div class="w-8 h-8 rounded-full bg-primary-container flex items-center justify-center text-on-primary font-bold text-xs">AD</div>
</header>

{{-- Mobile Overlay --}}
<div id="sidebar-overlay" class="fixed inset-0 bg-inverse-surface/40 z-40 hidden md:hidden backdrop-blur-sm transition-opacity"></div>

{{-- Sidebar --}}
<aside id="admin-sidebar" class="bg-surface-container-lowest h-screen w-64 fixed left-0 top-0 border-r border-outline-variant flex flex-col py-md z-50 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">
    {{-- Brand --}}
    <div class="px-md mb-xl flex items-center gap-sm">
        <div class="w-10 h-10 rounded-lg bg-primary flex items-center justify-center text-on-primary font-bold">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">construction</span>
        </div>
        <div>
            <h1 class="font-headline-md text-headline-md font-bold text-primary">BuildPro</h1>
            <p class="font-label-caps text-label-caps text-on-surface-variant">ADMIN PORTAL</p>
        </div>
        {{-- Mobile close --}}
        <button id="sidebar-close" class="md:hidden ml-auto w-8 h-8 rounded flex items-center justify-center text-on-surface-variant hover:bg-surface-container transition-colors">
            <span class="material-symbols-outlined text-lg">close</span>
        </button>
    </div>

    {{-- Navigation --}}
    <ul class="flex flex-col gap-xs flex-grow px-sm">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-sm px-md py-sm rounded-r-full transition-colors duration-200 {{ request()->routeIs('admin.dashboard') ? 'text-primary font-bold border-r-4 border-primary bg-surface-container-high' : 'text-on-surface-variant hover:bg-surface-container' }}">
                <span class="material-symbols-outlined {{ request()->routeIs('admin.dashboard') ? 'fill' : '' }}">dashboard</span>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.inventory') }}" class="flex items-center gap-sm px-md py-sm rounded-r-full transition-colors duration-200 {{ request()->routeIs('admin.inventory') || request()->routeIs('admin.products.create') || request()->routeIs('admin.products.edit') ? 'text-primary font-bold border-r-4 border-primary bg-surface-container-high' : 'text-on-surface-variant hover:bg-surface-container' }}">
                <span class="material-symbols-outlined {{ (request()->routeIs('admin.inventory') || request()->routeIs('admin.products.create') || request()->routeIs('admin.products.edit')) ? 'fill' : '' }}">inventory_2</span>
                <span>Inventaris</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.orders') }}" class="flex items-center gap-sm px-md py-sm rounded-r-full transition-colors duration-200 {{ request()->routeIs('admin.orders') ? 'text-primary font-bold border-r-4 border-primary bg-surface-container-high' : 'text-on-surface-variant hover:bg-surface-container' }}">
                <span class="material-symbols-outlined {{ request()->routeIs('admin.orders') ? 'fill' : '' }}">shopping_cart</span>
                <span>Pesanan</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.settings') }}" class="flex items-center gap-sm px-md py-sm rounded-r-full transition-colors duration-200 {{ request()->routeIs('admin.settings') ? 'text-primary font-bold border-r-4 border-primary bg-surface-container-high' : 'text-on-surface-variant hover:bg-surface-container' }}">
                <span class="material-symbols-outlined {{ request()->routeIs('admin.settings') ? 'fill' : '' }}">settings</span>
                <span>Pengaturan</span>
            </a>
        </li>
    </ul>

    {{-- Add Product Button --}}
    <div class="px-md mt-auto">
        <a href="{{ route('admin.products.create') }}" class="w-full bg-primary-container text-on-primary font-label-sm text-label-sm font-bold py-sm rounded-lg flex items-center justify-center gap-xs hover:shadow-sm transition-shadow">
            <span class="material-symbols-outlined">add</span>
            Tambah Produk
        </a>
    </div>

    {{-- Back to Site --}}
    <div class="px-md mt-sm">
        <a href="{{ route('home') }}" class="w-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm py-sm rounded-lg flex items-center justify-center gap-xs hover:bg-surface-container-high transition-colors">
            <span class="material-symbols-outlined">storefront</span>
            Lihat Website
        </a>
    </div>
</aside>

{{-- Main Content --}}
<div class="flex-1 md:ml-64 flex flex-col min-h-screen">
    {{-- Desktop Top Bar --}}
    <header class="hidden md:flex bg-surface border-b border-outline-variant sticky top-0 z-40 justify-between items-center px-margin-desktop h-16">
        <div class="flex items-center gap-sm">
            <span class="font-headline-md text-headline-md font-bold text-primary">BuildPro Hardware</span>
        </div>
        <div class="flex-grow max-w-md mx-xl hidden lg:block">
            <div class="relative">
                <span class="material-symbols-outlined absolute left-sm top-1/2 -translate-y-1/2 text-outline">search</span>
                <input class="w-full bg-surface-container-low border border-outline-variant rounded-lg py-xs pl-xl pr-sm font-body-md text-body-md focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors" placeholder="Search..." type="text"/>
            </div>
        </div>
        <div class="flex items-center gap-sm">
            <button class="w-10 h-10 rounded-full flex items-center justify-center text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors relative">
                <span class="material-symbols-outlined">notifications</span>
                <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-secondary-container rounded-full"></span>
            </button>
            <button class="w-10 h-10 rounded-full flex items-center justify-center text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors">
                <span class="material-symbols-outlined">help</span>
            </button>
            <div class="w-10 h-10 rounded-full bg-primary-container flex items-center justify-center text-on-primary font-bold text-label-sm ml-sm">
                AD
            </div>
        </div>
    </header>

    {{-- Success Flash --}}
    @if(session('success'))
    <div class="mx-4 md:mx-margin-desktop mt-4 bg-[#DEF7EC] text-[#03543F] border border-[#84E1BC] rounded-lg px-md py-sm font-label-sm flex items-center gap-sm">
        <span class="material-symbols-outlined text-[18px]">check_circle</span>
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="mx-4 md:mx-margin-desktop mt-4 bg-error-container text-on-error-container border border-error/20 rounded-lg px-md py-sm font-label-sm flex items-center gap-sm">
        <span class="material-symbols-outlined text-[18px]">error</span>
        {{ session('error') }}
    </div>
    @endif

    {{-- Canvas --}}
    <main class="flex-1 p-4 md:p-margin-desktop overflow-y-auto mt-0 md:mt-0">
        @yield('admin-content')
    </main>
</div>

{{-- Admin Sidebar JS --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('admin-sidebar');
    const overlay = document.getElementById('sidebar-overlay');
    const toggle = document.getElementById('sidebar-toggle');
    const close = document.getElementById('sidebar-close');

    function openSidebar() {
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeSidebar() {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
        document.body.style.overflow = '';
    }

    if (toggle) toggle.addEventListener('click', openSidebar);
    if (close) close.addEventListener('click', closeSidebar);
    if (overlay) overlay.addEventListener('click', closeSidebar);

    // Auto-close on resize to desktop
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 768) {
            closeSidebar();
        }
    });
});
</script>

@stack('scripts')
</body>
</html>
