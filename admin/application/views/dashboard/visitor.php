<?php
$this->load->view("template/header");
$this->load->view("template/topmenu");
$this->load->view("template/sidemenu");

?>

<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Dashboard Visitor</h4>
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

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-eye"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Hit Counter Minggu Lalu</span>
                                <span class="info-box-number">
                                    <span id="hitcounterlastweek">0</span>
                                    <small>Hit</small>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-eye"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Hit Counter Hari Ini</span>
                                <span class="info-box-number">
                                    <span id="hitcountertoday">0</span>
                                    <small>Hit</small>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">New Visitor Bulan Ini</span>
                                <span class="info-box-number">
                                    <span id="newvisitorthismonth">0</span>
                                    <small>Visitor</small>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Online Visitor</span>
                                <span class="info-box-number">
                                    <span id="onlinevisitor">0</span>
                                    <small>Visitor</small>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>



                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Hit Counter</h3>
                                    <!-- <a href="javascript:void(0);">View Report</a> -->
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg">Jumlah HIT: <span id="totalhit">0</span></span>
                                        <span>1 Bulan Terakhir</span>
                                    </p>
                                    <!-- <p class="ml-auto d-flex flex-column text-right">
                        <span class="text-success">
                          <i class="fas fa-arrow-up"></i> 12.5%
                        </span>
                        <span class="text-muted">Since last week</span>
                      </p> -->
                                </div>

                                <div class="position-relative mb-4">
                                    <canvas id="visitors-chart" height="200"></canvas>
                                </div>

                                <div class="d-flex flex-row justify-content-end">
                                    <span class="mr-2">
                                        <i class="fas fa-square text-primary"></i> Hit
                                    </span>

                                    <span>
                                        <i class="fas fa-square text-gray"></i> Average Hit
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-6">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">New Visitor</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg">New Visitor: <span id="totalnewvisitor">0</span></span>
                                        <span>Bulan <?php echo bulan(date('m')) ?></span>
                                    </p>
                                </div>

                                <div class="position-relative mb-4">
                                    <canvas id="sales-chart" height="200"></canvas>
                                </div>

                                <div class="d-flex flex-row justify-content-end">
                                    <span class="mr-2">
                                        <i class="fas fa-square text-primary"></i> New Visitor
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


<script>
    $(document).ready(function() {

        $.ajax({
                url: '<?php echo site_url("home/getinfobox") ?>',
                type: 'GET',
                dataType: 'json',
            })
            .done(function(resultinfo) {
                console.log(resultinfo);
                $('#hitcountertoday').html(resultinfo.hitcountertoday);
                $('#hitcounterlastweek').html(resultinfo.hitcounterlastweek);
                $('#newvisitorthismonth').html(resultinfo.newvisitorthismonth);
                $('#onlinevisitor').html(resultinfo.onlinevisitor);
            })
            .fail(function() {
                console.log("error");
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



        //  ============================================== grafik hit ==================================
        $.ajax({
                url: '<?php echo site_url("home/getgrafikhit") ?>',
                type: 'GET',
                dataType: 'json',
            })
            .done(function(resultgrafikhit) {
                // console.log(resultgrafikhit);
                $('#totalhit').html(resultgrafikhit.totalhit);
                var $visitorsChart = $('#visitors-chart')
                var visitorsChart = new Chart($visitorsChart, {
                    data: {
                        labels: resultgrafikhit.datatanggal,
                        datasets: [{
                                type: 'line',
                                data: resultgrafikhit.datahit,
                                backgroundColor: 'transparent',
                                borderColor: '#007bff',
                                pointBorderColor: '#007bff',
                                pointBackgroundColor: '#007bff',
                                fill: false
                                // pointHoverBackgroundColor: '#007bff',
                                // pointHoverBorderColor    : '#007bff'
                            },
                            {
                                type: 'line',
                                data: resultgrafikhit.dataaverage,
                                backgroundColor: 'tansparent',
                                borderColor: '#ced4da',
                                pointBorderColor: '#ced4da',
                                pointBackgroundColor: '#ced4da',
                                fill: false
                                // pointHoverBackgroundColor: '#ced4da',
                                // pointHoverBorderColor    : '#ced4da'
                            }
                        ]
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
                                    suggestedMax: 200
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



        //  ============================================== grafik new visitor ==================================

        $.ajax({
                url: '<?php echo site_url("home/getgraviknewvisitor") ?>',
                type: 'GET',
                dataType: 'json',
            })
            .done(function(resultgrafiknewvisitor) {
                console.log(resultgrafiknewvisitor);

                $('#totalnewvisitor').html(resultgrafiknewvisitor.totalnewvisitor);

                var $salesChart = $('#sales-chart')
                // eslint-disable-next-line no-unused-vars
                var salesChart = new Chart($salesChart, {
                    type: 'bar',
                    data: {
                        labels: resultgrafiknewvisitor.datatanggal,
                        datasets: [{
                            backgroundColor: '#007bff',
                            borderColor: '#007bff',
                            data: resultgrafiknewvisitor.datavisitor
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
                                ticks: ticksStyle
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
                console.log("error grafik new visitor");
            });



    })
</script>

</body>

</html>