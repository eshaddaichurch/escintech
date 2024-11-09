<?php
$this->load->view("template/header");
$this->load->view("template/topmenu");
$this->load->view("template/sidemenu");
?>

<div class="row" id="toni-breadcrumb">
  <div class="col-6">
    <h4 class="text-dark mt-2">Disciples Community</h4>
  </div>
  <div class="col-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo (site_url()) ?>">Home</a></li>
      <li class="breadcrumb-item active">DC</li>
    </ol>

  </div>
</div>

<div class="row" id="toni-content">
  <div class="col-md-12">
    <div class="card" id="cardcontent">
      <div class="card-header" id="lbljudul">
        <h5 class="card-title">List Disciples Community</h5>
        <a href="<?php echo (site_url('Disciplescommunity/tambah')) ?>" class="btn btn-sm btn-primary float-right"><i class="fa fa-plus-circle"></i> Tambah Data</a>
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
                  <tr class="bg-success" style="">
                    <th style="width: 5%; text-align: center;">No</th>
                    <th style="text-align: center; width: 10%;">Foto</th>
                    <th style="text-align: center;">Nama DC</th>
                    <th style="text-align: center;">Lokasi DC</th>
                    <th style="text-align: center;">Nama DM</th>
                    <th style="text-align: center;">Jadwal</th>
                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center; width: 10%;;">Aksi</th>
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




<?php $this->load->view("template/footer") ?>



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
        "url": "<?php echo site_url('disciplescommunity/datatablesource') ?>",
        "type": "POST"
      },


      "columnDefs": [{
          "targets": [0],
          "orderable": false,
          "className": "dt-body-center"
        },
        {
          "targets": [1],
          "className": "dt-body-center"
        },
        {
          "targets": [2],
          "className": "dt-body-left"
        },
        {
          "targets": [3],
          "className": "dt-body-left"
        },
        {
          "targets": [4],
          "className": "dt-body-left"
        },
        {
          "targets": [5],
          "className": "dt-body-center"
        },
        {
          "targets": [6],
          "className": "dt-body-center"
        },
        {
          "targets": [7],
          "orderable": false,
          "className": "dt-body-center"
        },
      ],




    });

  }); //end (document).ready


  $(document).on("click", "#hapus", function(e) {
    var link = $(this).attr("href");
    e.preventDefault();
    bootbox.confirm("Anda yakin ingin menghapus data ini ?", function(result) {
      if (result) {
        document.location.href = link;
      }
    });
  });
</script>

</body>

</html>