<?php
$this->load->view("template/header");
$this->load->view("template/topmenu");
$this->load->view("template/sidemenu");
?>
<style>
  .text-very-small {
    font-size: 10px;
  }
</style>
  <div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Under Maintenance</h4>
    </div>
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo (site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item active">Under Maintenance</li>
      </ol>

    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12">
      <div class="card" id="cardcontent">

        <div class="card-body">
          <div class="row">

            <div class="col-12 text-center">
              <img src="<?php echo base_url('images/under-maintenance.jpg') ?>" alt="" style="width: 40%;">
              <h5>Maaf Sedang Dalam Perbaikan! <a href="<?php echo site_url() ?>">Kembali ke home!</a></h5>
            </div>

          </div> <!-- /.row -->
        </div> <!-- ./card-body -->
      </div> <!-- /.card -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->
  <!-- Main row -->




<?php $this->load->view("template/footer")?>



<script type="text/javascript">


  $(document).ready(function() {

  }); //end (document).ready


</script>

</body>
</html>

