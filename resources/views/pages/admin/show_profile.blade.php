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
                            <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                            <li class="breadcrumb-item active">Profile</li>
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
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="/assets/img/user4-128x128.jpg" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">Raden Saleh</h3>

                                <p class="text-muted text-center">Administrator</p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">

                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                                                <div class="text-muted">



                                                    <p class="text-sm">NIP: <span>{{ $data->nip }}</span></p>
                                                    <p class="text-sm">Nama: <span>{{ $data->nama }}</span></p>
                                                    <p class="text-sm">Jabatan: <span>{{ $data->jabatan }}</span></p>
                                                    <p class="text-sm">Email: <span>{{ $data->email }}</span></p>
                                                    <p class="text-sm">Password: <span>{{ $data->password }}</span></p>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="settings">
                                        <form action="/profile/update" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="inputnip" class="col-sm-2 col-form-label">NIP</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="nip" class="form-control" id="inputnip" placeholder="">>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputnama" class="col-sm-2 col-form-label">Nama</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="nama" class="form-control" id="inputnama" placeholder="">>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputjabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="jabatan" class="form-control" id="inputjabatan" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputemail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="email" class="form-control" id="inputemail" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputpassword" class="col-sm-2 col-form-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="password" class="form-control" id="inputpassword" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputphoto" class="col-sm-2 col-form-label">Reset Photo</label>
                                                <div class="col-sm-10">
                                                    <div class="custom-file">
                                                        <input type="file" name="foto" class="custom-file-input" id="inputphoto">
                                                        <label class="custom-file-label" for="inputphoto">Choose photo</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                    <a href="/" class="btn btn-danger">Cancel</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
