<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meja;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MejaController extends Controller
{
    public function index(){
        $mejas = Meja::all();

        return view('meja.index')
        ->with('mejas', $mejas);
    }

    public function create(){
        return view('meja.add');
    }

    public function store (Request $request) {
        $request->validate([
            'id_meja',
            'paket' => 'required',
            'durasi_sewa' => 'required'


        ]);

        DB::insert('INSERT INTO meja(id_meja, paket, durasi_sewa) VALUES (:id_meja, :paket, :durasi_sewa)',
        [
            'id_meja' => $request->id_meja,
            'paket' => $request->paket, // dia manggil tabel meja kolom nama meja
            'durasi_sewa' => $request->durasi_sewa


        ]
        );

        return redirect()->route('meja.index')->with('success', 'Data meja berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('meja')->where('id_meja', $id)->first();
        return view('meja.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_meja',
            'paket' => 'required',
            'durasi_sewa' => 'required'
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE meja SET id_meja = :id_meja, paket = :paket,   durasi_sewa = :durasi_sewa WHERE id_meja = :id',
        [
            'id_meja' => $request->id_meja,
            'paket' => $request->paket, // dia manggil tabel meja kolom nama meja
            'durasi_sewa' => $request->durasi_sewa
        ]
        );



        return redirect()->route('meja.index')->with('success', 'Data meja berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM meja WHERE id_meja = :id_meja', ['id_meja' => $id]);

        // Menggunakan laravel eloquent
        // meja::where('id_meja', $id)->delete();

        return redirect()->route('meja.index')->with('success', 'Data  berhasil dihapus');
    }

    public function carimeja(Request $request) {
        $cari = $request->carimeja;

        $datas = DB::table('meja')->where('', 'like', "%".$cari."%");

        return view('meja.index')
            ->with('datas', $datas);


    }

}
