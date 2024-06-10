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
                            <li class="breadcrumb-item"><a href='/surat/sk/index'>Surat Keluar</a></li>
                            <li class="breadcrumb-item active">Tambah Data Surat Keluar</li>
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
                            <form action="/surat/sk/store" method="POST" enctype="multipart/form-data" id="suratForm">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="tujuan">Tujuan Surat <code>*</code></label>
                                        <input type="text" name="tujuan" class="form-control" id="tujuan" placeholder="" value="{{ old('tujuan') }}">
                                        <small id="tujuanSuratError" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Surat<code>*</code></label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" name="tanggal_surat" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{ old('tanggal_surat') }}" />
                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                        <small id="tanggalSuratError" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="perihal">Perihal<code>*</code></label>
                                        <input type="text" name="perihal" class="form-control" id="perihal" placeholder="" value="{{ old('perihal') }}">
                                        <small id="perihalSuratError" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan<code>*</code></label>
                                        <select name="keterangan" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                            <option selected disabled>Pilih Keterangan</option>
                                            @foreach ($data_keterangan as $keterangan)
                                                <option value="{{ $keterangan->keterangan }}">{{ $keterangan->keterangan }}</option>
                                            @endforeach
                                        </select>
                                        <small id="keteranganSuratError" class="text-danger"></small>
                                    </div>


                                    <div class="form-group">
                                        <label for="lampiran">Unggah File<code>*</code></label>
                                        <div class="mb-3">
                                            <input type="file" name="lampiran" class="form-control" id="lampiran">
                                            <small id="lampiranSuratError" class="text-danger"></small>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="button" class="btn btn-primary" onclick="validateForm('suratForm')">Simpan</button>
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
