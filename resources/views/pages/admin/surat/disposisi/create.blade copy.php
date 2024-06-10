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
                            <li class="breadcrumb-item active">Tambah Disposisi</li>
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
                            <form action="/surat/disposisi/store" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="asal_surat">Asal Surat</label>
                                        <input type="text" class="form-control" id="asal_surat" name="asal_surat" placeholder="">
                                        @error('asal_surat')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nomor_surat">Nomor Surat</label>
                                        <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="">
                                        @error('nomor_surat')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_surat">Tanggal Surat</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" id="tanggal_surat" name="tanggal_surat" data-target="#reservationdate" />
                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                        @error('tanggal_surat')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_diterima">Tanggal Diterima</label>
                                        <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" id="tanggal_diterima" name="tanggal_diterima" data-target="#reservationdate1" />
                                            <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                        @error('tanggal_diterima')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nomor_agenda">Nomor Agenda</label>
                                        <input type="text" class="form-control" id="nomor_agenda" name="nomor_agenda" placeholder="">
                                        @error('nomor_agenda')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="sifat">Sifat :</label>
                                        <select name="sifat_surat" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                            <option selected="selected">Sangat Segera</option>
                                            <option>Segera</option>
                                            <option>Rahasia</option>
                                        </select>
                                        @error('sifat_surat')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="perihal">Perihal</label>
                                        <input type="text" class="form-control" id="perihal" name="perihal" placeholder="">
                                        @error('perihal')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="diteruskan_kepada">Diteruskan kepada :</label>
                                        <select name="diteruskan" id="diteruskan_select" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                            <option selected="selected">Sekertaris Dinas</option>
                                            <option>Bidang Informasi & Statistik</option>
                                            <option>Bidang Media</option>
                                            <option>Bidang Teknologi Komunikasi & Persandian</option>
                                            <option>Bidang Aplikasi & Sistem Informasi</option>
                                            <option value="lainnya">Lainnya</option>
                                        </select>
                                    </div>

                                    <div id="lainnya_diteruskan_input" class="form-group" style="display: none;">
                                        <label for="lainnya_diteruskan">Diteruskan kepada (Lainnya) :</label>
                                        <input type="text" class="form-control" id="lainnya_diteruskan" name="lainnya_diteruskan" placeholder="Masukkan nama departemen atau orang" />
                                    </div>



                                    <div class="form-group">
                                        <label for="hormat">Dengan Hormat Harap :</label>
                                        <select name="hormat" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                            <option selected="selected">Tanggapan dan saran</option>
                                            <option>Proses lebih lanjut</option>
                                            <option>Koordinasi/konfirmasikan</option>
                                            <option>Lainnya</option>
                                        </select>
                                        @error('hormat')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="catatan">Catatan</label>
                                        <textarea id="catatan" class="form-control" name="catatan" rows="4"></textarea>
                                        @error('catatan')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
@endsection
