<?php
$this->load->view("template/header");
$this->load->view("template/topmenu");
$this->load->view("template/sidemenu");

?>
<style>
  .nav-tabs .nav-link.active {
    font-weight: bold;
    background-color: transparent;
    border-bottom: 3px solid #dd0000;
    border-right: none;
    border-left: none;
    border-top: none;
  }
</style>
<div class="row" id="toni-breadcrumb">
  <div class="col-6">
    <h4 class="text-dark mt-2">Laporan Kelas Jemaat</h4>
  </div>
  <div class="col-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo (site_url()) ?>">Home</a></li>
      <li class="breadcrumb-item active">Laporan Kelas Jemaat</li>
    </ol>

  </div>
</div>

<div class="row" id="toni-content">
  <div class="col-md-12">
    <div class="card" id="cardcontent">

      <div class="card-body">



        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">

                <div class="row">
                  <div class="col-md-12" style="text-align: center;">
                    <h3>Filter Laporan</h3><br>
                  </div>



                  <div class="col-md-12">
                    <div class="form-group row">
                      <label for="" class="col-md-4 col-form-label">Nama Kelas</label>
                      <div class="col-md-8">
                        <select name="idkelas" id="idkelas" class="form-control select2">
                          <option value="-">Semua</option>
                          <?php
                          if ($rsKelas->num_rows() > 0) {
                            foreach ($rsKelas->result() as $row) {
                              echo '
                                  <option value="' . $row->idkelas . '">' . $row->namakelas . '</option>
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
                      <label for="" class="col-md-4 col-form-label">Tahun Kelas</label>
                      <div class="col-md-8">
                        <select name="tahunkelas" id="tahunkelas" class="form-control select2">
                          <?php
                          for ($i = 2024; $i <= date('Y'); $i++) {
                            echo '
                                <option value="' . $i . '">' . $i . '</option>
                              ';
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>









                  <div class="col-md-12">
                    <span class="btn btn-danger float-right ml-2" id="cetak" style="margin-top: 25px"><i class="fa fa-file-pdf"></i> Cetak PDF</span>
                    <span class="btn btn-success float-right" id="excel" style="margin-top: 25px"><i class="fa fa-file-excel"></i> Cetak Excel</span>
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

<script type="text/javascript">
  var table;

  $(document).ready(function() {
    $('.select2').select2();


  }); //end (document).ready




  function getKabupaten(idprovinsi, idkabupatendefault = "") {

    $('#kotakabupaten').empty();
    $('#idkecamatan').empty();

    addSelectOption('kotakabupaten', '', 'Pilih kabupaten/ kota ...')
    addSelectOption('kecamatan', '', 'Pilih kecamatan ...')

    $.ajax({
        url: '<?= site_url('jemaat/getKabupaten') ?>',
        type: 'GET',
        dataType: 'json',
        data: {
          'idprovinsi': idprovinsi
        },
      })
      .done(function(response) {
        console.log(response);
        if (response.length > 0) {
          for (var i = 0; i < response.length; i++) {
            // console.log(response[i]);
            addSelectOption('kotakabupaten', response[i]['idkabupaten'], response[i]['namakabupaten']);
            if (idkabupatendefault != "" && idkabupatendefault == response[i]['idkabupaten']) {
              $('#kotakabupaten').val(response[i]['idkabupaten']).trigger('change');
            }
          }
        }
      })
      .fail(function() {
        console.log('error getKabupaten');
      });

  }

  $('#propinsi').change(function(e) {
    var idprovinsi = $(this).val();
    getKabupaten(idprovinsi);
  });

  $('#kotakabupaten').change(function(e) {
    var idkabupaten = $(this).val();
    getKecamatan(idkabupaten);
  });

  function getKecamatan(idkabupaten, idkecamatandefault = "") {

    $('#kecamatan').empty();
    // console.log(idkabupaten);

    addSelectOption('kecamatan', '', 'Pilih kecamatan ...')

    $.ajax({
        url: '<?= site_url('jemaat/getKecamatan') ?>',
        type: 'GET',
        dataType: 'json',
        data: {
          'idkabupaten': idkabupaten
        },
      })
      .done(function(response) {
        // console.log(response);
        if (response.length > 0) {
          for (var i = 0; i < response.length; i++) {
            console.log(response[i]);
            addSelectOption('kecamatan', response[i]['idkecamatan'], response[i]['namakecamatan']);
            if (idkecamatandefault != "" && idkecamatandefault == response[i]['idkecamatan']) {
              $('#kecamatan').val(response[i]['idkecamatan']).trigger('change');
            }
          }
        }
      })
      .fail(function() {
        console.log('error getKecamatan');
      });

  }

  function getdesa(idkecamatan, iddesadefault = "") {

    $('#kelurahan').empty();

    addSelectOption('kelurahan', '', 'Pilih kelurahan ...')

    $.ajax({
        url: '<?= site_url('jemaat/getKelurahan') ?>',
        type: 'GET',
        dataType: 'json',
        data: {
          'idkecamatan': idkecamatan
        },
      })
      .done(function(response) {
        console.log(response);
        if (response.length > 0) {
          for (var i = 0; i < response.length; i++) {
            console.log(response[i]);
            addSelectOption('kelurahan', response[i]['idkelurahan'], response[i]['namakecamatan']);
            if (iddesadefault != "" && iddesadefault == response[i]['idkelurahan']) {
              $('#kelurahan').val(response[i]['idkelurahan']).trigger('change');
            }
          }
        }
      })
      .fail(function() {
        console.log('error getKecamatan');
      });

  }




  $('#cetak').click(function() {
    cetak_laporan('pdf');
  })

  $('#excel').click(function() {
    cetak_laporan('excel');
  })

  function cetak_laporan(jenis) {
    var idkelas = $('#idkelas').val();
    var tahunkelas = $('#tahunkelas').val();

    window.open("<?php echo site_url('lapkelasjemaat/cetak/pdf/') ?>" + idkelas + "/" + tahunkelas + "/Laporan Kelas Jemaat");
  }
</script>

</body>

</html>