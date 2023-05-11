{{-- @if(Auth::check() && Auth::user()->isAdmin()) --}}
    {{-- @extends('admin.templateAdmin') --}}
{{-- @else

{{-- @endif --}} 
@extends('layouts.template')
<!-- START DATA -->
@section('konten')

<div class="my-3 p-3 bg-body rounded shadow-sm">
     
      <!-- FORM PENCARIAN -->
      @csrf
      <div class="pb-4">
          <div class="container-xl d-flex justify-content-center m-2 pb-2 fs-4">Tambah Presensi Calas</div>
        <form class="d-flex" action="{{ url('presensi_calas') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" 
            placeholder="Cari Nama / NIM" aria-label="Search">
            <button class="btn btn-secondary btn-md" type="submit">Search</button>
        </form>
      </div>

        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <a href='{{ url('presensi_calas/create') }}' class="btn btn-success">+ Tambah Data</a>
        </div>

        @if($data->isEmpty())
            <p>Belum ada data presensi calas.</p>
        @else
            <table id="" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="col-md-1">No</th>
                        <th class="col-md-2">NIM</th>
                        <th class="col-md-2">Nama</th>
                        <th class="col-md-2">Jam Masuk</th>
                        <th class="col-md-2">Jam Keluar</th>
                        <th class="col-md-1">Status</th>
                        <th class="col-sm-2">Action</th>
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
                                <a href="{{ route('presensi_calas.edit', ['idPresensi' => $item->tanggal_presensi, 'idNIM' => $item->nim]) }}" class="btn btn-warning btn-sm d-inline">Edit</a>

                                <!-- Button trigger modal -->
                                <button type="submit" class="btn btn-danger btn-sm d-inline" name="submit" data-toggle="modal" data-target="#deleteModal{{ $item->tanggal_presensi }}{{ $item->nim }}">Delete</button>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    @endforeach

                    <!-- Modal Delete -->
                    @foreach ($data as $item)
                        <div class="modal fade" tabindex="-1" id="deleteModal{{ $item->tanggal_presensi }}{{ $item->nim }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <button type="button" class="btn btn-secondary animate__bounceOutDown" data-dismiss="modal">Close</button>
                            {{-- <form class="d-inline" action="{{ route('presensi.destroy', ['presensi' => $item->id]) }}" method="POST"> --}}
                            <form action="{{ route('presensi_calas.destroy', [$item->tanggal_presensi, $item->nim]) }}" method="POST">
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
      @endif
</div>


<!-- AKHIR DATA -->
@endsection




