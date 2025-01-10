<div class="modal fade" id="modalCetakAktaBaptis" tabindex="-1" aria-labelledby="modalCetakAktaBaptisLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCetakAktaBaptisLabel">Cetak Akta Baptis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="modalIdAkta" id="modalIdAkta">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label">Tanggal Cetak</label>
                                <div class="col-md-5">
                                    <input type="date" name="tglcetak" id="tglcetak" class="form-control" value="<?php echo date('Y-m-d') ?>">
                                </div>
                                <label for="" class="col-md-2 col-form-label text-right">Cetakan Ke</label>
                                <div class="col-md-2">
                                    <input type="number" name="cetakanke" id="cetakanke" class="form-control" min="1" placeholder="1" value="1">
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Keterangan/ Alasan Cetak</label>
                                <textarea name="keterangancetak" id="keterangancetak" class="form-control" rows="3" placeholder="Keterangan cetak/ cetak ulang"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnModalCetakAktaBaptis"><i class="fa fa-print mr-1"></i>Cetak</button>
            </div>
        </div>
    </div>
</div>


<script>
    function loadModalCetakAktaBaptis(idakta) {
        $('#modalIdAkta').val(idakta);

        $.ajax({
                url: '<?= site_url('aktabaptisan/getJumlahCetak') ?>',
                type: 'GET',
                dataType: 'json',
                data: {
                    'idakta': idakta
                },
            })
            .done(function(resultCetakanKe) {
                $('#cetakanke').val(resultCetakanKe);
                $('#modalCetakAktaBaptis').modal('show');
            })
            .fail(function() {
                console.log('error getJumlahCetak');
            });

    }

    $('#modalCetakAktaBaptis').on('click', '#btnModalCetakAktaBaptis', function(e) {
        e.preventDefault();
        var modalIdAkta = $('#modalIdAkta').val();
        var tglcetak = $('#tglcetak').val();
        var cetakanke = $('#cetakanke').val();
        var keterangancetak = $('#keterangancetak').val();

        if (parseInt(cetakanke) > 1 && keterangancetak == "") {
            swal("Informasi", "Ini bukan cetakan pertama, Alasan cetak harus diisi!", "info");
            return;
        }

        $.ajax({
                url: '<?= site_url('aktabaptisan/addriwayatcetak') ?>',
                type: 'GET',
                dataType: 'json',
                data: {
                    'idakta': modalIdAkta,
                    'tglcetak': tglcetak,
                    'cetakanke': cetakanke,
                    'keterangancetak': keterangancetak
                },
            })
            .done(function(addriwayatcetak) {
                console.log('success');
                if (addriwayatcetak.success) {
                    $('#modalCetakAktaBaptis').modal('hide');
                    window.open(addriwayatcetak.urlCetak, "_blank");
                } else {
                    swal("Informasi", addriwayatcetak.msg, "info");
                }
            })
            .fail(function() {
                console.log('error addriwayatcetak');
            });
    });
</script>