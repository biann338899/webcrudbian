@extends('layouts/app')
@section('content')
<div class="row">
    <h2>EH KOK BUKAN ROSBLOK?</h2>
</div>

<!-- Foto berjajar dalam card -->
<div class="row mt-4">
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <img src="{{ asset('img/isal.png') }}" class="card-img-top" alt="Isal">
            <div class="card-body text-center">
                <h5 class="card-title">Isal</h5>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <img src="{{ asset('img/ripki.png') }}" class="card-img-top" alt="Ripki">
            <div class="card-body text-center">
                <h5 class="card-title">Ripki</h5>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <img src="{{ asset('img/raya.png') }}" class="card-img-top" alt="Raya">
            <div class="card-body text-center">
                <h5 class="card-title">Raya</h5>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row">
    <!-- Area Chart -->
</div>

<!-- Content Row -->
<div class="row">
    <!-- Content Column -->
</div>

@endsection
