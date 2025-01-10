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
          <h1 class="card-title float-right">Pers. Soundsystem 18 Mei 2023</h1>
          
          <a href="<?php echo(site_url('perpuluhan/index')) ?>" class=" btn btn-primary btn-lg "><i class="fa fa-plus-circle"></i> Perpuluhan 14 Mei 2023</a> | 
          <a href="<?php echo(site_url('perpuluhan1/index')) ?>" class=" btn btn-primary btn-lg "><i class="fa fa-plus-circle"></i> Perpuluhan 18 Mei 2023</a> | 
          <a href="<?php echo(site_url('perpuluhan2/index')) ?>" class=" btn btn-primary btn-lg "><i class="fa fa-plus-circle"></i> Perpuluhan 21 Mei 2023</a> | 
          <a href="<?php echo(site_url('Soundsystem/index')) ?>" class="btn btn-info btn-lg "><i class="fa fa-plus-circle"></i> Pers. Sound System 14 Mei 2023</a> | 
          <a href="<?php echo(site_url('Soundsystem2/index')) ?>" class="btn btn-info btn-lg "><i class="fa fa-plus-circle"></i> Pers. Sound System 21 Mei 2023</a> 
         
        

          
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
              <!-- datatable -->
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-condesed" id="table">
                  <thead>
                    <tr class="bg-primary" style="">
                      <th style="width: 5%; text-align: center;">No</th>
                      <th style="width: 20%;text-align: center;">Nama / Kode</th>
                      <th style="text-align: center;">Alamat</th>
                      <th style="width: 10%;text-align: center;">Telepon</th>
                      <th style="width: 10%;text-align: center;">Jumlah</th>
                      <th style="width: 5%;text-align: center;">Tunai</th>
                      <th style="width: 5%;text-align: center;">ATM</th>
                      <th style="width: 5%;text-align: center;">Giro</th>
                      <!-- <th style="text-align: center;">R/K</th> -->
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
            "url": "<?php echo site_url('soundsystem1/datatablesource')?>",
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

