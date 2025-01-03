<div class="modal" tabindex="-1" id="modalInfoJemaat">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Bambang Sutejo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 mb-3 text-center">
                            <img src="<?php echo base_url('images/user-01.png') ?>" alt="" class="rounded" style="width: 80%;">
                        </div>
                        <div class="col-12">
                            <table class="table table-spacenol">
                                <tbody>
                                    <tr>
                                        <td style="Width: 25%;">T. Lahir</td>
                                        <td style="Width: 5%;">:</td>
                                        <td style="Width: 70%;" id="mtempatlahir"></td>
                                    </tr>
                                    <tr>
                                        <td style="Width: 25%;">Umur</td>
                                        <td style="Width: 5%;">:</td>
                                        <td style="Width: 70%;" id="mumur"></td>
                                    </tr>
                                    <tr>
                                        <td style="Width: 25%;">J.Kelamin</td>
                                        <td style="Width: 5%;">:</td>
                                        <td style="Width: 70%;" id="mjeniskelamin"></td>
                                    </tr>
                                    <tr>
                                        <td style="Width: 25%;">Status</td>
                                        <td style="Width: 5%;">:</td>
                                        <td style="Width: 70%;" id="mstatuspernikahan"></td>
                                    </tr>
                                    <tr>
                                        <td style="Width: 25%;">Keluarga</td>
                                        <td style="Width: 5%;">:</td>
                                        <td style="Width: 70%;" id="mkeluarga">
                                            <!-- <i class="fa fa-hand-point-right"></i> Siti Susanti (Istri)
                                            <br><i class="fa fa-hand-point-right"></i> Budi (Anak) -->

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="Width: 25%;">No HP</td>
                                        <td style="Width: 5%;">:</td>
                                        <td style="Width: 70%;" id="mnohp"></td>
                                    </tr>
                                    <tr>
                                        <td style="Width: 25%;">Email</td>
                                        <td style="Width: 5%;">:</td>
                                        <td style="Width: 70%;" id="memail"></td>
                                    </tr>
                                    <tr>
                                        <td style="Width: 25%;">Alamat</td>
                                        <td style="Width: 5%;">:</td>
                                        <td style="Width: 70%;" id="malamatrumah"></td>
                                    </tr>
                                    <tr>
                                        <td style="Width: 25%;">Next Step</td>
                                        <td style="Width: 5%;">:</td>
                                        <td style="Width: 70%;" id="mnextstep">
                                            <!-- <i class="fa fa-check-circle text-success"></i> Fondation Class 1
                                            <br><i class="fa fa-check-circle text-success"></i> Fondation Class 2
                                            <br><i class="fa fa-check-circle text-success"></i> Fondation Class 3 -->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Kembali</button>
            </div>
        </div>
    </div>
</div>

<script>
    $.fn.modal.Constructor.prototype._enforceFocus = function() {};

    function loadModalInfoJemaat(idjemaatmodal, idjemaaencrypt) {
        // console.log(idjemaaencrypt);
        $('#modalInfoJemaat').modal('show');

        $.ajax({
                url: '<?= site_url('ajax/getInfoJemaat') ?>',
                type: 'GET',
                dataType: 'json',
                data: {
                    'idjemaat': idjemaatmodal
                },
            })
            .done(function(response) {
                console.log(response);
                var rowJemaat = response.rowJemaat;
                var arrNextStep = response.arrNextStep;
                var arrJemaatFamily = response.arrJemaatFamily;

                $('.modal-title').html(rowJemaat['namalengkap']);
                $('#mtempatlahir').html(rowJemaat['tempatlahir']);
                $('#mumur').html(rowJemaat['umur']);
                $('#mjeniskelamin').html(rowJemaat['jeniskelamin']);
                $('#mstatuspernikahan').html(rowJemaat['statuspernikahan']);
                $('#mnohp').html(rowJemaat['nohp']);
                $('#memail').html(rowJemaat['email']);
                $('#malamatrumah').html(rowJemaat['alamatrumah']);

                $('#mnextstep').empty();
                $('#mkeluarga').empty();

                if (arrNextStep.length > 0) {
                    for (var i = 0; i < arrNextStep.length; i++) {
                        // console.log(arrNextStep[i]);
                        var addText = '';
                        if (i > 0) {
                            addText += '<br>';
                        }
                        addText += '<i class="fa fa-check-circle text-success"></i> ' + arrNextStep[i]['namakelas'];
                        $('#mnextstep').append(addText);
                    }
                } else {
                    addText = '<i class="fa fa-times text-danger"></i> Belum ada kelas';
                    $('#mnextstep').html(addText);
                }

                if (arrJemaatFamily.length > 0) {
                    for (var i = 0; i < arrJemaatFamily.length; i++) {
                        // console.log(arrJemaatFamily[i]);
                        var addText = '';
                        if (i > 0) {
                            addText += '<br>';
                        }
                        addText += '<i class="fa fa-hand-point-right"></i> ' + arrJemaatFamily[i]['namalengkap'];
                        $('#mkeluarga').append(addText);
                    }
                }
            })
            .fail(function() {
                console.log('error');
            });
    }
</script>