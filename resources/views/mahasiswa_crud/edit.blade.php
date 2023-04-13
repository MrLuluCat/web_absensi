@extends('layouts.template')

@section('konten')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">{{ __('Edit Data Mahasiswa') }}</div>
                    <div class="card-body">
                        <form action='{{ url('mahasiswa/'.$data->nim) }}' method='post'>
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="nim" class="col-md-4 col-form-label text-md-right">{{ __('NIM') }}</label>
                                <div class="col-md-6">
                                    <input id="nim" type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" 
                                    value="{{ $data->nim }}" minlength="10" maxlength="10" required autofocus readonly>
                                    @error('nim')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
                                <div class="col-md-6">
                                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $data->nama }}" required>
                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fakultas" class="col-md-4 col-form-label text-md-right">{{ __('Fakultas') }}</label>
                                <div class="col-md-6">
                                    <input id="fakultas" type="text" class="form-control @error('fakultas') is-invalid @enderror" name="fakultas" 
                                    value="{{ $data->fakultas }}" required>
                                    @error('fakultas')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="jurusan" class="col-md-4 col-form-label text-md-right">{{ __('Jurusan') }}</label>
                                <div class="col-md-6">
                                    <input id="jurusan" type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" 
                                    value="{{ $data->jurusan }}" required>
                                    @error('jurusan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="no_telepon" class="col-md-4 col-form-label text-md-right">Nomor Telepon</label>
                                <div class="col-md-6">
                                    <input id="no_telepon" type="text" class="form-control @error('no_telp') is-invalid @enderror" 
                                    name="no_telepon" value="{{ $data->no_telepon }}" required>
                                    @error('no_telepon')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>
                        <div class="col-md-6">
                            <select id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" required>
                                <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jabatan" class="col-md-4 col-form-label text-md-right">{{ __('Jabatan') }}</label>
                        <div class="col-md-6">
                            <select id="jabatan" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" required>
                                <option value="" disabled selected>-- Pilih Jabatan --</option>
                                <option value="SPV" {{ old('jabatan') == 'SPV' ? 'selected' : '' }}>SPV</option>
                                <option value="Asisten" {{ old('jabatan') == 'Asisten' ? 'selected' : '' }}>Asisten</option>
                                <option value="Calas" {{ old('jabatan') == 'Calas' ? 'selected' : '' }}>Calas</option>
                                
                                {{-- @foreach($enumValues as $jabatan)
                                    <option value="{{ $jabatan }}">{{ $jabatan }}</option>
                                @endforeach --}}
                            </select>
                            @error('jabatan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Tambah') }}
                            </button>
                            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">{{ __('Batal') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection