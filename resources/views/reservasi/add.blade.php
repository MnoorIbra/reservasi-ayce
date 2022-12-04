@extends('layouts.app')

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

            <h5 class="card-title fw-bolder mb-3">Tambah reservasi</h5>

            <form method="post" action="{{ route('reservasi.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="id_reservasi" class="form-label">ID reservasi</label>
                    <input type="text" class="form-control" id="id_reservasi" name="id_reservasi">
                </div>
                <div class="mb-3">
                    <label for="id_pelanggan" class="form-label">ID Pelanggan</label>
                    {{-- <input type="text" class="form-control" id="harga" name="id_meja"> --}}
                    <div class="form-group">
                        <select class="form-control" name="id_pelanggan">
                            @foreach ($pelanggans as $pel)
                                <option value="{{ $pel->id_pelanggan }}">{{ $pel->nama_pelanggan}}</option>
                            @endforeach
                        </select>
                    </div>
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

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga">
                </div>



                <div class="mb-3">
                    <label for="tanggal_reservasi" class="form-label">Tanggal Reservasi(yyyy-mm-dd)</label>
                    <input type="text" class="form-control" id="datepicker" name="tanggal_reservasi">
                </div>


                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Tambah" />
                </div>
            </form>
        </div>
    </div>

@stop
