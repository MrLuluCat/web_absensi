<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presensi extends Model
{
    use HasFactory;

    protected $table = 'presensi';
    protected $fillable = ['tanggal_presensi', 'nim', 'jam_masuk', 'jam_keluar', 'status', 'created_at', 'updated_at'];
    // protected $primaryKey = ('nim', 'tanggal_presensi');
    protected $primaryKey = ['tanggal_presensi', 'nim'];
    public $incrementing = false;
    // protected $table->primary(array('tanggal_presensi', 'nim'));

    public function mahasiswa()
    {
        return $this->belongsTo(mahasiswa::class,'nim');
    }
}
