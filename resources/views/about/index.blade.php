@extends('layout.master')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mt-4 mb-md-0">
            <h2>About</h2>
        </div>
    </div>
    <div class="card border-0 shadow mb-5 mt-1">
        <div class="card-body">
            <div class="row align-items-center gap-3">
                <div class="col-md-3 col-lg-3 col-sm-12">
                    <img src="{{ asset('assets/img/2141764159.jpg') }}" alt="Dikhi Achmad Dani">
                </div>
                <div class="col-md-8 col-lg-8 col-sm-12">
                    <p>aplikasi ini dibuat oleh:</p>
                    <p>nama: Dikhi Achmad Dani</p>
                    <p>NIM: 2141764159</p>
                    <p>Tanggal: 28 September 2022</p>
                </div>
            </div>
        </div>

    </div>
@endsection
