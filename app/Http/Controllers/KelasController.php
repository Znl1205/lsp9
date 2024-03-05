<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mengajar;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        return view('kelas.index', [
            'kelas' => Kelas::all()
        ]);
    }

    public function create()
    {
        return view('kelas.create', [
            'tingkat_kelas' => ['10', '11', '12', '13'],
            'jurusan' => ['DKV/MM', 'BKP', 'DPIB', 'RPL', 'SIJA', 'TKJ', 'TP', 'TOI', 'TKR', 'TFLM'],
        ]);
    }

    public function store(Request $request)
    {
        $data_kelas = $request->validate([
            'tingkat_kelas' => ['required'],
            'jurusan' => ['required'],
            'rombel' => ['required'],
        ]);

        $cek_kelas = Kelas::firstOrNew($data_kelas);
        if($cek_kelas->exists) return back()->with('error', "Data Kelas Sudah Ada!");
        $cek_kelas->save();
        return redirect('/kelas/index')->with('success', "Data Kelas Berhasil Ditambah!");
    }

    public function edit(Kelas $kelas)
    {
        $tingkat_kelas = ['10', '11', '12', '13'];
        $jurusan = ['DKV/MM', 'BKP', 'DPIB', 'RPL', 'SIJA', 'TKJ', 'TP', 'TOI', 'TKR', 'TFLM'];
        return view('kelas.edit', compact('kelas', 'tingkat_kelas', 'jurusan'));
    }

    public function update(Request $request, Kelas $kelas)
    {
        $data_kelas = $request->validate([
            'tingkat_kelas' => ['required'],
            'jurusan' => ['required'],
            'rombel' => ['required'],
        ]);

        $cek_kelas = Kelas::firstOrNew($data_kelas);
        if($cek_kelas->exists && ($request->tingkat_kelas != $kelas->tingkat_kelas || $request->jurusan != $kelas->jurusan || $request->rombel != $kelas->rombel)) return back()->with('error', "Data Kelas Sudah Ada!");
        $kelas->update($data_kelas);
        return redirect('/kelas/index')->with('success', "Kelas kelas Berhasil Diubah!");
    }

    public function destroy(Kelas $kelas)
    {
        $mengajar = Mengajar::where('kelas_id', $kelas->id)->first();
        if($mengajar) return back()->with('error', "Data Kelas Masih Digunakan di Menu Mengajar!");
        $siswa = Siswa::where('kelas_id', $kelas->id)->first();
        if($siswa) return back()->with('error', "Data Kelas Masih Digunakan di Menu Siswa!");

        $kelas->delete();
        return back()->with('success', "Data Kelas Berhasil Dihapus!");
    }
}
