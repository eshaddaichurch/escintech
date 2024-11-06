

<?php $this->load->view('template/festavalive/header'); ?> 
<?php $this->load->view('template/festavalive/topmenu'); ?> 
<main id="main">

<style>
    /********** Template CSS **********/
:root {
    --primary: #FF6500;
    --light: #FBF3D5;
    --dark: #181d38;
}

.fw-medium {
    font-weight: 600 !important;
}

.fw-semi-bold {
    font-weight: 700 !important;
}

.back-to-top {
    position: fixed;
    display: none;
    right: 45px;
    bottom: 45px;
    z-index: 99;
}


/*** Spinner ***/
#spinner {
    opacity: 0;
    visibility: hidden;
    transition: opacity .5s ease-out, visibility 0s linear .5s;
    z-index: 99999;
}

#spinner.show {
    transition: opacity .5s ease-out, visibility 0s linear 0s;
    visibility: visible;
    opacity: 1;
}


/*** Button ***/
.btn {
    font-family: 'Nunito', sans-serif;
    font-weight: 600;
    transition: .5s;
}

.btn.btn-primary,
.btn.btn-secondary {
    color: #FFFFFF;
}

.btn-square {
    width: 38px;
    height: 38px;
}

.btn-sm-square {
    width: 32px;
    height: 32px;
}

.btn-lg-square {
    width: 48px;
    height: 48px;
}

.btn-square,
.btn-sm-square,
.btn-lg-square {
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: normal;
    border-radius: 0px;
}

.text-berwarna{
    color: #FF6500;
}


/*** Navbar ***/
.navbar .dropdown-toggle::after {
    border: none;
    content: "\f107";
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    vertical-align: middle;
    margin-left: 8px;
}

.navbar-light .navbar-nav .nav-link {
    margin-right: 30px;
    padding: 25px 0;
    color: #FFFFFF;
    font-size: 15px;
    text-transform: uppercase;
    outline: none;
}

.navbar-light .navbar-nav .nav-link:hover,
.navbar-light .navbar-nav .nav-link.active {
    color: var(--primary);
}

@media (max-width: 991.98px) {
    .navbar-light .navbar-nav .nav-link  {
        margin-right: 0;
        padding: 10px 0;
    }

    .navbar-light .navbar-nav {
        border-top: 1px solid #EEEEEE;
    }
}

.navbar-light .navbar-brand,
.navbar-light a.btn {
    height: 75px;
}

.navbar-light .navbar-nav .nav-link {
    color: var(--dark);
    font-weight: 500;
}

.navbar-light.sticky-top {
    top: -100px;
    transition: .5s;
}

@media (min-width: 992px) {
    .navbar .nav-item .dropdown-menu {
        display: block;
        margin-top: 0;
        opacity: 0;
        visibility: hidden;
        transition: .5s;
    }

    .navbar .dropdown-menu.fade-down {
        top: 100%;
        transform: rotateX(-75deg);
        transform-origin: 0% 0%;
    }

    .navbar .nav-item:hover .dropdown-menu {
        top: 100%;
        transform: rotateX(0deg);
        visibility: visible;
        transition: .5s;
        opacity: 1;
    }
}


/*** Header carousel ***/
@media (max-width: 768px) {
    .header-carousel .owl-carousel-item {
        position: relative;
        min-height: 500px;
    }
    
    .header-carousel .owl-carousel-item img {
        position: absolute;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
}

.header-carousel .owl-nav {
    position: absolute;
    top: 50%;
    right: 8%;
    transform: translateY(-50%);
    display: flex;
    flex-direction: column;
}

.header-carousel .owl-nav .owl-prev,
.header-carousel .owl-nav .owl-next {
    margin: 7px 0;
    width: 45px;
    height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #FFFFFF;
    background: transparent;
    border: 1px solid #FFFFFF;
    font-size: 22px;
    transition: .5s;
}

.header-carousel .owl-nav .owl-prev:hover,
.header-carousel .owl-nav .owl-next:hover {
    background: var(--primary);
    border-color: var(--primary);
}

.page-header {
    background: linear-gradient(rgba(24, 29, 56, .7), rgba(24, 29, 56, .7)), url(../img/carousel-1.jpg);
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
}

.page-header-inner {
    background: rgba(15, 23, 43, .7);
}

.breadcrumb-item + .breadcrumb-item::before {
    color: var(--light);
}
h6{
    color: var(--primary);
}


/*** Section Title ***/
.section-title {
    position: relative;
    display: inline-block;
    text-transform: uppercase;
}

.section-title::before {
    position: absolute;
    content: "";
    width: calc(100% + 80px);
    height: 2px;
    top: 4px;
    left: -40px;
    background: var(--primary);
    z-index: -1;
}

.section-title::after {
    position: absolute;
    content: "";
    width: calc(100% + 120px);
    height: 2px;
    bottom: 5px;
    left: -60px;
    background: var(--primary);
    z-index: -1;
}

.section-title.text-start::before {
    width: calc(100% + 40px);
    left: 0;
}

.section-title.text-start::after {
    width: calc(100% + 60px);
    left: 0;
}


/*** Service ***/
.service-item {
    background: var(--light);
    transition: .5s;
}

.service-item:hover {
    margin-top: -10px;
    background: var(--primary);
}

.service-item * {
    transition: .5s;
}

.service-item:hover * {
    color: var(--light) !important;
}


/*** Categories & Courses ***/
.category img,
.course-item img {
    transition: .5s;
}

.category a:hover img,
.course-item:hover img {
    transform: scale(1.1);
}





@media (min-width: 768px) {
    .testimonial-carousel::before,
    .testimonial-carousel::after {
        width: 200px;
    }
}

@media (min-width: 992px) {
    .testimonial-carousel::before,
    .testimonial-carousel::after {
        width: 300px;
    }
}

.testimonial-carousel .owl-item .testimonial-text,
.testimonial-carousel .owl-item.center .testimonial-text * {
    transition: .5s;
}

.testimonial-carousel .owl-item.center .testimonial-text {
    background: var(--primary) !important;
}

.testimonial-carousel .owl-item.center .testimonial-text * {
    color: #FFFFFF !important;
}

.testimonial-carousel .owl-dots {
    margin-top: 24px;
    display: flex;
    align-items: flex-end;
    justify-content: center;
}

.testimonial-carousel .owl-dot {
    position: relative;
    display: inline-block;
    margin: 0 5px;
    width: 15px;
    height: 15px;
    border: 1px solid #CCCCCC;
    transition: .5s;
}

.testimonial-carousel .owl-dot.active {
    background: var(--primary);
    border-color: var(--primary);
}


/*** Footer ***/
.footer .btn.btn-social {
    margin-right: 5px;
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--light);
    font-weight: normal;
    border: 1px solid #FFFFFF;
    border-radius: 35px;
    transition: .3s;
}

.footer .btn.btn-social:hover {
    color: var(--primary);
}

.footer .btn.btn-link {
    display: block;
    margin-bottom: 5px;
    padding: 0;
    text-align: left;
    color: #FFFFFF;
    font-size: 15px;
    font-weight: normal;
    text-transform: capitalize;
    transition: .3s;
}

.footer .btn.btn-link::before {
    position: relative;
    content: "\f105";
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    margin-right: 10px;
}

.footer .btn.btn-link:hover {
    letter-spacing: 1px;
    box-shadow: none;
}

.footer .copyright {
    padding: 25px 0;
    font-size: 15px;
    border-top: 1px solid rgba(256, 256, 256, .1);
}

.footer .copyright a {
    color: var(--light);
}

.footer .footer-menu a {
    margin-right: 15px;
    padding-right: 15px;
    border-right: 1px solid rgba(255, 255, 255, .1);
}

.footer .footer-menu a:last-child {
    margin-right: 0;
    padding-right: 0;
    border-right: none;
}
</style>

<section>
        <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?php echo base_url('assets/gambar/back.jpg'); ?>'); height: 400px; background-size: cover; background-position: center;" >
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2 class="text-white"><?php echo $title ?></h2>
        <!-- <button>Daftar</button> -->
        

      </div>
    </div><!-- End Breadcrumbs -->
    </section>


    <!-- About Start -->
    <div class="container-xxl py-5 mt-5">
        <div class="container">
            <div class="row g-5 mb-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="<?php echo base_url('assets/gambar/salib.jpg');?>" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start pe-3">About Us</h6>
                    <h1 class="mb-4">Welcome El Shaddai Church</h1>
                    <h5>Sejarah dan Latar Belakang</h5>
                    <p class="mb-4">Gereja Bethel Indonesia (GBI) El Shaddai didirikan pada tahun 2009 sebagai wadah untuk melayani dan membimbing Jiwa-jiwa dalam iman Kristen. Dengan visi menghadirkan kasih dan kuasa Tuhan bagi setiap orang, gereja ini terus berkembang sebagai tempat ibadah dan komunitas yang hangat bagi jemaat dari berbagai latar belakang. GBI El Shaddai merupakan bagian dari sinode GBI, salah satu sinode gereja terbesar di Indonesia, yang berada di bawah naungan Persekutuan Gereja-Gereja di Indonesia (PGI).</p>
                </div>
            </div>
            <div>
                <h5>Penggembalaan oleh Pdt. Wilan</h5>
                <p>Di bawah penggembalaan Pdt. Wilan, GBI El Shaddai berkomitmen untuk terus membangun iman jemaat serta memperluas pelayanan kasih Tuhan ke lingkungan sekitar. Pdt. Wilan, dengan dedikasi dan hati yang tulus, telah menjadi pemimpin spiritual yang membawa pembaruan dalam setiap pelayanan di gereja ini. Dengan pendekatan yang penuh kasih dan perhatian, ia memimpin jemaat untuk semakin mengenal Tuhan dan bertumbuh dalam kebenaran firman-Nya.</p>
                <h5>Visi dan Misi</h5>
                <p>Visi GBI El Shaddai adalah menjadi gereja yang berdampak, menjangkau orang-orang untuk menjadi murid Kristus dan memuliakan Tuhan dalam setiap aspek kehidupan. Dengan misi membawa kasih Tuhan kepada mereka yang membutuhkan, gereja ini berusaha menjadi komunitas yang mendukung setiap jemaat untuk menjalani hidup yang berkemenangan dan berbuah bagi kemuliaan Tuhan.</p>
                <h5>Kegiatan dan Pelayanan</h5>
                <p>GBI El Shaddai memiliki berbagai kegiatan dan pelayanan yang menyasar seluruh kelompok usia, mulai dari anak-anak, remaja, pemuda, hingga orang dewasa dan lansia. Beberapa pelayanan utama di gereja ini meliputi:</p>
                <ol>
                    <li>
                    Ibadah Minggu - Ibadah utama yang diadakan setiap Minggu sebagai waktu bagi jemaat untuk bersekutu, berdoa, dan mendengarkan firman Tuhan.
                    </li>
                    <li>
                    Sekolah Minggu Anak - Pelayanan khusus bagi anak-anak untuk mengenalkan mereka pada nilai-nilai iman dan firman Tuhan sejak dini.
                    </li>
                    <li>
                    Komunitas Pemuda - Menyediakan wadah bagi remaja dan pemuda untuk bertumbuh dalam iman bersama teman-teman sebaya.
                    </li>
                    <li>
                    Pelayanan Sosial - Kegiatan yang melibatkan jemaat dalam pelayanan kepada masyarakat sekitar, seperti bakti sosial, pembagian sembako, serta kunjungan ke panti asuhan atau panti jompo.
                    </li>
                    <li>
                    Kelas Pengajaran dan Discipleship - Kelas-kelas ini ditujukan bagi jemaat yang ingin mendalami ajaran Kristen dan firman Tuhan lebih jauh, serta mempersiapkan mereka untuk menjadi pemimpin yang dapat melayani di gereja.
                    </li>
                </ol>
                <h5>Komunitas yang Hangat dan Terbuka</h5>
                <p>Salah satu kekuatan GBI El Shaddai adalah komunitas yang hangat dan terbuka, di mana setiap orang dapat merasa diterima. Jemaat didorong untuk saling mendukung dan membangun hubungan yang akrab dan penuh kasih, yang mencerminkan kasih Kristus.</p>
                <h5>Panggilan untuk Menjadi Berkat</h5>
                <p>GBI El Shaddai berkomitmen untuk terus menjadi berkat, baik bagi jemaat maupun masyarakat di sekitarnya. Dengan dasar iman dan harapan dalam Tuhan, gereja ini terus melangkah maju untuk menjangkau jiwa-jiwa dan membawa terang Kristus dalam setiap aspek kehidupan.</p>
                <p>Sejak berdirinya pada tahun 2009, GBI El Shaddai telah menjadi tempat bagi banyak orang untuk bertumbuh dalam iman. Di bawah penggembalaan Pdt. Wilan, gereja ini berupaya membawa visi dan misi Tuhan ke tengah dunia yang membutuhkan kasih dan kebenaran-Nya.</p>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Service Start -->
   <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-graduation-cap text-berwarna mb-4"></i>
                            <h5 class="mb-3">About Jesus</h5>
                            <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-berwarna mb-4"></i>
                            <h5 class="mb-3">Our Ministries</h5>
                            <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book-open text-berwarna mb-4"></i>
                            <h5 class="mb-3">Next Step</h5>
                            <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class=" fa-3x fas fa-map text-berwarna mb-4"></i>
                            <h5 class="mb-3">Our Location</h5>
                            <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

<?php $this->load->view('template/festavalive/footer'); ?> 