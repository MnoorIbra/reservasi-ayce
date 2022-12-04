@extends('layout')

@section('content')

    <h4 class="mt-5">Data Pelanggan</h4>

    <a href="{{ route('pelanggan.index') }}" type="button" class="btn btn-success rounded-3">Kembali</a>


    @if ($message = Session::get('success'))
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
                        <a href="{{ route('pelanggan.restore', $pelanggan->id_pelanggan) }}" type="button"
                            class="btn btn-secondary rounded-3">Restore</a>







                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

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


        {{-- <tbody>
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

                    </td>
                </tr>
                @endforeach
        </tbody>
    </table> --}}


@stop
