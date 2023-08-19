<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('template/bethany/header'); ?>

        <style>
        
/*--------------------------------------------------------------
# Hero Section
--------------------------------------------------------------*/
#hero {
  width: 100%;
  height: 40vh;
  background: url("<?php echo base_url('images/banner2.jpg') ?>") center center;
  background-size: cover;
  position: relative;
}
#hero .container {
  padding-top: 80px;
}
#hero:before {
  content: "";
  background: rgba(0, 0, 0, 0.6);
  position: absolute;
  bottom: 0;
  top: 0;
  left: 0;
  right: 0;
}
#hero h1 {
  margin: 0 0 10px 0;
  font-size: 48px;
  font-weight: 700;
  line-height: 56px;
  color: #fff;
}
#hero h2 {
  color: #eee;
  margin-bottom: 40px;
  font-size: 15px;
  font-weight: 500;
  font-family: "Open Sans", sans-serif;
  letter-spacing: 0.5px;
  text-transform: uppercase;
}
#hero .btn-get-started {
  font-family: "Poppins", sans-serif;
  text-transform: uppercase;
  font-weight: 500;
  font-size: 14px;
  letter-spacing: 1px;
  display: inline-block;
  padding: 8px 28px;
  border-radius: 50px;
  transition: 0.5s;
  margin: 10px;
  border: 2px solid #fff;
  color: #fff;
}
#hero .btn-get-started:hover {
  background: #EE6F09;
  border: 2px solid #EE6F09;
}
@media (min-width: 1024px) {
  #hero {
    background-attachment: fixed;
  }
}
@media (max-width: 768px) {
  #hero {
    height: 100vh;
  }
  #hero .container {
    padding-top: 60px;
  }
  #hero h1 {
    font-size: 32px;
    line-height: 36px;
  }
}

  .table-jadwal tr td{
    vertical-align: middle;
  }


    </style>

</head>

<body>
    

    <?php $this->load->view('template/bethany/topmenu'); ?>

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
            <h1><?php echo $rowKelas->namakelas ?></h1>
        </div>
    </section><!-- End Hero -->


    <main id="main">

        <!-- ======= Clients Section ======= -->
        <section id="pages" class="pages">
            <div class="container">

                <div class="row">
                    <div class="col-12 p-5">
                        <?php echo $rowKelas->deskripsi ?>
                    </div>
                    <div class="col-12 p-5">
                      <div class="row">
                        <div class="col-12">
                          <h5>Jadwal Pendaftaran Kelas</h5><hr>
                        </div>
                        <div class="col-12">
                          <table class="table table-condesed text-sm table-jadwal">
                            <thead>
                              <tr>
                                <th style="width: 5%; text-align: center;">No</th>
                                <th style="text-align: left;">Nama Kelas</th>
                                <th style="width: 15%; text-align: center;">Tanggal Kelas</th>
                                <th style="width: 15%; text-align: center;">Jam Kelas</th>
                                <th style="width: 15%; text-align: center;">Jumlah Peserta</th>
                                <th style="width: 15%; text-align: center;">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>

                              <?php  
                                if ($rsJadwal->num_rows()>0) {
                                  $no=1;
                                  foreach ($rsJadwal->result() as $rowJadwal) {
                                    $tglmulai = date('d-m-Y', strtotime($rowJadwal->tglmulai));
                                    $tglselesai = date('d-m-Y', strtotime($rowJadwal->tglselesai));

                                    $jamMulai = date('H:i', strtotime($rowJadwal->tglmulai));
                                    $jamSelesai = date('H:i', strtotime($rowJadwal->tglselesai));

                                    if ($tglmulai==$tglselesai) {
                                      $tglEvent = $tglmulai;
                                    }else{
                                      $tglEvent = $tglmulai.'<br>S/D<br>'.$tglselesai;
                                    }

                                    if ($jamMulai==$jamSelesai) {
                                      $jamEvent = $jamMulai;
                                    }else{
                                      $jamEvent = $jamMulai.' WIB<br>S/D<br>'.$jamSelesai.' WIB';
                                    }

                                    $maxJemaat = $rowJadwal->jumlahjemaat;
                                    if (empty($maxJemaat)) {
                                      $maxJemaat = 0;
                                    }

                                    $nJumlah = $this->db->query("
                                                                    select count(*) as jlh from registrasikelas where idkelas='".$rowJadwal->idkelas."' and idjadwalevent='".$rowJadwal->idjadwalevent."' and statuskonfirmasi<>'Ditolak'
                                                                  ")->row()->jlh;
                                    $jumlahPeserta = $nJumlah.'/'.$maxJemaat;
                                    if ($maxJemaat==0) {
                                      $jumlahPeserta = $nJumlah;
                                    }else{
                                      if ($nJumlah==$maxJemaat) {
                                        $jumlahPeserta = '<span class="text-danger">'.$nJumlah.'/'.$maxJemaat.'</span>';
                                      }
                                    }

                                    $sudahPernahDaftar = $this->Nextstep_model->sudahPernahDaftar($rowJadwal->idjadwalevent, $this->session->userdata('idjemaat'));

                                    if ($sudahPernahDaftar) {
                                      $button = '<button href="#" class="btn btn-success btn-sm" data-idjadwalevent="'.$rowJadwal->idjadwalevent.'" disabled>Daftar Sekarang</button>';
                                    }else{
                                      $button = '<a href="#" class="btn btn-success btn-sm" data-idjadwalevent="'.$rowJadwal->idjadwalevent.'" id="btnDaftar">Daftar Sekarang</a>';
                                    }

                                    echo '
                                      <tr>
                                        <td style="width: 5%; text-align: center;">'.$no++.'</td>
                                        <td style="text-align: left;">'.$rowJadwal->namaevent.'</td>
                                        <td style="width: 15%; text-align: center;">'.$tglEvent.'</td>
                                        <td style="width: 15%; text-align: center;">'.$jamEvent.'</td>
                                        <td style="width: 15%; text-align: center;">'.$jumlahPeserta.'</td>
                                        <td style="width: 15%; text-align: center;">
                                          '.$button.'
                                        </td>
                                      </tr>
                                    ';

                                    if ($sudahPernahDaftar) {
                                      $rsDaftar = $this->db->query("select * from v_jadwaleventregistrasi where idjadwalevent='".$rowJadwal->idjadwalevent."' and idjemaat='".$this->session->userdata('idjemaat')."'");
                                      if ($rsDaftar->num_rows()>0) {
                                        foreach ($rsDaftar->result() as $rowDaftar) {


                                          if ($rowDaftar->statuskonfirmasi=='Menunggu') {
                                            echo '
                                              <tr>
                                                <td style="width: 100%; text-align: center;" colspan="6">
                                                  <div class="alert alert-warning" role="alert">
                                                    <strong>Nama Jemaat : '.$rowDaftar->namalengkap.'</strong><br>
                                                    <strong>Tgl Pengajuan : '.date('d-m-Y H:i:s', strtotime($rowDaftar->tglregistrasi)).'</strong><br>
                                                    <strong>Status Pengajuan : '.$rowDaftar->statuskonfirmasi.'</strong><br><br>
                                                    Pengajuan pendaftaran kelas anda masih dalam proses <strong>Menunggu</strong>!
                                                  </div>
                                                </td>
                                              </tr>
                                            ';;
                                          }

                                          if ($rowDaftar->statuskonfirmasi=='Disetujui') {
                                            echo '
                                              <tr>
                                                <td style="width: 100%; text-align: center;" colspan="6">
                                                  <div class="alert alert-success" role="alert">
                                                    <strong>Nama Jemaat : '.$rowDaftar->namalengkap.'</strong><br>
                                                    <strong>Tgl Pengajuan : '.date('d-m-Y H:i:s', strtotime($rowDaftar->tglregistrasi)).'</strong><br>
                                                    <strong>Status Pengajuan : '.$rowDaftar->statuskonfirmasi.'</strong><br><br>
                                                    Pengajuan pendaftaran kelas sudah <strong>Disetujui</strong>!<br>
                                                    Silahkan datang pada waktu jadwal yang telah ditentukan.
                                                  </div>
                                                </td>
                                              </tr>
                                            ';;
                                          }


                                          if ($rowDaftar->statuskonfirmasi=='Disetujui') {
                                            echo '
                                              <tr>
                                                <td style="width: 100%; text-align: center;" colspan="6">
                                                  <div class="alert alert-danger" role="alert">
                                                    <strong>Nama Jemaat : '.$rowDaftar->namalengkap.'</strong><br>
                                                    <strong>Tgl Pengajuan : '.date('d-m-Y H:i:s', strtotime($rowDaftar->tglregistrasi)).'</strong><br>
                                                    <strong>Status Pengajuan : '.$rowDaftar->statuskonfirmasi.'</strong><br><br>
                                                    Pengajuan pendaftaran kelas <strong>Ditolak</strong>!<br>
                                                    '.$rowDaftar->keterangankonfirmasi.'.
                                                  </div>
                                                </td>
                                              </tr>
                                            ';;
                                          }


                                        }
                                      }

                                    }


                                  }
                                }else{
                                  echo '
                                  <tr>
                                    <td style="width: 100%; text-align: center;" colspan="6"><i>Jadwal kelas '.$rowKelas->namakelas.' belum dibuka.</i></td>
                                  </tr>
                                  ';
                                }
                              ?>

                              
                            </tbody>
                          </table>
                        </div>
                        

                      </div>
                    </div>

                </div>

            </div>
        </section><!-- End Clients Section -->



    </main><!-- End #main -->


    <?php $this->load->view('template/bethany/footer'); ?>

    <script>

      $(document).on('click', '#btnDaftar', function(e) {
        var idjadwalevent = $(this).attr('data-idjadwalevent');

        e.preventDefault();

        swal({
          title: "Daftar Kelas?",
          text: "Anda ingin mendaftar di kelas ini? Pastikan anda sudah memenuhi persyaratan untuk mendaftar.",
          icon: "warning",
          buttons: ["Batal!", "Ya!"],
          dangerMode: true,
        })
        .then((daftarkelas) => {
          if (daftarkelas) {

            $.ajax({
              url: '<?php echo site_url('nextstep/daftar') ?>',
              type: 'POST',
              dataType: 'json',
              data: {'idjadwalevent': idjadwalevent},
            })
            .done(function(daftarResult) {
              console.log(daftarResult);

              if (daftarResult.success) {
                swal("Berhasil", "Pengajuan pendaftaran kelas next step anda berhasil disimpan. Periksa kembali status pengajuan pendaftaran anda dalam 2x24 Jam", "success")
                  .then(function(){
                    window.open("<?php echo site_url('nextstep/kelas/'.$kelas_slug.'/'.$this->encrypt->encode($menu)) ?>", "_self");
                  });
              }else{
                swal("Gagal", daftarResult.msg, "info");
              }
            })
            .fail(function() {
              console.log("error");
            });

          }
        });

      });
    </script>
</body>

</html>