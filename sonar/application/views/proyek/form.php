<?php
$this->load->view("template/header");
$this->load->view("template/topmenu");
$this->load->view("template/sidemenu");
?>

<style>
  .card-pengguna-detail:focus {
      background-image: linear-gradient(90deg, #F56D09 5%, #FFB225 60%) !important;
      outline: 1px solid blue !important;
  }
  .card-pengguna-detail:hover {
      background: #87E9E6;
      outline: 1px solid blue !important;
  }
</style>

<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Proyek</h4>
    </div>
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo (site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo (site_url('Proyek')) ?>">Proyek</a></li>
        <li class="breadcrumb-item active" id="lblactive"></li>
      </ol>

    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12">
      <form action="<?php echo (site_url('Proyek/simpan')) ?>" method="post" id="form">
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
                  <div class="row">
                    <div class="col-md-8">
                        <input type="hidden" name="idproyek" id="idproyek">
                        <div class="form-group row required">
                          <label for="" class="col-md-3 col-form-label">Nama Proyek</label>
                          <div class="col-md-9">
                            <input type="text" name="namaproyek" id="namaproyek" class="form-control" placeholder="Masukkan namaproyek">
                          </div>
                        </div>
                        <div class="form-group row required">
                          <label for="" class="col-md-3 col-form-label">Nama Client</label>
                          <div class="col-md-9">
                            <input type="text" name="client" id="client" class="form-control" placeholder="Masukkan nama client">
                          </div>
                        </div>
                        <div class="form-group row required">
                          <label for="" class="col-md-3 col-form-label">Alamat Client</label>
                          <div class="col-md-9">
                            <textarea name="alamatclient" id="alamatclient" class="form-control" rows="3" placeholder="Masukkan alamat client"></textarea>
                          </div>
                        </div>

                        <div class="form-group row required">
                          <label for="" class="col-md-3 col-form-label">Nama Project Manager</label>
                          <div class="col-md-9">
                            <select name="idprojectmanager" id="idprojectmanager" class="form-control select2">
                              <option value="">--Pilih nama project manager--</option>
                              <?php
$rsprojectmanager = $this->db->query("select * from pengguna order by idpengguna");
if ($rsprojectmanager->num_rows() > 0) {
    foreach ($rsprojectmanager->result() as $row) {
        echo '
                                      <option value="' . $row->idpengguna . '">' . $row->nama . '</option>
                                    ';
    }
}
?>
                            </select>
                          </div>
                        </div>

                        <div class="form-group row required">
                          <label for="" class="col-md-3 col-form-label">Keterangan Proyek</label>
                          <div class="col-md-9">
                            <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control" placeholder="Masukkan keterangan proyek"></textarea>
                          </div>
                        </div>
                    </div>


                    <div class="col-md-4">
                      <div class="card">
                        <div class="card-header">
                          <h5 class="card-title">Pilih Pengguna Yang Bertugas</h5>
                        </div>
                        <div class="card-body">

                          <?php
$rspengguna = $this->db->query("select * from pengguna order by nama asc");
if ($rspengguna->num_rows() > 0) {
    $nourut = 1;
    foreach ($rspengguna->result() as $rowpengguna) {

        echo '
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="idpengguna[]" value="' . $rowpengguna->idpengguna . '" id="idpengguna' . $rowpengguna->idpengguna . '">
                                      <label class="form-check-label" for="idpengguna' . $rowpengguna->idpengguna . '">
                                        ' . $rowpengguna->nama . '
                                      </label>
                                    </div>
                                  ';
    }
}
?>

                        </div>
                      </div>
                    </div>


                  </div>




              </div> <!-- ./card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?php echo (site_url('Proyek')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
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

  var idproyek = "<?php echo ($idproyek) ?>";

  $(document).ready(function() {

    $('.select2').select2();

    //---------------------------------------------------------> JIKA EDIT DATA
    if ( idproyek != "" ) {
          $.ajax({
              type        : 'POST',
              url         : '<?php echo site_url("Proyek/get_edit_data") ?>',
              data        : {idproyek: idproyek},
              dataType    : 'json',
              encode      : true
          })
          .done(function(result) {

            $("#idproyek").val(result.data.idproyek);
            $("#namaproyek").val(result.data.namaproyek);
            $("#client").val(result.data.client);
            $("#alamatclient").val(result.data.alamatclient);
            $("#deskripsi").val(result.data.deskripsi);
            $("#idprojectmanager").val(result.data.idprojectmanager).change();

            if (result.dataDetail.length>0) {

              $.each(result.dataDetail, function(index, val) {
                  // console.log(val['idpengguna']);
                 $('#idpengguna'+val['idpengguna']).attr("checked", true);
              });

            }

          });


          $("#lbljudul").html("Edit Data Proyek");
          $("#lblactive").html("Edit");

    }else{
          $("#lbljudul").html("Tambah Data Proyek");
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
        namaproyek: {
          validators:{
            notEmpty: {
                message: "namaproyek tidak boleh kosong"
            },
          }
        },
        client: {
          validators:{
            notEmpty: {
                message: "client tidak boleh kosong"
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
        idprojectmanager: {
          validators:{
            notEmpty: {
                message: "nama project manager tidak boleh kosong"
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
