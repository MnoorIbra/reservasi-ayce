@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Data reservasi') }}</div>

                <div class="card-body">

                    <form action={{ route('pelanggan.cari') }} method="GET" >
                        <input type="search" name="caripelanggan" placeholder="Cari Pelanggan .." value="{{ Request::get('caripelanggan')}}">
                        <button class="btn btn-primary" type="submit">cari </button>
                    </form>
                    <table class="table table-hover mt-2">
                        <thead>
                          <tr>
                            <th>No. </th>
                            <th>ID </th>
                            <th>Nama </th>
                            <th>Paket</th>
                            <th>Durasi</th>
                            <th>Harga</th>
                            <th>Tanggal</th>
                          </tr>
                        </thead>


                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($joins as $join)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $join->id_reservasi }}</td>
                                    <td>{{ $join->nama_pelanggan }}</td>
                                    <td>{{ $join->paket }}</td>
                                    <td>{{ $join->durasi_sewa }}</td>
                                    <td>{{ $join->harga }}</td>
                                    <td>{{ $join->tanggal_reservasi }}</td>
                                    <td>
                                        {{-- <a href="" type="button" class="btn btn-warning rounded-3">Ubah</a>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $join->id_reservasi }}">
                                            Hapus
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="hapusModal{{ $join->id_reservasi }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form method="POST" action="{{ route('reservasi.delete', $join->id_reservasi) }}">
                                                        @csrf
                                                        <div class="modal-body">
                                                            Apakah anda yakin ingin menghapus id {{ $join->id_reservasi}} ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary">Ya</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div> --}}
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

{{-- <a href="{{ route('reservasi.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>
<a href="{{ route('meja.index') }}" type="button" class="btn btn-primary rounded-3">Pindah Meja</a>
<a href="{{ route('pelanggan.index') }}" type="button" class="btn btn-secondary rounded-3">Pindah Pelanggan</a> --}}


@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif




@stop
