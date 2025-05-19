<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
                {{ __('Manajemen Absensi') }}
            </h2>
            <button onclick="openModal()" class="px-4 py-2 bg-sky-600 text-white rounded-xl hover:bg-sky-500">
                Add
            </button>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Table Section -->
            <div class="bg-white dark:bg-zinc-800 p-6 rounded-lg shadow-sm border border-gray-200 dark:border-zinc-700">
                <div class="mb-5 text-lg font-medium text-gray-900 dark:text-white">Data Absensi</div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-zinc-700">
                        <thead class="bg-gray-50 dark:bg-zinc-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-zinc-400 uppercase tracking-wider">
                                    No
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-zinc-400 uppercase tracking-wider">
                                    Nama
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-zinc-400 uppercase tracking-wider">
                                    Tanggal
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-zinc-400 uppercase tracking-wider">
                                    Shift
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-zinc-400 uppercase tracking-wider">
                                    Jam Masuk
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-zinc-400 uppercase tracking-wider">
                                    Jam Pulang
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-zinc-400 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-zinc-400 uppercase tracking-wider">
                                    keterangan
                                </th>
                                <th class="relative px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-zinc-800 divide-y divide-gray-200 dark:divide-zinc-700">
                            @php $no = 1; @endphp
                            @foreach ($absensi as $a)
                                <tr class="hover:bg-gray-50 dark:hover:bg-zinc-700">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                        {{ $no++ }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-zinc-400">
                                        {{ $a->karyawan->user->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-zinc-400">
                                        {{ $a->tanggal }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-zinc-400">
                                        {{ $a->shift_id  }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-zinc-400">
                                        {{ $a->jam_masuk }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-zinc-400">
                                        {{ $a->jam_keluar }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-zinc-400">
                                        {{ $a->status }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-zinc-400">
                                        {{ $a->keterangan }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                        <button onclick="editKaryawan({{ $a }})" class="text-amber-500 hover:text-amber-600">
                                            Edit
                                        </button>
                                        <button onclick="deleteKaryawan({{ $a->id }}, '{{ $a->karyawan->user->name }}')" class="text-red-600 hover:text-red-900">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $absensi->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add Karyawan (Scrollable) -->
    <div id="AbsensiModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white dark:bg-zinc-800 rounded-lg p-6 w-11/12 md:w-2/3 lg:w-1/2 max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Tambah Absensi</h3>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 dark:text-zinc-400 dark:hover:text-zinc-300">×</button>
            </div>
            <form action="{{ route('absensi.store') }}" method="POST" id="formAbsensiModal">
                @csrf
                <div class="flex flex-col space-y-4">
                    <div>
                        <label for="karyawan_id" class="block text-sm font-medium text-gray-700 dark:text-zinc-300">Karyawan</label>
                        <select id="karyawan_id" name="karyawan_id" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white">
                            <option value="">Pilih...</option>
                            @foreach ($karyawan as $k)
                                <option value="{{ $k->id }}">{{ $k->user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="tanggal" class="block text-sm font-medium text-gray-700 dark:text-zinc-300">Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white">
                    </div>
                    <div>
                        <label for="shift_id" class="block text-sm font-medium text-gray-700 dark:text-zinc-300">Shift</label>
                        <select id="shift_id" name="shift_id" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white">
                            <option value="">Pilih...</option>
                            @foreach ($shift_kerja as $s)
                                <option value="{{ $s->id }}">{{ $s->nama_shift }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <label for="jam_masuk" class="block text-sm font-medium text-gray-700 dark:text-zinc-300">Jam Masuk</label>
                        <input type="time" id="jam_masuk" name="jam_masuk" required value="{{ now()->format('H:i') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white">
                    </div>
                    <div>
                        <label for="jam_keluar" class="block text-sm font-medium text-gray-700 dark:text-zinc-300">Jam Keluar</label>
                        <input type="time" id="jam_keluar" name="jam_keluar" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white">
                    </div>
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 dark:text-zinc-300">Status</label>
                        <select id="status" name="status" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white">
                            <option value="">Pilih...</option>
                            <option value="hadir">Hadir</option>
                            <option value="izin">Izin</option>
                            <option value="sakit">Sakit</option>
                            <option value="alpha">Alpha</option>
                        </select>
                    </div>
                    <div>
                        <label for="keterangan" class="block text-sm font-medium text-gray-700 dark:text-zinc-300">Keterangan</label>
                        <textarea id="keterangan" name="keterangan" rows="3"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white">
                        </textarea>
                    </div>
                </div>
                <div class="flex justify-end space-x-4 mt-6">
                    <button type="submit" class="px-4 py-2 bg-[#FF2D20] text-white rounded-lg hover:bg-red-600 focus:ring-2 focus:ring-red-300">
                        Simpan
                    </button>
                    <button type="button" onclick="closeModal()"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 focus:ring-2 focus:ring-gray-300 dark:bg-zinc-700 dark:text-zinc-400 dark:hover:bg-zinc-600">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Karyawan (Scrollable) -->
    <div id="AbsensiModalEdit" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white dark:bg-zinc-800 rounded-lg p-6 w-11/12 md:w-2/3 lg:w-1/2 max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Edit Absensi</h3>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 dark:text-zinc-400 dark:hover:text-zinc-300">×</button>
            </div>
            <form method="POST" id="formAbsensiModalEdit">
                @csrf
                @method('PUT')
                <div class="flex flex-col space-y-4">
                    <div>
                        <label for="karyawan_id_edit" class="block text-sm font-medium text-gray-700 dark:text-zinc-300">Karyawan</label>
                        <select id="karyawan_id_edit" name="karyawan_id" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white">
                            <option value="">Pilih...</option>
                            @foreach ($karyawan as $k)
                                <option value="{{ $k->id }}">{{ $k->user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="tanggal_edit" class="block text-sm font-medium text-gray-700 dark:text-zinc-300">Tanggal</label>
                        <input type="date" id="tanggal_edit" name="tanggal" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white">
                    </div>
                    <div>
                        <label for="shift_id_edit" class="block text-sm font-medium text-gray-700 dark:text-zinc-300">Shift</label>
                        <select id="shift_id_edit" name="shift_id" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white">
                            <option value="">Pilih...</option>
                            @foreach ($shift_kerja as $s)
                                <option value="{{ $s->id }}">{{ $s->nama_shift }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <label for="jam_masuk_edit" class="block text-sm font-medium text-gray-700 dark:text-zinc-300">Jam Masuk</label>
                        <input type="time" id="jam_masuk_edit" name="jam_masuk" required value="{{ now()->format('H:i') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white">
                    </div>
                    <div>
                        <label for="jam_keluar_edit" class="block text-sm font-medium text-gray-700 dark:text-zinc-300">Jam Keluar</label>
                        <input type="time" id="jam_keluar_edit" name="jam_keluar" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white">
                    </div>
                    <div>
                        <label for="status_edit" class="block text-sm font-medium text-gray-700 dark:text-zinc-300">Status</label>
                        <select id="status_edit" name="status" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white">
                            <option value="">Pilih...</option>
                            <option value="hadir">Hadir</option>
                            <option value="izin">Izin</option>
                            <option value="sakit">Sakit</option>
                            <option value="alpha">Alpha</option>
                        </select>
                    </div>
                    <div>
                        <label for="keterangan_edit" class="block text-sm font-medium text-gray-700 dark:text-zinc-300">Keterangan</label>
                        <textarea id="keterangan_edit" name="keterangan" rows="3"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white">
                        </textarea>
                    </div>
                </div>
                <div class="flex justify-end space-x-4 mt-6">
                    <button type="submit" class="px-4 py-2 bg-[#FF2D20] text-white rounded-lg hover:bg-red-600 focus:ring-2 focus:ring-red-300">
                        Simpan
                    </button>
                    <button type="button" onclick="closeModal()"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 focus:ring-2 focus:ring-gray-300 dark:bg-zinc-700 dark:text-zinc-400 dark:hover:bg-zinc-600">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script JavaScript -->
    <script>
        // Modal Tambah Karyawan
        function openModal() {
            document.getElementById('AbsensiModal').classList.remove('hidden');
            document.getElementById('AbsensiModal').classList.add('flex');
        }

        // Modal Edit Karyawan
        function editKaryawan(item) {
            const form = document.getElementById('formAbsensiModalEdit');
            const url = "{{ route('absensi.update', ':id') }}".replace(':id', item.id);
            form.setAttribute('action', url);

            document.getElementById('karyawan_id_edit').value = item.karyawan_id;
            document.getElementById('tanggal_edit').value = item.tanggal;
            document.getElementById('shift_id_edit').value = item.shift_id;
            document.getElementById('jam_masuk_edit').value = item.jam_masuk;
            document.getElementById('jam_keluar_edit').value = item.jam_keluar;
            document.getElementById('status_edit').value = item.status;
            document.getElementById('keterangan_edit').value = item.keterangan;

            document.getElementById('AbsensiModalEdit').classList.remove('hidden');
            document.getElementById('AbsensiModalEdit').classList.add('flex');
        }

        // Tutup modal (untuk tambah maupun edit)
        function closeModal() {
            document.getElementById('AbsensiModal').classList.add('hidden');
            document.getElementById('AbsensiModalEdit').classList.add('hidden');
        }


        // Fungsi hapus karyawan
        function deleteKaryawan(id, name) {
            if (confirm(`Apakah anda yakin untuk menghapus absensi ${name}?`)) {
                axios.post(`/absensi/${id}`, {
                        '_method': 'DELETE',
                        '_token': '{{ csrf_token() }}'
                    })
                    .then(() => location.reload())
                    .catch(err => {
                        alert('Error deleting record');
                        console.error(err);
                    });
            }
        }
    </script>
</x-app-layout>
