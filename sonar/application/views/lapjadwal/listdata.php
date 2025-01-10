<?php
$this->load->view("template/header");
$this->load->view("template/topmenu");
$this->load->view("template/sidemenu");
?>


  <div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Laporan Jadwal Kerja Karyawan</h4>
    </div>
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo (site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item active">Laporan Jadwal Kerja Karyawan</li>
      </ol>

    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12">
      <div class="card" id="cardcontent">
        <div class="card-body p-5" >


          <form action="<?php echo (site_url('lapjadwal/cetak')) ?>" method="post">
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
if ($rsproyek->num_rows() > 0) {
    foreach ($rsproyek->result() as $row) {
        echo '
                                  <option value="' . $row->idproyek . '">' . $row->namaproyek . '</option>
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
                      <label for="" class="col-md-4 col-form-label">Kategori</label>
                      <div class="col-md-8">
                        <select name="idkategori" id="idkategori" class="form-control select2">
                          <option value="">--Semua kategori--</option>
                          <?php
$rskategori = $this->db->query("select * from kategori");
if ($rskategori->num_rows() > 0) {
    foreach ($rskategori->result() as $row) {
        echo '
                                  <option value="' . $row->idkategori . '">' . $row->namakategori . '</option>
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
                      <label for="" class="col-md-4 col-form-label">Prioritas</label>
                      <div class="col-md-8">
                        <select name="prioritas" id="prioritas" class="form-control">
                          <option value="">--Semua prioritas--</option>
                          <option value="Rendah">Rendah</option>
                          <option value="Sedang">Sedang</option>
                          <option value="Tinggi">Tinggi</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group row">
                      <label for="" class="col-md-4 col-form-label">PIC</label>
                      <div class="col-md-8">
                        <select name="idpic" id="idpic" class="form-control select2">
                          <option value="">--Semua PIC--</option>
                          <?php
$rspic = $this->db->query("select * from v_pengguna");
if ($rspic->num_rows() > 0) {
    foreach ($rspic->result() as $row) {
        echo '
                                  <option value="' . $row->idpengguna . '">' . $row->nama . '</option>
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
                      <label for="" class="col-md-4 col-form-label">Pembuat Task</label>
                      <div class="col-md-8">
                        <select name="idpembuattask" id="idpembuattask" class="form-control select2">
                          <option value="">--Semua Pembuat Task--</option>
                          <?php
$rspic = $this->db->query("select * from v_pengguna");
if ($rspic->num_rows() > 0) {
    foreach ($rspic->result() as $row) {
        echo '
                                  <option value="' . $row->idpengguna . '">' . $row->nama . '</option>
                                ';
    }
}
?>
                        </select>
                      </div>
                    </div>
                  </div>


                  <div class="col-md-12">
                    <span class="btn btn-info float-right ml-2" id="cetak" style="margin-top: 25px"><i class="fa fa-print"></i> Cetak</span>
                    <span class="btn btn-success float-right" id="excel" style="margin-top: 25px"><i class="fa fa-file-excel"></i> Excel</span>
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
        cetak_laporan('print');
  })

  $('#excel').click(function(){
        cetak_laporan('excel');
  })

  function cetak_laporan(jenis)
  {
      var tglawal       = $('#tglawal').val();
      var tglakhir      = $('#tglakhir').val();
      var idproyek       = $('#idproyek').val();
      var idkategori       = $('#idkategori').val();
      var prioritas       = $('#prioritas').val();
      var idpic       = $('#idpic').val();
      var idpembuattask       = $('#idpembuattask').val();

      if (tglawal==='' || tglakhir==='') {
          bootbox.alert('Pilih Periode!');
          return;
      }

      if (idproyek=='') {
        idproyek = '-';
      }
      if (idkategori=='') {
        idkategori = '-';
      }
      if (prioritas=='') {
        prioritas = '-';
      }
      if (idpic=='') {
        idpic = '-';
      }

      if (idpembuattask=='') {
        idpembuattask = '-';
      }

      window.open("<?php echo site_url('lapjadwal/cetak/') ?>" + jenis + "/" + idproyek + "/" + idkategori + "/" + prioritas + "/" + idpic + "/" + idpembuattask + "/"+ tglawal + "/" + tglakhir );
  }
</script>

</body>
</html>



