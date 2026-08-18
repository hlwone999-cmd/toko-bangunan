<!DOCTYPE html>
<html lang="id" class="light">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Login Admin - BuildPro Hardware</title>

    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { background: #f8f9ff; }
    </style>
</head>
<body class="font-body-md antialiased min-h-screen flex flex-col">

    {{-- Top Bar --}}
    <header class="w-full border-b border-outline-variant bg-surface">
        <div class="max-w-7xl mx-auto px-4 md:px-10 flex items-center h-16">
            <a href="{{ route('home') }}" class="font-headline-md text-headline-md font-bold text-primary flex items-center gap-2">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">construction</span>
                BuildPro Hardware
            </a>
        </div>
    </header>

    {{-- Login Card --}}
    <div class="flex-1 flex items-center justify-center px-4 py-12">
        <div class="w-full max-w-md">
            {{-- Card --}}
            <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-8 md:p-10 shadow-lift">
                {{-- Header --}}
                <div class="text-center mb-8">
                    <div class="w-16 h-16 rounded-xl bg-primary mx-auto flex items-center justify-center mb-4">
                        <span class="material-symbols-outlined text-on-primary text-3xl" style="font-variation-settings: 'FILL' 1;">lock</span>
                    </div>
                    <h1 class="font-headline-md text-headline-md font-bold text-on-surface">Admin Login</h1>
                    <p class="font-body-md text-body-md text-on-surface-variant mt-1">Masuk ke panel administrasi BuildPro</p>
                </div>

                {{-- Error --}}
                @if(session('error'))
                <div class="bg-error-container text-on-error-container border border-error/20 rounded-lg px-4 py-3 font-label-sm text-label-sm mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">error</span>
                    {{ session('error') }}
                </div>
                @endif

                {{-- Form --}}
                <form method="POST" action="{{ route('admin.login.post') }}" class="flex flex-col gap-5">
                    @csrf

                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1.5 font-medium">Username</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-xl">person</span>
                            <input
                                type="text"
                                name="username"
                                value="{{ old('username') }}"
                                required
                                autofocus
                                class="w-full bg-[#F1F5F9] border border-transparent rounded-lg pl-11 pr-4 py-3 text-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-colors outline-none"
                                placeholder="Masukkan username"
                            />
                        </div>
                        @error('username')
                        <p class="text-error text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1.5 font-medium">Password</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-xl">key</span>
                            <input
                                type="password"
                                name="password"
                                required
                                class="w-full bg-[#F1F5F9] border border-transparent rounded-lg pl-11 pr-4 py-3 text-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-colors outline-none"
                                placeholder="Masukkan password"
                            />
                        </div>
                        @error('password')
                        <p class="text-error text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button
                        type="submit"
                        class="w-full bg-primary text-on-primary font-label-sm text-label-sm font-bold py-3 rounded-lg hover:bg-primary-container transition-colors flex items-center justify-center gap-2 mt-2"
                    >
                        <span class="material-symbols-outlined text-xl">login</span>
                        Masuk
                    </button>
                </form>

                {{-- Hint --}}
                <div class="mt-6 pt-5 border-t border-outline-variant">
                    <div class="bg-surface-container-low rounded-lg px-4 py-3 flex items-start gap-2">
                        <span class="material-symbols-outlined text-primary text-lg mt-0.5">info</span>
                        <div class="text-sm text-on-surface-variant">
                            <p class="font-medium text-on-surface">Demo Credentials</p>
                            <p class="mt-0.5 font-label-caps text-label-caps">Username: <span class="text-primary font-bold">admin</span> &middot; Password: <span class="text-primary font-bold">admin123</span></p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Back link --}}
            <div class="text-center mt-6">
                <a href="{{ route('home') }}" class="text-on-surface-variant hover:text-primary font-label-sm text-label-sm flex items-center justify-center gap-1 transition-colors">
                    <span class="material-symbols-outlined text-lg">arrow_back</span>
                    Kembali ke Website
                </a>
            </div>
        </div>
    </div>

</body>
</html>
