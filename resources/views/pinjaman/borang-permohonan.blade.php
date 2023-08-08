@extends('layout.induk')

@section('isi-kandungan-utama')

<h1 class="mt-4">
    Permohonan Pinjaman Baru
</h1>

<div class="row">
    <div class="col-xl-12">

        <form method="POST" action="{{ route('pinjaman.store') }}">
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
                        <select name="pegawai_bertanggungjawab_id" class="form-control">

                            <option value="">-- Sila Pilih --</option>

                            @foreach ($senaraiPegawaiBertanggungjawab as $pegawai)
                            <option value="{{ $pegawai->id }}" {{ old('pegawai_bertanggungjawab_id') ? ' selected="selected"' : NULL }}>
                                {{ $pegawai->name }}
                            </option>
                            @endforeach

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

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Hantar Permohonan</button>
                </div>
            </div>

        </form>

    </div>
</div>
@endsection
