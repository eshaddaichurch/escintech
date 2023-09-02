
  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3><?php echo $this->session->userdata('namagereja'); ?></h3>
            <p>
              <?php echo $this->session->userdata('alamatgereja'); ?> <br>
              <strong>Phone:</strong> <?php echo $this->session->userdata('notelpgereja'); ?><br>
              <strong>Email:</strong> <?php echo $this->session->userdata('emailgereja'); ?><br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Bethany</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- jQuery -->
  <script src="<?php echo(base_url()) ?>admin/assets/jquery/jquery.min.js"></script>

  <!-- Vendor JS Files -->
  <script src="<?php echo site_url('assets/bethany/') ?>assets/vendor/purecounter/purecounter.js"></script>
  <script src="<?php echo site_url('assets/bethany/') ?>assets/vendor/aos/aos.js"></script>
  <script src="<?php echo site_url('assets/bethany/') ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo site_url('assets/bethany/') ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo site_url('assets/bethany/') ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo site_url('assets/bethany/') ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo site_url('assets/bethany/') ?>assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo site_url('assets/bethany/') ?>assets/js/main.js"></script>



<!-- datatables -->
  <script src="<?php echo(base_url()) ?>admin/assets/datatables2/js/jquery.dataTables.min.js"></script>


  <script type="text/javascript" src="<?php echo base_url(); ?>admin/assets/bootbox/bootbox.js"></script>
  

  <!-- jquery-confirm  -->
  <script src="<?php echo(base_url("admin/assets/")) ?>jquery-confirm/js/jquery-confirm.min.js"></script>

  <!-- jquery-mask -->
  <script type="text/javascript" src="<?php echo base_url("admin/assets/") ?>jquery_mask/jquery.mask.js"></script>

  <!-- Bootstrap validator -->
  <script src="<?php echo(base_url("admin/assets/")) ?>bootstrap-validator/js/bootstrapValidator.js"></script>

  <!-- jquery-ui -->
  <script src="<?php echo(base_url("admin/assets/")) ?>jquery-ui/jquery-ui-2.js"></script>

  <!-- select2 -->
  <script src="<?php echo(base_url()) ?>admin/assets/select2/js/select2.min.js"></script>
  
  <!-- CK Editor -->
  <!-- <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> -->
  <script src="<?php echo base_url(); ?>admin/assets/ckeditor/ckeditor.js"></script>

  <script src="<?php echo(base_url()) ?>admin/assets/sweetalert/sweetalert.min.js"></script>



  <?php 
    $pesan = $this->session->flashdata('pesan');
    if (!empty($pesan)) {
      echo $pesan;
    }
  ?>
  
  <?php 
  $this->load->view('loginModal');
  $this->load->view('registrasiModal');
  ?>
  

  <script>

    $('.show-form-login').click(function(e) {
      e.preventDefault();
      $('#registrasiModal').modal('hide');
      $('#loginModal').modal('show');
    });

    $('.show-form-registrasi').click(function(e) {
      e.preventDefault();
      $('#loginModal').modal('hide');
      $('#registrasiModal').modal('show');
    });

  </script>


  

<script>

  function createTimeStamp(dates)
  {    
    var datesSpliet = dates.split("-");
    var newDate = datesSpliet[1]+"/"+datesSpliet[2]+"/"+datesSpliet[0];
    var tStamp = new Date(newDate).getTime();
    var tStampStr = tStamp.toString();
    return tStampStr.substring(0,10);
  }

  function timestampToDate(nTimestamp)
  {
    var date = new Date(nTimestamp * 1000);
    var hours = date.getHours();
    var minutes = "0" + date.getMinutes();
    var seconds = "0" + date.getSeconds();
    var formattedTime = hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
    // console.log(date);
    return date;
  }

  function setCookie(cname, cvalue) {
    var date = new Date();
    // var exdays = date.setDate(date.getDate() + 1); //1day
    var exdays = 1; // 1 hour
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 60 * 60 * 1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires;
  }

  function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

  function formatDate(date) {
    date = new Date(date);
    return (
      [
        date.getFullYear(),
        padTo2Digits(date.getMonth() + 1),
        padTo2Digits(date.getDate()),
      ].join('-')
    );
  }

  function formatDateTime(date) {
    return (
      [
        date.getFullYear(),
        padTo2Digits(date.getMonth() + 1),
        padTo2Digits(date.getDate()),
      ].join('-') +
      ' ' +
      [
        padTo2Digits(date.getHours()),
        padTo2Digits(date.getMinutes()),
        // padTo2Digits(date.getSeconds()),  // 👈️ can also add seconds
      ].join(':')
    );
  }


  function padTo2Digits(num) {
    return num.toString().padStart(2, '0');
  }


  function addSelectOption(selectId, optValue, optText)
  {
    var select = document.getElementById(selectId);
    var option = document.createElement("option");
    option.value = optValue;
    option.innerHTML = optText;
    select.appendChild(option);
  }

  function tglHariIni()
  {
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
    return today;
  }

  function tgldmy(date) {
    date = new Date(date);
    return (
      [
        padTo2Digits(date.getDate()),
        padTo2Digits(date.getMonth() + 1),
        date.getFullYear(),
      ].join('-')
    );
  }

  function tglymd(date) {
    date = new Date(date);
    return (
      [
        date.getFullYear(),
        padTo2Digits(date.getMonth() + 1),
        padTo2Digits(date.getDate()),
      ].join('-')
    );
  }

</script>
