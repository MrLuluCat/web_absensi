@extends('layouts.template')
<!-- START DATA -->
@section('konten')
    <!-- akhir side bar -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Selamat datang di Website Presensi LAB ICT UBL</h1>
        <p class="lead">
          Website ini membantu Anda memantau presensi Asisten dengan mudah.
        </p>
        <hr class="my-4" />
        <p>
          Kami menyediakan solusi yang mudah dan efisien untuk memantau presensi Asisten.
        </p>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <h2 class="card-title">Tentang Kami</h2>
                <p class="card-text">
                  Kami adalah kelompok 3 sebagai pembuat website ini, yang menyediakan solusi untuk memantau Presensi Asisten dengan mudah.
                </p>
                <a class="btn btn-primary" href="about.php" role="button">Pelajari Lebih Lanjut</a>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="card">
              <div class="card-body">
                <h2 class="card-title">Kontak</h2>
                <address>
                  <strong>LAB ICT UBL</strong><br />
                  Jl. Ciledug Raya No.99, RT.1/RW.2,<br />
                  Petukangan Utara, Kec. Pesanggrahan,<br />
                  Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12260<br />
                </address>
                <p>
                  Telepon: 123-456-7890<br />
                  website resmi: <a href="https://labict.budiluhur.ac.id/">https://labict.budiluhur.ac.id/</a>
                </p>
              </div>
            </div>
          </div>
        </div>
@endsection