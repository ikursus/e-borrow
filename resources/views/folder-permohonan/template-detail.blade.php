@extends('layout.induk')

@section('css-vendor')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endsection

@push('javascript-custom')
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#select2-pambil').select2({
            theme: 'bootstrap-5',
            minimumInputLength: 3, // Minimum huruf keyword carian data
            ajax: {
                url: '{{ route('carian.pbjwb') }}',
                dataType: 'json',
                processResults: function(data) {
                    return {
                        results: $.map(data, function(user) {
                            return {
                                'id': user.id,
                                'text': user.name
                            }
                        })
                    }
                }
            }
        });
    });
</script>
@endpush

@section('isi-kandungan-utama')

<h1 class="mt-4">
    {{ $pageTitle ?? 'Detail Permohonan' }}
</h1>



<form method="POST" action="{{ route('permohonan.update', $permohonan->id) }}">
    @csrf
    @method('PATCH')

<div class="row">
    <div class="col-xl-12">

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Permohonan {{ $permohonan->id }}
            </div>
            <div class="card-body">

                @include('layout.alerts')

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
                            <td>{{ $permohonan->pegawaiPemohon->name ?? NULL }}</td>
                        </tr>

                        <tr>
                            <td>Pegawai BertanggungJawab</td>
                            <td>{{ $permohonan->pegawaiBertanggungjawab->name ?? NULL }}</td>
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
                            <td>{{ $permohonan->pegawaiPengesah->name ?? NULL }}</td>
                        </tr>

                        <tr>
                            <td>Tarikh Pengesahan</td>
                            <td>{{ $permohonan->tarikh_pengesahan ?? NULL }}</td>
                        </tr>

                        <tr>
                            <td>Pegawai Pengeluar</td>
                            <td>{{ $permohonan->pegawaiPengeluar->name ?? NULL }}</td>
                        </tr>

                        <tr>
                            <td>Tarikh Pengeluaran</td>
                            <td>{{ $permohonan->tarikh_pengeluaran ?? NULL }}</td>
                        </tr>

                        <tr>
                            <td>Pegawai Pegambil</td>
                            <td>{{ $permohonan->pegawaiPengambil->name ?? NULL }}</td>
                        </tr>

                        <tr>
                            <td>Tarikh Ambil</td>
                            <td>{{ $permohonan->tarikh_ambil ?? NULL }}</td>
                        </tr>

                        <tr>
                            <td>Pegawai Pemulang</td>
                            <td>{{ $permohonan->pegawaiPemulang->name ?? NULL }}</td>
                        </tr>

                        <tr>
                            <td>Tarikh Pemulangan</td>
                            <td>{{ $permohonan->tarikh_pulangan ?? NULL }}</td>
                        </tr>

                        <tr>
                            <td>Pegawai Penerima Pulangan</td>
                            <td>{{ $permohonan->pegawaiPenerimaPemulangan->name ?? NULL }}</td>
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
                                <a href="{{ asset('uploaded/' . $permohonan->fail_sokongan) }}">
                                    {{ asset('uploaded/' . $permohonan->fail_sokongan) }}
                                </a>
                                @else
                                Tiada Fail Sokongan
                                @endif
                            </td>
                        </tr>

                        @if ($permohonan->status == \App\Models\Permohonan::STATUS_SEDIA_UNTUK_DIAMBIL)
                        <tr>
                            <td>
                                Pegawai Pengambil
                            </td>
                            <td>
                                <div class="mb-3">
                                    <select id="select2-pambil" name="pengawai_pengambil_id" class="form-control">

                                        <option value="">-- Sila Pilih --</option>

                                        {{-- @foreach ($senaraiPegawaiBertanggungjawab as $pegawai)
                                        <option value="{{ $pegawai->id }}" {{ old('pegawai_bertanggungjawab_id') ? ' selected="selected"' : NULL }}>
                                            {{ $pegawai->name }}
                                        </option>
                                        @endforeach --}}

                                    </select>

                                </div>
                            </td>
                        </tr>
                        @endif

                        @if ($permohonan->status == \App\Models\Permohonan::STATUS_DALAM_PINJAMAN)
                        <tr>
                            <td>
                                Pegawai Pemulang
                            </td>
                            <td>
                                <div class="mb-3">
                                    <select id="select2-pambil" name="pengawai_pemulang_id" class="form-control">

                                        <option value="">-- Sila Pilih --</option>

                                        {{-- @foreach ($senaraiPegawaiBertanggungjawab as $pegawai)
                                        <option value="{{ $pegawai->id }}" {{ old('pegawai_bertanggungjawab_id') ? ' selected="selected"' : NULL }}>
                                            {{ $pegawai->name }}
                                        </option>
                                        @endforeach --}}

                                    </select>

                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Catatan Pegawai Penerima Pemulangan
                            </td>
                            <td>
                                <div class="mb-3">
                                    <textarea name="catatan_pegawai_penerima" class="form-control"></textarea>
                                </div>
                            </td>
                        </tr>
                        @endif

                        <tr>
                            <td>
                                Tindakan
                            </td>
                            <td>
                                <a href="{{ route('permohonan.print', $permohonan->id) }}" class="btn btn-success me-2">Print</a>
                                <a href="{{ route('permohonan.print', $permohonan->id) }}?jenis=download" class="btn btn-primary">Download PDF</a>


                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Kemaskini Status
                                        </button>
                                        <ul class="dropdown-menu">
                                        @if ($permohonan->status == \App\Models\Permohonan::STATUS_BARU)
                                        <li><input type="submit" class="dropdown-item" name="status" value="{{ \App\Models\Permohonan::STATUS_DALAM_PROSES }}"></li>
                                        @elseif ($permohonan->status == \App\Models\Permohonan::STATUS_DALAM_PROSES)
                                        <li><input type="submit" class="dropdown-item" name="status" value="{{ \App\Models\Permohonan::STATUS_LULUS }}"></li>
                                        <li><input type="submit" class="dropdown-item" name="status" value="{{ \App\Models\Permohonan::STATUS_TIDAK_LULUS }}"></li>
                                        @elseif ($permohonan->status == \App\Models\Permohonan::STATUS_LULUS)
                                        <li><input type="submit" class="dropdown-item" name="status" value="{{ \App\Models\Permohonan::STATUS_SEDIA_UNTUK_DIAMBIL }}"></li>
                                        @elseif ($permohonan->status == \App\Models\Permohonan::STATUS_SEDIA_UNTUK_DIAMBIL)
                                        <li><input type="submit" class="dropdown-item" name="status" value="{{ \App\Models\Permohonan::STATUS_DALAM_PINJAMAN }}"></li>
                                        @elseif ($permohonan->status == \App\Models\Permohonan::STATUS_DALAM_PINJAMAN)
                                        <li><input type="submit" class="dropdown-item" name="status" value="{{ \App\Models\Permohonan::STATUS_DIPULANGKAN }}"></li>
                                        @endif
                                        <li><input type="submit" class="dropdown-item" name="status" value="{{ \App\Models\Permohonan::STATUS_BATAL }}"></li>
                                        </ul>
                                    </div>

                            </td>

                        </tr>


                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

</form>

@endsection
