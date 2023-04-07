@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Absensi') }}</div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif

        <form method="POST" action="{{ route('absensi.store') }}">
            @csrf

            <div class="mb-3">
                <label for="nim" class="form-label">{{ __('NIM') }}</label>
                <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" value="{{ old('nim') }}" required>
                @error('nim')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">{{ __('Absen Masuk') }}</button>
        </form>
    </div>
</div>