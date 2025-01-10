<?php  
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");


?>

  <div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Front Menus</h4>
    </div>  
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo(site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item active">Front Menus</li>
      </ol>
      
    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12">
      <div class="card" id="cardcontent">
        <div class="card-header">
          <h5 class="card-title">List Data Front Menus</h5>
          <button class="btn btn-sm btn-primary float-right" id="tambahmenu"><i class="fa fa-plus-circle"></i> Tambah Menu</button>
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
            <div class="col-md-12">
              

              <ul class="list-group">
                <div class="row">
                  
                  <!-- <div class="col-md-2"></div> -->
                  
                  <?php  

                    /* =============================================================================================================
                                                                        MENU LEVEL 1
                      ============================================================================================================= */
                    $rsMenusLevel1 = $this->Frontmenus_model->get_menus_level(1);
                    if ($rsMenusLevel1->num_rows()>0) {
                      foreach ($rsMenusLevel1->result() as $rowlevels1) {
                        switch ($rowlevels1->jenismenu) {
                          case 'Page Link':
                            $uraianmenu = ' > '.$rowlevels1->namapages;
                            break;
                          case 'Kategori Link':
                            $uraianmenu = ' > '.$rowlevels1->namapageskategori;
                            break;
                          case 'Url Link':
                            $uraianmenu = ' > '.$rowlevels1->linkmenu;
                            break;
                          default:
                            $uraianmenu = '';
                            break;
                        }


                        if ($rowlevels1->openinnewtab==1) {
                          $openinnewtab = ' > New Tab';
                        }else{
                          $openinnewtab = '';
                        }

                        echo '
                          <div class="col-12 mt-2">
                          </div>
                          <div class="col-10">
                            <li class="list-group-item">
                              '.$rowlevels1->namamenu.'<br>
                              <small class="text-primary">'.$rowlevels1->jenismenu.$uraianmenu.$openinnewtab.'</small>
                              </li>
                          </div>';

                        if ($rowlevels1->sysmenu==1) {
                          echo '
                            <div class="col-2">
                              <div class="btn-group dropleft">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Aksi
                                </button>
                                <div class="dropdown-menu">
                                  <a href="'.site_url('frontmenus/pindahkeatas/'.$this->encrypt->encode($rowlevels1->idmenu)).'" class="dropdown-item" data-idmenu="'.$rowlevels1->idmenu.'">Pindah Ke Atas</a>
                                  <a href="'.site_url('frontmenus/pindahkebawah/'.$this->encrypt->encode($rowlevels1->idmenu)).'" class="dropdown-item" data-idmenu="'.$rowlevels1->idmenu.'">Pindah Ke Bawah</a>
                                </div>
                              </div>
                            </div>
                          ';
                        }else{
                          echo '
                            <div class="col-2">
                              <div class="btn-group dropleft">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Aksi
                                </button>
                                <div class="dropdown-menu">
                                  <a href="'.site_url('frontmenus/pindahkeatas/'.$this->encrypt->encode($rowlevels1->idmenu)).'" class="dropdown-item" data-idmenu="'.$rowlevels1->idmenu.'">Pindah Ke Atas</a>
                                  <a href="'.site_url('frontmenus/pindahkebawah/'.$this->encrypt->encode($rowlevels1->idmenu)).'" class="dropdown-item" data-idmenu="'.$rowlevels1->idmenu.'">Pindah Ke Bawah</a>
                                  <a href="" class="dropdown-item ubahmenu" data-idmenu="'.$rowlevels1->idmenu.'">Ubah</a>
                                  <a href="" class="dropdown-item" data-idmenu="'.$rowlevels1->idmenu.'">Tambahkan Sub Menu</a>
                                  <a href="'.site_url('frontmenus/hapus/'.$this->encrypt->encode($rowlevels1->idmenu)).'" class="dropdown-item" id="btnhapusmenu">Hapus</a>
                                </div>
                              </div>
                            </div>
                          ';
                        }
                        

                        /* =============================================================================================================
                                                                        MENU LEVEL 2
                         ============================================================================================================= */
                        $rsMenusLevel2 = $this->Frontmenus_model->get_menus_level(2, $rowlevels1->idmenu);
                        if ($rsMenusLevel2->num_rows()>0) {
                          foreach ($rsMenusLevel2->result() as $rowlevels2) {
                            

                            switch ($rowlevels2->jenismenu) {
                              case 'Page Link':
                                $uraianmenu = ' > '.$rowlevels2->namapages;
                                break;
                              case 'Kategori Link':
                                $uraianmenu = ' > '.$rowlevels2->namapageskategori;
                                break;
                              case 'Url Link':
                                $uraianmenu = ' > '.$rowlevels2->linkmenu;
                                break;
                              default:
                                $uraianmenu = '';
                                break;
                            }


                            if ($rowlevels2->openinnewtab==1) {
                              $openinnewtab = ' > New Tab';
                            }else{
                              $openinnewtab = '';
                            }

                            echo '
                                <div class="col-12 mt-2">
                                </div>
                                <div class="col-1"></div>
                                <div class="col-9">
                                  <li class="list-group-item">
                                    '.$rowlevels2->namamenu.'<br>
                                    <small class="text-primary">'.$rowlevels2->jenismenu.$uraianmenu.$openinnewtab.'</small>
                                  </li>
                                </div>';
                            if ($rowlevels2->sysmenu==1) {
                              echo '
                                  <div class="col-2">
                                    <div class="btn-group dropleft">
                                      <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Aksi
                                      </button>
                                      <div class="dropdown-menu">
                                        <a href="'.site_url('frontmenus/pindahkeatas/'.$this->encrypt->encode($rowlevels2->idmenu)).'" class="dropdown-item" data-idmenu="'.$rowlevels2->idmenu.'">Pindah Ke Atas</a>
                                        <a href="'.site_url('frontmenus/pindahkebawah/'.$this->encrypt->encode($rowlevels2->idmenu)).'" class="dropdown-item" data-idmenu="'.$rowlevels2->idmenu.'">Pindah Ke Bawah</a>
                                      </div>
                                    </div>
                                  </div>
                                ';
                            }else{
                              echo '
                                  <div class="col-2">
                                    <div class="btn-group dropleft">
                                      <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Aksi
                                      </button>
                                      <div class="dropdown-menu">
                                        <a href="'.site_url('frontmenus/pindahkeatas/'.$this->encrypt->encode($rowlevels2->idmenu)).'" class="dropdown-item" data-idmenu="'.$rowlevels2->idmenu.'">Pindah Ke Atas</a>
                                        <a href="'.site_url('frontmenus/pindahkebawah/'.$this->encrypt->encode($rowlevels2->idmenu)).'" class="dropdown-item" data-idmenu="'.$rowlevels2->idmenu.'">Pindah Ke Bawah</a>
                                        <a href="" class="dropdown-item ubahmenu" data-idmenu="'.$rowlevels2->idmenu.'">Ubah</a>
                                        <a href="" class="dropdown-item" data-idmenu="'.$rowlevels2->idmenu.'">Tambahkan Sub Menu</a>
                                        <a href="'.site_url('frontmenus/hapus/'.$this->encrypt->encode($rowlevels2->idmenu)).'" class="dropdown-item" id="btnhapusmenu">Hapus</a>
                                      </div>
                                    </div>
                                  </div>
                                ';

                            }
                          }
                        }



                      }
                    }
                  ?>
                </div>
              </ul>
            </div>



          </div> <!-- /.row -->
        </div> <!-- ./card-body -->
      </div> <!-- /.card -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->
  <!-- Main row -->



<!-- Modal -->
<div class="modal fade" id="modalMenus" tabindex="-1" role="dialog" aria-labelledby="modalMenusTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="<?php echo site_url('frontmenus/simpan') ?>" id="form" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenusTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <input type="hidden" name="idmenu" id="idmenu">

          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                
                <div class="form-group row">
                  <label for="" class="col-md-4 col-form-label">Parent Menu</label>
                  <div class="col-md-8">
                    <select name="parentidmenu" id="parentidmenu" data-width="100%" class="form-control select2">
                      <option value="">Top Menu</option>
                      <?php  
                        $rsParent = $this->Frontmenus_model->get_menus_level(1);
                        if ($rsParent->num_rows()>0) {
                          foreach ($rsParent->result() as $row) {
                            echo '
                              <option value="'.$row->idmenu.'">'.$row->namamenu.'</option>
                            ';
                          }
                        }
                      ?>

                    </select>                
                  </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-md-4 col-form-label">Nama Menu</label>
                  <div class="col-md-8">
                    <input type="text" name="namamenu" id="namamenu" class="form-control" placeholder="Nama menu">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-md-4 col-form-label">Type Menu</label>
                  <div class="col-md-8">
                    <select name="jenismenu" id="jenismenu" class="form-control">
                      <option value="Page Link">Page Link</option>
                      <option value="Kategori Link">Kategori Link</option>
                      <option value="Url Link">Url Link</option>
                      <option value="None">None</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row" id="divpage">
                  <label for="" class="col-md-4 col-form-label">Page/ Halaman</label>
                  <div class="col-md-8">
                    <select name="idpages" id="idpages" data-width="100%" class="form-control select2">
                      <option value="">Pilih judul page...</option>
                      <?php  
                        $rsPage = $this->Pages_model->get_all();
                        if ($rsPage->num_rows()>0) {
                          foreach ($rsPage->result() as $row) {
                            echo '
                              <option value="'.$row->idpages.'">'.$row->namapages.'</option>
                            ';
                          }
                        }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row" id="divkategori">
                  <label for="" class="col-md-4 col-form-label">Kategori Halaman</label>
                  <div class="col-md-8">
                    <select name="idpageskategori" id="idpageskategori" data-width="100%" class="form-control select2">
                      <option value="">Pilih judul page...</option>
                      <?php  
                        $rskategori = $this->Pageskategori_model->get_all();
                        if ($rskategori->num_rows()>0) {
                          foreach ($rskategori->result() as $row) {
                            echo '
                              <option value="'.$row->idpageskategori.'">'.$row->namapageskategori.'</option>
                            ';
                          }
                        }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row" id="divlinkmenu">
                  <label for="" class="col-md-4 col-form-label">Link Menu</label>
                  <div class="col-md-8">
                    <input type="text" name="linkmenu" id="linkmenu" class="form-control" placeholder="https://escintech.com">
                    <small class="text-danger">Harus lengkap dengan https:// atau http:// </small>
                  </div>
                </div>

                <div class="form-group row" id="divopeninnewtab">
                  <label for="" class="col-md-4 col-form-label">Buka di Tab Baru</label>
                  <div class="col-md-8">
                    <select name="openinnewtab" id="openinnewtab" class="form-control">
                      <option value="0">TIdak</option>
                      <option value="1">Ya</option>
                    </select>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="btnSimpan">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>


<?php $this->load->view("template/footer") ?>



<script type="text/javascript">

  var table;
  var boolAloowUbahMenu = false;

  $(document).ready(function() {
    $('.select2').select2();
    // $('#jenismenu').trigger('change');

    //----------------------------------------------------------------- > validasi
    $("#form").bootstrapValidator({
      fields: {
        
        namamenu: {
          validators:{
            notEmpty: {
                message: "nama menu tidak boleh kosong"
            },
          }
        },
        idpages: {
          validators:{
            callback: {
                            message: 'Nama halaman tidak boleh kosong',
                            callback: function (value, validator, idpages) {

                                if ( $('#jenismenu').val()=='Page Link' && $('#idpages').val()=="" ) {
                                  return {
                                      valid: false,
                                      message: 'Nama halaman tidak boleh kosong'
                                  }
                                }
                              return true
                            }
                        }
          }
        }, 
        idpageskategori: {
          validators:{
            callback: {
                            message: 'Nama kategori halaman tidak boleh kosong',
                            callback: function (value, validator, idpageskategori) {

                                if ( $('#jenismenu').val()=='Kategori Link' && $('#idpageskategori').val()=="" ) {
                                  return {
                                      valid: false,
                                      message: 'Nama kategori halaman tidak boleh kosong'
                                  }
                                }
                              return true
                            }
                        }
          }
        },   
        linkmenu: {
          validators:{
            callback: {
                            message: 'URL Link tidak boleh kosong',
                            callback: function (value, validator, linkmenu) {

                                if ( $('#jenismenu').val()=='Url Link' && $('#linkmenu').val()=="" ) {
                                  return {
                                      valid: false,
                                      message: 'URL Link tidak boleh kosong'
                                  }
                                }
                              return true
                            }
                        }
          }
        },
      },
    });



  }); //end (document).ready

  
  $(document).on("click", "#btnhapusmenu", function(e) {
    var link = $(this).attr("href");
    e.preventDefault();
    bootbox.confirm("Anda yakin ingin menghapus data ini ?", function(result) {
      if (result) {
        document.location.href = link;
      }
    });
  });  
  

  $('#jenismenu').change(function(e) {
    var jenismenu
    $('#divpage').hide();
    $('#divkategori').hide();
    $('#divlinkmenu').hide();
    $('#divopeninnewtab').hide();

    if ( $(this).val()=="Page Link") {
      $('#divpage').show();
      $('#divopeninnewtab').show();
    } 

    if ( $(this).val()=="Kategori Link") {
      $('#divkategori').show();
      $('#divopeninnewtab').show();
    } 

    if ( $(this).val()=="Url Link") {
      $('#divlinkmenu').show();
      $('#divopeninnewtab').show();
    }

  });

  $('#tambahmenu').click(function() {
    $('#modalMenus').modal('show');
    $('#modalMenusTitle').html('Tambah Menu');
    $('#idmenu').val('');
    
    kosongkanmodal();
    $('#jenismenu').trigger('change');

   
  });

  $('.ubahmenu').click(function(e) {
    e.preventDefault();
    var idmenu = $(this).attr('data-idmenu');
    $('#modalMenus').modal('show');
    $('#modalMenusTitle').html('Ubah Menu');
    $('#btnSimpan').prop("disabled", true);

    $.ajax({
      url: '<?php echo site_url('frontmenus/getubahmenu') ?>',
      type: 'GET',
      dataType: 'json',
      data: {'idmenu': idmenu},
    })
    .done(function(getubahmenuResult) {
      console.log(getubahmenuResult);
      $('#idmenu').val(idmenu);
      $('#btnSimpan').prop("disabled", false);
      $('#parentidmenu').val(getubahmenuResult['parentidmenu']).trigger('change');
      $('#namamenu').val(getubahmenuResult['namamenu']);
      $('#idpages').val(getubahmenuResult['idpages']).trigger('change');
      $('#idpageskategori').val(getubahmenuResult['idpageskategori']).trigger('change');
      $('#linkmenu').val(getubahmenuResult['linkmenu']);
      $('#openinnewtab').val(getubahmenuResult['openinnewtab']);
      $('#jenismenu').val(getubahmenuResult['jenismenu']).trigger('change');
    })
    .fail(function() {
      console.log("error getubahmenu");
    });
    

  });
  function kosongkanmodal() {
    $('#parentidmenu').val('');
    $('#namamenu').val('');
    $('#jenismenu').val('Page Link').trigger('change');
    $('#idpages').val('').trigger('change');
    $('#linkmenu').val('');
    $('#openinnewtab').val('0');
  }

  function refreshSelect2(idobj)
  {
    $('#'+idobj).removeClass('select2');

    $('#'+idobj).css('width', '100%');
    $('#'+idobj).addClass('select2');
    $('#'+idobj).hide();
    $('#'+idobj).show();
  }
</script>

</body>
</html>

