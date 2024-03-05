@extends('layout.main')
@section('content')
    <div class="content-menu">
        @forelse ($kelas as $k)
            <div class="menu-kelas">
                <div class="kelas-list">
                    <a href="/nilai/kelas/{{ $k->id }}">{{ $k->tingkat_kelas }} {{ $k->jurusan }} {{ $k->rombel }}</a>
                </div>
            </div>
        @empty
            <div class="menu-kelas">
                <div class="kelas-list">
                    Data Kelas Yang Anda Ajar Belum Tersedia
                </div>
            </div>
        @endforelse
    </div>
@endsection
