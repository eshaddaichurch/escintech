
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
   
</script>


<script>
  
</script>
