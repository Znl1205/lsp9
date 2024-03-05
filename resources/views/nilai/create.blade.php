@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Tambah Data Nilai</h2>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
        @endif

        @if (session('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif

        <form action="/nilai/store/{{ $kelas->id }}" method="post">
            @csrf
            <label for="mengajar_id">NAMA GURU - MAPEL</label>
            <select name="mengajar_id" id="mengajar_id">
                <option></option>
                @foreach ($mengajar as $meng)
                    <option value="{{ $meng->id }}">{{ $meng->guru->nama_guru }} - {{ $meng->mapel->nama_mapel }}</option>
                @endforeach
            </select>

            <label for="siswa_id">NAMA SISWA</label>
            <select name="siswa_id" id="siswa_id">
                <option></option>
                @foreach ($siswa as $s)
                    <option value="{{ $s->id }}">{{ $s->nama_siswa }}</option>
                @endforeach
            </select>

            <label for="uh">UH</label>
            <input type="number" name="uh" id="uh" max="100" min="0">

            <label for="uts">UTS</label>
            <input type="number" name="uts" id="uts" max="100" min="0">

            <label for="uas">UAS</label>
            <input type="number" name="uas" id="uas" max="100" min="0">

            <button type="submit" class="button-submit">SIMPAN</button>
        </form>
    </div>
@endsection
