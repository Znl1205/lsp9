<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Penilaian Siswa</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @include('partials.header')

    <div class="menu">
        <a href="/" class="active">HOME</a>
    </div>

    <div class="kiri-atas">
        <fieldset>
            <center>
                <button class="button-primary" onclick="tampilkan_login_admin()">Admin</button>
                <button class="button-primary" onclick="tampilkan_login_guru()">Guru</button>
                <button class="button-primary" onclick="tampilkan_login_siswa()">Siswa</button>
                <hr>
                Pilih Login Sesuai Posisi Anda
                <hr>
            </center>

            <div id="login_admin" class="container-login" style="display: none">
                <center>
                    <b>Login Admin</b>
                    <p>{{ session('error') }}</p>
                </center>

                <form action="/login_admin" method="post">
                    @csrf
                    <table>
                        <tr>
                            <td width="25%"><strong>Kode Admin</strong></td>
                            <td width="25%" style="text-align: right"><input type="text" name="kode_admin" id="kode_admin"></td>
                        </tr>
                        <tr>
                            <td width="25%"><strong>Password</strong></td>
                            <td width="25%" style="text-align: right"><input type="password" name="password" id="password"></td>
                        </tr>
                    </table>
                    <button type="submit" class="button-submit">Login</button>
                </form>
            </div>

            <div id="login_guru" class="container-login" style="display: none">
                <center>
                    <b>Login Guru</b>
                    <p>{{ session('error') }}</p>
                </center>

                <form action="/login_guru" method="post">
                    @csrf
                    <table>
                        <tr>
                            <td width="25%"><strong>Nip</strong></td>
                            <td width="25%" style="text-align: right"><input type="text" name="nip" id="nip"></td>
                        </tr>
                        <tr>
                            <td width="25%"><strong>Password</strong></td>
                            <td width="25%" style="text-align: right"><input type="password" name="password" id="password"></td>
                        </tr>
                    </table>
                    <button type="submit" class="button-submit">Login</button>
                </form>
            </div>

            <div id="login_siswa" class="container-login" style="display: none">
                <center>
                    <b>Login Siswa</b>
                    <p>{{ session('error') }}</p>
                </center>

                <form action="/login_siswa" method="post">
                    @csrf
                    <table>
                        <tr>
                            <td width="25%"><strong>Nis</strong></td>
                            <td width="25%" style="text-align: right"><input type="text" name="nis" id="nis"></td>
                        </tr>
                        <tr>
                            <td width="25%"><strong>Password</strong></td>
                            <td width="25%" style="text-align: right"><input type="password" name="password" id="password"></td>
                        </tr>
                    </table>
                    <button type="submit" class="button-submit">Login</button>
                </form>
            </div>
        </fieldset>
    </div>

    <div class="kanan">
        <center>
            <h1>
                SELAMAT DATANG
                <br>
                DI WEBSITE PENILAIAN SISWA SMKN 1 CIBINONG
            </h1>
        </center>
    </div>

    <div class="kiri-bawah">
        <center>
            <b>
                <p class="mar">Gallery</p>
                <div class="gallery">
                    <img src="{{ asset('img/g2.jpg') }}" alt="g2">
                    <div class="deskripsi">SMK BISA {{ date('Y') }}</div>
                </div>
            </b>
        </center>
    </div>

    @include('partials.footer')
</body>
<script src="{{ asset('js/script.js') }}"></script>

</html>
