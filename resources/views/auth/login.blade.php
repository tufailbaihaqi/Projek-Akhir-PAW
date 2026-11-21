<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk ke Akun - PEMON Barbershop</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F8FAFC] min-h-screen flex flex-col justify-between text-slate-800 antialiased">
    <header class="w-full max-w-6xl mx-auto px-6 py-6 flex items-center justify-between">
        <div class="flex items-center gap-2.5">
            <span class="font-extrabold tracking-tight text-lg text-slate-900">PEMON</span>
            <span class="text-emerald-700 text-xs font-bold tracking-wider">PORTAL</span>
        </div>
        <div class="text-xs text-slate-400">256-Bit Encrypted</div>
    </header>

    <main class="px-4 my-4">
        <div class="max-w-md mx-auto bg-white rounded-2xl border border-slate-200/80 shadow-sm p-8">
            <div class="flex flex-col items-center text-center mb-6">
                <div class="w-11 h-11 rounded-xl bg-[#133B2C] text-white flex items-center justify-center mb-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z"/></svg>
                </div>
                <span class="bg-emerald-50 text-emerald-800 text-[10px] font-bold px-3 py-1 rounded-full tracking-wider uppercase mb-2">PORTAL AKSES</span>
                <h1 class="text-2xl font-bold text-slate-900">Masuk ke Akun</h1>
                <p class="text-sm text-slate-500 mt-1">Masukkan kredensial Anda untuk mengakses dashboard</p>
            </div>

            @if ($errors->any())
                <div class="mb-4 p-3 rounded-xl bg-red-50 border border-red-200 text-xs text-red-700">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-600 mb-1.5">EMAIL / NAMA PENGGUNA</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="admin@pemonbarbershop.com" required
                           class="w-full rounded-xl bg-slate-50 border border-slate-200 px-3.5 py-2.5 text-sm focus:bg-white focus:border-[#133B2C] focus:outline-none">
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="text-[11px] font-bold uppercase tracking-wider text-slate-600">KATA SANDI</label>
                        <a href="#" class="text-xs text-slate-500 hover:text-slate-800">Lupa sandi?</a>
                    </div>
                    <input type="password" name="password" placeholder="••••••••••••" required
                           class="w-full rounded-xl bg-slate-50 border border-slate-200 px-3.5 py-2.5 text-sm focus:bg-white focus:border-[#133B2C] focus:outline-none">
                </div>

                <label class="flex items-center gap-2 text-xs text-slate-600">
                    <input type="checkbox" name="remember" class="rounded border-slate-300 text-[#133B2C] focus:ring-[#133B2C]">
                    <span>Ingat saya di perangkat ini</span>
                </label>

                <button type="submit" class="w-full bg-[#133B2C] hover:bg-[#0D2B20] text-white font-semibold text-sm py-3 rounded-xl transition flex items-center justify-center gap-2">
                    <span>Masuk ke Portal</span>
                    <span>&rarr;</span>
                </button>
            </form>

            <div class="mt-6 pt-5 border-t border-slate-100 text-center text-xs text-slate-500">
                Belum punya akun? <a href="{{ route('register') }}" class="font-bold text-slate-900 hover:underline">Daftar akun baru</a>
            </div>
        </div>
    </main>

    <footer class="text-center text-xs text-slate-400 py-6">
        &copy; 2026 PEMON Barbershop. All rights reserved.
    </footer>
</body>
</html>
