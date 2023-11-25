<?php  
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");

?>
<style>
  .nav-tabs .nav-link.active {
    font-weight:bold;
    background-color: transparent;
    border-bottom:3px solid #dd0000;
    border-right: none;
    border-left: none;
    border-top: none;
}

</style>
  <div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Laporan Data Jemaat</h4>
    </div>  
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo(site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item active">Laporan Data Jemaat</li>
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
                          <label for="" class="col-md-4 col-form-label">Jenis Kelamin</label>
                          <div class="col-md-8">
                            <select name="jeniskelamin" id="jeniskelamin" class="form-control select2">
                              <option value="-">Semua</option>
                              <option value="Laki-laki">Laki-laki</option>
                              <option value="Perempuan">Perempuan</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group row">
                          <label for="" class="col-md-4 col-form-label">Status Pernikahan</label>
                          <div class="col-md-8">
                            <select name="statuspernikahan" id="statuspernikahan" class="form-control select2">
                              <option value="-">Semua</option>
                              <option value="Belum Kawin">Belum Kawin</option>
                              <option value="Kawin">Kawin</option>
                              <option value="Janda/ Duda">Janda/ Duda</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group row">
                          <label for="" class="col-md-4 col-form-label">Pekerjaan</label>
                          <div class="col-md-8">
                            <select name="pekerjaan" id="pekerjaan" class="form-control select2">
                              <option value="-">Semua</option>
                              <option value="Swasta">Swasta</option>
                              <option value="Pegawai Negeri">Pegawai Negeri</option>
                              <option value="TNI">TNI</option>
                              <option value="POLRI">POLRI</option>
                              <option value="Wiraswasta">Wiraswasta</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group row">
                          <label for="" class="col-md-4 col-form-label">Status Jemaat</label>
                          <div class="col-md-8">
                            <select name="statusjemaat" id="statusjemaat" class="form-control select2">
                              <option value="-">Semua</option>
                              <option value="Jemaat">Jemaat</option>
                              <option value="Simpatisan">Simpatisan</option>
                              <option value="Umum">Umum</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group row">
                          <label for="" class="col-md-4 col-form-label">Golongan Darah</label>
                          <div class="col-md-8">
                            <select name="golongandarah" id="golongandarah" class="form-control select2">
                              <option value="-">Semua</option>
                              <option value="A">A</option>
                               <option value="B">B</option>
                               <option value="AB">AB</option>
                               <option value="O">O</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group row">
                          <label for="" class="col-md-4 col-form-label">Wilayah</label>
                          <div class="col-md-8">
                            <div class="row">
                              <div class="col-12">
                                <select name="propinsi" id="propinsi" class="form-control select2">
                                   <option value="">Semua propinsi ...</option>
                                   <?php
                                        $rsProvinsi = $this->db->query("select * from provinsi order by namaprovinsi");
                                        if ($rsProvinsi->num_rows()>0) {
                                            foreach ($rsProvinsi->result() as $row) {
                                                echo '
                                                    <option value="'.$row->idprovinsi.'">'.$row->namaprovinsi.'</option>
                                                ';
                                            }
                                        }
                                    ?>

                                 </select>
                              </div>
                              <div class="col-12 mt-1">
                                <select name="kotakabupaten" id="kotakabupaten" class="form-control select2">
                                   <option value="">Semua kota/kabupaten ...</option>
                                 </select>
                              </div>

                              <div class="col-12 mt-1">
                                <select name="kecamatan" id="kecamatan" class="form-control select2">
                                   <option value="">Semua kecamatan ...</option>
                                 </select>
                              </div>

                              <div class="col-12 mt-1">
                                <select name="kelurahan" id="kelurahan" class="form-control select2">
                                   <option value="">Semua kelurahan ...</option>
                                 </select>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group row">
                          <div class="col-md-4 col-form-label font-weight-bold">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="chkumur">
                              <label class="form-check-label" for="chkumur">
                                Umur
                              </label>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <input type="number" class="form-control" name="umur1" id="umur1" value="0">
                          </div>
                          <label for="" class="col-md-1 col-form-label text-center">S/D</label>
                          <div class="col-md-2">
                            <input type="number" class="form-control" name="umur2" id="umur2" value="100">
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




    function getKabupaten(idprovinsi, idkabupatendefault="")
    {

        $('#kotakabupaten').empty();
        $('#idkecamatan').empty();

        addSelectOption('kotakabupaten', '', 'Pilih kabupaten/ kota ...')
        addSelectOption('kecamatan', '', 'Pilih kecamatan ...')
        
        $.ajax({
            url: '<?= site_url('jemaat/getKabupaten') ?>',
            type: 'GET',
            dataType: 'json',
            data: {'idprovinsi': idprovinsi},
        })
        .done(function(response) {
            console.log(response);
            if (response.length>0) {
                for (var i = 0; i < response.length; i++) {
                    // console.log(response[i]);
                    addSelectOption('kotakabupaten', response[i]['idkabupaten'], response[i]['namakabupaten']);
                    if (idkabupatendefault!="" && idkabupatendefault==response[i]['idkabupaten']) {
                        $('#kotakabupaten').val(response[i]['idkabupaten']).trigger('change');
                    }
                }
            }
        })
        .fail(function() {
            console.log('error getKabupaten');
        });

    }

    $('#propinsi').change(function(e){
        var idprovinsi = $(this).val();
        getKabupaten(idprovinsi);
    });

    $('#kotakabupaten').change(function(e){
        var idkabupaten = $(this).val();
        getKecamatan(idkabupaten);
    });

    function getKecamatan(idkabupaten, idkecamatandefault="")
    {

        $('#kecamatan').empty();
        // console.log(idkabupaten);

        addSelectOption('kecamatan', '', 'Pilih kecamatan ...')
        
        $.ajax({
            url: '<?= site_url('jemaat/getKecamatan') ?>',
            type: 'GET',
            dataType: 'json',
            data: {'idkabupaten': idkabupaten},
        })
        .done(function(response) {
            // console.log(response);
            if (response.length>0) {
                for (var i = 0; i < response.length; i++) {
                    console.log(response[i]);
                    addSelectOption('kecamatan', response[i]['idkecamatan'], response[i]['namakecamatan']);
                    if (idkecamatandefault!="" && idkecamatandefault==response[i]['idkecamatan']) {
                        $('#kecamatan').val(response[i]['idkecamatan']).trigger('change');
                    }
                }
            }
        })
        .fail(function() {
            console.log('error getKecamatan');
        });

    }

    function getdesa(idkecamatan, iddesadefault="")
    {

        $('#kelurahan').empty();

        addSelectOption('kelurahan', '', 'Pilih kelurahan ...')
        
        $.ajax({
            url: '<?= site_url('jemaat/getKelurahan') ?>',
            type: 'GET',
            dataType: 'json',
            data: {'idkecamatan': idkecamatan},
        })
        .done(function(response) {
            console.log(response);
            if (response.length>0) {
                for (var i = 0; i < response.length; i++) {
                    console.log(response[i]);
                    addSelectOption('kelurahan', response[i]['idkelurahan'], response[i]['namakecamatan']);
                    if (iddesadefault!="" && iddesadefault==response[i]['idkelurahan']) {
                        $('#kelurahan').val(response[i]['idkelurahan']).trigger('change');
                    }
                }
            }
        })
        .fail(function() {
            console.log('error getKecamatan');
        });

    }



  
  $('#cetak').click(function(){
        cetak_laporan('pdf');
  })

  $('#excel').click(function(){
        cetak_laporan('excel');
  })

  function cetak_laporan(jenis)
  {
      var jeniskelamin       = $('#jeniskelamin').val();
      var statuspernikahan      = $('#statuspernikahan').val();
      var pekerjaan       = $('#pekerjaan').val();
      var statusjemaat       = $('#statusjemaat').val();
      var umur1       = $('#umur1').val();
      var umur2       = $('#umur2').val();
      var golongandarah       = $('#golongandarah').val();

      var propinsi       = $('#propinsi').val();
      var kotakabupaten       = $('#kotakabupaten').val();
      var kecamatan       = $('#kecamatan').val();
      var kelurahan       = $('#kelurahan').val();

      if ($('#chkumur').prop("checked")) {
        var chkumur = '1';
      }else{
        var chkumur = '0';
      }
      
      if (propinsi=="") {propinsi="-"};
      if (kotakabupaten=="") {kotakabupaten="-"};
      if (kecamatan=="") {kecamatan="-"};
      if (kelurahan=="") {kelurahan="-"};

      window.open("<?php echo site_url('lapdatajemaat/cetak/') ?>" + jenis + "/" + jeniskelamin + "/" + statuspernikahan + "/" + pekerjaan + "/" + statusjemaat + "/" + golongandarah + "/" + chkumur + "/"+ umur1 + "/" + umur2 + "/" + propinsi + "/" + kotakabupaten + "/" + kecamatan + "/" + kelurahan);
  }




</script>

</body>
</html>

