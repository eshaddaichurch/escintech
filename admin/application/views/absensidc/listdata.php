  <?php
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");
  ?>

  <style>
    .card-dc {
      padding-top: 10px;
    }

    .card-dc .namadc {
      font-size: 18px;
      display: block;
      font-weight: bold;
    }
  </style>

  <div class="row" id="toni-breadcrumb">
    <div class="col-6">
      <h4 class="text-dark mt-2">List Absensi DC</h4>
    </div>
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo (site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item active">DCM</li>
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
            <div class="col-12">
              <h5 class="text-muted">Filter</h5>
            </div>
            <div class="col-12">
              <div class="form-group row">
                <label for="tanggal" class="col-md-2 col-form-label">Tanggal</label>
                <div class="col-md-2">
                  <input type="date" name="tglawal" id="tglakhir" class="form-control" value="<?php echo date('Y-m-d') ?>">
                </div>
                <label for="tanggal" class="col-md-1 text-center col-form-label">s/d</label>
                <div class="col-md-2">
                  <input type="date" name="tglawal" id="tglakhir" class="form-control" value="<?php echo date('Y-m-d') ?>">
                </div>
              </div>
            </div>
            <div class="col-12">
              <hr>
            </div>

            <div class="col-md-3">
              <div class="card">
                <div class="card-body card-dc shadow">
                  <div class="row">
                    <div class="col-12">
                      <span class="namadc">DC YERUSALEM</span>
                      <span>Senin, 15 January 2024</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>



          </div> <!-- /.row -->
        </div> <!-- ./card-body -->
      </div> <!-- /.card -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->
  <!-- Main row -->




  <?php $this->load->view("template/footer") ?>



  <script type="text/javascript">
    var table;

    $(document).ready(function() {


    }); //end (document).ready
  </script>

  </body>

  </html>