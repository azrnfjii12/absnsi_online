<?php

namespace App\Http\Controllers;

use App\Models\absensi;
use App\Models\karyawan;
use App\Models\shift_kerja;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        try {
            $absensi = absensi::paginate(10);
            $karyawan = karyawan::all();
            $shift_kerja = shift_kerja::all();
            return view('page.absensi.index')->with([
                'absensi' => $absensi,
                'karyawan' => $karyawan,
                'shift_kerja' => $shift_kerja
            ]);
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " . addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }

    public function create() {}

    public function store(Request $request)
    {
        try {
            
            absensi::create([
                'karyawan_id' => $request->input('karyawan_id'),
                'tanggal' => $request->input('tanggal'),
                'shift_id' => $request->input('shift_id'),
                'jam_masuk' => $request->input('jam_masuk'),
                'jam_keluar' => $request->input('jam_keluar'),
                'status' => $request->input('status'),
                'keterangan' => $request->input('keterangan')
            ]);

            return redirect()
                ->route('absensi.index')->with('message_insert', 'Data absensi Sudah ditambahkan ');
        } catch (\Exception $e) {
            return redirect()
                ->route('absensi.index')->with('error_message', 'terjadi kesalahan saat menambahkan data: ' . $e->getMessage());
        };
    }

    public function edit(Request $request, string $id) {}

    public function update(Request $request, $id)
    {
        try {
            $absensi = absensi::findOrFail($id);
            $absensi->update([
                'karyawan_id' => $request->input('karyawan_id'),
                'tanggal' => $request->input('tanggal'),
                'shift_id' => $request->input('shift_id'),
                'jam_masuk' => $request->input('jam_masuk'),
                'jam_keluar' => $request->input('jam_keluar'),
                'status' => $request->input('status'),
                'keterangan' => $request->input('keterangan')
            ]);

            return redirect()
                ->route('absensi.index')->with('message_insert', 'Data absensi Berhasil diPerbarui ');
        } catch (\Exception $e) {
            return redirect()
                ->route('absensi.index')->with('error_message', 'terjadi kesalahan saat menambahkan data: ' . $e->getMessage());
        };
    }

    public function destroy(string $id)
    {
        try {
            $absensi = absensi::findOrFail($id);
            $absensi->delete();
            return back()->with('message_delete', 'Data absensi Berhasil DiHapus ');
        } catch (\Exception $e) {
            return back()->with('error_mesaage', 'Terjadi kesalahan saat melakukan delete data: ' . $e->getMessage());
        }
    }
}
