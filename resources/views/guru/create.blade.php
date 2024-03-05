@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Tambah Data Guru</h2>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
        @endif

        <form action="/guru/store" method="post">
            @csrf
            <label for="nip">NIP</label>
            <input type="text" name="nip" id="nip">

            <label for="nama_guru">NAMA GURU</label>
            <input type="text" name="nama_guru" id="nama_guru">

            <label for="jk">JENIS KELAMIN</label>
            <input type="radio" name="jk" id="jk" value="L"> Laki - laki
            <input type="radio" name="jk" id="jk" value="P"> Perempuan

            <label for="alamat">ALAMAT</label>
            <textarea name="alamat" id="alamat" cols="25" rows="5"></textarea>

            <label for="password">PASSWORD</label>
            <input type="password" name="password" id="password">

            <button type="submit" class="button-submit">SIMPAN</button>
        </form>
    </div>
@endsection