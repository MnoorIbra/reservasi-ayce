@extends('layouts.app')

@section('content')

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Data Meja') }}</div>

                <div class="card-body">
                    <a href="{{ route('meja.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>
<a href="{{ route('meja.bin') }}" type="button" class="btn btn-primary rounded-3">Pindah meja</a>



<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>No. </th>
        <th>ID </th>
        <th>paket </th>
        <th>Durasi</th>
      </tr>
    </thead>


    <tbody>
        @php $no = 1; @endphp
        @foreach ($mejas as $meja)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $meja->id_meja }}</td>
                <td>{{ $meja->paket }}</td>
                <td>{{ $meja->durasi_sewa }}</td>

                <td>
                    <a href="{{ route('meja.edit', $meja->id_meja) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>

                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#softhapusModal{{ $meja->id_meja }}">
                        Hapus
                    </button>

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $meja->id_meja }}">
                        Hapus
                    </button>

                    <div class="modal fade" id="hapusModal{{ $meja->id_meja }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('meja.delete', $meja->id_meja) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus {{ $meja->paket}} ini? data tidak akan bisa dikembalikan
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
                    <div class="modal fade" id="softhapusModal{{ $meja->id_meja }}" tabindex="-1" aria-labelledby="softhapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="softhapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('meja.softdelete', $meja->id_meja) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus {{ $meja->paket}} ini?
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
