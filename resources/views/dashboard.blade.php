<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-[#FF2D20]/10 rounded-lg animate-pulse">
                    <svg class="w-6 h-6 text-[#FF2D20]" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 6V12L16 14M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h2 class="font-semibold text-xl text-[#FF2D20] dark:text-[#FF2D20] leading-tight">
                    AbsensiPro
                </h2>
            </div>
            
            <div class="flex items-center space-x-4">
                <div class="hidden sm:flex items-center space-x-2 bg-white/50 dark:bg-zinc-700/50 px-3 py-1.5 rounded-full transition-all duration-300 hover:scale-105">
                    <svg class="w-5 h-5 text-[#FF2D20]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span class="text-sm font-medium text-gray-700 dark:text-zinc-300">{{ now()->translatedFormat('l, d F Y') }}</span>
                </div>
                <button class="p-2 bg-[#FF2D20]/10 text-[#FF2D20] rounded-full hover:bg-[#FF2D20]/20 transition-transform duration-300 hover:scale-110">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                    </svg>
                </button>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Welcome Banner -->
            <div class="mb-8 relative overflow-hidden rounded-xl bg-gradient-to-r from-[#FF2D20]/10 to-[#FF2D20]/5 p-6 shadow-sm transition-all duration-500 hover:shadow-md">
                <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-[#FF2D20]/10"></div>
                <div class="absolute -right-5 -top-5 h-16 w-16 rounded-full bg-[#FF2D20]/20"></div>
                <div class="relative z-10">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">Selamat Datang, Admin!</h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-zinc-300 max-w-md">Anda memiliki 5 notifikasi baru dan 3 permintaan izin yang perlu ditinjau.</p>
                    <button class="mt-3 inline-flex items-center px-4 py-2 bg-[#FF2D20] text-white text-sm font-medium rounded-lg hover:bg-[#FF2D20]/90 transition-all duration-300 transform hover:-translate-y-0.5">
                        Lihat Notifikasi
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Metrics Section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Total Employees -->
                <div class="bg-white dark:bg-zinc-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-zinc-700 hover:shadow-md transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0 bg-[#FF2D20]/10 p-3 rounded-xl animate-bounce">
                            <svg class="w-7 h-7 text-[#FF2D20]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 00-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 010 7.75"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-zinc-400">Total Karyawan</p>
                            <div class="flex items-end space-x-2">
                                <p class="text-2xl font-bold text-gray-900 dark:text-white">145</p>
                                <span class="text-sm text-green-500 flex items-center">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                    </svg>
                                    2.5%
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100 dark:border-zinc-700">
                        <a href="#" class="text-xs font-medium text-[#FF2D20] hover:underline flex items-center">
                            Lihat detail
                            <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Today's Attendance -->
                <div class="bg-white dark:bg-zinc-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-zinc-700 hover:shadow-md transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0 bg-[#FF2D20]/10 p-3 rounded-xl animate-pulse">
                            <svg class="w-7 h-7 text-[#FF2D20]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-zinc-400">Presensi Hari Ini</p>
                            <div class="flex items-end space-x-2">
                                <p class="text-2xl font-bold text-gray-900 dark:text-white">89/145</p>
                                <span class="text-xs text-gray-500 dark:text-zinc-500">61.4%</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="w-full bg-gray-200 rounded-full h-2 dark:bg-zinc-700">
                            <div class="bg-[#FF2D20] h-2 rounded-full" style="width: 61.4%"></div>
                        </div>
                    </div>
                    <div class="mt-2 flex justify-between text-xs text-gray-500 dark:text-zinc-400">
                        <span>0</span>
                        <span>145</span>
                    </div>
                </div>

                <!-- Pending Approvals -->
                <div class="bg-white dark:bg-zinc-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-zinc-700 hover:shadow-md transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0 bg-[#FF2D20]/10 p-3 rounded-xl animate-spin animate-once">
                            <svg class="w-7 h-7 text-[#FF2D20]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-zinc-400">Izin Belum Disetujui</p>
                            <div class="flex items-end space-x-2">
                                <p class="text-2xl font-bold text-gray-900 dark:text-white">5</p>
                                <span class="text-xs px-2 py-0.5 bg-red-100 text-red-800 rounded-full">Segera</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100 dark:border-zinc-700">
                        <button class="w-full bg-[#FF2D20]/10 text-[#FF2D20] text-xs font-medium py-2 px-4 rounded-lg hover:bg-[#FF2D20]/20 transition-colors duration-300">
                            Tinjau Sekarang
                        </button>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white dark:bg-zinc-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-zinc-700">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white flex items-center">
                        <svg class="w-5 h-5 mr-2 text-[#FF2D20]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        Aktivitas Terakhir
                    </h3>
                    <a href="#" class="text-sm font-medium text-[#FF2D20] hover:underline flex items-center transition-all duration-300 hover:translate-x-1">
                        Lihat Semua
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                
                <div class="space-y-4">
                    <!-- Activity Item 1 -->
                    <div class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-zinc-700/50 transition-colors duration-300">
                        <div class="flex items-center space-x-3">
                            <div class="relative">
                                <div class="bg-[#FF2D20]/10 p-2 rounded-lg">
                                    <svg class="w-5 h-5 text-[#FF2D20]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                </div>
                                <span class="absolute -top-1 -right-1 h-3 w-3 rounded-full bg-green-400 border-2 border-white dark:border-zinc-800"></span>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-700 dark:text-zinc-300">John Doe melakukan presensi masuk</p>
                                <p class="text-xs text-gray-500 dark:text-zinc-500">10 menit yang lalu</p>
                            </div>
                        </div>
                        <span class="text-xs font-medium bg-green-100 text-green-800 px-2 py-1 rounded-full flex items-center">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Masuk
                        </span>
                    </div>

                    <!-- Activity Item 2 -->
                    <div class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-zinc-700/50 transition-colors duration-300">
                        <div class="flex items-center space-x-3">
                            <div class="bg-[#FF2D20]/10 p-2 rounded-lg">
                                <svg class="w-5 h-5 text-[#FF2D20]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-700 dark:text-zinc-300">Jane Smith mengajukan izin sakit</p>
                                <p class="text-xs text-gray-500 dark:text-zinc-500">30 menit yang lalu</p>
                            </div>
                        </div>
                        <span class="text-xs font-medium bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full flex items-center">
                            <svg class="w-3 h-3 mr-1 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Menunggu
                        </span>
                    </div>

                    <!-- Activity Item 3 -->
                    <div class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-zinc-700/50 transition-colors duration-300">
                        <div class="flex items-center space-x-3">
                            <div class="bg-[#FF2D20]/10 p-2 rounded-lg">
                                <svg class="w-5 h-5 text-[#FF2D20]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-700 dark:text-zinc-300">Michael Brown melakukan presensi pulang</p>
                                <p class="text-xs text-gray-500 dark:text-zinc-500">1 jam yang lalu</p>
                            </div>
                        </div>
                        <span class="text-xs font-medium bg-blue-100 text-blue-800 px-2 py-1 rounded-full flex items-center">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                            </svg>
                            Pulang
                        </span>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="mt-8 grid grid-cols-2 md:grid-cols-4 gap-4">
                <a href=" {{route('karyawan.index') }}" class="bg-white dark:bg-zinc-800 p-4 rounded-xl shadow-sm border border-gray-100 dark:border-zinc-700 flex flex-col items-center justify-center text-center transition-all duration-300 hover:shadow-md hover:border-[#FF2D20]/30 hover:-translate-y-1">
                    <div class="bg-[#FF2D20]/10 p-3 rounded-lg mb-2">
                        <svg class="w-6 h-6 text-[#FF2D20]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-gray-700 dark:text-zinc-300"> Karyawan</span>
                </a>
                <a href="#" class="bg-white dark:bg-zinc-800 p-4 rounded-xl shadow-sm border border-gray-100 dark:border-zinc-700 flex flex-col items-center justify-center text-center transition-all duration-300 hover:shadow-md hover:border-[#FF2D20]/30 hover:-translate-y-1">
                    <div class="bg-[#FF2D20]/10 p-3 rounded-lg mb-2">
                        <svg class="w-6 h-6 text-[#FF2D20]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-gray-700 dark:text-zinc-300">Verifikasi Izin</span>
                </a>
                <a href="#" class="bg-white dark:bg-zinc-800 p-4 rounded-xl shadow-sm border border-gray-100 dark:border-zinc-700 flex flex-col items-center justify-center text-center transition-all duration-300 hover:shadow-md hover:border-[#FF2D20]/30 hover:-translate-y-1">
                    <div class="bg-[#FF2D20]/10 p-3 rounded-lg mb-2">
                        <svg class="w-6 h-6 text-[#FF2D20]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-gray-700 dark:text-zinc-300">Ekspor Data</span>
                </a>
                <a href="#" class="bg-white dark:bg-zinc-800 p-4 rounded-xl shadow-sm border border-gray-100 dark:border-zinc-700 flex flex-col items-center justify-center text-center transition-all duration-300 hover:shadow-md hover:border-[#FF2D20]/30 hover:-translate-y-1">
                    <div class="bg-[#FF2D20]/10 p-3 rounded-lg mb-2">
                        <svg class="w-6 h-6 text-[#FF2D20]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-gray-700 dark:text-zinc-300">Pengaturan</span>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>