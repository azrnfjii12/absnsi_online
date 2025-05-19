<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
                {{ __('Manajemen Karyawan') }}
            </h2>
            <button onclick="openKaryawanModal()" class="px-4 py-2 bg-sky-600 text-white rounded-xl hover:bg-sky-500">
                Add
            </button>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Table Section -->
            <div class="bg-white dark:bg-zinc-800 p-6 rounded-lg shadow-sm border border-gray-200 dark:border-zinc-700">
                <div class="mb-5 text-lg font-medium text-gray-900 dark:text-white">Data Karyawan</div>
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
                                    Jabatan
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-zinc-400 uppercase tracking-wider">
                                    Email
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-zinc-400 uppercase tracking-wider">
                                    Telepon
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-zinc-400 uppercase tracking-wider">
                                    Tanggal Masuk
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-zinc-400 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="relative px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-zinc-800 divide-y divide-gray-200 dark:divide-zinc-700">
                            @php $no = 1; @endphp
                            @foreach ($karyawan as $k)
                                <tr class="hover:bg-gray-50 dark:hover:bg-zinc-700">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                        {{ $no++ }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-zinc-400">
                                        {{ $k->user->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-zinc-400">
                                        {{ $k->jabatan->nama_jabatan }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-zinc-400">
                                        {{ $k->user->email }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-zinc-400">
                                        {{ $k->no_hp }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-zinc-400">
                                        {{ $k->tanggal_masuk }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-zinc-400">
                                        {{ $k->status }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                        <button onclick="editKaryawan({{ $k }})" class="text-amber-500 hover:text-amber-600">
                                            Edit
                                        </button>
                                        <button onclick="deleteKaryawan({{ $k->id }}, '{{ $k->user->name }}')" class="text-red-600 hover:text-red-900">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $karyawan->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add Karyawan (Scrollable) -->
    <div id="karyawanModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white dark:bg-zinc-800 rounded-lg p-6 w-11/12 md:w-2/3 lg:w-1/2 max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Tambah Karyawan</h3>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 dark:text-zinc-400 dark:hover:text-zinc-300">×</button>
            </div>
            <form action="{{ route('karyawan.store') }}" method="POST" id="formKaryawanModal">
                @csrf
                <div class="flex flex-col space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-zinc-300">Nama</label>
                        <input type="text" id="name" name="name" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-zinc-300">Email</label>
                        <input type="email" id="email" name="email" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-zinc-300">Password</label>
                        <input type="password" id="password" name="password" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white">
                    </div>
                    <div>
                        <label for="jabatan_id" class="block text-sm font-medium text-gray-700 dark:text-zinc-300">Jabatan</label>
                        <select id="jabatan_id" name="jabatan_id" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white">
                            <option value="">Pilih...</option>
                            @foreach ($jabatan as $j)
                                <option value="{{ $j->id }}">{{ $j->nama_jabatan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="no_hp" class="block text-sm font-medium text-gray-700 dark:text-zinc-300">Telepon</label>
                        <input type="text" id="no_hp" name="no_hp" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white">
                    </div>
                    <div>
                        <label for="tanggal_masuk" class="block text-sm font-medium text-gray-700 dark:text-zinc-300">Tanggal Masuk</label>
                        <input type="date" id="tanggal_masuk" name="tanggal_masuk" required value="{{ date('Y-m-d') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white">
                    </div>
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 dark:text-zinc-300">Status</label>
                        <select id="status" name="status" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white">
                            <option value="">Pilih...</option>
                            <option value="aktif">AKTIF</option>
                            <option value="nonaktif">NONAKTIF</option>
                        </select>
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
    <div id="karyawanModalEdit" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white dark:bg-zinc-800 rounded-lg p-6 w-11/12 md:w-2/3 lg:w-1/2 max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Edit Karyawan</h3>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 dark:text-zinc-400 dark:hover:text-zinc-300">×</button>
            </div>
            <form method="POST" id="formKaryawanModalEdit">
                @csrf
                @method('PUT')
                <div class="flex flex-col space-y-4">
                    <div>
                        <label for="name_edit" class="block text-sm font-medium text-gray-700 dark:text-zinc-300">Nama</label>
                        <input type="text" id="name_edit" name="name" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white">
                    </div>
                    <div>
                        <label for="email_edit" class="block text-sm font-medium text-gray-700 dark:text-zinc-300">Email</label>
                        <input type="email" id="email_edit" name="email" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white">
                    </div>
                    <div>
                        <label for="password_edit" class="block text-sm font-medium text-gray-700 dark:text-zinc-300">Password Baru</label>
                        <input type="password" id="password_edit" name="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white">
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-zinc-300">Konfirmasi Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white">
                    </div>
                    <div>
                        <label for="jabatan_id_edit" class="block text-sm font-medium text-gray-700 dark:text-zinc-300">Jabatan</label>
                        <select id="jabatan_id_edit" name="jabatan_id" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white">
                            <option value="">Pilih...</option>
                            @foreach ($jabatan as $j)
                                <option value="{{ $j->id }}">{{ $j->nama_jabatan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="no_hp_edit" class="block text-sm font-medium text-gray-700 dark:text-zinc-300">Telepon</label>
                        <input type="text" id="no_hp_edit" name="no_hp" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white">
                    </div>
                    <div>
                        <label for="tanggal_masuk_edit" class="block text-sm font-medium text-gray-700 dark:text-zinc-300">Tanggal Masuk</label>
                        <input type="date" id="tanggal_masuk_edit" name="tanggal_masuk" required value="{{ date('Y-m-d') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white">
                    </div>
                    <div>
                        <label for="status_edit" class="block text-sm font-medium text-gray-700 dark:text-zinc-300">Status</label>
                        <select id="status_edit" name="status" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white">
                            <option value="">Pilih...</option>
                            <option value="aktif">AKTIF</option>
                            <option value="nonaktif">NONAKTIF</option>
                        </select>
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
        function openKaryawanModal() {
            document.getElementById('karyawanModal').classList.remove('hidden');
            document.getElementById('karyawanModal').classList.add('flex');
        }

        // Modal Edit Karyawan
        function editKaryawan(item) {
            const form = document.getElementById('formKaryawanModalEdit');
            const url = "{{ route('karyawan.update', ':id') }}".replace(':id', item.id);
            form.setAttribute('action', url);

            document.getElementById('name_edit').value = item.user.name;
            document.getElementById('email_edit').value = item.user.email;
            document.getElementById('no_hp_edit').value = item.no_hp;
            document.getElementById('tanggal_masuk_edit').value = item.tanggal_masuk;
            document.getElementById('jabatan_id_edit').value = item.jabatan_id;
            document.getElementById('status_edit').value = item.status;

            document.getElementById('karyawanModalEdit').classList.remove('hidden');
            document.getElementById('karyawanModalEdit').classList.add('flex');
        }

        // Tutup modal (untuk tambah maupun edit)
        function closeModal() {
            document.getElementById('karyawanModal').classList.add('hidden');
            document.getElementById('karyawanModalEdit').classList.add('hidden');
        }

        // Validasi konfirmasi password pada form edit
        document.getElementById("formKaryawanModalEdit").addEventListener("submit", function(event) {
            const password = document.getElementById("password_edit").value;
            const confirmPassword = document.getElementById("password_confirmation").value;
            if (password !== confirmPassword) {
                alert("Password baru dan konfirmasi password tidak sama!");
                event.preventDefault();
            }
        });

        // Fungsi hapus karyawan
        function deleteKaryawan(id, name) {
            if (confirm(`Apakah anda yakin untuk menghapus Karyawan ${name}?`)) {
                axios.post(`/karyawan/${id}`, {
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
