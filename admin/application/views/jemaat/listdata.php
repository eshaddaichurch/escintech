<?php
$this->load->view("template/header");
$this->load->view("template/topmenu");
$this->load->view("template/sidemenu");

?>
<style>
  .nav-tabs .nav-link.active {
    font-weight: bold;
    background-color: transparent;
    border-bottom: 3px solid #dd0000;
    border-right: none;
    border-left: none;
    border-top: none;
  }
</style>
<div class="row" id="toni-breadcrumb">
  <div class="col-6">
    <h4 class="text-dark mt-2">Jemaat</h4>
  </div>
  <div class="col-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo (site_url()) ?>">Home</a></li>
      <li class="breadcrumb-item active">Jemaat</li>
    </ol>

  </div>
</div>

<div class="row" id="toni-content">
  <div class="col-md-12">
    <div class="card" id="cardcontent">
      <div class="card-header">
        <h5 class="card-title">List Data Jemaat</h5>
        <a href="<?php echo (site_url('jemaat/tambah')) ?>" class="btn btn-sm btn-primary float-right hanya-admin"><i class="fa fa-plus-circle"></i> Tambah Data</a>
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
                  <tr class="bg-primary" style="">
                    <th style="width: 5%; text-align: center;">No</th>
                    <th style="text-align: center;">No AJ<br>Kode Uniq</th>
                    <th style="text-align: center;">Nama / NIK</th>
                    <th style="text-align: center;">Tempat/ <br>Tgl Lahir</th>
                    <th style="text-align: center;">JK</th>
                    <th style="text-align: center;">Status<br>Jemaat</th>
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




<?php $this->load->view("template/footer") ?>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalinfojemaat">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Info Detail Jemaat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <div class="row">
          <div class="col-md-12 text-center ">
            <nav class="nav-justified ">
              <div class="nav nav-tabs " id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="pop1-tab" data-toggle="tab" href="#pop1" role="tab" aria-controls="pop1" aria-selected="true">Data Jemaat</a>
                <a class="nav-item nav-link" id="pop4-tab" data-toggle="tab" href="#pop4" role="tab" aria-controls="pop4" aria-selected="false">Keluarga</a>
                <a class="nav-item nav-link" id="pop5-tab" data-toggle="tab" href="#pop5" role="tab" aria-controls="pop5" aria-selected="false">Kelas</a>
                <a class="nav-item nav-link" id="pop6-tab" data-toggle="tab" href="#pop6" role="tab" aria-controls="pop6" aria-selected="false">Baptis</a>

              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="pop1" role="tabpanel" aria-labelledby="pop1-tab">
                <div class="pt-3">
                  <h5 class="text-gray">Data Pribadi</h5>
                </div>


                <table class="table">
                  <tbody>
                    <tr class="text-left">
                      <td style="width: 25%;">Nama Lengkap</td>
                      <td style="width: 5%;">:</td>
                      <td id="tdnamalengkap"></td>
                    </tr>
                    <tr class="text-left">
                      <td>Nama Panggilan</td>
                      <td>:</td>
                      <td id="tdnamapanggilan"></td>
                    </tr>
                    <tr class="text-left">
                      <td>No AJ</td>
                      <td>:</td>
                      <td id="tdnoaj"></td>
                    </tr>
                    <tr class="text-left">
                      <td>Kewarganegaraan</td>
                      <td>:</td>
                      <td id="tdkewarganegaraan"></td>
                    </tr>

                    <tr class="text-left">
                      <td>Tempat / Tgl. Lahir</td>
                      <td>:</td>
                      <td id="tdtempatlahir"></td>
                    </tr>
                    <tr class="text-left">
                      <td>Jenis Kelamin</td>
                      <td>:</td>
                      <td id="tdjeniskelamin"></td>
                    </tr>
                    <tr class="text-left">
                      <td>Status Pernikahan</td>
                      <td>:</td>
                      <td id="tdstatusnikah"></td>
                    </tr>
                    <tr class="text-left">
                      <td>Golongan Darah</td>
                      <td>:</td>
                      <td id="tdgoldarah"></td>
                    </tr>
                    <tr class="text-left">
                      <td>No. Telp</td>
                      <td>:</td>
                      <td id="tdnotelp"></td>
                    </tr>
                    <tr class="text-left">
                      <td>No. HP</td>
                      <td>:</td>
                      <td id="tdnohp"></td>
                    </tr>
                    <tr class="text-left">
                      <td>Email</td>
                      <td>:</td>
                      <td id="tdemail"></td>
                    </tr>
                    <tr class="text-left">
                      <td>Facebook</td>
                      <td>:</td>
                      <td id="tdfacebook"></td>
                    </tr>
                    <tr class="text-left">
                      <td>Instagram</td>
                      <td>:</td>
                      <td id="tdinstagram"></td>
                    </tr>
                    <tr class="text-left">
                      <td>Alamat Rumah</td>
                      <td>:</td>
                      <td id="tdalamatrumah"></td>
                    </tr>
                    <tr class="text-left">
                      <td>RT/RW</td>
                      <td>:</td>
                      <td id="tdrtrw"></td>
                    </tr>
                    <tr class="text-left">
                      <td>Kelurahan</td>
                      <td>:</td>
                      <td id="tdkelurahan"></td>
                    </tr>
                    <tr class="text-left">
                      <td>Kecamatan</td>
                      <td>:</td>
                      <td id="tdkecamatan"></td>
                    </tr>
                    <tr class="text-left">
                      <td>Kabupaten/Kota</td>
                      <td>:</td>
                      <td id="tdkabupatenkota"></td>
                    </tr>
                    <tr class="text-left">
                      <td>Propinsi</td>
                      <td>:</td>
                      <td id="tdpropinsi"></td>
                    </tr>
                    <tr class="text-left">
                      <td>Kodepos</td>
                      <td>:</td>
                      <td id="tdkodepos"></td>
                    </tr>
                    <tr class="text-left">
                      <td>Status Jemaat</td>
                      <td>:</td>
                      <td id="tdstatusjemaat"></td>
                    </tr>
                    <tr class="text-left">
                      <td>Nama DC</td>
                      <td>:</td>
                      <td id="tdnamadc"></td>
                    </tr>

                  </tbody>
                </table>

                <div class="pt-3">
                  <h5 class="text-gray">Kontak Darurat</h5>
                </div>

                <table class="table">
                  <tbody>
                    <tr class="text-left">
                      <td style="width: 25%;">Nama</td>
                      <td style="width: 5%;">:</td>
                      <td id="tddaruratnama"></td>
                    </tr>
                    <tr class="text-left">
                      <td>Hubungan</td>
                      <td>:</td>
                      <td id="tddarurathubungan"></td>
                    </tr>
                    <tr class="text-left">
                      <td>Telepon</td>
                      <td>:</td>
                      <td id="tddarurattelepon"></td>
                    </tr>
                  </tbody>
                </table>


                <div class="pt-3">
                  <h5 class="text-gray">Pendidikan Dan Pekerjaan</h5>
                  <table class="table">
                    <tbody>
                      <tr class="text-left">
                        <td style="width: 25%;">Pendidikan Terakhir</td>
                        <td style="width: 5%;">:</td>
                        <td id="tdpendidikanterakhir"></td>
                      </tr>
                      <tr class="text-left">
                        <td>Nama Sekolah</td>
                        <td>:</td>
                        <td id="tdnamasekolah"></td>
                      </tr>
                      <tr class="text-left">
                        <td>Pekerjaan</td>
                        <td>:</td>
                        <td id="tdpekerjaan"></td>
                      </tr>
                      <tr class="text-left">
                        <td>Nama Perusahaan</td>
                        <td>:</td>
                        <td id="tdnamaperusahaan"></td>
                      </tr>
                      <tr class="text-left">
                        <td>Sektor Industri</td>
                        <td>:</td>
                        <td id="tdsektorindustri"></td>
                      </tr>
                      <tr class="text-left">
                        <td>Alamat Kantor</td>
                        <td>:</td>
                        <td id="tdalamatkantor"></td>
                      </tr>
                      <tr class="text-left">
                        <td>No. Telp Kantor</td>
                        <td>:</td>
                        <td id="tdnotelpkantor"></td>
                      </tr>
                    </tbody>
                  </table>
                </div>

              </div>



              <div class="tab-pane fade" id="pop4" role="tabpanel" aria-labelledby="pop4-tab">
                <div class="pt-3"></div>
                <div class="row">
                  <div class="col-12 text-left mt-2">
                    <h5>DATA JEMAAT</h5>
                  </div>

                  <div class="col-12 mb-3">
                    <div class="row">
                      <div class="col-6 text-left">
                        <table class="table">
                          <thead>
                            <tr>
                              <td>Nama Jemaat</td>
                              <td>:</td>
                              <td class="tdnamajemaat"></td>
                            </tr>
                            <tr>
                              <td>Tempat/ Tgl Lahir</td>
                              <td>:</td>
                              <td class="tdtempatlahir"></td>
                            </tr>
                            <tr>
                              <td>Jenis Kelamin</td>
                              <td>:</td>
                              <td class="tdjeniskelamin"></td>
                            </tr>
                          </thead>
                        </table>
                      </div>
                      <div class="col-6 text-left">
                        <table class="table">
                          <thead>
                            <tr>
                              <td>No AJ</td>
                              <td>:</td>
                              <td class="tdnoaj"></td>
                            </tr>
                            <tr>
                              <td>NIK</td>
                              <td>:</td>
                              <td class="tdnik"></td>
                            </tr>
                            <tr>
                              <td>No HP</td>
                              <td>:</td>
                              <td class="tdnohp"></td>
                            </tr>
                          </thead>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="col-12">
                    <hr>
                  </div>

                  <div class="col-4">
                    <div class="row">
                      <div class="col-12">
                        <h5 class="text-left">Kepala Keluarga</h5>
                      </div>
                      <div class="col-12 text-left" id="divKepalaKeluarga">

                      </div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="row">
                      <div class="col-12">
                        <h5 class="text-left">Istri / Anak</h5>
                        <div class="col-12 text-left">
                          <div class="row" id="divIstriAnak">

                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="row">
                      <div class="col-12">
                        <h5 class="text-left">Lainnya</h5>
                        <div class="col-12 text-left">
                          <div class="row" id="divLainnya">

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 mt-5">
                    <a href="<?php echo site_url('jemaat/ubahkeluarga/') ?>" class="btn btn-primary float-left hanya-admin" id="btnubahkeluarga" data-idjemaat=""><i class="fa fa-edit"></i> Ubah Data Keluarga</a>
                  </div>
                </div>

              </div>

              <div class="tab-pane fade" id="pop5" role="tabpanel" aria-labelledby="pop5-tab">
                <div class="pt-3"></div>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Nama Kelas</th>
                      <th>Status</th>
                      <th>Tgl Kelulusan</th>
                      <th>#</th>
                    </tr>
                  </thead>
                  <tbody id="tbodyinfokelas">

                  </tbody>
                </table>

              </div>

              <div class="tab-pane fade" id="pop6" role="tabpanel" aria-labelledby="pop6-tab">
                <div class="pt-3"></div>
                <table class="table">
                  <tbody>
                    <tr class="text-left">
                      <td style="width: 25%;">Nomor/ Tanggal Akta</td>
                      <td style="width: 5%;">:</td>
                      <td id="tdbaptisantanggalakta"></td>
                    </tr>
                    <tr class="text-left">
                      <td style="width: 25%;">Tanggal Baptis</td>
                      <td style="width: 5%;">:</td>
                      <td id="tdbaptisantanggalbaptis"></td>
                    </tr>
                    <tr class="text-left">
                      <td style="width: 25%;">Nama Gereja</td>
                      <td style="width: 5%;">:</td>
                      <td id="tdbaptisannamagereja"></td>
                    </tr>
                    <tr class="text-left">
                      <td style="width: 25%;">Nama Gembala</td>
                      <td style="width: 5%;">:</td>
                      <td id="tdbaptisannamagembala"></td>
                    </tr>
                    <tr class="text-left" id="trFileAkta">
                      <td style="width: 25%;">File Akta Baptis</td>
                      <td style="width: 5%;">:</td>
                      <td id=""><a href="" target="_blank" id="linkFileAktaBaptis"><i class="fas fa-file-alt mr-2"></i>File Akta Baptis</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

            </div>
          </div>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
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
        "url": "<?php echo site_url('jemaat/datatablesource') ?>",
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
          "className": "dt-body-center"
        },
        {
          "targets": [3],
          "className": "dt-body-center"
        },
        {
          "targets": [4],
          "className": "dt-body-center"
        },
        {
          "targets": [5],
          "className": "dt-body-center"
        },
        {
          "targets": [6],
          "orderable": false,
          "className": "dt-body-center",
          "visible": (idotorisasi == '0000') ? true : false
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




  $(document).on('click', '#tampilinfojemaat', function(event) {
    event.preventDefault();
    $('#modalinfojemaat').modal({
      backdrop: 'static',
      keyboard: false
    });
    $('#modalinfojemaat').modal('show');

    kosongkanModalInfoJemaat();
    var idjemaat = $(this).attr("data-idjemaat");

    $.ajax({
        url: '<?php echo site_url('jemaat/get_info_detail') ?>',
        type: 'GET',
        dataType: 'json',
        data: {
          'idjemaat': idjemaat
        },
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

        $('#btnubahkeluarga').attr('data-idjemaat', get_info_detailResult['idencrypt']);

        $('.tdnamajemaat').html(jemaat['namalengkap']);
        $('.tdtempatlahir').html(jemaat['tempatlahir'] + "/ " + tgldmy(jemaat['tanggallahir']));
        $('.tdjeniskelamin').html(jemaat['jeniskelamin']);
        $('.tdnoaj').html(jemaat['noaj']);
        $('.tdnik').html(jemaat['nik']);
        $('.tdnohp').html(jemaat['nohp']);


        var arrBaptisan = get_info_detailResult.arrBaptisan;

        if (arrBaptisan.length > 0) {
          $('#tdbaptisantanggalakta').html(arrBaptisan[0]['noakta'] + " / " + arrBaptisan[0]['tglakta']);
          $('#tdbaptisantanggalbaptis').html(arrBaptisan[0]['tglbaptis']);
          $('#tdbaptisannamagereja').html(arrBaptisan[0]['namagereja']);
          $('#tdbaptisannamagembala').html(arrBaptisan[0]['namagembala']);

          if (arrBaptisan[0]['tempatbaptis'] == 'Elshaddai') {
            $('#trFileAkta').hide();
          } else {
            $('#trFileAkta').show();
            $('#linkFileAktaBaptis').attr("href", arrBaptisan[0]['fileaktalokasi']);
          }
        } else {
          $('#tdbaptisantanggalakta').html('');
          $('#tdbaptisantanggalbaptis').html('');
          $('#tdbaptisannamagereja').html('');
          $('#tdbaptisannamagembala').html('');
          $('#trFileAkta').hide();

        }


        var arrKepala = get_info_detailResult.arrKepalaKeluarga;
        $('#divKepalaKeluarga').empty();
        for (var i = 0; i < arrKepala.length; i++) {
          var addText = `<span><i class="fas fa-chevron-right"></i> ` + arrKepala[i]['namalengkap'] + `</span>`;
          $('#divKepalaKeluarga').append(addText);
        }

        var arrIstriAnak = get_info_detailResult.arrIstriAnak;
        $('#divIstriAnak').empty();
        for (var i = 0; i < arrIstriAnak.length; i++) {
          var addText = `<div class="col-12">
                          <span><i class="fas fa-chevron-right"></i> <span class="badge badge-secondary">` + arrIstriAnak[i]['namahubungan'] + `</span> &nbsp;&nbsp;&nbsp;` + arrIstriAnak[i]['namalengkap'] + `</span>
                        </div>`;
          $('#divIstriAnak').append(addText);
        }

        var arrLainnya = get_info_detailResult.arrLainnya;
        $('#divLainnya').empty();
        for (var i = 0; i < arrLainnya.length; i++) {
          var addText = `<div class="col-12">
                          <span><i class="fas fa-chevron-right"></i> <span class="badge badge-secondary">` + arrLainnya[i]['namahubungan'] + `</span> &nbsp;&nbsp;&nbsp;` + arrLainnya[i]['namalengkap'] + `</span>
                        </div>`;
          $('#divLainnya').append(addText);
        }

        var rskelas = get_info_detailResult.rskelas;
        $('#tbodyinfokelas').empty();
        for (var i = 0; i < rskelas.length; i++) {
          rskelas[i]
          if (rskelas[i]['statuslulus'] == '1') {
            var addText = `<tr>
                        <td>` + rskelas[i]['namakelas'] + `</td>
                        <td><i class="fa fa-check text-success"></i></td>
                        <td>` + rskelas[i]['tglsertifikat'] + `</td>
                        <td><a href="<?php echo site_url('registrasikelas/cetaksertifikat/') ?>` + rskelas[i]['idregistrasikelas'] + `" class="btn btn-primary btn-sm" target="_blank"> <i class="fa fa-pring"></i> Lihat Sertifikat</a></td>
                      </tr>
        `;
          } else {
            var addText = `<tr>
                        <td>` + rskelas[i]['namakelas'] + `</td>
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
    $('#btnubahkeluarga').attr('data-idjemaat', '');
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
    if (idjemaat == "") {
      return;
    }

    link += idjemaat;
    document.location.href = link;

  });
</script>

</body>

</html>