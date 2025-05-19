<x-guest-layout>
    <div class=" flex items-center justify-center bg-gray-50 dark:bg-zinc-900">
        <div class="max-w-md w-full p-6 bg-white dark:bg-zinc-800 rounded-lg ">
            <div class="mb-6 text-center">
                <h2 class="text-3xl font-bold text-[#FF2D20]">AbsensiPro</h2>
                <p class="mt-2 text-sm text-gray-500 dark:text-zinc-400">Buat akun untuk mulai mengelola presensi</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-700 dark:text-zinc-300">Nama Lengkap</label>
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                        class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-zinc-700 focus:ring-[#FF2D20] focus:border-[#FF2D20] dark:bg-zinc-900 dark:text-white"
                    >
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-700 dark:text-zinc-300">Email</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                        class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-zinc-700 focus:ring-[#FF2D20] focus:border-[#FF2D20] dark:bg-zinc-900 dark:text-white"
                    >
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-700 dark:text-zinc-300">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                        class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-zinc-700 focus:ring-[#FF2D20] focus:border-[#FF2D20] dark:bg-zinc-900 dark:text-white"
                    >
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-700 dark:text-zinc-300">Konfirmasi Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                        class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-zinc-700 focus:ring-[#FF2D20] focus:border-[#FF2D20] dark:bg-zinc-900 dark:text-white"
                    >
                    @error('password_confirmation')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <a class="text-sm text-[#FF2D20] hover:underline" href="{{ route('login') }}">
                        {{ __('Sudah punya akun?') }}
                    </a>

                    <button type="submit" class="px-4 py-3 font-semibold text-white bg-[#FF2D20] rounded-lg hover:bg-red-600 focus:ring-2 focus:ring-[#FF2D20]/50">
                        Daftar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>