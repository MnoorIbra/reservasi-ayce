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

        <h5 class="card-title fw-bolder mb-3">Ubah data meja {{ $data->id_meja }}</h5>

		<form method="post" action="{{ route('meja.update', $data->id_meja) }}">
			@csrf
            <div class="mb-3">
                <label for="id_meja" class="form-label">ID meja</label>
                <input type="text" class="form-control" id="id_meja" name="id_meja" value="{{ $data->id_meja }}">
            </div>
			<div class="mb-3">
                <label for="paket" class="form-label">paket </label>
                <input type="text" class="form-control" id="paket" name="paket" value="{{ $data->paket }}">
            </div>


            <div class="mb-3">
                <label for="durasi_sewa" class="form-label">Durasi</label>
                <input type="text" class="form-control" id="durasi_sewa" name="durasi_sewa" value="{{ $data->durasi_sewa }}">

            </div>

			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop
