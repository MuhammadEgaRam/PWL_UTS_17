<?php

namespace App\Http\Controllers;

use App\Models\datas;
use Illuminate\Http\Request;

class data extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fungsi eloquent menampilkan data menggunakan pagination
        $mahasiswas = datas::paginate(5); // Mengambil 5 isi tabel
        $posts = datas::orderBy('kode_buku', 'desc')->paginate(6);
        return view('kode_buku.index', compact('tablw'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('tablw.create');
    }
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'kode_buku' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'jenis_buku' => 'required',
            'harga' => 'required',
            'qty' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        datas::create($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('tablw.index')->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }
    public function show($kode_buku)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        $Mahasiswa = datas::find($kode_buku);
        return view('tablw.detail', compact('datas'));
    }
    public function edit($kode_buku)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $Mahasiswa = datas::find($kode_buku);
        return view('data.edit', compact('datas'));
    }
    public function update(Request $request, $kode_buku)
    {
        //melakukan validasi data
        $request->validate([
            'kode_buku' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'jenis_buku' => 'required',
            'harga' => 'required',
            'qty' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
        datas::find($kode_buku)->update($request->all());
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('tablw.index')->with('success', 'Mahasiswa Berhasil Diupdate');
    }
    public function destroy($kode_buku)
    {
        //fungsi eloquent untuk menghapus data
        datas::find($kode_buku)->delete();
        return redirect()->route('tablw.index')->with('success', 'Mahasiswa Berhasil Dihapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $data = datas::where('Nama', 'like', '%' . $keyword . '%')->paginate(5);
        return view('tablw.index', compact('tablw'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
};