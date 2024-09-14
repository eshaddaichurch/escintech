 <?php
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");
  ?>


 <div class="row" id="toni-breadcrumb">
   <div class="col-6">
     <h4 class="text-dark mt-2">Akta Baptisan</h4>
   </div>
   <div class="col-6">
     <ol class="breadcrumb float-sm-right">
       <li class="breadcrumb-item"><a href="<?php echo (site_url()) ?>">Home</a></li>
       <li class="breadcrumb-item"><a href="<?php echo (site_url('aktabaptisan')) ?>">Akta Baptisan</a></li>
       <li class="breadcrumb-item active" id="lblactive"></li>
     </ol>

   </div>
 </div>

 <div class="row" id="toni-content">
   <div class="col-md-12">



     <form action="<?php echo (site_url('aktabaptisan/simpan')) ?>" method="post" id="form" enctype="multipart/form-data">
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

               <h3 class="text-gray">Data Akta Baptisan</h3>
               <hr>

               <input type="hidden" name="idakta" id="idakta">

               <div class="form-group row">
                 <label for="" class="col-md-3 col-form-label">Tempat Baptis</label>

                 <div class="col-9">
                   <div class="form-check form-check-inline">
                     <input class="form-check-input tempatBaptisOptions" type="radio" name="tempatbaptis" id="tempatBaptis1" value="Elshaddai" checked>
                     <label class="form-check-label" for="tempatBaptis1">Elshaddai</label>
                   </div>
                   <div class="form-check form-check-inline">
                     <input class="form-check-input tempatBaptisOptions" type="radio" name="tempatbaptis" id="tempatBaptis2" value="Luar Elshaddai">
                     <label class="form-check-label" for="tempatBaptis2">Luar Elshaddai</label>
                   </div>
                 </div>
               </div>

               <div class="form-group row required">
                 <label for="" class="col-md-3 col-form-label">Tanggal Baptis</label>
                 <div class="col-md-3">
                   <input type="date" name="tglbaptis" id="tglbaptis" class="form-control" value="">
                 </div>
               </div>

               <div class="form-group row required">
                 <label for="" class="col-md-3 col-form-label">Nomor/ Tanggal Akta</label>
                 <div class="col-md-6">
                   <input type="text" name="noakta" id="noakta" class="form-control" placeholder="Nomor akta" autofocus="">
                 </div>
                 <div class="col-md-3">
                   <input type="date" name="tglakta" id="tglakta" class="form-control" value="<?php echo date('Y-m-d') ?>">
                 </div>
               </div>

               <div class="form-group row required baptis-elshaddai">
                 <label for="" class="col-md-3 col-form-label">Dilakukan Oleh</label>
                 <div class="col-md-9">
                   <input type="text" name="dilakukanoleh" id="dilakukanoleh" class="form-control" placeholder="Dilakukan oleh" value="">
                 </div>
               </div>

               <div class="form-group row required">
                 <label for="" class="col-md-3 col-form-label">Nama Jemaat</label>
                 <div class="col-md-9">
                   <select name="idjemaat" id="idjemaat" class="form-control select2">
                     <option value="">Pilih nama jemaat ...</option>
                     <?php
                      $rsjemaat = $this->App->getJemaat();
                      if ($rsjemaat->num_rows() > 0) {
                        foreach ($rsjemaat->result() as $row) {
                          echo '
                                  <option value="' . $row->idjemaat . '">' . $row->namalengkap . '</option>
                              ';
                        }
                      }
                      ?>
                   </select>
                 </div>
               </div>


               <div class="form-group row required baptis-elshaddai">
                 <label for="" class="col-md-3 col-form-label">Nama Ayah</label>
                 <div class="col-md-9">
                   <input type="text" name="namaayah" id="namaayah" class="form-control" placeholder="nama ayah">
                 </div>
               </div>

               <div class="form-group row required baptis-elshaddai">
                 <label for="" class="col-md-3 col-form-label">Nama Ibu</label>
                 <div class="col-md-9">
                   <input type="text" name="namaibu" id="namaibu" class="form-control" placeholder="nama ibu">
                 </div>
               </div>

               <div class="form-group row required baptis-elshaddai">
                 <label for="" class="col-md-3 col-form-label">Nama Daerah TTD</label>
                 <div class="col-10 col-md-8">
                   <select name="iddaerahakta" id="iddaerahakta" class="form-control select2">
                     <option value="">Pilih nama daerah tanda tangan ...</option>
                     <?php
                      $rsTTD = $this->App->getDaerahAkta();
                      if ($rsTTD->num_rows() > 0) {
                        foreach ($rsTTD->result() as $row) {
                          echo '
                                  <option value="' . $row->iddaerahakta . '">' . $row->namadaerahakta . '</option>
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

               <div class="form-group row required baptis-elshaddai">
                 <label for="" class="col-md-3 col-form-label">Cabang GBI</label>
                 <div class="col-10 col-md-8">
                   <select name="idcabangakta" id="idcabangakta" class="form-control select2">
                     <option value="">Pilih cabang GBI ...</option>
                     <?php
                      $rsCabangAkta = $this->App->getCabangAkta();
                      if ($rsCabangAkta->num_rows() > 0) {
                        foreach ($rsCabangAkta->result() as $row) {
                          echo '
                                  <option value="' . $row->idcabangakta . '">' . $row->namacabangakta . '</option>
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

               <div class="form-group row required baptis-non-elshaddai">
                 <label for="" class="col-md-3 col-form-label">Nama Gereja</label>
                 <div class="col-md-9">
                   <input type="text" name="namagereja" id="namagereja" class="form-control" placeholder="Nama Gereja">
                 </div>
               </div>

               <div class="form-group row required">
                 <label for="" class="col-md-3 col-form-label">Nama Gembala</label>
                 <div class="col-md-9">
                   <input type="text" name="namagembala" id="namagembala" class="form-control" placeholder="Nama Gembala">
                 </div>
               </div>

               <div class="form-group row required baptis-non-elshaddai">
                 <label for="" class="col-md-3 col-form-label">File Akta Baptis</label>
                 <div class="col-md-9">
                   <div class="row">
                     <div class="col-12">
                       <input type="file" name="fileaktabaptis" id="fileaktabaptis">
                       <input type="hidden" name="fileaktabaptis_lama" id="fileaktabaptis_lama">
                     </div>
                     <div class="col-12 mt-1">
                       <a href="#" target="_blank" id="linkfileaktabaptis"></a>
                     </div>
                   </div>
                 </div>
               </div>




             </div> <!-- ./card-body -->

             <div class="card-footer">
               <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
               <a href="<?php echo (site_url('aktabaptisan')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
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
   var idakta = "<?php echo ($idakta) ?>";

   $(document).ready(function() {

     $('.select2').select2();
     //---------------------------------------------------------> JIKA EDIT DATA
     if (idakta != "") {

       $.ajax({
           type: 'POST',
           url: '<?php echo site_url("aktabaptisan/get_edit_data") ?>',
           data: {
             idakta: idakta
           },
           dataType: 'json',
           encode: true
         })
         .done(function(result) {
           console.log(result);
           $("#idakta").val(result.idakta);
           $("#noakta").val(result.noakta);
           $("#dilakukanoleh").val(result.dilakukanoleh);
           $("#idjemaat").val(result.idjemaat).trigger('change');
           $("#namaayah").val(result.namaayah);
           $("#namaibu").val(result.namaibu);
           $("#iddaerahakta").val(result.iddaerahakta).trigger('change');
           $("#idcabangakta").val(result.idcabangakta).trigger('change');
           $("#namagereja").val(result.namagereja);
           $("#namagembala").val(result.namagembala);
           $("#tglbaptis").val(result.tglbaptis);
           $("#fileaktabaptis_lama").val(result.fileakta);
           $("#linkfileaktabaptis").html(result.fileakta);

           if (result.tempatbaptis == 'Elshaddai') {
             $('#tempatBaptis1').prop('checked', true);
           } else {
             $('#tempatBaptis2').prop('checked', true);
           }

           if (result.fileakta != '') {
             $('#linkfileaktabaptis').attr("href", "<?php echo base_url('uploads/akta/baptis/') ?>" + result.fileakta);
           }
           tempatBaptisChange();
         });


       $("#lbljudul").html("Edit Data Akta Baptisan");
       $("#lblactive").html("Edit");

     } else {
       tempatBaptisChange();
       $("#lbljudul").html("Tambah Data Akta Baptisan");
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
         tglbaptis: {
           validators: {
             notEmpty: {
               message: "tanggal baptis tidak boleh kosong"
             },
           }
         },
         noakta: {
           validators: {
             notEmpty: {
               message: "nomor akta tidak boleh kosong"
             },
           }
         },
         tglakta: {
           validators: {
             notEmpty: {
               message: "tanggal akta tidak boleh kosong"
             },
           }
         },
         dilakukanoleh: {
           validators: {
             callback: {
               message: "",
               callback: function(value, validator, password) {
                 if ($('#tempatBaptis1').prop('checked') && $('#dilakukanoleh').val() == '') {
                   return {
                     valid: false,
                     message: "Dilakukan oleh tidak boleh kosong"
                   }
                 }
                 return true
               }
             }
           }
         },
         namaayah: {
           validators: {
             callback: {
               message: "",
               callback: function(value, validator, password) {
                 if ($('#tempatBaptis1').prop('checked') && $('#namaayah').val() == '') {
                   return {
                     valid: false,
                     message: "Nama ayah tidak boleh kosong"
                   }
                 }
                 return true
               }
             }
           }
         },
         namaibu: {
           validators: {
             callback: {
               message: "",
               callback: function(value, validator, password) {
                 if ($('#tempatBaptis1').prop('checked') && $('#namaibu').val() == '') {
                   return {
                     valid: false,
                     message: "Nama ibu tidak boleh kosong"
                   }
                 }
                 return true
               }
             }
           }
         },
         idjemaat: {
           validators: {
             notEmpty: {
               message: "Nama jemaat tidak boleh kosong"
             },
           }
         },
         iddaerahakta: {
           validators: {
             callback: {
               message: "",
               callback: function(value, validator, password) {
                 if ($('#tempatBaptis1').prop('checked') && $('#iddaerahakta').val() == '') {
                   return {
                     valid: false,
                     message: "Nama daerah tidak boleh kosong"
                   }
                 }
                 return true
               }
             }
           }
         },
         idcabangakta: {
           validators: {
             callback: {
               message: "",
               callback: function(value, validator, password) {
                 if ($('#tempatBaptis1').prop('checked') && $('#idcabangakta').val() == '') {
                   return {
                     valid: false,
                     message: "Nama daerah tidak boleh kosong"
                   }
                 }
                 return true
               }
             }
           }
         },
         namagembala: {
           validators: {
             notEmpty: {
               message: "Nama gembala tidak boleh kosong"
             },
           }
         },
         namagereja: {
           validators: {
             callback: {
               message: "",
               callback: function(value, validator, password) {
                 if ($('#tempatBaptis2').prop('checked') && $('#namagereja').val() == '') {
                   return {
                     valid: false,
                     message: "Nama gereja tidak boleh kosong"
                   }
                 }
                 return true
               }
             }
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


   $('#btnSimpanDaerah').click(function(e) {
     e.preventDefault();
     $('#btnSimpanDaerah').attr("disabled", true);

     var namadaerah = $('#namadaerah').val();
     $.ajax({
         url: '<?php echo site_url('aktabaptisan/simpandaerah') ?>',
         type: 'POST',
         dataType: 'json',
         data: {
           'namadaerah': namadaerah
         },
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


   $('#btnSimpanCabang').click(function(e) {
     e.preventDefault();
     $('#btnSimpanCabang').attr("disabled", true);

     var namacabang = $('#namacabang').val();
     var formatnomorakta = $('#formatnomorakta').val();

     $.ajax({
         url: '<?php echo site_url('aktabaptisan/simpancabang') ?>',
         type: 'POST',
         dataType: 'json',
         data: {
           'namacabang': namacabang,
           'formatnomorakta': formatnomorakta
         },
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

   $(document).on('click', '.tempatBaptisOptions', function() {
     tempatBaptisChange();
   });

   function tempatBaptisChange() {

     if ($('#tempatBaptis1').prop('checked')) {
       var tempatBaptis = 'Elshaddai';
     } else {
       var tempatBaptis = 'Luar Elshaddai';
     }

     if (tempatBaptis == 'Elshaddai') {
       $('.baptis-elshaddai').show();
       $('.baptis-non-elshaddai').hide();
       if (idakta == "") {
         $('#namagembala').val("<?php echo GEMBALAGEREJA ?>");
       }
     } else {
       $('.baptis-elshaddai').hide();
       $('.baptis-non-elshaddai').show();
       if (idakta == "") {
         $('#namagembala').val("");
       }
     }

   }
 </script>

 </body>

 </html>