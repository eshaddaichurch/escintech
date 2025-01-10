<?php
$this->load->view("template/header");
$this->load->view("template/topmenu");
$this->load->view("template/sidemenu");

?>

<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Dashboard Care</h4>
    </div>
    <div class="col-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

    </div>
</div>

<div class="row" id="toni-content">
    <div class="col-md-12">
        <div class="card" id="cardcontent">
            <div class="card-body">


                <div class="row">

                    <div class="col-md-12">
                        <?php
                        $pesan = $this->session->flashdata("pesan");
                        if (!empty($pesan)) {
                            echo $pesan;
                        }
                        ?>
                    </div>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3 class="jumlahjemaatbaru">0</h3>

                                <p>Jemaat Baru</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3 class="jumlahjemaatsemua">0</h3>

                                <p>Jumlah Jemaat</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                        </div>
                    </div>

                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3 class="jumlahjemaatsimpatisan">0</h3>

                                <p>Jumlah Simpatisan</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                        </div>
                    </div>

                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3 class="jumlahjemaatsudahdibaptis">0</h3>

                                <p>Sudah Di Baptis</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                        </div>
                    </div>



                    <!-- ./col -->
                    <div class="col-lg-3 col-6" style="display: none;">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3 class="jumlahjemaatumum">0</h3>

                                <p>Jumlah Pengunjung Umum</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title text-light">Grafik Jemaat Baru</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="pieChart" style="min-height: 250px; height: 350px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Jemaat Baru</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg">Jumlah: <span id="lbljemaatbaru">0</span></span>
                                        <span>Tahun <?php echo date('Y') ?></span>
                                    </p>
                                </div>

                                <div class="position-relative mb-4">
                                    <canvas id="grafikjemaatbaru" height="200"></canvas>
                                </div>

                                <div class="d-flex flex-row justify-content-end">
                                    <span class="mr-2">
                                        <i class="fas fa-square text-primary"></i> Jumlah Jemaat
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Marriage Class</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg">Jumlah: <span id="lblmarriage">0</span></span>
                                        <span>Bulan <?php echo bulan(date('m')) ?></span>
                                    </p>
                                </div>

                                <div class="position-relative mb-4">
                                    <canvas id="grafikmarriage" height="200"></canvas>
                                </div>

                                <div class="d-flex flex-row justify-content-end">
                                    <span class="mr-2">
                                        <i class="fas fa-square text-primary"></i> Jumlah Jemaat
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Jemaat Di Baptis <?php date('Y') ?></h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg">Jumlah: <span id="lblbaptis">0</span></span>
                                        <span>Tahun <?php echo date('Y') ?></span>
                                    </p>
                                </div>

                                <div class="position-relative mb-4">
                                    <canvas id="grafikbaptis" height="200"></canvas>
                                </div>

                                <div class="d-flex flex-row justify-content-end">
                                    <span class="mr-2">
                                        <i class="fas fa-square text-primary"></i> Jumlah Jemaat
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>






                </div>


            </div> <!-- ./card-body -->

        </div> <!-- /.card -->
    </div> <!-- /.col -->
</div> <!-- /.row -->
<!-- Main row -->




<?php $this->load->view("template/footer") ?>


<!-- ChartJS -->
<script src="<?php echo (base_url()) ?>assets/adminlte/plugins/chart.js/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script>


<script>
    $(document).ready(function() {

        $.ajax({
                url: '<?php echo site_url("dashboardcare/getinfobox") ?>',
                type: 'GET',
                dataType: 'json',
            })
            .done(function(resultinfo) {
                // console.log(resultinfo);
                $('.jumlahjemaatbaru').html(resultinfo.jumlahjemaatbaru);
                $('.jumlahjemaatsemua').html(resultinfo.jumlahjemaatsemua);
                $('.jumlahjemaatsimpatisan').html(resultinfo.jumlahjemaatsimpatisan);
                $('.jumlahjemaatumum').html(resultinfo.jumlahjemaatumum);
                $('.jumlahjemaatsudahdibaptis').html(resultinfo.jumlahjemaatbaptis);
            })
            .fail(function() {
                console.log("error getinfobox");
            });

    });

    $(function() {
        'use strict'

        var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
        }

        var mode = 'index'
        var intersect = true




        $.ajax({
                url: '<?php echo site_url("dashboardcare/getgrafikjemaatbaru") ?>',
                type: 'GET',
                dataType: 'json',
            })
            .done(function(resultgrafikhit) {
                // console.log(resultgrafikhit);

                var donutData = {
                    labels: resultgrafikhit.datatanggal,
                    datasets: [{
                        data: resultgrafikhit.jumlahjemaat,
                        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                    }]
                }

                var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
                var pieData = donutData;
                var pieOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                    plugins: {
                        labels: [{
                            render: 'label',
                            position: 'outside'
                        }, {
                            render: 'value'
                        }]
                    }

                }

                new Chart(pieChartCanvas, {
                    type: 'pie',
                    data: pieData,
                    options: pieOptions
                })


            })
            .fail(function() {
                console.log("error grafik hit");
            });




        $.ajax({
                url: '<?php echo site_url("dashboardcare/getgrafikjemaatbaru") ?>',
                type: 'GET',
                dataType: 'json',
            })
            .done(function(resultgrafikhit) {
                // console.log(resultgrafikhit);
                $('#lbljemaatbaru').html(resultgrafikhit.totaljemaat);
                var $grafikjemaatbaru = $('#grafikjemaatbaru')
                var visitorsChart = new Chart($grafikjemaatbaru, {
                    data: {
                        labels: resultgrafikhit.datatanggal,
                        datasets: [{
                            type: 'bar',
                            data: resultgrafikhit.jumlahjemaat,
                            backgroundColor: '#557ae0',
                            borderColor: '#557ae0',
                            pointBorderColor: '#557ae0',
                            pointBackgroundColor: '#557ae0',
                            fill: true
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        tooltips: {
                            mode: mode,
                            intersect: intersect
                        },
                        hover: {
                            mode: mode,
                            intersect: intersect
                        },
                        legend: {
                            display: false
                        },
                        scales: {
                            yAxes: [{
                                // display: false,
                                gridLines: {
                                    display: true,
                                    lineWidth: '4px',
                                    color: 'rgba(0, 0, 0, .2)',
                                    zeroLineColor: 'transparent'
                                },
                                ticks: $.extend({
                                    beginAtZero: true,
                                    suggestedMax: 10
                                }, ticksStyle)
                            }],
                            xAxes: [{
                                display: true,
                                gridLines: {
                                    display: false
                                },
                                ticks: ticksStyle
                            }]
                        }
                    }
                })

            })
            .fail(function() {
                console.log("error grafik hit");
            });



        $.ajax({
                url: '<?php echo site_url("dashboardcare/getgrafikmarriage") ?>',
                type: 'GET',
                dataType: 'json',
            })
            .done(function(resultgrafikhit) {
                // console.log(resultgrafikhit);
                $('#lblmarriage').html(resultgrafikhit.totaljemaat);
                var $grafikmarriage = $('#grafikmarriage')
                var visitorsChart = new Chart($grafikmarriage, {
                    data: {
                        labels: resultgrafikhit.datatanggal,
                        datasets: [{
                            type: 'bar',
                            data: resultgrafikhit.jumlahjemaat,
                            backgroundColor: '#557ae0',
                            borderColor: '#557ae0',
                            pointBorderColor: '#557ae0',
                            pointBackgroundColor: '#557ae0',
                            fill: true
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        tooltips: {
                            mode: mode,
                            intersect: intersect
                        },
                        hover: {
                            mode: mode,
                            intersect: intersect
                        },
                        legend: {
                            display: false
                        },
                        scales: {
                            yAxes: [{
                                // display: false,
                                gridLines: {
                                    display: true,
                                    lineWidth: '4px',
                                    color: 'rgba(0, 0, 0, .2)',
                                    zeroLineColor: 'transparent'
                                },
                                ticks: $.extend({
                                    beginAtZero: true,
                                    suggestedMax: 10
                                }, ticksStyle)
                            }],
                            xAxes: [{
                                display: true,
                                gridLines: {
                                    display: false
                                },
                                ticks: ticksStyle
                            }]
                        }
                    }
                })

            })
            .fail(function() {
                console.log("error grafik hit");
            });


        $.ajax({
                url: '<?php echo site_url("dashboardcare/getgrafikbaptis") ?>',
                type: 'GET',
                dataType: 'json',
            })
            .done(function(resultgrafikbaptis) {
                console.log(resultgrafikbaptis);
                $('#lblbaptis').html(resultgrafikbaptis.totaljemaat);
                var $grafikbaptis = $('#grafikbaptis')
                var visitorsChart = new Chart($grafikbaptis, {
                    data: {
                        labels: resultgrafikbaptis.datatanggal,
                        datasets: [{
                            type: 'bar',
                            data: resultgrafikbaptis.jumlahjemaat,
                            backgroundColor: '#557ae0',
                            borderColor: '#557ae0',
                            pointBorderColor: '#557ae0',
                            pointBackgroundColor: '#557ae0',
                            fill: true
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        tooltips: {
                            mode: mode,
                            intersect: intersect
                        },
                        hover: {
                            mode: mode,
                            intersect: intersect
                        },
                        legend: {
                            display: false
                        },
                        scales: {
                            yAxes: [{
                                // display: false,
                                gridLines: {
                                    display: true,
                                    lineWidth: '4px',
                                    color: 'rgba(0, 0, 0, .2)',
                                    zeroLineColor: 'transparent'
                                },
                                ticks: $.extend({
                                    beginAtZero: true,
                                    suggestedMax: 10
                                }, ticksStyle)
                            }],
                            xAxes: [{
                                display: true,
                                gridLines: {
                                    display: false
                                },
                                ticks: ticksStyle
                            }]
                        }
                    }
                })

            })
            .fail(function() {
                console.log("error grafik hit");
            });




    })
</script>

</body>

</html>