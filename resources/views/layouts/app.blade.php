<!DOCTYPE html>
<html lang="id" class="light">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'BuildPro Hardware') - Toko Bangunan</title>

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="bg-background text-on-background font-body-md antialiased selection:bg-primary-container selection:text-on-primary-container">

    {{-- Desktop Navigation --}}
    <nav id="desktop-nav" class="hidden md:block bg-surface w-full top-0 sticky z-50 border-b border-outline-variant transition-all duration-200">
        <div class="max-w-7xl mx-auto px-margin-desktop flex justify-between items-center h-20">
            <a href="{{ route('home') }}" class="font-headline-md text-headline-md font-bold text-primary tracking-tight flex items-center gap-2">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">construction</span>
                BuildPro Hardware
            </a>
            <ul class="hidden md:flex space-x-gutter items-center">
                <li>
                    <a class="{{ request()->routeIs('home') ? 'text-primary font-bold border-b-2 border-primary pb-1' : 'text-on-surface-variant hover:text-secondary' }} transition-colors" href="{{ route('home') }}">
                        Home
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('catalog') ? 'text-primary font-bold border-b-2 border-primary pb-1' : 'text-on-surface-variant hover:text-secondary' }} transition-colors" href="{{ route('catalog') }}">
                        Catalog
                    </a>
                </li>
                <li>
                    <a class="text-on-surface-variant hover:text-secondary transition-colors" href="#">
                        Supplies
                    </a>
                </li>
                <li>
                    <a class="text-on-surface-variant hover:text-secondary transition-colors" href="#">
                        Projects
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('about') ? 'text-primary font-bold border-b-2 border-primary pb-1' : 'text-on-surface-variant hover:text-secondary' }} transition-colors" href="{{ route('about') }}">
                        About Us
                    </a>
                </li>
            </ul>
            <div class="flex items-center gap-sm">
                {{-- Search Bar --}}
                <div class="hidden md:flex items-center relative bg-surface-container-low rounded-lg border border-outline-variant focus-within:border-primary-container px-sm py-xs">
                    <span class="material-symbols-outlined text-outline">search</span>
                    <form action="{{ route('catalog') }}" method="GET" class="ml-xs">
                        <input class="bg-transparent border-none focus:ring-0 focus:outline-none text-on-surface w-48 font-body-md text-body-md" placeholder="Search products..." type="text" name="search"/>
                    </form>
                </div>
                <button class="text-on-surface-variant hover:text-primary transition-colors p-xs hidden md:block">
                    <span class="material-symbols-outlined">location_on</span>
                </button>
                <a href="{{ route('catalog') }}" class="text-on-surface-variant hover:text-primary transition-colors p-xs relative">
                    <span class="material-symbols-outlined">shopping_cart</span>
                </a>
                <button class="hidden md:flex items-center justify-center bg-transparent border-[1.5px] border-primary-container text-primary-container font-body-md text-body-md font-semibold px-md py-sm rounded ml-sm hover:bg-primary-container hover:text-on-primary transition-colors">
                    Sign In
                </button>
            </div>
        </div>
    </nav>

    {{-- Mobile Top Bar --}}
    <header id="mobile-nav" class="md:hidden fixed top-0 left-0 w-full z-50 flex justify-between items-center px-margin-mobile h-16 bg-surface border-b border-outline-variant">
        <button id="mobile-menu-btn" class="text-primary hover:bg-surface-container-high transition-colors active:scale-95 p-2 rounded-full flex items-center justify-center">
            <span class="material-symbols-outlined">menu</span>
        </button>
        <a href="{{ route('home') }}" class="font-headline-md text-headline-md font-bold text-primary">BuildPro</a>
        <a href="{{ route('catalog') }}" class="text-primary hover:bg-surface-container-high transition-colors active:scale-95 p-2 rounded-full flex items-center justify-center">
            <span class="material-symbols-outlined">shopping_cart</span>
        </a>
    </header>

    {{-- Mobile Slide-out Menu --}}
    <div id="mobile-menu-overlay" class="md:hidden fixed inset-0 bg-black/40 z-[60] hidden opacity-0 transition-opacity duration-300"></div>
    <div id="mobile-menu" class="md:hidden fixed top-0 left-0 h-full w-72 bg-surface-container-lowest z-[70] transform -translate-x-full transition-transform duration-300 shadow-xl">
        <div class="p-md border-b border-outline-variant flex justify-between items-center">
            <span class="font-headline-md text-headline-md font-bold text-primary">BuildPro</span>
            <button id="mobile-menu-close" class="text-on-surface-variant hover:text-primary p-1">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <nav class="p-md space-y-1">
            <a href="{{ route('home') }}" class="block px-sm py-md rounded-lg {{ request()->routeIs('home') ? 'bg-surface-container text-primary font-bold' : 'text-on-surface hover:bg-surface-container' }} transition-colors">
                <span class="material-symbols-outlined align-middle mr-sm text-xl">storefront</span> Home
            </a>
            <a href="{{ route('catalog') }}" class="block px-sm py-md rounded-lg {{ request()->routeIs('catalog') ? 'bg-surface-container text-primary font-bold' : 'text-on-surface hover:bg-surface-container' }} transition-colors">
                <span class="material-symbols-outlined align-middle mr-sm text-xl">inventory_2</span> Catalog
            </a>
            <a href="#" class="block px-sm py-md rounded-lg text-on-surface hover:bg-surface-container transition-colors">
                <span class="material-symbols-outlined align-middle mr-sm text-xl">category</span> Supplies
            </a>
            <a href="#" class="block px-sm py-md rounded-lg text-on-surface hover:bg-surface-container transition-colors">
                <span class="material-symbols-outlined align-middle mr-sm text-xl">apartment</span> Projects
            </a>
            <a href="{{ route('about') }}" class="block px-sm py-md rounded-lg {{ request()->routeIs('about') ? 'bg-surface-container text-primary font-bold' : 'text-on-surface hover:bg-surface-container' }} transition-colors">
                <span class="material-symbols-outlined align-middle mr-sm text-xl">info</span> About Us
            </a>
        </nav>
    </div>

    {{-- Main Content --}}
    <main class="@yield('main-class', '')">
        @yield('content')
    </main>

    {{-- Desktop Footer --}}
    <footer class="hidden md:block bg-inverse-surface w-full py-12">
        <div class="max-w-7xl mx-auto px-margin-desktop grid grid-cols-1 md:grid-cols-4 gap-gutter">
            <div class="col-span-1 md:col-span-2">
                <div class="font-headline-md text-headline-md font-bold text-surface mb-md">
                    BuildPro Hardware
                </div>
                <p class="font-body-md text-body-md text-surface-variant max-w-sm mb-lg">
                    The Expert Partner for all your construction and building material needs. Reliable, sturdy, and always in stock.
                </p>
                <div class="font-label-sm text-label-sm text-surface-variant">
                    &copy; 2024 BuildPro Hardware &amp; Construction. All rights reserved.
                </div>
            </div>
            <div>
                <h4 class="font-label-sm text-label-sm text-surface font-bold mb-md uppercase tracking-wider">Quick Links</h4>
                <ul class="space-y-sm">
                    <li><a class="font-label-sm text-label-sm text-surface-variant underline-offset-4 hover:underline hover:text-secondary-fixed-dim" href="#">Terms of Service</a></li>
                    <li><a class="font-label-sm text-label-sm text-surface-variant underline-offset-4 hover:underline hover:text-secondary-fixed-dim" href="#">Privacy Policy</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-label-sm text-label-sm text-surface font-bold mb-md uppercase tracking-wider">Support</h4>
                <ul class="space-y-sm">
                    <li><a class="font-label-sm text-label-sm text-surface-variant underline-offset-4 hover:underline hover:text-secondary-fixed-dim" href="#">Shipping Info</a></li>
                    <li><a class="font-label-sm text-label-sm text-surface-variant underline-offset-4 hover:underline hover:text-secondary-fixed-dim" href="https://wa.me/6281234567890">WhatsApp Support</a></li>
                </ul>
            </div>
        </div>
    </footer>

    {{-- Mobile Bottom Navigation --}}
    <nav class="md:hidden fixed bottom-0 left-0 w-full z-50 flex justify-around items-center px-4 py-2 border-t border-outline-variant bg-surface">
        <a href="{{ route('home') }}" class="flex flex-col items-center justify-center {{ request()->routeIs('home') ? 'text-secondary font-bold' : 'text-on-surface-variant' }} hover:bg-surface-container-high transition-transform active:scale-90 p-2 rounded-lg">
            <span class="material-symbols-outlined">storefront</span>
            <span class="font-label-sm text-[10px] mt-1">Shop</span>
        </a>
        <a href="{{ route('catalog') }}" class="flex flex-col items-center justify-center {{ request()->routeIs('catalog') ? 'text-secondary font-bold' : 'text-on-surface-variant' }} hover:bg-surface-container-high transition-transform active:scale-90 p-2 rounded-lg">
            <span class="material-symbols-outlined">search</span>
            <span class="font-label-sm text-[10px] mt-1">Search</span>
        </a>
        <a href="#" class="flex flex-col items-center justify-center text-on-surface-variant hover:bg-surface-container-high transition-transform active:scale-90 p-2 rounded-lg">
            <span class="material-symbols-outlined">inventory</span>
            <span class="font-label-sm text-[10px] mt-1">Orders</span>
        </a>
        <a href="{{ route('about') }}" class="flex flex-col items-center justify-center {{ request()->routeIs('about') ? 'text-secondary font-bold' : 'text-on-surface-variant' }} hover:bg-surface-container-high transition-transform active:scale-90 p-2 rounded-lg">
            <span class="material-symbols-outlined">person</span>
            <span class="font-label-sm text-[10px] mt-1">Account</span>
        </a>
    </nav>

    @stack('scripts')
</body>
</html>