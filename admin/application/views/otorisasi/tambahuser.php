 

 <?php  
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");
?>


<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Otorisasi</h4>
    </div>  
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo(site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo(site_url('otorisasi')) ?>">Otorisasi</a></li>
        <li class="breadcrumb-item active">Tambah User <?php echo $rowOtorisasi->namaotorisasi ?></li>
      </ol>
      
    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12">



      
        <div class="row">
          <div class="col-md-12">
            <div class="card" id="cardcontent">
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
                    
                    <div class="col-12">
                      <h3 class="text-gray">Data User <?php echo $rowOtorisasi->namaotorisasi ?></h3><hr>                    
                    </div>

                    <div class="col-md-12">
                      <form action="<?php echo(site_url('otorisasi/simpanotorisasiuser')) ?>" method="post" id="form">                      
                        <input type="hidden" name="idotorisasi" id="idotorisasi" value="<?php echo $idotorisasi ?>">   
                        <div class="form-group row">
                          <label for="" class="col-md-2">Pilih Nama User</label>
                          <div class="col-md-8">
                            <select name="idjemaat" id="idjemaat" class="form-control select2">
                              <option value="">Pilih nama jemaat...</option>
                              <?php  
                                $rsJemaat = $this->App->getJemaat('', 'Jemaat');
                                if ($rsJemaat->num_rows()>0) {
                                  foreach ($rsJemaat->result() as $rowJemaat) {
                                    echo '
                                      <option value="'.$rowJemaat->idjemaat.'">'.$rowJemaat->namalengkap.'</option>
                                    ';
                                  }
                                }
                              ?>
                            </select>
                          </div>
                          <div class="col-md-2">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambahkan</button>
                          </div>
                        </div>
                      </form>                      
                    </div>

                    <div class="col-12 mt-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-12">
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th style="width: 5%; text-align: center;">No</th>
                                    <th style="text-align: left;">Nama User</th>
                                    <th style="width: 15%; text-align: center;">Aksi</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php  
                                    if ($rsUser->num_rows()>0) {
                                      $no=1;
                                      foreach ($rsUser->result() as $row) {
                                        echo '
                                          <tr>
                                            <td style="width: 5%; text-align: center;">'.$no++.'</td>
                                            <td style="text-align: left;">'.$row->namalengkap.'</td>
                                            <td style="width: 15%; text-align: center;"><a href="'.site_url('otorisasi/hapusotorisasiuser/'.$this->encrypt->encode($idotorisasi).'/'.$this->encrypt->encode($row->idjemaat)).'" class="btn btn-sm btn-danger" id="hapus"><i class="fa fa-trash"></i></a></td>
                                          </tr>
                                        ';
                                      }
                                    }else{
                                      echo '
                                          <tr>
                                            <td style="width: 100%; text-align: center;" colspan="3">Data user belum ada.</td>
                                          </tr>
                                        ';
                                    }
                                  ?> 
                                  <tr>
                                    <td></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

              </div> <!-- ./card-body -->

              <div class="card-footer">
                <a href="<?php echo(site_url('otorisasi')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
              </div>
            </div> <!-- /.card -->
          </div> <!-- /.col -->
        </div>





    </div>
  </div> <!-- /.row -->
  <!-- Main row -->



<?php $this->load->view("template/footer") ?>



<script type="text/javascript">
  
  var idotorisasi = "<?php echo($idotorisasi) ?>";

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
        idjemaat: {
          validators:{
            notEmpty: {
                message: "nama jemaat tidak boleh kosong"
            },
          }
        },
      }
    });

    $("form").attr('autocomplete', 'off');
    $("#rtrw").mask("000/000", {placeholder:"000/000"});
  }); 


  $(document).on("click", "#hapus", function(e) {
    var link = $(this).attr("href");
    e.preventDefault();

    bootbox.confirm("Anda yakin ingin menghapus data ini ?", function(result) {
      if (result) {
        document.location.href = link;
      }
    });
  });  

</script>

</body>
</html>
