@extends('layout')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif

<div class="card mt-4">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Ubah Data pelanggan {{ $data->id_reservasi }}</h5>

		<form method="post" action="{{ route('reservasi.update', $data->id_reservasi) }}">
			@csrf
            <div class="mb-3">
                <label for="id_reservasi" class="form-label">ID Reservasi</label>
                <input type="text" class="form-control" id="id_pelanggan" name="id_reservasi" value="{{ $data->id_reservasi }}">
            </div>
			<div class="mb-3">
                <label for="id_pelanggan" class="form-label">ID pelanggan</label>
                <input type="text" class="form-control" id="nama_pelanggan" name="id_pelanggan" value="{{ $data->id_pelanggan }}">
            </div>
            <div class="mb-3">
                <label for="id_meja" class="form-label">ID Meja</label>
                <input type="text" class="form-control" id="no_telp" name="id_meja" value="{{ $data->id_meja }}">
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" value="{{ $data->harga }}">

            </div>

            <div class="mb-3">
                <label for="tanggal_reservasi" class="form-label">Tanggal Reservasi</label>
                <input type="text" class="form-control" id="harga" name="tanggal_reservasi" value="{{ $data->tanggal_reservasi }}">

            </div>

			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop
