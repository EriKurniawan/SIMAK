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
                  <li class="breadcrumb-item active">Surat Masuk</li>
                </ol>
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Surat Masuk</h3>
                    <div style="text-align: right">
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table
                      id="example1"
                      class="table table-bordered table-striped"
                    >
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Asal Surat</th>
                          <th>No Surat</th>
                          <th>Perihal</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Diskominfo Pesawaran</td>
                          <td>001</td>
                          <td>Surat Undangan</td>
                          <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="disposisi_jadi1.html">
                              <i class="fas fa-copy">
                              </i>
                              Disposisi
                          </a>
                            <a class="btn btn-info btn-sm" href="detail_sm1.html">
                              <i class="fas fa-eye">
                              </i>
                              View
                          </a>
                            <a class="btn btn-success btn-sm" href="../../dist/pdf/TOEFL_page-0001.jpg">
                                <i class="fas fa-download">
                                </i>
                                Download
                            </a>
                        </td>
                        </tr>
                      </tbody>
                      <!-- <tfoot>
                        <tr>
                          <th>Rendering engine</th>
                          <th>Browser</th>
                          <th>Platform(s)</th>
                        </tr>
                      </tfoot> -->
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
      </div>
      <!-- /.content-wrapper -->
      @endsection
