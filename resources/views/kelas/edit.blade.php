@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Edit Data Kelas</h2>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
        @endif

        @if (session('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif

        <form action="/kelas/update/{{ $kelas->id }}" method="post">
            @csrf
            <label for="tingkat_kelas">TINGKAT KELAS</label>
            <select name="tingkat_kelas" id="tingkat_kelas">
                <option></option>
                @foreach ($tingkat_kelas as $tk)
                    <option value="{{ $tk }}" @selected($kelas->tingkat_kelas === $tk)>{{ $tk }}</option>
                @endforeach
            </select>

            <label for="jurusan">JURUSAN</label>
            <select name="jurusan" id="jurusan">
                <option></option>
                @foreach ($jurusan as $j)
                    <option value="{{ $j }}" @selected($kelas->jurusan === $j)>{{ $j }}</option>
                @endforeach
            </select>

            <label for="rombel">ROMBEL</label>
            <input type="number" name="rombel" id="rombel" max="4" min="1" value="{{ $kelas->rombel }}">

            <button type="submit" class="button-submit">SIMPAN</button>
        </form>
    </div>
@endsection
