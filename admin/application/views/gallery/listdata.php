<?php
$this->load->view("template/header");
$this->load->view("template/topmenu");
$this->load->view("template/sidemenu");
?>


<div class="row" id="toni-breadcrumb">
  <div class="col-6">
    <h4 class="text-dark mt-2">Gallery</h4>
  </div>
  <div class="col-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo (site_url()) ?>">Home</a></li>
      <li class="breadcrumb-item active" id="lblactive">Gallery</li>
    </ol>

  </div>
</div>

<div class="row" id="toni-content">
  <div class="col-md-12">
    <form action="<?php echo (site_url('bestseller/simpan')) ?>" method="post" id="form" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-12">
          <div class="card" id="cardcontent">
            <div class="card-header">
              <h5 class="card-title">Gallery</h5>
              <a href="<?php echo (site_url('gallery/tambah')) ?>" class="btn btn-sm btn-primary float-right"><i class="fa fa-plus-circle"></i> Tambah Data</a>
            </div>
            <div class="card-body">



              <div class="row">

                <!-- ***************************  Tab info 1*********************************************  -->
                <?php
                if ($rsgallery->num_rows() > 0) {
                  foreach ($rsgallery->result() as $row) {
                    $filegallery = base_url('uploads/galery/' . $row->filegallery);
                    $filegallery_text = $row->filegallery;
                    $nlentext = strlen($filegallery_text);

                    if ($nlentext > 45) {
                      $filegallery_text = substr($filegallery_text, 0, 40) . ' ... ' . substr($filegallery_text, $nlentext - 4, 4);
                    }

                    $checked = '';
                    if ($row->tampildifront == 'Ya') {
                      $checked = ' checked ';
                    }

                ?>



                    <div class="col-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-12 p-1 text-center" style="height: 200px;">
                              <img src="<?php echo $filegallery ?>" alt="" style="width: 80%; max-height: 180px;">
                            </div>
                            <div class="col-12 text-center">
                              <strong><?php echo $row->judulgambar ?></strong>
                            </div>
                            <div class="col-12 text-center" style="height: 40px; max-height: 40px;">
                              <a href="<?php echo base_url('uploads/galery/' . $row->filegallery) ?>" target="_blank">Lihat Gambar</a>
                            </div>
                            <div class="col-12 text-center mt-2">
                              <input type="checkbox" <?php echo $checked ?> class="chktampil" data-toggle="toggle" data-on="Tampil  Front" data-off="Tidak Tampil Di Front" data-onstyle="success" data-offstyle="default" data-id="<?php echo $row->idgallery ?>">
                            </div>
                            <div class="col-12 mt-3">
                              <a href="<?php echo site_url('gallery/delete/' . $this->encrypt->encode($row->idgallery)) ?>" id="hapus"><i class="fa fa-trash text-danger"></i> Hapus</a>
                            </div>
                          </div>



                        </div>
                      </div>
                    </div>

                <?php    }
                }
                ?>






              </div>





            </div> <!-- ./card-body -->

          </div> <!-- /.card -->
        </div> <!-- /.col -->
      </div>
    </form>
  </div>
</div> <!-- /.row -->
<!-- Main row -->


<?php $this->load->view("template/footer") ?>


<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

<script type="text/javascript">
  // console.log(fontAwesomeIcon);

  $(document).ready(function() {

    $('.select2').select2();


    //----------------------------------------------------------------- > validasi
    $("#form").bootstrapValidator({
      feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
        tab1icon: {
          validators: {
            notEmpty: {
              message: "gambar icon tidak boleh kosong"
            },
          }
        },
      }
    });
    //------------------------------------------------------------------------> END VALIDASI DAN SIMPAN


    $("form").attr('autocomplete', 'off');
    //$("#tanggal").mask("00-00-0000", {placeholder:"hh-bb-tttt"});
    //$("#jumlah").mask("000,000,000,000", {reverse: true});
  }); //end (document).ready




  $('.chktampil').change(function() {
    var idgallery = $(this).attr('data-id');

    if ($(this).prop('checked')) {
      var tampildifront = 'Ya';
    } else {
      var tampildifront = 'Tidak';
    }

    $.ajax({
        url: '<?php echo site_url('gallery/updatestatus') ?>',
        type: 'POST',
        dataType: 'json',
        data: {
          'idgallery': idgallery,
          'tampildifront': tampildifront
        },
      })
      .done(function(result) {
        console.log("success");
      })
      .fail(function() {
        console.log("error");
      });

  });


  $(document).on("click", "#hapus", function(e) {
    var link = $(this).attr("href");
    e.preventDefault();

    swal({
        title: "Hapus data ini?",
        text: "Jika anda pilih ya, data akan dihapus dari sistem!",
        icon: "warning",
        buttons: ["Batal!", "Ya!"],
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          document.location.href = link;
        }
      });

  });
</script>

</body>

</html>