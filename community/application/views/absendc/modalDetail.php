<div class="modal" tabindex="-1" id="modalDetail">
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
                            <img src="<?php echo base_url('images/nofoto.png') ?>" alt="" class="rounded" style="width: 80%;" id="fotoAbsen">
                        </div>
                        <div class="col-12 text-center mb-3">
                            <label for="">KETERANGAN:</label><br>
                            <span id="lblKeterangan"></span>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="">Daftar Hadir</label>
                        </div>
                        <div class="col-12">
                            <table class="table table-spacenol">
                                <tbody id="tbodyAbsen">
                                    <tr>
                                        <td style="Width: 25%;"><i class="fa fa-check-circle text-success"></i> abd</td>
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

    function loadmodalDetail(idabsen) {
        $('#modalDetail').modal('show');
        $('#tbodyAbsen').empty();

        $.ajax({
                url: '<?= site_url('absendc/getDetailAbsen') ?>',
                type: 'GET',
                dataType: 'json',
                data: {
                    'idabsen': idabsen
                },
            })
            .done(function(response) {
                // console.log(response);
                var dataHeader = response.dataHeader;
                var dataDetail = response.dataDetail;

                $('.modal-title').html(dataHeader['tglabsen']);
                $('#fotoAbsen').attr('src', dataHeader['foto']);
                $('#lblKeterangan').html(dataHeader['keterangan'])

                if (dataDetail.length > 0) {
                    for (var i = 0; i < dataDetail.length; i++) {
                        console.log(dataDetail[i]['namalengkap']);

                        var addText = `<tr>
                                            <td style="Width: 25%;"><i class="fa fa-check-circle text-success"></i> ` + dataDetail[i]['namalengkap'] + `</td>
                                        </tr>`;
                        $('#tbodyAbsen').append(addText);

                    }
                }
            })
            .fail(function() {
                console.log('error');
            });
    }
</script>