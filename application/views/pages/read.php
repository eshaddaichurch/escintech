<?php $this->load->view('template/festavalive/header'); ?> 

<body>

    <main>



        <?php $this->load->view('template/festavalive/topmenu'); ?> 


        <section class="about-section section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-12 mb-4 mb-lg-0">
                      <h2 class="text-white text-center mb-4 mt-3"><?php echo strtoupper($rowpages->namapages) ?></h2>
                    </div>

                </div>
            </div>
        </section>



        <section class="page-content section-padding">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-12">
                        <?php  
                          echo $rowpages->isipages;
                        ?>
                    </div>

                    

                </div>
            </div>
        </section>


        



    </main>


    <?php $this->load->view('template/festavalive/footer'); ?> 
    

</body>

</html>