<?php $this->load->view('template/festavalive/header'); ?> 

<body>

<style>
    
@import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,300,600,700,900);



body {
  background: #ffffff;
  color: #4f585e;
  font-family: 'Source Sans Pro', sans-serif;
  text-rendering: optimizeLegibility;
}

a.btn {
  background: #0096a0;
  border-radius: 4px;
	box-shadow: 0 2px 0px 0 rgba(0,0,0,0.25);
  color: #ffffff;
  display: inline-block;
  padding: 6px 30px 8px;
  position: relative;
  text-decoration: none;
	transition: all 0.1s 0s ease-out;
}

.no-touch a.btn:hover {
  background: lighten(#0096a0,2.5);
  box-shadow: 0px 8px 2px 0 rgba(0, 0, 0, 0.075);
  transform: translateY(-2px);
  transition: all 0.25s 0s ease-out;
}

.no-touch a.btn:active,
a.btn:active {
  background: darken(#0096a0,2.5);
  box-shadow: 0 1px 0px 0 rgba(255,255,255,0.25);
  transform: translate3d(0,1px,0);
  transition: all 0.025s 0s ease-out;
}

div.cards {
  margin: 80px auto;
  max-width: 960px;
  text-align: center;
}

div.card {
  background: #ffffff;
  display: inline-block;
  margin: 8px;
  max-width: 300px;
  perspective: 1000;
  position: relative;
  text-align: left;
  transition: all 0.3s 0s ease-in;
  width: 300px;
  z-index: 1;

  img {
    max-width: 300px;
  }
  
  .card__image-holder {
    background: rgba(0,0,0,0.1);
    height: 0;
    padding-bottom: 75%;
  }

  div.card-title {
    background: #ffffff;
    padding: 6px 15px 10px;
    position: relative;
    z-index: 0;
    
    a.toggle-info {
      border-radius: 32px;
      height: 32px;
      padding: 0;
      position: absolute;
      right: 15px;
      top: 10px;
      width: 32px;
      
      span {
        background: #ffffff;
        display: block;
        height: 2px;
        position: absolute;
        top: 16px;
        transition: all 0.15s 0s ease-out;
        width: 12px;
      }
      
      span.left {
        right: 14px;
        transform: rotate(45deg);
      }
      span.right {
        left: 14px;
        transform: rotate(-45deg);
      }
    }
    
    h2 {
      font-size: 24px;
      font-weight: 700;
      letter-spacing: -0.05em;
      margin: 0;
      padding: 0;
      
      small {
        display: block;
        font-size: 18px;
        font-weight: 600;
        letter-spacing: -0.025em;
      }
    }
  }

  div.card-description {
    padding: 0 15px 10px;
    position: relative;
    font-size: 14px;
  }

  div.card-actions {
  	box-shadow: 0 2px 0px 0 rgba(0,0,0,0.075);
    padding: 10px 15px 20px;
    text-align: center;
  }
  
  div.card-flap {
    background: darken(#ffffff,15);
    position: absolute;
    width: 100%;
    transform-origin: top;
    transform: rotateX(-90deg);
  }
  div.flap1 {
    transition: all 0.3s 0.3s ease-out;
    z-index: -1;
  }
  div.flap2 {
    transition: all 0.3s 0s ease-out;
    z-index: -2;
  }
  
}

div.cards.showing {
  div.card {
    cursor: pointer;
    opacity: 0.6;
    transform: scale(0.88);
  }
}

.no-touch  div.cards.showing {
  div.card:hover {
    opacity: 0.94;
    transform: scale(0.92);
  }
}

div.card.show {
  opacity: 1 !important;
  transform: scale(1) !important;

  div.card-title {
    a.toggle-info {
      background: #ff6666 !important;
      span {
        top: 15px;
      }
      span.left {
        right: 10px;
      }
      span.right {
        left: 10px;
      }
    }
  }
  div.card-flap {
    background: #ffffff;
    transform: rotateX(0deg);
  }
  div.flap1 {
    transition: all 0.3s 0s ease-out;
  }
  div.flap2 {
    transition: all 0.3s 0.2s ease-out;
  }
}




</style>
    <main>



        <?php $this->load->view('template/festavalive/topmenu'); ?> 


        <section class="hero-section" id="section_1">
            <div class="section-overlay"></div>

            <div class="container d-flex justify-content-center align-items-center">
                <div class="row">

                    <div class="col-12 mt-auto mb-5 text-center">
                        <small><?php echo $rowinfogereja->subjudulhomepage ?></small>

                        <h1 class="text-white mb-5"><?php echo $rowinfogereja->judulhomepage ?></h1>
                        <?php
                            if (!empty($rowinfogereja->urlbuttonhomepage)) {
                                echo '
                                    <a class="btn custom-btn smoothscroll" href="'.$rowinfogereja->urlbuttonhomepage.'"></a>
                                ';
                            }else{

                            }
                        ?>
                    </div>

                    <div class="col-lg-12 col-12 mt-auto d-flex flex-column flex-lg-row text-center">
                        <div class="date-wrap">
                            <!-- <h5 class="text-white">
                                <i class="custom-icon bi-clock me-2"></i>
                                10 - 12<sup>th</sup>, Dec 2023
                            </h5> -->
                        </div>

                        <div class="location-wrap mx-auto py-3 py-lg-0">
                            <!-- <h5 class="text-white">
                                <i class="custom-icon bi-geo-alt me-2"></i>
                                National Center, United States
                            </h5> -->
                        </div>

                        <div class="social-share">
                            <!-- <ul class="social-icon d-flex align-items-center justify-content-center">
                                <span class="text-white me-3">Share:</span>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link">
                                        <span class="bi-facebook"></span>
                                    </a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link">
                                        <span class="bi-twitter"></span>
                                    </a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link">
                                        <span class="bi-instagram"></span>
                                    </a>
                                </li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="video-wrap">
                <video autoplay="" loop="" muted="" class="custom-video" poster="">
                    <source src="<?php echo base_url('assets/FestavaLive/') ?>video/pexels-2022395.mp4" type="video/mp4">

                    Your browser does not support the video tag.
                </video>
            </div>
        </section>


        <section class="about-section section-padding" id="section_2">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12 mb-4 mb-lg-0 d-flex align-items-center">
                        <div class="services-info">
                            <h5 class="text-white">Senior Pastor</h5>
                            <h2 class="text-white mb-4">Ps. Wilan</h2>

                            <p class="text-white">Pastor ... dilahirkan di Surabaya pada tanggal .... Dari kota kelahirannya, ia menempuh sekolah di ...., dan akhirnya bertobat saat SMA di Vancouver, Canada. Dua tahun setelah lulus sarjana sekolah Alkitab, saat kerusuhan terjadi di Indonesia pada bulan Mei 1998, ia memutuskan untuk pulang ke tanah airnya demi memberitakan Injil.</p>


                            <p class="text-white">Saat ini, ia menjabat sebagai gembala senior organisasi dan jaringan gereja ini. Visinya adalah untuk mendirikan 1.000 gereja lokal yang kuat dengan 1 juta murid Kristus. Kerinduan hatinya yang menyala adalah untuk melihat bangsa-bangsa mengalami kasih Yesus Kristus.</p>

                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="about-text-wrap">
                            <img src="<?php echo base_url('assets/FestavaLive/') ?>images/pexels-alexander-suhorucov-6457579.jpg" class="about-image img-fluid">

                            <div class="about-text-info d-flex">
                                <div class="d-flex">
                                    <i class="about-text-icon bi-person"></i>
                                </div>


                                <div class="ms-4">
                                    <h3>a happy moment</h3>

                                    <p class="mb-0">your amazing festival experience with us</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        

        <section class="ibadah-section">
                <div class="row">

                    <div class="col-12 text-center">
                        <h2 class="mb-4">Online Service</h1>
                    </div>

                    <div class="col-12">
                        <div class="cards">

                            <div class="card">
                            <div class="card__image-holder">
                                <img class="card__image" src="https://source.unsplash.com/300x225/?wave" alt="wave" />
                            </div>
                            <div class="card-title">
                                <a href="#" class="toggle-info btn">
                                <span class="left"></span>
                                <span class="right"></span>
                                </a>
                                <h2>
                                    Card title
                                    <small>Image from unsplash.com</small>
                                </h2>
                            </div>
                            <div class="card-flap flap1">
                                <div class="card-description">
                                This grid is an attempt to make something nice that works on touch devices. Ignoring hover states when they're not available etc.
                                </div>
                                <div class="card-flap flap2">
                                <div class="card-actions">
                                    <a href="#" class="btn">Read more</a>
                                </div>
                                </div>
                            </div>
                            </div>

                            <div class="card">
                            <div class="card__image-holder">
                                <img class="card__image" src="https://source.unsplash.com/300x225/?beach" alt="beach" />
                            </div>
                            <div class="card-title">
                                <a href="#" class="toggle-info btn">
                                <span class="left"></span>
                                <span class="right"></span>
                                </a>
                                <h2>
                                    Card title
                                    <small>Image from unsplash.com</small>
                                </h2>
                            </div>
                            <div class="card-flap flap1">
                                <div class="card-description">
                                This grid is an attempt to make something nice that works on touch devices. Ignoring hover states when they're not available etc.
                                </div>
                                <div class="card-flap flap2">
                                <div class="card-actions">
                                    <a href="#" class="btn">Read more</a>
                                </div>
                                </div>
                            </div>
                            </div>

                            <div class="card">
                            <div class="card__image-holder">
                                <img class="card__image" src="https://source.unsplash.com/300x225/?mountain" alt="mountain" />
                            </div>
                            <div class="card-title">
                                <a href="#" class="toggle-info btn">
                                <span class="left"></span>
                                <span class="right"></span>
                                </a>
                                <h2>
                                    Card title
                                    <small>Image from unsplash.com</small>
                                </h2>
                            </div>
                            <div class="card-flap flap1">
                                <div class="card-description">
                                This grid is an attempt to make something nice that works on touch devices. Ignoring hover states when they're not available etc.
                                </div>
                                <div class="card-flap flap2">
                                <div class="card-actions">
                                    <a href="#" class="btn">Read more</a>
                                </div>
                                </div>
                            </div>
                            </div>

                            <div class="card">
                            <div class="card__image-holder">
                                <img class="card__image" src="https://source.unsplash.com/300x225/?field" alt="field" />
                            </div>
                            <div class="card-title">
                                <a href="#" class="toggle-info btn">
                                <span class="left"></span>
                                <span class="right"></span>
                                </a>
                                <h2>
                                    Card title
                                    <small>Image from unsplash.com</small>
                                </h2>
                            </div>
                            <div class="card-flap flap1">
                                <div class="card-description">
                                This grid is an attempt to make something nice that works on touch devices. Ignoring hover states when they're not available etc.
                                </div>
                                <div class="card-flap flap2">
                                <div class="card-actions">
                                    <a href="#" class="btn">Read more</a>
                                </div>
                                </div>
                            </div>
                            </div>

                            <div class="card">
                            <div class="card__image-holder">
                                <img class="card__image" src="https://source.unsplash.com/300x225/?water" alt="water" />
                            </div>
                            <div class="card-title">
                                <a href="#" class="toggle-info btn">
                                <span class="left"></span>
                                <span class="right"></span>
                                </a>
                                <h2>
                                    Card title
                                    <small>Image from unsplash.com</small>
                                </h2>
                            </div>
                            <div class="card-flap flap1">
                                <div class="card-description">
                                This grid is an attempt to make something nice that works on touch devices. Ignoring hover states when they're not available etc.
                                </div>
                                <div class="card-flap flap2">
                                <div class="card-actions">
                                    <a href="#" class="btn">Read more</a>
                                </div>
                                </div>
                            </div>
                            </div>

                            <div class="card">
                            <div class="card__image-holder">
                                <img class="card__image" src="https://source.unsplash.com/300x225/?river" alt="river" />
                            </div>
                            <div class="card-title">
                                <a href="#" class="toggle-info btn">
                                <span class="left"></span>
                                <span class="right"></span>
                                </a>
                                <h2>
                                    Card title
                                    <small>Image from unsplash.com</small>
                                </h2>
                            </div>
                            <div class="card-flap flap1">
                                <div class="card-description">
                                This grid is an attempt to make something nice that works on touch devices. Ignoring hover states when they're not available etc.
                                </div>
                                <div class="card-flap flap2">
                                <div class="card-actions">
                                    <a href="#" class="btn">Read more</a>
                                </div>
                                </div>
                            </div>
                            </div>

                            <div class="card">
                            <div class="card__image-holder">
                                <img class="card__image" src="https://source.unsplash.com/300x225/?kite" alt="kite" />
                            </div>
                            <div class="card-title">
                                <a href="#" class="toggle-info btn">
                                <span class="left"></span>
                                <span class="right"></span>
                                </a>
                                <h2>
                                    Card title
                                    <small>Image from unsplash.com</small>
                                </h2>
                            </div>
                            <div class="card-flap flap1">
                                <div class="card-description">
                                This grid is an attempt to make something nice that works on touch devices. Ignoring hover states when they're not available etc.
                                </div>
                                <div class="card-flap flap2">
                                <div class="card-actions">
                                    <a href="#" class="btn">Read more</a>
                                </div>
                                </div>
                            </div>
                            </div>

                            <div class="card">
                            <div class="card__image-holder">
                                <img class="card__image" src="https://source.unsplash.com/300x225/?underwater" alt="underwater" />
                            </div>
                            <div class="card-title">
                                <a href="#" class="toggle-info btn">
                                <span class="left"></span>
                                <span class="right"></span>
                                </a>
                                <h2>
                                    Card title
                                    <small>Image from unsplash.com</small>
                                </h2>
                            </div>
                            <div class="card-flap flap1">
                                <div class="card-description">
                                This grid is an attempt to make something nice that works on touch devices. Ignoring hover states when they're not available etc.
                                </div>
                                <div class="card-flap flap2">
                                <div class="card-actions">
                                    <a href="#" class="btn">Read more</a>
                                </div>
                                </div>
                            </div>
                            </div>

                            <div class="card">
                            <div class="card__image-holder">
                                <img class="card__image" src="https://source.unsplash.com/300x225/?desert" alt="desert" />
                            </div>
                            <div class="card-title">
                                <a href="#" class="toggle-info btn">
                                <span class="left"></span>
                                <span class="right"></span>
                                </a>
                                <h2>
                                    Card title
                                    <small>Image from unsplash.com</small>
                                </h2>
                            </div>
                            <div class="card-flap flap1">
                                <div class="card-description">
                                This grid is an attempt to make something nice that works on touch devices. Ignoring hover states when they're not available etc.
                                </div>
                                <div class="card-flap flap2">
                                <div class="card-actions">
                                    <a href="#" class="btn">Read more</a>
                                </div>
                                </div>
                            </div>
                            </div>

                            </div>






                    </div>

                    

                </div>
        </section>

        

        


        <section class="contact-section section-padding" id="section_6">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12 mx-auto">
                        <h2 class="text-center mb-4">Feedback</h2>

                        <nav class="d-flex justify-content-center">
                            <div class="nav nav-tabs align-items-baseline justify-content-center" id="nav-tab"
                                role="tablist">
                                <button class="nav-link active" id="nav-ContactForm-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-ContactForm" type="button" role="tab"
                                    aria-controls="nav-ContactForm" aria-selected="false">
                                    <h5>Feedback Form</h5>
                                </button>
                            </div>
                        </nav>

                        <div class="tab-content shadow-lg mt-5" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-ContactForm" role="tabpanel"
                                aria-labelledby="nav-ContactForm-tab">
                                <form class="custom-form contact-form mb-5 mb-lg-0" action="#" method="post"
                                    role="form">
                                    <div class="contact-form-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <input type="text" name="contact-name" id="contact-name"
                                                    class="form-control" placeholder="Full name" required>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-12">
                                                <input type="email" name="contact-email" id="contact-email"
                                                    pattern="[^ @]*@[^ @]*" class="form-control"
                                                    placeholder="Email address" required>
                                            </div>
                                        </div>

                                        <textarea name="contact-message" rows="3" class="form-control"
                                            id="contact-message" placeholder="Message"></textarea>

                                        <div class="col-lg-4 col-md-10 col-8 mx-auto">
                                            <button type="submit" class="form-control">Send message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>


    <?php $this->load->view('template/festavalive/footer'); ?> 
    
    <script>

$(document).ready(function(){
  var zindex = 10;
  
  $("div.card").click(function(e){
    e.preventDefault();

    var isShowing = false;

    if ($(this).hasClass("show")) {
      isShowing = true
    }

    if ($("div.cards").hasClass("showing")) {
      // a card is already in view
      $("div.card.show")
        .removeClass("show");

      if (isShowing) {
        // this card was showing - reset the grid
        $("div.cards")
          .removeClass("showing");
      } else {
        // this card isn't showing - get in with it
        $(this)
          .css({zIndex: zindex})
          .addClass("show");

      }

      zindex++;

    } else {
      // no cards in view
      $("div.cards")
        .addClass("showing");
      $(this)
        .css({zIndex:zindex})
        .addClass("show");

      zindex++;
    }
    
  });
});


    </script>
</body>

</html>