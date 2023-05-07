<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisSoal;
use Illuminate\Http\Response;

class JenisSoalController extends Controller
{
    public function cariJenis(Request $request)
    {
        $cari = $request->cari;
        $jenis = JenisSoal::where('jenisSoal', 'like', '%'.$cari.'%')->paginate(5);
        return view('admin.jenis', compact('jenis'));
    }   

    public function index()
    {       
        $jenis = JenisSoal::all(); // Mengambil semua isi tabel
        return view('admin.jenis', compact('jenis'));
    }

    public function create()
    {
        return view('jenis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'jenis' => 'required',
        ]);
        JenisSoal::create($request->all());
        return redirect()->route('jenis.index')->with('success', 'Jenis Soal Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $jenis = JenisSoal::find($id);
        return view('jenis.detail', compact('jenis'));

    }

    public function edit($id)
    {
        $jenis = JenisSoal::find($id);
        return view('jenis.edit', compact('jenis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis' => 'required',
        ]);
        JenisSoal::find($id)->update($request->all());
        return redirect()->route('jenis.index')->with('success', 'Jenis Soal Berhasil Ditambahkan');
    }

    public function destroy($id)
    {
        JenisSoal::find($id)->delete();
        return redirect()->route('jenis.index')-> with('success', 'Jenis Soal Berhasil Dihapus');

    }
}
