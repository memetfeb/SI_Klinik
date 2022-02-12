@extends('../layouts/template')

@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <!-- <h3>Plain Page</h3> -->
            </div>

            <div class="title_right">
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">

            <?php if (Session::has('success')) { ?>
                <div class="alert alert-success" role="alert">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    {!! session('success') !!}
                </div>
                <?php } else if(Session::has('error')){ ?>
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>Error!</strong> {!! session('error') !!}
                </div>
                <?php } else if(Session::has('info')){ ?>
                <div class="alert alert-info">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>Info!</strong> {!! session('info') !!}
                </div>
                <?php } ?>

                <div class="float-left"><a href="{{ route('pegawai.index') }}" class="btn btn-info btn"> Kembali </a></div>

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Tambah Pegawai</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form action="{{ route('pegawai.store') }}" method="post" >
                            @csrf
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="NIP">NIP</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" type="text" name="NIP" placeholder="Nomor Induk Pegawai"
                                        required />
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_pegawai">Nama
                                    Pegawai</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" type="text" name="nama_pegawai"
                                        placeholder="Nama Pegawai" required />
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="tempat_lahir">Tempat
                                    Lahir</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" type="text" name="tempat_lahir"
                                        placeholder="Tempat Lahir Pegawai" required />
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="tanggal_lahir">Tanggal
                                    Lahir</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" type="date" name="tanggal_lahir"
                                        placeholder="Tanggal Lahir Pegawai" required />
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamat">Alamat</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea class="form-control" name="alamat" required></textarea>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="id_wilayah">Wilayah
                                    Klinik</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="select2_single form-control" name="id_wilayah" tabindex="-1">
                                        <option></option>
                                        @foreach($wilayah as $wil)
                                        <option value="{{ $wil->id }}">
                                            {{ $wil->nama_wilayah }}</option>';
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" type="email" name="email" placeholder="Email Pegawai"
                                        required />
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"
                                    for="password">Password</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" type="password" name="password"
                                        placeholder="Password Pegawai" required />
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="role">Role</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="select2_single form-control" name="role" tabindex="-1">
                                        <option value="admin" selected="selected">Admin</option>';
                                        <option value="superadmin">SuperAdmin</option>';
                                    </select>
                                </div>
                            </div>



                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <input class="btn btn-success" type="submit" name="btn" value="Save" />
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

@endsection
