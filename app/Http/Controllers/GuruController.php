<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mengajar;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        return view('guru.index', [
            'guru' => Guru::all()
        ]);
    }

    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $data_guru = $request->validate([
            'nip' => ['required', 'unique:gurus'],
            'nama_guru' => ['required'],
            'jk' => ['required'],
            'alamat' => ['required'],
            'password' => ['required'],
        ]);

        Guru::create($data_guru);
        return redirect('/guru/index')->with('success', "Data Guru Berhasil Ditambah!");
    }

    public function edit(Guru $guru)
    {
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {
        $data_guru = $request->validate([
            'nip' => ['required', 'unique:gurus,nip,'.$guru->id],
            'nama_guru' => ['required'],
            'jk' => ['required'],
            'alamat' => ['required'],
            'password' => ['required'],
        ]);

        $guru->update($data_guru);
        return redirect('/guru/index')->with('success', "Data Guru Berhasil Diubah!");
    }

    public function destroy(Guru $guru)
    {
        $mengajar = Mengajar::where('guru_id', $guru->id)->first();
        if($mengajar) return back()->with('error', "Data Guru $guru->nama_guru Masih Digunakan di Menu Mengajar!");

        $guru->delete();
        return back()->with('success', "Data Guru Berhasil Dihapus!");
    }
}
