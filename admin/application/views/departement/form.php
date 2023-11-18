 <?php
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");
  ?>


 <div class="row" id="toni-breadcrumb">
   <div class="col-6">
     <h4 class="text-dark mt-2">Departement</h4>
   </div>
   <div class="col-6">
     <ol class="breadcrumb float-sm-right">
       <li class="breadcrumb-item"><a href="<?php echo (site_url()) ?>">Home</a></li>
       <li class="breadcrumb-item"><a href="<?php echo (site_url('departement')) ?>">Departement</a></li>
       <li class="breadcrumb-item active" id="lblactive"></li>
     </ol>

   </div>
 </div>

 <div class="row" id="toni-content">
   <div class="col-md-12">



     <form action="<?php echo (site_url('departement/simpan')) ?>" method="post" id="form" enctype="multipart/form-data">
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

               <h3 class="text-gray">Data Departement</h3>
               <hr>

               <input type="hidden" name="iddepartement" id="iddepartement">
               <div class="form-group row required">
                 <label for="" class="col-md-3 col-form-label">Nama Departement</label>
                 <div class="col-md-9">
                   <input type="text" name="namadepartement" id="namadepartement" class="form-control" placeholder="Nama Departement" autofocus="">
                 </div>
               </div>
               <div class="form-group row required">
                 <label for="" class="col-md-3 col-form-label">Nama Group</label>
                 <div class="col-md-9">
                   <select name="idgroup" id="idgroup" class="form-control select2">
                     <option value="">Pilih nama group...</option>
                     <?php
                      $rsgroup = $this->db->query("
                              select * from v_group order by namagroup
                            ");


                      if ($rsgroup->num_rows() > 0) {
                        foreach ($rsgroup->result() as $row) {
                          echo '
                                <option value="' . $row->idgroup . '">' . $row->namagroup . '</option>
                              ';
                        }
                      }
                      ?>
                   </select>
                 </div>
               </div>

               <div class="form-group row required">
                 <label for="" class="col-md-3 col-form-label">Departement Head</label>
                 <div class="col-md-9">
                  <input type="text" name="namahead" id="namahead" class="form-control" placeholder="Nama Head">
                   </select>
                 </div>
               </div>


               <div class="form-group row required">
                 <label for="" class="col-md-3 col-form-label">Status Aktif</label>
                 <div class="col-md-9">
                   <select name="statusaktif" id="statusaktif" class="form-control">
                     <option value="Aktif">Aktif</option>
                     <option value="Tidak Aktif">Tidak Aktif</option>
                   </select>
                 </div>
               </div>


               <div class="form-group row required">
                 <label for="" class="col-md-3 col-form-label">Foto Head <small class="text-danger"> (Max 1MB)</small></label>
                 <div class="col-md-9">
                  <div class="row">
                    <div class="col-12">
                       <input type="file" name="fotohead" id="fotohead">
                       <input type="hidden" name="fotohead_lama" id="fotohead_lama">
                    </div>
                    <div class="col-12">
                      <a href="" id="linkFotoHead" target="_blank"></a>
                    </div>
                  </div>
                 </div>
               </div>


               <div class="form-group row">
                 <label for="" class="col-md-3 col-form-label">Warna Penjadwalan</label>
                 <div class="col-md-3">
                   <input type="color" name="warnapenjadwalan" id="warnapenjadwalan" class="form-control" value="#E68302">
                 </div>
               </div>



             </div> <!-- ./card-body -->

             <div class="card-footer">
               <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
               <a href="<?php echo (site_url('departement')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
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
   var iddepartement = "<?php echo ($iddepartement) ?>";

   $(document).ready(function() {

     $('.select2').select2();

     //---------------------------------------------------------> JIKA EDIT DATA
     if (iddepartement != "") {
       $.ajax({
           type: 'POST',
           url: '<?php echo site_url("departement/get_edit_data") ?>',
           data: {
             iddepartement: iddepartement
           },
           dataType: 'json',
           encode: true
         })
         .done(function(result) {
           // console.log(result);
           $("#iddepartement").val(result.iddepartement);
           $("#namadepartement").val(result.namadepartement);
           $("#idgroup").val(result.idgroup).trigger('change');
           $("#namahead").val(result.namahead).trigger('change');
           $("#statusaktif").val(result.statusaktif);
           if (result.warnapenjadwalan=="" || result.warnapenjadwalan==null) {
             $("#warnapenjadwalan").val("#E68302");
           }else{
             $("#warnapenjadwalan").val(result.warnapenjadwalan);
           }
           $("#fotohead_lama").val(result.fotohead);

           $('#linkFotoHead').html(result.fotohead);
           $('#linkFotoHead').attr('href', "<?php echo base_url('uploads/departement/') ?>"+result.fotohead);

         });


       $("#lbljudul").html("Edit Data Departement");
       $("#lblactive").html("Edit");

     } else {
       $("#warnapenjadwalan").val("#E68302");
       $("#lbljudul").html("Tambah Data Departement");
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
         namadepartement: {
           validators: {
             notEmpty: {
               message: "namadepartement tidak boleh kosong"
             },
           }
         },
         namahead: {
           validators: {
             notEmpty: {
               message: "kepala group tidak boleh kosong"
             },
           }
         },
         idgroup: {
           validators: {
             notEmpty: {
               message: "nama group tidak boleh kosong"
             },
           }
         },
         statusaktif: {
           validators: {
             notEmpty: {
               message: "status aktif tidak boleh kosong"
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