<?php $this->load->view('template/festavalive/header'); ?>

<body>

  <main>



    <?php $this->load->view('template/festavalive/topmenu'); ?>


    <section class="about-section section-padding">
      <div class="container">
        <div class="row">

          <div class="col-12 mb-4 mb-lg-0">
            <h2 class="text-white text-center mb-4 mt-3"><?php echo $rowKelas->namakelas ?></h2>
          </div>

        </div>
      </div>
    </section>


    <!-- Untuk Mobile -->
    <section class="page-content section-padding d-md-none d-sm-block">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="row">

                  <?php
                  if ($rsJadwal->num_rows() > 0) {
                    $no = 1;
                    foreach ($rsJadwal->result() as $rowJadwal) {
                      $tglmulai = date('d-m-Y', strtotime($rowJadwal->tglmulai));
                      $tglselesai = date('d-m-Y', strtotime($rowJadwal->tglselesai));

                      $jamMulai = date('H:i', strtotime($rowJadwal->tglmulai));
                      $jamSelesai = date('H:i', strtotime($rowJadwal->tglselesai));

                      if ($tglmulai == $tglselesai) {
                        $tglEvent = $tglmulai;
                      } else {
                        $tglEvent = $tglmulai . ' s/d ' . $tglselesai;
                      }

                      if ($jamMulai == $jamSelesai) {
                        $jamEvent = $jamMulai;
                      } else {
                        $jamEvent = $jamMulai . ' WIB s/d ' . $jamSelesai . ' WIB';
                      }

                      $maxJemaat = $rowJadwal->jumlahjemaat;
                      if (empty($maxJemaat)) {
                        $maxJemaat = 0;
                      }

                      $nJumlah = $this->db->query("
                      

                                                                    select count(*) as jlh from jadwaleventregistrasi where idjadwalevent='" . $rowJadwal->idjadwalevent . "' and statuskonfirmasi<>'Ditolak'
                                                                  ")->row()->jlh;
                      $jumlahPeserta = $nJumlah . '/' . $maxJemaat;
                      if ($maxJemaat == 0) {
                        $jumlahPeserta = $nJumlah;
                      } else {
                        if ($nJumlah == $maxJemaat) {
                          $jumlahPeserta = '<span class="text-danger">' . $nJumlah . '/' . $maxJemaat . '</span>';
                        }
                      }

                      $sudahPernahDaftar = $this->Nextstep_model->sudahPernahDaftar($rowJadwal->idjadwalevent, $this->session->userdata('idjemaat'));

                      if ($sudahPernahDaftar) {
                        // $button = '<button href="#" class="btn btn-success btn-sm" data-idjadwalevent="' . $rowJadwal->idjadwalevent . '" disabled>Daftar Sekarang</button>';

                        $button = '';
                      } else {
                        $button = '<a href="#" class="btn btn-success btn-sm" data-idjadwalevent="' . $rowJadwal->idjadwalevent . '" id="btnDaftar">Daftar Sekarang</a>';
                      }

                      $rsLokasi = $this->db->query("
                        select * from jadwaleventdetailtanggal where idjadwalevent = '" . $rowJadwal->idjadwalevent . "' limit 1
                      ");
                      if ($rsLokasi->num_rows() > 0) {
                        $namaLokasi = $rsLokasi->row()->lokasievent;
                      } else {
                        $namaLokasi = '';
                      }


                      echo '
                        <div class="col-12">
                          <h5>' . $rowJadwal->namaevent . '</h5>
                        </div>
                        <div class="col-12">
                          <i class="fas fa-map-marker-alt me-3"></i> ' . $namaLokasi . '
                        </div>
                        <div class="col-12">
                          <i class="fa fa-calendar me-3"></i> ' . $tglEvent . '
                        </div>
                        <div class="col-12">
                          <i class="far fa-clock me-3"></i> ' . $jamEvent . '
                        </div>
                        <div class="col-12">
                          <i class="fas fa-user-check me-3"></i> ' . $jumlahPeserta . '
                        </div>
                        ';

                      if ($sudahPernahDaftar) {

                        $rsDaftar = $this->db->query("select * from v_jadwaleventregistrasi where idjadwalevent='" . $rowJadwal->idjadwalevent . "' and idjemaat='" . $this->session->userdata('idjemaat') . "'");
                        if ($rsDaftar->num_rows() > 0) {
                          foreach ($rsDaftar->result() as $rowDaftar) {


                            if ($rowDaftar->statuskonfirmasi == 'Menunggu') {
                              echo '
                                    <div class="col-12 mt-3 ps-5">
                                      <div class="alert alert-warning" role="alert">
                                      <strong>Status Pengajuan : ' . $rowDaftar->statuskonfirmasi . '</strong><br><br>
                                      Pengajuan pendaftaran kelas anda masih dalam proses <strong>Menunggu</strong>!
                                      </div>
                                    </div>';
                            }

                            if ($rowDaftar->statuskonfirmasi == 'Disetujui') {
                              echo '
                                    <div class="col-12 mt-3 ps-5">
                                      <div class="alert alert-success" role="alert">
                                      <strong>Status Pengajuan : ' . $rowDaftar->statuskonfirmasi . '</strong><br><br>
                                      Pengajuan pendaftaran kelas sudah <strong>Disetujui</strong>!<br>
                                      Silahkan datang pada waktu jadwal yang telah ditentukan.
                                      </div>
                                    </div>';
                            }


                            if ($rowDaftar->statuskonfirmasi == 'Ditolak') {
                              echo '
                                    <div class="col-12 mt-3 ps-5">
                                      <div class="alert alert-danger" role="alert">
                                      <strong>Status Pengajuan : ' . $rowDaftar->statuskonfirmasi . '</strong><br><br>
                                      Pengajuan pendaftaran kelas <strong>Ditolak</strong>!<br>
                                      ' . $rowDaftar->keterangankonfirmasi . '.
                                      </div>
                                    </div>';
                            }
                          }
                        }
                      }


                      echo '
                        <div class="col-12 mt-3">
                          ' . $button . '
                        </div>
                      ';
                    }
                  } else {
                    echo '
                      <div class="">Jadwal kelas belum dibuka...</div>                    
                    ';
                  }
                  ?>



                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
    </section>

    <!-- Untuk PC -->
    <section class="page-content section-padding d-none d-md-block">
      <div class="container">
        <div class="row justify-content-center">

          <div class="col-12 p-5">
            <?php echo $rowKelas->deskripsi ?>
          </div>
          <div class="col-12 p-5">
            <div class="row">
              <div class="col-12">
                <h5>Jadwal Pendaftaran Kelas</h5>
                <hr>
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
                    if ($rsJadwal->num_rows() > 0) {
                      $no = 1;
                      foreach ($rsJadwal->result() as $rowJadwal) {
                        $tglmulai = date('d-m-Y', strtotime($rowJadwal->tglmulai));
                        $tglselesai = date('d-m-Y', strtotime($rowJadwal->tglselesai));

                        $jamMulai = date('H:i', strtotime($rowJadwal->tglmulai));
                        $jamSelesai = date('H:i', strtotime($rowJadwal->tglselesai));

                        if ($tglmulai == $tglselesai) {
                          $tglEvent = $tglmulai;
                        } else {
                          $tglEvent = $tglmulai . '<br>S/D<br>' . $tglselesai;
                        }

                        if ($jamMulai == $jamSelesai) {
                          $jamEvent = $jamMulai;
                        } else {
                          $jamEvent = $jamMulai . ' WIB<br>S/D<br>' . $jamSelesai . ' WIB';
                        }

                        $maxJemaat = $rowJadwal->jumlahjemaat;
                        if (empty($maxJemaat)) {
                          $maxJemaat = 0;
                        }

                        $nJumlah = $this->db->query("
                                                                    select count(*) as jlh from jadwaleventregistrasi where idjadwalevent='" . $rowJadwal->idjadwalevent . "' and statuskonfirmasi<>'Ditolak'
                                                                  ")->row()->jlh;
                        $jumlahPeserta = $nJumlah . '/' . $maxJemaat;
                        if ($maxJemaat == 0) {
                          $jumlahPeserta = $nJumlah;
                        } else {
                          if ($nJumlah == $maxJemaat) {
                            $jumlahPeserta = '<span class="text-danger">' . $nJumlah . '/' . $maxJemaat . '</span>';
                          }
                        }

                        $sudahPernahDaftar = $this->Nextstep_model->sudahPernahDaftar($rowJadwal->idjadwalevent, $this->session->userdata('idjemaat'));

                        if ($sudahPernahDaftar) {
                          $button = '<button href="#" class="btn btn-success btn-sm" data-idjadwalevent="' . $rowJadwal->idjadwalevent . '" disabled>Daftar Sekarang</button>';
                        } else {
                          $button = '<a href="#" class="btn btn-success btn-sm" data-idjadwalevent="' . $rowJadwal->idjadwalevent . '" id="btnDaftar">Daftar Sekarang</a>';
                        }

                        echo '
                                      <tr>
                                        <td style="width: 5%; text-align: center;">' . $no++ . '</td>
                                        <td style="text-align: left;">' . $rowJadwal->namaevent . '</td>
                                        <td style="width: 15%; text-align: center;">' . $tglEvent . '</td>
                                        <td style="width: 15%; text-align: center;">' . $jamEvent . '</td>
                                        <td style="width: 15%; text-align: center;">' . $jumlahPeserta . '</td>
                                        <td style="width: 15%; text-align: center;">
                                          ' . $button . '
                                        </td>
                                      </tr>
                                    ';

                        if ($sudahPernahDaftar) {


                          $rsDaftar = $this->db->query("select * from v_jadwaleventregistrasi where idjadwalevent='" . $rowJadwal->idjadwalevent . "' and idjemaat='" . $this->session->userdata('idjemaat') . "'");
                          if ($rsDaftar->num_rows() > 0) {
                            foreach ($rsDaftar->result() as $rowDaftar) {


                              if ($rowDaftar->statuskonfirmasi == 'Menunggu') {
                                echo '
                                              <tr>
                                                <td style="width: 100%; text-align: center;" colspan="6">
                                                  <div class="alert alert-warning" role="alert">
                                                    <strong>Nama Jemaat : ' . $rowDaftar->namalengkap . '</strong><br>
                                                    <strong>Tgl Pengajuan : ' . date('d-m-Y H:i:s', strtotime($rowDaftar->tglregistrasi)) . '</strong><br>
                                                    <strong>Status Pengajuan : ' . $rowDaftar->statuskonfirmasi . '</strong><br><br>
                                                    Pengajuan pendaftaran kelas anda masih dalam proses <strong>Menunggu</strong>!
                                                  </div>
                                                </td>
                                              </tr>
                                            ';;
                              }

                              if ($rowDaftar->statuskonfirmasi == 'Disetujui') {
                                echo '
                                              <tr>
                                                <td style="width: 100%; text-align: center;" colspan="6">
                                                  <div class="alert alert-success" role="alert">
                                                    <strong>Nama Jemaat : ' . $rowDaftar->namalengkap . '</strong><br>
                                                    <strong>Tgl Pengajuan : ' . date('d-m-Y H:i:s', strtotime($rowDaftar->tglregistrasi)) . '</strong><br>
                                                    <strong>Status Pengajuan : ' . $rowDaftar->statuskonfirmasi . '</strong><br><br>
                                                    Pengajuan pendaftaran kelas sudah <strong>Disetujui</strong>!<br>
                                                    Silahkan datang pada waktu jadwal yang telah ditentukan.
                                                  </div>
                                                </td>
                                              </tr>
                                            ';;
                              }


                              if ($rowDaftar->statuskonfirmasi == 'Ditolak') {
                                echo '
                                              <tr>
                                                <td style="width: 100%; text-align: center;" colspan="6">
                                                  <div class="alert alert-danger" role="alert">
                                                    <strong>Nama Jemaat : ' . $rowDaftar->namalengkap . '</strong><br>
                                                    <strong>Tgl Pengajuan : ' . date('d-m-Y H:i:s', strtotime($rowDaftar->tglregistrasi)) . '</strong><br>
                                                    <strong>Status Pengajuan : ' . $rowDaftar->statuskonfirmasi . '</strong><br><br>
                                                    Pengajuan pendaftaran kelas <strong>Ditolak</strong>!<br>
                                                    ' . $rowDaftar->keterangankonfirmasi . '.
                                                  </div>
                                                </td>
                                              </tr>
                                            ';;
                              }
                            }
                          }
                        }
                      }
                    } else {
                      echo '
                                  <tr>
                                    <td style="width: 100%; text-align: center;" colspan="6"><i>Jadwal kelas ' . $rowKelas->namakelas . ' belum dibuka.</i></td>
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
    </section>






  </main>


  <?php $this->load->view('template/festavalive/footer'); ?>

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
                data: {
                  'idjadwalevent': idjadwalevent
                },
              })
              .done(function(daftarResult) {
                console.log(daftarResult);

                if (daftarResult.success) {
                  swal("Berhasil", "Pengajuan pendaftaran kelas next step anda berhasil disimpan. Periksa kembali status pengajuan pendaftaran anda dalam 2x24 Jam", "success")
                    .then(function() {
                      window.open("<?php echo site_url('nextstep/kelas/' . $kelas_slug . '/' . $this->encrypt->encode($menu)) ?>", "_self");
                    });
                } else {
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