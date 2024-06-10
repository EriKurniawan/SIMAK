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
                            <li class="breadcrumb-item active">Tambah Data Surat Masuk</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card">
                            <!-- form start -->

                            <form action="/surat/sm/store" method="POST" enctype="multipart/form-data" id="suratMasuk">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nomor Surat<code>*</code></label>
                                        <input type="text" name="nomor_surat" class="form-control" id="exampleInputEmail1" placeholder="">
                                        <small id="nomorSuratMasukError" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Asal Surat<code>*</code></label>
                                        <input type="text" name="asal_surat" class="form-control" id="exampleInputPassword1" placeholder="">
                                        <small id="asalSuratMasukError" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Surat<code>*</code></label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" name="tanggal_surat" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{ old('tanggal_surat') }}" />
                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                        <small id="tanggalSuratMasukError" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Diterima<code>*</code></label>
                                        <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                            <input type="text" name="tanggal_diterima" class="form-control datetimepicker-input" data-target="#reservationdate1" />
                                            <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                        <small id="tanggalMasukDiterimaError" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Perihal<code>*</code></label>
                                        <input type="text" name="perihal" class="form-control" id="exampleInputPassword1" placeholder="">
                                        <small id="perihalMasukError" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <div class="mb-3">
                                            <label class="form-label" for="lampirans">Unggah file<code>*</code></label>
                                            <input type="file" name="lampiran" class="form-control" id="lampirans">
                                            <small id="lampiranMasukError" class="text-danger"></small>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="button" class="btn btn-primary" onclick="validateForm('suratMasuk')">Simpan</button>
                                </div>
                            </form>



                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
