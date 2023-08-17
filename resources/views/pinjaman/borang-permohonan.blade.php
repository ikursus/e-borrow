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
        $('#select2-pbjwb').select2({
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
    Permohonan Pinjaman Baru
</h1>

<div class="row">
    <div class="col-xl-12">

        <form method="POST" action="{{ route('pinjaman.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="card">
                <div class="card-body">

                    @include('layout.alerts')

                    <div class="mb-3">
                        <label class="form-label">Email Pegawai Pemohon</label>
                        <input type="email" class="form-control" name="pegawai_pemohon_email" value="{{ old('pegawai_pemohon_email') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pegawai Bertanggungjawab</label>
                        <select id="select2-pbjwb" name="pegawai_bertanggungjawab_id" class="form-control">

                            <option value="">-- Sila Pilih --</option>

                            {{-- @foreach ($senaraiPegawaiBertanggungjawab as $pegawai)
                            <option value="{{ $pegawai->id }}" {{ old('pegawai_bertanggungjawab_id') ? ' selected="selected"' : NULL }}>
                                {{ $pegawai->name }}
                            </option>
                            @endforeach --}}

                        </select>

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tarikh Jangka Pinjam</label>
                        <input type="date" class="form-control" name="tarikh_jangka_pinjam" value="{{ old('tarikh_jangka_pinjam') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tarikh Jangka Pulang</label>
                        <input type="date" class="form-control" name="tarikh_jangka_pulang" value="{{ old('tarikh_jangka_pulang') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tujuan Permohonan</label>
                        <input type="text" class="form-control" name="tujuan_permohonan" value="{{ old('tujuan_permohonan') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Lokasi Tujuan</label>
                        <input type="text" class="form-control" name="lokasi_tujuan" value="{{ old('lokasi_tujuan') }}">
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload Dokumen Sokongan</label>
                        <input class="form-control" type="file" id="formFile" name="fail_sokongan">
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Hantar Permohonan</button>
                </div>
            </div>

        </form>

    </div>
</div>

@endsection
