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

                <div class="float-left"><a href="{{ route('pegawai.index') }}" class="btn btn-info btn"> Kembali </a>
                </div>

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Detail Pegawai</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <!-- <form action="{{ route('pegawai.store') }}" method="post">
                            @csrf -->
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="NIP">NIP : </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input class="form-control" type="text" name="NIP" placeholder="Nomor Induk Pegawai"
                                    readonly value="{{ $pegawai->NIP }}" />
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_pegawai">Nama
                                Pegawai</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input class="form-control" type="text" name="nama_pegawai" placeholder="Nama Pegawai"
                                    readonly value="{{ $pegawai->nama }}" />
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="tempat_lahir">Tempat
                                Lahir</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input class="form-control" type="text" name="tempat_lahir"
                                    placeholder="Tempat Lahir Pegawai" readonly value="{{ $pegawai->tempat_lahir }}" />
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="tanggal_lahir">Tanggal
                                Lahir</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input class="form-control" type="date" name="tanggal_lahir"
                                    placeholder="Tanggal Lahir Pegawai" readonly
                                    value="{{ $pegawai->tanggal_lahir }}" />
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamat">Alamat</label>
                            <div class="col-md-6 col-sm-6 ">
                                <textarea class="form-control" name="alamat" readonly>{{ $pegawai->alamat }}</textarea>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="id_wilayah">Wilayah
                                Klinik</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input class="form-control" type="text" name="id_wilayah" readonly
                                    value="{{ $pegawai->nama_wilayah }}" />
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input class="form-control" type="email" name="email" placeholder="Email Pegawai"
                                    readonly value="{{ $pegawai->email }}" />
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="role">Role</label>
                            <div class="col-md-6 col-sm-6 ">
                            <input class="form-control" type="text" name="role" readonly
                                    value="{{ $pegawai->role }}" />
                            </div>
                        </div>

                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="btn btn-primary">Edit</a>
                                <a href="#" data-toggle="modal" data-target="#delete" class="btn btn-danger">Delete</a>
                            </div>
                        </div>

                        <!-- </form> -->

                        <!-- Delete Modal -->
                        <div class="modal fade" id="delete" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Apakah anda yakin?
                                        </h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Data yang dihapus tidak akan bisa
                                        dikembalikan.</div>
                                    <div class="modal-footer">
                                        <form role="form" action="{{ route('pegawai.destroy', $pegawai->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-secondary" type="button"
                                                data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end Delete Modal -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

@endsection
