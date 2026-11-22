<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Administration Portal') - PEMON Barbershop</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F8FAFC] text-slate-800 antialiased">
<div class="min-h-screen flex">
    <!-- Sidebar Kiri -->
    <aside class="w-64 bg-white border-r border-slate-200/80 flex flex-col justify-between p-5 shrink-0">
        <div>
            <!-- Logo Brand -->
            <div class="flex items-center gap-3 mb-6">
                <div class="w-9 h-9 rounded-xl bg-[#133B2C] text-white font-bold flex items-center justify-center">P</div>
                <div>
                    <div class="font-extrabold text-sm tracking-tight text-slate-900 leading-none">PEMON</div>
                    <div class="text-[10px] tracking-widest text-slate-400 mt-1">BARBERSHOP</div>
                </div>
            </div>

            <!-- Profil Admin Card -->
            <div class="bg-slate-50 border border-slate-200/60 rounded-xl p-3 flex items-center gap-3 mb-6">
                <div class="w-9 h-9 rounded-full bg-[#133B2C] text-white flex items-center justify-center text-xs font-bold">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>
                <div class="overflow-hidden">
                    <div class="text-xs font-bold text-slate-900 truncate">{{ auth()->user()->name ?? 'Admin Barbershop' }}</div>
                    <div class="text-[11px] text-slate-400 capitalize">{{ auth()->user()->role ?? 'Administrator' }}</div>
                </div>
            </div>

            <!-- Navigasi Menu -->
            <nav class="space-y-1.5 text-sm font-medium">
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('admin.dashboard') ? 'bg-[#133B2C] text-white shadow-sm' : 'text-slate-600 hover:bg-slate-100' }}">
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-100 transition">
                    <span>Reservations</span>
                </a>
                <a href="{{ route('admin.services') }}"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('admin.services') ? 'bg-[#133B2C] text-white shadow-sm' : 'text-slate-600 hover:bg-slate-100' }}">
                    <span>Services</span>
                </a>
            </nav>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full flex items-center gap-2.5 px-3.5 py-2.5 rounded-xl text-sm font-semibold text-red-600 hover:bg-red-50 transition">
                <span>&larr; Log Out</span>
            </button>
        </form>
    </aside>

    <!-- Konten Utama -->
    <div class="flex-1 flex flex-col">
        <header class="h-16 bg-white border-b border-slate-200/80 px-8 flex items-center justify-between">
            <div class="text-xs text-slate-500 flex items-center gap-2">
                <span>Studio Management</span>
                <span>&rsaquo;</span>
                <strong class="text-slate-900">Administration Portal</strong>
            </div>
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-full bg-[#133B2C] text-white text-xs font-bold flex items-center justify-center">A</div>
                <span class="text-xs font-semibold text-slate-700">Akun</span>
            </div>
        </header>

        <main class="p-8 flex-1">
            @if (session('success'))
                <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-sm text-emerald-800">
                    {{ session('success') }}
                </div>
            @endif
            @yield('content')
        </main>

        <footer class="text-center text-xs text-slate-400 py-6">
            &copy; 2026 Pemon Barbershop &bull; Administration Portal
        </footer>
    </div>
</div>
</body>
</html>
