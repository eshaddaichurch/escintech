<?php
$this->load->view("template/header");
$this->load->view("template/topmenu");
$this->load->view("template/sidemenu");
?>

<div class="row" id="toni-breadcrumb">
  <div class="col-6">
    <h4 class="text-dark mt-2">Absensi DC</h4>
  </div>
  <div class="col-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo (site_url()) ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo (site_url('absensidc')) ?>">List Absensi DC</a></li>
      <li class="breadcrumb-item active">Detail</li>
    </ol>

  </div>
</div>

<div class="row" id="toni-content">
  <div class="col-md-12">




    <form action="<?php echo (site_url('absensidc/simpan')) ?>" method="post" id="form">
      <div class="row">
        <div class="col-md-12">
          <div class="card" id="cardcontent">
            <div class="card-body">

              <div class="row">
                <input type="hidden" name="idabsen" id="idabsen">

                <div class="col-md-12">
                  <?php
                  $pesan = $this->session->flashdata("pesan");
                  if (!empty($pesan)) {
                    echo $pesan;
                  }
                  ?>
                </div>
                <div class="col-12">
                  <h3 class="text-gray">Data Absen Member Disciple Community</h3>
                  <hr>
                </div>

                <div class="col-md-4">
                  <div class="card">
                    <div class="card-body text-center">
                      <a href="<?php echo $foto ?>" target="_blank">
                        <img src="<?php echo $foto ?>" alt="" style="width: 90%;">
                      </a>
                    </div>
                  </div>
                </div>

                <div class="col-md-8">
                  <div class="card">
                    <div class="card-body">
                      <table class="table">
                        <tbody>
                          <tr>
                            <td style="width: 20%;">Nama DC</td>
                            <td style="width: 5%;">:</td>
                            <td style="width: 75%;"><?php echo $rowAbsensi->namadc ?></td>
                          </tr>
                          <tr>
                            <td style="width: 20%;">Nama DM</td>
                            <td style="width: 5%;">:</td>
                            <td style="width: 75%;"><?php echo $rowAbsensi->namadm ?></td>
                          </tr>
                          <tr>
                            <td style="width: 20%;">Tgl Absen</td>
                            <td style="width: 5%;">:</td>
                            <td style="width: 75%;"><?php echo $rowAbsensi->tglabsen ?></td>
                          </tr>
                          <tr>
                            <td style="width: 20%;">Keterangan</td>
                            <td style="width: 5%;">:</td>
                            <td style="width: 75%;"><?php echo $rowAbsensi->keterangan ?></td>
                          </tr>
                          <tr>
                            <td style="width: 20%;">Peserta</td>
                            <td style="width: 5%;">:</td>
                            <td style="width: 75%;">
                              <?php
                              $rsPeserta = $this->db->query("
                                  select * from v_dcabsen_detail where idabsen = $idabsen order by namalengkap
                                ");
                              if ($rsPeserta->num_rows() > 0) {
                                $i = 1;
                                foreach ($rsPeserta->result() as $row) {
                                  echo $i++ . '. ' . $row->namalengkap . '<br>';
                                }
                              }
                              ?>

                          </tr>
                        </tbody>
                      </table>


                    </div>
                  </div>
                </div>




              </div>




            </div> <!-- ./card-body -->

            <div class="card-footer">
              <a href="<?php echo (site_url('absensidc')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
            </div>
          </div> <!-- /.card -->
        </div> <!-- /.col -->
      </div>
    </form>





  </div>
</div> <!-- /.row -->
<!-- Main row -->



<?php $this->load->view("template/footer") ?>




<script type="text/javascript">
  var idabsen = "<?php echo $idabsen ?>";


  $(document).ready(function() {

    $('.select2').select2();
    //---------------------------------------------------------> JIKA EDIT DATA
    if (idabsen != "") {

      $.ajax({
          type: 'POST',
          url: '<?php echo site_url("dcmember/get_edit_data") ?>',
          data: {
            idabsen: idabsen
          },
          dataType: 'json',
          encode: true
        })
        .done(function(result) {
          console.log(result);
          console.log("test");

          $("#idjemaat").val(result.idjemaat).trigger('change');
          $("#idabsen").val(result.idabsen).trigger('change');
          $("#iddc").val(result.iddc).trigger('change');
          $("#statuskeanggotaan").val(result.statuskeanggotaan);
          $("#keterangan").val(result.keterangan);
          $("#statusaktif").val(result.statusaktif);

        });


      $("#lbljudul").html("Edit Data DC");
      $("#lblactive").html("Edit");

    } else {
      $("#lbljudul").html("Tambah Data DC");
      $("#lblactive").html("Tambah");
    }

    //----------------------------------------------------------------- > validasi
    $("#form").bootstrapValidator({
      feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
        namadc: {
          validators: {
            notEmpty: {
              message: "nama dc tidak boleh kosong"
            },
          }
        },
        kategoridc: {
          validators: {
            notEmpty: {
              message: "kategori dc tidak boleh kosong"
            },
          }
        },
      }
    });
    //------------------------------------------------------------------------> END VALIDASI DAN SIMPAN


    $("form").attr('autocomplete', 'off');
    $("#rtrw").mask("000/000", {
      placeholder: "000/000"
    });
  }); //end (document).ready
</script>

</body>

</html>