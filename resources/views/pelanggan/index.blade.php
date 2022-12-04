@extends('layout')

@section('content')

<h4 class="mt-5">Data Pelanggan</h4>

<a href="{{ route('pelanggan.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>
<a href="{{ route('meja.index') }}" type="button" class="btn btn-primary rounded-3">Pindah Meja</a>
<a href="{{ route('reservasi.index') }}" type="button" class="btn btn-secondary rounded-3">Pindah Reservasi</a>

<a href="{{ route('pelanggan.bin') }}" type="button" class="btn btn-secondary rounded-3 ">re bin</a>

<p>Cari Data Pelanggan :</p>
	<form action={{ route('pelanggan.cari') }} method="GET" >
		<input type="search" name="caripelanggan" placeholder="Cari Pelanggan .." value="{{ Request::get('caripelanggan')}}">
		<button class="btn btn-primary" type="submit">cari </button>
	</form>


@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>No. </th>
        <th>ID </th>
        <th>Nama </th>
        <th>Nomer Telfon</th>
        <th>Meja</th>
      </tr>
    </thead>


    <tbody>
        @php $no = 1; @endphp
        @foreach ($pelanggans as $pelanggan)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $pelanggan->id_pelanggan }}</td>
                <td>{{ $pelanggan->nama_pelanggan }}</td>
                <td>{{ $pelanggan->no_telp }}</td>
                <td>{{ $pelanggan->id_meja }}</td>
                <td>
                    <a href="{{ route('pelanggan.edit', $pelanggan->id_pelanggan) }}" type="button" class="btn btn-info rounded-3">Ubah</a>

                    <!-- Button trigger modal -->

                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#softhapusModal{{ $pelanggan->id_pelanggan }}">
                        Hapus
                    </button>

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $pelanggan->id_pelanggan }}">
                        Hapus
                    </button>

                    <div class="modal fade" id="hapusModal{{ $pelanggan->id_pelanggan }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('pelanggan.delete', $pelanggan->id_pelanggan) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus {{ $pelanggan->nama_pelanggan}} ini? data tidak akan bisa dikembalikan
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>




                    <!--ini soft-->
                    <div class="modal fade" id="softhapusModal{{ $pelanggan->id_pelanggan }}" tabindex="-1" aria-labelledby="softhapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="softhapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('pelanggan.softdelete', $pelanggan->id_pelanggan) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus {{ $pelanggan->nama_pelanggan}} ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


@stop
