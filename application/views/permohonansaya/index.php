<?php $this->load->view('template/festavalive/header'); ?>

<body>

    <main>



        <?php $this->load->view('template/festavalive/topmenu'); ?>


        <section class="about-section section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-12 mb-4 mb-lg-0">
                        <h2 class="text-white text-center mb-4 mt-3">Permohonan Saya</h2>
                    </div>

                </div>
            </div>
        </section>



        <section class="page-content section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h5>List Permohonan Saya</h5>
                        <hr>

                    </div>
                    <div class="col-12 pt-3">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 5%; text-align: center;">No</th>
                                    <th style="width: 25%; text-align: center;">Jenis Permohonan</th>
                                    <th style="width: 15%; text-align: center;">Tanggal Permohonan</th>
                                    <th style="text-align: center;">Status</th>
                                    <th style="width: 10%; text-align: center; display: none;">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($rsPermohonan->num_rows() > 0) {
                                    $no = 1;
                                    foreach ($rsPermohonan->result() as $row) {
                                        echo '
                                        <tr>
                                            <td style="text-align: center;">' . $no++ . '</td>
                                            <td style="text-align: center;">' . $row->jenispermohonan . '</td>
                                            <td style="text-align: center;">' . $row->tglpermohonan . '</td>
                                            <td style="text-align: center;">' . $row->statuspermohonan . '</td>
                                            <td style="text-align: center; display: none;"><button class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button></td>
                                        </tr>
                                        ';
                                    }
                                } else {
                                    echo '
                                        <tr>
                                            <td colspan="5" style="text-align: center;">Permohonan pelayanan belum ada..</td>
                                        </tr>
                                        ';
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>




                </div>
            </div>
        </section>






    </main>


    <?php $this->load->view('template/festavalive/footer'); ?>

    <script>

    </script>

</body>

</html>