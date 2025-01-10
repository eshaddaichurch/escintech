<?php

use PhpParser\Node\Stmt\Echo_;

$this->load->view('template/festavalive/header'); ?>


<body>


  <style>
  .kartu{
    padding-top: 80px;
    padding-bottom:80px
  }
  .card{
    color: #000;;
  }
  .card-title:hover{
    color: #007bff; /* Warna berubah saat hover */
    transform: scale(1.1);
   
  }
  </style>

 





  <main>



    <?php $this->load->view('template/festavalive/topmenu'); ?>


    <section class="about-section section-padding">
      <div class="container">
        <div class="row">

          <div class="col-12 mb-4 mb-lg-0">
            <h2 class="text-white text-center mb-4 mt-3">RESOURCES</h2>
          </div>

        </div>
      </div>
    </section>

<div class="container kartu" >
    <div class="row" style="display: flex; align-items: center; justify-content: space-between;">
        <div class="col-md-4">
             <div class="card">
                <img class="gambar" src="https://plus.unsplash.com/premium_photo-1661695729294-fa0dc94f2a09?q=80&w=3291&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img" alt="...">
                    <div class="card-img-overlay">
                    <a href="<?= base_url('resources/kids')?>"> 
                        <h5 class="card-title text-white">ESC KIDS</h5></a>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text">Last updated 3 mins ago</p>
                    </div>
            </div>                  
        </div>


        <div class="col-md-4">
             <div class="card ">
                <img class="gambar" src="https://images.unsplash.com/photo-1522008818026-240ebed561e5?q=80&w=3270&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img" alt="...">
            <div class="card-img-overlay">
                <a href="<?= base_url('resources/youth')?>"> 
                    <h5 class="card-title text-white">ESC Youth</h5>
                </a> 
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text">Last updated 3 mins ago</p>
                    </div>
            </div>                  
        </div>

     <div class="col-md-4"> 
    <div class="card">
        <img class="gambar" src="https://images.unsplash.com/photo-1522158637959-30385a09e0da?q=80&w=3270&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img" alt="...">
        <div class="card-img-overlay">
            <a href="<?= base_url('resources/worship')?>"> 
                <h5 class="card-title text-white">ESC Worship</h5>
            </a> 
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text">Last updated 3 mins ago</p>
        </div>                 
    </div>                        
</div>

</div>
    </div>
</div>





  </main>


  <?php $this->load->view('template/festavalive/footer'); ?>


<script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</script>

</body>

</html>