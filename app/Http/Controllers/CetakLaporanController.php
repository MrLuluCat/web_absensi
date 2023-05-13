<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;


class CetakLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tanggal = $request->tanggal_presensi ? Carbon::parse($request->input('tanggal_presensi'))->format('Y-m-d') : Carbon::today('Asia/Jakarta')->format('Y-m-d');
        // $tanggal = Carbon::parse('2023-04-22')->format('Y-m-d');

        $katakunci = $request->katakunci;
        $jumlahBaris = 6;
        if (strlen($katakunci)) {
            $data = presensi::join('mahasiswa', 'presensi.nim', '=', 'mahasiswa.nim')
            ->where('tanggal_presensi', $tanggal)
                ->where(function ($query) use ($katakunci) {
                    $query->where('presensi.nim', 'like', "%$katakunci%")
                    ->orWhere('mahasiswa.nama', 'like', "%$katakunci%");
                })
                ->orWhere('status', 'like', "%$katakunci%")
                ->paginate($jumlahBaris);
        } else {
            $data =
                presensi::where('tanggal_presensi', $tanggal)
                ->orderBy('jam_masuk', 'asc')
                ->paginate($jumlahBaris);
        }

        return view('cetakLaporan.index')->with('data', $data);
    }

    // public function cetak()

    // {
    //     $presensi = Presensi::all();
    //     $nama_file = 'laporan_presensi_' . date('Y-m-d') . '.xlsx';
    //     return Excel::download(new PresensiExport($presensi), $nama_file);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
