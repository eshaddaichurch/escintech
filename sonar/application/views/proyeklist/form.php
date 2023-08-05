<?php  
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");
?>

  <div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">List Modul Proyek</h4>
    </div>  
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo(site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo(site_url('Proyeklist')) ?>">List Modul Proyek</a></li>
        <li class="breadcrumb-item active" id="lblactive"></li>
      </ol>
      
    </div>
  </div>


  <div class="row" id="toni-content">
    <div class="col-md-12">
        <div class="row">
          <div class="col-md-12">
            <div class="card" id="cardcontent">
              
              <div class="card-body">

                  <div class="col-md-12">
                    <?php 
                      $pesan = $this->session->flashdata("pesan");
                      if (!empty($pesan)) {
                        echo $pesan;
                      }
                    ?>
                  </div> 

                  <h4><?php echo $rowproyek->namaproyek; ?></h4>
                  <small><?php echo $rowproyek->deskripsi ?></small>
                  <input type="hidden" name="idproyek" id="idproyek">
                  
                  <div class="form-group row required mt-3">
                    <span for="" class="col-md-2">Nama Client</span>
                    <span for="" class="col-md-10">: <?php echo $rowproyek->client; ?></span>
                    <span for="" class="col-md-2">Alamat Client</span>
                    <span for="" class="col-md-10">: <?php echo $rowproyek->alamatclient; ?></span>
                  </div>


                  <div class="col-md-12 mt-3">
                    <div class="card">
                      <div class="card-body">
                          <h3 class="text-muted text-center">Detail List Modul Proyek</h3>
                          <hr>

                          
                          <form action="<?php echo(site_url('Proyeklist/simpan')) ?>" method="post" id="form">                      
                            <div class="row">

                              
                              <div class="col-md-12">
                                <div class="form-group row">
                                  <label for="" class="col-md-2">Nama List Modul</label>
                                  <div class="col-md-8">
                                    <input type="text" name="namaproyeklist" id="namaproyeklist" class="form-control">
                                  </div>
                                  <div class="col-md-2">
                                    <button class="btn btn-primary" type="submit" id="tambahkan">Tambahkan</button>
                                  </div>
                                </div>
                              </div>

                            </div>
                          </form>

                            <hr>

                          <div class="table-responsive">
                            <table id="table" class="display" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 5%; text-align: center;">No</th>
                                        <th style="">idproyeklist</th>
                                        <th style="text-align: center;">Nama List Modul</th>
                                        <th style="width: 5%; text-align: center;">Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                          </div>

                      </div>
                    </div>
                    <input type="hidden" id="total">
                  </div>
                  

              </div> <!-- ./card-body -->

              <div class="card-footer">
                <button class="btn btn-info float-right" id="simpan"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?php echo(site_url('Proyeklist')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
              </div>
            </div> <!-- /.card -->
          </div> <!-- /.col -->
        </div>
    </div>
  </div> <!-- /.row -->
  <!-- Main row -->

      

<?php $this->load->view("template/footer") ?>




<script type="text/javascript">
  
  var idproyek = "<?php echo($idproyek) ?>";

  $(document).ready(function() {

    $('.select2').select2();
    

    table = $('#table').DataTable({ 
        "select": true,
            "processing": true, 
            "ordering": false,
            "bPaginate": false,      
            "searching": false,  
            "bInfo" : false, 
             "ajax"  : {
                      "url": "<?php echo site_url('Proyeklist/datatablesourcedetail')?>",
                      "dataType": "json",
                      "type": "POST",
                      "data": {"idproyek": '<?php echo($idproyek) ?>'}
                  },
            "columnDefs": [
            { "targets": [ 0 ], "orderable": false, "className": 'dt-body-center'},
            { "targets": [ 1 ], "className": 'dt-body-center', "visible": false },
            ],
     
        });



    //---------------------------------------------------------> JIKA EDIT DATA
    if ( idproyek != "" ) { 
          $.ajax({
              type        : 'POST', 
              url         : '<?php echo site_url("Proyeklist/get_edit_data") ?>', 
              data        : {idproyek: idproyek}, 
              dataType    : 'json', 
              encode      : true
          })      
          .done(function(result) {
            $('#idproyek').val(result.idproyek);
          }); 
          
          $('#lbljudul').html('Tambah List Modul Proyek');
          $('#lblactive').html('Tambah');
    }     

    //----------------------------------------------------------------- > validasi
    $('#form').bootstrapValidator({
      feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
        namaproyeklist: {
          validators:{
            notEmpty: {
                message: "nama list modul tidak boleh kosong"
            },
          }
        },
      }
    })
    .on('success.form.bv', function(e) {
      e.preventDefault();
      $('#tambahkan').attr('disabled', false);
      
      var idproyek           = $('#idproyek').val();
      var namaproyeklist           = $('#namaproyeklist').val();
        

        if (namaproyeklist=="") {
          alert("nama proyek list tidak boleh kosong!!");
          return false;
        }
      
        nomorrow = table.page.info().recordsTotal + 1;
        table.row.add( [
                            nomorrow,
                            '',
                            $("#namaproyeklist").val(),
                            '<span class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></span>'
                        ] ).draw( false );

        $("#namaproyeklist").val("");
    });
  //------------------------------------------------------------------------> END VALIDASI DAN SIMPAN

    $('#table tbody').on( 'click', 'span', function () {
        table
            .row( $(this).parents('tr') )
            .remove()
            .draw();
    });


    $("form").attr('autocomplete', 'off');
    // $('#tglterima').mask('00-00-0000', {placeholder:"hh-bb-tttt"});
    // $('#hargabelisatuan').mask('000,000,000,000', {reverse: true, placeholder:"000,000,000,000"});
  }); //end (document).ready
  

  
  $('#simpan').click(function(){
    var idproyek       = $("#idproyek").val();

      if (idproyek=='') {
        alert("idproyek tidak boleh kosong!!");
        return; 
      }

    if ( ! table.data().count() ) {
          alert("Detail Proyek belum ada!!");
          return;
      }

      var isidatatable = table.data().toArray();

      var formData = {
              "idproyek"       : idproyek,
              "isidatatable"    : isidatatable
          };

      //console.log(isidatatable);

      console.log(formData);
      $.ajax({
                type        : 'POST', 
                url         : '<?php echo site_url("Proyeklist/simpan") ?>', 
                data        : formData, 
                dataType    : 'json', 
                encode      : true
            })
            .done(function(result){
                // console.log(result);
                if (result.success) {
                    alert("Berhasil simpan data!");
                    window.location.href = "<?php echo(site_url('Proyeklist')) ?>";
                    
                }else{
                  // console.log(result.msg);
                  alert("Gagal simpan data!");
                }
            })
            .fail(function(){
                alert("Gagal script simpan data!");
            });

  })

</script>


</body>
</html>
