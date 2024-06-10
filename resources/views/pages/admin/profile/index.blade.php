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
                                    <img class="profile-user-img img-fluid img-circle" src="{{ Auth::user()->foto ? asset(Auth::user()->foto) : '/assets/img/user.png' }}" alt="User profile picture">
                                </div>
                                <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                                <p class="text-muted text-center">{{ Auth::user()->role }}</p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="/profile/profile" data-toggle="tab">Profile {{ Auth::user()->role }}</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#setting" data-toggle="tab">Pengaturan</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                                                <div class="text-muted">
                                                    <p class="text-sm">NIP : {{ Auth::user()->nip }}</p>
                                                    <p class="text-sm">Nama : {{ Auth::user()->name }}</p>
                                                    <p class="text-sm">Jabatan : {{ Auth::user()->jabatan }}</p>
                                                    <p class="text-sm">Email : {{ Auth::user()->email }}</p>
                                                    <p class="text-sm">Password: ********</p> <!-- Hati-hati dengan menampilkan password -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="setting">
                                        <form action="/profile/update" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="inputnip" class="col-sm-2 col-form-label">NIP</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="nip" class="form-control" id="inputnip" value="{{ Auth::user()->nip }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputnama" class="col-sm-2 col-form-label">Nama</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="name" class="form-control" id="inputnama" value="{{ Auth::user()->name }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputjabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="jabatan" class="form-control" id="inputjabatan" value="{{ Auth::user()->jabatan }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputemail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="email" class="form-control" id="inputemail" value="{{ Auth::user()->email }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputpassword" class="col-sm-2 col-form-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="password" class="form-control" id="inputpassword" placeholder="Leave blank to keep current password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputphoto" class="col-sm-2 col-form-label">Rubah Foto</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <label for="foto">Unggah File</label>
                                                        <div class="mb-3">
                                                            <input type="file" name="foto" class="form-control" id="inputphoto" value="{{ Auth::user()->foto }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                    <a href="/profile/profile" class="btn btn-danger">Kembali</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>


                                    {{-- <div class="tab-pane" id="setting">
                                        <form action="/profile/update" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="inputnip" class="col-sm-2 col-form-label">NIP</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="nip" class="form-control" id="inputnip" value="{{ Auth::user()->nip }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputnama" class="col-sm-2 col-form-label">Nama</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="name" class="form-control" id="inputnama" value="{{ Auth::user()->name }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputjabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="jabatan" class="form-control" id="inputjabatan" value="{{ Auth::user()->jabatan }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputemail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="email" class="form-control" id="inputemail" value="{{ Auth::user()->email }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputpassword" class="col-sm-2 col-form-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="password" class="form-control" id="inputpassword" placeholder="Leave blank to keep current password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputphoto" class="col-sm-2 col-form-label">Reset Photo</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <label for="foto">Upload File</label>
                                                        <div class="mb-3">
                                                            <input type="file" name="foto" class="form-control" id="inputphoto" value="{{ Auth::user()->foto }}>

                                                        </div>
                                                    </div>

                                                    {{-- <div class="custom-file">
                                                        <input type="file" name="foto" class="custom-file-input" id="inputphoto">
                                                        <label class="custom-file-label" for="inputphoto">Choose photo</label>
                                                    </div> --}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                    <a href="/" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                            </form>
                            {{-- </div>  --}}

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
