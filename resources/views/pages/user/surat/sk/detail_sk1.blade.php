@extends('tampilan_user.layouts.main')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="#">Surat</a></li>
                <li class="breadcrumb-item"><a href="surat_keluar1.html">Surat Keluar</a></li>
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
            <h3 class="card-title">Detail Surat Keluar</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                <div class="text-muted">
                  <p class="text-sm">Nomor Surat
                  </p>
                  <p class="text-sm">Asal Surat
                  </p>
                  <p class="text-sm">Tanggal Surat
                </p>
                <p class="text-sm">Penerima
                </p>
                <p class="text-sm">Indeks Surat
                </p>
                <p class="text-sm">Perihal
                </p>
                <p class="text-sm">File
                </p>
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
