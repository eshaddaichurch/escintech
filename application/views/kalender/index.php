<?php $this->load->view('template/festavalive/header'); ?>

<body>

  <style>
    .card-judul {
      padding: 10px 10px 10px 10px;
      background-color: #cdcdcd;
    }

    .card-judul span {
      margin-top: 8px;
      font-weight: bold;
      font-size: 20px;
      margin-top: 20px;
    }


    .card-event {
      margin: 0;
      padding: 0;
      /* background-color: #ff6d6d; */
      font-family: arial
    }

    .box {
      margin: 0 0;
      height: 100%;
      overflow: hidden;
      padding: 10px 0 40px 80px
    }

    .box ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      position: relative;
      transition: all 0.5s linear;
      top: 0
    }

    .box ul:last-of-type {
      top: 10px
    }

    .box ul:before {
      content: "";
      display: block;
      width: 0;
      height: 100%;
      border: 0.3px dashed;
      color: #D0B8A8;

      position: absolute;
      top: 0;
      left: 30px
    }

    .box ul li {
      margin: 20px 60px 60px;
      position: relative;
      padding: 10px 10px;
      background: rgba(227, 225, 217, 1);
      color: #000000;
      border-radius: 10px;
      line-height: 20px;
      width: 75%
    }


    .box ul li>span {
      content: "";
      display: block;
      width: 0;
      height: 100%;
      border: 1px solid;
      position: absolute;
      top: 0;
      left: -30px
    }

    .box ul li>span:before,
    .box ul li>span:after {
      content: "";
      display: block;
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background: #000000;
      border: 2px solid;
      position: absolute;
      left: -7.5px
    }

    .box ul li>span:before {
      top: -10px
    }

    .box ul li>span:after {
      top: 95%
    }

    .box .title {
      text-transform: uppercase;
      font-weight: 700;
      font-size: 12px;
      margin-bottom: 5px
    }

    .box .info:first-letter {
      text-transform: capitalize;
      line-height: 1.7
    }

    .box .name {
      margin-top: 10px;
      text-transform: capitalize;
      font-style: italic;
      text-align: right;
      margin-right: 20px
    }

    .jam {
      /* color:white; */
      font-style: italic;

    }

    .btn-daftar-kelas {
      display: inline-block;
      margin-top: 10px;
    }


    .box .time span {
      position: absolute;
      left: -120px;
      /* color: #fff; */
      font-size: 80%;
      font-weight: bold;
    }

    .box .time span:first-child {
      top: -16px
    }


    .box .time span:last-child {
      top: 1%
    }


    .arrow {
      position: absolute;
      top: 105%;
      left: 22%;
      cursor: pointer;
      height: 20px;
      width: 20px
    }

    .arrow:hover {
      -webkit-animation: arrow 1s linear infinite;
      -moz-animation: arrow 1s linear infinite;
      -o-animation: arrow 1s linear infinite;
      animation: arrow 1s linear infinite;
    }

    .box ul:last-of-type .arrow {
      position: absolute;
      top: 105%;
      left: 22%;
      transform: rotateX(180deg);
      cursor: pointer;
    }

    svg {
      width: 20px;
      height: 20px
    }

    @keyframes arrow {

      0%,
      100% {
        top: 105%
      }

      50% {
        top: 106%
      }
    }

    @-webkit-keyframes arrow {

      0%,
      100% {
        top: 105%
      }

      50% {
        top: 106%
      }
    }

    @-moz-keyframes arrow {

      0%,
      100% {
        top: 105%
      }

      50% {
        top: 106%
      }
    }

    @-o-keyframes arrow {

      0%,
      100% {
        top: 105%
      }

      50% {
        top: 106%
      }
    }
  </style>

  <main>



    <?php $this->load->view('template/festavalive/topmenu'); ?>


    <section class="about-section section-padding">
      <div class="container">
        <div class="row">

          <div class="col-12 mb-4 mb-lg-0">
            <h2 class="text-white text-center mb-4 mt-3">JADWAL ELSHADDAI EVENT </h2>
          </div>

        </div>
      </div>
    </section>


    <section class="page-content section-padding">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-12 card-judul">
                    <h5 class="text-center">
                      <a href="<?php echo site_url('kalender/lihatbulan/' . $bulanSebelum . '/' . $tahunSebelum . '/' . $this->encrypt->encode($menu)) ?>" class="btn btn-md float-start"><i class="fa fa-chevron-circle-left"></i></a>
                      <span><?php echo bulan($bulanEvent) . ' ' . $tahunEvent ?></span>
                      <a href="<?php echo site_url('kalender/lihatbulan/' . $bulanBerikut . '/' . $tahunBerikut . '/' . $this->encrypt->encode($menu)) ?>" class="btn btn-md float-end"><i class="fa fa-chevron-circle-right"></i></a>
                    </h5>
                  </div>
                  <div class="col-12 card-event">

                    <?php
                    if ($rsEvent->num_rows() > 0) {
                      echo '
                          <div class="box">

                            <ul id="first-list">

                          ';
                      $idjadwalevent_old = '';

                      foreach ($rsEvent->result() as $row) {
                        $button = '';
                        if ($idjadwalevent_old != $row->idjadwalevent) {
                          $sudahPernahDaftar = $this->Nextstep_model->sudahPernahDaftar($row->idjadwalevent, $this->session->userdata('idjemaat'));
                          if ($sudahPernahDaftar) {
                            $button = '<button href="#" class="btn btn-success btn-sm" data-idjadwalevent="' . $row->idjadwalevent . '" disabled>Daftar Sekarang</button>';
                          } else {
                            $button = '<button href="#" class="btn btn-success btn-sm btnDaftar" data-idjadwalevent="' . $row->idjadwalevent . '">Daftar Sekarang</button>';
                          }
                        }

                        echo '
                              <li>
                                
                                <span></span>
                               
                                <div class="title">' . $row->jenisjadwal . '</div>
                                <div class="info">' . $row->namaevent . '</div>
                                 <div class="jam">
                                  <sub>Pukul ' . date('H:i', strtotime($row->jammulai)) . ' WIB</sub>
                                  </div>
                                <div class="btn-daftar-kelas">
                                  ' . $button . '
                                </div>
                                <div class="time">
                                <span>' . hari($row->tgljadwal) . ', ' . date('d', strtotime($row->tgljadwal)) . '</span>                                                                  
                                </div>
                              </li>
                              ';
                        $idjadwalevent_old = $row->idjadwalevent;
                      }

                      echo '
                            </ul>
                          </div>

                        ';
                    } else {
                      echo '
                          <div class="text-center mt-3">Jadwal event tidak ada..</div>
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






  </main>


  <?php $this->load->view('template/festavalive/footer'); ?>



  <script>
    $(document).ready(function() {




    });


    $(document).on('click', '.btnDaftar', function(e) {
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
                      window.open("<?php echo site_url('nextstep/kelas/') ?>" + daftarResult.kelas_slug + "/" + daftarResult.menu, "_self ");
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

    // var downArrow = document.getElementById("btn1");
    // var upArrow = document.getElementById("btn2");

    // downArrow.onclick = function() {
    //   'use strict';
    //   document.getElementById("first-list").style = "top:-620px";
    //   document.getElementById("second-list").style = "top:-620px";
    //   downArrow.style = "display:none";
    //   upArrow.style = "display:block";
    // };

    // upArrow.onclick = function() {
    //   'use strict';
    //   document.getElementById("first-list").style = "top:0";
    //   document.getElementById("second-list").style = "top:80px";
    //   upArrow.style = "display:none";
    //   downArrow.style = "display:block";
    // };
  </script>


</body>

</html>