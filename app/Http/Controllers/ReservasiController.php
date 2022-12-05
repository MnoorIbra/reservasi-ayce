<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Reservasi;
use App\Models\Meja;
use App\Models\Pelanggan;

class ReservasiController extends Controller
{
    public function index(){
        $reservasis = DB::select('SELECT * FROM reservasi WHERE is_deleted  = 0');




        return view('reservasi.index')
        ->with('reservasis', $reservasis);





    }

    public function create(){

        $mejas = Meja::all();
        $pelanggans = Pelanggan::all();
        return view('reservasi.add', compact('mejas', 'pelanggans'));
    }

    public function store (Request $request) {
        $request->validate([
            'id_reservasi', 'required',
            'id_pelanggan' => 'required',
            'id_meja' => 'required',
            'harga' => 'required',
            'tanggal_reservasi' => 'required'
        ]);

        DB::insert('INSERT INTO reservasi(id_reservasi, id_pelanggan, id_meja,  harga, tanggal_reservasi) VALUES (:id_reservasi, :id_pelanggan, :id_meja, :harga,  :tanggal_reservasi)',
        [
            'id_reservasi' => $request->id_reservasi,
            'id_pelanggan' => $request->id_pelanggan,
            'id_meja' => $request->id_meja,
            'harga' => $request->harga,
            'tanggal_reservasi' => $request->tanggal_reservasi
        ]
        );

        return redirect()->route('reservasi.index')->with('success', 'Data reservasi berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('reservasi')->where('id_reservasi',
        $id)->first();

        return view('reservasi.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_reservasi', 'required',
            'id_pelanggan' => 'required',
            'id_meja' => 'required',
            'harga' => 'required',
            'tanggal_reservasi' => 'required'
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE reservasi SET id_reservasi = :id_reservasi, id_pelanggan = :id_pelanggan, id_meja = :id_meja,  harga = :harga, tanggal_reservasi = :tanggal_reservasi WHERE id_reservasi = :id',
        [
            'id' => $id,
            'id_reservasi' => $request->id_reservasi,
            'id_pelanggan' => $request->id_pelanggan,
            'id_meja' => $request->id_meja,
            'harga' => $request->harga,
            'tanggal_reservasi' => $request->tanggal_reservasi
        ]
        );



        return redirect()->route('reservasi.index')->with('success', 'Data reservasi berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM reservasi WHERE id_reservasi = :id_reservasi', ['id_reservasi' => $id]);

        // Menggunakan laravel eloquent
        // reservasi::where('id_reservasi', $id)->delete();

        return redirect()->route('reservasi.bin')->with('success', 'Data  berhasil dihapus');
    }

    public function carireservasi(Request $request) {
        $cari = $request->carireservasi;

        $datas = DB::table('reservasi')->where('id_pelanggan', 'like', "%".$cari."%");

        return view('reservasi.index')
            ->with('datas', $datas);


    }

    public function Reservasibin(){
        $reservasis = DB::select('SELECT * FROM reservasi where is_deleted = 1');


        return view('reservasi.bin')
        ->with('reservasis', $reservasis);

    }

    public function softDelete($id) {
        DB::update('UPDATE reservasi SET is_deleted = 1 WHERE id_reservasi = :id_reservasi', ['id_reservasi' => $id]);
        return redirect()->route('reservasi.index')->with('success', 'Data dihapus sementara');
    }

    public function restore($id){
        // DB::table('pelanggan')->update(['is_deleted' => 0]);
        DB::update('UPDATE reservasi SET is_deleted = 0 WHERE id_reservasi = :id_reservasi ', ['id_reservasi' => $id]);

        return redirect()->route('reservasi.bin')->with('success', 'Data direstore');
    }

    public function home(){
        $joins = DB::table('reservasi')
        ->join('pelanggan', 'reservasi.id_pelanggan', '=', 'pelanggan.id_pelanggan')
        ->join('meja', 'reservasi.id_meja', '=', 'meja.id_meja')
        ->select('reservasi.id_reservasi', 'pelanggan.nama_pelanggan', 'meja.paket', 'meja.durasi_sewa', 'reservasi.harga', 'reservasi.tanggal_reservasi' )
        ->where('reservasi.is_deleted', '0')
        ->where('pelanggan.is_deleted', '0')
        ->where('meja.is_deleted', '0')
        ->get();

        return view('index')

        ->with('joins', $joins);
    }

    public function caripelanggan(Request $request) {
        $caripelanggan = $request->caripelanggan;

        $joins = DB::table('reservasi')
        ->join('pelanggan', 'reservasi.id_pelanggan', '=', 'pelanggan.id_pelanggan')
        ->join('meja', 'reservasi.id_meja', '=', 'meja.id_meja')
        ->select('reservasi.id_reservasi', 'pelanggan.nama_pelanggan', 'meja.paket', 'meja.durasi_sewa', 'reservasi.harga', 'reservasi.tanggal_reservasi' )
        ->where('nama_pelanggan', 'like', "%$caripelanggan%")
        ->orWhere('paket', 'like', "%$caripelanggan%")
        ->orWhere('id_reservasi', 'like', "%$caripelanggan%")
        ->orWhere('tanggal_reservasi', 'like', "%$caripelanggan%")
        ->orWhere('durasi_sewa', 'like', "%$caripelanggan%")
        ->orWhere('harga', 'like', "%$caripelanggan%")
        ->get();

        return view('index')
        ->with('joins', $joins);


    }
}
