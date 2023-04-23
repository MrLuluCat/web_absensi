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

        $tanggal = $request->tanggal_presensi ? Carbon::parse($request->input('tanggal_presensi')) : Carbon::today('Asia/Jakarta')->format('Y-m-d');
        // $data = presensi::where('tanggal_presensi', $tanggal)->get();
        // return view('dashboard', compact('data'));

        // $tanggal = Carbon::parse('2023-04-22')->format('Y-m-d');
        $data = Presensi::where('tanggal_presensi', $tanggal)->get();

        $katakunci = $request->katakunci;
        $jumlahBaris = 6;
        if (strlen($katakunci)) {
            $data = presensi::where('nim', 'like', "%$katakunci%")
            ->orWhere('nama', 'like', "%$katakunci%")
            ->orWhere('jabatan', 'like', "%$katakunci%")
            ->where('tanggal_presensi', $tanggal)
            ->paginate($jumlahBaris);
        } else {
            $data = presensi::where('tanggal_presensi', $tanggal)
            ->orderBy('jam_masuk', 'asc')
            ->paginate($jumlahBaris);
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
            'nim' => 'required',
            // 'status' => 'required',
            'jam_masuk' => 'nullable|date_format:H:i',
            'jam_keluar' => 'nullable|date_format:H:i'
        ]);

        // $data = presensi::where('nim', $request->nim)
        //                     ->where('tanggal_presensi', Carbon::now('Asia/Jakarta')->format('Y-m-d'))
        //                     ->first();

        // if ($data) {
        //     if ($data->jam_keluar) {
        //         return redirect()->back()->withErrors(['Anda sudah melakukan absen keluar hari ini']);
        //     }

        //     $data->jam_keluar = Carbon::now('Asia/Jakarta');
        //     $data->save();

        //     return redirect()->back()->withSuccess('Absen keluar berhasil');
        // }

        presensi::create([
            'nim' => $request->nim,
            'tanggal_presensi' => Carbon::today('Asia/Jakarta')->format('Y-m-d'),
            'jam_masuk' => $request->jam_masuk,
            'status' => 'Hadir'
        ]);

        // return redirect()->back()->withSuccess('Absen masuk berhasil');

        return redirect()->to('presensi')->with('success', 'Presensi berhasil ditambahkan.');
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
    public function edit(Request $request, $idPresensi, $nim)
    {
        $data = DB::table('presensi')
                            ->where('tanggal_presensi', $idPresensi)
                            ->where('nim', $nim)
                            ->first();
        // $data = 
        // $idPresensi = $request->input('idPresensi');
        // $nim = $request->input('nim');

        // return redirect()->route('presensi_crud.edit',
        //  ['idPresensi' => $idPresensi, 'nim' => $nim]);
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
        $request->validate([
            // 'idabsensi' => 'unique',
            'jam_masuk' => 'nullable',
            'jam_keluar' => 'nullable|date_format:H:i',
        ]);

        $presensi = presensi::where('nim', $request->nim)
        ->where('tanggal_presensi', $request->tanggal_presensi)
        // ->where('id', $id)
        ->first();

        if ($presensi) {
            if (!$presensi->jam_keluar) {
                return redirect()->back()->withErrors(['Anda sudah melakukan absen keluar hari ini']);
            }
            // $presensi->jam_keluar = Carbon::now('Asia/Jakarta')->format('H:i');
            // $presensi->save();

            // return redirect()->back()->withSuccess('Absen keluar berhasil');
        }

        $presensi = [
            'jam_masuk' => $request->jam_masuk,
            'jam_keluar' => $request->jam_keluar,
        ];

        // return redirect()->back()->withSuccess('Absen keluar berhasil');
        presensi::where('tanggal_presensi', $idPresensi)
            ->where('nim', $idNIM)
            ->update($presensi);
        // @dd($presensi);
        return redirect()->to('presensi')->withSuccess('Absen keluar berhasil');;
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idPresensi, $nim)
    {
        $presensi = presensi::where('tanggal_presensi', $idPresensi)
            ->where('nim', $nim)
            ->first();

        if ($presensi) {
            $presensi->delete();
        }

        return redirect()->route('presensi.index')->with('success', 'Presensi has been deleted successfully');
    }
}
