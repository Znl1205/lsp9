@extends('layout.main')
@section('content')
    <center>
        <b>
            <h1>LIST DATA KELAS</h1>
            <a href="/kelas/create" class="button-primary">Tambah Data</a>

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
                        <th>TINGKAT KELAS</th>
                        <th>JURUSAN</th>
                        <th>ROMBEL</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelas as $k)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $k->tingkat_kelas }}</td>
                            <td>{{ $k->jurusan }}</td>
                            <td>{{ $k->rombel }}</td>
                            <td>
                                <a href="/kelas/edit/{{ $k->id }}" class="button-warning">EDIT</a>
                                <a href="/kelas/destroy/{{ $k->id }}" class="button-danger" onclick="return confirm('Yakin Hapus?')">DELETE</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </b>
    </center>
@endsection