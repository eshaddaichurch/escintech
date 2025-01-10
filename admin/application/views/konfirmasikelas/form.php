 <?php
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");
  ?>


 <div class="row" id="toni-breadcrumb">
   <div class="col-6">
     <h4 class="text-dark mt-2">Konfirmasi Pendaftaran Kelas</h4>
   </div>
   <div class="col-6">
     <ol class="breadcrumb float-sm-right">
       <li class="breadcrumb-item"><a href="<?php echo (site_url()) ?>">Home</a></li>
       <li class="breadcrumb-item"><a href="<?php echo (site_url('konfirmasikelas')) ?>">Konfirmasi Pendaftaran Kelas</a></li>
       <li class="breadcrumb-item active" id="lblactive"></li>
     </ol>

   </div>
 </div>

 <div class="row" id="toni-content">
   <div class="col-md-12">



     <form action="<?php echo (site_url('konfirmasikelas/simpan')) ?>" method="post" id="form">
       <div class="row">

         <input type="hidden" name="idregistrasi" id="idregistrasi" value="<?php echo $idregistrasi ?>">

         <div class="col-md-12">
           <?php
            $pesan = $this->session->flashdata("pesan");
            if (!empty($pesan)) {
              echo $pesan;
            }
            ?>
         </div>

         <div class="col-12 mt-3">
           <div class="card">
             <div class="card-header">
               <h4><i class="fa fa-chevron-right"></i> Informasi Jemaat</h4>
             </div>
             <div class="card-body pb-5">
               <div class="row">
                 <div class="col-md-2">
                   <?php
                    if (!empty($rowJemaat->foto)) {
                      $foto = base_url('uploads/jemaat/' . $rowJemaat->foto);
                    } else {
                      $foto = base_url('images/user-01.png');
                    }
                    echo '<img src="' . $foto . '" alt="" style="width: 80%;">';
                    ?>
                 </div>
                 <div class="col-md-10">

                   <table class="table">
                     <tbody>
                       <tr>
                         <td style="width: 15%;">Nama Jemaat</td>
                         <td style="width: 5%; text-align: center;">:</td>
                         <td style="width: 30%;"><?php echo $rowJemaat->namalengkap ?></td>
                         <td style="width: 15%;">Jenis Kelamin</td>
                         <td style="width: 5%; text-align: center;">:</td>
                         <td style="width: 30%;"><?php echo $rowJemaat->jeniskelamin ?></td>
                       </tr>
                       <tr>
                         <td style="width: 15%;">Tempat/ Tgl Lahir</td>
                         <td style="width: 5%; text-align: center;">:</td>
                         <td style="width: 30%;"><?php echo $rowJemaat->tempatlahir . ' / ' . tglindonesia($rowJemaat->tanggallahir) ?></td>
                         <td style="width: 15%;">Status Pernikahan</td>
                         <td style="width: 5%; text-align: center;">:</td>
                         <td style="width: 30%;"><?php echo $rowJemaat->statuspernikahan ?></td>
                       </tr>
                       <tr>
                         <td style="width: 15%;">No Telepon</td>
                         <td style="width: 5%; text-align: center;">:</td>
                         <td style="width: 30%;"><?php echo $rowJemaat->nohp ?></td>
                         <td style="width: 15%;">Email</td>
                         <td style="width: 5%; text-align: center;">:</td>
                         <td style="width: 30%;"><?php echo $rowJemaat->email ?></td>
                       </tr>
                       <tr>
                         <td style="width: 15%;">Alamat</td>
                         <td style="width: 5%; text-align: center;">:</td>
                         <td style="width: 30%;"><?php echo $rowJemaat->alamatrumah . ', ' . $rowJemaat->kelurahan . ', ' . $rowJemaat->kecamatan . ', ' . $rowJemaat->kotakabupaten ?></td>
                         <td style="width: 15%;">Status Jemaat</td>
                         <td style="width: 5%; text-align: center;">:</td>
                         <td style="width: 30%;"><?php echo $rowJemaat->statusjemaat ?></td>
                       </tr>
                     </tbody>
                   </table>

                 </div>

                 <div class="col-12">
                   <div class="row">
                     <div class="col-12">
                       <h5>Sertifikat Jemaat</h5>
                     </div>
                     <div class="col-md-4">

                       <ul>
                         <?php
                          $rsKelas = $this->Konfirmasikelas_model->getKelas(3, 0);
                          if ($rsKelas->num_rows() > 0) {
                            foreach ($rsKelas->result() as $row) {
                              // echo "SELECT * FROM registrasikelas where idjemaat='$rowRegistrasi->idjemaat' and idkelas='$row->idkelas' and statuslulus='1' order by idregistrasikelas desc limit 1";

                              $rsSr = $this->Konfirmasikelas_model->getSertifikat($rowRegistrasi->idjemaat, $row->idkelas);
                              $link = '';
                              if ($rsSr->num_rows() > 0) {
                                $link = site_url('registrasikelas/cetaksertifikat/' .
                                  $rsSr->row()->idregistrasikelas);
                                echo '
                                  <li><a href="' . $link . '" target="_blank"><i class="fa fa-check-circle text-success"></i> ' . $row->namakelas . '</li></a>
                                ';
                              } else {

                                echo '
                                  <li><i class="fa fa-times text-danger"></i> ' . $row->namakelas . '</li>
                                ';
                              }
                            }
                          }
                          ?>
                       </ul>

                     </div>

                     <div class="col-md-4">

                       <ul>
                         <?php
                          $rsKelas = $this->Konfirmasikelas_model->getKelas(3, 3);
                          if ($rsKelas->num_rows() > 0) {
                            foreach ($rsKelas->result() as $row) {

                              $rsSr = $this->Konfirmasikelas_model->getSertifikat($rowRegistrasi->idjemaat, $row->idkelas);
                              $link = '';
                              if ($rsSr->num_rows() > 0) {
                                $link = site_url('registrasikelas/cetaksertifikat/' .
                                  $rsSr->row()->idregistrasikelas);
                                echo '
                                  <li><a href="' . $link . '" target="_blank"><i class="fa fa-check-circle text-success"></i> ' . $row->namakelas . '</li></a>
                                ';
                              } else {

                                echo '
                                  <li><i class="fa fa-times text-danger"></i> ' . $row->namakelas . '</li>
                                ';
                              }
                            }
                          }
                          ?>
                       </ul>

                     </div>

                     <div class="col-md-4">

                       <ul>
                         <?php
                          $rsKelas = $this->Konfirmasikelas_model->getKelas(3, 6);
                          if ($rsKelas->num_rows() > 0) {
                            foreach ($rsKelas->result() as $row) {

                              $rsSr = $this->Konfirmasikelas_model->getSertifikat($rowRegistrasi->idjemaat, $row->idkelas);
                              $link = '';
                              if ($rsSr->num_rows() > 0) {
                                $link = site_url('registrasikelas/cetaksertifikat/' .
                                  $rsSr->row()->idregistrasikelas);
                                echo '
                                  <li><a href="' . $link . '" target="_blank"><i class="fa fa-check-circle text-success"></i> ' . $row->namakelas . '</li></a>
                                ';
                              } else {

                                echo '
                                  <li><i class="fa fa-times text-danger"></i> ' . $row->namakelas . '</li>
                                ';
                              }
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
         </div>



         <div class="col-12 mt-3">
           <div class="card">
             <div class="card-header">
               <h4><i class="fa fa-chevron-right"></i> Konfirmasi Pendaftaran Jemaat</h4>
             </div>
             <div class="card-body">

               <div class="row">
                 <div class="col-12">
                   <table class="table">
                     <tbody>
                       <tr>
                         <td style="width: 15%;">Nama Jadwal</td>
                         <td style="width: 5%;">:</td>
                         <td style="width: 30%;"><?php echo $rowJadwalEvent->namaevent ?></td>
                         <td style="width: 15%;">Tanggal Jadwal</td>
                         <td style="width: 5%;">:</td>
                         <td style="width: 30%;">
                           <?php
                            if (tgldmy($rowJadwalEvent->tglmulai) == tgldmy($rowJadwalEvent->tglselesai)) {
                              echo tgldmy($rowJadwalEvent->tglmulai);
                            } else {
                              echo tgldmy($rowJadwalEvent->tglmulai . ' s/d ' . $rowJadwalEvent->tglselesai);
                            }
                            ?>

                         </td>
                       </tr>
                       <tr>
                         <td style="width: 15%;">Tanggal Pendaftaran</td>
                         <td style="width: 5%;">:</td>
                         <td style="width: 30%;"><?php echo formatHariTanggalJam($rowRegistrasi->tglregistrasi) ?></td>
                         <td style="width: 15%;">Nama Departemen</td>
                         <td style="width: 5%;">:</td>
                         <td style="width: 30%;"><?php echo $rowJadwalEvent->namadepartement ?></td>
                       </tr>
                     </tbody>
                   </table>
                 </div>
                 <div class="col-12">
                   <div class="form-group row">
                     <label for="" class="col-md-3 col-form-label">Keterangan Konfirmasi</label>
                     <div class="col-md-9">
                       <textarea name="keterangankonfirmasi" id="keterangankonfirmasi" class="form-control" rows="3" placeholder="Keterangan konfirmasi"></textarea>
                     </div>
                   </div>
                 </div>
                 <div class="col-12">
                   <button class="btn btn-success btn-lg" id="btnDisetujui"><i class="fa fa-check"></i> Disetujui</button>
                   <button class="btn btn-danger btn-lg" id="btnDitolak"><i class="fa fa-times"></i> Ditolak</button>
                   <a href="<?php echo site_url('konfirmasikelas') ?>" class="btn btn-sm btn-default float-right">Kembali</a>
                 </div>

               </div> <!-- row -->


             </div>
           </div>
         </div>


       </div>
     </form>





   </div>
 </div> <!-- /.row -->
 <!-- Main row -->



 <?php $this->load->view("template/footer") ?>



 <script type="text/javascript">
   var idregistrasi = "<?php echo ($idregistrasi) ?>";

   $(document).ready(function() {

     $('.select2').select2();

     //---------------------------------------------------------> JIKA EDIT DATA
     if (idregistrasi != "") {
       $.ajax({
           type: 'POST',
           url: '<?php echo site_url("registrasikelas/get_edit_data") ?>',
           data: {
             idregistrasi: idregistrasi
           },
           dataType: 'json',
           encode: true
         })
         .done(function(result) {
           $("#idregistrasi").val(result.idregistrasi);

         });


       $("#lbljudul").html("Edit Data Peserta Kelas");
       $("#lblactive").html("Edit");

     } else {
       $("#lbljudul").html("Tambah Data Peserta Kelas");
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
         idjemaat: {
           validators: {
             notEmpty: {
               message: "nama peserta tidak boleh kosong"
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



   $('#btnDisetujui').click(function(e) {
     var idregistrasi = $('#idregistrasi').val();
     statussekarang = 'Disetujui';


     $.ajax({
         url: '<?php echo site_url('konfirmasikelas/cekStatusTerakhir') ?>',
         type: 'GET',
         dataType: 'json',
         data: {
           'idregistrasi': idregistrasi
         },
       })
       .done(function(cekStatusTerakhirResult) {
         if (cekStatusTerakhirResult == statussekarang) {
           swal("Informasi", "Pendaftaran kelas ini sudah disetujui sebelumnya!", "warning");
         } else {
           simpan(statussekarang);
         }
       })
       .fail(function() {
         console.log("error");
       });

   });

   $('#btnDitolak').click(function(e) {

     var idregistrasi = $('#idregistrasi').val();
     statussekarang = 'Ditolak';

     if ($('#keterangankonfirmasi').val() == "") {
       swal("Informasi", "Untuk Penolakan harus ada alasan keterangan penolakan.", "info")
         .then(function() {
           $('#keterangankonfirmasi').focus();
         });
       return;
     }

     $.ajax({
         url: '<?php echo site_url('konfirmasikelas/cekStatusTerakhir') ?>',
         type: 'GET',
         dataType: 'json',
         data: {
           'idregistrasi': idregistrasi
         },
       })
       .done(function(cekStatusTerakhirResult) {
         // console.log(cekStatusTerakhirResult);

         if (cekStatusTerakhirResult == statussekarang) {
           swal("Informasi", "Pendaftaran kelas ini sudah ditolak sebelumnya!", "warning");
         } else {
           simpan(statussekarang);
         }
       })
       .fail(function() {
         console.log("error");
       });

   });


   function simpan(status) {
     var idregistrasi = $('#idregistrasi').val();
     var keterangankonfirmasi = $('#keterangankonfirmasi').val();

     var formData = {
       'idregistrasi': idregistrasi,
       'status': status,
       'keterangankonfirmasi': keterangankonfirmasi
     };
     // console.log(formData);
     // return;

     $.ajax({
         url: '<?php echo site_url('konfirmasikelas/simpan') ?>',
         type: 'POST',
         dataType: 'json',
         data: formData,
       })
       .done(function(simpanResult) {

         // $('#toni-content').empty();
         // $('#toni-content').append(simpanResult);
         // return;

         console.log(simpanResult);
         if (simpanResult.success) {
           swal('Berhasil', 'Data berhasil disimpan!', 'success').then(function() {
             window.location.href = "<?php echo (site_url('konfirmasikelas')) ?>";
           });
         } else {
           swal('Gagal', simpanResult.msg, 'info');
         }
       })
       .fail(function() {
         console.log("error simpan");
       });

   }
 </script>

 </body>

 </html>