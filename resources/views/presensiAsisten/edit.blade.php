@extends('layouts.template')
<!-- START DATA -->
@section('konten')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">{{ __('Tambah Data Mahasiswa') }}</div>
                    <div class="card-body">
                        
            <form action='{{ route('presensi.update', [$data->tanggal_presensi, $data->nim]) }}' method='post'>
            @csrf
            @method('PUT')
            <div class="my-3 p-3 bg-body rounded shadow-sm">

            <a href=" {{ url('presensi') }} " class="btn btn-secondary mb-3">Kembali</a>

            <div class="form-group">
                <label for="nim">NIM</label>
                <input id="nim" type="text" class="form-control" name="nim" 
                value="{{ $data->nim }}" autofocus readonly>
            </div>

            <div class="form-group">
                <label for="jam_masuk">Jam Masuk</label>
                <input type="time" name="jam_masuk" id="jam_masuk" value="{{ $data->jam_masuk }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="jam_keluar">Jam Keluar</label>
                <input type="time" name="jam_keluar" id="jam_keluar" value="{{ \Carbon\Carbon::now('Asia/Jakarta')->format('H:i') }}" class="form-control">
            </div>

            {{-- <div class="form-check mb-3">
                <input class="form-check-input" type="radio" name="status" id="status">
                <label class="form-check-label" for="status">
                    masuk
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="radio" name="status" id="status">
                <label class="form-check-label" for="status">
                    izin
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="radio" name="status" id="status">
                <label class="form-check-label" for="status">
                    sakit
                </label>
            </div> --}}
            <button type="submit" class="btn btn-primary">Submit</button>

            </div>
            </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection