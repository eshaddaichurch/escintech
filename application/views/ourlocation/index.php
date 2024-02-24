<?php $this->load->view('template/festavalive/header'); ?> 



<body>


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
          #map { height: 700px; }
    
          .link-popup {
            font-size: 14px;
            float: right;
            margin-top: 20px;
            margin-bottom: 20px;
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

    <main>



        <?php $this->load->view('template/festavalive/topmenu'); ?> 


        <section class="about-section section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-12 mb-4 mb-lg-0">
                      <h2 class="text-white text-center mb-4 mt-3">OUR LOCATION</h2>
                    </div>

                </div>
            </div>
        </section>



        <section class="page-content section-padding">
            <div class="container">
                <div class="row justify-content-center">
                <div class="col-md-9 ps-5">
                  <div class="card">
                      <div class="card-body">
                        <div id="map"></div>
                          
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
                              <div class="col-12">
                                  <ul class="ulCabang" id="ulCabang">
                                      <li><a href="<?php echo site_url('ourlocation/detail/') ?>">Cabang Siantan</a></li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              
                  

                    

                </div>
            </div>
        </section>


        



    </main>


    <?php $this->load->view('template/festavalive/footer'); ?> 
    

    
        <!-- 
      Make sure you put this AFTER Leaflet's CSS 
      source: https://leafletjs.com/reference.html#map-example
        -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
       integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
       crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>


      
    <script>

    var idmenu = "<?php echo $this->encrypt->encode($menu) ?>";
      

    const centerMap = [0.03718835906169617, 110.35766601562501];
      var map = L.map('map').setView(centerMap, 8);
      L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
              maxZoom: 19,
              attribution: '© OpenStreetMap'
          }).addTo(map);


      $(document).ready(function() {          
          initMap();
      });

      

      //event click
      function onMapClick(e) {
          alert("You clicked the map at " + e.latlng);
      }



      function initMap() {
        const myLatLng = {lat: 0.461323, lng: 127.843268};

        map.remove();
        map = L.map('map').setView(centerMap, 8);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
              maxZoom: 19,
              attribution: '© OpenStreetMap'
          }).addTo(map);
      

        $.ajax({
          url: '<?php echo site_url('ourlocation/getcabang') ?>',
          type: 'GET',
          dataType: 'json',
        })
        .done(function(getcabangresult) {
          console.log(getcabangresult);
          var dataCabang = getcabangresult;
          $('#ulCabang').empty();

          if (dataCabang.length>0) {
            var nourut = 1;
            for (var i = dataCabang.length - 1; i >= 0; i--) {

              var latitude = dataCabang[i]['latitude'];
              var longitude = dataCabang[i]['longitude'];
              var lokasi = [latitude, longitude];

              // console.log(lokasi);

              setMarker(lokasi, dataCabang[i]['idcabang'], dataCabang[i]['namacabang'], dataCabang[i]['namacabang_slug'], dataCabang[i]['namagembala'], dataCabang[i]['gambarsampul'], dataCabang[i]['alamatlengkap'], dataCabang[i]['icon']);

              var addText = `<li><a href="<?php echo site_url('ourlocation/detail/') ?>`+dataCabang[i]['namacabang_slug']+`/`+idmenu+`">`+dataCabang[i]['namacabang']+`</a></li>`;
                
              $('#ulCabang').append(addText);
              nourut++;
            }
          }


        })
        .fail(function() {
          console.log("error getcabang");
        });
      }

      function setMarker(lokasi, idcabang, namacabang, namacabang_slug, namagembala, gambarsampul, alamatlengkap, icon)
      {        
        try {

            if (icon=="" || icon == null) {

                var iconWarna = L.icon({
                        iconUrl: '<?php echo base_url('images/pin2.png') ?>',
                        iconSize: [28, 30],
                    });
            }else{

                var iconWarna = L.icon({
                        iconUrl: '<?php echo base_url('uploads/cabanggereja/') ?>'+icon,
                        iconSize: [28, 30],
                    });


            }



            // var marker = L.marker(lokasi).addTo(map);
            var marker = L.marker(lokasi, {icon: iconWarna}).addTo(map);
            //adding popup
            marker.bindPopup("<b>"+namacabang+"</b><hr><small>Nama Gembala: "+namagembala+'</small><br><a href="<?php echo site_url('ourlocation/detail/') ?>'+namacabang_slug+'/'+idmenu+'" class="link-popup">Lihat Selengkapnya</a> <br><br>');
        }
        catch (e) {
            console.log("Lokasi "+lokasi+" tidak ditemukan!");
        }
      }


      // window.initMap = initMap;
    </script>

</body>

</html>