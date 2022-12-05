@extends('layouts.app')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Data reservasi') }}</div>

                <div class="card-body">
                    <a href="{{ route('pelanggan.index') }}" type="button" class="btn btn-success rounded-3">Kembali</a>




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
                                        <a href="{{ route('pelanggan.restore', $pelanggan->id_pelanggan) }}" type="button"
                                            class="btn btn-secondary rounded-3">Restore</a>

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





                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>






@stop
