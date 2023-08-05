<?php
$this->load->view("template/header");
$this->load->view("template/topmenu");
$this->load->view("template/sidemenu");
?>


<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Profil Saya</h4>
    </div>
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo (site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item active">Profil Saya</li>
      </ol>

    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12">
      <form action="<?php echo (site_url('profilsaya/simpan')) ?>" method="post" id="form" enctype="multipart/form-data">
        <div class="row">

          <div class="col-4">
            <div class="card">
              <div class="card-body">

                  <div class="form-group row">
                      <div class="col-md-12 text-center">
                        <img src="<?php echo base_url('images/foto-users.png'); ?>" id="output1" class="img-thumbnail" style="width:80%;max-height:80%;">
                        <div class="form-group">
                            <span class="btn btn-primary btn-file btn-block;" style="width:80%;">
                              <span class="fileinput-new"><span class="fa fa-camera"></span> Ganti Gambar Profil</span>
                              <input type="file" name="file" id="file" accept="image/*" onchange="loadFile1(event)">
                              <input type="hidden" value="" name="file_lama" id="file_lama" class="form-control" />
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
            </div>
          </div>

          <div class="col-md-8">
            <div class="card" id="cardcontent">
              <div class="card-header">
                <h5 class="card-title" id="lbljudul"></h5>
              </div>
              <div class="card-body">

                  <div class="col-md-12">
                    <?php
$pesan = $this->session->flashdata("pesan");
if (!empty($pesan)) {
    echo $pesan;
}
?>
                  </div>

                  <input type="hidden" name="idpengguna" id="idpengguna">
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Nama</label>
                    <div class="col-md-9">
                      <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama">
                    </div>
                  </div>
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Tempat/ Tgl Lahir</label>
                    <div class="col-md-5">
                      <input type="text" name="tempatlahir" id="tempatlahir" class="form-control" placeholder="Masukkan tempatlahir">
                    </div>
                    <label for="" class="col-md-1 col-form-label text-center">/</label>
                    <div class="col-md-3">
                      <input type="date" name="tgllahir" id="tgllahir" class="form-control" placeholder="Masukkan tgllahir">
                    </div>
                  </div>
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-md-9">
                      <select name="jeniskelamin" id="jeniskelamin" class="form-control">
                        <option value="">--Pilih jenis kelamin--</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Alamat</label>
                    <div class="col-md-9">
                      <textarea name="alamat" id="alamat" class="form-control" rows="3" placeholder="Masukkan alamat"></textarea>
                    </div>
                  </div>
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Email</label>
                    <div class="col-md-9">
                      <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email">
                    </div>
                  </div>
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Username</label>
                    <div class="col-md-9">
                      <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username">
                    </div>
                  </div>

                  <hr>
                  <h4 class="text-gray">GANTI PASSWORD</h4>
                  <small class="text-danger">*Kosongkan Jika Tidak Mau Ubah Password</small>

                  <div class="form-group row required mt-3">
                    <label for="" class="col-md-3 col-form-label">Password Lama</label>
                    <div class="col-md-9">
                      <input type="password" name="passwordlama" id="passwordlama" class="form-control" placeholder="****************">
                    </div>
                  </div>

                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Password Baru</label>
                    <div class="col-md-9">
                      <input type="password" name="password" id="password" class="form-control" placeholder="****************">
                    </div>
                  </div>

                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Ulangi Password Baru</label>
                    <div class="col-md-9">
                      <input type="password" name="password2" id="password2" class="form-control" placeholder="****************">
                    </div>
                  </div>



              </div> <!-- ./card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?php echo (site_url('profilsaya')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
              </div>
            </div> <!-- /.card -->
          </div> <!-- /.col -->
        </div>
      </form>
    </div>
  </div> <!-- /.row -->
  <!-- Main row -->



<?php $this->load->view("template/footer")?>



<script type="text/javascript">

  var idpengguna = "<?php echo ($idpengguna) ?>";

  $(document).ready(function() {

    $('.select2').select2();

    //---------------------------------------------------------> JIKA EDIT DATA
    if ( idpengguna != "" ) {
          $.ajax({
              type        : 'POST',
              url         : '<?php echo site_url("profilsaya/get_edit_data") ?>',
              data        : {idpengguna: idpengguna},
              dataType    : 'json',
              encode      : true
          })
          .done(function(result) {
            $("#idpengguna").val(result.idpengguna);
            $("#nama").val(result.nama);
            $("#tempatlahir").val(result.tempatlahir);
            $("#tgllahir").val(result.tgllahir);
            $("#jeniskelamin").val(result.jeniskelamin);
            $("#alamat").val(result.alamat);
            $("#jabatan").val(result.jabatan);
            $("#username").val(result.username);
            $("#email").val(result.email);

            $("#foto").val(result.foto);

            $('#file_lama').val(result.foto);

            if ( result.foto != '' && result.foto != null ) {
                $("#output1").attr("src","<?php echo (base_url('./uploads/pengguna/')) ?>" + result.foto);
            }else{
                $("#output1").attr("src","<?php echo (base_url('./images/foto-users.png')) ?>");
            }

          });


          $("#lbljudul").html("Data Profil Saya");
          $("#lblactive").html("Edit");

    }else{
          $("#lbljudul").html("Tambah Data Pengguna");
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
        nama: {
          validators:{
            notEmpty: {
                message: "nama tidak boleh kosong"
            },
          }
        },
        tempatlahir: {
          validators:{
            notEmpty: {
                message: "tempatlahir tidak boleh kosong"
            },
          }
        },
        tgllahir: {
          validators:{
            notEmpty: {
                message: "tgllahir tidak boleh kosong"
            },
          }
        },
        jeniskelamin: {
          validators:{
            notEmpty: {
                message: "jeniskelamin tidak boleh kosong"
            },
          }
        },
        alamat: {
          validators:{
            notEmpty: {
                message: "alamat tidak boleh kosong"
            },
          }
        },
      }
    });
  //------------------------------------------------------------------------> END VALIDASI DAN SIMPAN


    $("form").attr('autocomplete', 'off');
    //$("#tanggal").mask("00-00-0000", {placeholder:"hh-bb-tttt"});
    //$("#jumlah").mask("000,000,000,000", {reverse: true});
  }); //end (document).ready


</script>

</body>
</html>
