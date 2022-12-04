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
