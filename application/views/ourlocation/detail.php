<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('template/bethany/header'); ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


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


    </style>


    <style>
        .ulCabang li{
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .ulCabang li a{
            text-decoration: none;
            color : #243EAE;
            font-size: 16px;
        }
    </style>


     <style>
    #sync1 .item {
      /*background: #0c83e7;*/
      /*padding: 80px 0px;*/
      margin: 5px;
      color: #FFF;
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
      border-radius: 3px;
      text-align: center;
    }

    #sync2 .item {
      /*background: #C9C9C9;*/
      /*padding: 10px 0px;*/
      /*margin: 5px;*/
      color: #FFF;
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
      border-radius: 3px;
      text-align: center;
      cursor: pointer;
    }
    #sync1 .item img {
      height: 300px;
    }
    #sync2 .item img {
      height: 100px;
    }
    /*#sync2 .current .item {
      background: #0c83e7;
    }*/

    .owl-theme .owl-nav {
      /*default owl-theme theme reset .disabled:hover links */
    }
    .owl-theme .owl-nav [class*='owl-'] {
      transition: all .3s ease;
    }
    .owl-theme .owl-nav [class*='owl-'].disabled:hover {
      background-color: #D6D6D6;
    }

    #sync1.owl-theme {
      position: relative;
    }
    #sync1.owl-theme .owl-next, #sync1.owl-theme .owl-prev {
      width: 22px;
      height: 40px;
      margin-top: -20px;
      position: absolute;
      top: 50%;
    }
    #sync1.owl-theme .owl-prev {
      left: 10px;
    }
    #sync1.owl-theme .owl-next {
      right: 10px;
    }
  </style>

  <style>
    .detail-cabang {
      padding-top: 10px;
      padding-bottom: 30px;
    }
    .detail-cabang .detail-label{
      font-weight: bold;
    }
    .detail-cabang .detail-value{
      font-weight: bold;
    }
  </style>

</head>

<body>
    

    <?php $this->load->view('template/bethany/topmenu'); ?>

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
            <h1>OUR LOCATION </h1>
        </div>
    </section><!-- End Hero -->


    <main id="main">

        <div class="row mt-5">
            <div class="col-md-9 ps-5">
                <div class="card">
                    <div class="card-body" style="height: 800px;">
                        <div class="row">
                          <div class="col-12 text-center font-weight-bold mb-5">
                            <h1><?php echo $rowCabang->namacabang ?></h1>
                          </div>
                          <div class="col-md-4">
                            

                            <div class="row">
                              <div class="col-12">
                                
                                <?php
                                  $gambarsampul = base_url('images/nofoto.png');  
                                  if (!empty($rowCabang->gambarsampul)) {
                                    $gambarsampul = base_url('admin/uploads/cabanggereja/'.$rowCabang->gambarsampul);
                                  }
                                ?>
                                <!-- <img src="<?php echo $gambarsampul ?>" class="img-thumbnail" alt="" width="90%"> -->

                                <div id="sync1" class="owl-carousel owl-theme">
                                    <div class="item">
                                        <img src="<?php echo $gambarsampul ?>" class="img-thumbnail" alt="" width="100%">
                                    </div>

                                    <?php  
                                      
                                      if ($rsGallery->num_rows()>0) {
                                        foreach ($rsGallery->result() as $rowGallery) {
                                            $filegallery = base_url('images/nofoto.png');
                                            if (!empty($rowGallery->filegallery)) {
                                              $filegallery = base_url('admin/uploads/cabanggereja/gallery/'.$rowGallery->filegallery);
                                              // echo $filegallery;

                                    ?>

                                      <div class="item">                        
                                          <img src="<?php echo $filegallery ?>" class="img-thumbnail" alt="" width="100%">
                                      </div>

                                    <?php                              
                                            }
                                        }
                                      }
                                    ?>

                                </div>

                                <div id="sync2" class="owl-carousel owl-theme">
                                    <div class="item">
                                        <img src="<?php echo $gambarsampul ?>" class="img-thumbnail" alt="" width="100%">
                                    </div>
                                    <?php  
                                      
                                      if ($rsGallery->num_rows()>0) {
                                        foreach ($rsGallery->result() as $rowGallery) {
                                            $filegallery = base_url('images/nofoto.png');
                                            if (!empty($rowGallery->filegallery)) {
                                              $filegallery = base_url('admin/uploads/cabanggereja/gallery/'.$rowGallery->filegallery);

                                    ?>

                                      <div class="item">
                                          <img src="<?php echo $filegallery ?>" class="img-thumbnail" alt="" width="100%">
                                      </div>
                                      

                                    <?php                              
                                            }
                                        }
                                      }
                                    ?>

                                </div>

                              </div>
                              
                            </div>


                          </div>


                          <div class="col-md-8">
                            <div class="row">
                              <div class="col-12">
                                <div class="form-group row detail-cabang">
                                  <label for="" class="col-md-3 detail-label">Alamat Gereja</label>
                                  <label for="" class="col-md-1 text-center">:</label>
                                  <label for="" class="col-md-8 detail-value"><?php echo $rowCabang->alamatlengkap ?></label>
                                </div>
                                <div class="form-group row detail-cabang">
                                  <label for="" class="col-md-3 detail-label">No Telepon</label>
                                  <label for="" class="col-md-1 text-center">:</label>
                                  <label for="" class="col-md-8 detail-value"><?php echo $rowCabang->notelp ?></label>
                                </div>
                                <div class="form-group row detail-cabang">
                                  <label for="" class="col-md-3 detail-label">Nama Gembala</label>
                                  <label for="" class="col-md-1 text-center">:</label>
                                  <label for="" class="col-md-8 detail-value"><?php echo $rowCabang->namagembala ?></label>
                                </div>
                                <div class="form-group row detail-cabang">
                                  <label for="" class="col-md-3 detail-label">Jadwal Ibadah</label>
                                  <label for="" class="col-md-1 text-center">:</label>
                                  <label for="" class="col-md-8 detail-value"><?php echo $rowCabang->jadwalibadah ?></label>
                                </div>

                                

                              </div>

                              <div class="col-12 text-center mt-5">
                                <?php  
                                   $sosialmedia = '';
                                    if (!empty($rowCabang->urlfacebook)) {
                                      $sosialmedia .= '<a href="'.$rowCabang->urlfacebook.'" target="_blank" class="me-3"><i class="fab fa-facebook text-primary fa-3x"></i></a>';
                                    }
                                    if (!empty($rowCabang->urlinstagram)) {
                                      $sosialmedia .= '<a href="'.$rowCabang->urlinstagram.'" target="_blank" class="me-3"><i class="fab fa-instagram text-danger fa-3x"></i></a>';
                                    }
                                    if (!empty($rowCabang->urlyoutube)) {
                                      $sosialmedia .= '<a href="'.$rowCabang->urlyoutube.'" target="_blank" class="me-3"><i class="fab fa-youtube text-danger fa-3x"></i></a>';
                                    }
                                    if (!empty($rowCabang->urltwitter)) {
                                      $sosialmedia .= '<a href="'.$rowCabang->urltwitter.'" target="_blank" class="me-3"><i class="fab fa-twitter text-dark fa-3x"></i></a>';
                                    }
                                    if (!empty($rowCabang->urllinkedin)) {
                                      $sosialmedia .= '<a href="'.$rowCabang->urllinkedin.'" target="_blank" class="me-3"><i class="fab fa-linkedin text-primary fa-3x"></i></a>';
                                    }

                                    echo $sosialmedia;
                                ?>
                              </div>
                            </div>
                          </div>
                          

                          <?php if (!empty($rowCabang->deskripsi)) { ?>
                          <div class="col-12 mt-5">
                            <div class="row">
                              <div class="col-12 text-center">
                                <h3>Deskripsi Gereja</h3>
                              </div>
                              <div class="col-12"><hr></div>
                              <div class="col-12">
                                <?php echo $rowCabang->deskripsi ?>
                              </div>
                            </div>
                          </div>
                          <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 pe-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h5>CABANG GEREJA ELSHADDAI</h5>
                            </div>
                            <div class="col-12"><hr></div>
                            <div class="col-12" id="divContentCabang">
                                <ul class="ulCabang" id="ulCabang">
                                    <li><a href="<?php echo site_url('ourlocation/detail/') ?>">Cabang Siantan</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style='clear:both'></div>



    </main><!-- End #main -->


    <?php $this->load->view('template/bethany/footer'); ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


        <!-- 
      Make sure you put this AFTER Leaflet's CSS 
      source: https://leafletjs.com/reference.html#map-example
        -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
       integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
       crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>






  <script>
    $(document).ready(function() {

    var sync1 = $("#sync1");
    var sync2 = $("#sync2");
    var slidesPerPage = 3; //globaly define number of elements per page
    var syncedSecondary = true;

    sync1.owlCarousel({
        items: 1,
        slideSpeed: 2000,
        nav: true,
        autoplay: false, 
        dots: true,
        loop: true,
        responsiveRefreshRate: 200,
        navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
    }).on('changed.owl.carousel', syncPosition);

    sync2
        .on('initialized.owl.carousel', function() {
            sync2.find(".owl-item").eq(0).addClass("current");
        })
        .owlCarousel({
            items: slidesPerPage,
            dots: true,
            nav: true,
            smartSpeed: 200,
            slideSpeed: 500,
            slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
            responsiveRefreshRate: 100
        }).on('changed.owl.carousel', syncPosition2);

    function syncPosition(el) {
        //if you set loop to false, you have to restore this next line
        //var current = el.item.index;

        //if you disable loop you have to comment this block
        var count = el.item.count - 1;
        var current = Math.round(el.item.index - (el.item.count / 2) - .5);

        if (current < 0) {
            current = count;
        }
        if (current > count) {
            current = 0;
        }

        //end block

        sync2
            .find(".owl-item")
            .removeClass("current")
            .eq(current)
            .addClass("current");
        var onscreen = sync2.find('.owl-item.active').length - 1;
        var start = sync2.find('.owl-item.active').first().index();
        var end = sync2.find('.owl-item.active').last().index();

        if (current > end) {
            sync2.data('owl.carousel').to(current, 100, true);
        }
        if (current < start) {
            sync2.data('owl.carousel').to(current - onscreen, 100, true);
        }
    }

    function syncPosition2(el) {
        if (syncedSecondary) {
            var number = el.item.index;
            sync1.data('owl.carousel').to(number, 100, true);
        }
    }

    sync2.on("click", ".owl-item", function(e) {
        e.preventDefault();
        var number = $(this).index();
        sync1.data('owl.carousel').to(number, 300, true);
    });
});

  </script>





    <script>
    var idcabang = "<?php echo $idcabang ?>";

    var idmenu = "<?php echo $this->encrypt->encode($menu) ?>";
      
      $(document).ready(function() {          
          initMap();
      });

      


      function initMap() {
        
      

        $.ajax({
          url: '<?php echo site_url('ourlocation/getcabang') ?>',
          type: 'GET',
          dataType: 'json',
        })
        .done(function(getcabangresult) {
          var dataCabang = getcabangresult;
          $('#ulCabang').empty();

          if (dataCabang.length>0) {
            var nourut = 1;
            for (var i = dataCabang.length - 1; i >= 0; i--) {

              if (idcabang!=dataCabang[i]['idcabang']) {
                var addText = `<li><a href="<?php echo site_url('ourlocation/detail/') ?>`+dataCabang[i]['namacabang_slug']+`/`+idmenu+`">`+dataCabang[i]['namacabang']+`</a></li>`;
                $('#ulCabang').append(addText);
              }else{
                var addText = `<li><span>`+dataCabang[i]['namacabang']+`</span></li>`;
                $('#ulCabang').append(addText);
              }

              nourut++;
            }
          }else{

            var addText = `<h5 class="text-center">Data cabang gereja belum ada.</h5>`;
            $('#divContentCabang').append(addText);

          }



        })
        .fail(function() {
          console.log("error getcabang");
        });
      }


      // window.initMap = initMap;
    </script>



<script>
  
</script>

</body>


</html>