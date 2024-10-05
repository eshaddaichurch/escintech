<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalwaktudantempat">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h3 class="modal-title">Tambah Waktu Dan Tempat</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST" id="formtanggal">

          <div class="container-fluid">
            <div class="row">

              <div class="col-12">
                <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label">Lokasi Event</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" name="lokasievent" id="lokasievent" placeholder="Lokasi Event" value="El Shaddai">
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label">Tanggal Mulai</label>
                  <div class="col-md-8">
                    <input type="date" name="tgljadwaleventmulai" id="tgljadwaleventmulai" class="form-control">
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label">Tanggal Selesai</label>
                  <div class="col-md-8">
                    <input type="date" name="tgljadwaleventselesai" id="tgljadwaleventselesai" class="form-control">
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label">Jam</label>
                  <div class="col-md-4">
                    <input type="time" name="jammulai" id="jammulai" class="form-control">
                  </div>
                  <label for="" class="col-md-1 col-form-label">s/d</label>
                  <div class="col-md-4">
                    <input type="time" name="jamselesai" id="jamselesai" class="form-control">
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="chkdiulangsetiapminggu" value="option1">
                  <label class="form-check-label" for="chkdiulangsetiapminggu">Acara Diiulang Setiap Minggu</label>
                </div>
              </div>

              <div class="col-12 mt-5">
                <button type="submit" class="btn btn-primary float-right" id="btnTambahkanTanggal">Tambahkan</button>
              </div>

            </div>
          </div>
        </form>
      </div>


    </div>

  </div>
</div>


<script>
  function loadDataWaktuDanTempat() {


  }


  //----------------------------------------------------------------- > validasi
  $("#formtanggal").bootstrapValidator({
      feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
        lokasievent: {
          validators: {
            notEmpty: {
              message: "lokasi event tidak boleh kosong"
            },
          }
        },
        tgljadwaleventmulai: {
          validators: {
            notEmpty: {
              message: "tanggal mulai tidak boleh kosong"
            },
          }
        },
        tgljadwaleventselesai: {
          validators: {
            notEmpty: {
              message: "tanggal selesai tidak boleh kosong"
            },
          }
        },
        jammulai: {
          validators: {
            notEmpty: {
              message: "jam mulai tidak boleh kosong"
            },
          }
        },
        jamselesai: {
          validators: {
            notEmpty: {
              message: "jam selesai tidak boleh kosong"
            },
          }
        },
      }
    })
    .on('success.form.bv', function(e) {
      e.preventDefault();
      $('#btnTambahkanTanggal').attr('disabled', false);

      var lokasievent = $('#lokasievent').val();
      var tgljadwaleventmulai = $('#tgljadwaleventmulai').val();
      var tgljadwaleventselesai = $('#tgljadwaleventselesai').val();
      var jammulai = $('#jammulai').val();
      var jamselesai = $('#jamselesai').val();

      var diulangsetiapminggu = 'tidak';
      if ($('#chkdiulangsetiapminggu').prop('checked')) {
        diulangsetiapminggu = 'Ya';
      }


      // var isicolomn = table.columns(4).data().toArray();
      // for (var i = 0; i < isicolomn.length; i++) {
      //   for (var j = 0; j < isicolomn[i].length; j++) {            
      //     if (isicolomn[i][j] === tgljadwaleventmulai) {
      //         swal("Tanggal Sudah Ada!", "Tanggal event sudah ada di dalam list.", "info");
      //         return false;
      //     }
      //   }
      // };

      nomorrow = table.page.info().recordsTotal + 1;
      var idjadwaleventdetail = "";
      table.row.add([
        nomorrow,
        idjadwaleventdetail,
        tgljadwaleventmulai,
        tgljadwaleventselesai,
        jammulai,
        jamselesai,
        tgljadwaleventmulai + ' s/d ' + tgljadwaleventselesai,
        jammulai + ' s/d ' + jamselesai,
        lokasievent,
        diulangsetiapminggu,
        '<span class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></span>'
      ]).draw(false);

      $("#tgljadwaleventmulai").val("  /  /    ");
      $("#tgljadwaleventselesai").val("");
      $("#jammulai").val("");
      $("#jamselesai").val("");
    });
</script>