<?php
$this->load->view("template/header");
$this->load->view("template/topmenu");
$this->load->view("template/sidemenu");
?>

<style>
  .text-very-small{
    font-size: 12px;
  }


  .li-riwayat li:hover{
    background-color: #5DC15D;
    color: white !important;
  }

</style>
  <div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2"><img src="<?php echo (base_url('images/sonar-logo.png')) ?>" alt="" style="width: 30px;"> SISTEM INFORMASI MANAGEMENT PROJECT (SONAR)</h4>
    </div>
    <div class="col-6 mb-2">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">&nbsp;</li>
      </ol>

    </div>
  </div>

  <div class="row" id="toni-content">

    <div class="col-md-12 mt-3">
      <div class="row">



        <div class="col-3">
          <!-- Info Boxes Style 2 -->
          <div class="info-box mb-3 bg-warning">
            <span class="info-box-icon"><i class="fas fa-box"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Proyek</span>
              <span class="info-box-number"><?php echo $jumlahProyek ?> Proyek</span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </div>

        <div class="col-3">
          <!-- /.info-box -->
          <div class="info-box mb-3 bg-info">
            <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Semua Tugas</span>
              <span class="info-box-number"><?php echo $jumlahTugas ?> Tugas</span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </div>

        <div class="col-3">
          <!-- /.info-box -->
          <div class="info-box mb-3 bg-danger">
            <span class="info-box-icon"><i class="fas fa-calendar-times"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tugas Belum Selesai</span>
              <span class="info-box-number"><?php echo $jumlahTugasBelumSelesai ?> Tugas</span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </div>

        <div class="col-3">
          <!-- /.info-box -->
          <div class="info-box mb-3 bg-success">
            <span class="info-box-icon"><i class="far fa-calendar-check"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tugas Sudah Selesai</span>
              <span class="info-box-number"><?php echo $jumlahTugasSelesai ?> Tugas</span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </div>



      </div>
    </div>


    <div class="col-md-6">
      <div class="card" id="cardcontent">
        <div class="card-body">

          <div class="row">


            <div class="col-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title text-white">Person In Charge (PIC)</h3>

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
                  <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                <!-- /.card-body -->
              </div>
            </div>

            <div class="col-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title text-white">Pembuat Task</h3>

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
                  <canvas id="pieChartPembuatTask" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                <!-- /.card-body -->
              </div>
            </div>



          </div>

        </div> <!-- ./card-body -->
      </div> <!-- /.card -->
    </div> <!-- /.col -->

    <div class="col-md-6">
      <div class="card">
        <div class="card-body" style="min-height: 700px;">
          <div class="row">
            <div class="col-12">
              <h4 class="text-gray mb-3">Riwayat Tugas</h4>
            </div>


            <div class="col-12">

              <ul class="list-group">

                <?php
$rsriwayat = $this->db->query("select * from riwayattask order by tglriwayat desc limit 10");
if ($rsriwayat->num_rows() > 0) {
    foreach ($rsriwayat->result() as $row) {
        echo '
          <a href="' . site_url($row->linkurl) . '" class="li-riwayat"><li class="list-group-item text-very-small text-dark">' . $row->deskripsi . ' <span class="text-info">(' . berapawaktuyanglalu($row->tglriwayat) . ')</span></li></a>';
    }
}
?>

              </ul>

            </div>

            <div class="col-12 mt-3 text-right">
              <a href="<?php echo site_url('riwayattask') ?>">Lihat Selengkapnya</a>
            </div>

          </div>



        </div>
      </div>
    </div>





    <div class="col-md-12">
      <div class="card" id="cardcontent">
        <div class="card-header">
          <h5 class="card-title">Tugas Baru</h5>
        </div>
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

            <div class="col-md-12">
              <div class="form-check form-check-inline">
                <input class="form-check-input jenisdata" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="SemuaTugas" checked>
                <label class="form-check-label" for="inlineRadio1">Semua PIC</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input jenisdata" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="TugasSaya" <?php echo ($this->session->userdata('jabatan') == 'Project Manager') ? 'disabled=""' : '' ?> >
                <label class="form-check-label" for="inlineRadio2">PIC hanya saya</label>
              </div>
            </div>
            <div class="col-md-12">
              <!-- datatable -->
              <div class="table-responsive">
                <table class="table" id="table">
                  <thead>
                    <tr>
                      <th style="width: 5%; text-align: center;">No</th>
                      <th style="text-align: center;">Judul Tugas</th>
                      <th style="text-align: center;">Tanggal Mulai/<br>Tanggal Selesai</th>
                      <th style="text-align: center;">PIC</th>
                      <th style="text-align: center;">Assignment</th>
                      <th style="text-align: center;">Status Tugas</th>
                      <th style="text-align: center; width: 15%;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>

            </div>



          </div> <!-- /.row -->
        </div> <!-- ./card-body -->
      </div> <!-- /.card -->
    </div> <!-- /.col -->

  </div> <!-- /.row -->
  <!-- Main row -->



<?php $this->load->view("template/footer")?>

<script>


    var table;
    var jenisdata = "SemuaTugas";

    $(document).ready(function() {

      //defenisi datatable
      table = $("#table").DataTable({
          "select": true,
          "lengthChange": false,
          "processing": true,
          "serverSide": true,
          "order": [],
           "ajax": {
              "url": "<?php echo site_url('home/datatabletask') ?>",
              "type": "POST",
              "data": function ( d ) {
                  d.jenisdata = jenisdata;
                  // etc
              }
          },
          "columnDefs": [
                          { "targets": [ 0 ], "orderable": false, "className": "dt-body-center" },
                          { "targets": [ 1 ], "className": "dt-body-left" },
                          { "targets": [ 2 ], "className": "dt-body-center" },
                          { "targets": [ 3 ], "className": "dt-body-center" },
                          { "targets": [ 4 ], "className": "dt-body-center" },
                          { "targets": [ 5 ], "className": "dt-body-center" },
                          { "targets": [ 6 ], "orderable": false, "className": "dt-body-center" },
          ],

      });

    }); //end (document).ready


    $.ajax({
      url: '<?php echo site_url("home/getChartAllTask") ?>',
      dataType: 'json',
    })
    .done(function(resultAllTask) {
      console.log(resultAllTask);

      var donutData        = {
                                labels: resultAllTask.dataNama,
                                datasets: [
                                  {
                                    data: resultAllTask.dataJumlah,
                                    backgroundColor : resultAllTask.dataColor,
                                  }
                                ]
                              }

        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData        = donutData;
        var pieOptions     = {
          maintainAspectRatio : false,
          responsive : true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(pieChartCanvas, {
          type: 'pie',
          data: pieData,
          options: pieOptions
        })

    })
    .fail(function() {
      console.log("error");
    });


    $.ajax({
      url: '<?php echo site_url("home/getChartAllPembuatTask") ?>',
      dataType: 'json',
    })
    .done(function(resultAllTask) {
      console.log(resultAllTask);

      var donutData        = {
                                labels: resultAllTask.dataNama,
                                datasets: [
                                  {
                                    data: resultAllTask.dataJumlah,
                                    backgroundColor : resultAllTask.dataColor,
                                  }
                                ]
                              }

        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChartPembuatTask').get(0).getContext('2d')
        var pieData        = donutData;
        var pieOptions     = {
          maintainAspectRatio : false,
          responsive : true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(pieChartCanvas, {
          type: 'pie',
          data: pieData,
          options: pieOptions
        })

    })
    .fail(function() {
      console.log("error");
    });


    $('.jenisdata').click(function() {
      jenisdata = $(this).val();
      $("#table").DataTable().draw();
      // console.log('val '+$(this).val());

    });

</script>
</body>
</html>

