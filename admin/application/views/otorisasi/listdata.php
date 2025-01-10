<?php  
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");

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
  <div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Otorisasi</h4>
    </div>  
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo(site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item active">Otorisasi</li>
      </ol>
      
    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-12 mt-3 mb-3">
      <a href="<?php echo(site_url('otorisasi/tambahotorisasi')) ?>" class="btn btn-sm btn-primary float-right"><i class="fa fa-plus-circle"></i> Tambah Otorisasi</a>      
    </div>


    <div class="col-md-12">
      <?php 
        $pesan = $this->session->flashdata("pesan");
        if (!empty($pesan)) {
          echo $pesan;
        }
      ?>
    </div> 

    <?php  
      if ($rsOtorisasi->num_rows()>0) {
        foreach ($rsOtorisasi->result() as $row) {

          $jumlahMenu = $this->Otorisasi_model->getJumlahMenu($row->idotorisasi);
          $jumlahUser = $this->Otorisasi_model->getJumlahUser($row->idotorisasi);
          $hideButton = '';
          if ($row->idotorisasi=='0000') {
            $hideButton = ' style="display: none;"';
          }
          echo '
            <div class="col-md-3">
              <div class="card">
                <div class="card-header text-primary">
                  <h5><i class="fa fa-user-lock text-dark"></i> '.$row->namaotorisasi.' <a href="'.site_url('otorisasi/hapusotorisasi/'.$this->encrypt->encode($row->idotorisasi)).'" class="btn btn-sm float-right text-danger" id="hapus" '.$hideButton.'><i class="fa fa-trash"></i></a></h5>
                </div>
                <div class="card-body shadow-lg p-3">
                  <div class="row text-lg">
                    <div class="col-12 p-2">
                      <i class="fa fa-chevron-right text-dark"></i> '.$jumlahMenu.' Menu <a href="'.site_url('otorisasi/tambahmenu/'.$this->encrypt->encode($row->idotorisasi)).'" class="btn btn-sm float-right btn-success"><i class="fa fa-plus"></i></a>
                    </div>
                    <div class="col-12 p-2">
                      <i class="fa fa-chevron-right text-dark"></i> '.$jumlahUser.' User <a href="'.site_url('otorisasi/tambahuser/'.$this->encrypt->encode($row->idotorisasi)).'" class="btn btn-sm float-right btn-info"><i class="fa fa-plus"></i></a>
                    </div>
                  </div>

                  
                </div>
              </div>
            </div>
          ';
        }
      }
    ?>

    
  </div> <!-- /.row -->
  <!-- Main row -->




<?php $this->load->view("template/footer") ?>

<script type="text/javascript">

  var table;

  $(document).ready(function() {

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

