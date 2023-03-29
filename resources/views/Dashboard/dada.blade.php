@extends('Dashboard.dashboard')
@section('content')

<div class="breadcrumbs">
    <div class="row justify-content-center">
        <div class="col col-lg-10">
            <div class="card border-0 shadow roundedt">
                <div class="card-body">
                    <p>
                        <h4>Selamat Datang <b>{{Auth::user()->nama_petugas}}</b>, Anda Login sebagai <b>{{Auth::user()->level}}</b>.</h4>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
