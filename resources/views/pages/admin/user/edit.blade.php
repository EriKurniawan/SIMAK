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
                            <li class="breadcrumb-item"><a href="/user/index">Kelola Pengguna</a></li>
                            <li class="breadcrumb-item active">Edit Data Pengguna</li>
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
                    <div class="card">
                        <!-- form start -->

                        <form action="/user/update" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="text" name="nip" class="form-control" id="nip" placeholder="" value="{{ $data->nip }}">
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" id="username" placeholder="" value="{{ $data->username }}">
                                </div>
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="" value="{{ $data->jabatan }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder=""value="{{ $data->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text"name="password" class="form-control" id="password" placeholder="" value="{{ $data->password }}">
                                </div>
                                <div class="form-group">
                                    <label for="level">Level</label>
                                    <select name="level" class="form-control" id="level">
                                        <option value="admin">Admin</option>
                                        <option value="staf">Staf</option>
                                        <option value="operator">Operator</option>
                                        <option value="pimpinan">Pimpinan</option>
                                        <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Unggah Foto</label>
                                    <div class="form-group">
                                        <div class="mb-3">
                                            <input type="file" name="foto" class="form-control" id="fotos">
                                            @if (isset($data->foto))
                                                <p>File terlampir: {{ $data->foto }}</p>
                                            @endif
                                        </div>
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
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
