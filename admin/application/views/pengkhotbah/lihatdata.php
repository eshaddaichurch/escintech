<?php  
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");
?>


<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Jemaat</h4>
    </div>  
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo(site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo(site_url('Pengkhotbah2')) ?>">Pengkhotbah2</a></li>
        <li class="breadcrumb-item active" id="lblactive"></li>
      </ol>
      
    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12">



      <form action="<?php echo(site_url('Pengkhotbah2/simpan')) ?>" method="post" id="form">                      
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

                  <h3 class="text-gray">Data Jemaat</h3><hr>                    

                  <input type="hidden" name="idjemaat" id="idjemaat">                      
                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">No AJ</label>
                    <div class="col-md-9">
                      <input type="text" name="noaj" id="noaj" class="form-control" placeholder="Auto" readonly="">
                    </div>
                  </div>                      
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">NIK</label>
                    <div class="col-md-3">
                      <input type="text" name="nik" id="nik" class="form-control" placeholder="Masukkan NIK">
                    </div>
                  </div>                      
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Kewarganegaraan</label>
                    <div class="col-md-9">
                      <select name="kewarganegaraan" id="kewarganegaraan" class="form-control">
                        <option value="">Pilih kewarganegaraan...</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Asing">Asing</option>
                      </select>
                    </div>
                  </div>                      
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Nama Lengkap</label>
                    <div class="col-md-9">
                      <input type="text" name="namalengkap" id="namalengkap" class="form-control" placeholder="Masukkan nama lengkap">
                    </div>
                  </div>                      
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Nama Panggilan</label>
                    <div class="col-md-9">
                      <input type="text" name="namapanggilan" id="namapanggilan" class="form-control" placeholder="Masukkan nama panggilan">
                    </div>
                  </div>                      
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Tempat / Tgl Lahir</label>
                    <div class="col-md-5">
                      <input type="text" name="tempatlahir" id="tempatlahir" class="form-control" placeholder="Masukkan tempat lahir">
                    </div>
                    <label for="" class="col-md-1 col-form-label">/</label>
                    <div class="col-md-3">
                      <input type="date" name="tanggallahir" id="tanggallahir" class="form-control">
                    </div>
                  </div>                      
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-md-9">
                      <select name="jeniskelamin" id="jeniskelamin" class="form-control">
                        <option value="">Pilih jenis kelamin...</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                  </div>                      
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Status Pernikahan</label>
                    <div class="col-md-9">
                      <select name="statuspernikahan" id="statuspernikahan" class="form-control">
                        <option value="">Pilih status pernikahan</option>
                        <option value="Belum Kawin">Belum Kawin</option>
                        <option value="Kawin">Kawin</option>
                        <option value="Janda/ Duda">Janda/ Duda</option>
                      </select>
                    </div>
                  </div>                      
                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">golongandarah</label>
                    <div class="col-md-9">
                      <select name="golongandarah" id="golongandarah" class="form-control">
                        <option value="">Pilih golongan darah...</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                      </select>
                    </div>
                  </div>                      
                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">No Telepon.</label>
                    <div class="col-md-3">
                      <input type="text" name="notelp" id="notelp" class="form-control" placeholder="Masukkan nomor telepon">
                    </div>
                    <label for="" class="col-md-3 col-form-label text-right">No HP.</label>
                    <div class="col-md-3">
                      <input type="text" name="nohp" id="nohp" class="form-control" placeholder="Masukkan nomor hp">
                    </div>
                  </div>                      
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Email</label>
                    <div class="col-md-9">
                      <input type="email" name="email" id="email" class="form-control" placeholder="contoh@gmail.com">
                    </div>
                  </div>                      
                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Url Facebook</label>
                    <div class="col-md-9">
                      <input type="text" name="facebook" id="facebook" class="form-control" placeholder="Masukkan url facebook">
                    </div>
                  </div>                      
                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Url Instagram</label>
                    <div class="col-md-9">
                      <input type="text" name="instagram" id="instagram" class="form-control" placeholder="Masukkan url instagram">
                    </div>
                  </div>  



                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Alamat Rumah</label>
                    <div class="col-md-9">
                      <textarea name="alamatrumah" id="alamatrumah" class="form-control" rows="2" placeholder="Masukkan alamat rumah"></textarea>
                    </div>
                  </div>                      
                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">RT/ RW</label>
                    <div class="col-md-2">
                      <input type="text" name="rtrw" id="rtrw" class="form-control" placeholder="000/000">
                    </div>
                  </div>                      
                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Kelurahan</label>
                    <div class="col-md-9">
                      <input type="text" name="kelurahan" id="kelurahan" class="form-control" placeholder="Masukkan kelurahan">
                    </div>
                  </div>                      
                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Kecamatan</label>
                    <div class="col-md-9">
                      <input type="text" name="kecamatan" id="kecamatan" class="form-control" placeholder="Masukkan kecamatan">
                    </div>
                  </div>                      
                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Kabupaten</label>
                    <div class="col-md-9">
                      <input type="text" name="kotakabupaten" id="kotakabupaten" class="form-control" placeholder="Masukkan kotakabupaten">
                    </div>
                  </div>                      
                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Propinsi</label>
                    <div class="col-md-9">
                      <input type="text" name="propinsi" id="propinsi" class="form-control" placeholder="Masukkan propinsi">
                    </div>
                  </div>                      
                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Kode Pos</label>
                    <div class="col-md-9">
                      <input type="text" name="kodepos" id="kodepos" class="form-control" placeholder="Masukkan kode pos">
                    </div>
                  </div>   
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Status Jemaat</label>
                    <div class="col-md-9">
                      <select name="statusjemaat" id="statusjemaat" class="form-control">
                        <option value="">Pilih status jemaat...</option>
                        <option value="Jemaat">Jemaat</option>
                        <option value="Simpatisan">Simpatisan</option>
                      </select>
                    </div>
                  </div> 
                  

                  <h3 class="text-gray mt-5">INFORMASI LOGIN</h3><hr>                    
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Username</label>
                    <div class="col-md-9">
                      <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username">
                    </div>
                  </div>                      
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">password</label>
                    <div class="col-md-9">
                      <input type="password" name="password" id="password" class="form-control" placeholder="*************">
                    </div>
                  </div>  
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Ulangi password</label>
                    <div class="col-md-9">
                      <input type="password" name="password2" id="password2" class="form-control" placeholder="*************">
                    </div>
                  </div>                      





                  <h3 class="text-gray mt-5">KONTAK DARURAT YANG BISA DIHUBUNGI</h3><hr>                    
                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Nama</label>
                    <div class="col-md-9">
                      <input type="text" name="namadarurat" id="namadarurat" class="form-control" placeholder="Masukkan namadarurat">
                    </div>
                  </div>                      
                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Hubungan</label>
                    <div class="col-md-9">
                      <select name="hubungan" id="hubungan" class="form-control">
                        <option value="">Pilih hubungan...</option>
                        <option value="Ayah">Ayah</option>
                        <option value="Ibu">Ibu</option>
                        <option value="Istri/ Suami">Istri/ Suami</option>
                        <option value="Anak">Anak</option>
                        <option value="Saudara">Saudara</option>
                        <option value="Kerabat">Kerabat</option>
                      </select>
                    </div>
                  </div>                      
                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">No Telp.</label>
                    <div class="col-md-9">
                      <input type="text" name="notelpdarurat" id="notelpdarurat" class="form-control" placeholder="Masukkan notelp darurat">
                    </div>
                  </div>                      



                  <h3 class="text-gray mt-5">Pendidikan dan Pekerjaan</h3><hr>                    
                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Pendidikan Terakhir</label>
                    <div class="col-md-9">
                      <select name="pendidikanterakhir" id="pendidikanterakhir" class="form-control">
                        <option value="">Pilih pendidikan terakhir</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA/ SMK">SMA/ SMK</option>
                        <option value="D1">D1</option>
                        <option value="D2">D2</option>
                        <option value="D3">D3</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                        <option value="Lainnya">Lainnya</option>
                      </select>
                    </div>
                  </div>                      
                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Nama Sekolah</label>
                    <div class="col-md-9">
                      <input type="text" name="namasekolah" id="namasekolah" class="form-control" placeholder="Masukkan nama sekolah">
                    </div>
                  </div>                      
                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Pekerjaan</label>
                    <div class="col-md-9">
                      <select name="pekerjaan" id="pekerjaan" class="form-control">
                        <option value="">Pilih pekerjaan...</option>
                        <option value="Swasta">Swasta</option>
                        <option value="Wiraswasta">Wiraswasta</option>
                        <option value="Pegawai Negeri">Pegawai Negeri</option>
                        <option value="TNI">TNI</option>
                        <option value="POLRI">POLRI</option>
                      </select>
                    </div>
                  </div>                      
                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Nama Perusahaan</label>
                    <div class="col-md-9">
                      <input type="text" name="namaperusahaan" id="namaperusahaan" class="form-control" placeholder="Masukkan nama perusahaan">
                    </div>
                  </div>                      
                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Sektor Industri</label>
                    <div class="col-md-9">
                      <input type="text" name="sektorindustri" id="sektorindustri" class="form-control" placeholder="Masukkan sektorindustri">
                    </div>
                  </div>                      
                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Alamat Kantor</label>
                    <div class="col-md-9">
                      <textarea name="alamatkantor" id="alamatkantor" class="form-control" rows="2" placeholder="Masukkan alamat kantor"></textarea>
                    </div>
                  </div>                      
                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">No Telepon Kantor</label>
                    <div class="col-md-9">
                      <input type="text" name="notelpkantor" id="notelpkantor" class="form-control" placeholder="Masukkan nomor telepon kantor">
                    </div>
                  </div>                      

                                       

              </div> <!-- ./card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?php echo(site_url('Jemaat')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
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
  
  var idjemaat = "<?php echo($idjemaat) ?>";

  $(document).ready(function() {

    $('.select2').select2();

    //---------------------------------------------------------> JIKA EDIT DATA
    if ( idjemaat != "" ) { 
          $.ajax({
              type        : 'POST', 
              url         : '<?php echo site_url("Jemaat/get_edit_data") ?>', 
              data        : {idjemaat: idjemaat}, 
              dataType    : 'json', 
              encode      : true
          })      
          .done(function(result) {
            $("#idjemaat").val(result.idjemaat);
            $("#noaj").val(result.noaj);
            $("#nik").val(result.nik);
            $("#kewarganegaraan").val(result.kewarganegaraan);
            $("#namalengkap").val(result.namalengkap);
            $("#namapanggilan").val(result.namapanggilan);
            $("#tempatlahir").val(result.tempatlahir);
            $("#tanggallahir").val(result.tanggallahir);
            $("#jeniskelamin").val(result.jeniskelamin);
            $("#statuspernikahan").val(result.statuspernikahan);
            $("#golongandarah").val(result.golongandarah);
            $("#notelp").val(result.notelp);
            $("#nohp").val(result.nohp);
            $("#email").val(result.email);
            $("#facebook").val(result.facebook);
            $("#instagram").val(result.instagram);
            $("#namadarurat").val(result.namadarurat);
            $("#hubungan").val(result.hubungan);
            $("#notelpdarurat").val(result.notelpdarurat);
            $("#pendidikanterakhir").val(result.pendidikanterakhir);
            $("#namasekolah").val(result.namasekolah);
            $("#pekerjaan").val(result.pekerjaan);
            $("#namaperusahaan").val(result.namaperusahaan);
            $("#sektorindustri").val(result.sektorindustri);
            $("#alamatkantor").val(result.alamatkantor);
            $("#notelpkantor").val(result.notelpkantor);
            $("#alamatrumah").val(result.alamatrumah);
            $("#rtrw").val(result.rtrw);
            $("#kelurahan").val(result.kelurahan);
            $("#kecamatan").val(result.kecamatan);
            $("#kotakabupaten").val(result.kotakabupaten);
            $("#propinsi").val(result.propinsi);
            $("#kodepos").val(result.kodepos);
            $("#foto").val(result.foto);
            $("#tanggalupdate").val(result.tanggalupdate);
            $("#username").val(result.username);
            $("#lastlogin").val(result.lastlogin);
            $("#statusjemaat").val(result.statusjemaat);
            $("#tanggalinsert").val(result.tanggalinsert);
          }); 


          $("#lbljudul").html("Edit Data Jemaat");
          $("#lblactive").html("Edit");

    }else{
          $("#lbljudul").html("Tambah Data Jemaat");
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
        nik: {
          validators:{
            notEmpty: {
                message: "nik tidak boleh kosong"
            },
          }
        },
        kewarganegaraan: {
          validators:{
            notEmpty: {
                message: "kewarganegaraan tidak boleh kosong"
            },
          }
        },
        namalengkap: {
          validators:{
            notEmpty: {
                message: "nama lengkap tidak boleh kosong"
            },
          }
        },
        namapanggilan: {
          validators:{
            notEmpty: {
                message: "nama panggilan tidak boleh kosong"
            },
          }
        },
        tempatlahir: {
          validators:{
            notEmpty: {
                message: "tempat lahir tidak boleh kosong"
            },
          }
        },
        tanggallahir: {
          validators:{
            notEmpty: {
                message: "tanggal lahir tidak boleh kosong"
            },
          }
        },
        jeniskelamin: {
          validators:{
            notEmpty: {
                message: "jenis kelamin tidak boleh kosong"
            },
          }
        },
        statuspernikahan: {
          validators:{
            notEmpty: {
                message: "status pernikahan tidak boleh kosong"
            },
          }
        },
        email: {
          validators:{
            notEmpty: {
                message: "email tidak boleh kosong"
            },
          }
        },
        username: {
          validators:{
            notEmpty: {
                message: "username tidak boleh kosong"
            },
          }
        },
        password: {
          validators:{
            notEmpty: {
                message: "password tidak boleh kosong"
            },
          }
        },
        password2: {
          validators:{
            notEmpty: {
                message: "ulangi password tidak boleh kosong"
            },
          }
        },
        statusjemaat: {
          validators:{
            notEmpty: {
                message: "status jemaat tidak boleh kosong"
            },
          }
        },  
        rtrw: {
          validators:{
            notEmpty: {
                message: "rtrw tidak boleh kosong ya mas bro"
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
