@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Tambah Data Mengajar</h2>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
        @endif

        @if (session('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif

        <form action="/mengajar/store" method="post">
            @csrf
            <label for="guru_id">NAMA GURU</label>
            <select name="guru_id" id="guru_id">
                <option></option>
                @foreach ($guru as $g)
                    <option value="{{ $g->id }}">{{ $g->nama_guru }}</option>
                @endforeach
            </select>

            <label for="mapel_id">MAPEL</label>
            <select name="mapel_id" id="mapel_id">
                <option></option>
                @foreach ($mapel as $m)
                    <option value="{{ $m->id }}">{{ $m->nama_mapel }}</option>
                @endforeach
            </select>

            <label for="kelas_id">KELAS</label>
            <select name="kelas_id" id="kelas_id">
                <option></option>
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}">{{ $k->tingkat_kelas }} {{ $k->jurusan }} {{ $k->rombel }}</option>
                @endforeach
            </select>

            <button type="submit" class="button-submit">SIMPAN</button>
        </form>
    </div>
@endsection
