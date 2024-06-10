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
                            <li class="breadcrumb-item active">Edit Surat Masuk</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
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
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/surat/sm/update" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <input type="text" name="id" class="form-control" id="id" placeholder="" value="{{ $data->id }}">

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nomor Surat<code>*</code></label>
                                    <input type="text" name="nomor_surat" class="form-control" id="nomor_surat" placeholder="" value="{{ $data->nomor_surat }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Asal Surat<code>*</code></label>
                                    <input type="text" name="asal_surat" class="form-control" id="asal_surat" placeholder="" value="{{ $data->asal_surat }}">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Surat<code>*</code></label>
                                    <div class="input-group date" id="tanggal_surat" data-target-input="nearest">
                                        <input type="text" name="tanggal_surat" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{ $data->tanggal_surat }}" />
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Surat<code>*</code></label>
                                    <div class="input-group date" id="tanggal_diterima" data-target-input="nearest">
                                        <input type="text" name="tanggal_diterima" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{ $data->tanggal_diterima }}" />
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Perihal<code>*</code></label>
                                    <input type="text" name="perihal" class="form-control" id="perihal" placeholder="" value="{{ $data->perihal }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Unggah File</label>
                                    <div class="form-group">
                                        <div class="mb-3">
                                            <input type="file" name="lampiran" class="form-control" id="lampirans">
                                            @if (isset($data->lampiran))
                                                <p>File terlampir: {{ $data->lampiran }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="row">
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>

                                    <a href="surat/sm/index" class="btn btn-danger">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
