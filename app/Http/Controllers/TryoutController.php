<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tryout;
use App\Models\MataPelajaran;
use App\Models\User;
use Illuminate\Http\Response;

class TryoutController extends Controller
{
    public function cariTryout(Request $request)
    {
        $cari = $request->cari;
        $tryout = Tryout::where('namaTryout', 'like', '%'.$cari.'%')->paginate(5);
        return view('admin.tryout', compact('tryout'));
    }   

    public function index()
    {       
        $tryout = Tryout::all(); // Mengambil semua isi tabel
        return view('admin.tryout', compact('tryout'));
    }
    


   public function create()
    {
        $user = User::all();
        $mapel = MataPelajaran::all();
        return view('tryout.create', compact('user', 'mapel'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'namaTryout' => 'required',
            'detailTryout' => 'required',
            'user_id' => 'required',
            'mata_pelajaran_id' => 'required',
        ]);
        Tryout::create($request->all());
        return redirect()->route('tryout.index')->with('success', 'Mata Pelajaran Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $tryout = Tryout::find($id);
        return view('tryout.detail', compact('tryout'));

    }

    public function edit($id)
    {
        $tryout = Tryout::find($id);
        return view('tryout.edit', compact('tryout'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namaTryout' => 'required',
            'detailTryout' => 'required',
        ]);
        Tryout::find($id)->update($request->all());
        return redirect()->route('tryout.index')->with('success', 'Mata Pelajaran Berhasil Ditambahkan');
    }

    public function destroy($id)
    {
        Tryout::find($id)->delete();
        return redirect()->route('tryout.index')-> with('success', 'Mata Pelajaran Berhasil Dihapus');

    }
}
