 <?php  
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");
?>


<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Akta Penyerahan Anak</h4>
    </div>  
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo(site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo(site_url('aktapenyerahananak')) ?>">Akta Penyerahan Anak</a></li>
        <li class="breadcrumb-item active" id="lblactive"></li>
      </ol>
      
    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12">



      <form action="<?php echo(site_url('aktapenyerahananak/simpan')) ?>" method="post" id="form" enctype="multipart/form-data">                      
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

                  <h3 class="text-gray">Data Akta Penyerahan Anak</h3><hr>                    

                  <input type="hidden" name="idakta" id="idakta">                      

                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Nomor Akta</label>
                    <div class="col-md-9">
                      <input type="text" name="noakta" id="noakta" class="form-control" placeholder="Nomor akta" autofocus="">
                    </div>
                  </div>                      
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Tanggal Akta</label>
                    <div class="col-md-3">
                      <input type="date" name="tglakta" id="tglakta" class="form-control" value="<?php echo date('Y-m-d') ?>">
                    </div>
                  </div>

                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Dilakukan Oleh</label>
                    <div class="col-md-9">
                      <input type="text" name="dilakukanoleh" id="dilakukanoleh" class="form-control" placeholder="Dilakukan oleh" value="<?php echo GEMBALAGEREJA ?>">
                    </div>
                  </div>

                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Nama Ayah</label>
                    <div class="col-md-9">
                      <select name="idjemaatayah" id="idjemaatayah" class="form-control select2">
                        <option value="">Pilih nama ayah ...</option>
                        <?php  
                          $rsJemaatAyah = $this->App->getJemaat();
                          if ($rsJemaatAyah->num_rows()>0) {
                            foreach ($rsJemaatAyah->result() as $row) {
                              echo '
                                  <option value="'.$row->idjemaat.'">'.$row->namalengkap.'</option>
                              ';
                            }
                          }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Nama Ibu</label>
                    <div class="col-md-9">
                      <select name="idjemaatibu" id="idjemaatibu" class="form-control select2">
                        <option value="">Pilih nama ibu ...</option>
                        <?php  
                          $rsJemaatIbu = $this->App->getJemaat();
                          if ($rsJemaatIbu->num_rows()>0) {
                            foreach ($rsJemaatIbu->result() as $row) {
                              echo '
                                  <option value="'.$row->idjemaat.'">'.$row->namalengkap.'</option>
                              ';
                            }
                          }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Nama Anak</label>
                    <div class="col-md-9">
                      <select name="idjemaatanak" id="idjemaatanak" class="form-control select2">
                        <option value="">Pilih nama anak ...</option>
                        <?php  
                          $rsJemaatAnak = $this->App->getJemaat();
                          if ($rsJemaatAnak->num_rows()>0) {
                            foreach ($rsJemaatAnak->result() as $row) {
                              echo '
                                  <option value="'.$row->idjemaat.'">'.$row->namalengkap.'</option>
                              ';
                            }
                          }
                        ?>
                      </select>
                    </div>
                  </div>



                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Nama Daerah TTD</label>
                    <div class="col-10 col-md-8">
                      <select name="iddaerahakta" id="iddaerahakta" class="form-control select2">
                        <option value="">Pilih nama daerah tanda tangan ...</option>
                        <?php  
                          $rsTTD = $this->App->getDaerahAkta();
                          if ($rsTTD->num_rows()>0) {
                            foreach ($rsTTD->result() as $row) {
                              echo '
                                  <option value="'.$row->iddaerahakta.'">'.$row->namadaerahakta.'</option>
                              ';
                            }
                          }
                        ?>
                      </select>
                    </div>
                    <div class="col-2 col-md-1">
                      <button class="btn btn-primary" data-toggle="modal" data-target="#daerahModal"><i class="fa fa-plus"></i></button>
                    </div>
                  </div>

                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Cabang GBI</label>
                    <div class="col-10 col-md-8">
                      <select name="idcabangakta" id="idcabangakta" class="form-control select2">
                        <option value="">Pilih cabang GBI ...</option>
                        <?php  
                          $rsCabangAkta = $this->App->getCabangAkta();
                          if ($rsCabangAkta->num_rows()>0) {
                            foreach ($rsCabangAkta->result() as $row) {
                              echo '
                                  <option value="'.$row->idcabangakta.'">'.$row->namacabangakta.'</option>
                              ';
                            }
                          }
                        ?>
                      </select>
                    </div>
                    <div class="col-2 col-md-1">
                      <button class="btn btn-primary" data-toggle="modal" data-target="#cabangModal"><i class="fa fa-plus"></i></button>
                    </div>
                  </div>


                                

              </div> <!-- ./card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?php echo(site_url('aktapenyerahananak')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
              </div>
            </div> <!-- /.card -->
          </div> <!-- /.col -->
        </div>
      </form>





    </div>
  </div> <!-- /.row -->
  <!-- Main row -->



<?php $this->load->view("template/footer") ?>


<div class="modal fade" id="daerahModal" tabindex="-1" role="dialog" aria-labelledby="daerahModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Nama Daerah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <div class="form-group">
              <label>Nama Daerah</label>
              <input type="text" name="namadaerah" id="namadaerah" class="form-control" placeholder="nama daerah">
            </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btnSimpanDaerah">Simpan</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="cabangModal" tabindex="-1" role="dialog" aria-labelledby="cabangModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Nama Cabang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <div class="form-group">
              <label>Nama Cabang</label>
              <input type="text" name="namacabang" id="namacabang" class="form-control" placeholder="nama cabang">
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-12">
                  <label>Format Nomor</label>
                </div>
                <div class="col-12">
                  <input type="text" name="formatnomorakta" id="formatnomorakta" class="form-control" placeholder="format nomor">
                </div>
              </div>
            </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btnSimpanCabang">Simpan</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  
  var idakta = "<?php echo($idakta) ?>";

  $(document).ready(function() {

    $('.select2').select2();

    //---------------------------------------------------------> JIKA EDIT DATA
    if ( idakta != "" ) {

          $.ajax({
              type        : 'POST', 
              url         : '<?php echo site_url("aktapenyerahananak/get_edit_data") ?>', 
              data        : {idakta: idakta}, 
              dataType    : 'json', 
              encode      : true
          })      
          .done(function(result) {
            // console.log(result);
            $("#idakta").val(result.idakta);
            $("#noakta").val(result.noakta);
            $("#dilakukanoleh").val(result.dilakukanoleh);
            $("#idjemaatanak").val(result.idjemaatanak).trigger('change');
            $("#idjemaatayah").val(result.idjemaatayah).trigger('change');
            $("#idjemaatibu").val(result.idjemaatibu).trigger('change');
            $("#iddaerahakta").val(result.iddaerahakta).trigger('change');
            $("#idcabangakta").val(result.idcabangakta).trigger('change');
          }); 


          $("#lbljudul").html("Edit Data Akta Penyerahan Anak");
          $("#lblactive").html("Edit");

    }else{
          $("#lbljudul").html("Tambah Data Akta Penyerahan Anak");
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
        noakta: {
          validators:{
            notEmpty: {
                message: "nomor akta tidak boleh kosong"
            },
          }
        },
        tglakta: {
          validators:{
            notEmpty: {
                message: "tanggal akta tidak boleh kosong"
            },
          }
        },
        dilakukanoleh: {
          validators:{
            notEmpty: {
                message: "dilakukan oleh tidak boleh kosong"
            },
          }
        },
        idjemaatayah: {
          validators:{
            notEmpty: {
                message: "Nama ayah tidak boleh kosong"
            },
          }
        },
        idjemaatibu: {
          validators:{
            notEmpty: {
                message: "Nama ibu tidak boleh kosong"
            },
          }
        },
        idjemaatanak: {
          validators:{
            notEmpty: {
                message: "Nama anak tidak boleh kosong"
            },
          }
        },
        iddaerahakta: {
          validators:{
            notEmpty: {
                message: "Nama daerah tidak boleh kosong"
            },
          }
        },
        idcabangakta: {
          validators:{
            notEmpty: {
                message: "Nama cabang tidak boleh kosong"
            },
          }
        },
      }
    });
  //------------------------------------------------------------------------> END VALIDASI DAN SIMPAN


    $("form").attr('autocomplete', 'off');
    $("#rtrw").mask("000/000", {placeholder:"000/000"});
  }); //end (document).ready
  

  $('#btnSimpanDaerah').click(function (e) {
    e.preventDefault();
    $('#btnSimpanDaerah').attr("disabled", true);

    var namadaerah = $('#namadaerah').val();
    $.ajax({
      url: '<?php echo site_url('aktapenyerahananak/simpandaerah') ?>',
      type: 'POST',
      dataType: 'json',
      data: {'namadaerah': namadaerah},
    })
    .done(function(result) {
      console.log("success");
      if (result.success) {
        $('#daerahModal').modal('hide');
        swal("Bershasil", "Data berhasil disimpan", "success");
      } else {
        swal("Gagal", result.msg, "error");
        $('#btnSimpanDaerah').attr("disabled", false);
      }
    })
    .fail(function() {
      console.log("gagal simpandaerah");
      $('#btnSimpanDaerah').attr("disabled", false);
    });
    
  });


  $('#btnSimpanCabang').click(function (e) {
    e.preventDefault();
    $('#btnSimpanCabang').attr("disabled", true);

    var namacabang = $('#namacabang').val();
    var formatnomorakta = $('#formatnomorakta').val();

    $.ajax({
      url: '<?php echo site_url('aktapenyerahananak/simpancabang') ?>',
      type: 'POST',
      dataType: 'json',
      data: {'namacabang': namacabang, 'formatnomorakta': formatnomorakta},
    })
    .done(function(result) {
      console.log("success");
      if (result.success) {
        $('#cabangModal').modal('hide');
        swal("Bershasil", "Data berhasil disimpan", "success");
      } else {
        swal("Gagal", result.msg, "error");
        $('#btnSimpanCabang').attr("disabled", false);
      }
    })
    .fail(function() {
      console.log("gagal simpandaerah");
      $('#btnSimpanCabang').attr("disabled", false);
    });
    
  });
</script>

</body>
</html>
