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
  background: url("<?php echo base_url('images/banner_for.jpg') ?>") center center;
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

</head>

<body>

    <?php $this->load->view('template/bethany/topmenu'); ?>

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
            <h1><?php echo 'Halaman tidak ditemukan' ?></h1>
        </div>
    </section><!-- End Hero -->


    <main id="main">

        <!-- ======= Clients Section ======= -->
        <section id="pages" class="pages">
            <div class="container">

                <div class="row">
                    <div class="col-12 p-5">
                        
                    </div>

                </div>

            </div>
        </section><!-- End Clients Section -->



    </main><!-- End #main -->


    <?php $this->load->view('template/bethany/footer'); ?>

</body>

</html>