<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataPelajaran;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class MataPelajaranController extends Controller
{
    public function cariMapel(Request $request)
    {
        $cari = $request->cari;
        $mapel = MataPelajaran::where('namaMapel', 'like', '%'.$cari.'%')->paginate(5);
        return view('admin.mapel', compact('mapel'));
    }   

    public function index()
    {       
        $map = DB::table('matapelajarans')->count();
        $mapel = MataPelajaran::all(); // Mengambil semua isi tabel
        return view('admin.mapel', compact('mapel','map'));
    }

    public function create()
    {
        return view('mapel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'namaMapel' => 'required',
        ]);
        MataPelajaran::create($request->all());
        return redirect()->route('mapel.index')->with('success', 'Mata Pelajaran Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $mapel = MataPelajaran::find($id);
        return view('mapel.detail', compact('mapel'));

    }

    public function edit($id)
    {
        $mapel = MataPelajaran::find($id);
        return view('mapel.edit', compact('mapel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namaMapel' => 'required',
        ]);
        MataPelajaran::find($id)->update($request->all());
        return redirect()->route('mapel.index')->with('success', 'Mata Pelajaran Berhasil Diupdate');
    }

    public function destroy($id)
    {
        MataPelajaran::find($id)->delete();
        return redirect()->route('mapel.index')-> with('success', 'Mata Pelajaran Berhasil Dihapus');

    }
}
