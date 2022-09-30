@extends('layout.master')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mt-4 mb-md-0">
            <h2>Arsip Surat >> Unggah</h2>
            <p class="text-subtitle text-muted">
                Unggah surat yang telah terbit pada form ini untuk diarsipkan. <br>
                Catatan:
            </p>
            <ul>
                <li>
                    Gunakan file berformat PDF
                </li>
            </ul>
        </div>
    </div>
    <div class="card border-0 shadow mb-5 mt-1">
        <div class="card-body">
            <form class="form form-horizontal" action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="row gap-4 mt-4">
                        <div class="col-md-12 row align-items-center">
                            <div class="col-3">
                                <label>Nomor Surat</label>
                            </div>
                            <div class="col-9">
                                <div class=" form-group">
                                    <input type="text" id="nomor_surat" class="form-control" name="nomor_surat"
                                        placeholder="Misal: 2022/PD3/TU/022">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 row align-items-center">
                            <div class="col-3">
                                <label>Kategori</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <select class="form-select" id="kategori" name="kategori">
                                        <option value="undangan">Undangan</option>
                                        <option value="pengumuman">Pengumuman</option>
                                        <option value="nota dinas">Nota Dinas</option>
                                        <option value="pemberitahuan">Pemberitahuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 row align-items-center">
                            <div class="col-3">
                                <label>Judul</label>
                            </div>
                            <div class="col-9">
                                <input type="text" id="judul" class="form-control" name="judul"
                                    placeholder="Judul">
                            </div>
                        </div>
                        <div class="col-md-12 row align-items-center">
                            <div class="col-3">
                                <label>File Surat (PDF)</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="file" id="file_surat" name="file_surat">
                            </div>
                        </div>
                        <div class="col-sm-12 mt-3">
                            <a href="{{ route('surat.index') }}" class="btn btn-light-secondary me-1 mb-1">
                                << Kembali</a>
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
