<?php

namespace App\Http\Controllers;

use App\Models\presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class presensiCalasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $tanggal = $request->tanggal_presensi ? Carbon::parse($request->input('tanggal_presensi')) : Carbon::today('Asia/Jakarta')->format('Y-m-d');
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
            presensi::join('mahasiswa', 'presensi.nim', '=', 'mahasiswa.nim')
            ->where('mahasiswa.jabatan', '=', 'Calas')
                ->where('tanggal_presensi', $tanggal)
                ->orderBy('jam_masuk', 'asc')
                ->paginate($jumlahBaris);
        }


        return view('presensiCalas.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $jabatan = 'Calas';
        $categories = DB::table('mahasiswa')->where('jabatan', 'Calas')->get();

        return view('presensiCalas.create', compact('categories'));
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

        $data = presensi::where('nim', $request->nim)
            ->where('tanggal_presensi', Carbon::now('Asia/Jakarta')->format('Y-m-d'))
            ->first();

        if ($data) {
            return redirect()->back()->withErrors(['Anda sudah melakukan absen masuk hari ini']);
        }

        $jamMasuk = $request->jam_masuk;
        $status = ($jamMasuk <= '07:30:00') ? 'Hadir' : 'Terlambat';

        presensi::create([
            'nim' => $request->nim,
            'tanggal_presensi' => Carbon::today('Asia/Jakarta')->format('Y-m-d'),
            'jam_masuk' => $request->jam_masuk,
            'status' => $status
        ]);

        // $presensi = [
        //     'nim' => $request->nim,
        //     'tanggal_presensi' => Carbon::today('Asia/Jakarta')->format('Y-m-d'),
        //     'jam_masuk' => $request->jam_masuk,
        //     'status' => $status

        // ];

        // return redirect()->back()->withSuccess('Absen masuk berhasil');

        return redirect()->to('presensi_calas')->with('success', 'Presensi berhasil ditambahkan.');
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
    public function edit($idPresensi, $nim)
    {
        $data = DB::table('presensi')
            ->where('tanggal_presensi', $idPresensi)
            ->where('nim', $nim)
            ->first();

        return view('presensiCalas.edit')->with('data', $data);
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
            if ($presensi->jam_keluar) {
                return redirect()->back()->withErrors(['Anda sudah melakukan absen keluar hari ini']);
            }
        }

        $jamMasuk = $request->input('jam_masuk');
        $status = ($jamMasuk <= '07:30:00') ? 'Hadir' : 'Terlambat';

        $presensi = [
            'jam_masuk' => $request->jam_masuk,
            'jam_keluar' => $request->jam_keluar,
            'status' => $status
        ];

        presensi::where('tanggal_presensi', $idPresensi)
            ->where('nim', $idNIM)
            ->update($presensi);

        // @dd($presensi);
        return redirect()->to('presensi_calas')->withSuccess('Absen keluar berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idPresensi, $idNIM)
    {
        $presensi = presensi::where('tanggal_presensi', $idPresensi)
            ->where('nim', $idNIM)
            ->first();

        if ($presensi) {
            $presensi->delete();
        }
        // @dd($presensi);
        return redirect()->to('presensi_calas')->with('success', 'Presensi Berhasil Dihapus');
    }
}
