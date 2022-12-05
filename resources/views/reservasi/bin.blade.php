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
                    <a href="{{ route('reservasi.index') }}" type="button" class="btn btn-primary rounded-3">Kembali</a>




                    <table class="table table-hover mt-2">
                        <thead>
                          <tr>
                            <th>No. </th>
                            <th>ID Reservasi</th>
                            <th>ID Pelanggan </th>
                            <th>ID Meja</th>
                            <th>Harga</th>
                            <th>Tanggal</th>
                          </tr>
                        </thead>


                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($reservasis as $reservasi)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $reservasi->id_reservasi }}</td>
                                    <td>{{ $reservasi->id_pelanggan }}</td>
                                    <td>{{ $reservasi->id_meja }}</td>
                                    <td>{{ $reservasi->harga }}</td>
                                    <td>{{ $reservasi->tanggal_reservasi }}</td>
                                    <td>
                                        <a href="{{ route('reservasi.restore', $reservasi->id_reservasi) }}" type="button"
                                            class="btn btn-success rounded-3">Restore</a>

                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $reservasi->id_reservasi }}">
                                                Hapus
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="hapusModal{{ $reservasi->id_reservasi }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="POST" action="{{ route('reservasi.delete', $reservasi->id_reservasi) }}">
                                                            @csrf
                                                            <div class="modal-body">
                                                                Apakah anda yakin ingin menghapus id {{ $reservasi->id_reservasi}} ini? Data yang dihapus tidak akan kembali
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
