@extends('layouts.template')
<!-- START DATA -->
@section('kontenDashboard')
    <!-- akhir side bar -->
    <div class="container">
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
            <div>
                <div class="card ">
                    <div class="card-header">
                        <h4 class="card-title">Data</h4>
                    </div>
                    <div class="card-body">

                        <div class="row justify-content-end">
                            <div class="col-sm-6 col-md-3">
                                <div class="card card-stats card-secondary card-round">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="icon-big text-center">
                                                    <i class="flaticon-users"></i>
                                                </div>
                                            </div>
                                            <div class="col-7 col-stats"
                                                onclick="location.href='/*arahin ke halaman presensi asisten hari ini*/'">
                                                <div class="numbers">
                                                    <p class="card-category">Kehadiran Calas  {{ $data }}</p>
                                                    <h4 class="card-title">

                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="card card-stats card-secondary card-round">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="icon-big text-center">
                                                    <i class="flaticon-users"></i>
                                                </div>
                                            </div>
                                            <div class="col-1 col-stats" onclick="location.href='#'">
                                                <div class="numbers">
                                                    <p class="card-category">Kehadiran Asisten  {{ $data }}</p>
                                                    <h4 class="card-title">
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="card card-stats card-default card-round">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="icon-big text-center">
                                                    <i class="fas fa-user-tie"></i>
                                                </div>
                                            </div>
                                            <div class="col-1 col-stats"
                                                onclick="location.href='dashboard.php?page=siswa#'">
                                                <div class="numbers">
                                                    <p class="card-category">Total Calas</p>
                                                    <h4 class="card-title">
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="card card-stats card-default card-round">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="icon-big text-center">
                                                    <i class="fas fa-user-tie"></i>
                                                </div>
                                            </div>
                                            <div class="col-1 col-stats" onclick="location.href='#'">
                                                <div class="numbers">
                                                    <p class="card-category">Total Asisten</p>
                                                    <h4 class="card-title">
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>





                        <!-- end -->

                    </div>


                    <!-- modal ganti password -->
                    <div class="modal fade bs-example-modal-sm" id="gantiPassword" tabindex="-1" role="dialog"
                        aria-labelledby="gantiPass">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="gantiPass">Ganti Password</h4>
                                </div>
                                <form action="#" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label">Password Lama</label>
                                            <input name="pass" type="text" class="form-control"
                                                placeholder="Password Lama">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Password Baru</label>
                                            <input name="pass1" type="text" class="form-control"
                                                placeholder="Password Baru">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button name="changePassword" type="submit" class="btn btn-primary">Ganti
                                            Password</button>
                                    </div>
                                </form>



                            </div>
                        </div>
                    </div>

                    <!--end modal ganti password -->

                    <!-- Modal pengaturan akun-->
                    <div class="modal fade" id="pengaturanAkun" tabindex="-1" role="dialog" aria-labelledby="akunAtur">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="akunAtur"><i class="fas fa-user-cog"></i> Pengaturan
                                        Akun</h3>
                                </div>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" name="nama" class="form-control"
                                                value="<? //= $data['nama_lengkap'] 
																												?>">
                                            <input type="hidden" name="id"
                                                value="<? //= $data['id_admin'] 
																							?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="username" class="form-control"
                                                value="<? //= $data['username'] 
																													?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Foto Profile</label>
                                            <p>
                                                <img src="../assets/img/user/<? //= $data['foto'] 
																						?>"
                                                    class="img-thumbnail" style="height: 50px;width: 50px;">
                                            </p>
                                            <input type="file" name="foto">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                        <button name="updateProfile" type="submit"
                                            class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div>
                <div>
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="card">
                                        <div class="card-body mb-3">
                                            <h2 class="card-title">Tentang Kami</h2>
                                            <p class="card-text">
                                                Kami dari kelompok 3 sebagai pembuat website ini, menyediakan solusi untuk
                                                memantau Presensi Asisten dengan mudah dan tersistem.
                                            </p>
                                            <a class="btn btn-primary btn-sm" href="{{ url('/about') }}"
                                                role="button">Pelajari
                                                Lebih Lanjut</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="card">
                                        <div class="card-body mb-1">
                                            <h2 class="card-title">Kontak</h2>
                                            <address>
                                                <strong>LAB ICT UBL</strong><br />
                                                Jl. Ciledug Raya No.99, RT.1/RW.2,
                                                Petukangan Utara, Kec.<br /> Pesanggrahan,
                                                Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12260<br />
                                            </address>
                                            <p>
                                                Telepon: 123-456-7890<br />
                                                website resmi: <a
                                                    href="https://labict.budiluhur.ac.id/">https://labict.budiluhur.ac.id/</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endsection
