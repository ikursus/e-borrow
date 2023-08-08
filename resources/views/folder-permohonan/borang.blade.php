<div class="mb-3">
    <label class="form-label">Pegawai Pemohon</label>
    <input type="text" class="form-control" name="pegawai_pemohon" value="{{ auth()->user()->name }}" disabled>
</div>

<div class="mb-3">
    <label class="form-label">Pegawai Bertanggungjawab</label>
    <select name="pegawai_bertanggungjawab_id" class="form-control">

        <option value="">-- Sila Pilih --</option>

        @foreach ($senaraiPegawaiBertanggungjawab as $pegawai)
        <option value="{{ $pegawai->id }}" {{ old('pegawai_bertanggungjawab_id') ?? (isset($permohonan) ? $permohonan->pegawai_bertanggungjawab_id : NULL) == $pegawai->id ? ' selected="selected"' : NULL }}>
            {{ $pegawai->name }}
        </option>
        @endforeach

    </select>

</div>

<div class="mb-3">
    <label class="form-label">Tarikh Jangka Pinjam</label>
    <input type="date" class="form-control" name="tarikh_jangka_pinjam" value="{{ old('tarikh_jangka_pinjam') ?? (isset($permohonan) ? $permohonan->tarikh_jangka_pinjam : NULL) }}">
</div>

<div class="mb-3">
    <label class="form-label">Tarikh Jangka Pulang</label>
    <input type="date" class="form-control" name="tarikh_jangka_pulang" value="{{ old('tarikh_jangka_pulang') ?? (isset($permohonan) ? $permohonan->tarikh_jangka_pulang : NULL) }}">
</div>

<div class="mb-3">
    <label class="form-label">Tujuan Permohonan</label>
    <input type="text" class="form-control" name="tujuan_permohonan" value="{{ old('tujuan_permohonan') ?? (isset($permohonan) ? $permohonan->tujuan_permohonan : NULL) }}">
</div>

<div class="mb-3">
    <label class="form-label">Lokasi Tujuan</label>
    <input type="text" class="form-control" name="lokasi_tujuan" value="{{ old('lokasi_tujuan') ?? (isset($permohonan) ? $permohonan->lokasi_tujuan : NULL) }}">
</div>

<div class="mb-3">
    <label class="form-label">Status</label>
    <select name="status" class="form-control">

        <option value="">-- Sila Pilih --</option>

        @foreach (\App\Models\Permohonan::listStatus() as $key => $value)
        <option value="{{ $key }}" {{ old('status') ?? (isset($permohonan) ? $permohonan->status : NULL) == $key ? ' selected="selected"' : NULL }}>
            {{ $value }}
        </option>
        @endforeach

    </select>

</div>
