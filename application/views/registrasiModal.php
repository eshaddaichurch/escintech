  <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" id="registrasiModal">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">

        <div class="modal-body">
          
          <form action="<?php echo site_url('login/simpanregistrasi') ?>" id="formRegistrasi" method="post">
            
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="form-group row">
                    <div class="col-3 col-md-1">
                      <img src="<?php echo base_url('images/icon.png') ?>" alt="" style="width: 50px;">
                    </div>
                    <div class="col-9 col-md-11">
                      <h5>Elshaddai Church</h5>
                      <p>Jl. Kota Baru 1</p>
                    </div>                  
                  </div>
                </div>
                <div class="col-12">
                  <h3 class="text-center">MY ESC ACCOUNT</h3>
                </div>

                <div class="col-md-6 mt-3">
                  <div class="form-group">
                    <label for="" class="">Nama Lengkap</label>
                    <input type="text" name="namalengkap" id="namalengkap" class="form-control" placeholder="Nama lengkap sesuai KTP">
                  </div>
                </div>
                <div class="col-md-6 mt-3">
                  <div class="form-group">
                    <label for="" class="">NIK</label>
                    <input type="text" name="nik" id="nik" class="form-control" placeholder="Nomor Induk Kependudukan">
                  </div>
                </div>
                <div class="col-md-6 mt-3">
                  <div class="form-group">
                    <label for="" class="">Jenis Kelamin</label>
                    <select name="jeniskelamin" id="jeniskelamin" class="form-control">
                      <option value="">Pilih jenis kelamin...</option>
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 mt-3">
                  <div class="form-group">
                    <label for="" class="">Tempat Lahir</label>
                    <input type="text" name="tempatlahir" id="tempatlahir" class="form-control" placeholder="Tempat lahir">
                  </div>
                </div>
                <div class="col-md-6 mt-3">
                  <div class="form-group">
                    <label for="" class="">Tanggal Lahir</label>
                    <input type="date" name="tanggallahir" id="tanggallahir" class="form-control">
                  </div>
                </div>
                <div class="col-md-6 mt-3" style="display: none;">
                  <div class="form-group">
                    <label for="" class="">Alamat Rumah</label>
                    <textarea name="alamatrumah" id="alamatrumah" class="form-control" rows="2" placeholder="Alamat tempat tinggal sekarang"></textarea>
                  </div>
                </div>
                <div class="col-md-6 mt-3">
                  <div class="form-group">
                    <label for="" class="">Telepon/ WA (Aktif)</label>
                    <input type="text" name="nohp" id="nohp" class="form-control" placeholder="0813xxxxxxxxx">
                  </div>
                </div>
                <div class="col-md-6 mt-3">
                  <div class="form-group">
                    <label for="" class="">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="example@gmail.com">
                  </div>
                </div>
                <div class="col-md-6 mt-3">
                  <div class="form-group">
                    <label for="" class="">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="************">
                  </div>
                </div>




                <div class="col-12 mt-5 mb-3">
                  <a href="#" class="show-form-login" style="font-size: 10px;">Sudah punya akun? Login disini.</a>
                </div>

                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary float-end">Daftar</button>
                  <button type="button" class="btn btn-secondary float-end me-2" data-bs-dismiss="modal">Batal</button>
                </div>
              </div>
            </div>

          </form>


        </div>
        
      </div>
    </div>
  </div>


  <script>
    $("#formRegistrasi").bootstrapValidator({
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
             notEmpty: {
               message: "nomor induk kependudukan tidak boleh kosong"
             },
             stringLength: {
                min: 16,
                max: 16,
                message: 'Panjang karakter harus 16 karakter'
            },
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
             notEmpty: {
               message: "tempat lahir tidak boleh kosong"
             },
           }
         },
         tanggallahir: {
           validators: {
             notEmpty: {
               message: "tangggal lahir tidak boleh kosong"
             },
           }
         },
         nohp: {
           validators: {
             notEmpty: {
               message: "nomor telepon / whatsapp tidak boleh kosong"
             },
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
          validators:{
            stringLength: {
                min: 6,
                max: 25,
                message: 'Panjang karakter minimal 6 sd 25 karakter'
            },
            callback: {
                            message: 'Password tidak boleh kosong',
                            callback: function (value, validator, password) {

                                if ( $('#password').val()=='') {
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

       }
     });
    
  </script>