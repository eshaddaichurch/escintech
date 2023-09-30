 

 <?php  
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");
?>


<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Hagah</h4>
    </div>  
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo(site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo(site_url('hagah')) ?>">Hagah</a></li>
        <li class="breadcrumb-item active" id="lblactive"></li>
      </ol>
      
    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12">



      <form action="<?php echo(site_url('hagah/simpanperbulan')) ?>" method="post" id="form">                      
        <div class="row">
          <div class="col-md-12">
            <div class="card" id="cardcontent">
              <div class="card-header">
                <div class="row">
                  <div class="col-4 col-md-2 form-group">
                    <label for="">Tahun</label>
                    <input type="number" class="form-control" min="2000" max="2100" name="tahun" id="tahun" value="<?php echo date('Y') ?>">
                  </div>
                  <div class="col-8 col-md-4 form-group">
                    <label for="">Bulan</label>
                    <select name="bulan" id="bulan" class="form-control">
                      <option value="">Pilih bulan...</option>
                      <option value="01">01 - Januari</option>
                      <option value="02">02 - Februari</option>
                      <option value="03">03 - Maret</option>
                      <option value="04">04 - April</option>
                      <option value="05">05 - Mei</option>
                      <option value="06">06 - Juni</option>
                      <option value="07">07 - Juli</option>
                      <option value="08">08 - Agustus</option>
                      <option value="09">09 - September</option>
                      <option value="10">10 - Oktober</option>
                      <option value="11">11 - November</option>
                      <option value="12">12 - Desember</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="card-body">
                  <div class="row">
                    
                    <input type="hidden" name="idhagah" id="idhagah">   
                    <div class="col-md-12">
                      <?php 
                        $pesan = $this->session->flashdata("pesan");
                        if (!empty($pesan)) {
                          echo $pesan;
                        }
                      ?>
                    </div>
                    <div class="col-12 pb-5" style="display: none;">
                      <div class="row">
                        <div class="col-12">
                          <h5>Auto Generate</h5>
                        </div>
                        <div class="col-12">
                          <div class="row">
                            <div class="col-md-3 form-group">
                              <label for="">Nama Kitab</label>
                              <select name="namakitabautogenerate1" id="namakitabautogenerate1" class="form-control select2">
                                  <option value="">Pilih nama kitab...</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                              <label for="">Mulai Pasal</label>
                              <input type="number" min="0" class="form-control" name="pasalautogenerate1" id="pasalautogenerate1" value="1">
                            </div>
                            <div class="col-md-1 text-center">
                              <h1 class="mt-3">S/D</h1>
                            </div>
                            <div class="col-md-3 form-group">
                              <label for="">Nama Kitab</label>
                              <select name="namakitabautogenerate2" id="namakitabautogenerate2" class="form-control select2">
                                  <option value="">Pilih nama kitab...</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                              <label for="">Sampai Pasal</label>
                              <input type="number" min="0" class="form-control" name="pasalautogenerate2" id="pasalautogenerate2" value="1">
                            </div>
                            <div class="col-md-1">
                              <button class="btn btn-sm btn-primary btn-block mt-4">GO</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="table-responsive">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th style="width:15%; text-align: center;" rowspan="2">Tanggal</th>
                              <th style="width:50%; text-align: center;" rowspan="2">Nama Kitab</th>
                              <th style="text-align: center;" colspan="2">Pasal</th>
                            </tr>
                            <tr>
                              <th style="text-align: center;">Mulai</th>
                              <th style="text-align: center;">SD</th>
                            </tr>
                          </thead>
                          <tbody id="tbodyTanggal">
                            <tr>
                              <td style="text-align: center;">01-09-2023</td>
                              <td style="text-align: center;">
                                <select name="namakitab" id="namakitab" class="form-control select2">
                                  <option value="">Pilih nama kitab...</option>
                                </select>
                              </td>
                              <td style="text-align: center;">
                                <input type="number" name="pasalmulai" id="pasalmulai" class="form-control" min="0" value="1">
                              </td>
                              <td style="text-align: center;">
                                <input type="number" name="pasalakhir" id="pasalakhir" class="form-control"
                                 min="0" value="1">
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>

                    

                  </div>



           

              </div> <!-- ./card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?php echo(site_url('hagah')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
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
  
  var idhagah = "<?php echo($idhagah) ?>";


  $(document).ready(function() {

    $('.select2').select2();

    //---------------------------------------------------------> JIKA EDIT DATA
    if ( idhagah != "" ) { 
          $.ajax({
              type        : 'POST', 
              url         : '<?php echo site_url("hagah/get_edit_data") ?>', 
              data        : {idhagah: idhagah}, 
              dataType    : 'json', 
              encode      : true
          })      
          .done(function(result) {
            console.log(result);

            $("#idhagah").val(result.dataHeader.idhagah);
            $("#tahun").val(result.dataHeader.tahun);
            $("#bulan").val(result.dataHeader.bulan).trigger('change');
            $("#tahun").prop('disabled', true);
            $("#bulan").prop('disabled', true);
            
            //tunggu 1 detik untuk isi data 
            setTimeout(function (){
              if (result.dataDetail.length>0) {
                for (var i = 1; i <= result.dataDetail.length; i++) {
                  var namakitab = result.dataDetail[i-1]['namakitab'];
                  var pasalmulai = result.dataDetail[i-1]['pasal1'];
                  var pasalakhir = result.dataDetail[i-1]['pasal2'];

                  $('#namakitab'+i).val(namakitab);
                  $('#pasalmulai'+i).val(pasalmulai);
                  $('#pasalakhir'+i).val(pasalakhir);
                }
              }
                        
            }, 1000); 

          }); 

          $("#lblactive").html("Edit");
    }else{
          $("#lblactive").html("Tambah");
    }     


    $("form").attr('autocomplete', 'off');

  }); //end (document).ready
  

  $('#bulan').change(function(e) {
    var tahun = $('#tahun').val();
    var bulan = $('#bulan').val();
    var tanggal = tahun+'-'+bulan+'-01';
    generateDate(tanggal);
  });

  $('#tahun').change(function(e) {
    var tahun = $('#tahun').val();
    var bulan = $('#bulan').val();
    var tanggal = tahun+'-'+bulan+'-01';
    generateDate(tanggal);
  });


  function generateDate(tanggal)
  {
    var date = new Date(tanggal);
    var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
    var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
    var tglAkhir = lastDay.getDate();
    var tglAwal = firstDay;    
    $('#tbodyTanggal').empty();

    $.ajax({
      url: '<?php echo site_url('Ajax/getNamaKitab') ?>',
      dataType: 'json',
    })
    .done(function(getAllKitabResult) {


      for (var i = 1; i <= tglAkhir; i++) {
        

        var addText = `     
                      <tr>
                        <td style="text-align: center;">
                        `+tgldmy(tglAwal)+`<input type="hidden" name="tglHagah[]" id="tglhagah`+i+`" value="`+tglymd(tglAwal)+`">
                        </td>
                        <td style="text-align: center;">
                          <select name="namakitab`+i+`" id="namakitab`+i+`" class="form-control select2">
                          </select>
                        </td>
                        <td style="text-align: center;">
                          <input type="number" name="pasalmulai`+i+`" id="pasalmulai`+i+`" class="form-control" min="0" value="1">
                        </td>
                        <td style="text-align: center;">
                          <input type="number" name="pasalakhir`+i+`" id="pasalakhir`+i+`" class="form-control"
                           min="0" value="1">
                        </td>
                      </tr>
                      `;     
          $('#tbodyTanggal').append(addText);
          addKitabOption('namakitab'+i, getAllKitabResult);
          tglAwal.setDate(tglAwal.getDate()+1); 
      }

      console.log("success");
      

    })
    .fail(function() {
      console.log("error getAllKitabResult");
    });
    
    
  }

  function addKitabOption(selectId, arrKitab, idSelected="")
  {
    $('#'+selectId).empty();
    addSelectOption(selectId, '', 'Pilih nama kitab...');    

    if (arrKitab.length>0) {
        var oOption = '';
        for (var i = 0; i < arrKitab.length; i++) {
          addSelectOption(selectId, arrKitab[i]['namakitab'], arrKitab[i]['namakitab']);
          if (idSelected!="" && idSelected==arrKitab[i]['namakitab']) {
            $('#'+selectId).val(idSelected).trigger('change');
          }    
        }
    }
  }

  $('#form').submit(function(e) {
    /* Act on the event */
    var tahun = $('#tahun').val();
    var bulan = $('#bulan').val();

    if (tahun=='') {
      swal("Tahun", "Tahun tidak boleh kosong!", "info")
        .then(function(){
          $('#tahun').focus();
        });
      e.preventDefault();
      return;
    }

    if (bulan=='') {
      swal("Bulan", "Bulan tidak boleh kosong!", "info")
        .then(function(){
          $('#bulan').focus();
        });
      e.preventDefault();
      return;
    }

    var tglHagah=document.getElementsByName('tglHagah[]');
    var noObj = 1;
    for(key=0; key < tglHagah.length; key++)  {
        var tanggal = tglHagah[key].value;
        var idObj = 'namakitab'+noObj;
        if ( document.getElementById(idObj).value=='' ) {
          swal("Nama Kitab", "Nama kitab tanggal "+tgldmy(tanggal)+" tidak boleh kosong!", "info");
          e.preventDefault();
          return;     
        }
        noObj++;
    }

  });

</script>

</body>
</html>
