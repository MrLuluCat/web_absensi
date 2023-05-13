@extends('layouts.template')
<!-- START DATA -->
@section('konten')
<div class="my-3 p-3 bg-body rounded shadow-sm">
     
      <!-- FORM PENCARIAN -->
      @csrf
      <div class="pb-4">
          <div class="container-xl d-flex justify-content-center m-2 pb-2 fs-4">Data Asisten/Calas</div>
        <form class="d-flex" action="{{ url('mahasiswa') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" 
            placeholder="Cari Nama / NIM" aria-label="Search">
            <button class="btn btn-secondary btn-md" type="submit">Search</button>
        </form>
      </div>

      <!-- TOMBOL TAMBAH DATA -->
      <div class="pb-3">
        <a href='{{ url('mahasiswa/create') }}' class="btn btn-success">+ Tambah Data</a>
      </div>

      <table class="table table-striped table-hover">
          <thead>
              <tr>
                  <th class="col-md-1">No</th>
                  <th class="col-md-2">NIM</th>
                  <th class="col-md-4">Nama</th>
                  <th class="col-md-2">Jabatan</th>
                  <th class="col-md-2">Action</th>
              </tr>
          </thead>
          <tbody>
            <?php $i = $data->firstItem() ?>
            @foreach ($data as $item)
              <tr>
                <td data-toggle="modal" data-target="#viewModal{{ $item->nim }}">{{ $i }}</td>
                <td data-toggle="modal" data-target="#viewModal{{ $item->nim }}">{{ $item->nim }}</td>
                <td data-toggle="modal" data-target="#viewModal{{ $item->nim }}">{{ $item->nama }}</td>
                <td data-toggle="modal" data-target="#viewModal{{ $item->nim }}">{{ $item->jabatan }}</td>
                <td>

                    {{-- <button type="submit" class="btn btn-primary btn-sm" name="submit" >View</button> --}}
                    <a href='{{ url('mahasiswa/' .$item->nim. '/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                  
                      <!-- Button trigger modal -->
                    <button type="submit" class="btn btn-danger btn-sm" name="submit" data-toggle="modal" 
                    data-target="#deleteModal{{ $item->nim }}">Delete</button>
                    
                </td>
              </tr>
              <?php $i++ ?>
              @endforeach
            
              {{-- Modal Select --}}
              @foreach ($data as $item)
                  <!-- Modal -->
              <div class="modal fade" id="viewModal{{ $item->nim }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Info Lengkap</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="#" method="post">
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="nim">NIM</label>
                            <input class="form-control" type="text" aria-label="Disabled input example" value="{{ $item->nim }}" disabled readonly>
                          </div>
                          <div class="form-group">
                            <label for="nama">Nama</label>
                            <input class="form-control" type="text" aria-label="Disabled input example" value="{{ $item->nama }}" disabled readonly>
                          </div>
                          <div class="form-group">
                            <label for="jabatan">Fakultas</label>
                            <input class="form-control" type="text" aria-label="Disabled input example" value="{{ $item->fakultas }}" disabled readonly>
                          </div>
                          <div class="form-group">
                            <label for="jabatan">Jurusan</label>
                            <input class="form-control" type="text" aria-label="Disabled input example" value="{{ $item->jurusan }}" disabled readonly>
                          </div>
                          <div class="form-group">
                            <label for="jabatan">No Telepon</label>
                            <input class="form-control" type="text" aria-label="Disabled input example" value="{{ $item->no_telepon }}" disabled readonly>
                          </div>
                          <div class="form-group">
                            <label for="jabatan">Jenis kelamin</label>
                            <input class="form-control" type="text" aria-label="Disabled input example" value="{{ $item->jenis_kelamin }}" disabled readonly>
                          </div>
                          <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input class="form-control" type="text" aria-label="Disabled input example" value="{{ $item->jabatan }}" disabled readonly>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach

            <!-- Modal Delete -->
            @foreach ($data as $item)
                    <div class="modal fade" id="deleteModal{{ $item->nim }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            {{-- <form class="d-inline" action="{{ route('presensi.destroy', ['presensi' => $item->id]) }}" method="POST"> --}}
                            <form class="d-inline" action="{{ url('mahasiswa/'.$item->nim) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger d-inline">{{ $item->nim }}</button>
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




