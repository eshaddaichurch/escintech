 

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
        <li class="breadcrumb-item active">Tambah Menu</li>
      </ol>
      
    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12">



      <form action="<?php echo(site_url('otorisasi/simpanotorisasi')) ?>" method="post" id="form">                      
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

                  <h3 class="text-gray">Data Otorisasi</h3><hr>                    

                  <input type="hidden" name="idotorisasi" id="idotorisasi" value="<?php echo $idotorisasi ?>">   

                  <table class="table">
                    <tbody>
                      <?php  
                        if ($rsBackMenus->num_rows()>0) {
                          foreach ($rsBackMenus->result() as $row) {
                            
                            $spasi ='';
                            if ($row->nlevels==1) {
                              $spasi = str_repeat('&nbsp', 5);
                            }
                            if ($row->nlevels==2) {
                              $spasi = str_repeat('&nbsp', 10);
                            }

                            $checked = '';
                            $isChecked = $this->Otorisasi_model->isChecked($idotorisasi, $row->idmenu);
                            if ($isChecked) {
                              $checked = ' checked="checked" ';
                            }

                            $isDropDown = $this->Otorisasi_model->isDropDown($row->idmenu);
                            if ($isDropDown) {
                                echo '
                                <tr>
                                  <td style="width: 100%; text-alignment: left;">
                                    <div class="form-check">
                                      <label class="form-check-label" style="font-weight: bold">
                                        '.$row->namamenu.'
                                      </label>
                                    </div>
                                  </td>
                                </tr>
                              ';

                            }else{

                              echo '
                                <tr>
                                  <td style="width: 100%; text-alignment: left;">
                                    <div class="form-check">
                                      '.$spasi.'<input class="form-check-input form-check-otorisasi" type="checkbox" value="'.$row->idmenu.'" id="chk'.$row->idmenu.'" data-idmenu="'.$row->idmenu.'" '.$checked.'>
                                      <label class="form-check-label" for="chk'.$row->idmenu.'" style="">
                                        '.$row->namamenu.'
                                      </label>
                                    </div>
                                  </td>
                                </tr>
                              ';

                            }
                          }
                        }
                      ?>
                    </tbody>
                  </table>

              </div> <!-- ./card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?php echo(site_url('otorisasi')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
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
  
  var idotorisasi = "<?php echo($idotorisasi) ?>";

  $(document).ready(function() {

    $('.select2').select2();
    $("form").attr('autocomplete', 'off');
    $("#rtrw").mask("000/000", {placeholder:"000/000"});
  }); 


  $('#form').submit(function(e) {
    e.preventDefault();
    var idotorisasi = $('#idotorisasi').val();
    var array = [];
    var checkboxes = document.querySelectorAll('input[type=checkbox]:checked')

    for (var i = 0; i < checkboxes.length; i++) {
      var idmenu = checkboxes[i].value;
      if (idmenu.length!=0 && idmenu.length!=1) {
        array.push(idmenu);
      }
    }
    var formData = {
                      "idotorisasi": idotorisasi,
                      "arrMenu": array,
                    }
    // console.log(formData);


    $.ajax({
      url: '<?php echo site_url('otorisasi/simpanmenu') ?>',
      type: 'POST',
      dataType: 'json',
      data: formData,
    })
    .done(function(simpanmenuResult) {
      console.log(simpanmenuResult);
      if (simpanmenuResult.success) {
        swal("Berhasil", "Data berhasil disimpan!", "success")
          .then(function(){
            window.open("<?php echo site_url('otorisasi') ?>","_self")
          })
      }else{
        swal("Informasi", "Data gagal disimpan!", "error");
      }
    })
    .fail(function() {
      console.log("error simpanmenu");
    });
    
  });
  // $(document).on("change", ".form-check-otorisasi", function(e) {
  //   var idotorisasi = $('#idotorisasi').val();
  //   var idmenu = $(this).attr("data-idmenu");
  //   e.preventDefault();

  //   if ($(this).prop("checked")) {
  //     var comment = 'add';
  //   }else{
  //     var comment = 'remove';
  //   }

  //   $.ajax({
  //     url: '<?php echo site_url('otorisasi/updatemenu') ?>',
  //     type: 'POST',
  //     dataType: 'json',
  //     data: {'idotorisasi': idotorisasi, 'idmenu': idmenu, 'comment': comment},
  //   })
  //   .done(function(updatemenuResult) {
  //     console.log(updatemenuResult);

  //     if (updatemenuResult.success) {
  //       console.log("success");
  //     }else{
  //       console.log("failed");
  //     }
  //   })
  //   .fail(function() {
  //     console.log("error updatemenu");
  //   });
    

  // });  

</script>

</body>
</html>
