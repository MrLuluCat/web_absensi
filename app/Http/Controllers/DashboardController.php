<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Support\Carbon;
use App\Models\presensi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tanggal = $request->tanggal_presensi ? Carbon::parse($request->input('tanggal_presensi')) : Carbon::today('Asia/Jakarta')->format('Y-m-d');
        
        $jumlahCalas = presensi::join('mahasiswa', 'presensi.nim', '=', 'mahasiswa.nim')
        ->where('mahasiswa.jabatan', '=', 'Calas')
            ->where('tanggal_presensi', $tanggal)
            ->count();

        $jumlahAsisten = presensi::join('mahasiswa', 'presensi.nim', '=', 'mahasiswa.nim')
            ->where(function ($query) {
                $query->where('mahasiswa.jabatan', '=', 'SPV')
                    ->orWhere('mahasiswa.jabatan', '=', 'Asisten');
            })
        ->where('tanggal_presensi', $tanggal)
        ->count();

        $totalCalas = mahasiswa::select('*')
        ->where('jabatan', '=', 'Calas')
            ->count();

        $totalAsisten = mahasiswa::select('*')
        ->where('jabatan', '=', 'SPV')
        ->orWhere('jabatan', '=', 'Asisten')
        ->count();

        return view('component.dashboard', [
            'jumlahCalas' => $jumlahCalas,
            'jumlahAsisten' => $jumlahAsisten,
            'totalCalas' => $totalCalas,
            'totalAsisten' => $totalAsisten
        ]);
    }

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
