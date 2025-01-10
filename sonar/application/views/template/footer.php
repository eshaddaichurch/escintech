
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
<style>
  #linkdropdownnotif {
    /*word-wrap: break-word;*/
    /*width: 400px !important;*/
  }

  .contentNotif {
    width: 100%;
  }
</style>
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo(base_url()) ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo(base_url()) ?>assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo(base_url()) ?>assets/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo(base_url()) ?>assets/adminlte/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo(base_url()) ?>assets/adminlte/dist/js/demo.js"></script>

<!-- ChartJS -->
<script src="<?php echo(base_url()) ?>assets/adminlte/plugins/chart.js/Chart.min.js"></script>


<!-- datatables -->
  <script src="<?php echo(base_url()) ?>assets/datatables2/js/jquery.dataTables.min.js"></script>


  <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootbox/bootbox.js"></script>
  

  <!-- jquery-confirm  -->
  <script src="<?php echo(base_url("assets/")) ?>jquery-confirm/js/jquery-confirm.min.js"></script>

  <!-- jquery-mask -->
  <script type="text/javascript" src="<?php echo base_url("assets/") ?>jquery_mask/jquery.mask.js"></script>

  <!-- Bootstrap validator -->
  <script src="<?php echo(base_url("assets/")) ?>bootstrap-validator/js/bootstrapValidator.js"></script>

  <!-- jquery-ui -->
  <script src="<?php echo(base_url("assets/")) ?>jquery-ui/jquery-ui-2.js"></script>

  <!-- select2 -->
  <script src="<?php echo(base_url()) ?>assets/select2/js/select2.min.js"></script>
  
  <!-- CK Editor -->
  <!-- <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> -->
  <script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>

<!-- -------------------------------------------------------------------------------------------PAGE SCRIPTS / buang aja -->
<!-- <script src="<?php echo(base_url()) ?>assets/adminlte/dist/js/pages/dashboard2.js"></script> -->





<script>
    const numberWithCommas = (x) => {
          return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }  

    const untitik = (i) => {
        return typeof i === "string" ?
                            i.replace(/[\$,]/g, '')*1 :
                            typeof i === "number" ?
                                i : 0;
    }
    
    $('#btnnotifikasi').click(function() {
      
      $.ajax({
        url: "<?php echo site_url('home/get_notifikasi') ?>",
        type: 'POST',
        dataType: 'json',
      })
      .done(function(resultnotif) {
          console.log(resultnotif);
          var textNotif = ``;

        $('#contentNotif').empty();
        

        var nCount = 1;
        var nLength = resultnotif.data.length;

        if (nLength>0) {
          // textNotif += `<span class="dropdown-item dropdown-header">`+resultnotif.data.length+` Notifikasi</span>`;
          $.each(resultnotif.data, function(index, val) {

            if (val['sudahdilihat']=='Ya') {
              var iconI = `<i class="fas fa-circle mr-2 text-gray"></i>`;
            }else{
              var iconI = `<i class="fas fa-circle mr-2 text-success"></i>`;              
            }
            textNotif += `
              <a href="`+val['linkurl']+`" class="dropdown-item" id="linkdropdownnotif">
                `+iconI+` `+val['deskripsi']+`
                <br><b>`+val['namatask'] +`   </b> <span class="text-muted text-sm">  `+val['tglnotifikasi']+`</span>
              </a>
              <div class="dropdown-divider"></div>
            `;

            if (nCount==nLength) {
              textNotif += `<div class="dropdown-divider"></div>
            <a href="`+resultnotif.base_url+`/home/allnotifikasi" class="dropdown-item dropdown-footer">Lihat semua notifikasi</a>`;
              $('#contentNotif').html(textNotif);            
            }
            nCount++;
            // console.log(textNotif);
          });

        }else{
          textNotif += `<span class="dropdown-item dropdown-header">Notifikasi tidak ada</span>`;  
          textNotif += `<div class="dropdown-divider"></div>
            <a href="`+resultnotif.base_url+`/home/allnotifikasi" class="dropdown-item dropdown-footer">Lihat semua notifikasi</a>`;
          $('#contentNotif').html(textNotif);            

        }

      })
      .fail(function() {
        console.log("error");
      });
      
    });
</script>


<script>
  
</script>
