<?php
include 'template.php';
?>
<div class="main-panel">
  <div class="content">
    <div class="page-inner mt-1">
      <div class=" p-3 bg-body rounded shadow-sm">

        <!-- FORM PENCARIAN -->


        <div class="pb-4">
          <div class="container-xl d-flex justify-content-center mt-3 m-2 pb-2 fs-4">
            <h1>Presensi Calas Hari ini</h1>
          </div>
          <form>
            <input class="form-control me-1" type="search" name="katakunci" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary btn-md" type="submit">Search</button>
          </form>
        </div>

        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
          <a href="#" class="btn btn-primary">+ Tambah Data</a>
        </div>

        <table class="table table-striped">
          <thead>
            <tr>
              <th class="col-md-1">No</th>
              <th class="col-md-2">NIM</th>
              <th class="col-md-3">Nama</th>
              <th class="col-md-2">Jam Masuk</th>
              <th class="col-md-2">Jam Keluar</th>
              <th class="col-md-2">Action</th>
            </tr>
          </thead>
          <tbody>

            <tr>

              <a href='#' class="btn btn-warning btn-sm">Edit</a>

              <!-- Button trigger modal -->
              <button type="submit" class="btn btn-danger btn-sm" name="submit" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Delete
              </button>

              <!-- Modal -->

            </tr>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p>Apakah Anda Yakin Untuk Menghapus Entry Data Ini?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form class="d-inline" action="#" method="POST">

                      <button type="submit" class="btn btn-danger d-inline">Delete</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

          </tbody>
        </table>
        <div class="container">
       
        <a href='#' class="btn btn-warning btn-sm">Cetak Ke Excel</a>
    </div>

    <script>
        function exportToExcel() {
            // Logic untuk mengirim permintaan ke server dan menghasilkan file Excel
            // Anda dapat menggunakan JavaScript atau Ajax untuk mengirim permintaan ke server dan menghasilkan file Excel
            // Setelah itu, Anda dapat menyimpan file Excel tersebut atau memberikan tautan unduh kepada pengguna
        }
    </script>

      </div>
      <!-- AKHIR DATA -->
      <?php
      include 'footer.php';
      ?>