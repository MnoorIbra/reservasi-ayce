<?php

namespace App\Http\Controllers;
use App\Models\Pelanggan;
use app\Http\Controllers\MejaController;
use App\Models\Meja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class PelangganController extends Controller
{
    public function index(){
        $pelanggans = DB::select('SELECT * FROM pelanggan where is_deleted = 0');


        return view('pelanggan.index')
        ->with('pelanggans', $pelanggans);

    }

    public function create(){

        $mejas = Meja::all();
        return view('pelanggan.add', compact('mejas'));
    }

    public function store (Request $request) {
        $request->validate([
            'id_pelanggan',
            'nama_pelanggan' => 'required',
            'no_telp' => 'required',
            'id_meja' => 'required'
        ]);

        DB::insert('INSERT INTO pelanggan(id_pelanggan, nama_pelanggan,  no_telp, id_meja) VALUES (:id_pelanggan, :nama_pelanggan,  :no_telp,  :id_meja)',
        [
            'id_pelanggan' => $request->id_pelanggan,
            'nama_pelanggan' => $request->nama_pelanggan, // dia manggil tabel pelanggan kolom nama pelanggan
            'no_telp' => $request->no_telp,

            'id_meja' => $request->id_meja
        ]
        );

        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('pelanggan')->where('id_pelanggan',
        $id)->first();

        return view('pelanggan.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_pelanggan',
            'nama_pelanggan' => 'required',
            'no_telp' => 'required',
            'id_meja' => 'required'
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE pelanggan SET id_pelanggan = :id_pelanggan, nama_pelanggan = :nama_pelanggan,  no_telp = :no_telp, id_meja = :id_meja WHERE id_pelanggan = :id',
        [
            'id' => $id,
            'id_pelanggan' => $request->id_pelanggan,
            'nama_pelanggan' => $request->nama_pelanggan,
            'no_telp' => $request->no_telp,
            'id_meja' => $request->id_meja
        ]
        );



        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM pelanggan WHERE id_pelanggan = :id_pelanggan', ['id_pelanggan' => $id]);

        // Menggunakan laravel eloquent
        // pelanggan::where('id_pelanggan', $id)->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Data  berhasil dihapus');
    }

  

    public function softDelete($id) {
        DB::update('UPDATE pelanggan SET is_deleted = 1 WHERE id_pelanggan = :id_pelanggan', ['id_pelanggan' => $id]);
        return redirect()->route('pelanggan.index')->with('success', 'Data dihapus sementara');
    }

    public function restore($id){
        // DB::table('pelanggan')->update(['is_deleted' => 0]);
        DB::update('UPDATE pelanggan SET is_deleted = 0 WHERE id_pelanggan = :id_pelanggan = 1', ['id_pelanggan' => $id]);

        return redirect()->route('pelanggan.bin')->with('success', 'Data direstore');
    }

    public function Pelangganbin(){
        $pelanggans = DB::select('SELECT * FROM pelanggan where is_deleted = 1');


        return view('pelanggan.bin')
        ->with('pelanggans', $pelanggans);

    }
}
