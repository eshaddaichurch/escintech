<?php $this->load->view('template/festavalive/header'); ?>

<body>

    <main>



        <?php $this->load->view('template/festavalive/topmenu'); ?>


        <section class="about-section section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-12 mb-4 mb-lg-0">
                        <h2 class="text-white text-center mb-4 mt-3">Kelas Saya</h2>
                    </div>

                </div>
            </div>
        </section>



        <section class="page-content section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h5>List Kelas Yang Telah Diikuti</h5>
                        <hr>
                    </div>
                    <div class="col-12 pt-3">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Kelas</th>
                                    <th style="width: 10%; text-align: center;">Status</th>
                                    <th style="width: 15%; text-align: center;">Tgl Kelulusan</th>
                                    <th style="width: 20%; text-align: center;">#</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyinfokelas">
                                <?php
                                if ($rskelas->num_rows() > 0) {
                                    foreach ($rskelas->result() as $row) {

                                        $kelas_slug = $this->db->query("select * from kelas where idkelas='" . $row->idkelas . "'")->row()->kelas_slug;

                                        if (empty($row->tglsertifikat)) {
                                            $tglsertifikat = '';
                                        } else {
                                            $tglsertifikat = tglindonesia($row->tglsertifikat);
                                        }

                                        $btnAksi = '';
                                        if ($row->statuslulus == '1') {
                                            $statuslulus = '<i class="fa fa-check text-success"></i>';
                                            $btnAksi = '<a href="' . site_url('akun/sertifikat/' . $row->idregistrasikelas) . '" class="btn btn-sm bg-escbg" target="_blank">Lihat Sertifikat</a>';
                                        } else {
                                            $statuslulus = '<i class="fas fa-times text-danger"></i>';
                                            $btnAksi = '<a href="' . site_url('nextstep/kelas/' . $kelas_slug . '/') . '" class="btn btn-sm btn-primary">Registrasi Kelas</a>';
                                        }


                                        echo '
                                            <tr>
                                                <td style="">' . $row->namakelas . '</td>
                                                <td style="text-align: center;">' . $statuslulus . '</td>
                                                <td style="text-align: center;">' . $tglsertifikat . '</td>
                                                <td style="text-align: center;">' . $btnAksi . '</td>
                                            </tr>
                                            ';
                                    }
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