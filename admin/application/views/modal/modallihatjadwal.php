<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modallihatjadwal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Informasi Penjadwalan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-sm">
                            <table class="table" width="100%">
                                <tbody class="" id="tbodymodallihatjadwal">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-12 text-lg mb-3">
                                    Informasi Logistik Yang Digunakan
                                </div>
                                <div class="col-12 text-sm">
                                    <table class="table" width="100%">

                                        <tbody class="" id="tbodymodallihatjadwalinventaris">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-12 text-lg mb-3">
                                    Informasi Lihat Ruangan Yang Digunaakn
                                </div>
                                <div class="col-12 text-sm">
                                    <table class="table" width="100%">
                                        <tbody class="" id="tbodymodallihatjadwalruangan">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-12 text-lg mb-3">
                                    Pelayanan Yang Diperlukan
                                </div>
                                <div class="col-12 text-sm">
                                    <table class="table" width="100%">
                                        <tbody class="" id="tbodymodallihatjadwalpelayanan">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-12 text-lg mb-3">
                                    Parkiran Yang Diperlukan
                                </div>
                                <div class="col-12 text-sm">
                                    <table class="table" width="100%">
                                        <tbody class="" id="tbodymodallihatjadwalparkiran">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>

    </div>
</div>

<script>
    function loadmodallihatjadwal(varidjadwalevent) {
        if (varidjadwalevent == "") {
            return;
        }

        $.ajax({
                url: '<?= site_url('Ajax/getjadwalevent') ?>',
                type: 'GET',
                dataType: 'json',
                data: {
                    'idjadwalevent': varidjadwalevent
                },
            })
            .done(function(response_getjadwalevent) {
                // console.log(response_getjadwalevent);

                var jadwalEvent = response_getjadwalevent.jadwalEvent;
                var detailInventaris = response_getjadwalevent.detailInventaris;

                $('#tbodymodallihatjadwal').empty();

                var tglkonfirmasi = jadwalEvent['tglkonfirmasi'];
                if (tglkonfirmasi == null) {
                    console.log(tglkonfirmasi)
                    tglkonfirmasi = '-';
                } else {
                    tglkonfirmasi = tgldmy(tglkonfirmasi);
                }

                var keterangankonfirmasi = jadwalEvent['keterangankonfirmasi'];
                if (keterangankonfirmasi == null) {
                    keterangankonfirmasi = '-';
                }

                var addText = `
                    <tr>
                        <td style="width: 15%; text-align: left; padding: 0px;">Nama Event</td>
                        <td style="width: 5%; text-align: center; padding: 0px;">:</td>
                        <td style="width: 25%; text-align: left; padding: 0px;">` + jadwalEvent['namaevent'] + `</td>
                    </tr>
                    <tr>
                        <td style="width: 15%; text-align: left; padding: 0px;">Jenis Jadwal</td>
                        <td style="width: 5%; text-align: center; padding: 0px;">:</td>
                        <td style="width: 25%; text-align: left; padding: 0px;">` + jadwalEvent['jenisjadwal'] + `</td>
                    </tr>
                    <tr>
                        <td style="width: 15%; text-align: left; padding: 0px;">Deskripsi</td>
                        <td style="width: 5%; text-align: center; padding: 0px;">:</td>
                        <td style="width: 25%; text-align: left; padding: 0px;">` + jadwalEvent['deskripsi'] + `</td>
                    </tr>
                    <tr>
                        <td style="width: 15%; text-align: left; padding: 0px;">Status Konfirmasi</td>
                        <td style="width: 5%; text-align: center; padding: 0px;">:</td>
                        <td style="width: 25%; text-align: left; padding: 0px;">` + jadwalEvent['statuskonfirmasi'] + `</td>
                    </tr>
                    <tr>
                        <td style="width: 15%; text-align: left; padding: 0px;">Tanggal Konfirmasi</td>
                        <td style="width: 5%; text-align: center; padding: 0px;">:</td>
                        <td style="width: 25%; text-align: left; padding: 0px;">` + tglkonfirmasi + `</td>
                    </tr>
                    <tr>
                        <td style="width: 15%; text-align: left; padding: 0px;">Keterangan Konfirmasi</td>
                        <td style="width: 5%; text-align: center; padding: 0px;">:</td>
                        <td style="width: 25%; text-align: left; padding: 0px;">` + keterangankonfirmasi + `</td>
                    </tr>
                `;
                $('#tbodymodallihatjadwal').append(addText);


                if (detailInventaris.length > 0) {
                    $('#tbodymodallihatjadwalinventaris').empty();
                    for (var i = 0; i < detailInventaris.length; i++) {
                        // console.log(detailInventaris[i]);

                        var addText = `
                                    <tr>
                                        <td style="text-align: left; padding: 0px;">` + detailInventaris[i]['namainventaris'] + `</td>
                                        <td style="text-align: left; padding: 0px;">` + detailInventaris[i]['qty'] + ` ` + detailInventaris[i]['satuan'] + `</td>
                                    </tr>
                                `;
                        $('#tbodymodallihatjadwalinventaris').append(addText);
                    }

                }

                var detailRuangan = response_getjadwalevent.detailRuangan;
                if (detailRuangan.length > 0) {
                    $('#tbodymodallihatjadwalruangan').empty();
                    for (var i = 0; i < detailRuangan.length; i++) {
                        // console.log(detailRuangan[i]);

                        var addText = `
                                    <tr>
                                        <td style="text-align: left; padding: 0px;">` + detailRuangan[i]['namaruangan'] + `</td>
                                    </tr>
                                `;
                        $('#tbodymodallihatjadwalruangan').append(addText);
                    }

                } else {
                    $('#tbodymodallihatjadwalruangan').empty();
                    var addText = `
                                    <tr>
                                        <td style="text-align: left; padding: 0px;">Data tidak ada..</td>
                                    </tr>
                                `;
                    $('#tbodymodallihatjadwalruangan').append(addText);
                }


                var detailPelayanan = response_getjadwalevent.detailPelayanan;
                if (detailPelayanan.length > 0) {
                    $('#tbodymodallihatjadwalpelayanan').empty();
                    for (var i = 0; i < detailPelayanan.length; i++) {
                        // console.log(detailPelayanan[i]);

                        var addText = `
                                    <tr>
                                        <td style="text-align: left; padding: 0px;">` + detailPelayanan[i]['namapelayanan'] + `</td>
                                    </tr>
                                `;
                        $('#tbodymodallihatjadwalpelayanan').append(addText);
                    }

                } else {
                    $('#tbodymodallihatjadwalpelayanan').empty();
                    var addText = `
                                    <tr>
                                        <td style="text-align: left; padding: 0px;">Data tidak ada..</td>
                                    </tr>
                                `;
                    $('#tbodymodallihatjadwalpelayanan').append(addText);
                }


                var detailParkiran = response_getjadwalevent.detailParkiran;
                if (detailParkiran.length > 0) {
                    $('#tbodymodallihatjadwalparkiran').empty();
                    for (var i = 0; i < detailParkiran.length; i++) {
                        // console.log(detailParkiran[i]);

                        var addText = `
                                    <tr>
                                        <td style="text-align: left; padding: 0px;">` + detailParkiran[i]['namaparkiran'] + `</td>
                                    </tr>
                                `;
                        $('#tbodymodallihatjadwalparkiran').append(addText);
                    }

                } else {
                    $('#tbodymodallihatjadwalparkiran').empty();
                    var addText = `
                                    <tr>
                                        <td style="text-align: left; padding: 0px;">Data tidak ada..</td>
                                    </tr>
                                `;
                    $('#tbodymodallihatjadwalparkiran').append(addText);
                }

            })
            .fail(function() {
                console.log('error getjadwalevent');
            });

        $('#modallihatjadwal').modal('show');

    }
</script>