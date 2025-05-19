<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class absensi extends Model
{
    protected $fillable = [
        'karyawan_id',
        'tanggal',
        'shift_id',
        'jam_masuk',
        'jam_keluar',
        'status',
        'keterangan'
    ];

    protected $table = 'absensis';

    public function karyawan()
    {
        return $this->belongsTo(karyawan::class);
    }

    public function shift_kerja()
    {
        return $this->belongsTo(shift_kerja::class);
    }
}
