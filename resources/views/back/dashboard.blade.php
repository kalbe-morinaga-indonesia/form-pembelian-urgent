@extends('layouts.back')
@section('title','Dashboard | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-lg-4 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $daily_request->count() }}</h3>
                <p>Daily Request</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $monthly_request->count() }}</h3>
                <p>Monthly Request</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $yearly_request->count() }}</h3>
                <p>Yearly Request</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
        </div>
    </div>
</div>
@hasrole('user|buyer')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Report</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="far fa-envelope"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Approve</span>
                                <span class="info-box-number">{{ $approve->count() }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger"><i class="far fa-flag"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Not Approve</span>
                                <span class="info-box-number">{{ $not_approve->count() }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Need to Approve</span>
                                <span class="info-box-number">{{ $need_to_approve->count() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endhasrole
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Reason</h3>
            </div>
            <div class="card-body">
                <div class="chart">
                    <div id="barchart_values" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">Most Request</h3>
                <ul class="nav nav-pills ml-auto p-2">
                    <li class="nav-item"><a class="nav-link active" href="#tab_daily" data-toggle="tab">Daily</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_monthly" data-toggle="tab">Monthly</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_yearly" data-toggle="tab">Yearly</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_daily">
                        <canvas id="canvas-daily" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        <div class="table-responsive">
                            <table class="table table-bordered my-3" id="reason_daily">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Department</th>
                                        <th>Reason</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($donuts_daily_reason as $donut)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $donut->txtNamaDept }}</td>
                                        <td>{{ $donut->txtReason }}</td>
                                        <td>{{ $donut->total }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_monthly">
                        <canvas id="canvas-monthly" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                        </canvas>
                        <div class="table-responsive">
                            <table class="table table-bordered my-3" id="reason">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Department</th>
                                        <th>Reason</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($donuts_monthly_reason as $donut)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $donut->txtNamaDept }}</td>
                                        <td>{{ $donut->txtReason }}</td>
                                        <td>{{ $donut->total }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_yearly">
                        <canvas id="canvas-yearly" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        <div class="table-responsive">
                            <table class="table table-bordered my-3" id="reason_yearly">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Bulan</th>
                                        <th>Department</th>
                                        <th>Reason</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($donuts_yearly_reason as $donut)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date('M', strtotime($donut->dtmInsertedBy)); }}</td>
                                        <td>{{ $donut->txtNamaDept }}</td>
                                        <td>{{ $donut->txtReason }}</td>
                                        <td>{{ $donut->total }}</td>
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
@push('script-chart')
<script>
    !function(t,n,e,i){"use strict";function a(n,e){this.element=n,this.settings=t.extend({},o,e),this._defaults=o,this._name=s,this.init()}var s="rowspanizer",o={vertical_align:"top"};t.extend(a.prototype,{init:function(){var n=this,e=t(this.element),i=[];e.find("tr").each(function(n,e){t(this).find("td").each(function(n,e){var a=t(e),s=a.html();if("undefined"!=typeof i[n]&&"dato"in i[n]&&i[n].dato==s){var o=i[n].elem.data("rowspan");("undefined"==o||isNaN(o))&&(o=1),i[n].elem.data("rowspan",parseInt(o)+1).addClass("rowspan-combine"),a.addClass("rowspan-remove")}else i[n]={dato:s,elem:a}})}),t(".rowspan-combine").each(function(e,i){var a=t(this);a.attr("rowspan",a.data("rowspan")).css({"vertical-align":n.settings.vertical_align})}),t(".rowspan-remove").remove()}}),t.fn[s]=function(n){return this.each(function(){t.data(this,"plugin_"+s)||t.data(this,"plugin_"+s,new a(this,n))})}}(jQuery,window,document);
  $("#reason").rowspanizer({vertical_align: 'middle'});
  $("#reason_yearly").rowspanizer({vertical_align: 'middle'});
  $("#reason_daily").rowspanizer({vertical_align: 'middle'});
</script>
<script>
    var product = <?php echo $product; ?>;
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
        var data = google.visualization.arrayToDataTable(product);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
        { calc: "stringify",
        sourceColumn: 1,
        type: "string",
        role: "annotation" },
        2,3,4]);

        var options = {
        title: "Reason",
        legend: { position: "bottom" },
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("barchart_values"));
        chart.draw(view, options);
    }
</script>
<script>
    $(document).ready(function () {
                var donutChartCanvasDaily = $('#canvas-daily').get(0).getContext('2d')
                var donutData = {
                    labels: [
                        @forelse ($donuts_daily as $donut)
                            '{{$donut->txtNamaDept}}',
                        @empty
                        'Tidak ada data'
                        @endforelse
                    ],
                    datasets: [{
                        data: [
                            @forelse ($donuts_daily as $donut)
                                {{$donut->total}},
                            @empty
                            0
                            @endforelse
                        ],
                        backgroundColor: ['#1abc9c','#3498db','#9b59b6','#f1c40f','#e67e22','#e74c3c','#34495e','#2ecc71'
                        ],
                    }]
                }
                var donutOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                }
                new Chart(donutChartCanvasDaily, {
                    type: 'doughnut',
                    data: donutData,
                    options: donutOptions
                })

                var donutChartCanvasMonthly = $('#canvas-monthly').get(0).getContext('2d')
                var donutData = {
                    labels: [
                        @forelse ($donuts_monthly as $donut)
                            '{{$donut->txtNamaDept}}',
                        @empty
                        'Tidak ada data'
                        @endforelse
                    ],
                    datasets: [{
                        data: [
                            @forelse ($donuts_monthly as $donut)
                                {{$donut->total}},
                            @empty
                            0
                            @endforelse
                        ],
                        backgroundColor: ['#1abc9c','#3498db','#9b59b6','#f1c40f','#e67e22','#e74c3c','#34495e','#2ecc71'
                        ],
                    }]
                }
                var donutOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                }
                new Chart(donutChartCanvasMonthly, {
                    type: 'doughnut',
                    data: donutData,
                    options: donutOptions
                })

                var donutChartCanvasyearly = $('#canvas-yearly').get(0).getContext('2d')
                var donutData = {
                    labels: [
                        @forelse ($donuts_yearly as $donut)
                            '{{$donut->txtNamaDept}}',
                        @empty
                        'Tidak ada data'
                        @endforelse
                    ],
                    datasets: [{
                        data: [
                            @forelse ($donuts_yearly as $donut)
                                {{$donut->total}},
                            @empty
                            0
                            @endforelse
                        ],
                        backgroundColor: ['#1abc9c','#3498db','#9b59b6','#f1c40f','#e67e22','#e74c3c','#34495e','#2ecc71'
                        ],
                    }]
                }
                var donutOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                }
                new Chart(donutChartCanvasyearly, {
                    type: 'doughnut',
                    data: donutData,
                    options: donutOptions
                })
});

</script>
@endpush
@endsection
