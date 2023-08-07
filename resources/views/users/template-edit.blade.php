@extends('layout.induk')

@section('isi-kandungan-utama')

<h1 class="mt-4">
    Kemaskini Rekod {{ $staff->name }}
</h1>

<div class="row">
    <div class="col-xl-12">

        <form method="POST" action="{{ route('users.update', $staff->id) }}">
            @csrf
            @method('PATCH')

            <div class="card">
                <div class="card-body">

                        <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') ?? $staff->name }}">
                        </div>

                        <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" value="{{ old('email') ?? $staff->email }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Bahagian</label>
                            <select name="bahagian_id">

                                <option value="">-- Sila Pilih --</option>

                                @foreach ($senaraiBahagian as $bahagian)
                                <option value="{{ $bahagian->id }}" {{ $staff->bahagian_id == $bahagian->id ? ' selected="selected"' : NULL }}>
                                    {{ $bahagian->nama }}
                                </option>
                                @endforeach

                            </select>


                        </div>

                        <div class="mb-3">
                        <label class="form-label">Jawatan</label>
                        <input type="text" class="form-control" name="jawatan" value="{{ old('jawatan') ?? $staff->jawatan }}">
                        </div>

                        <div class="mb-3">
                        <label class="form-label">Telefon</label>
                        <input type="text" class="form-control" name="telefon" value="{{ old('telefon') ?? $staff->telefon }}">
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>



                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>

        </form>

    </div>
</div>
@endsection
