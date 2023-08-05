<?php  
  $this->load->view("adminLTE/header");
  $this->load->view("adminLTE/topmenu");
  $this->load->view("adminLTE/sidemenu");

?>
<style>
  .nav-tabs .nav-link.active {
    font-weight:bold;
    background-color: transparent;
    border-bottom:3px solid #dd0000;
    border-right: none;
    border-left: none;
    border-top: none;
}

</style>
  

  <div class="row" >
    <div class="col-md-12">
      <div class="card" id="cardcontent">
        <div class="card-header">
          <h1 class="card-title float-right">Perpuluhan 18 Mei 2023</h1>
          
        </div>
        <div class="card-body">


         

          

          <div class="row">
            <div class="col-md-12">
              <?php 
                $pesan = $this->session->flashdata("pesan");
                if (!empty($pesan)) {
                  echo $pesan;
                }
              ?>
            </div> 
            <div class="col-md-12">


            <div class="row">
            <div class="col-md-12">
              <?php 
                $pesan = $this->session->flashdata("pesan");
                if (!empty($pesan)) {
                  echo $pesan;
                }
              ?>
            </div> 
            <div class="col-md-12">

            <section class="content">
<div class="container-fluid">

<div class="row">
<div class="col-lg-3 col-6">

<div class="small-box bg-info">
<div class="inner">
<h3>PERSEMBAHAN</h3>
<p>PERPULUHAN</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="<?php echo(site_url('perpuluhan/index')) ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-success">
<div class="inner">
<h3>PERSEMBAHAN<sup style="font-size: 20px"></sup></h3>
<p>SOUND SYSTEM</p>
</div>
<div class="icon">
<i class="ion ion-stats-bars"></i>
</div>
<a href="<?php echo(site_url('Soundsystem/index')) ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-warning">
<div class="inner">
<H3>PERSEMBAHAN</H3>
<p>PEMBANGUNAN</p>
</div>
<div class="icon">
<i class="ion ion-person-add"></i>
</div>
<a href="<?php echo(site_url('perpuluhan1/index')) ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-danger">
<div class="inner">
<h3>PERSEMBAHAN</h3>
<p>SOSIAL</p>
</div>
<div class="icon">
<i class="ion ion-pie-graph"></i>
</div>
<a href="<?php echo(site_url('perpuluhan2/index')) ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div> 


              <!-- datatable -->
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-condesed" id="table">
                  <thead>
                    <tr class="bg-primary" style="">
                      <th style="width: 5%; text-align: center;">No</th>
                      <th style="text-align: center;">Nama / Kode</th>
                      <th style="text-align: center;">Perpuluhan</th>
                      <th style="text-align: center;">Ucapan Syukur</th>
                      <th style="text-align: center;">Dll</th>
                      <th style="text-align: center;">Tunai</th>
                      <th style="text-align: center;">ATM</th>
                      <th style="text-align: center;">Giro</th>
                      <th style="text-align: center;">R/K</th>
                      <!-- <th style="text-align: center; width: 15%;">Aksi</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>              
                </table>
              </div>
            
            </div>



          </div> <!-- /.row -->
        </div> <!-- ./card-body -->
      </div> <!-- /.card -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->
  <!-- Main row -->




<?php $this->load->view("adminLTE/footer") ?>


</div>


<script type="text/javascript">

  var table;

  $(document).ready(function() {

    //defenisi datatable
    table = $("#table").DataTable({ 
        "select": true,
        "processing": true, 
        "serverSide": true, 
        "order": [], 
         "ajax": {
            "url": "<?php echo site_url('perpuluhan1/datatablesource')?>",
            "type": "POST"
        },
        "columnDefs": [
                        { "targets": [ 0 ], "orderable": false, "className": "dt-body-center" },
                        { "targets": [ 1 ], "className": "dt-body-center" },
                        { "targets": [ 2 ], "className": "dt-body-center" },
                        { "targets": [ 3 ], "className": "dt-body-center" },
                        { "targets": [ 4 ], "className": "dt-body-center" },
                        { "targets": [ 5 ], "className": "dt-body-center" },
                        { "targets": [ 6 ], "orderable": false, "className": "dt-body-center" },
        ],
 
    });

  }); //end (document).ready

  

  
</script>

</body>
</html>

