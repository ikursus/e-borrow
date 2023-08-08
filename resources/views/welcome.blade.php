@extends('layout.induk')

@section('isi-kandungan-utama')

    <h1 class="mt-4">
        Sistem Pinjaman Peralatan ICT
    </h1>

    <hr>

    <ol>
        <li>Untuk membuat permohonan pinjaman peralatan ICT, sila <a href="{{ route('pinjaman.create') }}">klik di sini</a>.</li>
        <li>Untuk menyemak status permohonan pinjaman anda, sila <a href="{{ route('pinjaman.status') }}">klik di sini</a>.</li>
    </ol>

@endsection
