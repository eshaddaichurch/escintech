<?php  
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");

?>

  <div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Gallery Gereja <?php echo $rowcabang->namacabang ?></h4>
    </div>  
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo(site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo(site_url('cabanggereja')) ?>">Cabang Gereja</a></li>
        <li class="breadcrumb-item active">Gallery</li>
      </ol>
      
    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12">
      <div class="card" id="cardcontent">
        <div class="card-header">
          <div class="row">
            <div class="col-md-8">
              <h5 class="card-title">Gallery <?php echo $rowcabang->namacabang ?></h5>
            </div>
            <div class="col-md-4">
              
              <form action="<?php echo(site_url('cabanggereja/simpangallery')) ?>" method="post" id="form" enctype="multipart/form-data">                     
                <input type="hidden" name="idcabang" id="idcabang" value="<?php echo $idcabang ?>">
                <div class="form-group">
                    <span class="btn btn-primary btn-file btn-block float-right" style="width:50%;">
                      <span class="fileinput-new">Tambah Gallery</span>
                      <input type="file" name="filegallery" id="filegallery" accept="image/*">
                    </span>
                </div>
              </form>

            </div>
          </div>
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

            <!-- ***************************  Tab info 1*********************************************  -->
            <?php  
              if ($rsgallery->num_rows()>0) {
                foreach ($rsgallery->result() as $row) { 
                  $filegallery = base_url('uploads/cabanggereja/gallery/'.$row->filegallery);
                  $filegallery_text = $row->filegallery;  
              ?>
                 


                  <div class="col-3">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-12 p-1 text-center" style="height: 100px;">
                            <img src="<?php echo $filegallery ?>" alt="" style="width: 80%; max-height: 100px;">
                          </div>                                  
                          <div class="col-12 mt-4">
                            <a href="<?php echo site_url('cabanggereja/deletegallery/'.$this->encrypt->encode($row->idcabang).'/'.$this->encrypt->encode($row->idgallery)) ?>" id="hapus"><i class="fa fa-trash text-danger"></i> Hapus</a>
                          </div>
                        </div>



                      </div>
                    </div>
                  </div>

            <?php    }

              }else{ ?>
                <div class="col-12 text-center">
                  <p><i>Gallery Cabang Gereja belum ada.</i></p>
                </div>
            <?php
              }
            ?>

          </div>

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
            "url": "<?php echo site_url('cabanggereja/datatablesource')?>",
            "type": "POST"
        },
        "columnDefs": [
                        { "targets": [ 0 ], "orderable": false, "className": "dt-body-center" },
                        { "targets": [ 1 ], "orderable": false, "className": "dt-body-center" },
                        { "targets": [ 2 ], "className": "dt-body-left" },
                        { "targets": [ 3 ], "className": "dt-body-center" },
                        { "targets": [ 4 ], "className": "dt-body-center" },
                        { "targets": [ 5 ], "orderable": false, "className": "dt-body-center" },
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
  
  $('#filegallery').change(function(e) {
    $('#form').submit();
  });

</script>

</body>
</html>

