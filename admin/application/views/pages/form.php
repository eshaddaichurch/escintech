 <?php
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");
  ?>


 <div class="row" id="toni-breadcrumb">
   <div class="col-6">
     <h4 class="text-dark mt-2">pages</h4>
   </div>
   <div class="col-6">
     <ol class="breadcrumb float-sm-right">
       <li class="breadcrumb-item"><a href="<?php echo (site_url()) ?>">Home</a></li>
       <li class="breadcrumb-item"><a href="<?php echo (site_url('pages')) ?>">pages</a></li>
       <li class="breadcrumb-item active" id="lblactive"></li>
     </ol>

   </div>
 </div>

 <div class="row" id="toni-content">
   <div class="col-md-12">



     <form action="<?php echo (site_url('pages/simpan')) ?>" method="post" id="form" enctype="multipart/form-data">
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

               <h3 class="text-gray">Data Page</h3>
               <hr>

               <input type="hidden" name="idpages" id="idpages">
               <div class="form-group row required">
                 <label for="" class="col-md-3 col-form-label">Kategori Page</label>
                 <div class="col-md-9">
                   <select name="idpageskategori" id="idpageskategori" class="form-control select2">
                     <option value="">Pilih nama kategori page...</option>
                     <?php
                      $rskategori = $this->db->query("select * from pageskategori order by namapageskategori");
                      if ($rskategori->num_rows() > 0) {
                        foreach ($rskategori->result() as $row) {
                          echo '
                                  <option value="' . $row->idpageskategori . '">' . $row->namapageskategori . '</option>
                              ';
                        }
                      }
                      ?>
                   </select>
                 </div>
               </div>


               <div class="form-group row required">
                 <label for="" class="col-md-3 col-form-label">Judul Halaman</label>
                 <div class="col-md-9">
                   <div class="row">
                     <div class="col-12">
                       <input type="text" name="namapages" id="namapages" class="form-control" placeholder="Nama pages">
                     </div>
                     <div class="col-12">
                       <a href="" target="_blank" id="lblslug"></a>
                     </div>
                   </div>
                 </div>
               </div>

               <div class="form-group row required">
                 <label for="" class="col-md-3 col-form-label">Ringkasan</label>
                 <div class="col-md-9">
                   <textarea name="ringkasan" id="ringkasan" class="form-control" rows="3" placeholder="Ringkasan"></textarea>
                 </div>
               </div>

               <div class="form-group row required">
                 <label for="" class="col-md-3 col-form-label">Isi Page</label>
                 <div class="col-md-9">
                   <textarea name="isipages" id="isipages" class="form-control" rows="3" placeholder="isipages`"></textarea>
                 </div>
               </div>

               <div class="form-group row required">
                 <label for="" class="col-md-3 col-form-label">Gambar Sampul</label>
                 <div class="col-md-9">
                   <input type="file" name="gambarsampul" id="gambarsampul" class="form-control" placeholder="Pilih Uplad">
                   <input type="hidden" name="gambarsampul_lama" id="gambarsampul_lama">
                   <a href="" id="gambarsampul_url" target="_blank"></a>
                 </div>
               </div>



             </div> <!-- ./card-body -->

             <div class="card-footer">
               <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
               <a href="<?php echo (site_url('pages')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
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
   var idpages = "<?php echo ($idpages) ?>";

   $(document).ready(function() {

     $('.select2').select2();

     //---------------------------------------------------------> JIKA EDIT DATA
     if (idpages != "") {
       $.ajax({
           type: 'POST',
           url: '<?php echo site_url("pages/get_edit_data") ?>',
           data: {
             idpages: idpages
           },
           dataType: 'json',
           encode: true
         })
         .done(function(result) {
           // console.log(result);
           $("#idpages").val(result.idpages);
           $("#idpageskategori").val(result.idpageskategori).trigger('change');
           $("#namapages").val(result.namapages);
           $("#slug").val(result.slug);
           $("#isipages").val(result.isipages);
           $("#gambarsampul_lama").val(result.gambarsampul);
           $("#gambarsampul_url").html(result.gambarsampul);
           $("#gambarsampul_url").attr('href', "<?php echo base_url('uploads/pages/') ?>" + result.gambarsampul);
           $('#lblslug').html(result.linkpages);
           $('#lblslug').attr('href', result.linkpages);


           CKEDITOR.replace('isipages', {
             filebrowserImageBrowseUrl: '<?php echo base_url('uploads/galery'); ?>',
             height: ['400px'],
           });
           CKEDITOR.instances.isipages.setData(result.isipages);

           CKEDITOR.replace('ringkasan', {
             filebrowserImageBrowseUrl: '<?php echo base_url('uploads/galery'); ?>',
             height: ['100px'],
           });
           CKEDITOR.instances.ringkasan.setData(result.ringkasan);

         });


       $("#lbljudul").html("Edit Data Pages");
       $("#lblactive").html("Edit");

     } else {

       CKEDITOR.replace('isipages', {
         filebrowserImageBrowseUrl: '<?php echo base_url('.../uploads/galery'); ?>',
         height: ['400px'],
       });

       CKEDITOR.replace('ringkasan', {
         filebrowserImageBrowseUrl: '<?php echo base_url('.../uploads/galery'); ?>',
         height: ['100px'],
       });

       $("#lbljudul").html("Tambah Data Pages");
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
         namapages: {
           validators: {
             notEmpty: {
               message: "nama pages tidak boleh kosong"
             },
           }
         },
         deskripsi: {
           validators: {
             notEmpty: {
               message: "deskripsi tidak boleh kosong"
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