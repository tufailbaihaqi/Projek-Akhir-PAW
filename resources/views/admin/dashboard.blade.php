@extends('layouts.admin')
@section('title', 'Reservasi & Operasional')

@section('content')
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
    <div>
        <h1 class="text-2xl font-bold text-slate-900">Reservasi &amp; Operasional</h1>
        <p class="text-sm text-slate-500 mt-0.5">Daftar reservasi dan status pembayaran untuk tanggal yang dipilih.</p>
    </div>
</div>

<!-- KPI Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">
    <div class="bg-white rounded-2xl border border-slate-200/80 p-6 flex items-center justify-between shadow-sm">
        <div>
            <div class="text-[11px] font-bold uppercase tracking-wider text-slate-500">TOTAL RESERVATION</div>
            <div class="text-3xl font-extrabold text-slate-900 mt-2">{{ $totalReservations }}</div>
        </div>
        <div class="w-11 h-11 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold">
            &#128197;
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/80 p-6 flex items-center justify-between shadow-sm">
        <div>
            <div class="text-[11px] font-bold uppercase tracking-wider text-slate-500">TOTAL CANCELED</div>
            <div class="text-3xl font-extrabold text-slate-900 mt-2">{{ $totalCanceled }}</div>
        </div>
        <div class="w-11 h-11 rounded-xl bg-red-100 text-red-600 flex items-center justify-center font-bold">
            &#10005;
        </div>
    </div>
</div>

<!-- Filter & Tabel Reservasi -->
<div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
    <form method="GET" action="{{ route('admin.dashboard') }}" class="p-4 border-b border-slate-100 flex flex-wrap items-center justify-between gap-3">
        <div class="flex flex-wrap items-center gap-3">
            <input type="text" name="search" value="{{ $search }}" placeholder="Cari nama / telepon..."
                   class="rounded-xl bg-slate-50 border border-slate-200 px-4 py-2 text-sm w-64 focus:bg-white focus:border-[#133B2C] focus:outline-none">
            <div class="flex items-center gap-2 rounded-xl bg-slate-50 border border-slate-200 px-3 py-1.5 text-sm">
                <span class="text-slate-500 text-xs">Tanggal:</span>
                <input type="date" name="date" value="{{ $date }}" onchange="this.form.submit()"
                       class="bg-transparent text-slate-800 font-semibold focus:outline-none">
            </div>
            <button type="submit" class="px-4 py-2 rounded-xl bg-[#133B2C] text-white text-xs font-semibold hover:bg-[#0D2B20]">Filter</button>
        </div>
        <span class="text-xs text-slate-400">{{ $bookings->count() }} reservasi</span>
    </form>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-slate-100 text-[11px] font-bold uppercase tracking-wider text-slate-400 bg-slate-50/60">
                    <th class="py-3.5 px-5">PELANGGAN / NAME</th>
                    <th class="py-3.5 px-5">PHONE</th>
                    <th class="py-3.5 px-5">SERVICE &amp; JAM</th>
                    <th class="py-3.5 px-5">PRICE</th>
                    <th class="py-3.5 px-5">STATUS &amp; PEMBAYARAN</th>
                    <th class="py-3.5 px-5 text-right">ACTIONS</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm">
                @forelse ($bookings as $booking)
                    <tr class="hover:bg-slate-50/70">
                        <td class="py-4 px-5 font-semibold text-slate-900">{{ $booking->customer_name }}</td>
                        <td class="py-4 px-5 text-slate-600">{{ $booking->customer_phone }}</td>
                        <td class="py-4 px-5">
                            <div class="font-medium text-slate-800">{{ $booking->service->name ?? '-' }}</div>
                            <div class="text-xs text-slate-400">Pukul {{ $booking->time_slot }} WIB</div>
                        </td>
                        <td class="py-4 px-5 font-semibold text-slate-800">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                        <td class="py-4 px-5">
                            <form action="{{ route('admin.bookings.status', $booking) }}" method="POST" class="flex items-center gap-2">
                                @csrf
                                @method('PATCH')
                                <select name="status" class="rounded-lg border border-slate-200 bg-slate-50 px-2 py-1 text-xs font-semibold">
                                    <option value="pending" @selected($booking->status === 'pending')>Pending</option>
                                    <option value="confirmed" @selected($booking->status === 'confirmed')>Confirmed</option>
                                    <option value="completed" @selected($booking->status === 'completed')>Completed</option>
                                    <option value="canceled" @selected($booking->status === 'canceled')>Canceled</option>
                                </select>
                                <select name="payment_status" class="rounded-lg border border-slate-200 bg-slate-50 px-2 py-1 text-xs font-semibold">
                                    <option value="unpaid" @selected($booking->payment_status === 'unpaid')>Unpaid</option>
                                    <option value="paid" @selected($booking->payment_status === 'paid')>Paid</option>
                                    <option value="refunded" @selected($booking->payment_status === 'refunded')>Refunded</option>
                                </select>
                        </td>
                        <td class="py-4 px-5 text-right">
                                <button type="submit" class="px-3 py-1.5 rounded-lg bg-[#133B2C] text-white text-xs font-semibold hover:bg-[#0D2B20]">Simpan</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-14 text-center text-sm text-slate-400">
                            Tidak ada reservasi pada tanggal ini.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="px-5 py-3.5 border-t border-slate-100 text-xs text-slate-400">
        Menampilkan {{ $bookings->count() }} reservasi untuk {{ $date }}.
    </div>
</div>
@endsection
