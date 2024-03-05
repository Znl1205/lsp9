@extends('layout.main')
@section('content')
    <center>
        <b>
            <h1>
                LIST DATA NILAI
                @if (session('role') === "Guru")
                    {{ $kelas->tingkat_kelas }} {{ $kelas->jurusan }} {{ $kelas->rombel }}
                @else
                    {{ session('nama') }}
                @endif
            </h1>
            @if (session('role') === 'Guru')
                <a href="/nilai/create/{{ $kelas->id }}" class="button-primary">Tambah Data</a>
            @endif

            @if (session('success'))
                <div class="alert alert-success"><span class="closebtn" id="closeBtn">&times;</span>{{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger"><span class="closebtn" id="closeBtn">&times;</span>{{ session('error') }}
                </div>
            @endif

            <table class="table-data">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA GURU</th>
                        <th>NAMA SISWA</th>
                        <th>MAPEL</th>
                        <th>UH</th>
                        <th>UTS</th>
                        <th>UAS</th>
                        <th>NA</th>
                        @if (session('role') === 'Guru')
                            <th>ACTION</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nilai as $n)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $n->mengajar->guru->nama_guru }}</td>
                            <td>{{ $n->mengajar->mapel->nama_mapel }}</td>
                            <td>{{ $n->siswa->nama_siswa }}
                            <td>{{ $n->uh }}
                            <td>{{ $n->uts }}
                            <td>{{ $n->uas }}
                            <td>{{ $n->na }}
                            </td>
                            @if (session('role') === 'Guru')
                                <td>
                                    <a href="/nilai/edit/{{ $kelas->id }}/{{ $n->id }}" class="button-warning">EDIT</a>
                                    <a href="/nilai/destroy/{{ $n->id }}" class="button-danger" onclick="return confirm('Yakin Hapus?')">DELETE</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </b>
    </center>
@endsection
