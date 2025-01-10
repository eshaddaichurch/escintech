<?php
$this->load->view("template/header");
$this->load->view("template/topmenu");
$this->load->view("template/sidemenu");
?>


<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Tugas</h4>
    </div>
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo (site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo (site_url('task')) ?>">Tugas</a></li>
        <li class="breadcrumb-item active" id="lblactive"></li>
      </ol>

    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12">
      <form action="<?php echo (site_url('task/simpan')) ?>" method="post" id="form" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-12">
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

                  <input type="hidden" name="idtask" id="idtask">
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Nama Proyek</label>
                    <div class="col-md-9">
                      <select name="idproyek" id="idproyek" class="form-control select2">
                        <option value="">--Pilih nama proyek--</option>
                        <?php
$rsproyek = $this->db->query("select * from proyek order by namaproyek");
if ($rsproyek->num_rows() > 0) {
    foreach ($rsproyek->result() as $row) {
        echo '
                                <option value="' . $row->idproyek . '">' . $row->namaproyek . '</option>
                              ';
    }
}
?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">List Modul Proyek</label>
                    <div class="col-md-9">
                      <select name="idproyeklist" id="idproyeklist" class="form-control select2">
                        <option value="">--Pilih list modul proyek--</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Kategori Tugas</label>
                    <div class="col-md-9">
                      <select name="idkategori" id="idkategori" class="form-control select2">
                        <option value="">--Kategori tugas--</option>
                        <?php
$rskategori = $this->db->query("select * from kategori order by idkategori");
if ($rskategori->num_rows() > 0) {
    foreach ($rskategori->result() as $row) {
        echo '<option value="' . $row->idkategori . '">' . $row->namakategori . '</option>';
    }
}
?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Judul Tugas</label>
                    <div class="col-md-9">
                      <textarea name="namatask" id="namatask" class="form-control" rows="2" placeholder="Masukkan Judul Tugas"></textarea>
                    </div>
                  </div>
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Deskripsi Tugas</label>
                    <div class="col-md-9">
                      <textarea name="deskripsi" id="Deskripsi" class="form-control" rows="4" placeholder="Masukkan deskripsi tugas"></textarea>
                    </div>
                  </div>
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Assignment</label>
                    <div class="col-md-9">
                      <select name="assignment" id="assignment" class="form-control select2">
                        <option value="">--Pilih assignment--</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Prioritas</label>
                    <div class="col-md-9">
                      <select name="prioritas" id="prioritas" class="form-control">
                        <option value="">--Pilih tingkat prioritas tugas--</option>
                        <option value="Rendah">Rendah</option>
                        <option value="Sedang">Sedang</option>
                        <option value="Tinggi">Tinggi</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Estimasi Lama Pengerjaan</label>
                    <div class="col-md-3">
                      <input type="number" name="estimasilamapengerjaan" id="estimasilamapengerjaan" class="form-control" value="3">
                    </div>
                    <label for="" class="col-md-2 col-form-label">(Hari))</label>
                  </div>
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Lampirkan File</label>
                    <div class="col-md-9">
                      <input type="file" name="file" id="file">
                    </div>
                  </div>

                  <div class="form-group row required" style="display: none;">
                    <label for="" class="col-md-3 col-form-label">Status Task</label>
                    <div class="col-md-9">
                      <select name="statustask" id="statustask" class="form-control">
                        <option value="Baru">Baru</option>
                        <option value="Sedang Diproses">Sedang Diproses</option>
                        <option value="Sudah Selesai">Sudah Selesai</option>
                      </select>
                    </div>
                  </div>
              </div> <!-- ./card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?php echo (site_url('task')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
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

  var idtask = "<?php echo ($idtask) ?>";

  $(document).ready(function() {

    $('.select2').select2();

    //---------------------------------------------------------> JIKA EDIT DATA
    if ( idtask != "" ) {
          $.ajax({
              type        : 'POST',
              url         : '<?php echo site_url("task/get_edit_data") ?>',
              data        : {idtask: idtask},
              dataType    : 'json',
              encode      : true
          })
          .done(function(result) {
            $("#idtask").val(result.idtask);
            $("#idproyek").val(result.idproyek).change();
            $("#idproyeklist").val(result.idproyeklist);
            $("#namatask").val(result.namatask);
            $("#idprojectmanager").val(result.idprojectmanager);
            $("#deskripsi").val(result.deskripsi);
            $("#idkategori").val(result.idkategori);
            $("#idprogrammer").val(result.idprogrammer);
            $("#prioritas").val(result.prioritas);
            $("#tglmulai").val(result.tglmulai);
            $("#tglselesai").val(result.tglselesai);
            $("#file").val(result.file);
            $("#assignment").val(result.assignment);
            $("#statustask").val(result.statustask);
          });


          $("#lbljudul").html("Edit Data Tugas");
          $("#lblactive").html("Edit");

    }else{
          $("#lbljudul").html("Tambah Data Tugas");
          $("#lblactive").html("Tambah");

          CKEDITOR.replace('deskripsi' ,{
              filebrowserImageBrowseUrl : '<?php echo base_url('../uploads/task'); ?>',
              height : ['400px'],
            });
    }

    //----------------------------------------------------------------- > validasi
    $("#form").bootstrapValidator({
      feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
        idproyeklist: {
          validators:{
            notEmpty: {
                message: "idproyeklist tidak boleh kosong"
            },
          }
        },
        namatask: {
          validators:{
            notEmpty: {
                message: "namatask tidak boleh kosong"
            },
          }
        },
        idprojectmanager: {
          validators:{
            notEmpty: {
                message: "idprojectmanager tidak boleh kosong"
            },
          }
        },
        deskripsi: {
          validators:{
            notEmpty: {
                message: "deskripsi tidak boleh kosong"
            },
          }
        },
        idkategori: {
          validators:{
            notEmpty: {
                message: "idkategori tidak boleh kosong"
            },
          }
        },
        idprogrammer: {
          validators:{
            notEmpty: {
                message: "idprogrammer tidak boleh kosong"
            },
          }
        },
        prioritas: {
          validators:{
            notEmpty: {
                message: "prioritas tidak boleh kosong"
            },
          }
        },
        tglmulai: {
          validators:{
            notEmpty: {
                message: "tglmulai tidak boleh kosong"
            },
          }
        },
        tglselesai: {
          validators:{
            notEmpty: {
                message: "tglselesai tidak boleh kosong"
            },
          }
        },
        assignment: {
          validators:{
            notEmpty: {
                message: "assignment tidak boleh kosong"
            },
          }
        },
        statustask: {
          validators:{
            notEmpty: {
                message: "statustask tidak boleh kosong"
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


  $('#idproyek').change(function() {
    var idproyek = $(this).val();

    $.ajax({
      url: '<?php echo (site_url('task/ajax_getlistproyek')) ?>',
      type: 'GET',
      dataType: 'json',
      data: {'idproyek': idproyek},
    })
    .done(function(resultproyek) {

      $("#idproyeklist").empty();
      $("#idproyeklist").append( new Option('--Pilih list modul proyek--', '') );


      if (resultproyek.length>0 ) {

        $.each(resultproyek, function(index, val) {
                 $("#idproyeklist").append( new Option(resultproyek[index]['namaproyeklist'], resultproyek[index]['idproyeklist']) );
              });


      }

    })
    .fail(function() {
      console.log("error");
    });


    $.ajax({
      url: '<?php echo (site_url('task/ajax_getassignment')) ?>',
      type: 'GET',
      dataType: 'json',
      data: {'idproyek': idproyek},
    })
    .done(function(resultassignment) {

      $("#assignment").empty();
      $("#assignment").append( new Option('--Pilih assignment--', '') );


      if (resultassignment.length>0 ) {

        $.each(resultassignment, function(index, val) {
                 $("#assignment").append( new Option(resultassignment[index]['nama'], resultassignment[index]['id']) );
              });


      }

    })
    .fail(function() {
      console.log("error");
    });



  });
</script>

</body>
</html>
