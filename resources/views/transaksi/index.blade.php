@extends('../layouts/template')

@push('styles')
<!-- iCheck -->
<link href="{{ asset('iCheck/skins/flat/green.css') }}" rel="stylesheet">

<!-- Datatables -->
<link href="{{ asset('datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>

<!-- iCheck -->
<script type="text/javascript" src="{{ asset('iCheck/icheck.min.js') }}"></script>
<!-- Datatables -->
<script type="text/javascript" src="{{ asset('datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('jszip/dist/jszip.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('pdfmake/build/pdfmake.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('pdfmake/build/vfs_fonts.js') }}"></script>
@endpush

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
            <div class="col-md-12 col-sm-12 ">

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
                        <h2>Semua Pendaftaran</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">

                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Tanggal Pendaftaran</th>
                                                <th>NIK</th>
                                                <th>Nama </th>
                                                <th>Tanggal Lahir</th>
                                                <th>Wilayah Klinik</th>
                                                <th>Total Biaya</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($transaksi as $trans)
                                            <tr>
                                                <td>{{$trans->tanggal_pendaftaran}}</td>
                                                <td>{{$trans->NIK_pasien}}</td>
                                                <td>{{$trans->nama_pasien}}</td>
                                                <td>{{$trans->tanggal_lahir_pasien}}</td>
                                                <td>{{$trans->nama_wilayah}}</td>
                                                <td>{{$trans->total_biaya}}</td>
                                                <td>{{$trans->status_transaksi}}</td>
                                                <td>
                                                    <ul class="nav">
                                                        <a href="{{ route('transaksi.show', $trans->id) }}" class="btn btn-primary btn-sm">Detail</a>
                                                    </ul>
                                                </td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /page content -->

@endsection
