<?php
$this->load->view("template/header");
$this->load->view("template/topmenu");
$this->load->view("template/sidemenu");
?>

<style>
  .komentar-nama {
    font-weight: bold;
    font-size: 12px;
    /*color: #514E4E;*/
  }
  .komentar-tanggal {
    font-size: 10px;
    /*color: #514E4E;*/
  }
  .komentar-isi {
    font-size: 12px;
    padding-top: 10px;
    padding-bottom: : 10px;
  }
  .bg-sorot {
    background-color: #E9E9E9;
  }
</style>
<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Tugas</h4>
    </div>
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo (site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo (site_url('task')) ?>">Tugas</a></li>
        <li class="breadcrumb-item active" id="lblactive"></li>
      </ol>

    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12">
      <form action="<?php echo (site_url('task/update')) ?>" method="post" id="form" enctype="multipart/form-data">
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

                  <input type="hidden" name="idtask" id="idtask" value="<?php echo ($rowtask->idtask) ?>">

                  <input type="hidden" name="statustask_old" value="<?php echo $rowtask->statustask ?>">
                  <input type="hidden" name="assignment_old" value="<?php echo $rowtask->assignment ?>">
                  <input type="hidden" name="namaassignment_old" value="<?php echo $rowtask->namaassignment ?>">
                  <input type="hidden" name="estimasilamapengerjaan_old" value="<?php echo $rowtask->estimasilamapengerjaan ?>">

                  <input type="hidden" name="idpic_old" value="<?php echo $rowtask->idpic ?>">
                  <input type="hidden" name="namapic_old" value="<?php echo $rowtask->namapic ?>">
                  <input type="hidden" name="idpic2_old" value="<?php echo $rowtask->idpic2 ?>">
                  <input type="hidden" name="namapic2_old" value="<?php echo $rowtask->namapic2 ?>">
                  <input type="hidden" name="tglmulai_old" value="<?php echo $rowtask->tglmulai ?>">
                  <input type="hidden" name="tglselesai_old" value="<?php echo $rowtask->tglselesai ?>">


                  <div class="form-group row">
                    <div class="col-12">
                      <h3><?php echo ($rowtask->namaproyek) ?></h3>
                    </div>
                    <div class="col-12" id="divlabel_namaproyeklist">
                      <span id="lblnamaproyeklist"><?php echo $rowtask->namaproyeklist ?></span>
<?php

echo '
        <a href="javascript: void(0)" id="btnedit_namaproyeklist"><i class="fa fa-edit text-sm text-info"></i></a>
      ';

?>

                    </div>
                    <div class="col-12" id="divinput_namaproyeklist" style="display: none;">
                      <select name="idproyeklist" id="idproyeklist" class="form-control">

                        <?php
$rsproyeklist = $this->db->query("select * from proyeklist where idproyek='$rowtask->idproyek'");
if ($rsproyeklist->num_rows() > 0) {
    foreach ($rsproyeklist->result() as $row) {
        $selected = '';
        if ($row->idproyeklist == $rowtask->idproyeklist) {
            $selected = ' selected="selected" ';
        }
        echo '
                                <option value="' . $row->idproyeklist . '"' . $selected . '>' . $row->namaproyeklist . '</option>
                              ';
    }
}
?>
                      </select>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-12 col-md-4">
                      <div class="form-group row">
                        <div class="col-4 col-md-4">Kategori</div>
                        <div class="col-1 col-md-1">:</div>
                        <div class="col-7 col-md-7"><?php echo ($rowtask->namakategori) ?></div>

                        <div class="col-4 col-md-4">Prioritas</div>
                        <div class="col-1 col-md-1">:</div>
                        <div class="col-7 col-md-7"><?php echo ($rowtask->prioritas) ?></div>

                        <div class="col-4 col-md-4">Status</div>
                        <div class="col-1 col-md-1">:</div>
                        <div class="col-7 col-md-7"><?php echo ($rowtask->statustask) ?></div>
                      </div>
                    </div>
                    <div class="col-12 col-md-4">
                      <div class="form-group row">
                        <div class="col-4 col-md-4">Estimasi Selesai</div>
                        <div class="col-1 col-md-1">:</div>
                        <div class="col-7 col-md-7" id="divlabel_estimasilamapengerjaan"><span id="lblestimasilamapengerjaan"><?php echo tglindonesia($rowtask->tgltargetselesai) ?></span>
<?php
if ($this->session->userdata('jabatan') == 'Admin') {
    echo '
        <a href="javascript: void(0)" id="btnedit_estimasilamapengerjaan"><i class="fa fa-edit text-sm text-info"></i></a>
      ';
}
?>
                        </div>
                        <div class="col-7 col-md-7" id="divinput_estimasilamapengerjaan" style="display: none;"><input type="number" name="estimasilamapengerjaan" id="estimasilamapengerjaan" value="<?php echo $rowtask->estimasilamapengerjaan ?>"></div>
                        <div class="col-4 col-md-4">Tgl Mulai</div>
                        <div class="col-1 col-md-1">:</div>
                        <div class="col-7 col-md-7"><?php echo (tglindonesia($rowtask->tglmulai)) ?></div>
                        <div class="col-4 col-md-4">Tgl Selesai</div>
                        <div class="col-1 col-md-1">:</div>
                        <div class="col-7 col-md-7"><?php echo (tglindonesia($rowtask->tglselesai)) ?></div>

                      </div>
                    </div>
                    <div class="col-12 col-md-4">
                      <div class="form-group row">
                        <div class="col-4 col-md-4">Assignment</div>
                        <div class="col-1 col-md-1">:</div>
                        <div class="col-7 col-md-7"><?php echo ($rowtask->namaassignment) ?></div>
                        <div class="col-4 col-md-4">Pembuat Task</div>
                        <div class="col-1 col-md-1">:</div>
                        <div class="col-7 col-md-7"><?php echo ($rowtask->namapembuattask) ?></div>
                        <div class="col-4 col-md-4">PIC</div>
                        <div class="col-1 col-md-1">:</div>
                        <div class="col-7 col-md-7"><?php echo ($rowtask->namapic) ?></div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-2 col-md-1">
                              <?php
if (empty($rowpembuattask->foto)) {
    $foto = base_url('images/nofoto_l.png');
} else {
    $foto = base_url('uploads/pengguna/' . $rowpembuattask->foto);
}
echo '<img src="' . $foto . '" alt="" class="" width="60%">';
?>
                            </div>
                            <div class="col-10 col-md-11">
                              <div class="row">
                                <div class="col-12" id="divlabel_namatask">
                                  <h5 class="font-weight-bold"><span id="lblnamatask"><?php echo $rowtask->namatask; ?></span>
<?php

echo '
        <a href="javascript: void(0)" id="btnedit_namatask"> <i class="fa fa-edit text-sm text-info"></i></a>
      ';

?>

                                  </h5>
                                </div>
                                <div class="col-12" style="display: none;" id="divinput_namatask">
                                  <input type="text" name="namatask" id="namatask" class="form-control" value="<?php echo ($rowtask->namatask) ?>">
                                </div>
                                <div class="col-12">
                                  Dibuat <?php echo berapawaktuyanglalu($rowtask->tglinsert) ?> Oleh <span class="font-weight-bold"><?php echo $rowpembuattask->nama; ?></span>
                                </div>
                              </div>
                            </div>
                            <div class="col-12"><hr></div>
                            <div class="col-11">
                              <?php echo ($rowtask->deskripsi) ?>
                            </div>

                            <!-- <div class="col-1">
                              <a href="javascript: void(0)" id="btnedit_deskripsi" class="float-right"> <i class="fa fa-edit text-sm text-info"></i></a>
                            </div> -->

                            <?php if (!empty($rowtask->file)) {?>

                              <div class="col-6 mt-4">

                                <div class="form-group row bg-gray p-2">
                                  <div class="col-12">
                                    <i class="fa fa-paperclip"></i> File Lampiran
                                  </div>

                                  <div class="col-12">

                                      <a href="<?php echo (base_url('uploads/task/' . $rowtask->file)) ?>" class="text-warning" target="_blank"><?php echo $rowtask->file ?></a>

                                  </div>
                                </div>

                              </div>

                            <?php }?>


                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="col-12">
                      <div class="card">
                        <div class="card-body">

                          <div class="form-group row required">
                            <label for="" class="col-md-3 col-form-label">Person In Charge (PIC)</label>
                            <div class="col-md-4">
                              <label for="">PIC PERTAMA</label>
                              <select name="idpic" id="idpic" class="form-control select2">
                                <option value="">---PIC 1---</option>
                                <?php
$rspic = $this->db->query("select * from v_proyekdetail where idproyek='" . $rowtask->idproyek . "'");
if ($rspic->num_rows() > 0) {
    foreach ($rspic->result() as $row) {
        $selected = '';
        if ($row->idpengguna == $rowtask->idpic) {
            $selected = ' selected="selected"';
        }

        echo '
              <option value="' . $row->idpengguna . '" ' . $selected . '>' . $row->nama . '</option>
            ';
    }
}
?>
                              </select>
                            </div>
                            <div class="col-md-4">
                              <label for="">PIC KEDUA (Jika Ada)</label>
                              <select name="idpic2" id="idpic2" class="form-control select2">
                                <option value="">---PIC 2 (Jika Ada)---</option>
                                <?php
$rspic = $this->db->query("select * from v_proyekdetail where idproyek='" . $rowtask->idproyek . "'");
if ($rspic->num_rows() > 0) {
    foreach ($rspic->result() as $row) {
        $selected = '';
        if ($row->idpengguna == $rowtask->idpic2) {
            $selected = ' selected="selected"';
        }

        echo '
              <option value="' . $row->idpengguna . '" ' . $selected . '>' . $row->nama . '</option>
            ';
    }
}
?>
                              </select>
                            </div>

                          </div>

                          <div class="form-group row required" style="display: none;">
                            <label for="" class="col-md-3 col-form-label">prioritas</label>
                            <div class="col-md-9">
                              <select name="prioritas" id="prioritas" class="form-control">
                                <option value="">--Pilih tingkat prioritas tugas--</option>
                                <option value="Rendah" <?php echo ($rowtask->prioritas == 'Rendah') ? 'selected="selected"' : '' ?> >Rendah</option>
                                <option value="Sedang" <?php echo ($rowtask->prioritas == 'Sedang') ? 'selected="selected"' : '' ?> >Sedang</option>
                                <option value="Tinggi" <?php echo ($rowtask->prioritas == 'Tinggi') ? 'selected="selected"' : '' ?> >Tinggi</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-group row required">
                            <label for="" class="col-md-3 col-form-label">Assignment</label>
                            <div class="col-md-9">
                              <select name="assignment" id="assignment" class="form-control select2">
                                <option value="">--Pilih assignment--</option>
                                <?php
$rsassignment = $this->db->query("SELECT * from v_pengguna order by nama");
if ($rsassignment->num_rows() > 0) {
    foreach ($rsassignment->result() as $row) {
        $selected = '';
        if ($row->idpengguna == $rowtask->assignment) {
            $selected = ' selected="selected"';
        }

        echo '
                                        <option value="' . $row->idpengguna . '" ' . $selected . '>' . $row->nama . '</option>
                                      ';
    }
}
?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group row required">
                            <label for="" class="col-md-3 col-form-label">Status Task</label>
                            <div class="col-md-9">
                              <select name="statustask" id="statustask" class="form-control">
                                <option value="Baru" <?php echo ($rowtask->statustask == 'Baru' ? 'selected="selected"' : '') ?> >Baru</option>
                                <option value="Sedang Diproses" <?php echo ($rowtask->statustask == 'Sedang Diproses' ? 'selected="selected"' : '') ?> >Sedang Diproses</option>
                                <option value="Sudah Selesai" <?php echo ($rowtask->statustask == 'Sudah Selesai' ? 'selected="selected"' : '') ?> >Sudah Selesai</option>
                              </select>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-12">

                              <div class="form-group">
                                <label for="">Tinggalkan Komentar</label>
                                <textarea name="komentar" id="komentar" class="form-control" rows="3" placeholder="Tinggalkan komentar"></textarea>
                              </div>
                            </div>
                            <div class="col-12">
                              <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> Simpan</button>
                              <a href="<?php echo (site_url('task')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
                            </div>
                          </div>
                        </div> <!-- card-body -->

                        <div class="card-footer">
                          <?php
$rskomentar = $this->db->query("select * from v_taskkomentar where idtask='$rowtask->idtask' order by tgltaskkomentar asc");
?>
                          <h5 class="text-gray-dark">Komentar <span id="jumlahkomentar" class="badge badge-info"><?php echo $rskomentar->num_rows() ?></span></h5>
                          <hr>
                          <div class="row">


                            <?php

if ($rskomentar->num_rows() > 0) {
    foreach ($rskomentar->result() as $row) {

        $nama = $row->nama;
        if (!empty($row->foto)) {
            $foto = base_url('uploads/pengguna/' . $row->foto);
        } else {
            $foto = base_url('images/foto-users.png');
        }

        if ($this->session->userdata('idpengguna') == $row->idpengguna) {
            $bgcardkomentar = "bg-sorot";
        } else {
            $bgcardkomentar = '';
        }

        echo '
                                      <div class="col-12">
                                        <div class="card shadow">
                                          <div class="card-body ' . $bgcardkomentar . '">
                                            <div class="row">
                                              <div class="col-2 col-md-1">
                                                <img src="' . $foto . '" class="rounded-circle" alt="" width="80%">
                                              </div>
                                              <div class="col-10 col-md-11">
                                                <div class="form-group row">
                                                    <div class="col-12 komentar-nama">' . $nama . '</div>
                                                    <div class="col-12 komentar-tanggal">' . berapawaktuyanglalu($row->tgltaskkomentar) . '</div>
                                                    <div class="col-12 komentar-isi">
                                                      ' . $row->komentar . '
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="clearfix"></div>
                                  ';
    }
} else {
    echo '
                                      <div class="col-12 text-gray text-center">
                                        Belum ada komentar
                                      </div>
                                ';
}
?>

                          </div>
                        </div>
                      </div> <!-- card -->
                    </div>

                  </div> <!-- row -->

              </div> <!-- ./card-body -->

            </div> <!-- /.card -->
          </div> <!-- /.col -->
        </div>
      </form>
    </div>
  </div> <!-- /.row -->
  <!-- Main row -->



<?php $this->load->view("template/footer")?>



<script type="text/javascript">

  var idtask = "<?php echo ($idtask) ?>";

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
        idpic: {
          validators:{
            notEmpty: {
                message: "idpic tidak boleh kosong"
            },
          }
        },
        prioritas: {
          validators:{
            notEmpty: {
                message: "prioritas tidak boleh kosong"
            },
          }
        },
        assignment: {
          validators:{
            notEmpty: {
                message: "assignment tidak boleh kosong"
            },
          }
        },
        statustask: {
          validators:{
            notEmpty: {
                message: "statustask tidak boleh kosong"
            },
          }
        },
        komentar: {
          validators:{
            notEmpty: {
                message: "komentar tidak boleh kosong"
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


  $('#btnedit_namatask').click(function() {
    $('#divinput_namatask').show();
    $('#divlabel_namatask').hide();
  });

  $('#namatask').blur(function() {
    var idtask = $('#idtask').val();
    var value = $('#namatask').val();

    $.ajax({
      url: '<?php echo site_url("task/simpan_field") ?>',
      type: 'POST',
      dataType: 'json',
      data: {'idtask': idtask, 'field': 'namatask', 'value': value},
    })
    .done(function(result) {
      if (result.success) {
        console.log("success");
        $('#divinput_namatask').hide();
        $('#divlabel_namatask').show();
        $('#lblnamatask').html(value);
      }else{
        console.log("gagal");
      }
    })
    .fail(function() {
      console.log("error");
    });

  });


  $('#btnedit_estimasilamapengerjaan').click(function() {
    $('#divinput_estimasilamapengerjaan').show();
    $('#divlabel_estimasilamapengerjaan').hide();
  });


  $('#estimasilamapengerjaan').blur(function() {
    var idtask = $('#idtask').val();
    var value = $('#estimasilamapengerjaan').val();

    $.ajax({
      url: '<?php echo site_url("task/simpan_field") ?>',
      type: 'POST',
      dataType: 'json',
      data: {'idtask': idtask, 'field': 'estimasilamapengerjaan', 'value': value},
    })
    .done(function(result) {
      if (result.success) {
        console.log("success");
        $('#divinput_estimasilamapengerjaan').hide();
        $('#divlabel_estimasilamapengerjaan').show();
        $('#lblestimasilamapengerjaan').html(result.output);
      }else{
        console.log("gagal");
      }
    })
    .fail(function() {
      console.log("error");
    });

  });

  $('#btnedit_namaproyeklist').click(function() {
    $('#divinput_namaproyeklist').show();
    $('#divlabel_namaproyeklist').hide();
  });


  $('#idproyeklist').blur(function() {
    var idtask = $('#idtask').val();
    var value = $('#idproyeklist').val();

    $.ajax({
      url: '<?php echo site_url("task/simpan_field") ?>',
      type: 'POST',
      dataType: 'json',
      data: {'idtask': idtask, 'field': 'idproyeklist', 'value': value},
    })
    .done(function(result) {
      if (result.success) {
        console.log("success");
        $('#divinput_namaproyeklist').hide();
        $('#divlabel_namaproyeklist').show();
        $('#lblnamaproyeklist').html( $("#idproyeklist option:selected").text() );
      }else{
        console.log("gagal");
      }
    })
    .fail(function() {
      console.log("error");
    });

  });


</script>

</body>
</html>
