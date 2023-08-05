 <?php  
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");
?>


<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Penjadwalan</h4>
    </div>  
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo(site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo(site_url('penjadwalan')) ?>">Penjadwalan</a></li>
        <li class="breadcrumb-item active" id="lblactive"></li>
      </ol>
      
    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12">



      <form action="<?php echo(site_url('penjadwalan/simpan')) ?>" method="post" id="form">                      
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

                  <h3 class="text-gray">jadwal ibadah</h3><hr>                    

                  
                  <input type="hidden" name="idjadwalibadahmingguan" id="idjadwalibadahmingguan">                      
                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">ID Jadwal Ibadah Mingguan</label>
                    <div class="col-md-9">
                      <input type="text" name="idjadwalibadahmingguan" id="idjadwalibadahmingguan" class="form-control" placeholder="auto" readonly="">
                    </div>
                  </div>              


                                   
                                   

                  <input type="hidden" name="idjadwalibadahmingguan" id="idjadwalibadahmingguan">                      
                                   
                  <h3></h3>
                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Nama Pengkhotbah</label>
                    <div class="col-md-9">
                      <select name="idpengkhotbah" id="idpengkhotbah" class="form-control select2">
                        
                        <option value="">Pilih nama pengkhotbah</option>
                        <?php  
                          $rsjemaat = $this->db->query("select * from jemaat order by namalengkap");
                          if ($rsjemaat->num_rows()>0) {
                            foreach ($rsjemaat->result() as $rowjemaat) {
                              echo '
                                <option value="'.$rowjemaat->idjemaat.'">'.$rowjemaat->namalengkap.'</option>
                              ';
                            }
                          }
                        ?>
                      </select>
             

                    </div>
                  </div>  

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Tanggaljadwal</label>
                    <div class="col-md-9">
                      <input type="date" name="tanggaljadwal" id="tanggaljadwal" class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">tema</label>
                    <div class="col-md-9">
                      <textarea name="tema" id="tema" class="form-control" rows="3" placeholder="tema"></textarea>
                    </div>
                  </div>       

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">subtema</label>
                    <div class="col-md-9">
                      <textarea name="subtema" id="Subtema" class="form-control" rows="3" placeholder="subtema"></textarea>
                    </div>
                  </div>


                   <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">videoembed</label>
                    <div class="col-md-9">
                      <textarea name="videoembed" id="videoembed" class="form-control" rows="3" placeholder="videoembed"></textarea>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">gambar sampul</label>
                    <div class="col-md-9">
                      <input type="file" name="foto" value="foto">
                    </div>
                  </div> 


              </div> <!-- ./card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?php echo(site_url('penjadwalan')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
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
  
  var idjadwalibadahmingguan = "<?php echo($idjadwalibadahmingguan) ?>";

  $(document).ready(function() {

    $('.select2').select2();

    //---------------------------------------------------------> JIKA EDIT DATA
    if ( idjadwalibadahmingguan != "" ) {  //edit (ada isi idjadwalibadahmingguan)

          $.ajax({
              type        : 'POST', 
              url         : '<?php echo site_url("penjadwalan/get_edit_data") ?>', 
              data        : {'idjadwalibadahmingguan': idjadwalibadahmingguan}, 
              dataType    : 'json', 
              encode      : true
          })      
          .done(function(result) {
            console.log(result);
            $("#idjadwalibadahmingguan").val(result.idjadwalibadahmingguan).trigger('change');
            $("idpengkotbah").val(result.idpengkotbah).trigger('change');
            $("#tanggaljadwal").val(result.tanggaljadwal);
            $("#tema").val(result.tema);
            $("#subtema").val(result.subtema);
            $("#videoembed").val(result.videoembed);
            $("#gambarsampul").val(result.gambarsampul);
          }); 


          $("#lblactive").html("Edit");
      

    }else{
          $("#lblactive").html("Tambah");
    }     

    


    $("form").attr('autocomplete', 'off');
    $("#rtrw").mask("000/000", {placeholder:"000/000"});
  }); //end (document).ready
  



</script>

</body>
</html>
