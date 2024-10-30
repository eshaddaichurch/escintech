  <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" id="loginModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-body">

          <form action="<?php echo site_url('login/cek_login') ?>" method="post" id="formLogin">

            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="form-group row">
                    <div class="col-4 col-md-2">
                      <img src="<?php echo base_url('images/icon.png') ?>" alt="" style="width: 50px;">
                    </div>
                    <div class="col-8 col-md-10">
                      <h4>Welcome</h4>
                      <p>Login to myesc </p>
                    </div>
                  </div>
                </div>
                <div class="col-12">



                  <div class="form-group row mt-5 p-1">
                    <label for="" class="col-md-4 col-form-label">Email</label>
                    <div class="col-md-8">
                      <input type="text" name="emaillogin" id="emaillogin" class="form-control" placeholder="example@gmail.com">
                    </div>
                  </div>
                  <div class="form-group row p-1">
                    <label for="" class="col-md-4 col-form-label">Password</label>
                    <div class="col-md-8">
                      <input type="password" name="passwordlogin" id="passwordlogin" class="form-control" placeholder="************">
                    </div>
                  </div>

                </div>
                <div class="col-12 mt-5 mb-3" style="font-size: 12px;">
                  <a href="">Forgot Password?</a>
                </div>

                <div class="col-12 mb-3" style="font-size: 12px;">
                  <a href="#" class="show-form-registrasi">Not a member yet? Register now.</a>
                </div>

                <div class="col-12" style="font-size: 12px;" id="divAlert">

                </div>

                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary float-end" id="btnLogin">Login Now</button>
                  <button type="button" class="btn btn-secondary float-end me-2" data-bs-dismiss="modal">Cancel</button>
                </div>
              </div>
            </div>

          </form>


        </div>

      </div>
    </div>
  </div>


  <script>
    $("#formLogin").bootstrapValidator({
      feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
        emaillogin: {
          validators: {
            notEmpty: {
              message: "Please enter your email"
            },
          }
        },
        passwordlogin: {
          validators: {
            notEmpty: {
              message: "Please  enter your password"
            },
          }
        },
      }
    }).on('success.form.bv', function(e) {
      e.preventDefault();
      var email = $("#emaillogin").val();
      var password = $("#passwordlogin").val();

      // console.log(password);

      $.ajax({
          url: '<?php echo site_url('login/cekLoginAjax') ?>',
          type: 'POST',
          dataType: 'json',
          data: {
            'email': email,
            'password': password
          },
        })
        .done(function(cekLoginResult) {
          console.log("success");
          if (cekLoginResult.success) {
            window.open("<?php echo site_url() ?>", "_self");
          } else {
            swal('Informasi', cekLoginResult.msg, 'info');
          }
        })
        .fail(function() {
          $('#divAlert').empty();
          var addText = `
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                          <i class="fas fa-exclamation-triangle"></i> 
                          <div>
                            error script!
                          </div>
                        </div>
              `;
          $('#divAlert').html(addText)
        })
    });


    // $('#btnLogin').click(function(event) {
    //   e.preventDefault();
    //   var email = $("#emaillogin").val();
    //   var password = $("#password").val();
    //   $.ajax({
    //     url: '<?php echo site_url('login/cekLogin') ?>',
    //     type: 'POST',
    //     dataType: 'json',
    //     data: {'email': email, 'password': password},
    //   })
    //   .done(function(cekLoginResult) {
    //     console.log("success");
    //     if (cekLoginResult.success) {

    //     }else{
    //       $('#divAlert').empty();
    //       var addText = `
    //                 <div class="alert alert-danger d-flex align-items-center" role="alert">
    //                   <i class="fas fa-exclamation-triangle"></i> 
    //                   <div>
    //                     `+cekLoginResult.msg+`
    //                   </div>
    //                 </div>
    //       `;
    //       $('#divAlert').html(addText)
    //     }
    //   })
    //   .fail(function() {
    //     console.log("error");
    //   })

    // });
  </script>