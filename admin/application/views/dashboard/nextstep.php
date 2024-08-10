<?php
$this->load->view("template/header");
$this->load->view("template/topmenu");
$this->load->view("template/sidemenu");

?>

<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Dashboard Next Step</h4>
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
                    <div class="col-md-9">
                        <div class="row">
                            <?php
                            if ($rsMenunggu->num_rows() > 0) { ?>
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header border-0">
                                            <div class="d-flex justify-content-between">
                                                <h3 class="card-title"><i class="fa fa-bell"></i> <span>5</span> Notifikasi Pendaftaran Kelas</h3>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 text-md">
                                                    <?php

                                                    if ($rsMenunggu->num_rows() > 0) {
                                                        echo '<ul>';
                                                        foreach ($rsMenunggu->result() as $row) {
                                                            echo "<li><a href='" . site_url('konfirmasikelas/edit/') . $this->encrypt->encode($row->idregistrasi) . "'>" . since($row->tglregistrasi) . " An. " . $row->namalengkap . "</a></li>";
                                                        }
                                                        echo '</ul>';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header border-0">
                                        <div class="d-flex justify-content-between">
                                            <h3 class="card-title">Grafik Kelas</h3>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-flex">
                                                    <p class="d-flex flex-column">
                                                        <span class="text-bold text-lg">Membership Class: <i class="fa fa-user-friends text-success"></i> <span id="totalsiswa"> 0</span></span>
                                                        <span>12 Bulan Terakhir</span>
                                                    </p>
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

                                            <div class="col-6">
                                                <div class="d-flex">
                                                    <p class="d-flex flex-column">
                                                        <span class="text-bold text-lg">Fondation Class 1: <i class="fa fa-user-friends text-success"></i> <span id="totalsiswa2">0</span></span>
                                                        <span>12 Bulan Terakhir</span>
                                                    </p>
                                                </div>

                                                <div class="position-relative mb-4">
                                                    <canvas id="visitors-chart2" height="200"></canvas>
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

                                            <div class="col-6">
                                                <div class="d-flex">
                                                    <p class="d-flex flex-column">
                                                        <span class="text-bold text-lg">Fondation Class 2: <i class="fa fa-user-friends text-success"></i> <span id="totalsiswa3">0</span></span>
                                                        <span>12 Bulan Terakhir</span>
                                                    </p>
                                                </div>

                                                <div class="position-relative mb-4">
                                                    <canvas id="visitors-chart3" height="200"></canvas>
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

                                            <div class="col-6">
                                                <div class="d-flex">
                                                    <p class="d-flex flex-column">
                                                        <span class="text-bold text-lg">Fondation Class 3: <i class="fa fa-user-friends text-success"></i> <span id="totalsiswa4">0</span></span>
                                                        <span>12 Bulan Terakhir</span>
                                                    </p>
                                                </div>

                                                <div class="position-relative mb-4">
                                                    <canvas id="visitors-chart4" height="200"></canvas>
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
                                    <div class="card-footer">
                                        <a href="">Lihat grafik kelas selengkapnya...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">

                        <div class="col-12">
                            <a href="<?php echo site_url('registrasikelas/index/KL001') ?>">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-eye"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Membership Class</span>
                                        <span class="info-box-number">
                                            <span id="MembershipClass">0</span>
                                            <small></small>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-12">
                            <a href="<?php site_url('registrasikelas/index/KL002') ?>">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-eye"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Fondation Class 1</span>
                                        <span class="info-box-number">
                                            <span id="FondationClass1">0</span>
                                            <small></small>
                                        </span>
                                    </div>
                                </div>

                            </a>
                        </div>

                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12">
                            <a href="<?php echo site_url('registrasikelas/index/KL003') ?>">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Fondation Class 2</span>
                                        <span class="info-box-number">
                                            <span id="FondationClass2">0</span>
                                            <small>Visitor</small>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12">
                            <a href="<?php echo site_url('registrasikelas/index/KL004') ?>">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Fondation Class 3</span>
                                        <span class="info-box-number">
                                            <span id="FondationClass3">0</span>
                                            <small>Visitor</small>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12">
                            <a href="<?php echo site_url('registrasikelas/index/KL005') ?>">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Grade 1</span>
                                        <span class="info-box-number">
                                            <span id="Grade1">0</span>
                                            <small></small>
                                        </span>
                                    </div>
                                </div>

                            </a>
                        </div>
                        <div class="col-12">
                            <a href="<?php echo site_url('registrasikelas/index/KL006') ?>">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Grade 2</span>
                                        <span class="info-box-number">
                                            <span id="Grade2">0</span>
                                            <small></small>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12">
                            <a href="<?php echo site_url('registrasikelas/index/KL007') ?>">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Grade 3</span>
                                        <span class="info-box-number">
                                            <span id="Grade3">0</span>
                                            <small></small>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-12">
                            <a href="<?php echo site_url('registrasikelas/index/KL008') ?>">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Folunteer Class</span>
                                        <span class="info-box-number">
                                            <span id="FolunteerClass">0</span>
                                            <small></small>
                                        </span>
                                    </div>
                                </div>
                            </a>
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
                url: '<?php echo site_url("dashboardnextstep/getinfobox") ?>',
                type: 'GET',
                dataType: 'json',
            })
            .done(function(resultinfo) {
                console.log(resultinfo);

                $('#MembershipClass').html(resultinfo[0]['MembershipClass'])
                $('#FondationClass1').html(resultinfo[0]['FondationClass1'])
                $('#FondationClass2').html(resultinfo[0]['FondationClass2'])
                $('#FondationClass3').html(resultinfo[0]['FondationClass3'])
                $('#Grade1').html(resultinfo[0]['Grade1'])
                $('#Grade2').html(resultinfo[0]['Grade2'])
                $('#Grade3').html(resultinfo[0]['Grade3'])
                $('#FolunteerClass').html(resultinfo[0]['FolunteerClass'])
                $('#MarriageClass').html(resultinfo[0]['MarriageClass'])
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
                url: '<?php echo site_url("dashboardnextstep/getgrafikmembership") ?>',
                type: 'GET',
                dataType: 'json',
            })
            .done(function(resultgrafikhit) {
                console.log(resultgrafikhit);
                $('#totalsiswa').html(resultgrafikhit.totalsiswa);
                var $visitorsChart = $('#visitors-chart')
                var visitorsChart = new Chart($visitorsChart, {
                    data: {
                        labels: resultgrafikhit.datatanggal,
                        datasets: [{
                            type: 'bar',
                            data: resultgrafikhit.jumlahmurid,
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



        //  ============================================== grafik hit ==================================
        $.ajax({
                url: '<?php echo site_url("dashboardnextstep/getgrafikfc1") ?>',
                type: 'GET',
                dataType: 'json',
            })
            .done(function(resultgrafikhit) {
                console.log(resultgrafikhit);
                $('#totalsiswa2').html(resultgrafikhit.totalsiswa);
                var $visitorsChart = $('#visitors-chart2')
                var visitorsChart = new Chart($visitorsChart, {
                    data: {
                        labels: resultgrafikhit.datatanggal,
                        datasets: [{
                            type: 'bar',
                            data: resultgrafikhit.jumlahmurid,
                            backgroundColor: '#e055c7',
                            borderColor: '#0d17e8',
                            pointBorderColor: '#0d17e8',
                            pointBackgroundColor: '#0d17e8',
                            fill: false
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


        //  ============================================== grafik hit ==================================
        $.ajax({
                url: '<?php echo site_url("dashboardnextstep/getgrafikfc2") ?>',
                type: 'GET',
                dataType: 'json',
            })
            .done(function(resultgrafikhit) {
                console.log(resultgrafikhit);
                $('#totalsiswa3').html(resultgrafikhit.totalsiswa);
                var $visitorsChart = $('#visitors-chart3')
                var visitorsChart = new Chart($visitorsChart, {
                    data: {
                        labels: resultgrafikhit.datatanggal,
                        datasets: [{
                            type: 'bar',
                            data: resultgrafikhit.jumlahmurid,
                            backgroundColor: '#7ae055',
                            borderColor: '#ced4da',
                            pointBorderColor: '#ced4da',
                            pointBackgroundColor: '#ced4da',
                            fill: false
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



        //  ============================================== grafik hit ==================================
        $.ajax({
                url: '<?php echo site_url("dashboardnextstep/getgrafikfc3") ?>',
                type: 'GET',
                dataType: 'json',
            })
            .done(function(resultgrafikhit) {
                console.log('yg ini');
                console.log(resultgrafikhit);
                $('#totalsiswa4').html(resultgrafikhit.totalsiswa);
                var $visitorsChart = $('#visitors-chart4')
                var visitorsChart = new Chart($visitorsChart, {
                    data: {
                        labels: resultgrafikhit.datatanggal,
                        datasets: [{
                            type: 'bar',
                            data: resultgrafikhit.jumlahmurid,
                            backgroundColor: '#e08655',
                            borderColor: '#ced4da',
                            pointBorderColor: '#ced4da',
                            pointBackgroundColor: '#ced4da',
                            fill: false
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