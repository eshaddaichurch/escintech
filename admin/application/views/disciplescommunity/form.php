<?php
$this->load->view("template/header");
$this->load->view("template/topmenu");
$this->load->view("template/sidemenu");
?>

<div class="row" id="toni-breadcrumb">
  <div class="col-6">
    <h4 class="text-dark mt-2">Disciples Community</h4>
  </div>
  <div class="col-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo (site_url()) ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo (site_url('Disciplescommunity')) ?>">Disciples Community</a></li>
      <li class="breadcrumb-item active" id="lblactive"></li>
    </ol>

  </div>
</div>

<div class="row" id="toni-content">
  <div class="col-md-12">



    <form action="<?php echo (site_url('disciplescommunity/simpan')) ?>" method="post" id="form" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-12">
          <div class="card" id="cardcontent">
            <div class="card-header">
              <h5 class=" card-title" id="lbljudul"></h5>
              <span class="text-lg float-right">ID: #<span id="lblID">None</span></span>
            </div>
            <div class="card-body">

              <div class="row">
                <div class="col-md-12">
                  <?php
                  $pesan = $this->session->flashdata("pesan");
                  if (!empty($pesan)) {
                    echo $pesan;
                  }
                  ?>
                </div>

                <div class="col-md-4">
                  <div class="card">
                    <div class="card-body">


                      <div class="form-group row text center">
                        <label for="" class="col-md-12 col-form-label">Gambar DC <small class="text-danger ml-2 font-weight-bold">(Maksimal 200 Kb)</small></label>
                        <div class="col-md-12 mt-3 text-center">
                          <img src="<?php echo base_url('images/nofoto.png'); ?>" id="output1" class="img-thumbnail" style="width:70%;max-height:70%;">
                          <div class="form-group">
                            <span class="btn btn-primary btn-file btn-block;" style="width:70%;">
                              <span class="fileinput-new"><span class="fa fa-camera"></span> Upload Gambar</span>
                              <input type="file" name="fotodc" id="fotodc" accept="image/*" onchange="loadFile1(event)">
                              <input type="hidden" value="" name="fotodc_lama" id="fotodc_lama" class="form-control" />
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
                  <div class="card">
                    <div class="card-body">
                      <input type="hidden" name="iddc" id="iddc" class="form-control" placeholder="Auto" readonly="">

                      <div class="form-group row required">
                        <label for="" class="col-md-3 col-form-label">Nama DC</label>
                        <div class="col-md-9">
                          <input type="text" name="namadc" id="namadc" class="form-control" placeholder="Masukkan Nama DC">
                        </div>
                      </div>

                      <div class="form-group row required">
                        <label for="" class="col-md-3 col-form-label">Kategori DC</label>
                        <div class="col-md-9">
                          <select name="kategoridc" id="kategoridc" class="form-control">
                            <option value="">Pilih Kategori DC...</option>
                            <option value="Youth">Youth</option>
                            <option value="Young Adult">Young Adult</option>
                            <option value="Kids">Kids</option>
                            <option value="Family">Family</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="" class="col-md-3 col-form-label">Nama DM</label>
                        <div class="col-md-9">
                          <select name="idjemaatdm" id="idjemaatdm" class="form-control select2">
                            <option value="">Pilih nama DM</option>
                            <?php
                            $rsjemaat = $this->db->query("select * from jemaat order by namalengkap");
                            if ($rsjemaat->num_rows() > 0) {
                              foreach ($rsjemaat->result() as $rowjemaat) {
                                echo '
                                      <option value="' . $rowjemaat->idjemaat . '">' . $rowjemaat->namalengkap . '</option>
                                    ';
                              }
                            }
                            ?>
                          </select>
                        </div>
                      </div>



                      <div class="form-group row required">
                        <label for="" class="col-md-3 col-form-label">Hari DC</label>
                        <div class="col-md-3">
                          <select name="haridc" id="haridc" class="form-control">
                            <option value="">Pilih Hari DC...</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                            <option value="Minggu">Minggu</option>
                          </select>
                        </div>
                        <label for="" class="col-md-3 col-form-label text-right">Jam DC</label>
                        <div class="col-md-3">
                          <select name="jamdc" id="jamdc" class="form-control">
                            <option value="">Pilih Jam DC...</option>
                            <option value="07.00">07.00</option>
                            <option value="08.00">08.00</option>
                            <option value="09.00">09.00</option>
                            <option value="10.00">10.00</option>
                            <option value="11.00">11.00</option>
                            <option value="12.00">12.00</option>
                            <option value="13.00">13.00</option>
                            <option value="14.00">14.00</option>
                            <option value="15.00">15.00</option>
                            <option value="16.00">16.00</option>
                            <option value="17.00">17.00</option>
                            <option value="18.00">18.00</option>
                            <option value="19.00">19.00</option>
                            <option value="20.00">20.00</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row required">
                        <label for="" class="col-md-3 col-form-label">Status Aktif</label>
                        <div class="col-md-3">
                          <select name="statusaktif" id="statusaktif" class="form-control">
                            <option value="">status</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-12">
                        <h5 class="text-muted">Lokasi DC</h5>
                      </div>

                      <div class="row">
                        <div class="col-md-4">
                          <label for="" class="">Kabupaten/Kota</label>
                          <select name="kotakabupaten" id="kotakabupaten" class="form-control select2">
                            <option value="">Pilih nama kabupaten ...</option>
                          </select>
                        </div>
                        <div class="col-md-4">
                          <label for="" class="">Kecamatan</label>
                          <select name="kecamatan" id="kecamatan" class="form-control select2">
                            <option value="">Pilih nama kecamatan ...</option>
                          </select>
                        </div>
                        <div class="col-md-4">
                          <label for="" class="">Kelurahan</label>
                          <select name="kelurahan" id="kelurahan" class="form-control select2">
                            <option value="">Pilih nama kelurahan ...</option>
                          </select>
                        </div>
                        <div class="col-12 mt-2">
                          <div class="form-group">
                            <label for="" class="">Alamat</label>
                            <textarea name="alamatdc" id="alamatdc" class="form-control" rows="2" placeholder="Masukkan alamat DC"></textarea>
                          </div>
                        </div>



                      </div>



                    </div>
                  </div>




                </div>
              </div>


            </div> <!-- ./card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
              <a href="<?php echo (site_url('disciplescommunity')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
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
  var iddc = "<?php echo $iddc ?>";


  $(document).ready(function() {

    $('.select2').select2();

    //---------------------------------------------------------> JIKA EDIT DATA
    if (iddc != "") {
      $.ajax({
          type: 'POST',
          url: '<?php echo site_url("Disciplescommunity/get_edit_data") ?>',
          data: {
            iddc: iddc
          },
          dataType: 'json',
          encode: true
        })
        .done(function(result) {
          console.log(result);

          $("#lblID").html(result.iddc);
          $("#iddc").val(result.iddc);
          $("#namadc").val(result.namadc);
          $("#idjemaatdm").val(result.idjemaatdm).trigger('change');
          $("#kategoridc").val(result.kategoridc);
          $("#haridc").val(result.haridc);
          $("#jamdc").val(result.jamdc);
          $("#alamatdc").val(result.alamatdc);
          $("#fotodc").val(result.fotodc);
          $("#fotodc_lama").val(result.fotodc);
          $("#statusaktif").val(result.statusaktif);
          $('#fotodclink').html(result.fotodc);
          $('#fotodclink').prop('href', '<?= base_url("uploads/dc/") ?>' + result.fotodc);
          console.log('<?= base_url("uploads/dc/") ?>' + result.fotodc);

        });


      $("#lbljudul").html("Edit Data Disciples Community");
      $("#lblactive").html("Edit");

    } else {
      $("#lbljudul").html("Tambah Data Disciples Community");
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
        namadc: {
          validators: {
            notEmpty: {
              message: "nama dc tidak boleh kosong"
            },
          }
        },
        kategoridc: {
          validators: {
            notEmpty: {
              message: "kategori dc tidak boleh kosong"
            },
          }
        },
      }
    });
    //------------------------------------------------------------------------> END VALIDASI DAN SIMPAN


    $("form").attr('autocomplete', 'off');
    $("#rtrw").mask("000/000", {
      placeholder: "000/000"
    });
  }); //end (document).ready
</script>

</body>

</html>