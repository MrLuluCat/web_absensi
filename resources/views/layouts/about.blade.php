@extends('layouts.template')
<!-- START DATA -->
@section('konten')
{{-- <h1>Web Absen</h1> --}}

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Kelompok 3</h1>
        <p class="lead">
            Kami adalah kelompok 3 yang terdiri dari 4 orang yang bekerja sama dalam proyek ini. Kami memiliki tujuan yang sama untuk mencapai hasil yang terbaik dalam proyek ini.
        </p>
        <hr class="my-4" />
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Tentang Kami</h2>
                        <br>
                        <h4>Nabil Abdul Salam Fachrudin</h4>
                        <p>Sebagai Backend</p>
                        <h4>Rafli</h4>
                        <p>Sebagai Frontend</p>
                        <h4>Aris</h4>
                        <p>Sebagian Frontend</p>
                        <h4>Gita</h4>
                        <p>Sebagai Perancang ERD & LRS</p>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Dokumentasi Pengerjaan</h2>
                        <section>
                            <h2>Dokumentasi Pengerjaan</h2>
                            {{-- <figure>
                                <img src="#" alt="Foto dokumentasi pengerjaan">
                                <figcaption>Foto dokumentasi pengerjaan</figcaption>
                            </figure> --}}
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
