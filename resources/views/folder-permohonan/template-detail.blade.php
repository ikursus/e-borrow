@extends('layout.induk')

@section('isi-kandungan-utama')

<h1 class="mt-4">
    {{ $pageTitle ?? 'Detail Permohonan' }}
</h1>

<div class="row">
    <div class="col-xl-12">

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Permohonan {{ $permohonan->id }}
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
                            <td>Status</td>
                            <td>{{ $permohonan->status ?? NULL }}</td>
                        </tr>

                        <tr>
                            <td>Pegawai Pemohon</td>
                            <td>{{ $permohonan->pegawai_pemohon_id ?? NULL }}</td>
                        </tr>

                        <tr>
                            <td>Pegawai BertanggungJawab</td>
                            <td>{{ $permohonan->pegawai_bertanggungjawab_id ?? NULL }}</td>
                        </tr>

                        <tr>
                            <td>Tarikh Jangka Pinjam</td>
                            <td>{{ $permohonan->tarikh_jangka_pinjam ?? NULL }}</td>
                        </tr>

                        <tr>
                            <td>Tarikh Jangka Pulang</td>
                            <td>{{ $permohonan->tarikh_jangka_pulang ?? NULL }}</td>
                        </tr>

                        <tr>
                            <td>Tujuan Permohonan</td>
                            <td>{{ $permohonan->tujuan_permohonan ?? NULL }}</td>
                        </tr>

                        <tr>
                            <td>Lokasi Tujuan</td>
                            <td>{{ $permohonan->lokasi_tujuan ?? NULL }}</td>
                        </tr>

                        <tr>
                            <td>Pegawai Pengesah</td>
                            <td>{{ $permohonan->pegawai_pengesah_id ?? NULL }}</td>
                        </tr>

                        <tr>
                            <td>Tarikh Pengesahan</td>
                            <td>{{ $permohonan->tarikh_pengesahan ?? NULL }}</td>
                        </tr>

                        <tr>
                            <td>Pegawai Pengeluar</td>
                            <td>{{ $permohonan->pegawai_pengeluar_id ?? NULL }}</td>
                        </tr>

                        <tr>
                            <td>Tarikh Pengeluaran</td>
                            <td>{{ $permohonan->tarikh_pengeluaran ?? NULL }}</td>
                        </tr>

                        <tr>
                            <td>Pegawai Pegambil</td>
                            <td>{{ $permohonan->pegawai_pengambil_id ?? NULL }}</td>
                        </tr>

                        <tr>
                            <td>Tarikh Ambil</td>
                            <td>{{ $permohonan->tarikh_ambil ?? NULL }}</td>
                        </tr>

                        <tr>
                            <td>Pegawai Pemulang</td>
                            <td>{{ $permohonan->pegawai_pemulang_id ?? NULL }}</td>
                        </tr>

                        <tr>
                            <td>Tarikh Pemulangan</td>
                            <td>{{ $permohonan->tarikh_pulangan ?? NULL }}</td>
                        </tr>

                        <tr>
                            <td>Pegawai Penerima Pulangan</td>
                            <td>{{ $permohonan->pegawai_pemulang_id ?? NULL }}</td>
                        </tr>

                        <tr>
                            <td>Tarikh Pemulangan</td>
                            <td>{{ $permohonan->tarikh_terima_pulangan ?? NULL }}</td>
                        </tr>

                        <tr>
                            <td>Catatan Pegawai Penerima</td>
                            <td>{{ $permohonan->catatan_pegawai_penerima ?? NULL }}</td>
                        </tr>

                        <tr>
                            <td>Fail Sokongan</td>
                            <td>
                                @if (!is_null($permohonan->fail_sokongan))
                                <a href="{{ asset('uploaded/' . $permohonan->fail_sokongan) }}">{{ asset('uploaded/' . $permohonan->fail_sokongan) }}</a>
                                @else
                                Tiada Fail Sokongan
                                @endif
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection
