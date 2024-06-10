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
                            <li class="breadcrumb-item"><a href="/surat/sk/index">Surat Keluar</a></li>
                            <li class="breadcrumb-item active">Edit Surat Keluar</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <!-- form start -->
                        <form action="/surat/sk/update" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="text" name="id" class="form-control" id="id" placeholder="" value="{{ $data->id }}">

                                </div>
                                <div class="form-group">
                                    <label for="tujuan">Tujuan Surat</label>
                                    <input type="text" name="tujuan" class="form-control" id="tujuan" placeholder="" value="{{ $data->tujuan }}">
                                </div>
                                <div class="form-group">
                                    <label for="nomor">No Surat</label>
                                    <input type="text" name="nomor_surat" class="form-control" id="nomor" placeholder=""value="{{ $data->nomor_surat }}">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Surat</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" name="tanggal_surat" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{ $data->tanggal_surat }}" />
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="perihal">Perihal</label>
                                    <input type="text" name="perihal" class="form-control" id="perihal" placeholder="" value="{{ $data->perihal }}">
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
                                <div class="col-0 mb-3 ml-2">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    <a href="/surat/sk/index" class="btn btn-danger">Cancel</a>
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
