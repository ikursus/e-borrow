@extends('layout.induk')

@section('isi-kandungan-utama')

<h1 class="mt-4">
    {{ $pageTitle ?? 'Detail Profile' }}
</h1>

<div class="row">
    <div class="col-xl-12">

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Profile {{ $staff->name }}
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>PERKARA</th>
                            <th>BUTIRAN</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>Nama</td>
                            <td>{{ $staff->name }}</td>
                        </tr>

                        <tr>
                            <td>Email</td>
                            <td>{{ $staff->email }}</td>
                        </tr>

                        <tr>
                            <td>Jawatan</td>
                            <td>{{ $staff->jawatan }}</td>
                        </tr>

                        <tr>
                            <td>Telefon</td>
                            <td>{{ $staff->telefon }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-xl-12">

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Senarai Permohonan {{ $staff->name }}
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tarikh Jangka Pinjam</th>
                            <th>Tarikh Jangka Pulang</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($staff->senaraiPermohonan as $permohonan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $permohonan->tarikh_jangka_pinjam }}</td>
                            <td>{{ $permohonan->tarikh_jangka_pulang }}</td>
                            <td>{{ $permohonan->status }}</td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection
