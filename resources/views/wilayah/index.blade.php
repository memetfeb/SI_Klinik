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
                        <h2>Area Wilayah Klinik</h2>
                        <div class="float-right"><a href="#" data-toggle="modal" data-target="#tambah"
                                class="btn btn-success btn"> + Tambah Wilayah </a></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">

                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama Wilayah </th>
                                                <th>Alamat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($wilayah as $wil)
                                            <tr>
                                                <td>{{$wil->id}}</td>
                                                <td>{{$wil->nama_wilayah}}</td>
                                                <td>{{$wil->alamat}}</td>
                                                <td>
                                                    <ul class="nav">
                                                        <a href="#" data-toggle="modal" data-target="#edit{{$wil->id}}" class="btn btn-primary btn-sm">Edit</a>
                                                        <a href="#" data-toggle="modal" data-target="#delete{{$wil->id}}" class="btn btn-danger btn-sm">Delete</a>
                                                    </ul>
                                                </td>
                                            </tr>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="edit{{$wil->id}}" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title"> Edit Wilayah {{$wil->nama_wilayah}}
                                                            </h4>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form role="form"
                                                                action="{{ route('wilayah.update', $wil->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group col-md-12 col-sm-12">
                                                                    <label
                                                                        class="col-form-label col-md-4 col-sm-4 label-align">Nama
                                                                        Wilayah : </label>
                                                                    <div class="col-md-6 col-sm-6 ">
                                                                        <input class="form-control" type="text"
                                                                            name="nama_wilayah"
                                                                            placeholder="Nama Wilayah" required
                                                                            value="{{$wil->nama_wilayah}}" />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-12 col-sm-12">
                                                                    <label
                                                                        class="col-form-label col-md-4 col-sm-4 label-align">Alamat
                                                                        : </label>
                                                                    <div class="col-md-6 col-sm-6 ">
                                                                        <textarea class="form-control" name="alamat"
                                                                            required>{{$wil->alamat}}</textarea>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-success">Edit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end Edit Modal -->

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="delete{{$wil->id}}" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Apakah anda yakin?
                                                            </h5>
                                                            <button class="close" type="button" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">Data yang dihapus tidak akan bisa
                                                            dikembalikan.</div>
                                                        <div class="modal-footer">
                                                          <form role="form"
                                                                action="{{ route('wilayah.destroy', $wil->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                            <!-- <a id="btn-delete" class="btn btn-danger" type="submit" >Hapus</a> -->
                                                          </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end Delete Modal -->


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


<!-- Tambah K Modal -->
<div class="modal fade" id="tambah" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Tambah Wilayah </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form role="form" action="{{ route('wilayah.store') }}" method="POST">
                    @csrf
                    <div class="form-group col-md-12 col-sm-12">
                        <label class="col-form-label col-md-4 col-sm-4 label-align">Nama Wilayah : </label>
                        <div class="col-md-8 col-sm-8 ">
                            <input class="form-control" type="text" name="nama_wilayah" placeholder="Nama Wilayah"
                                required />
                        </div>
                    </div>

                    <div class="form-group col-md-12 col-sm-12">
                        <label class="col-form-label col-md-4 col-sm-4 label-align">Alamat : </label>
                        <div class="col-md-8 col-sm-8 ">
                            <textarea class="form-control" name="alamat" required></textarea>
                        </div>
                    </div>

                    <br>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

@endsection
