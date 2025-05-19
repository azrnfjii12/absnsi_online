<x-guest-layout>
    <!-- Session Status -->
    <div class=" flex items-center justify-center bg-gray-50 dark:bg-zinc-900">
        <div class="max-w-md w-full p-6 bg-white dark:bg-zinc-800 rounded-lg ">
            <div class="mb-6 text-center">
                <h2 class="text-3xl font-bold text-[#FF2D20]">AbsensiPro</h2>
                <p class="mt-2 text-sm text-gray-500 dark:text-zinc-400">Masuk untuk mengelola presensi</p>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-700 dark:text-zinc-300">Email</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                        class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-zinc-700 focus:ring-[#FF2D20] focus:border-[#FF2D20] dark:bg-zinc-900 dark:text-white"
                    >
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-700 dark:text-zinc-300">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-zinc-700 focus:ring-[#FF2D20] focus:border-[#FF2D20] dark:bg-zinc-900 dark:text-white"
                    >
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center mb-4">
                    <input id="remember_me" type="checkbox" class="rounded text-[#FF2D20] focus:ring-[#FF2D20] dark:bg-zinc-900">
                    <label for="remember_me" class="ml-2 text-sm text-gray-600 dark:text-zinc-400">Ingat Saya</label>
                </div>

                    <button type="submit" class="w-full px-4 py-3 font-semibold text-white bg-[#FF2D20] rounded-lg hover:bg-red-600 focus:ring-2 focus:ring-[#FF2D20]/50">
                        Masuk
                    </button>

                    @if (Route::has('password.request'))
                        <a class="mt-4 text-sm text-[#FF2D20] hover:underline" href="{{ route('password.request') }}">
                            Lupa Password?
                        </a>
                    @endif
            </form>
        </div>
    </div>
</x-guest-layout>