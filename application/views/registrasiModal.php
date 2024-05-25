<!-- Animate CSS for the css animation support if needed -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet" />

<!-- Include SmartWizard CSS -->
<!-- <link href="<?php echo base_url('assets/jquery-smartwizard-master/dist') ?>/css/demo.css" rel="stylesheet" type="text/css" /> -->
<link href="<?php echo base_url('assets/jquery-smartwizard-master/dist') ?>/css/smart_wizard_all.css" rel="stylesheet" type="text/css" />

<style>
  .help-block {
    color: red;
  }
</style>

<style>
  .modal-custom {
    /* padding: 0 0 0 0; */
    padding-bottom: 0px;
  }
</style>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" id="registrasiModal" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <div class="modal-body modal-custom">

        <div class="row">
          <div class="col-12">
            <h3 class="text-center">BUAT AKUN ELSHADDAI CHURCH</h3>
          </div>
          <div class="col-12 p-3">

            <!-- SmartWizard html -->
            <div id="smartwizard">

              <ul class="nav nav-progress">
                <li class="nav-item">
                  <a class="nav-link" href="#step-1">
                    <div class="num">1</div>
                    Selamat Datang
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#step-2">
                    <span class="num">2</span>
                    Informasi Akun
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#step-3">
                    <span class="num">3</span>
                    Konfirmasi Akun
                  </a>
                </li>
              </ul>

              <div class="tab-content" style="margin-top: -80px;">
                <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1" style="padding-bottom: 90px;">
                  <div class="row">
                    <div class="col-12">
                      <h5>Alasan anda membuat akun baru?</h5>
                    </div>
                    <div class="col-12">
                      <div class="row">
                        <div class="col-12">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="alasanmembuatakun" id="alasanmembuatakun1" value="1">
                            <label class="form-check-label" for="alasanmembuatakun1">
                              Saya Hanya Berkunjung
                            </label>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="alasanmembuatakun" id="alasanmembuatakun2" checked value="2">
                            <label class="form-check-label" for="alasanmembuatakun2">
                              Saya ingin bergabung di El Shaddai Church
                            </label>
                          </div>

                        </div>
                      </div>
                    </div>



                    <div class="col-12 mt-5 divsudahpernahfondationclass">
                      <div class="row">
                        <div class="col-12">
                          <h5 class="">Sudah Pernah mengikuti Foundation Class 1/ Konseling Baptisan di Elshaddai Church?</h5>
                        </div>
                        <div class="col-12">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="sudahpernahfondationclass" id="sudahpernahfondationclass1" value="1">
                            <label class="form-check-label" for="sudahpernahfondationclass1">
                              Sudah
                            </label>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="sudahpernahfondationclass" id="sudahpernahfondationclass2" checked value="2">
                            <label class="form-check-label" for="sudahpernahfondationclass2">
                              Belum
                            </label>
                          </div>

                        </div>
                      </div>
                    </div>



                  </div>
                </div>
                <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2" style="padding-bottom: 90px;">

                  <form action="#" id="formBuatAkun" method="POST">

                    <div class="row">
                      <div class="col-12">
                        <h3>Informasi Pembuatan Akun</h3>
                      </div>
                      <div class="col-md-6">
                        <div class="form-row">
                          <div class="form-holder form-holder-2">
                            <label for="account_name">Nama Lengkap:</label>
                            <input type="text" placeholder="Nama Lengkap" class="form-control input-step-2-1" id="namalengkap" name="namalengkap">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6 divnik">
                        <div class="form-row">
                          <div class="form-holder form-holder-2">
                            <label for="account_name">NIK:</label>
                            <input type="text" placeholder="NIK" class="form-control input-step-2-1" id="nik" name="nik">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-row">
                          <div class="form-holder form-holder-2">
                            <label for="account_name">Jenis Kelamin:</label>
                            <select name="jeniskelamin" id="jeniskelamin" class="form-control">
                              <option value="">Pilih jenis kelamin...</option>
                              <option value="Laki-laki">Laki-laki</option>
                              <option value="Perempuan">Perempuan</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6 divtempatlahir">
                        <div class="form-row">
                          <div class="form-holder form-holder-2">
                            <label for="account_name">Tempat Lahir:</label>
                            <input type="text" placeholder="Tempat lahir" class="form-control input-step-2-1" id="tempatlahir" name="tempatlahir">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6 divtgllahir">
                        <div class="form-row">
                          <div class="form-holder form-holder-2">
                            <label for="account_name">Tgl Lahir:</label>
                            <input type="date" class="form-control input-step-2-1" id="tanggallahir" name="tanggallahir">
                          </div>
                        </div>

                      </div>


                      <div class="col-md-6 divalamatrumah">
                        <div class="form-row">
                          <div class="form-holder form-holder-2">
                            <label for="account_name">Alamat Rumah:</label>
                            <input type="text" placeholder="Alamat rumah" class="form-control input-step-2-1" id="alamatrumah" name="alamatrumah">
                          </div>
                        </div>

                      </div>

                      <div class="col-md-6 divnohp">
                        <div class="form-row">
                          <div class="form-holder form-holder-2">
                            <label for="account_name">Nomor HP:</label>
                            <input type="text" placeholder="No HP" class="form-control input-step-2-1" id="nohp" name="nohp">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-row">
                          <div class="form-holder form-holder-2">
                            <label for="account_name">Email:</label>
                            <input type="text" placeholder="Email" class="form-control input-step-2-1" id="email" name="email">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-row">
                          <div class="form-holder form-holder-2">
                            <label for="account_name">Password:</label>
                            <input type="password" placeholder="Password" class="form-control input-step-2-1" id="password" name="password">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-row">
                          <div class="form-holder form-holder-2">
                            <label for="account_name">Ulangi Password:</label>
                            <input type="password" placeholder="Ulangi Password" class="form-control input-step-2-1" id="password2" name="password2">
                          </div>
                        </div>
                      </div>


                    </div>
                  </form>
                </div>
                <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3" style="padding-bottom: 90px;">
                  <div class="row">
                    <div class="col-12">
                      <h3>Konfirmasi Pembuatan Akun</h3>
                    </div>
                    <div class="col-12">
                      <table class="table">
                        <tbody>
                          <tr>
                            <td style="width: 25%;">Nama Lengkap</td>
                            <td style="width: 5%;">:</td>
                            <td style="width: 70%;" id="tdDaftarNamaLengkap"></td>
                          </tr>
                          <tr class="divnik">
                            <td style="width: 25%;">NIK</td>
                            <td style="width: 5%;">:</td>
                            <td style="width: 70%;" id="tdDaftarNIK"></td>
                          </tr>
                          <tr>
                            <td style="width: 25%;">Jenis Kelamin</td>
                            <td style="width: 5%;">:</td>
                            <td style="width: 70%;" id="tdDaftarJenisKelamin"></td>
                          </tr>
                          <tr class="divtempatlahir">
                            <td style="width: 25%;">Tempat Lahir</td>
                            <td style="width: 5%;">:</td>
                            <td style="width: 70%;" id="tdDaftarTempatLahir"></td>
                          </tr>
                          <tr class="divtgllahir">
                            <td style="width: 25%;">Tanggal Lahir</td>
                            <td style="width: 5%;">:</td>
                            <td style="width: 70%;" id="tdDaftarTanggalLahir"></td>
                          </tr>
                          <tr class="divalamatrumah">
                            <td style="width: 25%;">Alamat Rumah</td>
                            <td style="width: 5%;">:</td>
                            <td style="width: 70%;" id="tdDaftarAlamatRumah"></td>
                          </tr>
                          <tr>
                            <td style="width: 25%;">Nomor HP</td>
                            <td style="width: 5%;">:</td>
                            <td style="width: 70%;" id="tdDaftarNomorHP"></td>
                          </tr>
                          <tr>
                            <td style="width: 25%;">Email</td>
                            <td style="width: 5%;">:</td>
                            <td style="width: 70%;" id="tdDaftarEmail"></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

              </div>

              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>


          </div>
        </div>


      </div>

    </div>
  </div>
</div>



<!-- Include SmartWizard JavaScript source -->
<script type="text/javascript" src="<?php echo base_url('assets/jquery-smartwizard-master/dist') ?>/js/jquery.smartWizard.min.js"></script>


<script type="text/javascript">
  function onFinish() {

    var namalengkap = $('#namalengkap').val();
    var nik = $('#nik').val();
    var jeniskelamin = $('#jeniskelamin').val();
    var tempatlahir = $('#tempatlahir').val();
    var tanggallahir = $('#tanggallahir').val();
    var alamatrumah = $('#alamatrumah').val();
    var nohp = $('#nohp').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var sudahpernahfondationclass = $('#sudahpernahfondationclass1').val();


    if ($('#sudahpernahfondationclass1').prop('checked')) {
      var sudahpernahfondationclass = 'Sudah';
    } else {
      var sudahpernahfondationclass = 'Belum';
    }

    if ($('#alasanmembuatakun1').prop('checked')) {
      var alasanmembuatakun = 'Berkunjung';
    } else {
      var alasanmembuatakun = 'Bergabung';
    }

    formData = {
      'namalengkap': namalengkap,
      'nik': nik,
      'jeniskelamin': jeniskelamin,
      'tempatlahir': tempatlahir,
      'tanggallahir': tanggallahir,
      'alamatrumah': alamatrumah,
      'nohp': nohp,
      'email': email,
      'password': password,
      'alasanmembuatakun': alasanmembuatakun,
      'sudahpernahfondationclass': sudahpernahfondationclass,
    }

    $.ajax({
        url: '<?= site_url('login/simpanregistrasi') ?>',
        type: 'POST',
        dataType: 'json',
        data: formData,
      })
      .done(function(response) {
        console.log(response);
        if (response.success) {
          swal("Berhasil", "Data berhasil disimpan! Silahkan buka email dan verifikasi email anda. Apabila tidak ada di dalam folder kotak masuk, coba periksa di dalam folder spam.", "success")
            .then(function() {
              $('#registrasiModal').modal('hide');
            });
        } else {
          swal("Upss!", response.msg, "info");
        }
      })
      .fail(function() {
        console.log('error simpanregistrasi');
      });
  }

  function onCancel() {
    $('#smartwizard').smartWizard("reset");
    $('#registrasiModal').modal('hide');
  }

  $(function() {
    // Step show event
    $("#smartwizard").on("showStep", function(e, anchorObject, stepIndex, stepDirection, stepPosition) {
      $("#prev-btn").removeClass('disabled').prop('disabled', false);
      $("#next-btn").removeClass('disabled').prop('disabled', false);
      if (stepPosition === 'first') {
        $("#prev-btn").addClass('disabled').prop('disabled', true);
      } else if (stepPosition === 'last') {
        $("#next-btn").addClass('disabled').prop('disabled', true);
      } else {
        $("#prev-btn").removeClass('disabled').prop('disabled', false);
        $("#next-btn").removeClass('disabled').prop('disabled', false);
      }

      // console.log(stepDirection);
      // console.log(stepIndex);

      // Get step info from Smart Wizard
      // let stepInfo = $('#smartwizard').smartWizard("getStepInfo");
      // $("#sw-current-step").text(stepInfo.currentStep + 1);
      // $("#sw-total-step").text(stepInfo.totalSteps);
    });

    $("#smartwizard").on("showStep", function(e, anchorObject, stepIndex, stepDirection, stepPosition) {
      checkStep = false;
      if (stepPosition == 'last') {
        $(".btnSelesai").show();

        $('#tdDaftarNamaLengkap').html($('#namalengkap').val());
        $('#tdDaftarNIK').html($('#nik').val());
        $('#tdDaftarJenisKelamin').html($('#jeniskelamin').val());
        $('#tdDaftarTempatLahir').html($('#tempatlahir').val());
        $('#tdDaftarTanggalLahir').html($('#tanggallahir').val());
        $('#tdDaftarAlamatRumah').html($('#alamatrumah').val());
        $('#tdDaftarNomorHP').html($('#nohp').val());
        $('#tdDaftarEmail').html($('#email').val());

      } else {
        $(".btnSelesai").hide();
      }
    });

    $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {

      // var form_data = $("#form" + stepNumber).serialize();
      console.log(stepNumber);
      console.log(stepDirection);


      if (stepNumber == 1) {
        if (stepDirection == 2) {


          var validator = $("#formBuatAkun").data("bootstrapValidator");
          validator.validate();
          if (!validator.isValid()) {
            $('#smartwizard').smartWizard("fixHeight");
            return false;
          } else {
            if ($('#password').val() != $('#password2').val()) {
              swal("Ulangi Password", "Ulangi password tidak sama!", "info");
              return false;
            } else {
              $('#smartwizard').smartWizard("fixHeight");
              return true;
            }
          }

          return false;


        } else {
          return true;
        }
      }

      // if (stepNumber == 1) {
      //   if (stepDirection == 2) {
      //     var KdRuangan = $('#KdRuangan').val();
      //     var KdRujukanAsal = $('#KdRujukanAsal').val();
      //     var KdDokter = $('#KdDokter').val();

      //     if (KdRuangan == "") {
      //       swal("Informasi", "Nama poliklinik tidak boleh kosong!", "info");
      //       return false;
      //     }

      //     if (KdRujukanAsal == "") {
      //       swal("Informasi", "Asal rujukan tidak boleh kosong!", "info");
      //       return false;
      //     }

      //     if (KdDokter == "") {
      //       swal("Informasi", "Nama dokter pemeriksa tidak boleh kosong!", "info");
      //       return false;
      //     }

      //     return true;
      //   } else {
      //     return true;
      //   }
      // }



      if (stepNumber == 2) {
        return true;
      } else {}

      // return false;

    });


    $("#smartwizard").on("initialized", function(e) {
      console.log("initialized");
    });

    $("#smartwizard").on("loaded", function(e) {
      console.log("loaded");
    });

    // Smart Wizard
    $('#smartwizard').smartWizard({
      selected: 0,
      // autoAdjustHeight: false,
      enableUrlHash: false,
      autoAdjustHeight: true,
      theme: 'square', // basic, arrows, square, round, dots
      transition: {
        animation: 'myFade' // none|fade|slideHorizontal|slideVertical|slideSwing|css
      },
      toolbar: {
        showNextButton: true, // show/hide a Next button
        showPreviousButton: true, // show/hide a Previous button
        position: 'bottom', // none/ top/ both bottom
        extraHtml: `<button class="btn btn-success btnSelesai" onclick="onFinish()">Selesai</button>
                              <button class="btn btn-secondary" onclick="onCancel()">Batal</button>`
      },
      anchor: {
        enableNavigation: true, // Enable/Disable anchor navigation 
        enableNavigationAlways: false, // Activates all anchors clickable always
        enableDoneState: true, // Add done state on visited steps
        markPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
        unDoneOnBackNavigation: false, // While navigate back, done state will be cleared
        enableDoneStateNavigation: true // Enable/Disable the done state navigation
      },
      lang: { // Language variables for button
        next: 'Berikutnya',
        previous: 'Sebelumnya'
      },
      disabledSteps: [], // Array Steps disabled
      errorSteps: [], // Highlight step with errors
      hiddenSteps: [], // Hidden steps
      // getContent: (idx, stepDirection, selStep, callback) => {
      //   console.log('getContent',selStep, idx, stepDirection);
      //   callback('<h1>'+idx+'</h1>');
      // }
    });

    $.fn.smartWizard.transitions.myFade = (elmToShow, elmToHide, stepDirection, wizardObj, callback) => {
      if (!$.isFunction(elmToShow.fadeOut)) {
        callback(false);
        return;
      }

      if (elmToHide) {
        elmToHide.fadeOut(wizardObj.options.transition.speed, wizardObj.options.transition.easing, () => {
          elmToShow.fadeIn(wizardObj.options.transition.speed, wizardObj.options.transition.easing, () => {
            callback();
          });
        });
      } else {
        elmToShow.fadeIn(wizardObj.options.transition.speed, wizardObj.options.transition.easing, () => {
          callback();
        });
      }
    }


    $("#state_selector").on("change", function() {
      $('#smartwizard').smartWizard("setState", [$('#step_to_style').val()], $(this).val(), !$('#is_reset').prop("checked"));
      return true;
    });

    $("#style_selector").on("change", function() {
      $('#smartwizard').smartWizard("setStyle", [$('#step_to_style').val()], $(this).val(), !$('#is_reset').prop("checked"));
      return true;
    });

  });
</script>


<script>
  $("#formBuatAkun").bootstrapValidator({
    feedbackIcons: {
      valid: 'glyphicon glyphicon-ok',
      invalid: 'glyphicon glyphicon-remove',
      validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
      namalengkap: {
        validators: {
          notEmpty: {
            message: "nama tidak boleh kosong"
          },
        }
      },
      nik: {
        validators: {
          stringLength: {
            min: 16,
            max: 16,
            message: 'Panjang karakter harus 16 karakter'
          },
          callback: {
            message: 'Nomor induk kependudukan tidak boleh kosong',
            callback: function(value, validator, nik) {

              if ($('#alasanmembuatakun2').prop('checked') && $('#nik').val() == '') {
                return {
                  valid: false,
                  message: 'Nomor induk kependudukan tidak boleh kosong'
                }
              }
              return true
            }
          }
        }
      },
      jeniskelamin: {
        validators: {
          notEmpty: {
            message: "jenis kelamin tidak boleh kosong"
          },
        }
      },
      tempatlahir: {
        validators: {
          callback: {
            message: 'tempat lahir tidak boleh kosong',
            callback: function(value, validator, tampatlahir) {

              if ($('#alasanmembuatakun2').prop('checked') && $('#tempatlahir').val() == '') {
                return {
                  valid: false,
                  message: 'tempat lahir tidak boleh kosong'
                }
              }
              return true
            }
          }
        }
      },
      tanggallahir: {
        validators: {
          callback: {
            message: 'tangggal lahir tidak boleh kosong',
            callback: function(value, validator, tanggallahir) {

              if ($('#alasanmembuatakun2').prop('checked') && $('#tanggallahir').val() == '') {
                return {
                  valid: false,
                  message: 'tangggal lahir tidak boleh kosong'
                }
              }
              return true
            }
          }
        }
      },
      nohp: {
        validators: {
          callback: {
            message: 'nomor telepon / whatsapp tidak boleh kosong',
            callback: function(value, validator, nohp) {

              if ($('#alasanmembuatakun2').prop('checked') && $('#nohp').val() == '') {
                return {
                  valid: false,
                  message: 'nomor telepon / whatsapp tidak boleh kosong'
                }
              }
              return true
            }
          }
        }
      },
      email: {
        validators: {
          notEmpty: {
            message: "email tidak boleh kosong"
          },
        }
      },
      password: {
        validators: {
          stringLength: {
            min: 6,
            max: 25,
            message: 'Panjang karakter minimal 6 sd 25 karakter'
          },
          callback: {
            message: 'Password tidak boleh kosong',
            callback: function(value, validator, password) {

              if ($('#password').val() == '') {
                return {
                  valid: false,
                  message: 'Password tidak boleh kosong'
                }
              }
              return true
            }
          }
        }
      },
      password2: {
        validators: {
          stringLength: {
            min: 6,
            max: 25,
            message: 'Panjang karakter minimal 6 sd 25 karakter'
          },
          callback: {
            message: 'Password tidak boleh kosong',
            callback: function(value, validator, password2) {

              if ($('#password2').val() == '') {
                return {
                  valid: false,
                  message: 'Ulangi password tidak boleh kosong'
                }
              }
              return true
            }
          }
        }
      },

    },
    onSuccess: function(e, data) {
      e.preventDefault();

      // console.log("1");

      // if ($('#optradioBergabung1').prop('checked') === false && $('#optradioBergabung2').prop('checked') === false) {
      //   e.preventDefault();
      //   swal("Upss", "Silahkan pilih apakah anda hanya ingin berkunjung atau ingin bergabung di El Shaddai Church.", "info")
      //     .then(function() {
      //       $('#optradioBergabung1').focus();
      //     });
      //   return false;
      // }
      // console.log("3");

      // $('#btnDaftar').prop('disabled', true);
    }
  });


  $(document).on('change', '#alasanmembuatakun1', function() {
    alasanmembuatakun();
  });

  $(document).on('change', '#alasanmembuatakun2', function() {
    alasanmembuatakun();
  });


  $(document).on('change', '#sudahpernahfondationclass1', function() {
    alasanmembuatakun();
  });

  $(document).on('change', '#sudahpernahfondationclass2', function() {
    alasanmembuatakun();
  });

  function alasanmembuatakun() {

    if ($('#alasanmembuatakun1').prop('checked')) {
      $('.divsudahpernahfondationclass').hide();
      $('.divnik').hide();
      $('.divtempatlahir').hide();
      $('.divtgllahir').hide();
      $('.divnohp').hide();
      $('.divalamatrumah').hide();

    } else {
      $('.divsudahpernahfondationclass').show();

      if ($('#sudahpernahfondationclass1').prop('checked')) {
        $('.divnik').show();
        $('.divtempatlahir').show();
        $('.divtgllahir').show();
        // $('.divnohp').show();
        $('.divalamatrumah').show();

      } else {
        $('.divnik').hide();
        $('.divtempatlahir').hide();
        $('.divtgllahir').hide();
        // $('.divnohp').hide();  
        $('.divalamatrumah').hide();

      }
    }

  }
</script>


<script>
  $(document).ready(function() {

    $('#sudahpernahfondationclass2').change();

    $('.radio-group .radio').click(function() {
      $(this).parent().find('.radio').removeClass('selected');
      $(this).addClass('selected');
    });

    $(".submit").click(function() {
      return false;
    })

  });

  function kosongkanText() {
    $('#namalengkap').val() = '';
    $('#nik').val() = '';
    $('#jeniskelamin').val() = '';
    $('#tempatlahir').val() = '';
    $('#tanggallahir').val() = '';
    $('#alamatrumah').val() = '';
    $('#nohp').val() = '';
    $('#email').val() = '';
    $('#password').val() = '';
    $('#password2').val() = '';
  }
</script>