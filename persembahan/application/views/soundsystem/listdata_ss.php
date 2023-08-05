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
          <h1 class="card-title float-right">Pers. Soundsystem 14 Mei 2023</h1>
         
         
          
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

            <section class="content">
<div class="container-fluid">

<div class="row">
<div class="col-lg-3 col-6">

<div class="small-box bg-info">
<div class="inner">
<h3>PERSEMBAHAN</h3>
<p>PERPULUHAN</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="<?php echo(site_url('perpuluhan/index')) ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-success">
<div class="inner">
<H>PERSEMBAHAN<sup style="font-size: 20px"></sup></H>
<p>SOUND SYSTEM</p>
</div>
<div class="icon">
<i class="ion ion-stats-bars"></i>
</div>
<a href="<?php echo(site_url('Soundsystem/index')) ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-warning">
<div class="inner">
<H3>PERSEMBAHAN</H3>
<p>PEMBANGUNAN</p>
</div>
<div class="icon">
<i class="ion ion-person-add"></i>
</div>
<a href="<?php echo(site_url('perpuluhan1/index')) ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-danger">
<div class="inner">
<h3>PERSEMBAHAN</h3>
<p>SOSIAL</p>
</div>
<div class="icon">
<i class="ion ion-pie-graph"></i>
</div>
<a href="<?php echo(site_url('perpuluhan2/index')) ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>  
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
            "url": "<?php echo site_url('soundsystem/datatablesource')?>",
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

  
  $(document).on("click", "#hapus", function(e) {
    var link = $(this).attr("href");
    e.preventDefault();

    bootbox.confirm("Anda yakin ingin menghapus data ini ?", function(result) {
      if (result) {
        document.location.href = link;
      }
    });
  });  

  

  
  $(document).on('click', '#tampilinfojemaat', function(event) {
    event.preventDefault();
    $('#modalinfojemaat').modal({backdrop: 'static', keyboard: false});
    $('#modalinfojemaat').modal('show');

    kosongkanModalInfoJemaat();
    var idjemaat = $(this).attr("data-idjemaat");

    $.ajax({
      url: '<?php echo site_url('jemaat/get_info_detail') ?>',
      type: 'GET',
      dataType: 'json',
      data: {'idjemaat': idjemaat},
    })
    .done(function(get_info_detailResult) {
      console.log(get_info_detailResult);

      var jemaat = get_info_detailResult.rsJemaat;

      if (!get_info_detailResult.success) {
        swal("Informasi", get_info_detailResult.msg, "info");
        return;
      }

      $('#tdnoaj').html(jemaat['noaj']);

      $('#tdkewarganegaraan').html(jemaat['kewarganegaraan']);

      $('#tdnamalengkap').html(jemaat['namalengkap']);
      $('#tdnamapanggilan').html(jemaat['namapanggilan']);
      $('#tdstatusnikah').html(jemaat['statuspernikahan']);
      $('#tdjeniskelamin').html(jemaat['jeniskelamin']);
      $('#tdtempatlahir').html(jemaat['tempatlahir']);
      $('#tdgoldarah').html(jemaat['golongandarah']);
      $('#tdnotelp').html(jemaat['notelp']);
      $('#tdnohp').html(jemaat['nohp']);
      $('#tdemail').html(jemaat['email']);
      $('#tdfacebook').html(jemaat['facebook']);
      $('#tdinstagram').html(jemaat['instagram']);
      $('#tdalamatrumah').html(jemaat['alamatrumah']);
      $('#tdrtrw').html(jemaat['rtrw']);
      $('#tdkelurahan').html(jemaat['kelurahan']);
      $('#tdkecamatan').html(jemaat['kecamatan']);

      $('#tdkabupatenkota').html(jemaat['kotakabupaten']);

      $('#tdpropinsi').html(jemaat['propinsi']);
      $('#tdkodepos').html(jemaat['kodepos']);
      $('#tdstatusjemaat').html(jemaat['statusjemaat']);
      $('#tdnamadc').html(jemaat['namadc']);


      $('#tddarurattelepon').html(jemaat['notelpdarurat']);
      $('#tddarurathubungan').html(jemaat['hubungan']);
      $('#tddaruratnama').html(jemaat['namadarurat']);

      $('#tdpendidikanterakhir').html(jemaat['pendidikanterakhir']);
      $('#tdnamasekolah').html(jemaat['namasekolah']);
      $('#tdpekerjaan').html(jemaat['pekerjaan']);
      $('#tdnamaperusahaan').html(jemaat['namaperusahaan']);
      $('#tdsektorindustri').html(jemaat['sektorindustri']);
      $('#tdalamatkantor').html(jemaat['alamatkantor']);
      $('#tdnotelpkantor').html(jemaat['notelpkantor']);

      $('#btnubahkeluarga').attr('data-idjemaat', get_info_detailResult ['idencrypt']);

      $('.tdnamajemaat').html(jemaat['namalengkap']);
      $('.tdtempatlahir').html(jemaat['tempatlahir']+"/ "+tgldmy(jemaat['tanggallahir']));
      $('.tdjeniskelamin').html(jemaat['jeniskelamin']);
      $('.tdnoaj').html(jemaat['noaj']);
      $('.tdnik').html(jemaat['nik']);
      $('.tdnohp').html(jemaat['nohp']);


      var arrKepala = get_info_detailResult.arrKepalaKeluarga;
      $('#divKepalaKeluarga').empty();
      for (var i = 0; i < arrKepala.length; i++) {
          var addText = `<span><i class="fas fa-chevron-right"></i> `+arrKepala[i]['namalengkap']+`</span>`;
          $('#divKepalaKeluarga').append(addText);
      }

      var arrIstriAnak = get_info_detailResult.arrIstriAnak;
      $('#divIstriAnak').empty();
      for (var i = 0; i < arrIstriAnak.length; i++) {
          var addText = `<div class="col-12">
                          <span><i class="fas fa-chevron-right"></i> <span class="badge badge-secondary">`+arrIstriAnak[i]['namahubungan']+`</span> &nbsp;&nbsp;&nbsp;`+arrIstriAnak[i]['namalengkap']+`</span>
                        </div>`;
          $('#divIstriAnak').append(addText);
      }

      var arrLainnya = get_info_detailResult.arrLainnya;
      $('#divLainnya').empty();
      for (var i = 0; i < arrLainnya.length; i++) {
          var addText = `<div class="col-12">
                          <span><i class="fas fa-chevron-right"></i> <span class="badge badge-secondary">`+arrLainnya[i]['namahubungan']+`</span> &nbsp;&nbsp;&nbsp;`+arrLainnya[i]['namalengkap']+`</span>
                        </div>`;
          $('#divLainnya').append(addText);
      }

      var rskelas = get_info_detailResult.rskelas;
      $('#tbodyinfokelas').empty();
      for (var i = 0; i < rskelas.length; i++) {
        rskelas[i]
        if (rskelas[i]['statuslulus']=='1') {
            var addText = `<tr>
                        <td>`+rskelas[i]['namakelas']+`</td>
                        <td><i class="fa fa-check text-success"></i></td>
                        <td>`+rskelas[i]['tglsertifikat']+`</td>
                        <td><a href="<?php echo site_url('registrasikelas/cetaksertifikat/') ?>`+rskelas[i]['idregistrasikelas']+`" class="btn btn-primary btn-sm" target="_blank"> <i class="fa fa-pring"></i> Lihat Sertifikat</a></td>
                      </tr>
        `;
        }else{
            var addText = `<tr>
                        <td>`+rskelas[i]['namakelas']+`</td>
                        <td><i class="fas fa-times text-danger"></i></td>
                        <td>-</td>
                        <td></td>
                      </tr>
        `;
        }
        
        $('#tbodyinfokelas').append(addText);
      }
    })
    .fail(function() {


      console.log("error get get_info_detail");
    });
    
  });

  function kosongkanModalInfoJemaat(argument) {
      $('#tdnoaj').html('');
      $('#tdkewarganegaraan').html('');
      $('#tdnamalengkap').html('');
      $('#tdnamapanggilan').html('');
      $('#tdstatusnikah').html('');
      $('#tdjeniskelamin').html('');
      $('#tdtempatlahir').html('');
      $('#tdgoldarah').html('');
      $('#tdnotelp').html('');
      $('#tdnohp').html('');
      $('#tdemail').html('');
      $('#tdfacebook').html('');
      $('#tdinstagram').html('');
      $('#tdalamatrumah').html('');
      $('#tdrtrw').html('');
      $('#tdkelurahan').html('');
      $('#tdkecamatan').html('');
      $('#tdkabupatenkota').html('');
      $('#tdpropinsi').html('');
      $('#tdkodepos').html('');
      $('#tdstatusjemaat').html('');
      $('#tdnamadc').html('');
      $('#tddarurattelepon').html('');
      $('#tddarurathubungan').html('');
      $('#tddaruratnama').html('');
      $('#tdpendidikanterakhir').html('');
      $('#tdnamasekolah').html('');
      $('#tdpekerjaan').html('');
      $('#tdnamaperusahaan').html('');
      $('#tdsektorindustri').html('');
      $('#tdalamatkantor').html('');
      $('#tdnotelpkantor').html('');
      $('#btnubahkeluarga').attr('data-idjemaat','');
      $('.tdnamajemaat').html('');
      $('.tdtempatlahir').html('');
      $('.tdjeniskelamin').html('');
      $('.tdnoaj').html('');
      $('.tdnik').html('');
      $('.tdnohp').html('');
      $('#divKepalaKeluarga').empty();
      $('#divIstriAnak').empty();
      $('#divLainnya').empty();
  }

  $(document).on("click", "#btnubahkeluarga", function(e) {
    var link = $(this).attr("href");
    var idjemaat = $(this).attr("data-idjemaat");
    e.preventDefault();
    if (idjemaat=="") {
      return;
    }

    link += idjemaat;
    document.location.href = link;

  });  
</script>

</body>
</html>

