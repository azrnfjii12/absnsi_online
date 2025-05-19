<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Manajemen Shift Kerja') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Form Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Form Add Container -->
                <div class="bg-white dark:bg-zinc-800 p-6 rounded-lg shadow-sm border border-gray-200 dark:border-zinc-700">
                    <div class="mb-5 text-lg font-medium text-gray-900 dark:text-white">Input Data Shift</div>
                    
                    <form action="{{ route('shift_kerja.store') }}" method="post">
                        @csrf
                        <div class="mb-4">
                            <label for="nama_shift" class="block mb-2 text-sm font-medium text-gray-700 dark:text-zinc-300">Nama Shift</label>
                            <input name="nama_shift" type="text" id="nama_shift"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-[#FF2D20] dark:focus:border-[#FF2D20]"
                                placeholder="Contoh: Shift Pagi">
                        </div>
                        <div class="mb-4">
                            <label for="jam_masuk" class="block mb-2 text-sm font-medium text-gray-700 dark:text-zinc-300">Jam Masuk</label>
                            <input name="jam_masuk" type="time" id="jam_masuk"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-[#FF2D20] dark:focus:border-[#FF2D20]">
                        </div>
                        <div class="mb-4">
                            <label for="jam_keluar" class="block mb-2 text-sm font-medium text-gray-700 dark:text-zinc-300">Jam Keluar</label>
                            <input name="jam_keluar" type="time" id="jam_keluar"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-[#FF2D20] dark:focus:border-[#FF2D20]">
                        </div>
                        <div class="flex space-x-4">
                            <button type="submit" class="px-4 py-2 bg-[#FF2D20] text-white rounded-lg hover:bg-red-600 focus:ring-2 focus:ring-red-300">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Table Section -->
                <div class="bg-white dark:bg-zinc-800 p-6 rounded-lg shadow-sm border border-gray-200 dark:border-zinc-700">
                    <div class="mb-5 text-lg font-medium text-gray-900 dark:text-white">Daftar Shift Kerja</div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-zinc-700">
                            <thead class="bg-gray-50 dark:bg-zinc-700">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-zinc-400 uppercase tracking-wider">
                                        Nama Shift
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-zinc-400 uppercase tracking-wider">
                                        Jam Masuk
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-zinc-400 uppercase tracking-wider">
                                        Jam Keluar
                                    </th>
                                    <th scope="col" class="relative px-6 py-3"></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-zinc-800 divide-y divide-gray-200 dark:divide-zinc-700">
                                @foreach ($shift_kerja as $shift)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-zinc-700">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                            {{ $shift->nama_shift }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-zinc-400">
                                            {{ $shift->jam_masuk }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-zinc-400">
                                            {{ $shift->jam_keluar }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                            <button onclick="editShift({{ $shift }})"
                                                class="text-[#FF2D20] hover:text-red-600 dark:text-red-500 dark:hover:text-red-400">
                                                Edit
                                            </button>
                                            <button onclick="deleteShift({{ $shift->id }})"
                                                class="text-red-600 hover:text-red-900 dark:text-red-500 dark:hover:text-red-400">
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="editModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center">
        <div class="bg-white dark:bg-zinc-800 rounded-lg p-6 w-11/12 md:w-2/3 lg:w-1/2">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Edit Shift</h3>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 dark:text-zinc-400 dark:hover:text-zinc-300">
                    ×
                </button>
            </div>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="nama_shift_edit" class="block mb-2 text-sm font-medium text-gray-700 dark:text-zinc-300">Nama Shift</label>
                    <input type="text" name="nama_shift" id="nama_shift_edit"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-[#FF2D20] dark:focus:border-[#FF2D20]">
                </div>
                <div class="mb-4">
                    <label for="jam_masuk_edit" class="block mb-2 text-sm font-medium text-gray-700 dark:text-zinc-300">Jam Masuk</label>
                    <input type="time" name="jam_masuk" id="jam_masuk_edit"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-[#FF2D20] dark:focus:border-[#FF2D20]">
                </div>
                <div class="mb-4">
                    <label for="jam_keluar_edit" class="block mb-2 text-sm font-medium text-gray-700 dark:text-zinc-300">Jam Keluar</label>
                    <input type="time" name="jam_keluar" id="jam_keluar_edit"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-[#FF2D20] dark:focus:border-[#FF2D20]">
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeModal()"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 focus:ring-2 focus:ring-gray-300 dark:bg-zinc-700 dark:text-zinc-400 dark:hover:bg-zinc-600">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-[#FF2D20] text-white rounded-lg hover:bg-red-600 focus:ring-2 focus:ring-red-300">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

<script>
    function editShift(shift) {
        document.getElementById('editForm').action = `/shift_kerja/${shift.id}`;
        document.getElementById('nama_shift_edit').value = shift.nama_shift;
        document.getElementById('jam_masuk_edit').value = shift.jam_masuk;
        document.getElementById('jam_keluar_edit').value = shift.jam_keluar;
        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

    function deleteShift(id) {
        if (confirm('Yakin hapus shift ini?')) {
            axios.delete(`/shift_kerja/${id}`)
                .then(() => location.reload())
                .catch(err => console.error(err));
        }
    }
</script>