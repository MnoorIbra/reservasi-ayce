@extends('layout')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card mt-4">
        <div class="card-body">

            <h5 class="card-title fw-bolder mb-3">Tambah Meja</h5>

            <form method="post" action="{{ route('meja.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="id_meja" class="form-label">ID meja</label>
                    <input type="text" class="form-control" id="id_meja" name="id_meja">
                </div>
                <div class="mb-3">
                    <label for="paket" class="form-label">Paket</label>
                    <input type="text" class="form-control" id="merk" name="paket">
                </div>

                <div class="mb-3">
                    <label for="durasi_sewa" class="form-label">Durasi</label>
                    <input type="text" class="form-control" id="harga" name="durasi_sewa">
                </div>



                


                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Tambah" />
                </div>
            </form>
        </div>
    </div>

@stop
