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
                            <form action="/surat/sk/upload/file" method="POST" enctype="multipart/form-data" id="suratForm">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="cek_numbers">Nomor Surat <code>*</code></label>
                                        <input type="text" name='id' value="{{ $data->id }}" readonly hidden>
                                        <input type="text" class="form-control" id="cek_number" value="{{ $data->nomor_surat }}" disabled>
                                        <small id="cek_numbers" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="tujuan">Perihal <code>*</code></label>
                                        <input type="text" class="form-control" id="tujuan" value="{{ $data->perihal }}" disabled>
                                        <small id="tujuanSuratError" class="text-danger"></small>
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
                                    <button type="submit" class="btn btn-primary">Simpan</button>
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
