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
                            <li class="breadcrumb-item active">Beranda</li>
                            <li class="breadcrumb-item"><a href="/surat/sm/index">Surat Masuk</a></li>
                            <li class="breadcrumb-item active">Detail Surat</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Surat Masuk</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Detail Surat</h3>
                                </div>
                                <div class="card-body">
                                    <dl class="row">
                                        <dt class="col-sm-4">Nomor Surat</dt>
                                        <dt class="col-sm-0">:</dt>
                                        <dd class="col-sm-7">{{ $data->nomor_surat }}</dd>

                                        <dt class="col-sm-4">Asal Surat</dt>
                                        <dt class="col-sm-0">:</dt>
                                        <dd class="col-sm-7">{{ $data->asal_surat }}</dd>

                                        <dt class="col-sm-4">Tanggal Surat</dt>
                                        <dt class="col-sm-0">:</dt>
                                        <dd class="col-sm-7">{{ $data->tanggal_surat }}</dd>

                                        <dt class="col-sm-4">Tanggal Diterima</dt>
                                        <dt class="col-sm-0">:</dt>
                                        <dd class="col-sm-7">{{ $data->tanggal_diterima }}</dd>

                                        <dt class="col-sm-4">Perihal</dt>
                                        <dt class="col-sm-0">:</dt>
                                        <dd class="col-sm-7">{{ $data->perihal }}</dd>
                                    </dl>
                                    <div class="text-left">
                                        @if (auth()->user()->level == 'admin' || auth()->user()->level == 'pimpinan')
                                            <a href="/surat/disposisi/index" class="btn btn-sm btn-primary">Disposisi Surat</a>
                                        @endif
                                        <a href="/surat/sm/download?id={{ $data->lampiran }}" class="btn btn-sm btn-success">Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">

                                <div class="card-body">
                                    <iframe src="{{ asset('dokumen/' . $data->lampiran) }}" width="100%" height="230px" style="border:none"></iframe>
                                    {{-- <iframe src="{{ asset('dokumen/' . $data->lampiran) }}" style="width: 100%; height: 600px;" frameborder="0"></iframe> --}}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
