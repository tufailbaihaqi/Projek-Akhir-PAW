@extends('layouts.admin')
@section('title', 'Reservasi & Operasional')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-slate-900">Daftar Layanan</h1>
        <p class="text-sm text-slate-500 mt-0.5">Kelola daftar layanan barbershop yang tersedia untuk pelanggan.</p>
    </div>
</div>

<div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
    <div class="p-4 border-b border-slate-100 flex items-center justify-between">
        <span class="text-xs font-semibold text-slate-500">Total: {{ $services->count() }} layanan</span>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-slate-100 text-[11px] font-bold uppercase tracking-wider text-slate-400 bg-slate-50/60">
                    <th class="py-3.5 px-5">NO</th>
                    <th class="py-3.5 px-5">NAMA LAYANAN</th>
                    <th class="py-3.5 px-5">DESKRIPSI</th>
                    <th class="py-3.5 px-5">HARGA</th>
                    <th class="py-3.5 px-5 text-right">AKSI</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm">
                @forelse ($services as $index => $service)
                    <tr class="hover:bg-slate-50/70">
                        <td class="py-4 px-5 text-slate-500">{{ $index + 1 }}</td>
                        <td class="py-4 px-5 font-semibold text-slate-900">{{ $service->name }}</td>
                        <td class="py-4 px-5 text-slate-600">{{ $service->description ?? '-' }}</td>
                        <td class="py-4 px-5 font-semibold text-slate-800">
                            Rp {{ number_format($service->price, 0, ',', '.') }}
                        </td>
                        <td class="py-4 px-5 text-right text-xs text-slate-400">
                            Tersedia
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-14 text-center text-sm text-slate-400">
                            Belum ada data layanan yang tersedia.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection