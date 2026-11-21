<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Baru - PEMON Barbershop</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F8FAFC] min-h-screen flex flex-col justify-between text-slate-800 antialiased">
    <header class="w-full max-w-6xl mx-auto px-6 py-6 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <span class="font-extrabold tracking-tight text-lg text-slate-900">PEMON</span>
            <span class="bg-emerald-100 text-emerald-800 text-[10px] font-bold px-2.5 py-0.5 rounded-full tracking-wider">PORTAL AKSES</span>
        </div>
        <div class="text-xs text-slate-400 flex items-center gap-1.5">
            <span>256-Bit Encrypted</span>
        </div>
    </header>

    <main class="px-4 my-4">
        <div class="max-w-lg mx-auto bg-white rounded-2xl border border-slate-200/80 shadow-sm p-8">
            <div class="flex flex-col items-center text-center mb-6">
                <div class="w-11 h-11 rounded-xl bg-[#133B2C] text-white flex items-center justify-center mb-4 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z"/></svg>
                </div>
                <h1 class="text-2xl font-bold text-slate-900">Daftar Akun Baru</h1>
                <p class="text-sm text-slate-500 mt-1">Isi data berikut untuk mendaftarkan akun pelanggan atau pengelola</p>
            </div>

            @if ($errors->any())
                <div class="mb-4 p-3 rounded-xl bg-red-50 border border-red-200 text-xs text-red-700">
                    <ul class="list-disc pl-4 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-600 mb-1.5">NAMA LENGKAP <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="cth. Dimas Pratama" required
                           class="w-full rounded-xl bg-slate-50 border border-slate-200 px-3.5 py-2.5 text-sm focus:bg-white focus:border-[#133B2C] focus:outline-none">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-600 mb-1.5">EMAIL <span class="text-red-500">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@pemon.com" required
                               class="w-full rounded-xl bg-slate-50 border border-slate-200 px-3.5 py-2.5 text-sm focus:bg-white focus:border-[#133B2C] focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-600 mb-1.5">NOMOR WHATSAPP <span class="text-red-500">*</span></label>
                        <div class="flex rounded-xl bg-slate-50 border border-slate-200 overflow-hidden focus-within:border-[#133B2C] focus-within:bg-white">
                            <span class="px-3 py-2.5 text-sm font-semibold text-slate-600 border-r border-slate-200">+62</span>
                            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="812-3456-7890" required
                                   class="w-full bg-transparent px-3 py-2.5 text-sm focus:outline-none">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-600 mb-1.5">PILIHAN PERAN <span class="text-red-500">*</span></label>
                        <select name="role" class="w-full rounded-xl bg-slate-50 border border-slate-200 px-3.5 py-2.5 text-sm focus:bg-white focus:border-[#133B2C] focus:outline-none">
                            <option value="customer">Pelanggan</option>
                            <option value="staff">Staf Barber</option>
                            <option value="admin">Administrator</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-600 mb-1.5">CABANG STUDIO <span class="text-red-500">*</span></label>
                        <select name="branch" class="w-full rounded-xl bg-slate-50 border border-slate-200 px-3.5 py-2.5 text-sm focus:bg-white focus:border-[#133B2C] focus:outline-none">
                            <option value="Malang - Soekarno Hatta">Malang - Soekarno Hatta</option>
                            <option value="Malang - Ijen">Malang - Ijen</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-600 mb-1.5">KATA SANDI <span class="text-red-500">*</span></label>
                        <input type="password" name="password" placeholder="••••••••" required
                               class="w-full rounded-xl bg-slate-50 border border-slate-200 px-3.5 py-2.5 text-sm focus:bg-white focus:border-[#133B2C] focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-600 mb-1.5">KONFIRMASI SANDI <span class="text-red-500">*</span></label>
                        <input type="password" name="password_confirmation" placeholder="••••••••" required
                               class="w-full rounded-xl bg-slate-50 border border-slate-200 px-3.5 py-2.5 text-sm focus:bg-white focus:border-[#133B2C] focus:outline-none">
                    </div>
                </div>

                <label class="flex items-center gap-2.5 text-xs text-slate-600 pt-1">
                    <input type="checkbox" name="terms" required class="rounded border-slate-300 text-[#133B2C] focus:ring-[#133B2C]">
                    <span>Saya menyetujui <strong class="text-slate-900">Syarat &amp; Ketentuan</strong> serta kebijakan studio PEMON.</span>
                </label>

                <button type="submit" class="w-full bg-[#133B2C] hover:bg-[#0D2B20] text-white font-semibold text-sm py-3 rounded-xl transition flex items-center justify-center gap-2 shadow-sm">
                    <span>Daftar Akun</span>
                    <span>&rarr;</span>
                </button>
            </form>

            <div class="mt-6 pt-5 border-t border-slate-100 text-center text-xs text-slate-500">
                Sudah memiliki akun? <a href="{{ route('login') }}" class="font-bold text-slate-900 hover:underline">Masuk ke portal</a>
            </div>
        </div>
    </main>

    <footer class="text-center text-xs text-slate-400 py-6">
        &copy; 2026 PEMON Barbershop Operations Ltd.
    </footer>
</body>
</html>
