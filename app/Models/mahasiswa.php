<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $fillable = ['nim', 'nama', 'fakultas', 'jurusan', 'no_telepon', 'jenis_kelamin', 'jabatan', 'created_at', 'updated_at'];
    protected $primaryKey = "nim";
    
    
    public function presensi() 
    {
        return $this->hasMany(presensi::class,'nim');
    }

}

