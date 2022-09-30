@extends('layout.master')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mt-4 mb-md-0">
            <h2>Arsip Surat >> Lihat</h2>
            <dl class="row mt-4">
                <dt class="col-sm-3">Nomor</dt>
                <dd class="col-sm-9">: {{ $data->nomor_surat }}</dd>

                <dt class="col-sm-3">Kategori</dt>
                <dd class="col-sm-9 text-capitalize">: {{ $data->kategori }}</dd>

                <dt class="col-sm-3">Judul</dt>
                <dd class="col-sm-9">: {{ $data->judul }}</dd>

                <dt class="col-sm-3">Waktu Unggah</dt>
                <dd class="col-sm-9">: {{ date('Y-m-d h:i', strtotime($data->created_at)) }}</dd>
            </dl>
        </div>
    </div>
    <div class="card border-0 shadow mb-5 mt-1">
        <div class="card-body">
            <embed src="{{ asset($data->file_surat) }}" width="100%" height="500" alt="pdf"
                type="application/pdf" />
            <div class="mt-4 mb-4">
                <a href="{{ route('surat.index') }}" class="btn btn-light-secondary">
                    << Kembali</a>
                        <a href="{{ asset($data->file_surat) }}" class="btn btn-warning mx-3">Unduh</a>
                        <a href="#" class="btn btn-primary">Edit/Ganti File</a>
            </div>
        </div>

    </div>
@endsection
