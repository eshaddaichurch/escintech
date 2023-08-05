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
        <h4 class="text-dark mt-2">Tugas</h4>
    </div>
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo (site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item active">Tugas</li>
      </ol>

    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12">
      <div class="card" id="cardcontent">
        <div class="card-header">
          <h5 class="card-title">List Data Tugas</h5>
          <a href="<?php echo (site_url('Task/tambah')) ?>" class="btn btn-sm btn-success float-right"><i class="fa fa-plus-circle"></i> Tambah Data</a>
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

            <div class="col-md-12 mb-3 text-very-small">
              <div class="row">

                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Nama Proyek</label>
                    <select name="idproyek" id="idproyek" class="form-control select2">
                      <option value="">---Semua---</option>
                      <?php
$rsproyek = $this->db->query("select * from proyek order by namaproyek");
if ($rsproyek->num_rows() > 0) {
    foreach ($rsproyek->result() as $row) {
        echo '
                              <option value="' . $row->idproyek . '">' . $row->namaproyek . '</option>
                            ';
    }
}
?>

                    </select>
                  </div>
                </div>


                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Nama PIC</label>
                    <select name="idpic" id="idpic" class="form-control select2">
                      <option value="">---Semua---</option>
                      <?php
$rsproyek = $this->db->query("select * from pengguna where idpengguna !='" . $this->session->userdata('idpengguna') . "' order by nama");
if ($rsproyek->num_rows() > 0) {

    $selected = '';
    if ($this->session->userdata('jabatan') != 'Admin') {
        $selected = ' selected="selected" ';
    }

    echo '
            <option value="' . $this->session->userdata('idpengguna') . '" ' . $selected . '>Saya</option>
          ';

    foreach ($rsproyek->result() as $row) {

        echo '
              <option value="' . $row->idpengguna . '" >' . $row->nama . '</option>
            ';

    }

}
?>

                    </select>
                  </div>
                </div>


                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Nama Assignment</label>
                    <select name="assignment" id="assignment" class="form-control select2">
                      <option value="">---Semua---</option>
                      <?php
$rsproyek = $this->db->query("select * from pengguna where idpengguna !='" . $this->session->userdata('idpengguna') . "' order by nama");
if ($rsproyek->num_rows() > 0) {
    echo '
                <option value="' . $this->session->userdata('idpengguna') . '" >Saya</option>
              ';

    foreach ($rsproyek->result() as $row) {
        echo '
                <option value="' . $row->idpengguna . '" >' . $row->nama . '</option>
              ';

    }
}
?>

                    </select>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Status Tugas</label>
                    <select name="statustask" id="statustask" class="form-control select2">
                      <option value="">---Semua---</option>
                      <option value="Belum Selesai">Belum Selesai</option>
                      <option value="Sudah Selesai">Sudah Selesai</option>
                    </select>
                  </div>
                </div>



              </div>
            </div>


            <div class="col-md-12">
              <!-- datatable -->
              <div class="table-responsive">
                <table class="table" id="table">
                  <thead>
                    <tr>
                      <th style="width: 5%; text-align: center;">No</th>
                      <th style="text-align: center;">Judul Tugas</th>
                      <th style="text-align: center;">Tanggal Mulai/<br>Tanggal Selesai</th>
                      <th style="text-align: center;">PIC</th>
                      <th style="text-align: center;">Assignment</th>
                      <th style="text-align: center;">Status Tugas</th>
                      <th style="text-align: center; width: 15%;">Aksi</th>
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




<?php $this->load->view("template/footer")?>



<script type="text/javascript">

  var table;
  var idproyek = "";
  var idpic = "";
  var assignment = "";
  var statustask = "";

  $(document).ready(function() {

    idpic       = $('#idpic').val();
    assignment  = $('#assignment').val();

    $('.select2').select2();
    //defenisi datatable
    table = $("#table").DataTable({
        "select": true,
        "processing": true,
        "serverSide": true,
        "order": [],
         "ajax": {
            "url": "<?php echo site_url('Task/datatablesource') ?>",
            "type": "POST",
              "data": function ( d ) {
                  d.idproyek = idproyek;
                  d.idpic = idpic;
                  d.assignment = assignment;
                  d.statustask = statustask;
              }
        },
        "columnDefs": [
                        { "targets": [ 0 ], "orderable": false, "className": "dt-body-center" },
                        { "targets": [ 1 ], "className": "dt-body-left" },
                        { "targets": [ 2 ], "className": "dt-body-center" },
                        { "targets": [ 3 ], "className": "dt-body-center" },
                        { "targets": [ 4 ], "className": "dt-body-center" },
                        { "targets": [ 5 ], "className": "dt-body-center" },
                        { "targets": [ 6 ], "orderable": false, "className": "dt-body-center" },
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

  $('#idproyek').change(function(){
    idproyek = $('#idproyek').val();
    idpic = $('#idpic').val();
    assignment = $('#assignment').val();
    statustask = $('#statustask').val();

    $("#table").DataTable().draw();
  });


  $('#idpic').change(function(){
    idproyek = $('#idproyek').val();
    idpic = $('#idpic').val();
    assignment = $('#assignment').val();
    statustask = $('#statustask').val();

    $("#table").DataTable().draw();
  });

  $('#assignment').change(function(){
    idproyek = $('#idproyek').val();
    idpic = $('#idpic').val();
    assignment = $('#assignment').val();
    statustask = $('#statustask').val();

    $("#table").DataTable().draw();
  });

  $('#statustask').change(function(){
    idproyek = $('#idproyek').val();
    idpic = $('#idpic').val();
    assignment = $('#assignment').val();
    statustask = $('#statustask').val();

    $("#table").DataTable().draw();
  });



</script>

</body>
</html>

