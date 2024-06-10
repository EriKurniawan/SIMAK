@extends('pages.admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Berisi konten halaman -->
    <div class="content-wrapper">
        <!-- Header Konten (Header halaman) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                            <li class="breadcrumb-item active">Kelola Pengguna</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- / .container-fluid -->
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
        <!-- Konten utama -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Pengguna</h3>
                                <div style="text-align: right">
                                    <a class="btn btn-primary" href="/user/create" role="button">Tambah Data</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="style-tr">
                                            <th>No</th>
                                            <th>NIP</th>
                                            <th>Username</th>
                                            <th>Jabatan</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Foto</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($datas as $data)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $data->nip }}</td>
                                                <td>{{ $data->username }}</td>
                                                <td>{{ $data->jabatan }}</td>
                                                <td>{{ $data->email }}</td>
                                                <td>{{ $data->password }}</td>
                                                <td>
                                                    <img src="{{ asset('img/' . $data->foto) }}" alt="{{ $data->foto }}" width="100">
                                                </td>
                                                <td class="project-actions text-right">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">Aksi</button>
                                                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                            <span class="sr-only">Alihkan Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu" role="menu">
                                                            <a class="dropdown-item" href="/user/edit?id={{ $data->id }}">Edit</a>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-delete-{{ $data->id }}">Hapus</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Modal Hapus -->
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
                                                            <form action="/user/destroy?id={{ $data->id }}" method="POST">
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
                                            <!-- /.modal -->
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
            <!-- /. container-fluid -->
        </section>
    </div>
    <!-- /.content-wrapper -->
@endsection
