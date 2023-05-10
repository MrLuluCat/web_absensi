@extends('layouts.template')
<!-- START DATA -->
@section('konten')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">Tambah Presensi</div>
                    <div class="card-body">
                        
            <form action='{{ route('presensi_asisten.store') }}' method='post'>
            @csrf   

            <div class="my-3 p-3 bg-body rounded shadow-sm">


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

            <div class="d-flex justify-content-between">
                <a href="{{ url('presensi') }}" class="btn btn-secondary ml-3">Kembali</a>
                <button type="submit" class="btn btn-primary mr-3 ">Submit</button>
            </div>
        </form>
        </div>
            </div>
        </div>
    </div>
</div>
@endsection