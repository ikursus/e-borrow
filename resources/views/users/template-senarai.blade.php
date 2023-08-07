@extends('layout.induk')

@section('isi-kandungan-utama')

    <h1 class="mt-4">
        {{ $pageTitle ?? 'Senarai Pengguna' }}
    </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Senarai Pengguna</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Senarai Pengguna
        </div>
        <div class="card-body">

            @include('layout.alerts')

            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Bahagian</th>
                        <th>Email</th>
                        <th>Telefon</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Bahagian</th>
                        <th>Email</th>
                        <th>Telefon</th>
                        <th>Tindakan</th>
                    </tr>
                </tfoot>
                <tbody>


                @foreach ( $senaraiStaff AS $staff )

                    <tr>
                        <td>{{ $staff->name }}</td>
                        <td>{{ $staff->jawatan }}</td>
                        <td>{{ $staff->bahagian_id }}</td>
                        <td>{{ $staff->email }}</td>
                        <td>{{ $staff->telefon }}</td>
                        <td>
                            <a href="{{ route('users.edit', $staff->id) }}" class="btn btn-primary">
                                Edit
                            </a>
                            <a href="{{ route('users.show', $staff->id) }}" class="btn btn-success">
                                Detail
                            </a>
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>

            {{ $senaraiStaff->links() }}
            {{ $senaraiStaff->render() }}
        </div>
    </div>

@endsection

@section('sidebar')

@endsection

@push('javascript-custom')
<!-- Custom Javascript Dari Push -->
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="/themes/sbadmin/js/datatables-simple-demo.js"></script>
@endpush
