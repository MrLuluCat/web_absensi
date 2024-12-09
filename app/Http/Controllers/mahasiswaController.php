<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahBaris = 6;
        if (strlen($katakunci)) {
            $data = mahasiswa::where('nim', 'like', "%$katakunci%")
                ->orWhere('nama', 'like', "%$katakunci%")
                ->orWhere('jabatan', 'like', "%$katakunci%")
                ->paginate($jumlahBaris);
        } else {
            $data = mahasiswa::orderBy('created_at', 'desc')->paginate($jumlahBaris);
        }
       
        return view('mahasiswa_crud.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa_crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        // regex:/^[a-zA-Z\s]+$ adalah validasi input nama atau teks dengan hanya memperbolehkan huruf alfabet dan spasi, 
        // sehingga karakter lain seperti angka dan simbol tidak diizinkan.
            'nim' => 'required|numeric|unique:mahasiswa,nim',
            'nama' => 'required|regex:/^[a-zA-Z\s]+$/',
            'fakultas' => 'required|regex:/^[a-zA-Z\s]+$/',
            'jurusan' => 'required|regex:/^[a-zA-Z\s]+$/',
            'no_telepon' => 'required|numeric',
            'jenis_kelamin' => 'required',
            'jabatan' => 'required'
        ]);

        mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'fakultas' => $request->fakultas,
            'jurusan' => $request->jurusan,
            'no_telepon' => $request->no_telepon,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jabatan' => $request->jabatan
        ]);

        return redirect()->to('mahasiswa')->withSuccess('Data mahasiswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data = mahasiswa::where('nim', $id)->first();
        return view('mahasiswa_crud.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            // 'nim' => 'required|unique:mahasiswa,nim',
            'nama' => 'required',
            'fakultas' => 'required',
            'jurusan' => 'required',
            'no_telepon' => 'required',
            'jenis_kelamin' => 'required',
            'jabatan' => 'required'
        ]);

        $data = [
            // 'nim' => $request->nim,
            'nama' => $request->nama,
            'fakultas' => $request->fakultas,
            'jurusan' => $request->jurusan,
            'no_telepon' => $request->no_telepon,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jabatan' => $request->jabatan
        ];

        mahasiswa::where('nim', $id)->update($data);
        return redirect()->to('mahasiswa')->withSuccess('Data mahasiswa berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            mahasiswa::where('nim', $id)->delete();
            return redirect()->to('mahasiswa')->with('success', 'Berhasil Menghapus Data');
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1451) {
                return redirect()->back()->withErrors(['Gagal Menghapus Data, Data telah digunakan pada tabel presensi']);
            }
        }
    }
}
