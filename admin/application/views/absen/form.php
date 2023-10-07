 <?php  
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");
?>


<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Absen Ibadah Minggu</h4>
    </div>  
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo(site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo(site_url('absen')) ?>">Absen Ibadah Minggu</a></li>
        <li class="breadcrumb-item active" id="lblactive"></li>
      </ol>
      
    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12">



      <form action="<?php echo(site_url('absen/simpan')) ?>" method="post" id="form">                      
        <div class="row">
          <div class="col-md-12">
            <div class="card" id="cardcontent">
              <div class="card-body">

                  <div class="col-md-12">
                    <?php 
                      $pesan = $this->session->flashdata("pesan");
                      if (!empty($pesan)) {
                        echo $pesan;
                      }
                    ?>
                  </div> 

                  <h3 class="text-gray">Data Pengkhotbah</h3><hr>                    

                  <input type="hidden" name="idabsen" id="idabsen">                      
                  <input type="hidden" name="idabsenjenis" id="idabsenjenis" value="A01">                      
                  
                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Tanggal</label>
                    <div class="col-md-9">
                      <input type="date" name="tglabsen" id="tglabsen" class="form-control" value="<?php echo date('Y-m-d') ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Sesi Ibadah</label>
                    <div class="col-md-9">
                      <select name="idsesi" id="idsesi" class="form-control select2">
                        <option value="">Pilih sesi..</option>
                        <?php  
                          $rsSesi = $this->db->query("select * from sesiibadahminggu");
                          if ($rsSesi->num_rows()>0) {
                            foreach ($rsSesi->result() as $rowSesi) {
                              echo '
                                <option value="'.$rowSesi->idsesi.'">'.$rowSesi->namasesi.' Jam: '.date('H:i', strtotime($rowSesi->jammulai)).' - '.date('H:i', strtotime($rowSesi->jamselesai)).'</option>
                              ';
                            }
                          }
                        ?>
                      </select>


                    </div>
                  </div>  

                  

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Jumlah Hadir</label>
                    <div class="col-md-9">
                      <input type="number" name="jumlahhadir" id="jumlahhadir" class="form-control" placeholder="0">
                    </div>
                  </div>       

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Lokasi Absen</label>
                    <div class="col-md-9">
                      <select name="idabsenlokasi" id="idabsenlokasi" class="form-control select2">
                        <option value="">Pilih lokasi absen..</option>
                        <?php  
                          $rsLokasi = $this->db->query("select * from absenlokasi");
                          if ($rsLokasi->num_rows()>0) {
                            foreach ($rsLokasi->result() as $rowLokasi) {
                              echo '
                                <option value="'.$rowLokasi->idabsenlokasi.'">'.$rowLokasi->namaabsenlokasi.'</option>
                              ';
                            }
                          }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Nama Counter</label>
                    <div class="col-md-9">
                      <select name="idjemaatcounter" id="idjemaatcounter" class="form-control select2">
                        <option value="">Pilih counter..</option>
                        <?php  
                          $rsJemaat = $this->db->query("select * from jemaat where statusjemaat='Jemaat'");
                          if ($rsJemaat->num_rows()>0) {
                            foreach ($rsJemaat->result() as $rowJemaat) {
                              echo '
                                <option value="'.$rowJemaat->idjemaat.'">'.$rowJemaat->namalengkap.'</option>
                              ';
                            }
                          }
                        ?>
                      </select>
                    </div>
                  </div>

                                       

              </div> <!-- ./card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?php echo(site_url('absen')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
              </div>
            </div> <!-- /.card -->
          </div> <!-- /.col -->
        </div>
      </form>





    </div>
  </div> <!-- /.row -->
  <!-- Main row -->



<?php $this->load->view("template/footer") ?>



<script type="text/javascript">
  
  var idabsen = "<?php echo($idabsen) ?>";

  $(document).ready(function() {

    $('.select2').select2();

    //---------------------------------------------------------> JIKA EDIT DATA
    if ( idabsen != "" ) {  //edit (ada isi idabsen)

          $.ajax({
              type        : 'POST', 
              url         : '<?php echo site_url("absen/get_edit_data") ?>', 
              data        : {'idabsen': idabsen}, 
              dataType    : 'json', 
              encode      : true
          })      
          .done(function(result) {
            console.log(result);
            $("#idabsen").val(result.idabsen);
            $("#tglabsen").val(result.tglabsen);
            $("#idsesi").val(result.idsesi).trigger('change');
            $("#jumlahhadir").val(result.jumlahhadir);
            $("#idabsenlokasi").val(result.idabsenlokasi).trigger('change');
            $("#idjemaatcounter").val(result.idjemaatcounter).trigger('change')

          }); 


          $("#lblactive").html("Edit");

    }else{
          $("#lblactive").html("Tambah");
    }     


    //----------------------------------------------------------------- > validasi
    $("#form").bootstrapValidator({
      feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
        tglabsen: {
          validators:{
            notEmpty: {
                message: "tanggal absen tidak boleh kosong"
            },
          }
        },
        idsesi: {
          validators:{
            notEmpty: {
                message: "nama sesi ibadah tidak boleh kosong"
            },
          }
        },
        jumlahhadir: {
          validators:{
            notEmpty: {
                message: "jumlah hadir tidak tidak boleh kosong"
            },
          }
        },
        idabsenlokasi: {
          validators:{
            notEmpty: {
                message: "lokasi tidak boleh kosong"
            },
          }
        },
        idjemaatcounter: {
          validators:{
            notEmpty: {
                message: "lokasi tidak boleh kosong"
            },
          }
        },
      }
    });

    


    $("form").attr('autocomplete', 'off');
    $("#rtrw").mask("000/000", {placeholder:"000/000"});
  }); //end (document).ready
  



</script>

</body>
</html>
