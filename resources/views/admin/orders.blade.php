@extends('admin.layout')

@section('title', 'Pesanan')

@section('admin-content')
{{-- Page Header -->}
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4">
    <div>
        <h1 class="font-headline-lg text-headline-lg text-on-surface md:text-[32px] md:leading-[40px]">Manajemen Pesanan</h1>
        <p class="font-body-md text-body-md text-on-surface-variant mt-xs">Kelola dan lacak pengiriman hardware.</p>
    </div>
    <div class="flex space-x-3">
        <button class="flex items-center space-x-2 px-4 py-2 border-[1.5px] border-primary text-primary rounded-lg font-label-sm text-label-sm font-bold hover:bg-primary-container/5 transition-colors">
            <span class="material-symbols-outlined text-sm">filter_list</span>
            <span>Filter</span>
        </button>
        <button class="flex items-center space-x-2 px-4 py-2 bg-[#F97316] text-white rounded-lg font-label-sm text-label-sm font-bold hover:bg-[#EA580C] shadow-sm transition-colors">
            <span class="material-symbols-outlined text-sm">download</span>
            <span>Export</span>
        </button>
    </div>
</div>

{{-- Stats Bento -->}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-gutter mt-md">
    <div class="lg:col-span-3 bg-surface-container-lowest/95 border border-outline-variant rounded-xl p-md flex flex-col justify-between hover:shadow-sm transition-shadow">
        <div class="flex justify-between items-start">
            <span class="font-label-caps text-label-caps text-on-surface-variant uppercase">Total Pesanan</span>
            <div class="w-8 h-8 rounded bg-primary-container/10 flex items-center justify-center text-primary">
                <span class="material-symbols-outlined text-sm">receipt_long</span>
            </div>
        </div>
        <div class="mt-md">
            <span class="font-headline-lg text-headline-lg">{{ number_format($totalOrders, 0, ',', '.') }}</span>
            <div class="flex items-center text-secondary mt-1 font-label-sm text-label-sm">
                <span class="material-symbols-outlined text-[16px] mr-1">trending_up</span>
                <span>+12% bulan ini</span>
            </div>
        </div>
    </div>
    <div class="lg:col-span-3 bg-surface-container-lowest/95 border border-outline-variant rounded-xl p-md flex flex-col justify-between hover:shadow-sm transition-shadow border-l-4 border-l-[#F97316]">
        <div class="flex justify-between items-start">
            <span class="font-label-caps text-label-caps text-on-surface-variant uppercase">Pending Proses</span>
            <div class="w-8 h-8 rounded bg-secondary-container/10 flex items-center justify-center text-[#F97316]">
                <span class="material-symbols-outlined text-sm">pending_actions</span>
            </div>
        </div>
        <div class="mt-md">
            <span class="font-headline-lg text-headline-lg">{{ $pendingCount }}</span>
            <p class="text-on-surface-variant mt-1 font-label-sm text-label-sm">Perlu perhatian</p>
        </div>
    </div>
    <div class="lg:col-span-6 bg-surface-container-lowest/95 border border-outline-variant rounded-xl p-md flex items-center justify-center relative overflow-hidden group">
        <div class="absolute inset-0 bg-gradient-to-br from-primary-container to-[#1E3A8A] opacity-90 z-0"></div>
        <div class="relative z-10 flex flex-col sm:flex-row w-full justify-between items-center gap-4 px-4 py-2">
            <div class="text-white text-center sm:text-left">
                <h3 class="font-headline-md text-headline-md mb-xs">Q3 Supply Check</h3>
                <p class="font-body-md text-body-md text-white/80 max-w-sm">Review pengiriman masuk dari vendor utama sebelum tutup bulan.</p>
            </div>
            <button class="px-6 py-2 bg-white text-[#1E3A8A] rounded font-label-sm text-label-sm font-bold shadow-sm hover:shadow-md transition-all whitespace-nowrap">Review Schedule</button>
        </div>
    </div>
</div>

{{-- Desktop Table -->}
<div class="hidden sm:block bg-surface-container-lowest/95 border border-outline-variant rounded-xl overflow-hidden flex flex-col shadow-sm mt-md">
    {{-- Tabs -->}
    <div class="border-b border-outline-variant px-md flex space-x-8 bg-surface">
        <a href="{{ route('admin.orders') }}" class="py-md font-label-sm text-label-sm font-bold text-primary border-b-2 border-primary transition-colors">Semua Pesanan</a>
        <a href="{{ route('admin.orders', ['status' => 'pending']) }}" class="py-md font-label-sm text-label-sm font-medium text-on-surface-variant hover:text-on-surface transition-colors">Pending</a>
        <a href="{{ route('admin.orders', ['status' => 'processing']) }}" class="py-md font-label-sm text-label-sm font-medium text-on-surface-variant hover:text-on-surface transition-colors">Diproses</a>
        <a href="{{ route('admin.orders', ['status' => 'completed']) }}" class="py-md font-label-sm text-label-sm font-medium text-on-surface-variant hover:text-on-surface transition-colors">Selesai</a>
    </div>

    <div class="overflow-x-auto bg-white">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-surface border-b border-outline-variant">
                    <th class="py-3 px-6 font-label-caps text-label-caps text-on-surface-variant uppercase whitespace-nowrap">Order ID</th>
                    <th class="py-3 px-6 font-label-caps text-label-caps text-on-surface-variant uppercase">Nama Pelanggan</th>
                    <th class="py-3 px-6 font-label-caps text-label-caps text-on-surface-variant uppercase whitespace-nowrap">Tanggal & Waktu</th>
                    <th class="py-3 px-6 font-label-caps text-label-caps text-on-surface-variant uppercase text-right">Total</th>
                    <th class="py-3 px-6 font-label-caps text-label-caps text-on-surface-variant uppercase">Status</th>
                    <th class="py-3 px-6 font-label-caps text-label-caps text-on-surface-variant uppercase text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="font-body-md text-body-md text-on-surface divide-y divide-outline-variant">
                @foreach($orders as $order)
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
                <tr class="hover:bg-surface-container/50 transition-colors group">
                    <td class="py-4 px-6 font-label-caps text-label-caps font-bold text-primary whitespace-nowrap">{{ $order->order_id }}</td>
                    <td class="py-4 px-6 font-medium">{{ $order->customer_name }}</td>
                    <td class="py-4 px-6 text-on-surface-variant whitespace-nowrap">
                        {{ $order->created_at->format('M d, Y') }}
                        <span class="text-sm ml-1 text-outline">{{ $order->created_at->format('H:i') }}</span>
                    </td>
                    <td class="py-4 px-6 text-right font-medium">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                    <td class="py-4 px-6">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusClasses }}">{{ $statusText }}</span>
                    </td>
                    <td class="py-4 px-6 text-center">
                        @if($order->status !== 'completed' && $order->status !== 'cancelled')
                        <form method="POST" action="{{ route('admin.orders.update-status', $order) }}" class="inline">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="{{ $order->status === 'pending' ? 'processing' : 'completed' }}"/>
                            <button type="submit" class="px-3 py-1.5 border-[1.5px] border-primary text-primary rounded font-label-sm text-[13px] font-bold hover:bg-primary hover:text-white transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100 whitespace-nowrap">
                                {{ $order->status === 'pending' ? 'Proses' : 'Selesai' }}
                            </button>
                        </form>
                        @else
                        <button class="px-3 py-1.5 border border-outline text-outline rounded font-label-sm text-[13px] font-bold cursor-not-allowed opacity-50 whitespace-nowrap" disabled>
                            Selesai
                        </button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination -->}
    <div class="px-6 py-4 bg-white border-t border-outline-variant flex justify-between items-center">
        <span class="font-label-sm text-label-sm text-on-surface-variant">Menampilkan {{ $orders->firstItem() ?? 0 }}-{{ $orders->lastItem() ?? 0 }} dari {{ $orders->total() }} entri</span>
        <div class="flex space-x-1">
            {{ $orders->appends(request()->query())->links() }}
        </div>
    </div>
</div>

{{-- Mobile Card View -->}
<div class="sm:hidden mt-md">
    {{-- Mobile Tabs -->}
    <div class="flex space-x-2 mb-4 overflow-x-auto pb-1">
        <a href="{{ route('admin.orders') }}" class="px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap transition-colors {{ !request('status') || request('status') === 'all' ? 'bg-primary text-on-primary' : 'bg-surface-container text-on-surface-variant hover:bg-surface-container-high' }}">Semua</a>
        <a href="{{ route('admin.orders', ['status' => 'pending']) }}" class="px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap transition-colors {{ request('status') === 'pending' ? 'bg-primary text-on-primary' : 'bg-surface-container text-on-surface-variant hover:bg-surface-container-high' }}">Pending</a>
        <a href="{{ route('admin.orders', ['status' => 'processing']) }}" class="px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap transition-colors {{ request('status') === 'processing' ? 'bg-primary text-on-primary' : 'bg-surface-container text-on-surface-variant hover:bg-surface-container-high' }}">Diproses</a>
        <a href="{{ route('admin.orders', ['status' => 'completed']) }}" class="px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap transition-colors {{ request('status') === 'completed' ? 'bg-primary text-on-primary' : 'bg-surface-container text-on-surface-variant hover:bg-surface-container-high' }}">Selesai</a>
    </div>

    <div class="flex flex-col gap-3">
        @foreach($orders as $order)
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
        <div class="bg-surface-container-lowest border border-outline-variant rounded-lg p-4">
            <div class="flex justify-between items-start mb-2">
                <span class="font-label-caps text-label-caps text-primary font-bold">{{ $order->order_id }}</span>
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-medium {{ $statusClasses }}">{{ $statusText }}</span>
            </div>
            <p class="font-medium text-on-surface">{{ $order->customer_name }}</p>
            <div class="flex justify-between items-center mt-2 text-sm text-on-surface-variant">
                <span>{{ $order->created_at->format('d M Y, H:i') }}</span>
                <span class="font-bold text-on-surface">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
            </div>
            @if($order->status !== 'completed' && $order->status !== 'cancelled')
            <form method="POST" action="{{ route('admin.orders.update-status', $order) }}" class="mt-3">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="{{ $order->status === 'pending' ? 'processing' : 'completed' }}"/>
                <button type="submit" class="w-full py-2 bg-primary text-on-primary rounded-lg text-sm font-bold hover:bg-primary-container transition-colors">
                    {{ $order->status === 'pending' ? 'Proses Pesanan' : 'Tandai Selesai' }}
                </button>
            </form>
            @endif
        </div>
        @endforeach
    </div>

    {{-- Mobile Pagination -->}
    <div class="mt-4 text-center">
        <span class="text-sm text-on-surface-variant">{{ $orders->total() }} pesanan</span>
        <div class="mt-2">
            {{ $orders->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection