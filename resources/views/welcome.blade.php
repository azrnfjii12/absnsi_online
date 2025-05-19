<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AbsensiPro - Sistem Absensi Terintegrasi</title>
    @vite('resources/css/app.css')
</head>
<body class="antialiased bg-white dark:bg-zinc-900">
    <div class="relative min-h-screen flex flex-col">
        {{-- Navbar --}}
        <nav class="fixed inset-x-0 top-0 z-50 backdrop-blur-lg">
            <div class="mx-auto px-6 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                    <div class="flex-shrink-0">
                        <a href="/" class="flex items-center space-x-2">
                            <span class="text-xl font-bold text-[#FF2D20]">AbsensiPro</span>
                        </a>
                    </div>
                    <div class="flex md:ml-10">
                        <a href="{{ route('login') }}" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-50 dark:hover:bg-zinc-800">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 px-3 py-2 rounded-md text-sm font-medium bg-[#FF2D20] text-white hover:bg-red-600">Register</a>
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        {{-- Hero Section --}}
        <div class="relative px-6 lg:px-8">
            <div class="mx-auto max-w-7xl pt-20 pb-32">
                <div class="text-center">
                    <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white sm:text-5xl md:text-6xl">
                        <span class="block xl:inline">Sistem Absensi</span>
                        <span class="block text-[#FF2D20] xl:inline">Terintegrasi</span>
                    </h1>
                    <p class="mx-auto mt-3 max-w-md text-base text-gray-500 dark:text-zinc-400 sm:text-lg md:mt-5 md:max-w-3xl md:text-xl">
                        Solusi absensi digital untuk meningkatkan efisiensi dan akurasi presensi
                    </p>
                    <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
                        <a href="{{ route('login') }}" class="flex items-center justify-center px-4 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-[#FF2D20] hover:bg-red-600 md:py-4 md:text-lg md:px-10">
                            Mulai Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Features Section --}}
        <div class="relative px-6 lg:px-8 py-16 bg-gray-50 dark:bg-zinc-800">
            <div class="mx-auto max-w-7xl">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="p-6 bg-white dark:bg-zinc-700 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                        <div class="flex items-center justify-center w-12 h-12 bg-[#FF2D20]/10 rounded-full">
                            <svg class="w-6 h-6 text-[#FF2D20]" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="mt-5 text-lg font-medium text-gray-900 dark:text-white">Absensi Real-Time</h3>
                        <p class="mt-2 text-base text-gray-500 dark:text-zinc-400">Pantau kehadiran karyawan secara real-time dengan akurasi tinggi.</p>
                    </div>

                    <div class="p-6 bg-white dark:bg-zinc-700 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                        <div class="flex items-center justify-center w-12 h-12 bg-[#FF2D20]/10 rounded-full">
                            <svg class="w-6 h-6 text-[#FF2D20]" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"/>
                            </svg>
                        </div>
                        <h3 class="mt-5 text-lg font-medium text-gray-900 dark:text-white">Laporan Otomatis</h3>
                        <p class="mt-2 text-base text-gray-500 dark:text-zinc-400">Generate laporan harian/mingguan/bulanan secara otomatis.</p>
                    </div>

                    <div class="p-6 bg-white dark:bg-zinc-700 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                        <div class="flex items-center justify-center w-12 h-12 bg-[#FF2D20]/10 rounded-full">
                            <svg class="w-6 h-6 text-[#FF2D20]" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21 12.319 12.319 0 015.783 15 12.32 12.32 0 013 12c0-1.468.305-2.862.846-4.137M7 16h-.5a.5.5 0 01-.5-.5v-5.5a.5.5 0 01.5-.5H7m10 11h-.5a.5.5 0 01-.5-.5v-5.5a.5.5 0 01.5-.5H17m0 0l-3-3m3 3l3 3"/>
                            </svg>
                        </div>
                        <h3 class="mt-5 text-lg font-medium text-gray-900 dark:text-white">Integrasi Mudah</h3>
                        <p class="mt-2 text-base text-gray-500 dark:text-zinc-400">Terintegrasi dengan sistem HRIS dan payroll perusahaan.</p>
                    </div>
                </div>
            </div>
        </div>

        <footer class="bg-gray-50 dark:bg-zinc-900 py-8">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <p class="text-center text-sm text-gray-500 dark:text-zinc-400">
                    &copy; {{ date('Y') }} AbsensiPro. All rights reserved.
                </p>
            </div>
        </footer>
    </div>
</body>
</html>