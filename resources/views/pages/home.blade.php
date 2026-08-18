@extends('layouts.app')

@section('title', 'Home')

@section('content')

{{-- Desktop Version --}}
<div class="md:block hidden">
    {{-- Hero Section --}}
    <section class="relative w-full min-h-[600px] flex items-center justify-center bg-inverse-surface overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-60">
            <div class="w-full h-full bg-cover bg-center" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAa_b-0T3secnIjt-0R3-_pLYePJtn8skNGDoR6lMwfYqtrLyCMZXeRn7KLKDI3Bi6yPNa4T--MIfH_8sny_XMcioJR5uoaFXOJtecr-X6tbnOwty3kqcobXhGUmJjNq4s0LU-Cgbt9mdB7L9ALcuDCAY3_YhYiCTKeaqWpQ9lrmf2KdCb1hhrwejwg6Uh5cts-OEwY5oIH7lWBKN3E0cVfaItX58lx9lbhmFelSKt9DeIsBoMoR3Mxpg')"></div>
        </div>
        <div class="relative z-10 text-center px-margin-desktop max-w-4xl mx-auto py-xl">
            <span class="font-label-caps text-label-caps text-secondary-fixed uppercase tracking-widest mb-sm block">The Expert Partner</span>
            <h1 class="font-headline-lg text-headline-lg text-surface-container-lowest mb-md text-balance">
                Integritas Struktural Dimulai dengan Material Berkualitas
            </h1>
            <p class="font-body-lg text-body-lg text-surface-variant mb-lg max-w-2xl mx-auto">
                Toko Bangunan terpercaya untuk semen, baja, perkakas, dan perlengkapan finishing premium. Dibangun untuk para profesional, siap untuk setiap proyek.
            </p>
            <div class="flex justify-center gap-sm">
                <a href="{{ route('catalog') }}" class="bg-secondary-container text-on-secondary-container font-headline-md !text-base px-xl py-sm rounded hover:shadow-lg transition-all duration-200 border border-transparent inline-block">
                    Belanja Sekarang
                </a>
                <a href="{{ route('catalog') }}" class="bg-transparent text-surface-container-lowest border-2 border-surface-container-lowest font-headline-md !text-base px-xl py-sm rounded hover:bg-surface-container-lowest hover:text-inverse-surface transition-all duration-200 inline-block">
                    Lihat Katalog
                </a>
            </div>
        </div>
    </section>

    {{-- Categories Section --}}
    <section class="max-w-7xl mx-auto px-margin-desktop py-xl">
        <div class="flex justify-between items-end mb-lg">
            <div>
                <h2 class="font-headline-md text-headline-md text-on-surface mb-xs">Kategori Esensial</h2>
                <p class="font-body-md text-body-md text-on-surface-variant">Jelajahi inventaris komprehensif bahan konstruksi kami.</p>
            </div>
            <a href="{{ route('catalog') }}" class="hidden md:flex items-center text-primary font-label-sm text-label-sm hover:text-secondary transition-colors">
                Lihat Semua <span class="material-symbols-outlined ml-xs text-[18px]">arrow_forward</span>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter">
            {{-- Category 1 --}}
            <a href="{{ route('catalog', ['category' => 'Building Materials']) }}" class="group block bg-surface-container-lowest border border-outline-variant rounded-lg overflow-hidden hover:border-primary hover:shadow-lift transition-all duration-300">
                <div class="h-48 w-full bg-surface-container relative">
                    <div class="w-full h-full bg-cover bg-center mix-blend-multiply opacity-80 group-hover:scale-105 transition-transform duration-500" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCabupDK_f3tjlbOeLVZo-qS4HQS827KHZhwgV7UGsT2zGEzBM4oeRMRVgsd-DH3Q8Lgvk-0NMTpQNuE52OkiWIghO7ua4pEwCnc8LVnbdVH8t2zTZfrUtUXHE7sMipB0GEzJGfaqJc-JLePri2kvF-9X1ozqyTTPZzRufKN5iTsuZIvSgSV0XzIk_mdZmKmLYLYOiUHIV8EyclCBflUSrs_LtjLgMpgWWRgRTjLpEdmkOvAAaVC1IevA')"></div>
                </div>
                <div class="p-md">
                    <h3 class="font-headline-md text-headline-md !text-lg text-on-surface mb-xs">Semen &amp; Beton</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant">Fondasi berkualitas tinggi.</p>
                </div>
            </a>
            {{-- Category 2 --}}
            <a href="{{ route('catalog', ['category' => 'Building Materials']) }}" class="group block bg-surface-container-lowest border border-outline-variant rounded-lg overflow-hidden hover:border-primary hover:shadow-lift transition-all duration-300">
                <div class="h-48 w-full bg-surface-container relative">
                    <div class="w-full h-full bg-cover bg-center mix-blend-multiply opacity-80 group-hover:scale-105 transition-transform duration-500" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAWMXhImqD1zaCkyG9dT4CgYT7WrVY8UW2g8jbFVTqQxRBGzW5OxML7Y_EtsVUBbS9nNk4cIieNFMFLWoJRNipfKbOmbC3uTTudFe9kAj8Kf_FdvupRumrWWIlr3ocK4EuvDi-K46pZdXw7Kgakbb0rEZxAgP9IfvdUyKoI6XEusp9TQmWkYT3P10cTnoZcG9gnZqbpFY0kb3zS44b_WYsOM4wrR999dGPljqAVSYYxrtEEYVa5U9NhBg')"></div>
                </div>
                <div class="p-md">
                    <h3 class="font-headline-md text-headline-md !text-lg text-on-surface mb-xs">Baja &amp; Besi</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant">Penguat struktural.</p>
                </div>
            </a>
            {{-- Category 3 --}}
            <a href="{{ route('catalog', ['category' => 'Paint & Finishes']) }}" class="group block bg-surface-container-lowest border border-outline-variant rounded-lg overflow-hidden hover:border-primary hover:shadow-lift transition-all duration-300">
                <div class="h-48 w-full bg-surface-container relative">
                    <div class="w-full h-full bg-cover bg-center mix-blend-multiply opacity-80 group-hover:scale-105 transition-transform duration-500" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCnOToRLx3-LEk4Jg_FxvH1458spAyHEKe2vtCyv5ShbQnu0W4_vAksJZcNz62MIx59ipxoOXywwJiksg4EW0SpdneOUDO1ITSiIXlB8lpvEELqkaS8dyJPsu71h9wPFFcFlnAVqMssm963tba1cfxpBG9d7PvIy6kDjYVzhpksFlOog9GPugCKFnvmIhNEz39MOHts-egF3S04Rc7y4I6p6mplcCYwpuP7U23jmAWrAfdDuZl4IMiQOg')"></div>
                </div>
                <div class="p-md">
                    <h3 class="font-headline-md text-headline-md !text-lg text-on-surface mb-xs">Cat &amp; Finishing</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant">Lapisan permukaan premium.</p>
                </div>
            </a>
            {{-- Category 4 --}}
            <a href="{{ route('catalog', ['category' => 'Tools & Equipment']) }}" class="group block bg-surface-container-lowest border border-outline-variant rounded-lg overflow-hidden hover:border-primary hover:shadow-lift transition-all duration-300">
                <div class="h-48 w-full bg-surface-container relative">
                    <div class="w-full h-full bg-cover bg-center mix-blend-multiply opacity-80 group-hover:scale-105 transition-transform duration-500" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCjunB_w8FJmtGgnz_9ugPxHTi8Urc5nUAvP2CQD3guIlegNhhW2QqVF3pBD1sH1eK-RcvkWCZj5Bfj3AWZeRNvIBqK8gKgY8pwGrqF_XH1v9-xDS9hqbzUSqT_drHOmr9GBFkMlm0puUFWK0BAu_f7J6eWElTCYmOCmSLW5DAS-vor4rAJzwqNkk5tY0IaNTxHhfNKh-sNBlvw8yJgXB6_ijUZEU7HGQeN8UaTGhDhLDmddOCYG0Ms_A')"></div>
                </div>
                <div class="p-md">
                    <h3 class="font-headline-md text-headline-md !text-lg text-on-surface mb-xs">Perkakas</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant">Alat profesional berkelas.</p>
                </div>
            </a>
        </div>
    </section>

    {{-- Why Choose Us --}}
    <section class="bg-surface-container-low py-xl border-y border-outline-variant">
        <div class="max-w-7xl mx-auto px-margin-desktop text-center">
            <span class="font-label-caps text-label-caps text-primary uppercase tracking-widest mb-sm block">Komitmen Kami</span>
            <h2 class="font-headline-md text-headline-md text-on-surface mb-xl">Mengapa Profesional Memilih BuildPro</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-lg">
                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 rounded-full bg-primary-container flex items-center justify-center mb-md">
                        <span class="material-symbols-outlined text-on-primary-container text-[32px]">local_shipping</span>
                    </div>
                    <h3 class="font-headline-md text-headline-md !text-lg text-on-surface mb-xs">Pengiriman Cepat</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant max-w-xs text-center">
                        Logistik langsung ke lokasi proyek Anda, memastikan jadwal tetap terjaga dengan downtime minimal.
                    </p>
                </div>
                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 rounded-full bg-primary-container flex items-center justify-center mb-md">
                        <span class="material-symbols-outlined text-on-primary-container text-[32px]">verified</span>
                    </div>
                    <h3 class="font-headline-md text-headline-md !text-lg text-on-surface mb-xs">Kualitas Terjamin</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant max-w-xs text-center">
                        Sumber dari produsen terbaik. Setiap batch diverifikasi untuk integritas struktural dan kepatuhan standar.
                    </p>
                </div>
                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 rounded-full bg-primary-container flex items-center justify-center mb-md">
                        <span class="material-symbols-outlined text-on-primary-container text-[32px]">sell</span>
                    </div>
                    <h3 class="font-headline-md text-headline-md !text-lg text-on-surface mb-xs">Harga Kompetitif</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant max-w-xs text-center">
                        Harga grosir transparan tersedia untuk kontraktor dan proyek arsitektur berskala besar.
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>

{{-- Mobile Version --}}
<div class="md:hidden pt-16 pb-24">
    {{-- Hero Section --}}
    <section class="relative w-full min-h-[600px] flex items-end pb-12 px-margin-mobile">
        <div class="absolute inset-0 z-0">
            <div class="w-full h-full bg-cover bg-center" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBMg15rSPiWbHyovCpaDdRi66U6aUCS9wKc-D60fUTnU9rJZYpH9fbyvt-9M2J4KqaAX5yoNCYWmqtu1ZNS_U6z023OTzwbO7wawWthb_OUPkHHU4IeswIin8WzKLGxPsmNAYLYIwxoOeeyPSBFa4Uf3-9tMgOJkxjDta5B6nVt9MIq8MZX26EsH5P4i1T_Nv9CHczyn6h7Ec8UWqODNtrKdna8yQ1S_n8fJaePLxxVLsXNGlmNz0IQtg')"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-inverse-surface/90 via-inverse-surface/50 to-transparent"></div>
        </div>
        <div class="relative z-10 w-full max-w-lg">
            <h1 class="font-headline-lg-mobile text-headline-lg-mobile text-on-primary mb-4">Integritas Struktural Dimulai dengan Material Berkualitas</h1>
            <p class="font-body-lg text-body-lg text-surface-container-low mb-8">Partner Ahli untuk kebutuhan konstruksi Anda. Handal, kokoh, dan selalu tersedia.</p>
            <div class="flex flex-col gap-4">
                <a href="{{ route('catalog') }}" class="w-full bg-secondary-container text-on-secondary-container font-headline-md text-[16px] py-4 rounded-lg shadow-sm hover:shadow-md transition-shadow active:scale-[0.98] font-bold text-center block">
                    Belanja Sekarang
                </a>
                <a href="{{ route('catalog') }}" class="w-full bg-transparent border-2 border-primary-fixed-dim text-primary-fixed-dim font-headline-md text-[16px] py-4 rounded-lg hover:bg-primary-fixed-dim/10 transition-colors active:scale-[0.98] font-bold text-center block">
                    Lihat Katalog
                </a>
            </div>
        </div>
    </section>

    {{-- Essential Categories --}}
    <section class="py-xl px-margin-mobile bg-surface">
        <div class="flex items-center justify-between mb-8">
            <h2 class="font-headline-md text-headline-md text-on-surface">Kategori Esensial</h2>
            <a href="{{ route('catalog') }}" class="font-label-sm text-label-sm text-primary flex items-center gap-1 hover:underline">
                Lihat Semua <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
            </a>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <a href="{{ route('catalog', ['category' => 'Building Materials']) }}" class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden hover:shadow-md hover:border-primary transition-all group">
                <div class="h-32 bg-surface-container w-full overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBD0Ue_FZGglfNRuoOrV9g2y3FKWW9yLH5tjQM9Wt2_S-fIovYPqA6jozUZT2n3K_ygIr_bdIxaNPCFSZaAxmw1fnyZkwm0Gdag0Z3007GahJSLm4wldHftL2WzJZ0R11Sh8YKS8nluSsYevOvbTw7ooMULxq_WByXfiRIm3teDVb2ogws5M7JqG51XxRROEh2v0viceTGi6jYmfWyeCkQH1xsn9RB-LD51pJFCc2JUns7bhhzcb_WTew" alt="Semen &amp; Beton"/>
                </div>
                <div class="p-4 flex items-center justify-between">
                    <h3 class="font-label-sm text-label-sm text-on-surface font-semibold">Semen &amp; Beton</h3>
                    <span class="material-symbols-outlined text-outline group-hover:text-primary transition-colors text-[20px]">chevron_right</span>
                </div>
            </a>
            <a href="{{ route('catalog', ['category' => 'Building Materials']) }}" class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden hover:shadow-md hover:border-primary transition-all group">
                <div class="h-32 bg-surface-container w-full overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCMZay7NQ-96_Eu07Jz_EvMus6y4cc85PeYhxDWBqelXWEXZcYnY_OAx3rDi5ZA36B4u-EXjCH1qLd3mesDWR56eCXewhIHRf0IAU680RZc3PCEDPEeoEfJ6gHY21Fyubm9Cl-EVsxXDkBK_sZWDbfik-HYBQuPMp9PG2yi57i9ewxQEsdpMRZl7S6Nw_78Zpxq2Q_d9UWtdwUOmxuhluXjRMhLgqr_TtSuP-cizWw-igSXA9pLUIDUjg" alt="Baja &amp; Besi"/>
                </div>
                <div class="p-4 flex items-center justify-between">
                    <h3 class="font-label-sm text-label-sm text-on-surface font-semibold">Baja &amp; Besi</h3>
                    <span class="material-symbols-outlined text-outline group-hover:text-primary transition-colors text-[20px]">chevron_right</span>
                </div>
            </a>
            <a href="{{ route('catalog', ['category' => 'Paint & Finishes']) }}" class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden hover:shadow-md hover:border-primary transition-all group">
                <div class="h-32 bg-surface-container w-full overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCeB4NIDTV45qKgc4uUff2qAWFsrAHDVPGUEuoJnbOZ93fdqYWdXFuL33MggpQeghXZ8FsAOY9mq4W4DYWxd2weDVi-sK_1kEs0B8k778HSOotJaxAHWajW5twlfjGwSRtfNwnwuX5EJTZLN3o7jZemhIEWxfddXEiA13Nao_0Dc7DKg6TYMJfJ4dhQYGld72ZicbQJnemKkr-xJmrMXDdXXHKMOq0iJTcCV081epFBGoFc4kybmhLmhQ" alt="Cat &amp; Finishing"/>
                </div>
                <div class="p-4 flex items-center justify-between">
                    <h3 class="font-label-sm text-label-sm text-on-surface font-semibold">Cat &amp; Finishing</h3>
                    <span class="material-symbols-outlined text-outline group-hover:text-primary transition-colors text-[20px]">chevron_right</span>
                </div>
            </a>
            <a href="{{ route('catalog', ['category' => 'Tools & Equipment']) }}" class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden hover:shadow-md hover:border-primary transition-all group">
                <div class="h-32 bg-surface-container w-full overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDqeRVlWhhueM6Ep1wfZjrEof5zg6aMsWsNMpFOsGCXG3wTcB667xBx3551POIMq6ZsjkOL86aEL8sHET-g7QxOj9z30vKSDUxLGZhxt6q5BAz9AddIppAQwV76qzQYecD9adx8yM1xSUDAKRU6Jyex-1Qwfxos0oNapxk4GcUK0wa58m1Ive9HsPWm9HwhsH_BbJ3JnA7teRIu2c2XMxsXffNT4jSynyMx-NF3ENfBjs39ptRKRDW3eQ" alt="Perkakas"/>
                </div>
                <div class="p-4 flex items-center justify-between">
                    <h3 class="font-label-sm text-label-sm text-on-surface font-semibold">Perkakas</h3>
                    <span class="material-symbols-outlined text-outline group-hover:text-primary transition-colors text-[20px]">chevron_right</span>
                </div>
            </a>
        </div>
    </section>

    {{-- Why Choose Us --}}
    <section class="py-xl px-margin-mobile bg-surface-container-low border-y border-outline-variant">
        <h2 class="font-headline-md text-headline-md text-on-surface text-center mb-12">Mengapa Memilih Kami?</h2>
        <div class="flex flex-col gap-8">
            <div class="flex items-start gap-4 p-4 rounded-xl bg-surface-container-lowest shadow-sm border border-outline-variant/50">
                <div class="w-12 h-12 rounded-lg bg-primary-container/10 flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-primary-container text-[28px]">local_shipping</span>
                </div>
                <div>
                    <h3 class="font-label-sm text-label-sm text-on-surface font-bold mb-1">Pengiriman Cepat</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant text-[14px]">Pengiriman tepat waktu ke lokasi proyek Anda, meminimalkan downtime.</p>
                </div>
            </div>
            <div class="flex items-start gap-4 p-4 rounded-xl bg-surface-container-lowest shadow-sm border border-outline-variant/50">
                <div class="w-12 h-12 rounded-lg bg-secondary-container/10 flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-secondary-container text-[28px]">verified</span>
                </div>
                <div>
                    <h3 class="font-label-sm text-label-sm text-on-surface font-bold mb-1">Kualitas Terjamin</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant text-[14px]">Material standar industri bersertifikat untuk kekuatan maksimal.</p>
                </div>
            </div>
            <div class="flex items-start gap-4 p-4 rounded-xl bg-surface-container-lowest shadow-sm border border-outline-variant/50">
                <div class="w-12 h-12 rounded-lg bg-primary-container/10 flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-primary-container text-[28px]">request_quote</span>
                </div>
                <div>
                    <h3 class="font-label-sm text-label-sm text-on-surface font-bold mb-1">Harga Kompetitif</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant text-[14px]">Harga grosir transparan untuk kontraktor dan profesional.</p>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection