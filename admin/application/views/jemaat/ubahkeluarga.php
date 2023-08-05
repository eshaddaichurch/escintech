 <?php  
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");
?>


<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Ubah Keluarga</h4>
    </div>  
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo(site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo(site_url('Jemaat')) ?>">Jemaat</a></li>
        <li class="breadcrumb-item active" id="lblactive"></li>
      </ol>
      
    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12">



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

                  <div class="row">

                    <div class="col-6">
                      <table class="table">
                        <thead>
                          <tr>
                            <td>Nama Jemaat</td>
                            <td>:</td>
                            <td><?php echo $rowjemaat->namalengkap ?></td>
                          </tr>
                          <tr>
                            <td>Tempat/ Tgl Lahir</td>
                            <td>:</td>
                            <td><?php echo $rowjemaat->tempatlahir.'/ '.tglindonesialengkap($rowjemaat->tanggallahir) ?></td>
                          </tr>
                          <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td><?php echo $rowjemaat->jeniskelamin ?></td>
                          </tr>
                        </thead>
                      </table>
                    </div>
                    <div class="col-6">
                      <table class="table">
                        <thead>
                          <tr>
                            <td>No AJ</td>
                            <td>:</td>
                            <td><?php echo $rowjemaat->noaj ?></td>
                          </tr>
                          <tr>
                            <td>NIK</td>
                            <td>:</td>
                            <td><?php echo $rowjemaat->nik ?></td>
                          </tr>
                          <tr>
                            <td>No HP</td>
                            <td>:</td>
                            <td><?php echo $rowjemaat->nohp ?></td>
                          </tr>
                        </thead>
                      </table>
                    </div>

                    <div class="col-12"><hr></div>
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <div class="row">
                            <div class="col-md-10">
                              <h5>List Anggota Keluarga</h5>
                              <h3>No Keluarga : <?php echo $rsCekKeluarga->row()->nokaj ?></h3>
                            </div>
                            <div class="col-md-2">
                              <button class="btn btn-md btn-primary float-right mt-4" id="btnTambahKeluarga"><i class="fa fa-plus"></i> Tambah Keluarga</button>
                            </div>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="row">
                              <?php 
                                $idjemaatfamily = '';
                                $namaKepalaKeluarga = '-';

                                
                                if ($rsCekKeluarga->num_rows()>0) {
                                  $idjemaatfamily = $rsCekKeluarga->row()->idjemaatfamily;

                                  $rowKepalaKeluarga = $this->db->query("
                                      select * from v_jemaatfamily where nokaj='".$rsCekKeluarga->row()->nokaj."' and idhubunganfamily='A01'
                                    ");

                                  if ($rowKepalaKeluarga->num_rows()>0) {
                                    $namaKepalaKeluarga = $rowKepalaKeluarga->row()->namalengkap;
                                  }


                                }

                              ?>
                              <div class="col-4">  
                                <h5>Kepala Keluarga</h5>
                                <ul>
                                    <li><?php echo $namaKepalaKeluarga ?></li>
                                </ul>
                              </div>
                              <div class="col-4">  
                                <h5>Istri dan Anak</h5>
                                <ul> 
                                    <?php  
              

                                      $rsIstriAnak = $this->db->query("select * from v_jemaatfamily 
                                                        where nokaj='".$rsCekKeluarga->row()->nokaj."' 
                                                        and idhubunganfamily in ('B01', 'C01')
                                                        order by idhubunganfamily asc
                                                  ");
                                      if ($rsIstriAnak->num_rows()>0) {
                                        foreach ($rsIstriAnak->result() as $rowIstriAnak) {
                                          echo '
                                            <li><span class="badge badge-secondary">'.$rowIstriAnak->namahubungan.'</span> &nbsp;&nbsp;<a href="'.site_url('jemaat/hapusfamily/'.$this->encrypt->encode($rowIstriAnak->idjemaat)).'" id="btnHapusFamily" data-idjemaat="'.$rowIstriAnak->idjemaat.'"><i class="fa fa-trash text-danger"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;'.$rowIstriAnak->namalengkap.' </li> 
                                          ';
                                        }
                                      }
                                    ?>

                                </ul>
                              </div> 
                              <div class="col-4">  
                                <h5>Keluarga Lainnya</h5>
                                <ul> 
                                    <?php  
                                      $rsKeluargaLainnya = $this->db->query("select * from v_jemaatfamily 
                                                        where nokaj='".$rsCekKeluarga->row()->nokaj."' 
                                                        and idhubunganfamily in ('D01')
                                                        order by idhubunganfamily asc
                                                  ");
                                      if ($rsKeluargaLainnya->num_rows()>0) {
                                        foreach ($rsKeluargaLainnya->result() as $rowKeluargaLainnya) {
                                          echo '
                                            <li><span class="badge badge-secondary">'.$rowKeluargaLainnya->namahubungan.'</span> &nbsp;&nbsp;<a href="'.site_url('jemaat/hapusfamily/'.$this->encrypt->encode($rowKeluargaLainnya->idjemaat)).'" id="btnHapusFamily" data-idjemaat="'.$rowKeluargaLainnya->idjemaat.'"><i class="fa fa-trash text-danger"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;'.$rowKeluargaLainnya->namalengkap.'</li> 
                                          ';
                                        }
                                      }
                                    ?>
                                </ul>
                              </div> 
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>


                      


                                       

              </div> <!-- ./card-body -->

            </div> <!-- /.card -->
          </div> <!-- /.col -->
        </div>





    </div>
  </div> <!-- /.row -->
  <!-- Main row -->



<?php $this->load->view("template/footer") ?>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalTambahKeluarga">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Tambah Keluarga</h5>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('jemaat/simpanubahkeluarga') ?>" method="POST">
          <input type="hidden" name="idjemaat" id="idjemaat">                      
          <div class="form-group row">
            <label for="" class="col-md-3 col-form-label">Nama Jemaat</label>
            <div class="col-md-9">
              <select name="idjemaatfamily" id="idjemaatfamily" class="form-control select2">
                <option value="">Pilih nama jemaat...</option>
                <?php 
                  $rsJemaat = $this->App->getJemaat();
                  if ($rsJemaat->num_rows()>0) {
                    foreach ($rsJemaat->result() as $row) {
                      echo '
                        <option value="'.$row->idjemaat.'">'.$row->namalengkap.'</option>
                      ';
                    }
                  }
                ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="" class="col-md-3 col-form-label">Hubungan Keluarga</label>
            <div class="col-md-9">
              <select name="idhubunganfamily" id="idhubunganfamily" class="form-control">
                <option value="">Pilih hubungan keluarga...</option>
                <?php 
                  $rshubungan = $this->db->query("select * from hubunganfamily where statusaktif='Aktif' order by idhubunganfamily");
                  if ($rshubungan->num_rows()>0) {
                    foreach ($rshubungan->result() as $row) {
                      echo '
                        <option value="'.$row->idhubunganfamily.'">'.$row->namahubungan.'</option>
                      ';
                    }
                  }
                ?>
              </select>
            </div>
          </div> 
          <div class="form-group row">
            <div class="col-12">
              <button type="submit" class="btn btn-success btn-md float-right"><i class="fa fa-save"></i> Simpan</button>
              <button type="button" class="btn btn-default btn-md float-right mr-1" id="btnbatal">Batal</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

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
      }
    });
  //------------------------------------------------------------------------> END VALIDASI DAN SIMPAN


    $("form").attr('autocomplete', 'off');
    $("#rtrw").mask("000/000", {placeholder:"000/000"});
  }); //end (document).ready
  

  $('#btnTambahKeluarga').click(function(e) {

    $('#modalTambahKeluarga').modal('show');
    $('#idjemaat').val(idjemaat);
  });
  

  $('#btnbatal').click(function(event) {
    $('#modalTambahKeluarga').modal('hide');
  });
  


  $(document).on("click", "#btnHapusFamily", function(e) {
    var idjemaat = $(this).val();
    var link = $(this).attr("href");
    e.preventDefault();

    bootbox.confirm("Anda yakin ingin menghapus data ini ?", function(result) {
      if (result) {

        document.location.href = link;

        // $.ajax({
        //   url: '<?php echo site_url('jemaat/hapusfamily') ?>',
        //   type: 'GET',
        //   dataType: 'json',
        //   data: {'idjemaat': 'idjemaat'},
        // })
        // .done(function(hapusfamilyResult) {
        //   console.log();
        // })
        // .fail(function() {
        //   console.log("error");
        // });
        
      }
    });
  });  

</script>

</body>
</html>
