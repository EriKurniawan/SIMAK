@extends('pages.admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
            </div><!-- /.container-fluid -->
        </section>
        <style>
            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                font-family: tubaba-bold;
            }
        </style>
        <!-- Main content -->
        <section class="content">
            @if (auth()->check())
                <h5>Selamat Datang {{ auth()->user()->name }}! Anda dapat mengoperasikan sistem dengan wewenang sebagai {{ auth()->user()->level }}</h5>
            @else
                <h5>Selamat Datang!</h5>
            @endif

            <div class="row">
                <div class="col-md-4 col-sm-6 col-12 mt-3 mb-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="far fa-envelope"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Surat Masuk</span>
                            <span class="info-box-number">{{ $totalsm }}</span>
                            <a href="surat/sm/index" class="small-box-footer">
                                Detail <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-4 col-sm-6 col-12 mt-3 mb-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="far fa-envelope-open"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Surat Keluar</span>
                            <span class="info-box-number">{{ $totalsk }}</span>
                            <a href="/surat/sk/index" class="small-box-footer">
                                Detail <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-4 col-sm-6 col-12 mt-3 mb-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="far fa-copy"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Disposisi</span>
                            <span class="info-box-number">{{ $totalds }}</span>
                            <a href="surat/disposisi/index" class="small-box-footer">
                                Detail <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>

            <!--chart-->
            <div class="row">
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Grafik Surat</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="position-relative mb-4">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
