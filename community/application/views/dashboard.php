<?php
$this->load->view("template/header");
$this->load->view("template/topmenu");
$this->load->view("template/sidemenu");

?>

<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Dashboard</h4>
    </div>
    <div class="col-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

    </div>
</div>

<div class="row" id="toni-content">
    <div class="col-md-12">
        <div class="card" id="cardcontent">
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

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-success elevation-1"><i class="far fa-user-circle"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Disciples Maker</span>
                                <span class="info-box-number">
                                    <span id="jumlahdm"><?php echo $jumlahdm ?></span>
                                    <small>Orang</small>
                                </span>
                            </div>
                        </div>
                        <div class="info-box">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-user"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Core Team</span>
                                <span class="info-box-number">
                                    <span id="jumlahcore"><?php echo $jumlahcore ?></span>
                                    <small>Orang</small>
                                </span>
                            </div>
                        </div>
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fa fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Jumlah Member</span>
                                <span class="info-box-number">
                                    <span id="jumlahmember"><?php echo $jumlahmember ?></span>
                                    <small>Orang</small>
                                </span>
                            </div>
                        </div>
                    </div>






                </div>


            </div> <!-- ./card-body -->

        </div> <!-- /.card -->
    </div> <!-- /.col -->
</div> <!-- /.row -->
<!-- Main row -->




<?php $this->load->view("template/footer") ?>


<!-- ChartJS -->
<script src="<?php echo (base_url()) ?>assets/adminlte/plugins/chart.js/Chart.min.js"></script>


<script>
    $(document).ready(function() {


    });
</script>

</body>

</html>