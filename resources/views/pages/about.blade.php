@extends('layouts.app')

@section('title', 'Tentang Kami & Kontak')

@section('content')
<div class="md:pt-0 pt-4 pb-24 md:pb-0">

{{-- Desktop Version --}}
<div class="md:block hidden">
    {{-- Hero Section --}}
    <section class="relative bg-surface-container-low border-b border-outline-variant py-xl overflow-hidden hero-pattern">
        <div class="max-w-7xl mx-auto px-margin-desktop relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-xl items-center">
                <div>
                    <span class="font-label-caps text-label-caps text-primary tracking-widest uppercase mb-4 block">The Expert Partner</span>
                    <h1 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface mb-6">
                        Membangun Kepercayaan, Satu Proyek pada Satu Waktu.
                    </h1>
                    <p class="font-body-lg text-body-lg text-on-surface-variant mb-8 max-w-xl">
                        Sejak 1998, BuildPro Hardware telah menjadi pilar utama konstruksi profesional dan perbaikan rumah. Kami menyediakan perlengkapan berstandar industri dengan layanan ahli, memastikan fondasi Anda selalu kokoh.
                    </p>
                    <a href="#contact" class="inline-flex items-center justify-center font-body-md text-body-md font-bold text-white bg-primary-container hover:bg-primary px-6 py-3 rounded-lg shadow-lift hover:shadow-lg transition-all duration-200">
                        Hubungi Kami
                    </a>
                </div>
                <div class="relative h-[400px] w-full rounded-xl overflow-hidden border border-outline-variant shadow-sm bg-white">
                    <img alt="Interior Toko BuildPro" class="object-cover w-full h-full" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAOcb0c5J0Lwejijba4dpbbtcP1TfyhJibNYVq8n9Vzt_E_1iuUg8C4WHR_H89xHeKvNLyuTUhT5NihCTFfuu8iliGc_uy4eXEBpXqAjghNZJmACIvulVAaO7DGeZJ63PFChRB6cDTRfwZgy9Lz4xM0y0_jrltabjaQ1fqqXYwPLhFenDxp3ZNI8y9VQIE8ewEWzMyY7b5yKkj3wYkW-8AnFGr22eKoUA4sRhhdIaMPZrkNdedtwVc1mA"/>
                </div>
            </div>
        </div>
    </section>

    {{-- Main Content Area --}}
    <section class="max-w-7xl mx-auto px-margin-desktop py-xl" id="contact">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">
            {{-- Left Column --}}
            <div class="md:col-span-5 flex flex-col space-y-gutter">
                {{-- Direct Order Card --}}
                <div class="bg-white rounded-xl border border-outline-variant p-md hover:shadow-lift hover:border-surface-tint transition-all duration-300">
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="w-12 h-12 bg-secondary-fixed rounded-full flex items-center justify-center text-secondary">
                            <span class="material-symbols-outlined fill text-2xl">forum</span>
                        </div>
                        <div>
                            <h2 class="font-headline-md text-headline-md text-on-surface">Pemesanan Langsung</h2>
                            <p class="font-label-sm text-label-sm text-on-surface-variant">Butuh cepat di lokasi proyek?</p>
                        </div>
                    </div>
                    <p class="font-body-md text-body-md text-on-surface mb-6">
                        Lewati antrian. Kirim pesan langsung ke meja pro kami untuk harga, pengecekan ketersediaan, dan pengiriman cepat.
                    </p>
                    <a href="https://wa.me/6281234567890" target="_blank" class="w-full flex items-center justify-center space-x-2 font-body-md text-body-md font-bold text-white bg-[#25D366] hover:bg-[#1DA851] py-3 px-4 rounded-lg shadow-sm transition-all duration-200">
                        <span class="material-symbols-outlined">chat</span>
                        <span>Chat via WhatsApp</span>
                    </a>
                </div>

                {{-- Business Hours --}}
                <div class="bg-white rounded-xl border border-outline-variant p-md hover:shadow-lift hover:border-surface-tint transition-all duration-300">
                    <h3 class="font-headline-md text-headline-md text-on-surface mb-4 flex items-center">
                        <span class="material-symbols-outlined mr-2 text-primary">schedule</span> Jam Operasional
                    </h3>
                    <div class="space-y-2">
                        <div class="flex justify-between py-2 border-b border-outline-variant bg-surface-container-lowest px-2">
                            <span class="font-label-caps text-label-caps text-on-surface-variant">SENIN - JUMAT</span>
                            <span class="font-body-md text-body-md text-on-surface font-medium">06:00 - 19:00</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-outline-variant bg-surface px-2">
                            <span class="font-label-caps text-label-caps text-on-surface-variant">SABTU</span>
                            <span class="font-body-md text-body-md text-on-surface font-medium">07:00 - 17:00</span>
                        </div>
                        <div class="flex justify-between py-2 bg-surface-container-lowest px-2">
                            <span class="font-label-caps text-label-caps text-on-surface-variant">MINGGU</span>
                            <span class="font-body-md text-body-md text-on-surface font-medium text-secondary">Tutup</span>
                        </div>
                    </div>
                </div>

                {{-- Store Location --}}
                <div class="bg-white rounded-xl border border-outline-variant overflow-hidden hover:shadow-lift hover:border-surface-tint transition-all duration-300 flex flex-col h-full min-h-[300px]">
                    <div class="p-4 border-b border-outline-variant flex items-center justify-between">
                        <h3 class="font-label-sm text-label-sm font-bold text-on-surface flex items-center">
                            <span class="material-symbols-outlined mr-2 text-primary text-[20px]">location_on</span> Toko Utama
                        </h3>
                        <span class="font-label-caps text-label-caps text-primary-container bg-primary-fixed px-2 py-1 rounded-full">HQ</span>
                    </div>
                    <div class="flex-grow bg-surface-container-low relative">
                        <img class="object-cover w-full h-full absolute inset-0" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAIn-oEU2J4Q8o1fsftQhQNLq67MOCnnFugOmJQVjuMBMwxl6G4z8E20FQ6ziFhwNegtwGa_oaf9DOr8POH9tvczbbKkq357UCMLf0D020FKvfEwWFZPzBP8cKLFyY87FLH8Kb1XQvL8LCQSzPui3mYJybAxyQrBNC8yX_ytSIaRtSEiCfPRLQldCjpN90hsX6sKR4m3_hVrS3L25xoQsv0ZfWDwgNLCh4_irWJ-s1vbuURdBc-i3rXFw" alt="Lokasi Toko"/>
                    </div>
                    <div class="p-4 bg-surface-container-lowest">
                        <p class="font-body-md text-body-md text-on-surface">Jl. Raya Industri No. 140<br/>Surabaya, Jawa Timur 60175</p>
                    </div>
                </div>
            </div>

            {{-- Right Column --}}
            <div class="md:col-span-7 flex flex-col space-y-gutter">
                {{-- Contact Form --}}
                <div class="bg-white rounded-xl border border-outline-variant p-lg hover:shadow-lift hover:border-surface-tint transition-all duration-300 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-primary-fixed opacity-20 rounded-bl-full pointer-events-none"></div>
                    <h2 class="font-headline-md text-headline-md text-on-surface mb-2">Kirim Pesan</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-8">Untuk pesanan grosir, pertanyaan vendor, atau pertanyaan umum, silakan isi formulir di bawah.</p>
                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex flex-col">
                                <label class="font-label-sm text-label-sm text-on-surface mb-2" for="firstName">Nama Depan</label>
                                <input class="bg-[#F1F5F9] border border-transparent focus:border-primary-container focus:bg-white focus:ring-0 rounded-lg px-4 py-3 font-body-md text-body-md text-on-surface transition-colors" id="firstName" name="first_name" placeholder="Budi" type="text" required/>
                            </div>
                            <div class="flex flex-col">
                                <label class="font-label-sm text-label-sm text-on-surface mb-2" for="lastName">Nama Belakang</label>
                                <input class="bg-[#F1F5F9] border border-transparent focus:border-primary-container focus:bg-white focus:ring-0 rounded-lg px-4 py-3 font-body-md text-body-md text-on-surface transition-colors" id="lastName" name="last_name" placeholder="Santoso" type="text" required/>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex flex-col">
                                <label class="font-label-sm text-label-sm text-on-surface mb-2" for="email">Alamat Email</label>
                                <input class="bg-[#F1F5F9] border border-transparent focus:border-primary-container focus:bg-white focus:ring-0 rounded-lg px-4 py-3 font-body-md text-body-md text-on-surface transition-colors" id="email" name="email" placeholder="budi@perusahaan.com" type="email" required/>
                            </div>
                            <div class="flex flex-col">
                                <label class="font-label-sm text-label-sm text-on-surface mb-2" for="phone">Nomor Telepon</label>
                                <input class="bg-[#F1F5F9] border border-transparent focus:border-primary-container focus:bg-white focus:ring-0 rounded-lg px-4 py-3 font-body-md text-body-md text-on-surface transition-colors" id="phone" name="phone" placeholder="0812-3456-7890" type="tel"/>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <label class="font-label-sm text-label-sm text-on-surface mb-2" for="inquiryType">Jenis Pertanyaan</label>
                            <select class="bg-[#F1F5F9] border border-transparent focus:border-primary-container focus:bg-white focus:ring-0 rounded-lg px-4 py-3 font-body-md text-body-md text-on-surface transition-colors appearance-none" id="inquiryType" name="inquiry_type">
                                <option>Dukungan Umum</option>
                                <option>Pesanan Grosir/Komersial</option>
                                <option>Spesifikasi Produk</option>
                                <option>Hubungan Vendor</option>
                            </select>
                        </div>
                        <div class="flex flex-col">
                            <label class="font-label-sm text-label-sm text-on-surface mb-2" for="message">Pesan</label>
                            <textarea class="bg-[#F1F5F9] border border-transparent focus:border-primary-container focus:bg-white focus:ring-0 rounded-lg px-4 py-3 font-body-md text-body-md text-on-surface transition-colors resize-none" id="message" name="message" placeholder="Bagaimana kami bisa membantu proyek Anda hari ini?" rows="4" required></textarea>
                        </div>
                        <button class="w-full md:w-auto font-body-md text-body-md font-bold text-white bg-primary-container hover:bg-primary px-8 py-3 rounded-lg shadow-sm hover:shadow-lift transition-all duration-200" type="submit">
                            Kirim Pertanyaan
                        </button>
                    </form>
                </div>

                {{-- Company History --}}
                <div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-lg">
                    <h3 class="font-headline-md text-headline-md text-on-surface border-b border-outline-variant pb-4 mb-6">Fondasi Kami</h3>
                    <div class="prose max-w-none font-body-md text-body-md text-on-surface-variant space-y-4">
                        <p>
                            Didirikan pada tahun 1998 oleh sekelompok mantan manajer proyek dan insinyur struktural, BuildPro Hardware lahir dari kekecewaan terhadap material berstandar konsumen yang berlaku sebagai alat profesional. Kami membayangkan rantai pasok yang dibangun khusus untuk tuntutan lokasi proyek modern.
                        </p>
                        <p>
                            Yang dimulai sebagai satu gudang di pinggiran industri kota telah berkembang menjadi pusat regional untuk perangkat keras arsitektural, fastener berat, dan peralatan konstruksi khusus. Kami memasok langsung dari produsen yang memprioritaskan integritas metalurgi daripada kemasan massal.
                        </p>
                        <div class="bg-surface p-4 rounded-lg border-l-4 border-primary mt-6">
                            <strong class="font-label-sm text-label-sm text-on-surface block mb-1 uppercase tracking-wider">Prinsip Inti Kami</strong>
                            <p class="text-on-surface m-0 font-medium italic">"Menyediakan material yang menyatukan dunia, secara andal, setiap saat."</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

{{-- Mobile Version --}}
<div class="md:hidden">
    {{-- Hero --}}
    <section class="relative bg-surface-container-low border-b border-outline-variant py-xl overflow-hidden">
        <div class="px-margin-mobile relative z-10">
            <span class="font-label-caps text-label-caps text-primary tracking-widest uppercase mb-4 block">The Expert Partner</span>
            <h1 class="font-headline-lg-mobile text-headline-lg-mobile text-on-surface mb-4">
                Membangun Kepercayaan, Satu Proyek pada Satu Waktu.
            </h1>
            <p class="font-body-md text-body-md text-on-surface-variant mb-6">
                Sejak 1998, BuildPro Hardware telah menjadi pilar utama konstruksi profesional. Memastikan fondasi Anda selalu kokoh.
            </p>
            <a href="#contact" class="inline-flex items-center justify-center font-body-md text-body-md font-bold text-white bg-primary-container px-6 py-3 rounded-lg shadow-sm">
                Hubungi Kami
            </a>
        </div>
    </section>

    <section class="px-margin-mobile py-xl space-y-6" id="contact">
        {{-- WhatsApp Card --}}
        <a href="https://wa.me/6281234567890" target="_blank" class="bg-surface-container-lowest rounded-xl border border-outline-variant p-md flex items-center gap-4 hover:shadow-md hover:border-primary transition-all">
            <div class="w-12 h-12 bg-[#25D366] rounded-full flex items-center justify-center shrink-0">
                <span class="material-symbols-outlined text-white text-2xl">chat</span>
            </div>
            <div>
                <h3 class="font-label-sm text-label-sm text-on-surface font-bold">Chat WhatsApp</h3>
                <p class="font-body-md text-body-md text-on-surface-variant text-[14px]">Pesan langsung untuk harga dan pengiriman cepat</p>
            </div>
        </a>

        {{-- Hours --}}
        <div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-md">
            <h3 class="font-label-sm text-label-sm text-on-surface font-bold mb-4 flex items-center">
                <span class="material-symbols-outlined mr-2 text-primary">schedule</span> Jam Operasional
            </h3>
            <div class="space-y-2">
                <div class="flex justify-between py-2 px-2 bg-surface-container-lowest rounded">
                    <span class="font-label-caps text-label-caps text-on-surface-variant">SENIN - JUMAT</span>
                    <span class="font-body-md text-on-surface font-medium">06:00 - 19:00</span>
                </div>
                <div class="flex justify-between py-2 px-2 bg-surface rounded">
                    <span class="font-label-caps text-label-caps text-on-surface-variant">SABTU</span>
                    <span class="font-body-md text-on-surface font-medium">07:00 - 17:00</span>
                </div>
                <div class="flex justify-between py-2 px-2 bg-surface-container-lowest rounded">
                    <span class="font-label-caps text-label-caps text-on-surface-variant">MINGGU</span>
                    <span class="font-body-md text-secondary font-medium">Tutup</span>
                </div>
            </div>
        </div>

        {{-- Contact Form --}}
        <div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-md">
            <h2 class="font-headline-md text-headline-md text-on-surface mb-2">Kirim Pesan</h2>
            <p class="font-body-md text-body-md text-on-surface-variant mb-6">Isi formulir di bawah untuk pertanyaan Anda.</p>
            <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4">
                @csrf
                <input class="w-full bg-[#F1F5F9] border border-transparent focus:border-primary-container focus:bg-white focus:ring-0 rounded-lg px-4 py-3 font-body-md text-on-surface" name="first_name" placeholder="Nama Depan" type="text" required/>
                <input class="w-full bg-[#F1F5F9] border border-transparent focus:border-primary-container focus:bg-white focus:ring-0 rounded-lg px-4 py-3 font-body-md text-on-surface" name="email" placeholder="Email" type="email" required/>
                <input class="w-full bg-[#F1F5F9] border border-transparent focus:border-primary-container focus:bg-white focus:ring-0 rounded-lg px-4 py-3 font-body-md text-on-surface" name="phone" placeholder="Nomor Telepon" type="tel"/>
                <select class="w-full bg-[#F1F5F9] border border-transparent focus:border-primary-container focus:bg-white focus:ring-0 rounded-lg px-4 py-3 font-body-md text-on-surface" name="inquiry_type">
                    <option>Dukungan Umum</option>
                    <option>Pesanan Grosir/Komersial</option>
                    <option>Spesifikasi Produk</option>
                    <option>Hubungan Vendor</option>
                </select>
                <textarea class="w-full bg-[#F1F5F9] border border-transparent focus:border-primary-container focus:bg-white focus:ring-0 rounded-lg px-4 py-3 font-body-md text-on-surface resize-none" name="message" placeholder="Pesan Anda..." rows="3" required></textarea>
                <button class="w-full font-body-md text-body-md font-bold text-white bg-primary-container hover:bg-primary px-6 py-3 rounded-lg" type="submit">
                    Kirim Pertanyaan
                </button>
            </form>
        </div>

        {{-- Company History --}}
        <div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-md">
            <h3 class="font-headline-md text-headline-md text-on-surface border-b border-outline-variant pb-3 mb-4">Fondasi Kami</h3>
            <div class="font-body-md text-body-md text-on-surface-variant space-y-4">
                <p>Didirikan pada tahun 1998 oleh sekelompok mantan manajer proyek dan insinyur struktural, BuildPro Hardware lahir dari kekecewaan terhadap material berstandar konsumen yang berlaku sebagai alat profesional.</p>
                <p>Yang dimulai sebagai satu gudang di pinggiran industri kota telah berkembang menjadi pusat regional untuk perangkat keras arsitektural, fastener berat, dan peralatan konstruksi khusus.</p>
                <div class="bg-surface p-4 rounded-lg border-l-4 border-primary mt-4">
                    <strong class="font-label-sm text-label-sm text-on-surface block mb-1 uppercase tracking-wider">Prinsip Inti Kami</strong>
                    <p class="text-on-surface m-0 font-medium italic">"Menyediakan material yang menyatukan dunia, secara andal, setiap saat."</p>
                </div>
            </div>
        </div>
    </section>
</div>

</div>
@endsection

@push('styles')
<style>
    .hero-pattern {
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%231e3a8a' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
</style>
@endpush