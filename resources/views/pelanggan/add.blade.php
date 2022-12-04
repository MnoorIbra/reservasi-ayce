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

            <h5 class="card-title fw-bolder mb-3">Tambah pelanggan</h5>

            <form method="post" action="{{ route('pelanggan.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="id_pelanggan" class="form-label">ID pelanggan</label>
                    <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan">
                </div>
                <div class="mb-3">
                    <label for="nama_pelanggan" class="form-label">Nama pelanggan</label>
                    <input type="text" class="form-control" id="merk" name="nama_pelanggan">
                </div>

                <div class="mb-3">
                    <label for="no_telp" class="form-label">Nomer Telfon</label>
                    <input type="text" class="form-control" id="harga" name="no_telp">
                </div>



                <div class="mb-3">
                    <label for="id_meja" class="form-label">ID meja</label>
                    {{-- <input type="text" class="form-control" id="harga" name="id_meja"> --}}
                    <div class="form-group">
                        <select class="form-control" name="id_meja">
                            @foreach ($mejas as $dp)
                                <option value="{{ $dp->id_meja }}">{{ $dp->paket}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Tambah" />
                </div>
            </form>
        </div>
    </div>

@stop
