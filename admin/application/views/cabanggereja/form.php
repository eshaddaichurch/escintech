 <?php  
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");
?>


  <style>
      #map {
        height: 50vh;
      }
    </style>


<!-- 
      Make sure you put this AFTER Leaflet's CSS 
      source: https://leafletjs.com/reference.html#map-example
    -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
   integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
   crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>



<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Cabang Gereja</h4>
    </div>  
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo(site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo(site_url('cabanggereja')) ?>">Cabang Gereja</a></li>
        <li class="breadcrumb-item active" id="lblactive"></li>
      </ol>
      
    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12">



      <form action="<?php echo(site_url('cabanggereja/simpan')) ?>" method="post" id="form" enctype="multipart/form-data">                      
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

                  <h3 class="text-gray">Data Cabang Gereja</h3><hr>                    



                  <input type="hidden" name="idcabang" id="idcabang">                      

                  <div class="row">

                    <div class="col-md-4">

                            
                            <div class="form-group row text center">
                              <label for="" class="col-md-12 col-form-label">Gambar Sampul <small class="text-danger ml-2 font-weight-bold">(Maksimal 200 Kb)</small></label>
                              <div class="col-md-12 mt-3 text-center">
                                <img src="<?php echo base_url('images/nofoto.png'); ?>" id="output1" class="img-thumbnail" style="width:70%;max-height:70%;">
                                <div class="form-group">
                                    <span class="btn btn-primary btn-file btn-block;" style="width:70%;">
                                      <span class="fileinput-new"><span class="fa fa-camera"></span> Upload Gambar</span>
                                      <input type="file" name="gambarsampul" id="gambarsampul" accept="image/*" onchange="loadFile1(event)">
                                      <input type="hidden" value="" name="gambarsampul_lama" id="gambarsampul_lama" class="form-control" />
                                    </span>
                                </div>
                                <script type="text/javascript">
                                    var loadFile1 = function(event) {
                                        var output1 = document.getElementById('output1');
                                        output1.src = URL.createObjectURL(event.target.files[0]);
                                    };
                                </script>
                              </div>
                          </div>

                    </div>

                    <div class="col-md-8">

                          <div class="form-group row required">
                            <label for="" class="col-md-3 col-form-label">Nama Cabang</label>
                            <div class="col-md-9">
                              <input type="text" name="namacabang" id="namacabang" class="form-control" placeholder="Nama Cabang" autofocus="">
                            </div>
                          </div> 

                          <div class="form-group row required">
                            <label for="" class="col-md-3 col-form-label">Nama Gembala</label>
                            <div class="col-md-9">
                              <input type="text" name="namagembala" id="namagembala" class="form-control" placeholder="Nama Gembala">
                            </div>
                          </div> 

                          <div class="form-group row">
                            <label for="" class="col-md-3 col-form-label">Alamat Lengkap</label>
                            <div class="col-md-9">
                              <div class="row">
                                <div class="col-12 mb-2">
                                  <textarea name="alamatlengkap" id="alamatlengkap" class="form-control" rows="2" placeholder="Alamat lengkap"></textarea>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="" class="">Latitude</label>
                                    <input type="text" name="latitude" id="latitude" class="form-control" placeholder="Latitude" readonly="">
                                  </div>                                  
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="" class="">Longitude</label>
                                    <input type="text" name="longitude" id="longitude" class="form-control" placeholder="Longitude" readonly="">
                                  </div>                                  
                                </div>
                                <div class="col-md-4">
                                  <button type="button" class="btn btn-sm btn-primary mt-4" data-toggle="modal" data-target="#pickMapModal"><i class="fa fa-map-marked"></i></button>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="" class="col-md-3 col-form-label">Jadwal Ibadah</label>
                            <div class="col-md-9">
                              <textarea name="jadwalibadah" id="jadwalibadah" class="form-control" rows="2" placeholder="Jadwal ibadah"></textarea>
                            </div>
                          </div>

                          




                    </div>
                    <div class="col-12"><hr></div>
                    <div class="col-12">
                      
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="" class="">No Telepon</label>
                            <input type="text" name="notelp" id="notelp" class="form-control" placeholder="Nomor telepon">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="" class="">facebook</label>
                            <input type="text" name="urlfacebook" id="urlfacebook" class="form-control" placeholder="Url Facebook">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="" class="">Instagram</label>
                            <input type="text" name="urlinstagram" id="urlinstagram" class="form-control" placeholder="Url Instagram">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="" class="">Youtube</label>
                            <input type="text" name="urlyoutube" id="urlyoutube" class="form-control" placeholder="Url Youtube">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="" class="">Twitter</label>
                            <input type="text" name="urltwitter" id="urltwitter" class="form-control" placeholder="Url Twitter">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="" class="">LinkedIn</label>
                            <input type="text" name="urllinkedin" id="urllinkedin" class="form-control" placeholder="Url Linkedin">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="" class="">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="10" placeholder="Deskripsi Cabang"></textarea>
                          </div>
                        </div>
                        
                      </div>

                    </div>


                  </div>



              </div> <!-- ./card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?php echo(site_url('cabanggereja')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
              </div>
            </div> <!-- /.card -->
          </div> <!-- /.col -->
        </div>
      </form>





    </div>
  </div> <!-- /.row -->
  <!-- Main row -->



<?php $this->load->view("template/footer") ?>

<?php $this->load->view('cabanggereja/pickMapModal'); ?>


<script type="text/javascript">
  
  var idcabang = "<?php echo($idcabang) ?>";

  $(document).ready(function() {

    $('.select2').select2();

    //---------------------------------------------------------> JIKA EDIT DATA
    if ( idcabang != "" ) { 
          $.ajax({
              type        : 'POST', 
              url         : '<?php echo site_url("cabanggereja/get_edit_data") ?>', 
              data        : {idcabang: idcabang}, 
              dataType    : 'json', 
              encode      : true
          })      
          .done(function(result) {
            // console.log(result);
            $("#idcabang").val(result.idcabang);
            $("#namacabang").val(result.namacabang);
            $("#namagembala").val(result.namagembala);
            $("#alamatlengkap").val(result.alamatlengkap);
            $("#latitude").val(result.latitude);
            $("#longitude").val(result.longitude);
            $("#jadwalibadah").val(result.jadwalibadah);
            $("#notelp").val(result.notelp);
            $("#urlfacebook").val(result.urlfacebook);
            $("#urlinstagram").val(result.urlinstagram);
            $("#urlyoutube").val(result.urlyoutube);
            $("#urltwitter").val(result.urltwitter);
            $("#urllinkedin").val(result.urllinkedin);
            $("#deskripsi").val(result.deskripsi);
            
            $("#gambarsampul_lama").val(result.gambarsampul);
            $('#output1').attr('src', "<?php echo base_url('uploads/cabanggereja/') ?>"+result.gambarsampul);


            CKEDITOR.replace('jadwalibadah' ,{
                filebrowserImageBrowseUrl : '<?php echo base_url('uploads/cabanggereja/gallery'); ?>',
                height : ['100px'],
              });
            CKEDITOR.instances.jadwalibadah.setData( result.jadwalibadah );


            CKEDITOR.replace('deskripsi' ,{
                filebrowserImageBrowseUrl : '<?php echo base_url('uploads/cabanggereja/gallery'); ?>',
                height : ['600px'],
              });
            CKEDITOR.instances.deskripsi.setData( result.deskripsi );

          }); 


          $("#lbljudul").html("Edit Data Cabang Gereja");
          $("#lblactive").html("Edit");

    }else{

          CKEDITOR.replace('jadwalibadah' ,{
              filebrowserImageBrowseUrl : '<?php echo base_url('uploads/cabanggereja/gallery'); ?>',
              height : ['100px'],
            });

          CKEDITOR.replace('deskripsi' ,{
              filebrowserImageBrowseUrl : '<?php echo base_url('uploads/cabanggereja/gallery'); ?>',
              height : ['600px'],
            });

          $("#lbljudul").html("Tambah Data Cabang Gereja");
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
        namacabang: {
          validators:{
            notEmpty: {
                message: "nama cabang tidak boleh kosong"
            },
          }
        },
        namagembala: {
          validators:{
            notEmpty: {
                message: "nama gembala tidak boleh kosong"
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




  <script>
    var lpickAlrady = false;
    const centerMap = [0.03718835906169617, 110.35766601562501];
    var marker;

    var map = L.map('map').setView(centerMap, 10);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);


    $('#longitude').click(function(e) {
      $('#pickMapModal').modal('show');
    });
    $('#latitude').click(function(e) {
      $('#pickMapModal').modal('show');
    });

  </script>


</body>
</html>
