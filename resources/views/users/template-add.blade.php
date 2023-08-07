@extends('layout.induk')

@section('isi-kandungan-utama')

<h1 class="mt-4">
    Tambah Pengguna Baru
</h1>

<div class="row">
    <div class="col-xl-12">

        <form method="POST" action="{{ route('users.store') }}">
            @csrf

            <div class="card">
                <div class="card-body">

                    @include('layout.alerts')

                    @include('users.borang')

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>

        </form>

    </div>
</div>
@endsection
