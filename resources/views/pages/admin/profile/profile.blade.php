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
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <dl class="row">
                                            <dt class="col-sm-4">NIP</dt>
                                            <dt class="col-sm-0">:</dt>
                                            <dd class="col-sm-7">{{ Auth::user()->nip }}</dd>

                                            <dt class="col-sm-4">Username</dt>
                                            <dt class="col-sm-0">:</dt>
                                            <dd class="col-sm-7">{{ Auth::user()->username }}</dd>

                                            <dt class="col-sm-4">Jabatan</dt>
                                            <dt class="col-sm-0">:</dt>
                                            <dd class="col-sm-7">{{ Auth::user()->jabatan }}</dd>

                                            <dt class="col-sm-4">Email</dt>
                                            <dt class="col-sm-0">:</dt>
                                            <dd class="col-sm-7">{{ Auth::user()->email }}</dd>

                                            <dt class="col-sm-4">Password</dt>
                                            <dt class="col-sm-0">:</dt>
                                            <dd class="col-sm-7">{{ Auth::user()->password }}</dd>
                                        </dl>

                                    </div>
                                </div>
                                <!-- /.tab-pane -->






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
