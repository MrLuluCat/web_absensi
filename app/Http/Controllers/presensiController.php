<?php

namespace App\Http\Controllers;

use App\Models\presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class presensiController extends Controller
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
            $data = presensi::where('nim', 'like', "%$katakunci%")
            ->orWhere('nama', 'like', "%$katakunci%")
            ->orWhere('jabatan', 'like', "%$katakunci%")
            ->paginate($jumlahBaris);
        } else {
            $data = presensi::orderBy('jam_masuk', 'asc')->paginate($jumlahBaris);
        }

        return view('presensi_crud.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = 'Calas';
        $categories = DB::table('mahasiswa')->where('jabatan', 'Calas')->get();

        return view('presensi_crud.create', compact('categories'));
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
            'tanggal_presensi' => 'unique:presensi',
            'nim' => 'required|unique:presensi',
            // 'status' => 'required',
            'jam_masuk' => 'nullable|date_format:H:i',
            'jam_keluar' => 'nullable|date_format:H:i'
        ]);

        $presensi = new presensi([
            'tanggal_presensi' => Carbon::now('Asia/Jakarta')->format('Y-m-d'),
            'nim' => $request->nim,
            // 'status' => $request->status,
            'jam_masuk' => $request->jam_masuk,
            'jam_keluar' => $request->jam_keluar
        ]);
        $presensi->save();

        return redirect()->to('presensi_crud.index')
        ->with('success', 'Presensi berhasil ditambahkan.');
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
    public function edit(Request $request, $idPresensi, $idNIM)
    {
        $data = DB::table('presensi')
                            ->where('tanggal_presensi', $idPresensi)
                            ->where('nim', $idNIM)
                            ->first();
        // $data = 
        // $idPresensi = $request->input('idPresensi');
        // $idNIM = $request->input('idNIM');

        // return redirect()->route('presensi_crud.edit',
        //  ['idPresensi' => $idPresensi, 'idNIM' => $idNIM]);
        return view('presensi_crud.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idPresensi, $idNIM)
    {
        $data = DB::table('presensi')
                    ->where('tanggal_presensi', $idPresensi)
                    ->where('nim', $idNIM)
                    ->first();

        if ($data) {
            if ($data->jam_keluar) {
                return redirect()->back()->withErrors(['Anda sudah melakukan absen keluar hari ini']);
            }

            $data->jam_keluar;  
            $data->save();

            return redirect()->back()->withSuccess('Absen keluar berhasil');
        }

        $data = [
                'jam_masuk' => $request->jam_masuk,
                'jam_keluar' => $request->jam_keluar,
            ];

        // presensi::where('id', $id)->update($data2);
        presensi::where('tanggal_presensi', 'nim', $idPresensi, $idNIM)
                    ->update($data);
        return redirect()->to('presensi');
        // $presensi = presensi::findOrFail($id)([
        //     'tanggal_presensi' => Carbon::now('Asia/Jakarta')->format('Y-m-d'),
        //     'nim' => $request->nim,
        //     'status' => $request->status,
        //     'jam_masuk' => $request->jam_masuk,
        //     'jam_keluar' => $request->jam_keluar
        // ]);
        // $presensi->save();

        // return redirect()->to('presensi_crud.index')
        // ->with('success', 'Presensi Keluar Berhasil.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
