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
                        <td>{{ $staff->nama_bahagian }}</td>
                        <td>{{ $staff->email }}</td>
                        <td>{{ $staff->telefon }}</td>
                        <td>
                            <a href="{{ route('users.edit', $staff->id) }}" class="btn btn-primary">
                                Edit
                            </a>
                            <a href="{{ route('users.show', $staff->id) }}" class="btn btn-success">
                                Detail
                            </a>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $staff->id }}">
                                Delete
                            </button>

                            <!-- Modal -->
                            <form method="POST" action="{{ route('users.destroy', $staff->id) }}">

                                @csrf
                                @method('DELETE')

                                <div class="modal fade" id="modal-delete-{{ $staff->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Confirmation</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Adakah anda bersetuju untuk menghapuskan / padam data ini?

                                            <ul>
                                                <li>Nama: {{ $staff->name }}</li>
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Confirm Delete</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                            </form>


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
