<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalRiwayatCetak">
    <div class="modal-dialog modal-lg-50">
        <div class="modal-content">

            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-10 offset-md-1" id="elemCardRiwayat">

                            <style>
                                ul.timeline {
                                    list-style-type: none;
                                    position: relative;
                                }

                                ul.timeline:before {
                                    content: ' ';
                                    background: #d4d9df;
                                    display: inline-block;
                                    position: absolute;
                                    left: 29px;
                                    width: 2px;
                                    height: 100%;
                                    z-index: 400;
                                }

                                ul.timeline>li {
                                    margin: 20px 0;
                                    padding-left: 60px;
                                }

                                ul.timeline>li:before {
                                    content: ' ';
                                    background: white;
                                    display: inline-block;
                                    position: absolute;
                                    border-radius: 50%;
                                    border: 3px solid #22c0e8;
                                    left: 20px;
                                    width: 20px;
                                    height: 20px;
                                    z-index: 400;
                                }

                                ul.timeline .namastatusriwayat {
                                    font-weight: bold;
                                }

                                ul.timeline .tglstatusriwayat {
                                    /* font-weight: bold; */
                                }
                            </style>

                            <h3 id="perihalRiwayat"></h3>
                            <h5 class="badge badge-success" id="h5statusdokumenRiwayat">TEST</h5>
                            <ul class="timeline">
                                <li>
                                    <span class="namastatusriwayat">New Web Design</span>
                                    <span class="tglstatusriwayat float-right">21 March, 2014</span>
                                    <p class="deskripsistatusriwayat">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....</p>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 mt-3 mb-3">
                            <button class="btn btn-primary float-right" id="btnCetakRiwayat"><i class="fa fa-print mr-1"></i>Cetak Riwayat</button>
                            <button class="btn btn-default float-right mr-1" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function loadmodalRiwayatCetak(idakta) {
        $('#modalRiwayatCetak').modal('show');

        $.ajax({
                url: '<?= site_url('aktabaptisan/getAktaID') ?>',
                type: 'GET',
                dataType: 'json',
                data: {
                    'idakta': idakta
                },
            })
            .done(function(response) {
                console.log(response);
                $('#perihalRiwayat').html(response['namalengkap']);
                $('#h5statusdokumenRiwayat').html('Nomor Akta: ' + response['noakta'] + ', Tgl Akta: ' + tgldmy(response['tglakta']));
            })
            .fail(function() {
                console.log('error getAktaID');
            });


        $('.timeline').empty();
        $.ajax({
                url: '<?= site_url('aktabaptisan/getRiwayatCetak') ?>',
                type: 'GET',
                dataType: 'json',
                data: {
                    'idakta': idakta
                },
            })
            .done(function(getRiwayatCetakResult) {
                // console.log(getRiwayatCetakResult);
                if (getRiwayatCetakResult.length > 0) {
                    for (var i = 0; i < getRiwayatCetakResult.length; i++) {
                        // console.log(getRiwayatCetakResult[i]);
                        var addText = `
                        <li>
                            <span class="namastatusriwayat">Cetakan Ke-` + getRiwayatCetakResult[i]['cetakanke'] + `</span>
                            <span class="tglstatusriwayat float-right">` + tgldmy(getRiwayatCetakResult[i]['tglcetak']) + `</span>
                            <p class="deskripsistatusriwayat">` + getRiwayatCetakResult[i]['alasancetak'] + `</p>
                        </li>
                    `;

                        $('.timeline').append(addText);
                    }
                }
            })
            .fail(function() {
                console.log('error getRiwayatCetak');
            });
    }

    $(document).on('click', '#btnCetakRiwayat', function(e) {
        e.preventDefault();
        PrintElem('elemCardRiwayat');
    });

    function PrintElem(elem) {
        var mywindow = window.open('', 'PRINT', 'height=400,width=600');
        mywindow.document.write('<html><head>');
        mywindow.document.write('</head><body >');
        mywindow.document.write(document.getElementById(elem).innerHTML);
        mywindow.document.write('</body></html>');
        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10*/
        mywindow.print();
        mywindow.close();
        return true;
    }
</script>