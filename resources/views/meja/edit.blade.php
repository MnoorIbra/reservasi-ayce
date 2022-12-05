@extends('layouts.app')

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

        <h5 class="card-title fw-bolder mb-3">Ubah data meja {{ $meja->id_meja }}</h5>

		<form method="post" action="{{ route('meja.update', $meja->id_meja) }}">
			@csrf
            <div class="mb-3">
                <label for="id_meja" class="form-label">ID meja</label>
                <input type="text" class="form-control" id="id_meja" name="id_meja" value="{{ $meja->id_meja }}">
            </div>
			<div class="mb-3">
                <label for="paket" class="form-label">paket </label>
                <input type="text" class="form-control" id="nama_meja" name="paket" value="{{ $meja->paket }}">
            </div>


            <div class="mb-3">
                <label for="durasi_sewa" class="form-label">Durasi</label>
                <input type="text" class="form-control" id="harga" name="durasi_sewa" value="{{ $meja->durasi_sewa }}">

            </div>

			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop
