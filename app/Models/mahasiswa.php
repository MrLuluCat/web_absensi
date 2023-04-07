<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
    
    public function presensi() 
    {
        return $this->hasMany(presensi::class,'nim');
    }

}

