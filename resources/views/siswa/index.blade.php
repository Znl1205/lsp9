@extends('layout.main')
@section('content')
    <center>
        <b>
            <h1>LIST DATA SISWA</h1>
            <a href="/siswa/create" class="button-primary">Tambah Data</a>

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
                        <th>NIS</th>
                        <th>NAMA SISWA</th>
                        <th>JENIS KELAMIN</th>
                        <th>ALAMAT</th>
                        <th>KELAS</th>
                        <th>PASSWORD</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $g)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $g->nis }}</td>
                            <td>{{ $g->nama_siswa }}</td>
                            <td>{{ $g->jk === 'L' ? 'Laki - laki' : 'Perempuan' }}</td>
                            <td>{{ $g->kelas->tingkat_kelas }} {{ $g->kelas->jurusan }} {{ $g->kelas->rombel }}</td>
                            <td>{{ $g->alamat }}</td>
                            <td>{{ $g->password }}</td>
                            <td>
                                <a href="/siswa/edit/{{ $g->id }}" class="button-warning">EDIT</a>
                                <a href="/siswa/destroy/{{ $g->id }}" class="button-danger" onclick="return confirm('Yakin Hapus?')">DELETE</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </b>
    </center>
@endsection
