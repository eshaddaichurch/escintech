<?php $this->load->view('template/festavalive/header'); ?> 

<body>

    <main>



        <?php $this->load->view('template/festavalive/topmenu'); ?> 


        <section class="about-section section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-12 mb-4 mb-lg-0">
                      <h2 class="text-white text-center mb-4 mt-3"><?php echo $rowkategori->namapageskategori ?></h2>
                    </div>

                </div>
            </div>
        </section>



        <section class="page-content section-padding">
            <div class="container">
                <div class="row justify-content-center">


                <?php  
                    if ($rspages->num_rows()>0) {
                      foreach ($rspages->result() as $rowpages) {
                        if (empty($rowpages->gambarsampul)) {
                          $gambarsampul = base_url().DEFAULT_SAMPUL_PAGES;
                        }else{
                          $gambarsampul = base_url('admin/uploads/pages/'.$rowpages->gambarsampul);
                        }
                        echo '

                        <div class="col-12 p-2">
                          <div class="card">
                            <div class="card-body p-5">
                              <div class="row">
                                <div class="col-12">
                                  <div class="section-title" data-aos="fade-right">
                                    <h2>'.$rowpages->namapages.'</h2>
                                    <small class="fst-italic"><i class="fa fa-eye"></i> '.$rowpages->jumlahdilihat.' kali dilihat, Dibuat Tanggal '.tglindonesialengkap($rowpages->tglinsert).', </small>
                                  </div>
                                </div>
                                <div class="col-4 col-md-2">
                                  <img src="'.$gambarsampul.'" alt="" class="kategori-image img-thumbnail" style="width: 100%;">
                                </div>
                                <div class="col-8 col-md-10">
                                  <p class="kategori-konten">'.$rowpages->isipages.'</p>
                                </div>
                                <div class="col-12 mt-3">
                                  <small><i class="fa fa-comments"></i> 0 Komentar</small>
                                  <a href="'.site_url('pages/read/'.$this->encrypt->encode($rowpages->idpages).'/'.$rowpages->slug).'" class="float-end">Lihat Selengkapnya</a>
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
        </section>


        



    </main>


    <?php $this->load->view('template/festavalive/footer'); ?> 
    

</body>

</html>