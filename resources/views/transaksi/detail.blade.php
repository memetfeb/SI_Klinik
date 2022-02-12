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

                <div class="float-left"><a href="{{ route('transaksi.index') }}" class="btn btn-info btn"> Kembali </a>
                </div>

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Detail Transaksi {{ $transaksi->id }}</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <!-- <form action="{{ route('transaksi.store') }}" method="post">
                            @csrf -->
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Pendaftaran : </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input class="form-control" type="text" readonly value="{{ $transaksi->tanggal_pendaftaran }}" />
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">NIK Pasien : </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input class="form-control" type="text" readonly value="{{ $transaksi->NIK_pasien }}" />
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Pasien : </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input class="form-control" type="text" readonly value="{{ $transaksi->nama_pasien }}" />
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Lahir Pasien : </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input class="form-control" type="text" readonly value="{{ $transaksi->tanggal_lahir_pasien }}" />
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Keluhan : </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input class="form-control" type="text" readonly value="{{ $transaksi->keluhan }}" />
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Klinik Wilayah : </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input class="form-control" type="text" readonly value="{{ $transaksi->nama_wilayah }}" />
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Tindakan : </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input class="form-control" type="text" readonly value="{{ $transaksi->nama_tindakan }}" />
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Obat : </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input class="form-control" type="text" readonly value="{{ $transaksi->nama_obat }}" />
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Total Biaya : </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input class="form-control" type="text" readonly value="{{ $transaksi->total_biaya }}" />
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Last Update By : </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input class="form-control" type="text" readonly value="{{ $transaksi->email }}" />
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Status : </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input class="form-control" type="text" readonly value="{{ $transaksi->status_transaksi }}" />
                            </div>
                        </div>

                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-primary">Edit</a>
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
                                        <form role="form" action="{{ route('transaksi.destroy', $transaksi->id) }}"
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
