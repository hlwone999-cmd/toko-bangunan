@extends('admin.layout')

@section('title', 'Dashboard')

@section('admin-content')
{{-- Page Header -->}
<div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-lg gap-4">
    <div>
        <h2 class="font-headline-lg text-headline-lg text-on-surface md:text-[32px] md:leading-[40px]">Overview</h2>
        <p class="font-body-md text-body-md text-on-surface-variant mt-xs">Metrik real-time untuk rantai pasok hardware Anda.</p>
    </div>
    <button class="px-sm py-[6px] border-[1.5px] border-primary-container text-primary-container font-label-sm text-label-sm rounded hover:bg-surface-container transition-colors bg-surface-container-lowest shadow-sm flex items-center gap-xs">
        <span class="material-symbols-outlined text-sm">download</span>
        Export Laporan
    </button>
</div>

{{-- Summary Cards -->}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-gutter mb-xl">
    {{-- Total Sales Today -->}
    <div class="bg-surface-container-lowest border border-outline-variant rounded-lg p-md flex flex-col justify-between group hover:shadow-lg transition-shadow duration-300 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-primary-container/5 rounded-bl-full -z-10 group-hover:scale-110 transition-transform"></div>
        <div>
            <div class="flex justify-between items-center mb-sm">
                <span class="font-label-caps text-label-caps text-on-surface-variant">PENJUALAN HARI INI</span>
                <span class="material-symbols-outlined text-primary-container text-[20px]">payments</span>
            </div>
            <h3 class="font-headline-md text-headline-md font-bold text-on-surface">Rp {{ number_format($todaySales, 0, ',', '.') }}</h3>
            <div class="flex items-center gap-xs mt-xs text-primary">
                <span class="material-symbols-outlined text-[16px]">trending_up</span>
                <span class="font-label-sm text-label-sm">Data real-time</span>
            </div>
        </div>
        <div class="mt-md h-12 w-full">
            <svg class="w-full h-full" preserveAspectRatio="none" stroke="#1e3a8a" fill="none" stroke-width="2" viewbox="0 0 100 30">
                <path d="M0,25 Q10,20 20,22 T40,15 T60,18 T80,5 T100,2"></path>
                <path class="stroke-none" style="fill: rgba(30,58,138,0.1)" d="M0,25 Q10,20 20,22 T40,15 T60,18 T80,5 T100,2 L100,30 L0,30 Z"></path>
            </svg>
        </div>
    </div>

    {{-- Total All Sales -->}
    <div class="bg-surface-container-lowest border border-outline-variant rounded-lg p-md flex flex-col justify-between group hover:shadow-lg transition-shadow duration-300 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-primary-fixed/10 rounded-bl-full -z-10 group-hover:scale-110 transition-transform"></div>
        <div>
            <div class="flex justify-between items-center mb-sm">
                <span class="font-label-caps text-label-caps text-on-surface-variant">TOTAL PENJUALAN</span>
                <span class="material-symbols-outlined text-primary text-[20px]">account_balance_wallet</span>
            </div>
            <h3 class="font-headline-md text-headline-md font-bold text-on-surface">Rp {{ number_format($totalSales, 0, ',', '.') }}</h3>
            <div class="flex items-center gap-xs mt-xs text-on-surface-variant">
                <span class="font-label-sm text-label-sm">Semua transaksi</span>
            </div>
        </div>
    </div>

    {{-- New Orders -->}
    <div class="bg-surface-container-lowest border border-outline-variant rounded-lg p-md flex flex-col justify-between group hover:shadow-lg transition-shadow duration-300 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-secondary-container/5 rounded-bl-full -z-10 group-hover:scale-110 transition-transform"></div>
        <div>
            <div class="flex justify-between items-center mb-sm">
                <span class="font-label-caps text-label-caps text-on-surface-variant">PESANAN BARU</span>
                <span class="material-symbols-outlined text-secondary-container text-[20px]">local_shipping</span>
            </div>
            <h3 class="font-headline-md text-headline-md font-bold text-on-surface">{{ $newOrders }}</h3>
            <div class="flex items-center gap-xs mt-xs text-on-surface-variant">
                <span class="font-label-sm text-label-sm">Perlu diproses segera</span>
            </div>
        </div>
        <div class="mt-md flex -space-x-2">
            <div class="w-8 h-8 rounded-full bg-surface-container border-2 border-surface-container-lowest flex items-center justify-center text-xs font-bold text-on-surface-variant">A</div>
            <div class="w-8 h-8 rounded-full bg-surface-dim border-2 border-surface-container-lowest flex items-center justify-center text-xs font-bold text-on-surface-variant">B</div>
            <div class="w-8 h-8 rounded-full bg-primary-fixed border-2 border-surface-container-lowest flex items-center justify-center text-xs font-bold text-primary">+{{ $newOrders }}</div>
        </div>
    </div>

    {{-- Low Stock -->}
    <div class="bg-surface-container-lowest border border-outline-variant rounded-lg p-md flex flex-col justify-between group hover:shadow-lg transition-shadow duration-300 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-error-container/5 rounded-bl-full -z-10 group-hover:scale-110 transition-transform"></div>
        <div>
            <div class="flex justify-between items-center mb-sm">
                <span class="font-label-caps text-label-caps text-on-surface-variant">STOK MENIPIS</span>
                <span class="material-symbols-outlined text-error text-[20px]">warning</span>
            </div>
            <h3 class="font-headline-md text-headline-md font-bold text-on-surface">{{ $lowStock }} Produk</h3>
            <div class="flex items-center gap-xs mt-xs text-error">
                <span class="font-label-sm text-label-sm">Perlu tindakan segera</span>
            </div>
        </div>
        <div class="mt-md">
            <a href="{{ route('admin.inventory') }}" class="block w-full py-[6px] border border-outline-variant text-on-surface font-label-sm text-label-sm rounded hover:border-primary-container transition-colors text-center">
                Review Inventaris
            </a>
        </div>
    </div>
</div>

{{-- Chart Section -->}
<div class="mb-xl">
    <div class="bg-surface-container-lowest border border-outline-variant rounded-lg p-md">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-md border-b border-outline-variant pb-sm gap-2">
            <h3 class="font-headline-md text-headline-md font-bold text-on-surface">Aktivitas Penjualan (7 Hari Terakhir)</h3>
            <div class="flex gap-sm">
                <span class="flex items-center gap-xs font-label-sm text-label-sm text-on-surface-variant">
                    <span class="w-3 h-3 rounded-full bg-primary-container block"></span> Volume
                </span>
            </div>
        </div>
        <div class="h-48 sm:h-64 w-full relative">
            <div class="absolute inset-0 flex flex-col justify-between text-xs text-on-surface-variant opacity-50 font-label-caps">
                <div class="border-b border-outline-variant/30 w-full h-0"></div>
                <div class="border-b border-outline-variant/30 w-full h-0"></div>
                <div class="border-b border-outline-variant/30 w-full h-0"></div>
                <div class="border-b border-outline-variant/30 w-full h-0"></div>
                <div class="border-b border-outline-variant/30 w-full h-0"></div>
            </div>
            <svg class="w-full h-full" preserveAspectRatio="none" stroke="#1e3a8a" fill="none" stroke-width="3" viewbox="0 0 1000 250">
                <defs><lineargradient id="chart-grad" x1="0" x2="0" y1="0" y2="1"><stop offset="0%" stop-color="#1e3a8a" stop-opacity="0.2"></stop><stop offset="100%" stop-color="#1e3a8a" stop-opacity="0"></stop></lineargradient></defs>
                <path d="M0,200 L100,180 L200,210 L300,120 L400,150 L500,80 L600,110 L700,50 L800,90 L900,40 L1000,60"></path>
                <path class="stroke-none" style="fill: url(#chart-grad)" d="M0,200 L100,180 L200,210 L300,120 L400,150 L500,80 L600,110 L700,50 L800,90 L900,40 L1000,60 L1000,250 L0,250 Z"></path>
                <circle class="fill-[#f8f9ff]" style="stroke: #1e3a8a" cx="100" cy="180" r="4" stroke-width="2"></circle>
                <circle class="fill-[#f8f9ff]" style="stroke: #1e3a8a" cx="300" cy="120" r="4" stroke-width="2"></circle>
                <circle class="fill-[#f8f9ff]" style="stroke: #1e3a8a" cx="500" cy="80" r="4" stroke-width="2"></circle>
                <circle class="fill-[#f8f9ff]" style="stroke: #1e3a8a" cx="700" cy="50" r="4" stroke-width="2"></circle>
                <circle class="fill-[#f8f9ff]" style="stroke: #1e3a8a" cx="900" cy="40" r="4" stroke-width="2"></circle>
            </svg>
            <div class="absolute bottom-0 w-full flex justify-between text-xs text-on-surface-variant mt-2 font-label-caps pt-sm translate-y-full">
                <span>Sen</span><span>Sel</span><span>Rab</span><span>Kam</span><span>Jum</span><span>Sab</span><span>Min</span>
            </div>
        </div>
    </div>
</div>

{{-- Recent Orders Table -->}
<div class="mt-xl">
    <div class="bg-surface-container-lowest border border-outline-variant rounded-lg overflow-hidden shadow-sm">
        <div class="p-md border-b border-outline-variant flex flex-col sm:flex-row justify-between items-start sm:items-center bg-surface-bright gap-2">
            <h3 class="font-headline-md text-headline-md font-bold text-on-surface">Pesanan Terbaru</h3>
            <a href="{{ route('admin.orders') }}" class="text-primary-container font-label-sm text-label-sm hover:underline flex items-center gap-1">
                Lihat Semua
                <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </a>
        </div>
        {{-- Mobile Card View -->}
        <div class="sm:hidden divide-y divide-outline-variant/50">
            @forelse($recentOrders as $order)
            @php
                $statusClasses = match($order->status) {
                    'completed' => 'bg-inverse-on-surface text-inverse-surface',
                    'pending' => 'bg-error-container text-on-error-container',
                    'processing' => 'bg-surface-container-high text-primary',
                    'cancelled' => 'bg-surface-dim text-on-surface',
                    default => 'bg-surface-container text-on-surface',
                };
                $statusText = match($order->status) {
                    'completed' => 'Selesai',
                    'pending' => 'Pending',
                    'processing' => 'Diproses',
                    'cancelled' => 'Dibatalkan',
                    default => $order->status,
                };
            @endphp
            <div class="p-4">
                <div class="flex justify-between items-start mb-2">
                    <span class="font-label-caps text-label-caps text-primary font-bold">{{ $order->order_id }}</span>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-medium {{ $statusClasses }}">{{ $statusText }}</span>
                </div>
                <p class="font-medium text-on-surface">{{ $order->customer_name }}</p>
                <div class="flex justify-between items-center mt-2 text-sm text-on-surface-variant">
                    <span>{{ $order->created_at->format('d M Y') }}</span>
                    <span class="font-bold text-on-surface">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                </div>
            </div>
            @empty
            <div class="p-8 text-center text-on-surface-variant">
                <span class="material-symbols-outlined text-4xl text-outline-variant block mx-auto mb-2">inbox</span>
                <p class="font-label-sm">Belum ada pesanan</p>
            </div>
            @endforelse
        </div>
        {{-- Desktop Table View -->}
        <div class="hidden sm:block overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-surface-container-low border-b border-outline-variant">
                        <th class="py-sm px-md font-label-caps text-label-caps text-on-surface-variant font-semibold">ORDER ID</th>
                        <th class="py-sm px-md font-label-caps text-label-caps text-on-surface-variant font-semibold">PELANGGAN</th>
                        <th class="py-sm px-md font-label-caps text-label-caps text-on-surface-variant font-semibold">TANGGAL</th>
                        <th class="py-sm px-md font-label-caps text-label-caps text-on-surface-variant font-semibold text-right">TOTAL</th>
                        <th class="py-sm px-md font-label-caps text-label-caps text-on-surface-variant font-semibold">STATUS</th>
                    </tr>
                </thead>
                <tbody class="font-body-md text-body-md text-on-surface">
                    @forelse($recentOrders as $order)
                    <tr class="border-b border-outline-variant/50 hover:bg-surface-container-low/50 transition-colors">
                        <td class="py-sm px-md font-label-caps text-label-caps text-primary">{{ $order->order_id }}</td>
                        <td class="py-sm px-md font-medium">{{ $order->customer_name }}</td>
                        <td class="py-sm px-md text-on-surface-variant">{{ $order->created_at->format('M d, Y') }}</td>
                        <td class="py-sm px-md text-right font-medium">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                        <td class="py-sm px-md">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-[12px] font-medium {{ $statusClasses ?? '' }}">{{ $statusText ?? '' }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-8 text-center text-on-surface-variant">
                            <span class="material-symbols-outlined text-4xl text-outline-variant block mx-auto mb-2">inbox</span>
                            Belum ada pesanan
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection