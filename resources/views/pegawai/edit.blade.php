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

                <div class="float-left"><a href="{{ route('pegawai.show', $pegawai->id) }}" class="btn btn-success btn"> Kembali </a>
                </div>

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Detail Pegawai</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form action="{{ route('pegawai.update', $pegawai->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="NIP">NIP</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" type="text" name="NIP" placeholder="Nomor Induk Pegawai"
                                        required value="{{ $pegawai->NIP }}" />
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_pegawai">Nama
                                    Pegawai</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" type="text" name="nama_pegawai"
                                        placeholder="Nama Pegawai" required value="{{ $pegawai->nama }}" />
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="tempat_lahir">Tempat
                                    Lahir</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" type="text" name="tempat_lahir"
                                        placeholder="Tempat Lahir Pegawai" required
                                        value="{{ $pegawai->tempat_lahir }}" />
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="tanggal_lahir">Tanggal
                                    Lahir</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" type="date" name="tanggal_lahir"
                                        placeholder="Tanggal Lahir Pegawai" required
                                        value="{{ $pegawai->tanggal_lahir }}" />
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamat">Alamat</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea class="form-control" name="alamat"
                                        required>{{ $pegawai->alamat }}</textarea>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="id_wilayah">Wilayah
                                    Klinik</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="select2_single form-control" name="id_wilayah" tabindex="-1">
                                        @foreach($wilayah as $wil)
                                        @if ($pegawai->id_wilayah == $wil->id)
                                        <option value="{{ $wil->id }}" selected="selected">{{ $wil->nama_wilayah }}
                                        </option>';
                                        @else
                                        <option value="{{ $wil->id }}">{{ $wil->nama_wilayah }}</option>';
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" type="email" name="email" placeholder="Email Pegawai"
                                        required value="{{ $pegawai->email }}" />
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"
                                    for="password">Password</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" type="password" name="password"
                                        placeholder="*kosong kan jika tidak mengubah password" />
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="role">Role</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="select2_single form-control" name="role" tabindex="-1">
                                        @if ($pegawai->role == "admin")
                                        <option value="admin" selected="selected">Admin</option>';
                                        <option value="superadmin">SuperAdmin</option>';
                                        @else
                                        <option value="admin">Admin</option>';
                                        <option value="superadmin" selected="selected">SuperAdmin</option>';
                                        @endif

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
