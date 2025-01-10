<?php $this->load->view('template/festavalive/header'); ?>

<body>

    <style>
        .navbar {
            background-color: #000000;
            position: fixed;
            top: 0;
            width: 100%;
        }
    </style>

    <main>



        <?php $this->load->view('template/festavalive/topmenu'); ?>


        <!-- <section class="about-section section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-12 mb-4 mb-lg-0">
                        <h2 class="text-white text-center mb-4 mt-3">JADWAL ELSHADDAI EVENT </h2>
                    </div>

                </div>
            </div>
        </section> -->



        <section class="page-content section-padding text-center bg-dark">
            <iframe width="60%" height="500px" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
        </section>

        <section class="page-content section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h1></h1>
                    </div>
                    <?php
                    if ($rowOurserviceDetail->num_rows() == 0) {
                        echo '
                            <p>Detail ibadah tidak ditemukan...</p>
                        ';
                    } else { ?>
                        <div class="col-12">
                            <h3><?php echo $rowOurserviceDetail->row()->subtema ?></h3>
                            <div class=""><?php echo $rowOurserviceDetail->row()->namapastor ?></div>
                        </div>
                        <div class="col-12">
                            <p>
                                <?php echo $rowOurservice->deskripsi; ?>
                            </p>
                        </div>
                    <?php } ?>


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

</html>