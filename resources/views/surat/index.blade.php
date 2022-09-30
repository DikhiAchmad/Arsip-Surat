@extends('layout.master')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mt-4 mb-md-0">
            <h2>Arsip Surat</h2>
            <p class="mb-0">berikut ini adalah surat-surat yang telah terbit dan diarsipkan. <br>
                Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>
        </div>
    </div>
    <div class="card border-0 shadow mb-4 mt-4">
        <div class="card-body">
            <form action="{{ route('surat.search') }}" method="GET" class="mb-4">
                <div class="row align-items-center justify-content-between spacing-gap">
                    <div class="col-lg-2 col-md-2 col-sm-12">
                        <span>Cari Surat:</span>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <div class="form-group has-search">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" class="form-control" placeholder="Search" name="keyword">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12 text-end">
                        <button class="btn btn-primary w-100" type="submit">Cari</button>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">Nomor Surat</th>
                            <th class="border-0">Kategori</th>
                            <th class="border-0">Judul</th>
                            <th class="border-0">Waktu Pengarsipan</th>
                            <th class="border-0">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- items --}}
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $item->nomor_surat }}</td>
                                <td class="text-capitalize">{{ $item->kategori }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ date('Y-m-d h:i', strtotime($item->created_at)) }}</td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#delete{{ $item->id }}">
                                        Hapus
                                    </button>
                                    <a href="{{ $item->file_surat }}" class="btn btn-warning btn-sm">Unduh</a>
                                    <a href="{{ route('surat.show', $item->id) }}" class="btn btn-info btn-sm">Lihat >></a>
                                </td>
                            </tr>
                            <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="delete{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                    role="document">
                                    <form action="{{ route('surat.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">
                                                    Alert
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    Apakah Anda yakin ingin menghapus arsip surat ini?
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Batal</span>
                                                </button>
                                                <button type="submit" class="btn btn-primary ml-1">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Ya!</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <td colspan="5" class="text-center">
                                tidak ada data yang tersedia!
                            </td>
                        @endforelse
                        {{-- end items --}}
                    </tbody>
                </table>
            </div>
            <a href="{{ route('surat.create') }}" class="btn btn-primary mt-4">Arsipkan
                Surat..</a>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        @if ($message = Session::get('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ $message }}',
                showConfirmButton: true,
                timer: 1500
            });
        @elseif ($message = Session::get('error'))
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ $message }}'
            });
        @endif
    </script>
@endsection
