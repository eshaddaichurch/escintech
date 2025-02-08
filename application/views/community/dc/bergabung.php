<?php $this->load->view('template/festavalive/header'); ?>

<body>

    <main>



        <?php $this->load->view('template/festavalive/topmenu'); ?>


        <section class="about-section section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-12 mb-4 mb-lg-0">
                        <h2 class="text-white text-center mb-4 mt-3">Disciples Community</h2>
                    </div>

                </div>
            </div>
        </section>



        <section class="page-content section-padding">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-12 p-5">
                        <form action="<?php echo site_url('disciples_community/simpanpermohonanbergabung') ?>" method="POST" id="form">

                            <div class="row">
                                <div class="col-md-12 mb-5 text-center">
                                    <h5 id="lbljudul">Form Permohonan Bergabung Dengan Disciples Community</h5>
                                    <h3><?php echo $rowDC->namadc ?></h3>
                                </div>
                                <div class="col-12 mb-4">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td style="width: 25%;">Nama DM</td>
                                                <td style="width: 5%; text-align: center;">:</td>
                                                <td style="width: 70%;"><?php echo $rowDC->namadm ?></td>                                                
                                            </tr>
                                            <tr>
                                                <td style="width: 25%;">Alamat DC</td>
                                                <td style="width: 5%; text-align: center;">:</td>
                                                <td style="width: 70%;"><?php echo $rowDC->alamatdc ?></td>                                                
                                            </tr>
                                            <tr>
                                                <td style="width: 25%;">Kategori</td>
                                                <td style="width: 5%; text-align: center;">:</td>
                                                <td style="width: 70%;"><?php echo $rowDC->kategoridc ?></td>                                                
                                            </tr>
                                            <tr>
                                                <td style="width: 25%;">Hari</td>
                                                <td style="width: 5%; text-align: center;">:</td>
                                                <td style="width: 70%;"><?php echo $rowDC->haridc . ', Pukul: '. $rowDC->jamdc ?></td>                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12">
                                    <input type="hidden" name="iddc" id="iddc" value="<?php echo $iddc; ?>">

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-md-4">Alasan Ingin Bergabung</label>
                                        <div class="col-md-8">
                                            <textarea name="keteranganpermohonan" id="keteranganpermohonan" class="form-control" rows="5" placeholder="Alasan ingin bergabung (Optional)"></textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 text-center mt-5 d-none d-md-block">
                                    <a href="<?php echo site_url('disciples_community/list') ?>" class="btn btn-default mr-1">Kembali</a>
                                    <button type="button" class="btn btn-primary btn-permohonan"><i class="fa fa-save"></i> Ajukan Permohonan</button>
                                </div>
                                <div class="col-12 text-center mt-5 d-md-none d-sm-block">
                                    <button type="button" class="btn btn-primary btn-permohonan"><i class="fa fa-save"></i> Ajukan Permohonan</button>
                                    <a href="<?php echo site_url('disciples_community/list') ?>" class="btn btn-default mr-1">Kembali</a>
                                </div>



                            </div>
                        </form>
                    </div>




                </div>
            </div>
        </section>






    </main>


    <?php $this->load->view('template/festavalive/footer'); ?>

    <script>
        $(document).ready(function() {

        });
    </script>

</body>

<script>
    $(document).on('click', '.btn-permohonan', function(e) {
        e.preventDefault();

        swal({
                title: "Kirim Permohonan?",
                text: "Apakah anda ingin mengajukan permohonan permohonan ini?",
                icon: "warning",
                buttons: ["Batal", "Ya"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    console.log("test");
                    $('#form').submit();
                }
            });
    });
</script>

</html>