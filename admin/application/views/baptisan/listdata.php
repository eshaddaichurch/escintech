<?php
$this->load->view("template/header");
$this->load->view("template/topmenu");
$this->load->view("template/sidemenu");

?>

<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Baptisan</h4>
    </div>
    <div class="col-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo (site_url()) ?>">Home</a></li>
            <li class="breadcrumb-item active">Baptisan</li>
        </ol>

    </div>
</div>

<div class="row" id="toni-content">
    <div class="col-md-12">
        <div class="card" id="cardcontent">
            <div class="card-header">
                <h5 class="card-title">List Data Permohonan Baptisan</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        $pesan = $this->session->flashdata("pesan");
                        if (!empty($pesan)) {
                            echo $pesan;
                        }
                        ?>
                    </div>
                    <div class="col-md-12">
                        <!-- datatable -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-condesed" id="table">
                                <thead>
                                    <tr class="bg-primary" style="">
                                        <th style="width: 5%; text-align: center;">No</th>
                                        <th style="text-align: left;">Nama Jemaat</th>
                                        <th style="text-align: center;">Tgl Permohonan</th>
                                        <th style="text-align: center;">Email</th>
                                        <th style="text-align: center;">No HP</th>
                                        <th style="text-align: center;">Status Permohonan</th>
                                        <th style="text-align: center; width: 10%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>



                </div> <!-- /.row -->
            </div> <!-- ./card-body -->
        </div> <!-- /.card -->
    </div> <!-- /.col -->
</div> <!-- /.row -->
<!-- Main row -->




<?php $this->load->view("template/footer") ?>



<script type="text/javascript">
    var table;

    $(document).ready(function() {

        //defenisi datatable
        table = $("#table").DataTable({
            "select": true,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?php echo site_url('baptisan/datatablesource') ?>",
                "type": "POST"
            },
            "columnDefs": [{
                    "targets": [0],
                    "orderable": false,
                    "className": "dt-body-center"
                },
                {
                    "targets": [1],
                    "className": "dt-body-center"
                },
                {
                    "targets": [2],
                    "className": "dt-body-left"
                },
                {
                    "targets": [3],
                    "className": "dt-body-center"
                },
                {
                    "targets": [4],
                    "className": "dt-body-center"
                },
                {
                    "targets": [5],
                    "className": "dt-body-center"
                },
                {
                    "targets": [6],
                    "orderable": false,
                    "className": "dt-body-center"
                },
            ],

        });

    }); //end (document).ready


    $(document).on("click", "#hapus", function(e) {
        var link = $(this).attr("href");
        e.preventDefault();
        bootbox.confirm("Anda yakin ingin menghapus data ini ?", function(result) {
            if (result) {
                document.location.href = link;
            }
        });
    });
</script>

</body>

</html>