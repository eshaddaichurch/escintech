<?php
$this->load->view("template/header");
$this->load->view("template/topmenu");
$this->load->view("template/sidemenu");
?>


  <div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Laporan Perkembangan Karyawan</h4>
    </div>
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo (site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item active">Laporan Perkembangan Karyawan</li>
      </ol>

    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12">
      <div class="card" id="cardcontent">
        <div class="card-body p-5" >


          <form action="<?php echo (site_url('lapperkembangan/cetak')) ?>" method="post">
            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-12" style="text-align: center;">
                    <h3>Pilih Periode Laporan</h3><br>
                  </div>
                  <div class="col-md-5">
                    <input type="date" id="tglawal" name="tglawal" class="form-control" value="<?php echo ($tglawal) ?>">
                  </div>
                  <div class="col-md-2">
                    <label for="">S/D</label>
                  </div>
                  <div class="col-md-5">
                    <input type="date" id="tglakhir" name="tglakhir" class="form-control" value="<?php echo ($tglakhir) ?>">
                  </div>
                  <div class="col-md-12 mt-4">
                    <div class="form-group row">
                      <label for="" class="col-md-4 col-form-label">Nama Proyek</label>
                      <div class="col-md-8">
                        <select name="idproyek" id="idproyek" class="form-control select2">
                          <option value="">--Semua proyek--</option>
                          <?php  
                            $rsproyek = $this->db->query("select * from proyek order by idproyek");
                            if ($rsproyek->num_rows()>0) {
                              foreach ($rsproyek->result() as $row) {
                                echo '
                                  <option value="'.$row->idproyek.'">'.$row->namaproyek.'</option>
                                ';
                              }
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group row">
                      <label for="" class="col-md-4 col-form-label">Programmer</label>
                      <div class="col-md-8">
                        <select name="idprogrammer" id="idprogrammer" class="form-control select2">
                          <option value="">--Semua programmer--</option>
                          <?php  
                            $rsprogrammer = $this->db->query("select * from programmer");
                            if ($rsprogrammer->num_rows()>0) {
                              foreach ($rsprogrammer->result() as $row) {
                                echo '
                                  <option value="'.$row->idprogrammer.'">'.$row->nama.'</option>
                                ';
                              }
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>


                  <div class="col-md-12">
                    <span class="btn btn-info btn-block" id="cetak" style="margin-top: 25px"><i class="glyphicon glyphicon-print"></i> Cetak</span>
                  </div>
                </div>
              </div>
            </div>
          </form>

        </div> <!-- ./card-body -->
      </div> <!-- /.card -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->
  <!-- Main row -->



<?php $this->load->view("template/footer")?>

<script>
  $(document).ready(function() {
    $('.select2').select2();

  });

  $('#cetak').click(function(){
        var tglawal       = $('#tglawal').val();
        var tglakhir      = $('#tglakhir').val();
        var idproyek       = $('#idproyek').val();
        var idprogrammer       = $('#idprogrammer').val();

        if (tglawal==='' || tglakhir==='') {
            bootbox.alert('Pilih Periode!');
            return;
        }

        if (idproyek=='') {
          idproyek = '-';
        }
        if (idprogrammer=='') {
          idprogrammer = '-';
        }

        window.open("<?php echo site_url('lapperkembangan/cetak/') ?>" + idproyek  + "/" + idprogrammer + "/"+ tglawal + "/" + tglakhir );
    })
</script>

</body>
</html>



