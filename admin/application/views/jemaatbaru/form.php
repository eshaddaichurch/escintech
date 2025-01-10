 <?php
    $this->load->view("template/header");
    $this->load->view("template/topmenu");
    $this->load->view("template/sidemenu");
    ?>


 <div class="row" id="toni-breadcrumb">
     <div class="col-6">
         <h4 class="text-dark mt-2">Jemaat Baru</h4>
     </div>
     <div class="col-6">
         <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="<?php echo (site_url()) ?>">Home</a></li>
             <li class="breadcrumb-item"><a href="<?php echo (site_url('jemaatbaru')) ?>">Jemaat Baru</a></li>
             <li class="breadcrumb-item active" id="lblactive">Proses</li>
         </ol>

     </div>
 </div>

 <div class="row" id="toni-content">
     <div class="col-md-12">



         <form action="<?php echo (site_url('jemaatbaru/simpan')) ?>" method="post" id="form">
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

                             <h3 class="text-gray">Data Jemaat</h3>
                             <hr>

                             <input type="hidden" name="idcarejemaatbaru" id="idcarejemaatbaru" value="<?php echo $rowJemaatBaru->idcarejemaatbaru ?>">

                             <div class="form-group row">
                                 <div class="col-12">
                                     <div class="table-responsive">
                                         <table class="table">
                                             <tbody>
                                                 <tr>
                                                     <td style="width: 20%;">Nama</td>
                                                     <td style="width: 5%;">:</td>
                                                     <td style="width: 75%;"><?php echo $rowJemaatBaru->namajemaat; ?></td>
                                                 </tr>
                                                 <tr>
                                                     <td style="width: 20%;">Jenis Kelamin</td>
                                                     <td style="width: 5%;">:</td>
                                                     <td style="width: 75%;"><?php echo $rowJemaatBaru->jeniskelamin; ?></td>
                                                 </tr>
                                                 <tr>
                                                     <td style="width: 20%;">Tanggal Daftar</td>
                                                     <td style="width: 5%;">:</td>
                                                     <td style="width: 75%;"><?php echo formatHariTanggal($rowJemaatBaru->tglinsert); ?></td>
                                                 </tr>
                                                 <tr>
                                                     <td style="width: 20%;">Email</td>
                                                     <td style="width: 5%;">:</td>
                                                     <td style="width: 75%;"><?php echo $rowJemaatBaru->email; ?></td>
                                                 </tr>
                                                 <tr>
                                                     <td style="width: 20%;">No HP</td>
                                                     <td style="width: 5%;">:</td>
                                                     <td style="width: 75%;"><?php echo $rowJemaatBaru->nohp; ?></td>
                                                 </tr>
                                             </tbody>

                                         </table>
                                     </div>
                                 </div>

                                 <div class="col-12 mt-3">
                                     <div class="form-group">
                                         <label for="">Keterangan (Optional)</label>
                                         <textarea name="keterangan" id="keterangan" class="form-control" rows="5" placeholder="Keterangan"><?php echo $rowJemaatBaru->keterangan ?></textarea>
                                     </div>
                                 </div>
                             </div>






                         </div> <!-- ./card-body -->

                         <div class="card-footer">
                             <?php
                                if ($rowJemaatBaru->status == "Confirmed") {
                                    echo '
                                        <button type="submit" class="btn btn-primary float-right" disabled><i class="fa fa-save"></i> Confirm</button>
                                    ';
                                } else {
                                    echo '
                                        <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Confirm</button>
                                    ';
                                }
                                ?>

                             <a href="<?php echo (site_url('jemaatbaru')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
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
     var idcarejemaatbaru = "<?php echo ($idcarejemaatbaru) ?>";

     $(document).ready(function() {

         $('.select2').select2();

         $("form").attr('autocomplete', 'off');
         $("#rtrw").mask("000/000", {
             placeholder: "000/000"
         });
     }); //end (document).ready
 </script>

 </body>

 </html>