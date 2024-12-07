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
      <h4 class="text-dark mt-2">Permohonan</h4>
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

            <div class="col-12 mb-3">
              <h5 class="">Permohonan Bergabung Di DC</h5>
            </div>

            <?php
            if ($rsPermohonan->num_rows() > 0) {
              foreach ($rsPermohonan->result() as $row) {
                if (!empty($row->foto)) {
                  $foto = base_url('../admin/uploads/jemaat/' . $row->foto);
                } else {
                  $foto = base_url('images/user-01.png');
                }

                $keterangankonfirmasi = '';
                if ($row->statuskonfirmasi == 'Disetujui') {
                  $statuskonfirmasi = '<span class="badge badge-success">Disetujui</span>';
                }

                if ($row->statuskonfirmasi == 'Menunggu Konfirmasi') {
                  $row->statuskonfirmasi = '<span class="badge badge-warning">Menunggu Konfirmasi</span>';
                }
                if ($row->statuskonfirmasi == 'Ditolak') {
                  $statuskonfirmasi = '<span class="badge badge-danger">Ditolak</span>';
                  $keterangankonfirmasi = '<br><span><strong>Keterangan:</strong> ' . $row->keterangankonfirmasi . '</span>';
                }

                echo '
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-12 mb-2">
                          <span class="namajemaatdc">' . $row->namalengkap . '</span>
                          <span>Tgl. Permohonan: ' . tglindonesia($row->tglpermohonan) . '</span>
                        </div>
                        <div class="col-4">
                          <img src="' . $foto . '" alt="" style="width: 100%;">
                        </div>
                        <div class="col-8">
                          <div class="row">
                            <div class="col-12">
                              <div class="">' . $row->jeniskelamin . ' (' . $row->umur . ' Tahun)</div>
                            </div>
                            <div class="col-12">
                              <a href="" class="btn btn-sm btn-success btnLihatProfil mt-2 mb-2" data-idpermohonan="' . $this->encrypt->encode($row->idpermohonan) . '" data-idjemaat="' . $row->idjemaat . '" data-idjemaatencrypt="' . $this->encrypt->encode($row->idjemaat) . '">Lihat Profil</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 mt-2">
                          <span class="">Status: ' . $statuskonfirmasi . '</span>
                          ' . $keterangankonfirmasi . '
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                ';
              }
            }
            ?>

          </div> <!-- /.row -->
        </div> <!-- ./card-body -->
      </div> <!-- /.card -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->
  <!-- Main row -->

  <?php $this->load->view("template/footer") ?>

  <?php $this->load->view('konfirmasidc/modalKonfirmasi'); ?>




  <script type="text/javascript">
    var table;

    $(document).ready(function() {


    }); //end (document).ready

    $('.btnLihatProfil').click(function(e) {
      e.preventDefault();
      var idpermohonan = $(this).attr("data-idpermohonan");
      var idjemaatmodal = $(this).attr("data-idjemaat");
      var idjemaatencrypt = $(this).attr("data-idjemaatencrypt");
      loadModalKonfirmasi(idjemaatmodal, idjemaatencrypt, idpermohonan);
    })
  </script>

  </body>

  </html>