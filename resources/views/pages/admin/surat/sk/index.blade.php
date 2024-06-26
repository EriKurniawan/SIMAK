@extends('pages.admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @if (session('message'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <span class="text-uppercase">{{ session('message') }}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                            <li class="breadcrumb-item active">Surat Keluar</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        @if (session('status'))
            <div id="statusMessage" class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div id="errorMessage" class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <script>
            // Hilangkan pesan setelah 5 detik
            setTimeout(function() {
                var statusMessage = document.getElementById('statusMessage');
                if (statusMessage) {
                    statusMessage.remove();
                }

                var errorMessage = document.getElementById('errorMessage');
                if (errorMessage) {
                    errorMessage.remove();
                }
            }, 5000); // 5000 milidetik = 5 detik
        </script>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <script>
            // Hilangkan pesan setelah 5 detik
            setTimeout(function() {
                var statusMessage = document.getElementById('statusMessage');
                if (statusMessage) {
                    statusMessage.remove();
                }

                var errorMessage = document.getElementById('errorMessage');
                if (errorMessage) {
                    errorMessage.remove();
                }
            }, 5000); // 5000 milidetik = 5 detik
        </script>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12 col-sm-6 col-12 mt-3 mb-3">
                    <div class="info-box">
                        <div class="info-box-content">
                            @if (isset($totalsk))
                                <span class="info-box-text">Jumlah Surat Keluar:</span>
                                <span class="info-box-number">{{ $totalsk }}</span>
                            @endif
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row mb-3">
                                    <div class="col-md-7">
                                        <form action="/surat/sk/search" method="GET">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="dari_tanggal">Dari Tanggal</label>
                                                    <input type="date" class="form-control" name="dari_tanggal" id="dari_tanggal">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="sampai_tanggal">Sampai Tanggal</label>
                                                    <input type="date" class="form-control" name="sampai_tanggal" id="sampai_tanggal">
                                                </div>
                                                <div class="col-md-3 align-self-end">
                                                    <button type="submit" class="btn btn-primary mr-2">Cari</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-5">
                                        <div style="text-align: right">
                                            <a class="btn btn-primary" href="/surat/sk/create" role="button">Tambah Data</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="style-tr">
                                            <th>No</th>
                                            <th>Tujuan Surat</th>
                                            <th>No Surat</th>
                                            <th>Tanggal Surat</th>
                                            <th>Perihal</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                            $datas_sorted = $datas->sortBy(function ($data) {
                                                return [$data->tanggal_surat, $data->nomor_surat];
                                            });
                                        @endphp

                                        @foreach ($datas_sorted as $data)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $data->tujuan }}</td>
                                                <td>{{ $data->nomor_surat }}</td>
                                                <td>{{ $data->tanggal_surat }}</td>
                                                <td>{{ $data->perihal }}</td>
                                                <td>{{ $data->keterangan }}</td>
                                                <td class="project-actions text-right">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">Aksi</button>
                                                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu" role="menu">
                                                            @if (auth()->user()->level == 'admin' || auth()->user()->level == 'operator' || auth()->user()->level == 'staf' || auth()->user()->level == 'pimpinan')
                                                                <a class="dropdown-item" href="/surat/sk/show?id={{ $data->id }}">Detail</a>
                                                            @endif
                                                            @if (auth()->user()->level == 'admin' || auth()->user()->level == 'operator' || auth()->user()->level == 'staf' || auth()->user()->level == 'pimpinan')
                                                                <a class="dropdown-item" href="/surat/sk/edit?id={{ $data->id }}">Edit</a>
                                                                <a class="dropdown-item" href="/surat/sk/upload?id={{ $data->id }}">Upload Surat</a>
                                                            @endif
                                                            @if (auth()->user()->level == 'admin' || auth()->user()->level == 'operator' || auth()->user()->level == 'staf')
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-delete-{{ $data->id }}">Hapus</a>
                                                            @endif
                                                        </div>
                                                        <div class="modal fade" id="modal-delete-{{ $data->id }}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Hapus Data</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Apakah Anda yakin ingin menghapus?</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <form action="/surat/sk/destroy?id={{ $data->id }}" method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="btn btn-primary">Ya</button>
                                                                        </form>
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->

        <!-- Modal Hapus -->

    </div>
    <!-- /.content-wrapper -->
@endsection
