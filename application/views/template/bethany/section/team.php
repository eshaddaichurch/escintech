<!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="row">
          <div class="col-lg-4">
            <div class="section-title" data-aos="fade-right">
              <h2>Group Head</h2>
              <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem.</p>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="row">

              <?php  
                $rsgrouphead = $this->db->query("select * from v_group where statusaktif='Aktif' order by namagroup");
                if ($rsgrouphead->num_rows()>0) {
                  foreach ($rsgrouphead->result() as $row) {

                    if (empty($row->fotogroup)) {
                      $foto = base_url('images/nofoto.png');
                    }else{
                      $foto = base_url('admin/uploads/group/'.$row->fotogroup);
                    }

                    $facebook = (!empty($row->facebook)) ? $row->facebook : '#';
                    $instagram = (!empty($row->instagram)) ? $row->instagram : '#';

                    echo '

                      <div class="col-lg-6">
                        <div class="member" data-aos="zoom-in" data-aos-delay="100">
                          <div class="pic"><img src="'.$foto.'" class="img-fluid" alt=""></div>
                          <div class="member-info">
                            <h4>'.$row->namalengkap.'</h4>
                            <span>'.$row->namagroup.'</span>
                            <p>&nbsp;</p>
                            <div class="social">
                              <a href="" target="_blank"><i class="ri-twitter-fill"></i></a>
                              <a href="'.$facebook.'" target="_blank"><i class="ri-facebook-fill"></i></a>
                              <a href="'.$instagram.'" target="_blank"><i class="ri-instagram-fill"></i></a>
                              <a href="" target="_blank"><i class="ri-linkedin-box-fill"></i> </a>
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
    </section><!-- End Team Section -->
