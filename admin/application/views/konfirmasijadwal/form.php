 <?php
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");
  ?>

 <style>
   .card-event h1 {
     font-size: 19px;
     color: #7F7E7E;
   }

   .card-event h2 {
     font-size: 17px;
     color: #7F7E7E;
   }

   .card-event h3 {
     font-size: 16px;
     color: #7F7E7E;
   }

   .card-event h4 {
     font-size: 15px;
     color: #7F7E7E;
   }

   .card-event h5 {
     font-size: 12px;
     color: #7F7E7E;
   }

   .card-event ul,
   li {
     font-size: 10px;
     /*color: #7F7E7E;*/
   }

   .card-event table td {
     font-size: 10px;
     padding: 5px;
   }
 </style>

 <div class="row" id="toni-breadcrumb">
   <div class="col-6">
     <h4 class="text-dark mt-2">Konfirmasi Jadwal</h4>
   </div>
   <div class="col-6">
     <ol class="breadcrumb float-sm-right">
       <li class="breadcrumb-item"><a href="<?php echo (site_url()) ?>">Home</a></li>
       <li class="breadcrumb-item"><a href="<?php echo (site_url('konfirmasijadwal')) ?>">Konfirmasi Jadwal</a></li>
       <li class="breadcrumb-item active" id="lblactive"></li>
     </ol>

   </div>
 </div>

 <div class="row" id="toni-content">
   <div class="col-md-12">



     <form action="<?php echo (site_url('konfirmasijadwal/simpan')) ?>" method="post" id="form">
       <div class="row">
         <div class="col-md-12">
           <div class="card" id="cardcontent">
             <div class="card-body">

               <input type="hidden" name="idjadwalevent" id="idjadwalevent" value="<?php echo $rowPengajuan->idjadwalevent ?>">

               <div class="row">


                 <div class="col-12 ">
                   <div class="card">
                     <div class="card-body">
                       <form action="">
                         <div class="row">
                           <div class="col-12">
                             <div class="form-group">
                               <label for="" class="">Keterangan</label>
                               <textarea name="keterangankonfirmasi" id="keterangankonfirmasi" class="form-control" rows="3" placeholder="Masukkan keterangan konfirmasi"><?php echo $rowPengajuan->keterangankonfirmasi ?></textarea>
                             </div>
                           </div>

                           <div class="col-12">
                             <button class="btn btn-success btn-lg" id="btnDisetujui"><i class="fa fa-check"></i> Disetujui</button>
                             <button class="btn btn-danger btn-lg" id="btnDitolak"><i class="fa fa-times"></i> Ditolak</button>
                           </div>
                         </div>
                       </form>
                     </div>
                   </div>

                 </div>

                 <div class="col-4">

                   <div class="card">
                     <div class="card-body card-event shadow">

                       <h3 class="text-gray">Informasi Jadwal Event</h3>
                       <hr>
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
                           <table class="table">
                             <tbody>
                               <tr style="font-size: 30px; font-weight: bold;">
                                 <td>Nama Event</td>
                                 <td>:</td>
                                 <td><?php echo $rowPengajuan->namaevent ?></td>
                               </tr>
                               <tr>
                                 <td style="width: 30%">Id/ Tgl Jadwal</td>
                                 <td style="width: 5%; text-align: center;">:</td>
                                 <td><?php echo $rowPengajuan->idjadwalevent . ' / ' . $rowPengajuan->tglmulai; ?></td>
                               </tr>
                               <tr>
                                 <td>Nama Departemen</td>
                                 <td>:</td>
                                 <td><?php echo $rowPengajuan->namadepartement ?></td>
                               </tr>
                               <tr>
                                 <td>Nama Penanggung Jawab</td>
                                 <td>:</td>
                                 <td><?php echo $rowPengajuan->namapenanggungjawab ?></td>
                               </tr>
                               <tr>
                                 <td>Jenis Event</td>
                                 <td>:</td>
                                 <td><?php echo $rowPengajuan->jenisjadwal ?></td>
                               </tr>
                               <tr>
                                 <td>Jumlah Volunteer</td>
                                 <td>:</td>
                                 <td><?php echo $rowPengajuan->jumlahvolunteer ?></td>
                               </tr>
                               <tr>
                                 <td>Jumlah Jemaat Angoota</td>
                                 <td>:</td>
                                 <td><?php echo $rowPengajuan->jumlahjemaat ?></td>
                               </tr>
                               <tr>
                                 <td>Tipe Jadwal</td>
                                 <td>:</td>
                                 <td><?php echo ($rowPengajuan->onsitestatus == 'Ya') ? 'Onsite' : 'Online' ?></td>
                               </tr>
                             </tbody>
                           </table>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>


                 <div class="col-4">

                   <div class="card">
                     <div class="card-body card-event shadow">

                       <h3 class="text-gray">Kelengkapan Event</h3>
                       <hr>
                       <div class="row">
                         <div class="col-md-12">
                           <?php
                            $pesan = $this->session->flashdata("pesan");
                            if (!empty($pesan)) {
                              echo $pesan;
                            }
                            ?>
                         </div>

                         <?php
                          $rsInventaris = $this->db->query("select * from v_jadwaleventdetailinventaris where idjadwalevent='$idjadwalevent' ");
                          if ($rsInventaris->num_rows() > 0) {
                            echo '
                                <div class="col-12">
                                  <h5>Inventaris Yang Dibutuhkan:</h5>
                                  <ul>
                              ';
                            foreach ($rsInventaris->result() as $row) {
                              echo '
                                  <li>' . $row->namainventaris . ' (' . $row->qty . ' ' . $row->satuan . ')' . '</li>
                                ';
                            }

                            echo '
                                </div>
                              ';
                          }

                          $rsParkiran = $this->db->query("select * from v_jadwaleventdetailparkiran where idjadwalevent='$idjadwalevent' ");
                          if ($rsParkiran->num_rows() > 0) {
                            echo '
                                <div class="col-12">
                                  <h5>Parkiran Yang Dibutuhkan:</h5>
                                  <ul>
                              ';
                            foreach ($rsParkiran->result() as $row) {
                              echo '
                                  <li>' . $row->namaparkiran . '</li>
                                ';
                            }

                            echo '
                                </div>
                              ';
                          }

                          $rsRuangan = $this->db->query("select * from v_jadwaleventdetailruangan where idjadwalevent='$idjadwalevent' ");
                          if ($rsRuangan->num_rows() > 0) {
                            echo '
                                <div class="col-12">
                                  <h5>Ruangan Yang Dibutuhkan:</h5>
                                  <ul>
                              ';
                            foreach ($rsRuangan->result() as $row) {
                              echo '
                                  <li>' . $row->namaruangan . '</li>
                                ';
                            }

                            echo '
                                </div>
                              ';
                          }

                          $rsPelayanan = $this->db->query("select * from v_jadwaleventdetailpelayanan where idjadwalevent='$idjadwalevent' ");
                          if ($rsPelayanan->num_rows() > 0) {
                            echo '
                                <div class="col-12">
                                  <h5>Pelayanan Yang Dibutuhkan:</h5>
                                  <ul>
                              ';
                            foreach ($rsPelayanan->result() as $row) {
                              echo '
                                  <li>' . $row->namapelayanan . '</li>
                                ';
                            }

                            echo '
                                </div>
                              ';
                          }


                          ?>


                       </div>
                     </div>
                   </div>
                 </div>


                 <div class="col-4">

                   <div class="card">
                     <div class="card-body card-event shadow">

                       <h3 class="text-gray">Informasi Lainnya</h3>
                       <hr>
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

                           <?php if ($rowPengajuan->diumumkankejemaat == 'Ya') { ?>
                             <h3 class="text-gray">Diumumkan Ke Jemaat</h3>
                             <hr>
                             <table class="table">

                               <tbody>
                                 <tr>
                                   <td style="width: 30%">Tgl Mulai Diumumkan</td>
                                   <td style="width: 5%">:</td>
                                   <td><?php echo $rowPengajuan->tglmulaidiumumkan ?></td>
                                 </tr>
                                 <tr>
                                   <td style="width: 30%">Tgl Selesai Diumumkan</td>
                                   <td style="width: 5%">:</td>
                                   <td><?php echo $rowPengajuan->tglselesaidiumumkan ?></td>
                                 </tr>
                                 <tr>
                                   <td style="width: 30%">Pengumuman Disampaikan Melalui</td>
                                   <td style="width: 5%">:</td>
                                   <td><?php echo $rowPengajuan->pengumumandisampaikanmelalui ?></td>
                                 </tr>
                                 <tr>
                                   <td style="width: 30%">Konsep Pengumuman</td>
                                   <td style="width: 5%">:</td>
                                   <td><?php echo $rowPengajuan->konseppengumuman ?></td>
                                 </tr>
                                 <tr>
                                   <td style="width: 30%">Detail Konsep Pengumuman</td>
                                   <td style="width: 5%">:</td>
                                   <td><?php echo $rowPengajuan->detailkonseppengumuman ?></td>
                                 </tr>
                               </tbody>
                             </table>
                           <?php } ?>


                           <?php if ($rowPengajuan->tampilkandiwebsite == 'Ya') {
                              if (!empty($rowPengajuan->gambarsampul)) {
                                $gambarsampul = base_url('uploads/jadwalevent/' . $rowPengajuan->gambarsampul);
                              } else {
                                $gambarsampul = base_url('images/nofoto.png');
                              }
                            ?>
                             <h3 class="text-gray"> <i class="fa fa-check"></i> Tampilkan Di Website</h3>
                             <hr>
                             <table class="table">

                               <tbody>
                                 <tr>
                                   <td style="width: 30%">Gambar Sampul</td>
                                   <td style="width: 5%">:</td>
                                   <td><img src="<?php echo $gambarsampul ?>" alt="" style="width: 30%;"></td>
                                 </tr>
                                 <tr>
                                   <td style="width: 30%">Deskripsi Event</td>
                                   <td style="width: 5%">:</td>
                                   <td><?php echo $rowPengajuan->deskripsi ?></td>
                                 </tr>
                               </tbody>
                             </table>
                           <?php } ?>

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
     </form>





   </div>
 </div> <!-- /.row -->
 <!-- Main row -->



 <?php $this->load->view("template/footer") ?>



 <script type="text/javascript">
   var idjadwalevent = "<?php echo ($idjadwalevent) ?>";

   $(document).ready(function() {

     $('.select2').select2();

     //---------------------------------------------------------> JIKA EDIT DATA
     if (idjadwalevent != "") {
       $.ajax({
           type: 'POST',
           url: '<?php echo site_url("hagah/get_edit_data") ?>',
           data: {
             idjadwalevent: idjadwalevent
           },
           dataType: 'json',
           encode: true
         })
         .done(function(result) {
           $("#idjadwalevent").val(result.idjadwalevent);
           $("#tglhagah").val(result.tglhagah);
           $("#idkitab").val(result.idkitab).trigger('change');
           $("#pasal1").val(result.pasal1);
           $("#pasal2").val(result.pasal2);

         });


       $("#lbljudul").html("Edit Data Jemaat");
       $("#lblactive").html("Edit");

     } else {
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
         kitab: {
           validators: {
             notEmpty: {
               message: "kitab tidak boleh kosong"
             },
           }
         },
         pasal1: {
           validators: {
             notEmpty: {
               message: "pasal awal tidak boleh kosong"
             },
           }
         },
         pasal2: {
           validators: {
             notEmpty: {
               message: "pasal akhir tidak boleh kosong"
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
     var idjadwalevent = $('#idjadwalevent').val();
     statussekarang = 'Disetujui';


     $.ajax({
         url: '<?php echo site_url('konfirmasijadwal/cekStatusTerakhir') ?>',
         type: 'GET',
         dataType: 'json',
         data: {
           'idjadwalevent': idjadwalevent
         },
       })
       .done(function(cekStatusTerakhirResult) {
         if (cekStatusTerakhirResult == statussekarang) {
           swal("Informasi", "Jadwal event Ini sudah disetujui sebelumnya!", "warning");
         } else {
           simpan(statussekarang);
         }
       })
       .fail(function() {
         console.log("error");
       });

   });

   $('#btnDitolak').click(function(e) {

     var idjadwalevent = $('#idjadwalevent').val();
     statussekarang = 'Ditolak';

     if ($('#keterangankonfirmasi').val() == "") {
       swal("Informasi", "Untuk Penolakan harus ada keterangan penolakan agar bisa diperbaiki oleh pengaju event", "info")
         .then(function() {
           $('#keterangankonfirmasi').focus();
         });
       return;
     }

     $.ajax({
         url: '<?php echo site_url('konfirmasijadwal/cekStatusTerakhir') ?>',
         type: 'GET',
         dataType: 'json',
         data: {
           'idjadwalevent': idjadwalevent
         },
       })
       .done(function(cekStatusTerakhirResult) {
         // console.log(cekStatusTerakhirResult);

         if (cekStatusTerakhirResult == statussekarang) {
           swal("Informasi", "Jadwal event Ini sudah ditolak sebelumnya!", "warning");
         } else {
           simpan(statussekarang);
         }
       })
       .fail(function() {
         console.log("error");
       });

   });


   function simpan(status) {
     var idjadwalevent = $('#idjadwalevent').val();
     var keterangankonfirmasi = $('#keterangankonfirmasi').val();

     $.ajax({
         url: '<?php echo site_url('konfirmasijadwal/simpan') ?>',
         type: 'POST',
         dataType: 'json',
         data: {
           'idjadwalevent': idjadwalevent,
           'status': status,
           'keterangankonfirmasi': keterangankonfirmasi
         },
       })
       .done(function(simpanResult) {
         // console.log(simpanResult);
         if (simpanResult.success) {
           swal('Berhasil', 'Data berhasil disimpan!', 'success').then(function() {
             window.location.href = "<?php echo (site_url('konfirmasijadwal')) ?>";
           });
         } else {
           swal('Berhasil', simpanResult.msg, 'info');
         }
       })
       .fail(function() {
         console.log("error simpan");
       });

   }
 </script>

 </body>

 </html>