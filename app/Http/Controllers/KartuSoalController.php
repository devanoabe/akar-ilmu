<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Soal;
use App\Models\KartuSoal;

class KartuSoalController extends Controller
{
    public function cariKartu(Request $request)
    {
        $cari = $request->cari;
        $kartu = KartuSoal::where('soal_id', 'like', '%'.$cari.'%')->paginate(5);
        return view('admin.kartu', compact('kartu'));
    }   

    public function index()
    {       
        $kartu = KartuSoal::all(); // Mengambil semua isi tabel
        return view('admin.kartu', compact('kartu'));
    }
    


   public function create()
    {
        $soal = Soal::all();
        return view('kartu.create', compact('soal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'id' => 'required',
            'soal_id' => 'required',
            'kunci' => 'required',
        ]);
        KartuSoal::create($request->all());
        return redirect()->route('kartu.index')->with('success', 'Kartu Soal Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $kartu = KartuSoal::find($id);
        return view('kartu.detail', compact('kartu'));

    }

    public function edit($id)
    {
        $kartu = KartuSoal::find($id);
        return view('kartu.edit', compact('kartu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kunci' => 'required',
        ]);
        KartuSoal::find($id)->update($request->all());
        return redirect()->route('kartu.index')->with('success', 'Kartu Soal Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        KartuSoal::find($id)->delete();
        return redirect()->route('kartu.index')-> with('success', 'Kartu Soal Berhasil Dihapus');

    }
}
