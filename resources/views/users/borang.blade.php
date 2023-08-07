<div class="mb-3">
<label class="form-label">Name</label>
<input type="text" class="form-control" name="name" value="{{ old('name') }}">
</div>

<div class="mb-3">
<label class="form-label">Email</label>
<input type="text" class="form-control" name="email" value="{{ old('email') }}">
</div>

<div class="mb-3">
    <label class="form-label">Bahagian</label>
    <select name="bahagian_id" class="form-control">

        <option value="">-- Sila Pilih --</option>

        @foreach ($senaraiBahagian as $bahagian)
        <option value="{{ $bahagian->id }}" {{ old('bahagian_id') == $bahagian->id ? ' selected="selected"' : NULL }}>
            {{ $bahagian->nama }}
        </option>
        @endforeach

    </select>

</div>

<div class="mb-3">
<label class="form-label">Jawatan</label>
<input type="text" class="form-control" name="jawatan" value="{{ old('jawatan') }}">
</div>

<div class="mb-3">
<label class="form-label">Telefon</label>
<input type="text" class="form-control" name="telefon" value="{{ old('telefon') }}">
</div>


<div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
</div>
