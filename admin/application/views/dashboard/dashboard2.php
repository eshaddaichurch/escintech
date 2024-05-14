<?php
$this->load->view("template/header");
$this->load->view("template/topmenu");
$this->load->view("template/sidemenu");

?>

<div class="row" id="toni-breadcrumb">
  <div class="col-6">
    <h4 class="text-dark mt-2">Dashboard Kehadiran</h4>
  </div>
  <div class="col-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item active">Dashboard Kehadiran</li>
    </ol>

  </div>
</div>

<div class="row" id="toni-content">
  <div class="col-md-12">
    <div class="card" id="cardcontent">
      <div class="card-body">


        <div class="row">



          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Kehadiran<br>Bulan Lalu</span>
                <span class="info-box-number">
                  <span id="kehadiranbulanlalu">0</span>
                  <small>Jemaat</small>
                </span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-percentage"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Kenaikan/Penurunan<br>Bulan Lalu</span>
                <span class="info-box-number" id="kenaikanbulanlaluPersen">
                  <span id="kenaikanbulanlalu">100</span>
                  <small>%</small>
                </span>
              </div>
            </div>
          </div>



          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Kehadiaran<br>Bulan Ini</span>
                <span class="info-box-number">
                  <span id="kehadiranbulanini">0</span>
                  <small>Jemaat</small>
                </span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-percentage"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Kenaikan/Penurunan<br>Bulan ini</span>
                <span class="info-box-number" id="kenaikanbulaniniPersen">
                  <span id="kenaikanbulanini">0</span>
                  <small>%</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>


          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="row">


                  <div class="col-12 mb-3">

                    <div class="card card-body shadow">
                      <div class="row">

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Jenis Absen</label>
                            <select name="idabsenjenis" id="idabsenjenis" class="form-control">
                              <?php
                              $rsAbsenJenis = $this->db->query("select * from absenjenis where statusaktif='Aktif' order by idabsenjenis");
                              if ($rsAbsenJenis->num_rows() > 0) {
                                foreach ($rsAbsenJenis->result() as $row) {
                                  echo '
                                          <option value="' . $row->idabsenjenis . '">' . $row->namaabsenjenis . '</option>
                                        ';
                                }
                              }
                              ?>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-12">
                              <label for="">Periode</label>
                            </div>
                            <div class="col-5">
                              <input type="date" name="tglawal" id="tglawal" class="form-control" value="<?php echo date('Y-m-01') ?>">
                            </div>
                            <div class="col-1 text-center">
                              S/D
                            </div>
                            <div class="col-5">
                              <input type="date" name="tglakhir" id="tglakhir" class="form-control" value="<?php echo date('Y-m-t') ?>">
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>

                  </div>


                  <div class="col-lg-6">
                    <div class="card">
                      <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                          <h3 class="card-title">Grafik Kehadiran Jemaat</h3>
                          <!-- <a href="javascript:void(0);">View Report</a> -->
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="d-flex">
                          <p class="d-flex flex-column">
                            <span class="text-bold text-lg">Rata-rata Kehadiran: <span id="totalhit">0</span></span>
                            <span id="jumlahi">0 Minggu</span>
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
                            <i class="fas fa-square" style="color: #007bff;"></i> Ibadah I
                          </span>

                          <span class="mr-2">
                            <i class="fas fa-square" style="color: #27D18B;"></i> Ibadah II
                          </span>
                          <span class="mr-2">
                            <i class="fas fa-square" style="color: #EAC575;"></i> Ibadah III
                          </span>
                          <span class="mr-2">
                            <i class="fas fa-square" style="color: #D31D48;"></i> Ibadah IV
                          </span>
                          <span class="mr-2">
                            <i class="fas fa-square" style="color: #FF5F00;"></i> Ibadah V
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="col-6" style="display: none;">
                    <div class="card">
                      <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                          <h3 class="card-title">Persentasi Kenaikan/Penurunan Kehadiran Jemaat</h3>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="d-flex">
                          <p class="d-flex flex-column">
                            <span class="text-bold text-lg">Rata-rata Kenaikan/Penurunan: <span id="totalnewvisitor">0%</span></span>
                            <span>6 Bulan Terakhir</span>
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


                  <div class="col-6">
                    <div class="card">
                      <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                          <h3 class="card-title">Grafik Total Kehadiran Jemaat</h3>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="d-flex">
                          <p class="d-flex flex-column">
                            <span class="text-bold text-lg">Rata-rata Total Kehadiran: <span id="totalnewvisitor">0</span> Jemaat</span>
                            <span>6 Bulan Terakhir</span>
                          </p>
                        </div>

                        <div class="position-relative mb-4">
                          <canvas id="total-kehadiran-chart" height="200"></canvas>
                        </div>

                        <div class="d-flex flex-row justify-content-end">
                          <span class="mr-2">
                            <i class="fas fa-square text-primary"></i> Total Kehadiran
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="col-1">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12 text-center">
                            <label for=""><i class="fa fa-users text-primary"></i></label>
                          </div>
                          <div class="col-12 text-center">
                            <span class="font-weight-bold" id="jumlah01">0</span>
                          </div>
                          <div class="col-12 text-center">
                            <span class="text-muted">Jan</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-1">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12 text-center">
                            <label for=""><i class="fa fa-users text-primary"></i></label>
                          </div>
                          <div class="col-12 text-center">
                            <span class="font-weight-bold" id="jumlah02">0</span>
                          </div>
                          <div class="col-12 text-center">
                            <span class="text-muted">Feb</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-1">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12 text-center">
                            <label for=""><i class="fa fa-users text-primary"></i></label>
                          </div>
                          <div class="col-12 text-center">
                            <span class="font-weight-bold" id="jumlah03">0</span>
                          </div>
                          <div class="col-12 text-center">
                            <span class="text-muted">Mar</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-1">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12 text-center">
                            <label for=""><i class="fa fa-users text-primary"></i></label>
                          </div>
                          <div class="col-12 text-center">
                            <span class="font-weight-bold" id="jumlah04">0</span>
                          </div>
                          <div class="col-12 text-center">
                            <span class="text-muted">Apr</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-1">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12 text-center">
                            <label for=""><i class="fa fa-users text-primary"></i></label>
                          </div>
                          <div class="col-12 text-center">
                            <span class="font-weight-bold" id="jumlah05">0</span>
                          </div>
                          <div class="col-12 text-center">
                            <span class="text-muted">Mei</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-1">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12 text-center">
                            <label for=""><i class="fa fa-users text-primary"></i></label>
                          </div>
                          <div class="col-12 text-center">
                            <span class="font-weight-bold" id="jumlah06">0</span>
                          </div>
                          <div class="col-12 text-center">
                            <span class="text-muted">Jun</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-1">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12 text-center">
                            <label for=""><i class="fa fa-users text-primary"></i></label>
                          </div>
                          <div class="col-12 text-center">
                            <span class="font-weight-bold" id="jumlah07">0</span>
                          </div>
                          <div class="col-12 text-center">
                            <span class="text-muted">Jul</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-1">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12 text-center">
                            <label for=""><i class="fa fa-users text-primary"></i></label>
                          </div>
                          <div class="col-12 text-center">
                            <span class="font-weight-bold" id="jumlah08">0</span>
                          </div>
                          <div class="col-12 text-center">
                            <span class="text-muted">Ags</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-1">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12 text-center">
                            <label for=""><i class="fa fa-users text-primary"></i></label>
                          </div>
                          <div class="col-12 text-center">
                            <span class="font-weight-bold" id="jumlah09">0</span>
                          </div>
                          <div class="col-12 text-center">
                            <span class="text-muted">Sep</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-1">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12 text-center">
                            <label for=""><i class="fa fa-users text-primary"></i></label>
                          </div>
                          <div class="col-12 text-center">
                            <span class="font-weight-bold" id="jumlah10">0</span>
                          </div>
                          <div class="col-12 text-center">
                            <span class="text-muted">Okt</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-1">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12 text-center">
                            <label for=""><i class="fa fa-users text-primary"></i></label>
                          </div>
                          <div class="col-12 text-center">
                            <span class="font-weight-bold" id="jumlah11">0</span>
                          </div>
                          <div class="col-12 text-center">
                            <span class="text-muted">Nov</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-1">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12 text-center">
                            <label for=""><i class="fa fa-users text-primary"></i></label>
                          </div>
                          <div class="col-12 text-center">
                            <span class="font-weight-bold" id="jumlah12">0</span>
                          </div>
                          <div class="col-12 text-center">
                            <span class="text-muted">Des</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

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

    loadInfoBox();
    loadGrafik();





  });



  $('#tglawal').change(function(e) {
    loadGrafik();
  });
  $('#tglakhir').change(function(e) {
    loadGrafik();
  });
  $('#idabsenjenis').change(function(e) {
    loadGrafik();
  });

  function loadInfoBox() {

    //INFO BOX
    $.ajax({
        url: '<?php echo site_url("dashboard2/getinfobox") ?>',
        type: 'GET',
        dataType: 'json',
      })
      .done(function(resultinfo) {
        // console.log(resultinfo);
        $('#kehadiranbulanini').html(numberWithCommas(resultinfo.kehadiranbulanini));
        $('#kehadiranbulanlalu').html(numberWithCommas(resultinfo.kehadiranbulanlalu));
        $('#kenaikanbulanlalu').html(resultinfo.kenaikanbulanlalu);
        $('#kenaikanbulanini').html(resultinfo.kenaikanbulanini);
        if (parseInt(resultinfo.kenaikanbulanini) < 0) {
          $('#kenaikanbulaniniPersen').addClass('text-danger');
        } else {
          $('#kenaikanbulaniniPersen').addClass('text-success');
        }

        if (parseInt(resultinfo.kenaikanbulanlalu) < 0) {
          $('#kenaikanbulanlaluPersen').addClass('text-danger');
        } else {
          $('#kenaikanbulanlaluPersen').addClass('text-success');
        }
      })
      .fail(function() {
        console.log("error");
      });

  }

  function loadGrafik() {

    var idabsenjenis = $('#idabsenjenis').val();
    var tglawal = $('#tglawal').val();
    var tglakhir = $('#tglakhir').val();

    var ticksStyle = {
      fontColor: '#495057',
      fontStyle: 'bold'
    }

    var mode = 'index'
    var intersect = true



    //  ============================================== grafik hit ==================================
    $.ajax({
        url: '<?php echo site_url("dashboard2/getgrafikabsen") ?>',
        type: 'GET',
        dataType: 'json',
        data: {
          'idabsenjenis': idabsenjenis,
          'tglawal': tglawal,
          'tglakhir': tglakhir
        },
      })
      .done(function(getgrafikabsenResult) {
        console.log(getgrafikabsenResult);
        $('#totalhit').html(getgrafikabsenResult.jumlahPerMinggu + ' Jemaat');
        $('#jumlahi').html(getgrafikabsenResult.jumlahi + ' Minggu');

        var $visitorsChart = $('#visitors-chart')
        var visitorsChart = new Chart($visitorsChart, {
          data: {
            labels: getgrafikabsenResult.datatanggal,
            datasets: [{
                type: 'line',
                data: getgrafikabsenResult.datahadiribadah1,
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
                data: getgrafikabsenResult.datahadiribadah2,
                backgroundColor: 'tansparent',
                borderColor: '#27D18B',
                pointBorderColor: '#27D18B',
                pointBackgroundColor: '#27D18B',
                fill: false
                // pointHoverBackgroundColor: '#27D18B',
                // pointHoverBorderColor    : '#27D18B'
              },
              {
                type: 'line',
                data: getgrafikabsenResult.datahadiribadah3,
                backgroundColor: 'tansparent',
                borderColor: '#EAC575',
                pointBorderColor: '#EAC575',
                pointBackgroundColor: '#EAC575',
                fill: false
                // pointHoverBackgroundColor: '#EAC575',
                // pointHoverBorderColor    : '#EAC575'
              },
              {
                type: 'line',
                data: getgrafikabsenResult.datahadiribadah4,
                backgroundColor: 'tansparent',
                borderColor: '#D31D48',
                pointBorderColor: '#D31D48',
                pointBackgroundColor: '#D31D48',
                fill: false
                // pointHoverBackgroundColor: '#D31D48',
                // pointHoverBorderColor    : '#D31D48'
              },
              {
                type: 'line',
                data: getgrafikabsenResult.datahadiribadah5,
                backgroundColor: 'tansparent',
                borderColor: '#FF5F00',
                pointBorderColor: '#FF5F00',
                pointBackgroundColor: '#FF5F00',
                fill: false
                // pointHoverBackgroundColor: '#D31D48',
                // pointHoverBorderColor    : '#D31D48'
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


        var $totalKehadiranChart = $('#total-kehadiran-chart');
        var totalKehadiranChart = new Chart($totalKehadiranChart, {
          data: {
            labels: getgrafikabsenResult.datatanggal,
            datasets: [{
              type: 'line',
              data: getgrafikabsenResult.datatotalhadiribadah,
              backgroundColor: 'transparent',
              borderColor: '#007bff',
              pointBorderColor: '#007bff',
              pointBackgroundColor: '#007bff',
              fill: false
              // pointHoverBackgroundColor: '#007bff',
              // pointHoverBorderColor    : '#007bff'
            }, ]
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
        });


        if (getgrafikabsenResult.jumlahPerbulan.length > 0) {
          var jumlahPerbulan = getgrafikabsenResult.jumlahPerbulan;
          $('#jumlah01').html(jumlahPerbulan[0]['jumlah01']);
          $('#jumlah02').html(jumlahPerbulan[0]['jumlah02']);
          $('#jumlah03').html(jumlahPerbulan[0]['jumlah03']);
          $('#jumlah04').html(jumlahPerbulan[0]['jumlah04']);
          $('#jumlah05').html(jumlahPerbulan[0]['jumlah05']);
          $('#jumlah06').html(jumlahPerbulan[0]['jumlah06']);
          $('#jumlah07').html(jumlahPerbulan[0]['jumlah07']);
          $('#jumlah08').html(jumlahPerbulan[0]['jumlah08']);
          $('#jumlah09').html(jumlahPerbulan[0]['jumlah09']);
          $('#jumlah10').html(jumlahPerbulan[0]['jumlah10']);
          $('#jumlah11').html(jumlahPerbulan[0]['jumlah11']);
          $('#jumlah12').html(jumlahPerbulan[0]['jumlah12']);
        }

      })
      .fail(function() {
        console.log("error getgrafikabsen");
      });






    //  ============================================== grafik persentase naik turun ==================================

    $.ajax({
        url: '<?php echo site_url("dashboard2/getpersentase") ?>',
        type: 'GET',
        dataType: 'json',
        data: {
          'idabsenjenis': idabsenjenis,
          'tglawal': tglawal,
          'tglakhir': tglakhir
        },
      })
      .done(function(getpersentaseResult) {
        // console.log(getpersentaseResult);

        if (parseInt(getpersentaseResult.ratarata) < 0) {
          $('#totalnewvisitor').html(format_decimal(getpersentaseResult.ratarata, 2) + '%');
          $('#totalnewvisitor').addClass('text-danger');
        } else {
          $('#totalnewvisitor').html('+' + format_decimal(getpersentaseResult.ratarata, 2) + '%');
          $('#totalnewvisitor').addClass('text-success');
        }

        var $salesChart = $('#sales-chart')


        var salesChart = new Chart($salesChart, {
          data: {
            labels: getpersentaseResult.datatanggal,
            datasets: [{
              type: 'line',
              data: getpersentaseResult.datapersentase,
              backgroundColor: 'transparent',
              borderColor: '#08E0F3',
              pointBorderColor: '#08E0F3',
              pointBackgroundColor: '#08E0F3',
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
        console.log("error pesentase");
      });



  }
</script>

</body>

</html>