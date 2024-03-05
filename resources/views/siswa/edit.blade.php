@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Edit Data Siswa</h2>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
        @endif

        <form action="/siswa/update/{{ $siswa->id }}" method="post">
            @csrf
            <label for="nis">NIs</label>
            <input type="text" name="nis" id="nis" value="{{ $siswa->nis }}">

            <label for="nama_siswa">NAMA SISWA</label>
            <input type="text" name="nama_siswa" id="nama_siswa" value="{{ $siswa->nama_siswa }}">

            <label for="jk">JENIS KELAMIN</label>
            <input type="radio" name="jk" id="jk" value="L" @checked($siswa->jk === 'L')> Laki - laki
            <input type="radio" name="jk" id="jk" value="P" @checked($siswa->jk === 'P')> Perempuan

            <label for="alamat">ALAMAT</label>
            <textarea name="alamat" id="alamat" cols="25" rows="5">{{ $siswa->alamat }}</textarea>

            <label for="kelas_id">KELAS</label>
            <select name="kelas_id" id="kelas_id">
                <option></option>
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}" @selected($siswa->kelas_id === $k->id)>{{ $k->tingkat_kelas }} {{ $k->jurusan }} {{ $k->rombel }}</option>
                @endforeach
            </select>

            <label for="password">PASSWORD</label>
            <input type="password" name="password" id="password" value="{{ $siswa->password }}">

            <button type="submit" class="button-submit">SIMPAN</button>
        </form>
    </div>
@endsection
