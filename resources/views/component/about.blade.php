@extends('layouts.template')
<!-- START DATA -->
@section('kontenDashboard')
{{-- <h1>Web Absen</h1> --}}

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Kelompok 3</h1>
        <p class="lead">
            Kami memiliki tujuan yang sama yaitu mencapai hasil terbaik dalam pembuatan web absensi ini .
        </p>
        <hr class="my-4" />
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h2 >Tentang Kami<br><br></h2>
                        <div class="row">
                            <div class="col-md-5">
                                <h4>Nabil Abdul Salam Fachrudin</h4>
                                <p>Sebagai Backend.</p>
                            </div>
                            <div class="col-md-5">
                                <h4>Mohamad Rafli Maulana</h4>
                                <p>Sebagai Frontend.</p>
                            </div>
                            <div class="col-md-5">
                                <h4>Aris Setiabudi</h4>
                                <p>Sebagai Frontend.</p>
                            </div>
                            <div class="col-md-7">
                                <h4>Gita Amanda Hutabarat</h4>
                                <p>Sebagai Perancang LRS.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="card mb-1">
                    <div class="card-body mb-3 align-self-center">
                        <h2 >Dokumentasi Pengerjaan <br><br></h2>
                        <section>
                            
                            <figure>
                                <img class="col-md-5 " src="assets/img/logo2.jpg" alt="Foto dokumentasi pengerjaan">
                                <figcaption>Foto dokumentasi pengerjaan</figcaption>
                            </figure>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
