<?php
$this->load->view("template/header");
$this->load->view("template/topmenu");
$this->load->view("template/sidemenu");
?>

  <div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Riwayat Tugas</h4>
    </div>
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo (site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item active">Riwayat Tugas</li>
      </ol>

    </div>
  </div>

  <div class="row" id="toni-content">


    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <h4 class="text-gray mb-3">Riwayat Tugas</h4>
            </div>


            <div class="col-12">

              <ul class="list-group">

<?php

if ($rsriwayat->num_rows() > 0) {
    foreach ($rsriwayat->result() as $row) {
        echo '
          <a href="' . site_url($row->linkurl) . '" class="li-riwayat"><li class="list-group-item text-very-small text-dark">' . $row->deskripsi . ' <span class="text-info">(' . berapawaktuyanglalu($row->tglriwayat) . ')</span></li></a>';
    }
}
?>

              </ul>

            </div>

          </div>


          <div class="col-md-12 mt-4">
              <?php echo $pagination; ?>
          </div>

        </div>
      </div>
    </div>


  </div> <!-- /.row -->
  <!-- Main row -->




<?php $this->load->view("template/footer")?>



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
            "url": "<?php echo site_url('kategori/datatablesource') ?>",
            "type": "POST"
        },
        "columnDefs": [
                        { "targets": [ 0 ], "orderable": false, "className": "dt-body-center" },
                        { "targets": [ 1 ], "className": "dt-body-center" },
                        { "targets": [ 2 ], "orderable": false, "className": "dt-body-center" },
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

