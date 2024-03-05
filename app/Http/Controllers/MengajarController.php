<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Mengajar;
use App\Models\Nilai;
use Illuminate\Http\Request;

class MengajarController extends Controller
{
    public function index()
    {
        return view('mengajar.index', [
            'mengajar' => Mengajar::all()
        ]);
    }

    public function create()
    {
        return view('mengajar.create', [
            'guru' => Guru::all(),
            'mapel' => Mapel::all(),
            'kelas' => Kelas::all(),
        ]);
    }

    public function store(Request $request)
    {
        $data_mengajar = $request->validate([
            'guru_id' => ['required'],
            'mapel_id' => ['required'],
            'kelas_id' => ['required'],
        ]);

        $cek_mengajar = Mengajar::where('mapel_id', $request->mapel_id)->where('kelas_id', $request->kelas_id)->first();
        if($cek_mengajar) return back()->with('error', "Data Mengajar Sudah Ada!");
        Mengajar::create($data_mengajar);
        return redirect('/mengajar/index')->with('success', "Data Mengajar Berhasil Ditambah!");
    }

    public function edit(Mengajar $mengajar)
    {
        $guru = Guru::all();
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        return view('mengajar.edit', compact('mengajar', 'guru', 'mapel', 'kelas'));
    }

    public function update(Request $request, Mengajar $mengajar)
    {
        $data_mengajar = $request->validate([
            'guru_id' => ['required'],
            'mapel_id' => ['required'],
            'kelas_id' => ['required'],
        ]);

        $cek_mengajar = Mengajar::where('mapel_id', $request->mapel_id)->where('kelas_id', $request->kelas_id)->first();
        if($cek_mengajar && ($request->mapel_id != $mengajar->mapel_id || $request->mapel_id != $mengajar->mapel_id)) return back()->with('error', "Data Mengajar Sudah Ada!");
        $mengajar->update($data_mengajar);
        return redirect('/mengajar/index')->with('success', "Data Mengajar Berhasil Diubah!");
    }

    public function destroy(Mengajar $mengajar)
    {
        $nilai = Nilai::where('mengajar_id', $mengajar->id)->first();
        if($nilai) return back()->with('error', "Data Mengajar Masih Digunakan di Menu Nilai!");

        $mengajar->delete();
        return back()->with('success', "Data Mengajar Berhasil Dihapus!");
    }
}
