@extends('layouts.template')
<!-- START DATA -->
@section('konten')
<div class="my-3 p-3 bg-body rounded shadow-sm">
     
      <!-- FORM PENCARIAN -->
      @csrf
      <div class="pb-4">
          <div class="container-xl d-flex justify-content-center m-2 pb-2 fs-4">Tambah Asisten</div>
        <form class="d-flex" action="{{ url('mahasiswa') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" 
            placeholder="Cari Nama / NIM" aria-label="Search">
            <button class="btn btn-secondary btn-md" type="submit">Search</button>
        </form>
      </div>

      <!-- TOMBOL TAMBAH DATA -->
      <div class="pb-3">
        <a href='{{ url('presensi_asisten/create') }}' class="btn btn-success">+ Tambah Data</a>
      </div>

      <table class="table table-striped">
          <thead>
              <tr>
                  <th class="col-md-1">No</th>
                  <th class="col-md-2">NIM</th>
                  <th class="col-md-2">Nama</th>
                  <th class="col-md-2">Jam Masuk</th>
                  <th class="col-md-2">Jam Keluar</th>
                  <th class="col-md-1">Status</th>
                  <th class="col-md-2">Action</th>
              </tr>
          </thead>
          <tbody>
            <?php $i = $data->firstItem() ?>
            @foreach ($data as $item)
              <tr>
                <td>{{ $i }}</td>
                <td>{{ $item->nim }}</td>
                <td>{{ $item->mahasiswa->nama }}</td>
                <td>{{ $item->jam_masuk }}</td>
                <td>{{ $item->jam_keluar }}</td>
                <td>{{ $item->status }}</td>
                <td>

                    <a href="{{ route('presensi_asisten.edit', ['idPresensi' => $item->tanggal_presensi, 'idNIM' => $item->nim]) }}" class="btn btn-warning btn-sm d-inline">Edit</a>

                      <!-- Button trigger modal -->
                      <button type="submit" class="btn btn-danger btn-sm d-inline" name="submit" data-toggle="modal" 
                    data-target="#deleteModal{{ $item->tanggal_presensi }}{{ $item->nim }}">Delete</button>
   
                  </td>
              </tr>
              <?php $i++ ?>
              @endforeach
            
                  {{-- Modal View Select --}}
                   @foreach ($data as $item)
                    <div class="modal animate__bounceIn" id="viewModal{{ $item->nim }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Lihat Data Mahasiswa</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                          <div class="modal-body">

                                  <div class="mx-2">

                                    <div class="mb-3">
                                      <label for="nim" class="form-label">NIM</label>
                                      <input id="nim" type="text" class="form-control" name="nim" 
                                      value="{{ $item->nim }}" autofocus readonly>
                                    </div>

                                    <div class="mb-3">
                                      <label for="nama" class="form-label">Nama</label>
                                      <input id="nama" type="text" class="form-control" name="nama" 
                                      value="{{ $item->nama }}" autofocus readonly>
                                    </div>

                                    <div class="mb-3">
                                      <label for="fakultas" class="form-label">Fakultas</label>
                                      <input id="fakultas" type="text" class="form-control" name="fakultas" 
                                      value="{{ $item->fakultas }}" autofocus readonly>
                                    </div>

                                    <div class="mb-3">
                                      <label for="jurusan" class="form-label">Jurusan</label>
                                      <input id="jurusan" type="text" class="form-control" name="jurusan" 
                                      value="{{ $item->jurusan }}" autofocus readonly>
                                    </div>

                                    <div class="mb-3">
                                      <label for="no_telepon" class="form-label">No. Telepon</label>
                                      <input id="no_telepon" type="text" class="form-control" name="no_telepon" 
                                      value="{{ $item->no_telepon }}" autofocus readonly>
                                    </div>
                                    
                                    <div class="mb-3">
                                      <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                          <input id="jenis_kelamin" type="text" class="form-control" name="jenis_kelamin" 
                                      value="{{ $item->jenis_kelamin }}" autofocus readonly>
                                    </div>

                                    <div class="mb-3">
                                      <label for="jabatan" class="form-label">Jabatan</label>
                                        <input id="jabatan" type="text" class="form-control" name="jabatan" 
                                      value="{{ $item->jabatan }}" autofocus readonly>
                                    </div>

                                  </div>  
                                </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach

                    
            <!-- Modal Delete -->
            @foreach ($data as $item)
                   <div class="modal fade" id="deleteModal{{ $item->tanggal_presensi }}{{ $item->nim }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <button type="button" class="btn btn-secondary animate__bounceOutDown" data-bs-dismiss="modal">Close</button>
                            {{-- <form class="d-inline" action="{{ route('presensi.destroy', ['presensi' => $item->id]) }}" method="POST"> --}}
                            <form class="d-inline" action="{{ route('presensi_asisten.destroy', [$item->tanggal_presensi, $item->nim]) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">{{ $item->nim }}</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
              @endforeach
          </tbody>
      </table>

             
      {{ $data->withQueryString()->links() }}


      
     
</div>
<!-- AKHIR DATA -->
@endsection




