@extends('layout.induk')

@section('isi-kandungan-utama')

<h1 class="mt-4">
    Semak Status Permohonan
</h1>

<div class="row">
    <div class="col-xl-12">

        <form method="GET" action="{{ route('pinjaman.result') }}">
            @csrf

            <div class="card">
                <div class="card-body">

                    @include('layout.alerts')

                    <div class="mb-3">
                        <label class="form-label">Nombor Ticket Permohonan</label>
                        <input type="text" class="form-control" name="ticket" value="{{ old('ticket') }}">
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Semak Permohonan</button>
                </div>
            </div>

        </form>

    </div>
</div>
@endsection
