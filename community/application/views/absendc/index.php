  <?php
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");
  ?>
  <style>
    .namajemaatdc {
      font-size: 18px;
      font-weight: bold;
      display: block;
    }

    .table-spacenol {

      th,
      td {
        padding-top: 0px;
        padding-bottom: 10px;
        padding-left: 10px;
        padding-right: 10px;
      }
    }
  </style>

  <div class="row" id="toni-breadcrumb">
    <div class="col-6">
      <h4 class="text-dark mt-2">Absensi DC</h4>
    </div>
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo (site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item active">Absensi</li>
      </ol>

    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12">
      <div class="card" id="cardcontent">
        <div class="card-header" id="lbljudul">
          <a href="<?php echo (site_url('absendc/tambah')) ?>" class="btn btn-sm btn-primary float-right"><i class="fa fa-plus-circle"></i> Tambah Absensi</a>
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

            <?php
            if ($rsAbsensi->num_rows() > 0) {
              foreach ($rsAbsensi->result() as $row) {
                if (!empty($row->foto)) {
                  $foto = base_url('../admin/uploads/jemaat/' . $row->foto);
                } else {
                  $foto = base_url('images/user-01.png');
                }


                echo '
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-12 mb-2">
                          <span class="namajemaatdc">' . formatHariTanggalJam($row->tglabsen) . '</span>
                          <span class="">Jumlah Peserta: ' . $row->totalpeserta . ' Orang</span>
                        </div>
                        <div class="col-12">
                          <div class="row">
                            <div class="col-12">
                              <div class="">
                              Keterangan: 
                              <br>' . substr($row->keterangan, 0, 255) . '
                              </div>
                            </div>
                            <div class="col-12">
                              <a href="" class="btn btn-sm btn-success btnDetailAbsen mt-2 mb-2" data-idabsen="' . $row->idabsen . '">Lihat Detail</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                ';
              }
            } else {
              echo '<div class="col-12 text-center">
                <label>Data absen belum ada...</label>
              </div>
              ';
            }
            ?>



          </div> <!-- /.row -->
        </div> <!-- ./card-body -->
      </div> <!-- /.card -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->
  <!-- Main row -->




  <?php $this->load->view("template/footer") ?>

  <?php $this->load->view('absendc/modalDetail'); ?>


  <script type="text/javascript">
    var table;

    $(document).ready(function() {


    }); //end (document).ready

    $('.btnDetailAbsen').click(function(e) {
      e.preventDefault();
      var idabsen = $(this).attr("data-idabsen");
      loadmodalDetail(idabsen);
    })
  </script>

  </body>

  </html>