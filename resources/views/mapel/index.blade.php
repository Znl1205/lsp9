@extends('layout.main')
@section('content')
    <center>
        <b>
            <h1>LIST DATA MAPEL</h1>
            <a href="/mapel/create" class="button-primary">Tambah Data</a>

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
                        <th>NAMA MAPEL</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mapel as $m)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $m->nama_mapel }}</td>
                            <td>
                                <a href="/mapel/edit/{{ $m->id }}" class="button-warning">EDIT</a>
                                <a href="/mapel/destroy/{{ $m->id }}" class="button-danger" onclick="return confirm('Yakin Hapus?')">DELETE</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </b>
    </center>
@endsection
