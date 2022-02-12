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

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Pendaftaran</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form action="{{ route('transaksi.store') }}" method="post" >
                            @csrf

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Pendaftaran</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" type="date" name="tanggal_pendaftaran" placeholder="Tanggal Pendaftaran"
                                        required value="{{date('Y-m-d', time())}}" />
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">NIK Pasien</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" type="text" name="NIK_pasien" placeholder="Nomor Induk Kependudukan"
                                        required />
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Pasien</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" type="text" name="nama_pasien" placeholder="Nama"
                                        required />
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Lahir Pasien</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" type="date" name="tanggal_lahir_pasien" placeholder="Tanggal Lahir"
                                        required />
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Keluhan</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea class="form-control" name="keluhan" required></textarea>
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
