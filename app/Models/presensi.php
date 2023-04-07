<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presensi extends Model
{
    use HasFactory;

    public function mahasiswa()
    {
        return $this->belongsTo(mahasiswa::class,'nim');
    }
}
