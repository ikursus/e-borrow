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

                    @include('users.borang')

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>

        </form>

    </div>
</div>
@endsection
