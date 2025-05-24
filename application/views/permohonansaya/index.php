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
                                    <th style="width: 10%; text-align: center;">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($rsPermohonan->num_rows() > 0) {
                                    $no = 1;
                                    foreach ($rsPermohonan->result() as $row) {

                                        if ($row->statuspermohonan == 'Disetujui') {
                                            $btnEdit = '';
                                            $btnHapus = '';
                                        } else {

                                            switch ($row->jenispermohonan) {
                                                case 'Permohonan Baptisan':
                                                    $btnEdit = '<a href="' . site_url('baptisan/edit/' . $this->encrypt->encode($row->id)) . '" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>';
                                                    $btnHapus = '<a href="' . site_url('baptisan/hapus/' . $this->encrypt->encode($row->id)) . '" class="btn btn-sm btn-danger btn-hapus"><i class="fa fa-trash"></i></a>';
                                                    break;
                                                case 'Pelayanan Kematian':
                                                    $btnEdit = '<a href="' . site_url('kematian/edit/' . $this->encrypt->encode($row->id)) . '" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>';
                                                    $btnHapus = '<a href="' . site_url('kematian/hapus/' . $this->encrypt->encode($row->id)) . '" class="btn btn-sm btn-danger btn-hapus"><i class="fa fa-trash"></i></a>';
                                                    break;
                                                case 'Konseling':
                                                    $btnEdit = '<a href="' . site_url('konseling/edit/' . $this->encrypt->encode($row->id)) . '" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>';
                                                    $btnHapus = '<a href="' . site_url('konseling/hapus/' . $this->encrypt->encode($row->id)) . '" class="btn btn-sm btn-danger btn-hapus"><i class="fa fa-trash"></i></a>';
                                                    break;
                                                case 'Kunjungan Jemaat':
                                                    $btnEdit = '<a href="' . site_url('kunjunganjemaat/edit/' . $this->encrypt->encode($row->id)) . '" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>';
                                                    $btnHapus = '<a href="' . site_url('kunjunganjemaat/hapus/' . $this->encrypt->encode($row->id)) . '" class="btn btn-sm btn-danger btn-hapus"><i class="fa fa-trash"></i></a>';
                                                    break;
                                                case 'Penyerahan Anak':
                                                    $btnEdit = '<a href="' . site_url('penyerahananak/edit/' . $this->encrypt->encode($row->id)) . '" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>';
                                                    $btnHapus = '<a href="' . site_url('penyerahananak/hapus/' . $this->encrypt->encode($row->id)) . '" class="btn btn-sm btn-danger btn-hapus"><i class="fa fa-trash"></i></a>';
                                                    break;
                                                case 'Pelayanan Doa':
                                                    $btnEdit = '<a href="' . site_url('permohonandoa/edit/' . $this->encrypt->encode($row->id)) . '" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>';
                                                    $btnHapus = '<a href="' . site_url('permohonandoa/hapus/' . $this->encrypt->encode($row->id)) . '" class="btn btn-sm btn-danger btn-hapus"><i class="fa fa-trash"></i></a>';
                                                    break;
                                                case 'Pernikahan':
                                                    $btnEdit = '<a href="' . site_url('pernikahan/edit/' . $this->encrypt->encode($row->id)) . '" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>';
                                                    $btnHapus = '<a href="' . site_url('pernikahan/hapus/' . $this->encrypt->encode($row->id)) . '" class="btn btn-sm btn-danger btn-hapus"><i class="fa fa-trash"></i></a>';
                                                    break;
                                                case 'Disciples Community':
                                                    $btnEdit = '';
                                                    $btnHapus = '';
                                                    break;
                                                default:
                                                    $btnEdit = '';
                                                    $btnHapus = '';
                                                    break;
                                            }
                                        }
                                        echo '
                                        <tr>
                                            <td style="text-align: center;">' . $no++ . '</td>
                                            <td style="text-align: center;">' . $row->jenispermohonan . '</td>
                                            <td style="text-align: center;">' . $row->tglpermohonan . '</td>
                                            <td style="text-align: center;">' . $row->statuspermohonan . '</td>
                                            <td style="text-align: center;">
                                                ' . $btnEdit . ((!empty($btnEdit)) ?  ' | ' : '') . $btnHapus . '</i>
                                            </td>
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
        $(document).on('click', '.btn-hapus', function(e) {
            var link = $(this).attr("href");
            e.preventDefault();

            swal({
                    title: "Hapus?",
                    text: "Apakah anda yakin akan menghapus permohonan ini?",
                    icon: "warning",
                    buttons: ["Batal", "Ya"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        document.location.href = link;
                    }
                });
        });
    </script>

</body>

</html>