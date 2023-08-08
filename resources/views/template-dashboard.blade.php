@extends('layout.induk')

@section('isi-kandungan-utama')

    <h1 class="mt-4">
        Selamat Datang {{ auth()->user()->name }}
    </h1>

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Permohonan Baru</div>
                <div class="card-footer d-flex align-items-center justify-content-center">
                    <h4>{{ $permohonanBaru ?? '0' }}</h4>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Permohonan Dalam Proses</div>
                <div class="card-footer d-flex align-items-center justify-content-center">
                    <h4>{{ $permohonanDalamProses ?? '0' }}</h4>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Permohonan Dalam Pinjaman</div>
                <div class="card-footer d-flex align-items-center justify-content-center">
                    <h4>{{ $permohonanDalamPinjaman ?? '0' }}</h4>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Permohonan Sedia Diambil</div>
                <div class="card-footer d-flex align-items-center justify-content-center">
                    <h4>{{ $permohonanSediaDiambil ?? '0' }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Permohonan Terkini
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Pemohon</th>
                        <th>Pegawai Bertanggungjawab</th>
                        <th>Tarikh Jangka Pinjam</th>
                        <th>Tujuan</th>
                        <th>Status</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>


                @foreach ( $senaraiPermohonan AS $permohonan )

                    <tr>
                        <td>{{ $permohonan->pegawaiPemohon->name }}</td>
                        <td>{{ $permohonan->pegawaiBertanggungjawab->name }}</td>
                        <td>{{ $permohonan->tarikh_jangka_pinjam }}</td>
                        <td>{{ $permohonan->tujuan_permohonan }}</td>
                        <td>{{ $permohonan->status }}</td>
                        <td>
                            <a href="{{ route('permohonan.edit', $permohonan->id) }}" class="btn btn-primary">
                                Edit
                            </a>
                            <a href="{{ route('permohonan.show', $permohonan->id) }}" class="btn btn-success">
                                Detail
                            </a>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $permohonan->id }}">
                                Delete
                            </button>

                            <!-- Modal -->
                            <form method="POST" action="{{ route('permohonan.destroy', $permohonan->id) }}">

                                @csrf
                                @method('DELETE')

                                <div class="modal fade" id="modal-delete-{{ $permohonan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Confirmation</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Adakah anda bersetuju untuk menghapuskan / padam data ini?
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
        </div>
    </div>

@endsection

@push('javascript-custom')
<!-- Custom Javascript Dari Push -->
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="/themes/sbadmin/js/datatables-simple-demo.js"></script>
@endpush
