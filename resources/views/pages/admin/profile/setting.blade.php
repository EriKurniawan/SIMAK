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
                                <h3 class="profile-username text-center">{{ Auth::user()->username }}</h3>
                                <p class="text-muted text-center">{{ Auth::user()->level }}</p>
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
                                    <li class="nav-item"><a class="nav-link {{ request()->is('profile/profile*') ? 'active' : '' }}" href="/profile/profile">Profile {{ Auth::user()->level }}</a></li>
                                    <li class="nav-item"><a class="nav-link {{ request()->is('profile/setting*') ? 'active' : '' }}" href="/profile/setting?id={{ Auth::id() }}">Pengaturan</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">

                                <div class="tab-pane" id="setting">

                                    <form action="/profile/update" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="id" class="col-sm-2 col-form-label">ID</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="id" class="form-control" id="id" value="{{ Auth::user()->id }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputnip" class="col-sm-2 col-form-label">NIP</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nip" class="form-control" id="inputnip" value="{{ Auth::user()->nip }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputnama" class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="username" class="form-control" id="inputnama" value="{{ Auth::user()->username }}">
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

                                    {{-- <form action="/profile/update" method="POST" enctype="multipart/form-data">
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

                                                    <div class="mb-3">
                                                        <input type="file" name="foto" class="form-control" id="inputphoto" value="{{ Auth::user()->foto }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                                <a href="/profile/profile" class="btn btn-danger">Cancel</a>
                                            </div>
                                        </div>
                                    </form> --}}
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
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
