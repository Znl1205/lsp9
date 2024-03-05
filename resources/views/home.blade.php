@extends('layout.main')
@section('content')
    <center>
        <h1>
            Selamat Datang {{ session('role') }}, {{ session('nama') }}
        </h1>
    </center>
@endsection
