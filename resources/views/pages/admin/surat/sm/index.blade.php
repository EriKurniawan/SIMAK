@extends('pages.admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                            <li class="breadcrumb-item active">Surat Masuk</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        @if (session('status') || session('error') || session('success'))
            <div class="alert alert-{{ session('status') ? 'success' : (session('error') ? 'danger' : 'success') }}" role="alert">
                {{ session('status') ?? (session('error') ?? session('success')) }}
            </div>
            <!-- Remove message after 5 seconds -->
            <script>
                setTimeout(function() {
                    var statusMessage = document.querySelector('.alert');
                    if (statusMessage) {
                        statusMessage.remove();
                    }
                }, 5000);
            </script>
        @endif

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-12 mt-3 mb-3">
                    <div class="info-box">
                        <div class="info-box-content">
                            @if (isset($totalsm))
                                <span class="info-box-text">Jumlah Surat Masuk:</span>
                                <span class="info-box-number">{{ $totalsm }}</span>
                            @endif
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-4 col-sm-6 col-12 mt-3 mb-3">
                    <div class="info-box">
                        <div class="info-box-content">
                            @if (isset($jumlahTerdisposisi))
                                <span class="info-box-text">Surat Terdisposisi:</span>
                                <span class="info-box-number">{{ $jumlahTerdisposisi }}</span>
                            @endif
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-4 col-sm-6 col-12 mt-3 mb-3">
                    <div class="info-box">
                        <div class="info-box-content">
                            @if (isset($jumlahBelumTerdisposisi))
                                <span class="info-box-text">Surat Belum Terdisposisi</span>
                                <span class="info-box-number">{{ $jumlahBelumTerdisposisi }}</span>
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
                                        <form action="/surat/sm/search" method="GET">
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
                                            @if (auth()->user()->level == 'admin' || auth()->user()->level == 'operator')
                                                <a class="btn btn-primary" href="/surat/sm/create" role="button">Tambah Data</a>
                                            @endif
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
                                            <th>Asal Surat</th>
                                            <th>No Surat</th>
                                            <th>Tanggal Surat</th>
                                            <th>Tanggal Diterima</th>
                                            <th>Perihal</th>
                                            <th></th>
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
                                                <td>{{ $data->asal_surat }}</td>
                                                <td>{{ $data->nomor_surat }}</td>
                                                <td>{{ $data->tanggal_surat }}</td>
                                                <td>{{ $data->tanggal_diterima }}</td>
                                                <td>{{ $data->perihal }}</td>
                                                <td class="project-actions text-right">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">Aksi</button>
                                                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu" role="menu">
                                                            @if (auth()->user()->level == 'admin' || auth()->user()->level == 'pimpinan' || auth()->user()->level == 'operator')
                                                                <a class="dropdown-item" href="/surat/disposisi/create?id={{ $data->id }}">Disposisikan</a>
                                                            @endif
                                                            @if (auth()->user()->level == 'admin' || auth()->user()->level == 'operator' || auth()->user()->level == 'staf')
                                                                <a class="dropdown-item" href="/surat/sm/show?id={{ $data->id }}">Detail</a>
                                                            @endif
                                                            @if (auth()->user()->level == 'admin' || auth()->user()->level == 'operator' || auth()->user()->level == 'staf' || auth()->user()->level == 'pimpinan')
                                                                <a class="dropdown-item" href="/surat/sm/edit?id={{ $data->id }}">Edit</a>
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
                                                                        <form action="/surat/sm/destroy?id={{ $data->id }}" method="POST">
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
    </div>
    <!-- /.content-wrapper -->


    <!-- Modal Hapus -->
@endsection
