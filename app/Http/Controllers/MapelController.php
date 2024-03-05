<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Mengajar;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        return view('mapel.index', [
            'mapel' => Mapel::all()
        ]);
    }

    public function create()
    {
        return view('mapel.create');
    }

    public function store(Request $request)
    {
        $data_mapel = $request->validate([
            'nama_mapel' => ['required', 'unique:mapels'],
        ]);

        Mapel::create($data_mapel);
        return redirect('/mapel/index')->with('success', "Data Mapel Berhasil Ditambah!");
    }

    public function edit(Mapel $mapel)
    {
        return view('mapel.edit', compact('mapel'));
    }

    public function update(Request $request, Mapel $mapel)
    {
        $data_mapel = $request->validate([
            'nama_mapel' => ['required', 'unique:mapels,nama_mapel,'.$mapel->id],
        ]);

        $mapel->update($data_mapel);
        return redirect('/mapel/index')->with('success', "Mapel mapel Berhasil Diubah!");
    }

    public function destroy(Mapel $mapel)
    {
        $mengajar = Mengajar::where('mapel_id', $mapel->id)->first();
        if($mengajar) return back()->with('error', "Data Mapel $mapel->nama_mapel Masih Digunakan di Menu Mengajar!");

        $mapel->delete();
        return back()->with('success', "Data Mapel Berhasil Dihapus!");
    }
}
