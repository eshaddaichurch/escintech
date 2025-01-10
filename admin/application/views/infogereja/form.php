<?php  
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");
?>


<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Informasi Gereja</h4>
    </div>  
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo(site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo(site_url('infogereja')) ?>">Informasi Gereja</a></li>
        <li class="breadcrumb-item active" id="lblactive"></li>
      </ol>
      
    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12">



      <form action="<?php echo(site_url('infogereja/simpan')) ?>" method="post" id="form" enctype="multipart/form-data">                      
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

                  <h3>Info Dasar</h3><hr>
                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Nama Gereja</label>
                    <div class="col-md-9">
                      <input type="text" name="namagereja" id="namagereja" class="form-control" placeholder="Masukkan nama gereja" value="<?php echo $rowinfogereja->namagereja ?>">
                    </div>
                  </div>       

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Alamat Gereja</label>
                    <div class="col-md-9">
                      <textarea name="alamatgereja" id="alamatgereja" class="form-control" rows="3" placeholder="Jl. Pahlawan No.1"><?php echo $rowinfogereja->alamatgereja ?></textarea>
                    </div>
                  </div>           

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Embed Google Maps Gereja</label>
                    <div class="col-md-9">
                      <textarea name="urlgooglemaps" id="urlgooglemaps" class="form-control" rows="3" placeholder=""><?php echo $rowinfogereja->urlgooglemaps ?></textarea>
                    </div>
                  </div>                  

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Email Gereja</label>
                    <div class="col-md-9">
                      <input type="email" name="emailgereja" id="emailgereja" class="form-control" placeholder="contoh@gmail.com" value="<?php echo $rowinfogereja->emailgereja ?>">
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Nomor Telp. Gereja</label>
                    <div class="col-md-9">
                      <input type="text" name="notelpgereja" id="notelpgereja" class="form-control" placeholder="021000000" value="<?php echo $rowinfogereja->notelpgereja ?>">
                    </div>
                  </div>


                  <h3 class="mt-5">Sosial Media Gereja</h3><hr>

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Link Url Twitter Gereja</label>
                    <div class="col-md-9">
                      <input type="text" name="urltwittergereja" id="urltwittergereja" class="form-control" placeholder="https://twitter.com/" value="<?php echo $rowinfogereja->urltwittergereja ?>">
                    </div>
                  </div>       

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Link Url Facebook Gereja</label>
                    <div class="col-md-9">
                      <input type="text" name="urlfacebookgereja" id="urlfacebookgereja" class="form-control" placeholder="https://facebook.com/"  value="<?php echo $rowinfogereja->urlfacebookgereja ?>">
                    </div>
                  </div>       

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Url Instagram Gereja</label>
                    <div class="col-md-9">
                      <input type="text" name="urlinstagramgereja" id="urlinstagramgereja" class="form-control" placeholder="https://twitter.com/">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Url Skipe Gereja</label>
                    <div class="col-md-9">
                      <input type="text" name="urlskipegereja" id="urlskipegereja" class="form-control" placeholder="https://skipe.com/" value="<?php echo $rowinfogereja->urlskipegereja ?>">
                    </div>
                  </div>       

                  
                  <h3 class="mt-5">Gambar Landing Page</h3><hr>
                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Gambar Sampul</label>
                    <div class="col-md-9">
                      <input type="file" name="gambarhomepage" id="gambarhomepage" class="" placeholder="https://skipe.com/"  value="<?php echo $rowinfogereja->gambarhomepage ?>">
                      <input type="hidden" name="gambarhomepage_lama" value="<?php echo $rowinfogereja->gambarhomepage ?>">
                      <br><a href="<?php echo base_url('uploads/infogereja/'.$rowinfogereja->gambarhomepage) ?>" id="gambarhomepagelink" target="_blank"><?php echo $rowinfogereja->gambarhomepage ?></a>
                    </div>
                  </div>       

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Judul</label>
                    <div class="col-md-9">
                      <input type="text" name="judulhomepage" id="judulhomepage" class="form-control" placeholder="Judul" value="<?php echo $rowinfogereja->judulhomepage ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Sub Judul</label>
                    <div class="col-md-9">
                      <input type="text" name="subjudulhomepage" id="subjudulhomepage" class="form-control" placeholder="Sub judul"  value="<?php echo $rowinfogereja->subjudulhomepage ?>">
                    </div>
                  </div>  
                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Url Button</label>
                    <div class="col-md-9">
                      <input type="text" name="urlbuttonhomepage" id="urlbuttonhomepage" class="form-control" placeholder="https://escintech.com/" value="<?php echo $rowinfogereja->urlbuttonhomepage ?>">
                    </div>
                  </div>     


                                       

              </div> <!-- ./card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?php echo(site_url('infogereja')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
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
  
  

  $(document).ready(function() {

    $('.select2').select2();

    
    //----------------------------------------------------------------- > validasi
    $("#form").bootstrapValidator({
      feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
        namagereja: {
          validators:{
            notEmpty: {
                message: "nama gereja tidak boleh kosong"
            },
          }
        },
      }
    });
  //------------------------------------------------------------------------> END VALIDASI DAN SIMPAN


    $("form").attr('autocomplete', 'off');
    $("#rtrw").mask("000/000", {placeholder:"000/000"});
  }); //end (document).ready
  

</script>

</body>
</html>
