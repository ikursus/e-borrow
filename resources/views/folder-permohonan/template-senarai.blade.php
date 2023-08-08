@extends('layout.induk')

@section('isi-kandungan-utama')

    <h1 class="mt-4">
        {{ $pageTitle ?? 'Senarai Permohonan' }}
    </h1>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Senarai Permohonan
        </div>
        <div class="card-body">

            @include('layout.alerts')

            <table class="table table-bordered">
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

                @forelse ( $senaraiPermohonan AS $permohonan )

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

                @empty

                    <tr>
                        <td colspan="6">
                            <div class="alert alert-info">
                                Tiada Rekod
                            </div>
                        </td>
                    </tr>

                @endforelse

                </tbody>
            </table>

        </div>
    </div>

@endsection
