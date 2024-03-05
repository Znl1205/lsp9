<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function home()
    {
        return view('home');
    }

    public function loginAdmin(Request $request)
    {
        $admin = Administrator::where('kode_admin', $request->kode_admin)->where('password', $request->password)->first();

        if(!$admin){
            return back()->with('error', "Kode Admin atau Password Salah");
        }

        session([
            'id' => $admin->id,
            'role' => "Admin",
            'nama' => $admin->kode_admin
        ]);

        return redirect('/home');
    }

    public function loginGuru(Request $request)
    {
        $guru = Guru::where('nip', $request->nip)->where('password', $request->password)->first();

        if(!$guru){
            return back()->with('error', "Nip atau Password Salah");
        }

        session([
            'id' => $guru->id,
            'role' => "Guru",
            'nama' => $guru->nama_guru
        ]);

        return redirect('/home');
    }

    public function loginSiswa(Request $request)
    {
        $siswa = Siswa::where('nis', $request->nis)->where('password', $request->password)->first();

        if(!$siswa){
            return back()->with('error', "Nis atau Password Salah");
        }

        session([
            'id' => $siswa->id,
            'role' => "Siswa",
            'nama' => $siswa->nama_siswa
        ]);

        return redirect('/home');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        return redirect('/');
    }
}
