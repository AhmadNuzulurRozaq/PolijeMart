@extends(auth()->user()->role === 'admin' ? 'layouts.sidebar' : 'layouts.user.HeaFoot')

@section('title', 'Profil Saya | Polije Mart')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Profil Saya</h1>
        <p class="text-sm text-slate-500 mt-2 font-medium">Kelola informasi profil dan keamanan akun Anda.</p>
    </div>

    @if (session('status') === 'profile-updated')
        <div id="alert-status" class="mb-6 flex items-center justify-between p-4 text-sm font-semibold text-green-800 border border-green-200 rounded-xl bg-green-50 shadow-sm transition-opacity duration-500">
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="m10 16.4l-4-4L7.4 11l2.6 2.6L16.6 7L18 8.4z"/></svg>
                Profil berhasil diperbarui!
            </div>
            <button type="button" onclick="document.getElementById('alert-status').style.display='none'" class="text-green-600 hover:text-green-800 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 6L6 18M6 6l12 12"/></svg>
            </button>
        </div>
        <script>
            setTimeout(() => {
                const alert = document.getElementById('alert-status');
                if (alert) {
                    alert.style.transition = 'opacity 0.5s';
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 500);
                }
            }, 3000);
        </script>
    @endif

    <div class="space-y-6">
        <!-- Update Profile Information -->
        <div class="bg-white p-6 sm:p-10 rounded-2xl shadow-sm border border-slate-100">
            <header class="mb-6">
                <h2 class="text-xl font-bold text-slate-800">Informasi Profil</h2>
                <p class="mt-1 text-sm text-slate-500">Perbarui informasi profil dan alamat email akun Anda.</p>
            </header>

            <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
                @csrf
                @method('patch')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2">
                        <label for="name" class="text-sm font-bold text-slate-700">Nama Lengkap</label>
                        <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name"
                            class="w-full p-3 bg-slate-50 border border-slate-200 outline-none rounded-xl focus:bg-white focus:border-[#1C4E80] focus:ring-2 focus:ring-[#1C4E80]/20 transition-all">
                        @error('name')
                            <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="email" class="text-sm font-bold text-slate-700">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required autocomplete="username"
                            class="w-full p-3 bg-slate-50 border border-slate-200 outline-none rounded-xl focus:bg-white focus:border-[#1C4E80] focus:ring-2 focus:ring-[#1C4E80]/20 transition-all">
                        @error('email')
                            <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="nomor_telepon" class="text-sm font-bold text-slate-700">Nomor Telepon</label>
                        <input id="nomor_telepon" name="nomor_telepon" type="text" value="{{ old('nomor_telepon', $user->nomor_telepon) }}" placeholder="08xxxxxxxxxx"
                            class="w-full p-3 bg-slate-50 border border-slate-200 outline-none rounded-xl focus:bg-white focus:border-[#1C4E80] focus:ring-2 focus:ring-[#1C4E80]/20 transition-all">
                        @error('nomor_telepon')
                            <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2 md:col-span-2">
                        <label for="alamat" class="text-sm font-bold text-slate-700">Alamat Lengkap</label>
                        <textarea id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap..."
                            class="w-full p-3 bg-slate-50 border border-slate-200 outline-none rounded-xl focus:bg-white focus:border-[#1C4E80] focus:ring-2 focus:ring-[#1C4E80]/20 transition-all resize-y">{{ old('alamat', $user->alamat) }}</textarea>
                        @error('alamat')
                            <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-end gap-4 mt-6">
                    <button type="submit" class="px-6 py-3 rounded-xl text-white bg-[#1C4E80] font-bold hover:bg-[#143a60] active:bg-[#0f2c4a] shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all cursor-pointer">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        <!-- Update Password -->
        <div class="bg-white p-6 sm:p-10 rounded-2xl shadow-sm border border-slate-100">
            <header class="mb-6">
                <h2 class="text-xl font-bold text-slate-800">Perbarui Password</h2>
                <p class="mt-1 text-sm text-slate-500">Pastikan akun Anda menggunakan password yang panjang dan acak agar tetap aman.</p>
            </header>

            <form method="post" action="{{ route('password.update') }}" class="space-y-6">
                @csrf
                @method('put')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2 md:col-span-2">
                        <label for="current_password" class="text-sm font-bold text-slate-700">Password Saat Ini</label>
                        <input id="current_password" name="current_password" type="password" autocomplete="current-password"
                            class="w-full p-3 bg-slate-50 border border-slate-200 outline-none rounded-xl focus:bg-white focus:border-[#1C4E80] focus:ring-2 focus:ring-[#1C4E80]/20 transition-all">
                        @error('current_password', 'updatePassword')
                            <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="password" class="text-sm font-bold text-slate-700">Password Baru</label>
                        <input id="password" name="password" type="password" autocomplete="new-password"
                            class="w-full p-3 bg-slate-50 border border-slate-200 outline-none rounded-xl focus:bg-white focus:border-[#1C4E80] focus:ring-2 focus:ring-[#1C4E80]/20 transition-all">
                        @error('password', 'updatePassword')
                            <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="password_confirmation" class="text-sm font-bold text-slate-700">Konfirmasi Password Baru</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password"
                            class="w-full p-3 bg-slate-50 border border-slate-200 outline-none rounded-xl focus:bg-white focus:border-[#1C4E80] focus:ring-2 focus:ring-[#1C4E80]/20 transition-all">
                        @error('password_confirmation', 'updatePassword')
                            <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-end gap-4 mt-6">
                    @if (session('status') === 'password-updated')
                        <p class="text-sm text-green-600 font-semibold mr-2" id="pwd-status">
                            Berhasil Disimpan.
                        </p>
                        <script>
                            setTimeout(() => {
                                const el = document.getElementById('pwd-status');
                                if (el) {
                                    el.style.transition = 'opacity 0.5s';
                                    el.style.opacity = '0';
                                    setTimeout(() => el.remove(), 500);
                                }
                            }, 2000);
                        </script>
                    @endif
                    <button type="submit" class="px-6 py-3 rounded-xl text-white bg-[#1C4E80] font-bold hover:bg-[#143a60] active:bg-[#0f2c4a] shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all cursor-pointer">
                        Ubah Password
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection