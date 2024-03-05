@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Edit Data Guru</h2>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
        @endif

        <form action="/guru/update/{{ $guru->id }}" method="post">
            @csrf
            <label for="nip">NIP</label>
            <input type="text" name="nip" id="nip" value="{{ $guru->nip }}">

            <label for="nama_guru">NAMA GURU</label>
            <input type="text" name="nama_guru" id="nama_guru" value="{{ $guru->nama_guru }}">

            <label for="jk">JENIS KELAMIN</label>
            <input type="radio" name="jk" id="jk" value="L" @checked($guru->jk === 'L')> Laki - laki
            <input type="radio" name="jk" id="jk" value="P" @checked($guru->jk === 'P')> Perempuan

            <label for="alamat">ALAMAT</label>
            <textarea name="alamat" id="alamat" cols="25" rows="5">{{ $guru->alamat }}</textarea>

            <label for="password">PASSWORD</label>
            <input type="password" name="password" id="password" value="{{ $guru->password }}">

            <button type="submit" class="button-submit">SIMPAN</button>
        </form>
    </div>
@endsection
