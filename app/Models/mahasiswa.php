<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $fillable = ['nim', 'nama', 'fakultas', 'jurusan', 'no_telepon', 'jenis_kelamin', 'jabatan'];
    protected $primarykey = "nim";
    public $timestamps = false;

    // protected $casts = [
    //     'jenis_kelamin' => 'string',
    //     'jabatan' => 'string',
    // ];

    // public static function getJabatanEnums()
    // {
    //     return DB::select(DB::raw('SHOW COLUMNS FROM mahasiswa WHERE Field = "jabatan"'))[0]->enum_values;
    // }
    
    public function presensi() 
    {
        return $this->hasMany(presensi::class,'nim');
    }

}

