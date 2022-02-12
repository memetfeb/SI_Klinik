@extends('../layouts/template')

@push('scripts')

<!-- Chart.js -->
<script type="text/javascript" src="{{ asset('Chart.js/dist/Chart.min.js') }}"></script>

<script type="text/javascript">
    function init_charts() {

        console.log('run_charts  typeof [' + typeof (Chart) + ']');

        if (typeof (Chart) === 'undefined') {
            return;
        }

        console.log('init_charts');


        Chart.defaults.global.legend = {
            enabled: false
        };


        // Line chart

        if ($('#lineChart1').length) {

            var ctx = document.getElementById("lineChart1");
            var lineChart1 = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["January", "February", "March", "April", "May", "June", "July", "August",
                        "September", "October", "November", "December"
                    ],
                    datasets: [{
                        label: "{{ $tahun_kemarin }}",
                        backgroundColor: "rgba(38, 185, 154, 0.31)",
                        borderColor: "rgba(38, 185, 154, 0.7)",
                        pointBorderColor: "rgba(38, 185, 154, 0.7)",
                        pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: "rgba(220,220,220,1)",
                        pointBorderWidth: 1,
                        data: [
                            @foreach($total_biaya_perbulan_tahun_kemarin as $peg) 
                            {{ $peg -> total_biaya }},
                            @endforeach
                        ]
                        //[31, 74, 6, 39, 20, 85, 7, 44, 55, 66, 22, 33]
                    }, {
                        label: "{{ $tahun_sekarang }}",
                        backgroundColor: "rgba(245, 40, 145, 0.2)",
                        borderColor: "rgba(245, 40, 145, 0.85)",
                        pointColor: "rgba(245, 40, 145, 0.85)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data: [
                            @foreach($total_biaya_perbulan_tahun_sekarang as $peg) 
                            {{ $peg -> total_biaya }},
                            @endforeach
                        ]
                        // [28, 48, ]
                    }]
                },
            });

        }

        // Pie chart 1
    if ($('#pieChart1').length) {

var ctx = document.getElementById("pieChart1");
var data = {
    datasets: [{
        data: [
            @foreach($total_pendaftaran_per_wilayah_bulan_sekarang as $peg) 
            {{ $peg -> total_transaksi }},
        @endforeach
        ],
        backgroundColor: [
            "#455C73",
            "#9B59B6",
            "#BDC3C7",
            "#26B99A",
            "#3498DB"
        ],
        label: 'My dataset' // for legend
    }],
    labels: [
        @foreach($total_pendaftaran_per_wilayah_bulan_sekarang as $peg) 
            "{{$peg -> namawilayah}}",
        @endforeach
        
        // "Dark Gray",
        // "Purple",
        // "Gray",
        // "Green",
        // "Blue"
    ]
};

var pieChart1 = new Chart(ctx, {
    data: data,
    type: 'pie',
    otpions: {
        legend: false
    }
});

}

    // Pie chart 2
    if ($('#pieChart2').length) {

var ctx = document.getElementById("pieChart2");
var data = {
    datasets: [{
        data: [
            @foreach($total_pendapatan_per_wilayah_bulan_sekarang as $peg) 
            {{ $peg -> total_transaksi }},
        @endforeach
        ],
        backgroundColor: [
            "#455C73",
            "#9B59B6",
            "#BDC3C7",
            "#26B99A",
            "#3498DB",
            "#8834db",
            "#a334db",
            "#db3734",
            "#db7a34",
            "#dbbc34",
            "#6edb34",
            "#34d5db",
        ],
        label: 'My dataset' // for legend
    }],
    labels: [
        @foreach($total_pendapatan_per_wilayah_bulan_sekarang as $peg) 
            "{{$peg -> namawilayah}}",
        @endforeach
        
        // "Dark Gray",
        // "Purple",
        // "Gray",
        // "Green",
        // "Blue"
    ]
};

var pieChart2 = new Chart(ctx, {
    data: data,
    type: 'pie',
    otpions: {
        legend: false
    }
});

}
       
    }

</script>


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
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Grafik Pendapatan Klinik Tadika Mesra Tahun {{$tahun_sekarang}} dan
                            {{$tahun_kemarin}} (Dalam Rupiah)</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <canvas id="lineChart1"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Jumlah Pasien Tiap Wilayah {{ $bulan_sekarang }} {{$tahun_sekarang }}</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="pieChart1"></canvas>
                  </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Jumlah Pendapatan Tiap Wilayah {{ $bulan_sekarang }} {{$tahun_sekarang }} (Dalam Rupiah)</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="pieChart2"></canvas>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->




@endsection
