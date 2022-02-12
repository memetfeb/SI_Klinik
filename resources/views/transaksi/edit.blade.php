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

                <div class="float-left"><a href="{{ route('transaksi.show', $transaksi->id) }}"
                        class="btn btn-success btn"> Kembali </a>
                </div>

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Transaksi</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form action="{{ route('transaksi.update', $transaksi->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal
                                    Pendaftaran : </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" type="date" name="tanggal_pendaftaran"
                                        placeholder="Tanggal Pendaftaran transaksi" required
                                        value="{{ $transaksi->tanggal_pendaftaran }}" />
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">NIK Pasien : </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" type="text" name="NIK_pasien" placeholder="NIK Pasien"
                                        required value="{{ $transaksi->NIK_pasien }}" />
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Pasien : </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" type="text" name="nama_pasien" placeholder="Nama Pasien"
                                        required value="{{ $transaksi->nama_pasien }}" />
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal
                                    Lahir Pasien : </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" type="date" name="tanggal_lahir_pasien"
                                        placeholder="Tanggal Lahir Pasien" required
                                        value="{{ $transaksi->tanggal_lahir_pasien }}" />
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Keluhan : </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea class="form-control" name="keluhan"
                                        required>{{ $transaksi->keluhan }}</textarea>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Wilayah
                                    Klinik : </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="select2_single form-control" name="id_wilayah" tabindex="-1">
                                        @foreach($wilayah as $wil)
                                        @if ($transaksi->id_wilayah == $wil->id)
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tindakan : </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="select2_single form-control" name="id_tindakan" tabindex="-1">
                                        <option></option>;
                                        @foreach($tindakan as $tin)
                                        @if ($transaksi->id_tindakan == $tin->id)
                                        <option value="{{ $tin->id }}" selected="selected">{{ $tin->nama_tindakan }}
                                        </option>';
                                        @else
                                        <option value="{{ $tin->id }}">{{ $tin->nama_tindakan }}</option>';
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Obat : </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="select2_single form-control" name="id_obat" tabindex="-1">
                                        <option></option>;
                                        @foreach($obat as $obt)
                                        @if ($transaksi->id_tindakan == $obt->id)
                                        <option value="{{ $obt->id }}" selected="selected">{{ $obt->nama_obat }}
                                        </option>';
                                        @else
                                        <option value="{{ $obt->id }}">{{ $obt->nama_obat }}</option>';
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Total Biaya : </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" type="text" readonly
                                        value="{{ $transaksi->total_biaya }}" />
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Status Transaksi</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="select2_single form-control" name="status_transaksi" tabindex="-1">
                                        @if ($transaksi->status_transaksi == "Lunas/Selesai")
                                        <option value="butuh_tindakan">Butuh Tindakan</option>';
                                        <option value="butuh_pembayaran">Butuh Pembayaran</option>';
                                        <option value="Lunas/Selesai" selected="selected">Lunas / Selesai</option>';
                                        @elseif ($transaksi->status_transaksi == "butuh_pembayaran")
                                        <option value="butuh_tindakan">Butuh Tindakan</option>';
                                        <option value="butuh_pembayaran" selected="selected">Butuh Pembayaran</option>';
                                        <option value="Lunas/Selesai">Lunas / Selesai</option>';
                                        @else
                                        <option value="butuh_tindakan" selected="selected">Butuh Tindakan</option>';
                                        <option value="butuh_pembayaran">Butuh Pembayaran</option>';
                                        <option value="Lunas/Selesai">Lunas / Selesai</option>';
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
