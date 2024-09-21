</div> <!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer text-sm">
  <strong>Copyright &copy; 2020.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 1.0
  </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo (base_url()) ?>assets/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo (base_url()) ?>assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo (base_url()) ?>assets/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo (base_url()) ?>assets/adminlte/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<!-- <script src="<?php echo (base_url()) ?>assets/adminlte/dist/js/demo.js"></script> -->

<!-- ChartJS -->
<script src="<?php echo (base_url()) ?>assets/adminlte/plugins/chart.js/Chart.min.js"></script>


<!-- datatables -->
<script src="<?php echo (base_url()) ?>assets/datatables2/js/jquery.dataTables.min.js"></script>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootbox/bootbox.js"></script>


<!-- jquery-confirm  -->
<script src="<?php echo (base_url("assets/")) ?>jquery-confirm/js/jquery-confirm.min.js"></script>

<!-- jquery-mask -->
<script type="text/javascript" src="<?php echo base_url("assets/") ?>jquery_mask/jquery.mask.js"></script>

<!-- Bootstrap validator -->
<script src="<?php echo (base_url("assets/")) ?>bootstrap-validator/js/bootstrapValidator.js"></script>

<!-- jquery-ui -->
<script src="<?php echo (base_url("assets/")) ?>jquery-ui/jquery-ui-2.js"></script>

<!-- select2 -->
<script src="<?php echo (base_url()) ?>assets/select2/js/select2.min.js"></script>

<!-- CK Editor -->
<!-- <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> -->
<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<!-- <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.1.0/ckeditor5.css">
<script src="https://cdn.ckeditor.com/ckeditor5/43.1.0/ckeditor5.js"></script> -->

<script src="<?php echo (base_url()) ?>assets/sweetalert/sweetalert.min.js"></script>


<!-- -------------------------------------------------------------------------------------------PAGE SCRIPTS / buang aja -->
<!-- <script src="<?php echo (base_url()) ?>assets/adminlte/dist/js/pages/dashboard2.js"></script> -->





<script>
  const numberWithCommas = (x) => {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }

  const untitik = (i) => {
    return typeof i === "string" ?
      i.replace(/[\$,]/g, '') * 1 :
      typeof i === "number" ?
      i : 0;
  }
</script>




<script>
  var idotorisasi = "<?php echo $this->session->userdata('idotorisasi'); ?>";
  $('.hanya-admin').hide();

  $(document).ready(function() {

    if (idotorisasi != "0001") {
      $('.hanya-admin').hide();
    } else {
      $('.hanya-admin').show();
    }


    if (idotorisasi == "0000") {
      $('.hanya-admin').show();
    }



  });

  function format_decimal(number, decPlaces, decSep, thouSep) {
    decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
      decSep = typeof decSep === "undefined" ? "." : decSep;
    thouSep = typeof thouSep === "undefined" ? "," : thouSep;
    var sign = number < 0 ? "-" : "";
    var i = String(parseInt(number = Math.abs(Number(number) || 0).toFixed(decPlaces)));
    var j = (j = i.length) > 3 ? j % 3 : 0;

    return sign +
      (j ? i.substr(0, j) + thouSep : "") +
      i.substr(j).replace(/(\decSep{3})(?=\decSep)/g, "$1" + thouSep) +
      (decPlaces ? decSep + Math.abs(number - i).toFixed(decPlaces).slice(2) : "");
  }

  function stringToDate(str) {
    var date = str.split("-"),
      d = date[0],
      m = date[1],
      y = date[2],
      temp = [];
    temp.push(y, m, d);
    // return (temp.join("-"));
    return (new Date(temp.join("-")));
  }

  $(".tanggal").mask("00-00-0000", {
    placeholder: "dd-mm-yyyy"
  });
  $(".rupiah").mask("000,000,000,000", {
    reverse: true,
    placeholder: "000,000,000,000"
  });
  $('.rupiah').addClass('text-right')
</script>




<script>
  function createTimeStamp(dates) {
    var datesSpliet = dates.split("-");
    var newDate = datesSpliet[1] + "/" + datesSpliet[2] + "/" + datesSpliet[0];
    var tStamp = new Date(newDate).getTime();
    var tStampStr = tStamp.toString();
    return tStampStr.substring(0, 10);
  }

  function timestampToDate(nTimestamp) {
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
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires;
  }

  function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
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
      ' ' + [
        padTo2Digits(date.getHours()),
        padTo2Digits(date.getMinutes()),
        // padTo2Digits(date.getSeconds()),  // 👈️ can also add seconds
      ].join(':')
    );
  }


  function padTo2Digits(num) {
    return num.toString().padStart(2, '0');
  }


  function addSelectOption(selectId, optValue, optText) {
    var select = document.getElementById(selectId);
    var option = document.createElement("option");
    option.value = optValue;
    option.innerHTML = optText;
    select.appendChild(option);
  }

  function tglHariIni() {
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear() + "-" + (month) + "-" + (day);
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

<script>
  function maintenance() {
    var IdPegawai = "<?php echo $this->session->userdata('IdPegawai') ?>";
    if (IdPegawai != "8888888888") {
      window.open("<?php echo site_url('maintenance/index') ?>", "_self");
      return;
    }
  }
</script>