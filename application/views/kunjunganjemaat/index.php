<?php $this->load->view('template/festavalive/header'); ?>

<body>

    <main>



        <?php $this->load->view('template/festavalive/topmenu'); ?>


        <section class="about-section section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-12 mb-4 mb-lg-0">
                        <h2 class="text-white text-center mb-4 mt-3">KUNJUNGAN JEMAAT</h2>
                    </div>

                </div>
            </div>
        </section>



        <section class="page-content section-padding">
            <div class="container">
                <div class="row justify-content-center">

                    <?php if ($rsKunjunganJemaat->num_rows() > 0) { ?>

                        <div class="col-12 p-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5>Status Kunjungan Jemaat</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="<?php echo site_url('kunjunganjemaat/tambah') ?>" class="btn btn-primary float-end"><i class="fa fa-plus"></i> Tambah Permohonan Kunjungan Jemaat</a>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="col-12 mt-3 d-none d-md-block">
                                    <table class="table table-condesed text-sm table-jadwal">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%; text-align: center;">No</th>
                                                <th style="width: 15%; text-align: center;">Tanggal Permohonan</th>
                                                <th style="text-align: left;">Keterangan</th>
                                                <th style="width: 15%; text-align: center;">No HP</th>
                                                <th style="width: 15%; text-align: center;">Status Permohonan</th>
                                                <th style="width: 15%; text-align: center;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($rsKunjunganJemaat->num_rows() > 0) {
                                                $no = 1;
                                                foreach ($rsKunjunganJemaat->result() as $row) {

                                                    switch ($row->status) {
                                                        case 'Disetujui':
                                                            $status = '<span class="badge bg-success">' . $row->status . '</span>';
                                                            break;
                                                        case 'Ditolak':
                                                            $status = '<span class="badge bg-danger">' . $row->status . '</span>';
                                                            break;
                                                        default:
                                                            $status = '<span class="badge bg-warning">' . $row->status . '</span>';
                                                            break;
                                                    }

                                                    if ($row->status == 'Permohonan') {
                                                        $tombol = '<a href="' . site_url('kunjunganjemaat/hapus/' . $this->encrypt->encode($row->idkunjunganjemaat)) . '" class="btn btn-danger btn-hapus"><i class="fa fa-trash"></i></a>
                                                        <a href="' . site_url('kunjunganjemaat/edit/' . $this->encrypt->encode($row->idkunjunganjemaat)) . '" class="btn btn-warning"><i class="fa fa-edit"></i> Ubah</a>';
                                                    } else {
                                                        $tombol = '';
                                                    }


                                                    echo '
                                                <tr>
                                                    <td style="text-align: center;">' . $no++ . '</td>
                                                    <td style="text-align: center;">' . tglindonesia($row->tglinsert) . '</td>
                                                    <td style="text-align: left;">' . $row->keterangankunjungan . '<br><small> Alamat: ' . $row->alamatjemaat . '</small></td>
                                                    <td style="text-align: center;">' . $row->nohpyangbisadihubungi . '</td>
                                                    <td style="text-align: center;">' . $status . '</td>
                                                    <td style="text-align: center;">
                                                        ' . $tombol . '
                                                    </td>
                                                </tr>
                                                    ';

                                                    if ($row->status == 'Disetujui') {
                                                        echo '
                                                        <tr>
                                                            <td style="text-align: center;" colspan="6">
                                                                    STATUS : ' . $status . '<br>
                                                                    Nama Pelayan : ' . $row->namapenanggungjawab . '<br>
                                                                    Tgl Rencana Kunjungan : ' . formatHariTanggal($row->tglkunjungan) . '<br>
                                                                    Keterangan : ' . $row->keteranganadmin . '<br>
                                                            </td>
                                                        </tr>

                                                        ';
                                                    }

                                                    if ($row->status == 'Ditolak') {
                                                        echo '
                                                        <tr>
                                                            <td style="text-align: center;" colspan="6">
                                                                    STATUS : ' . $status . '<br>
                                                                    Keterangan : ' . $row->keteranganadmin . '<br>
                                                            </td>
                                                        </tr>

                                                        ';
                                                    }
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>


                                <div class="col-12 mt-3 d-md-none d-sm-block">
                                    <div class="row">

                                        <?php
                                        if ($rsKunjunganJemaat->num_rows() > 0) {
                                            $no = 1;
                                            foreach ($rsKunjunganJemaat->result() as $row) {

                                                switch ($row->status) {
                                                    case 'Disetujui':
                                                        $status = '<span class="badge bg-success">' . $row->status . '</span>';
                                                        break;
                                                    case 'Ditolak':
                                                        $status = '<span class="badge bg-danger">' . $row->status . '</span>';
                                                        break;
                                                    default:
                                                        $status = '<span class="badge bg-warning">' . $row->status . '</span>';
                                                        break;
                                                }

                                                if ($row->status == 'Permohonan') {
                                                    $tombol = '
                                                    <a href="' . site_url('kunjunganjemaat/edit/' . $this->encrypt->encode($row->idkunjunganjemaat)) . '" class="btn btn-sm btn-warning float-end ms-1"><i class="fa fa-edit"></i> Ubah</a>
                                                    <a href="' . site_url('kunjunganjemaat/hapus/' . $this->encrypt->encode($row->idkunjunganjemaat)) . '" class="btn btn-sm btn-danger btn-hapus float-end"><i class="fa fa-trash"></i></a>
                                                    
                                                    ';
                                                } else {
                                                    $tombol = '';
                                                }


                                                echo '
                                                        <div class="col-12 mb-3">
                                                            <div class="card">
                                                                <div class="card-body card-mobile">
                                                                    <div class="form-group row">
                                                                        <div class="col-12" class="judul">
                                                                            <h5>' . tglindonesia($row->tglinsert) . '</h5>
                                                                        </div>
                                                                        <div class="col-12 sub-judul"></div>
                                                                        <div class="col-12 judul-content">
                                                                            Keterangan
                                                                        </div>
                                                                        <div class="col-12 isi-content">
                                                                            ' . $row->keterangankunjungan . '
                                                                        </div>
                
                                                                        <div class="col-12">
                                                                            <span>Status: ' . $status . '</span>
                                                                        </div>
                                                                        <div class="col-12 mt-1 text-right">
                                                                            ' . $tombol . '  
                                                                        </div>
                
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                ';
                                            }
                                        }
                                        ?>

                                    </div>

                                </div>


                            </div>
                        </div>


                    <?php  } else { ?>

                        <div class="col-12 p-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5>Anda belum memiliki riwayat kunjungan. Ingin menambahkan nya sekarang?</h5>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <a href="<?php echo site_url('kunjunganjemaat/tambah') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Permohonan Kunjungan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>




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