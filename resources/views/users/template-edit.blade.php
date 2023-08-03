@extends('layout.induk')

@section('isi-kandungan-utama')
<h1 class="mt-4">
    Kemaskini Rekod {{ $user->name }}
</h1>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <form method="POST" action="{{ route('users.update', $user->id) }}">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                      <label class="form-label">Name</label>
                      <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Email</label>
                      <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Bahagian</label>
                      <input type="text" class="form-control" name="bahagian_id" value="{{ $user->bahagian_id }}">
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Jawatan</label>
                      <input type="text" class="form-control" name="jawatan" value="{{ $user->jawatan }}">
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Telefon</label>
                      <input type="text" class="form-control" name="telefon" value="{{ $user->telefon }}">
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                      </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>


            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
@endsection
