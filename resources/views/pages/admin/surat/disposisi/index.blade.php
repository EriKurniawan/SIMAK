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
                            <li class="breadcrumb-item">
                                <a href="/">Beranda</a>
                            </li>
                            <li class="breadcrumb-item active">Disposisi Surat</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div style="text-align: right">
                                    {{-- @if (auth()->user()->level == 'admin')
                                        <a class="btn btn-primary" href="/surat/disposisi/create" role="button">Tambah Data</a>
                                    @endif --}}
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
                                            <th>No Agenda</th>
                                            <th>Sifat</th>
                                            <th>Perihal</th>
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
                                                <td>{{ $data->asal_surat }}</td>
                                                <td>{{ $data->nomor_surat }}</td>
                                                <td>{{ $data->tanggal_surat }}</td>
                                                <td>{{ $data->tanggal_diterima }}</td>
                                                <td>{{ $data->nomor_agenda }}</td>
                                                <td>{{ $data->sifat_surat }}</td>
                                                <td>{{ $data->perihal }}</td>

                                            <tr>
                                                {{-- <td>3</td>
                                            <td>Sek Daerah</td>
                                            <td>101/192/11.15/TUBABA/2024</td>
                                            <td>22/04/2024</td>
                                            <td>23/04/2024</td>
                                            <td>-</td>
                                            <td>Segera</td>
                                            <td>Undangan Rapat</td> --}}
                                                <td class="project-actions text-right">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">Aksi</button>
                                                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu" role="menu">
                                                            <a class="dropdown-item" href="/surat/disposisi/show?id={{ $data->id }}">Detail</a>
                                                            @if (auth()->user()->level == 'admin' || auth()->user()->level == 'pimpinan' || auth()->user()->level == 'operator')
                                                                <a class="dropdown-item" href="/surat/disposisi/edit?id={{ $data->id }}">Edit</a>
                                                                <a class="dropdown-item" data-toggle="modal" data-target="#modal-default">Hapus</a>
                                                            @endif
                                                        </div>
                                                        <div class="modal fade" id="modal-default">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Hapus Data</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Apakah Anda yakin ingin menghapus?</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <form action="/surat/disposisi/destroy?id={{ $data->id }}" method="POST">
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
    <section>
        <div class="modal fade" id="test">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus?</p>
                    </div>
                    <div class="modal-footer right">
                        <button type="button" class="btn btn-primary">Ya</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Batal
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </section>
    </div>
    <!-- /.content-wrapper -->
@endsection
