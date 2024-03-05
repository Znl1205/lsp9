<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mengajar;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        if (session('role') === "Guru") {
            $idsKelas = Mengajar::where('guru_id', session('id'))->pluck('kelas_id')->toArray();
            $kelas = Kelas::whereIn('id', $idsKelas)->get();
            return view('nilai.menu', compact('kelas'));
        } else {
            $nilai = Nilai::where('siswa_id', session('id'))->get();
            return view('nilai.index', compact('nilai'));
        }
    }

    public function kelas(Kelas $kelas)
    {
        $nilai = Nilai::whereHas('mengajar', function ($query) use ($kelas) {
            $query->where('guru_id', session('id'))->where('kelas_id', $kelas->id);
        })->get();
        return view('nilai.index', compact('nilai', 'kelas'));
    }

    public function create(Kelas $kelas)
    {
        $mengajar = Mengajar::where('guru_id', session('id'))->where('kelas_id', $kelas->id)->get();
        $siswa = Siswa::where('kelas_id', $kelas->id)->get();
        return view('nilai.create', compact('mengajar', 'siswa', 'kelas'));
    }

    public function store(Request $request, Kelas $kelas)
    {
        $data_nilai = $request->validate([
            'mengajar_id' => ['required'],
            'siswa_id' => ['required'],
            'uh' => ['required'],
            'uts' => ['required'],
            'uas' => ['required'],
        ]);
        $data_nilai['na'] = round(($request->uh + $request->uts + $request->uas) / 3);

        $cek_nilai = Nilai::where('mengajar_id', $request->mengajar_id)->where('siswa_id', $request->siswa_id)->first();
        if($cek_nilai) return back()->with('error', "Data Nilai Sudah Ada!");
        Nilai::create($data_nilai);
        return redirect("/nilai/kelas/$kelas->id")->with('success', "Data Nilai Berhasil Ditambah!");
    }

    public function edit(Kelas $kelas, Nilai $nilai)
    {
        $mengajar = Mengajar::where('guru_id', session('id'))->where('kelas_id', $kelas->id)->get();
        $siswa = Siswa::where('kelas_id', $kelas->id)->get();
        return view('nilai.edit', compact('mengajar', 'siswa', 'kelas', 'nilai'));
    }

    public function update(Request $request, Kelas $kelas, Nilai $nilai)
    {
        $data_nilai = $request->validate([
            'mengajar_id' => ['required'],
            'siswa_id' => ['required'],
            'uh' => ['required'],
            'uts' => ['required'],
            'uas' => ['required'],
        ]);
        $data_nilai['na'] = round(($request->uh + $request->uts + $request->uas) / 3);

        $cek_nilai = Nilai::where('mengajar_id', $request->mengajar_id)->where('siswa_id', $request->siswa_id)->first();
        if($cek_nilai && ($request->mengajar_id != $nilai->mengajar_id || $request->siswa_id != $nilai->siswa_id)) return back()->with('error', "Data Nilai Sudah Ada!");
        $nilai->update($data_nilai);
        return redirect("/nilai/kelas/$kelas->id")->with('success', "Data Nilai Berhasil Diubah!");
    }

    public function destroy(Nilai $nilai)
    {
        $nilai->delete();
        return back()->with('success', "Data Nilai Berhasil Dihapus!");
    }
}
