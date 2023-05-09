@extends('layouts.template')
<!-- START DATA -->
@section('konten')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">{{ __('Tambah Data Mahasiswa') }}</div>
                    <div class="card-body">
                        
            <form action='{{ route('presensi_asisten.store') }}' method='post'>
            @csrf   

            <div class="my-3 p-3 bg-body rounded shadow-sm">

            <a href=" {{ url('presensi') }} " class="btn btn-secondary mb-3">Kembali</a>

            <div class="form-group">
                <label for="nim">NIM</label>
                <select class="custom-select" aria-label="Default select example" value="nim" name="nim" id="nim">
                    @foreach($categories as $category)
                        <option value="{{ $category->nim }}">{{ $category->nama }} - {{ $category->nim }} - {{ $category->jabatan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="jam_masuk">Jam Masuk</label>
                <input type="time" name="jam_masuk" id="jam_masuk" value="{{ \Carbon\Carbon::now('Asia/Jakarta')->format('H:i') }}" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
            </div>
        </div>
    </div>
</div>
@endsection