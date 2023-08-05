 <?php
    $this->load->view("template/header");
    $this->load->view("template/topmenu");
    $this->load->view("template/sidemenu");
    ?>


 <div class="row" id="toni-breadcrumb">
     <div class="col-6">
         <h4 class="text-dark mt-2">Input Materi <?php echo $rowkelas->namakelas  ?></h4>
     </div>
     <div class="col-6">
         <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="<?php echo (site_url()) ?>">Home</a></li>
             <li class="breadcrumb-item active"><a href="<?php echo (site_url('registrasikelas/index/' . $rsregistrasi->idkelas)) ?>"><?php echo $rowkelas->namakelas  ?></a></li>
             <li class="breadcrumb-item active">Input Materi <?php echo $rowkelas->namakelas  ?></li>
         </ol>

     </div>
 </div>

 <div class="row" id="toni-content">
     <div class="col-md-12">



         <form action="<?php echo (site_url('registrasikelas/simpanmateri')) ?>" method="post" id="formmateri">
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

                             <input type="hidden" name="idregistrasikelas" id="idregistrasikelas" value="<?php echo $idregistrasikelas ?>">
                             <input type="hidden" name="idkelas" id="idkelas" value="<?php echo $rsregistrasi->idkelas ?>">

                             <div class="row pt-4">
                                 <div class="col-md-4">
                                     <?php
                                        if (empty($rsregistrasi->foto)) {
                                            $foto = base_url('images/user-01.png');
                                        } else {
                                            $foto = base_url('uploads/jemaat/' . $rsregistrasi->foto);
                                        }
                                        ?>
                                     <div class="row">
                                         <div class="col-12 text-center">
                                             <img src="<?php echo $foto ?>" alt="" style="width: 40%;">
                                         </div>
                                         <div class="col-12 text-center mt-3">
                                             <h5 class="font-weight-bold"><?php echo $rsregistrasi->namalengkap ?> </h5>
                                             <p><?php echo $rsregistrasi->alamatrumah ?></p>
                                             <p><?php echo $rsregistrasi->tempatlahir . ', ' . tglindonesialengkap($rsregistrasi->tanggallahir) ?></p>

                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-8">
                                     <?php
                                        $rsmateri = $this->Registrasikelas_model->getmateri($rsregistrasi->idkelas);
                                        if ($rsmateri->num_rows() > 0) {
                                            foreach ($rsmateri->result() as $rowmateri) {
                                                echo '
                                    <div class="form-group row">
                                      <label for="" class="col-4 col-md-6 col-form-label mt-4">' . $rowmateri->judulmateri . '</label>
                                      <div class="col-4 col-md-3">
                                        <div class="form-group">
                                          <label for="">Tanggal Pelaksanaan</label>
                                          <input type="date" name="tglpelaksanaan' . $rowmateri->idkelasmateri . '" id="tglpelaksanaan' . $rowmateri->idkelasmateri . '" class="form-control"  value="' . date('Y-m-d') . '">
                                        </div>
                                      </div>
                                      
                                      <div class="col-4 col-md-3">
                                      <div class="form-group">
                                        <label for="">Nilai Materi</label>
                                        <input type="number"  name="nilaimateri' . $rowmateri->idkelasmateri . '" id="nilaimateri' . $rowmateri->idkelasmateri . '" class="form-control nilaimateri" min="60" max="100">
                                          
                                      </div>
                                  </div>




                                     
                                    </div>
                                    <div class="col-md-12 mb-1"><hr></div>

                            ';
                                            }
                                        }
                                        ?>
                                 </div>
                             </div>


                         </div> <!-- ./card-body -->

                         <div class="card-footer">
                             <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
                             <a href="<?php echo (site_url('registrasikelas/index/' . $rsregistrasi->idkelas)) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
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
     var idregistrasikelas = "<?php echo ($idregistrasikelas) ?>";



     $(document).ready(function() {



         $('.select2').select2();

         $.ajax({
                 type: 'GET',
                 url: '<?php echo site_url("registrasikelas/get_edit_data_nilai") ?>',
                 data: {
                     idregistrasikelas: idregistrasikelas
                 },
                 dataType: 'json',
                 encode: true
             })
             .done(function(result) {
                 console.log(result);
                 $.each(result, function(index, val) {
                     $('#tglpelaksanaan' + val['idkelasmateri']).val(val['tglpelaksanaan']);
                     $('#nilaimateri' + val['idkelasmateri']).val(val['nilaimateri']);
                 });
             });

         $('#formmateri').submit(function(e) {

             var els = document.getElementById("formmateri").elements;

             for (var i = 0; i < els.length - 1; i++) {
                 if (els[i].value == "") {
                     e.preventDefault();
                     alert("Isi semua nilai materi!");
                     return false;
                 }
             }


         });

         $("form").attr('autocomplete', 'off');
         $("#rtrw").mask("000/000", {
             placeholder: "000/000"
         });
     }); //end (document).ready
 </script>

 </body>

 </html>