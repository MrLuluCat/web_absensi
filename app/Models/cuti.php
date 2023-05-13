<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cuti extends Model
{
    protected $table = 'cuti';
    protected $fillable = ['nim', 'tanggal_cuti', 'tanggal_selesai_cuti', 'alasan'];
    // protected $primaryKey = ('nim', 'tanggal_presensi');
    // protected $primaryKey = ['tanggal_presensi', 'nim'];
    // protected $table->primary(array('tanggal_presensi', 'nim'));

    public function mahasiswa()
    {
        return $this->belongsTo(mahasiswa::class, 'nim', 'nim');
    }
}
