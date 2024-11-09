<?php $this->load->view('template/festavalive/header'); ?>
<?php $this->load->view('template/festavalive/topmenu'); ?>


<body>

  <style>
    /*--------------------------------------------------------------
# Sections & Section Header
--------------------------------------------------------------*/

    .section-bg {
      background-color: #f5f6f7;
    }

    .section-header {
      text-align: center;
      padding-bottom: 70px;
    }

    .section-header h2 {
      font-size: 32px;
      font-weight: 700;
      position: relative;
      color: #2e3135;
    }

    .section-header h2:before,
    .section-header h2:after {
      content: "";
      width: 50px;
      height: 2px;
      background: var(--color-primary);
      display: inline-block;
    }

    .section-header h2:before {
      margin: 0 15px 10px 0;
    }

    .section-header h2:after {
      margin: 0 0 10px 15px;
    }

    .section-header p {
      margin: 0 auto 0 auto;
    }

    @media (min-width: 1199px) {
      .section-header p {
        max-width: 60%;
      }
    }

    /*--------------------------------------------------------------
# Breadcrumbs
--------------------------------------------------------------*/
    .breadcrumbs {
      padding: 140px 0 60px 0;
      min-height: 30vh;
      position: relative;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    .breadcrumbs:before {
      content: "";
      background-color: rgba(0, 0, 0, 0.6);
      position: absolute;
      inset: 0;
    }

    .breadcrumbs h2 {
      font-size: 56px;
      font-weight: 500;
      color: #fff;
      font-family: var(--font-secondary);
    }

    .breadcrumbs ol {
      display: flex;
      flex-wrap: wrap;
      list-style: none;
      padding: 0 0 10px 0;
      margin: 0;
      font-size: 16px;
      font-weight: 600;
      color: var(--color-primary);
    }

    .breadcrumbs ol a {
      color: rgba(255, 255, 255, 0.8);
      transition: 0.3s;
    }

    .breadcrumbs ol a:hover {
      text-decoration: underline;
    }

    .breadcrumbs ol li+li {
      padding-left: 10px;
    }

    .breadcrumbs ol li+li::before {
      display: inline-block;
      padding-right: 10px;
      color: #fff;
      content: "/";
    }


    /*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/
    .header {
      z-index: 997;
      position: absolute;
      padding: 30px 0;
      top: 0;
      left: 0;
      right: 0;
    }





    /*--------------------------------------------------------------
# Blog
--------------------------------------------------------------*/
    .blog .blog-pagination {
      margin-top: 30px;
      color: #838893;
    }

    .blog .blog-pagination ul {
      display: flex;
      padding: 0;
      margin: 0;
      list-style: none;
    }

    .blog .blog-pagination li {
      margin: 0 5px;
      transition: 0.3s;
    }

    .blog .blog-pagination li a {
      color: var(--color-secondary);
      padding: 7px 16px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .blog .blog-pagination li.active,
    .blog .blog-pagination li:hover {
      background: var(--color-primary);
      color: #fff;
    }

    .blog .blog-pagination li.active a,
    .blog .blog-pagination li:hover a {
      color: var(--color-white);
    }

    /*--------------------------------------------------------------
# Blog Posts List
--------------------------------------------------------------*/
    .blog .posts-list .post-item {
      box-shadow: 0px 2px 20px rgba(0, 0, 0, 0.06);
      transition: 0.3s;
    }

    .blog .posts-list .post-img img {
      transition: 0.5s;
    }

    .blog .posts-list .post-date {
      position: absolute;
      right: 0;
      bottom: 0;
      background-color: var(--color-primary);
      color: #fff;
      text-transform: uppercase;
      font-size: 13px;
      padding: 6px 12px;
      font-weight: 500;
    }

    .blog .posts-list .post-content {
      padding: 30px;
    }

    .blog .posts-list .post-title {
      font-size: 24px;
      color: var(--color-secondary);
      font-weight: 700;
      transition: 0.3s;
      margin-bottom: 15px;
    }

    .blog .posts-list .meta i {
      font-size: 16px;
      color: var(--color-primary);
    }

    .blog .posts-list .meta span {
      font-size: 15px;
      color: #838893;
    }

    .blog .posts-list p {
      margin-top: 20px;
    }

    .blog .posts-list hr {
      color: #888;
      margin-bottom: 20px;
    }

    .blog .posts-list .readmore {
      display: flex;
      align-items: center;
      font-weight: 600;
      line-height: 1;
      transition: 0.3s;
      color: #838893;
    }

    .blog .posts-list .readmore i {
      line-height: 0;
      margin-left: 6px;
      font-size: 16px;
    }

    .blog .posts-list .post-item:hover .post-title,
    .blog .posts-list .post-item:hover .readmore {
      color: var(--color-primary);
    }

    .blog .posts-list .post-item:hover .post-img img {
      transform: scale(1.1);
    }

    /*--------------------------------------------------------------
# Blog Details
--------------------------------------------------------------*/
    .blog .blog-details {
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
      padding: 30px;
    }

    .blog .blog-details .post-img {
      margin: -30px -30px 20px -30px;
      overflow: hidden;
    }

    .blog .blog-details .title {
      font-size: 28px;
      font-weight: 700;
      padding: 0;
      margin: 20px 0 0 0;
      color: var(--color-secondary);
    }

    .blog .blog-details .content {
      margin-top: 20px;
    }

    .blog .blog-details .content h3 {
      font-size: 22px;
      margin-top: 30px;
      font-weight: bold;
    }

    .blog .blog-details .content blockquote {
      overflow: hidden;
      background-color: rgba(82, 86, 94, 0.06);
      padding: 60px;
      position: relative;
      text-align: center;
      margin: 20px 0;
    }

    .blog .blog-details .content blockquote p {
      color: var(--color-default);
      line-height: 1.6;
      margin-bottom: 0;
      font-style: italic;
      font-weight: 500;
      font-size: 22px;
    }

    .blog .blog-details .content blockquote:after {
      content: "";
      position: absolute;
      left: 0;
      top: 0;
      bottom: 0;
      width: 3px;
      background-color: var(--color-primary);
      margin-top: 20px;
      margin-bottom: 20px;
    }

    .blog .blog-details .meta-top {
      margin-top: 20px;
      color: #6c757d;
    }

    .blog .blog-details .meta-top ul {
      display: flex;
      flex-wrap: wrap;
      list-style: none;
      align-items: center;
      padding: 0;
      margin: 0;
    }

    .blog .blog-details .meta-top ul li+li {
      padding-left: 20px;
    }

    .blog .blog-details .meta-top i {
      font-size: 16px;
      margin-right: 8px;
      line-height: 0;
      color: var(--color-primary);
    }

    .blog .blog-details .meta-top a {
      color: #6c757d;
      font-size: 14px;
      display: inline-block;
      line-height: 1;
      transition: 0.3s;
    }

    .blog .blog-details .meta-top a:hover {
      color: var(--color-primary);
    }

    .blog .blog-details .meta-bottom {
      padding-top: 10px;
      border-top: 1px solid rgba(82, 86, 94, 0.15);
    }

    .blog .blog-details .meta-bottom i {
      color: #838893;
      display: inline;
    }

    .blog .blog-details .meta-bottom a {
      color: rgba(82, 86, 94, 0.8);
      transition: 0.3s;
    }

    .blog .blog-details .meta-bottom a:hover {
      color: var(--color-primary);
    }

    .blog .blog-details .meta-bottom .cats {
      list-style: none;
      display: inline;
      padding: 0 20px 0 0;
      font-size: 14px;
    }

    .blog .blog-details .meta-bottom .cats li {
      display: inline-block;
    }

    .blog .blog-details .meta-bottom .tags {
      list-style: none;
      display: inline;
      padding: 0;
      font-size: 14px;
    }

    .blog .blog-details .meta-bottom .tags li {
      display: inline-block;
    }

    .blog .blog-details .meta-bottom .tags li+li::before {
      padding-right: 6px;
      color: var(--color-default);
      content: ",";
    }

    .blog .blog-details .meta-bottom .share {
      font-size: 16px;
    }

    .blog .blog-details .meta-bottom .share i {
      padding-left: 5px;
    }

    .blog .post-author {
      padding: 20px;
      margin-top: 30px;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    }

    .blog .post-author img {
      max-width: 120px;
      margin-right: 20px;
    }

    .blog .post-author h4 {
      font-weight: 600;
      font-size: 22px;
      margin-bottom: 0px;
      padding: 0;
      color: var(--color-secondary);
    }

    .blog .post-author .social-links {
      margin: 0 10px 10px 0;
    }

    .blog .post-author .social-links a {
      color: rgba(82, 86, 94, 0.5);
      margin-right: 5px;
    }

    .blog .post-author p {
      font-style: italic;
      color: rgba(108, 117, 125, 0.8);
      margin-bottom: 0;
    }

    /*--------------------------------------------------------------
# Blog Sidebar
--------------------------------------------------------------*/
    .blog .sidebar {
      padding: 30px;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    }

    .blog .sidebar .sidebar-title {
      font-size: 20px;
      font-weight: 700;
      padding: 0;
      margin: 0;
      color: var(--color-secondary);
    }

    .blog .sidebar .sidebar-item+.sidebar-item {
      margin-top: 40px;
    }

    .blog .sidebar .search-form form {
      background: #fff;
      border: 1px solid rgba(82, 86, 94, 0.3);
      padding: 3px 10px;
      position: relative;
    }

    .blog .sidebar .search-form form input[type=text] {
      border: 0;
      padding: 4px;
      border-radius: 4px;
      width: calc(100% - 40px);
    }

    .blog .sidebar .search-form form input[type=text]:focus {
      outline: none;
    }

    .blog .sidebar .search-form form button {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      border: 0;
      background: none;
      font-size: 16px;
      padding: 0 15px;
      margin: -1px;
      background: var(--color-primary);
      color: var(--color-secondary);
      transition: 0.3s;
      border-radius: 0 4px 4px 0;
      line-height: 0;
    }

    .blog .sidebar .search-form form button i {
      line-height: 0;
    }

    .blog .sidebar .search-form form button:hover {
      background: rgba(254, 185, 0, 0.8);
    }

    .blog .sidebar .categories ul {
      list-style: none;
      padding: 0;
    }

    .blog .sidebar .categories ul li+li {
      padding-top: 10px;
    }

    .blog .sidebar .categories ul a {
      color: var(--color-secondary);
      transition: 0.3s;
    }

    .blog .sidebar .categories ul a:hover {
      color: var(--color-default);
    }

    .blog .sidebar .categories ul a span {
      padding-left: 5px;
      color: rgba(54, 77, 89, 0.4);
      font-size: 14px;
    }

    .blog .sidebar .recent-posts .post-item {
      display: flex;
    }

    .blog .sidebar .recent-posts .post-item+.post-item {
      margin-top: 15px;
    }

    .blog .sidebar .recent-posts img {
      max-width: 80px;
      margin-right: 15px;
    }

    .blog .sidebar .recent-posts h4 {
      font-size: 15px;
      font-weight: bold;
    }

    .blog .sidebar .recent-posts h4 a {
      color: var(--color-secondary);
      transition: 0.3s;
    }

    .blog .sidebar .recent-posts h4 a:hover {
      color: var(--color-primary);
    }

    .blog .sidebar .recent-posts time {
      display: block;
      font-style: italic;
      font-size: 14px;
      color: rgba(54, 77, 89, 0.4);
    }

    .blog .sidebar .tags {
      margin-bottom: -10px;
    }

    .blog .sidebar .tags ul {
      list-style: none;
      padding: 0;
    }

    .blog .sidebar .tags ul li {
      display: inline-block;
    }

    .blog .sidebar .tags ul a {
      color: #838893;
      font-size: 14px;
      padding: 6px 14px;
      margin: 0 6px 8px 0;
      border: 1px solid rgba(131, 136, 147, 0.4);
      display: inline-block;
      transition: 0.3s;
    }

    .blog .sidebar .tags ul a:hover {
      color: var(--color-secondary);
      border: 1px solid var(--color-primary);
      background: var(--color-primary);
    }

    .blog .sidebar .tags ul a span {
      padding-left: 5px;
      color: rgba(131, 136, 147, 0.8);
      font-size: 14px;
    }

    /*--------------------------------------------------------------
# Blog Comments
--------------------------------------------------------------*/
    .blog .comments {
      margin-top: 30px;
    }

    .blog .comments .comments-count {
      font-weight: bold;
    }

    .blog .comments .comment {
      margin-top: 30px;
      position: relative;
    }

    .blog .comments .comment .comment-img {
      margin-right: 14px;
    }

    .blog .comments .comment .comment-img img {
      width: 60px;
    }

    .blog .comments .comment h5 {
      font-size: 16px;
      margin-bottom: 2px;
    }

    .blog .comments .comment h5 a {
      font-weight: bold;
      color: var(--color-default);
      transition: 0.3s;
    }

    .blog .comments .comment h5 a:hover {
      color: var(--color-primary);
    }

    .blog .comments .comment h5 .reply {
      padding-left: 10px;
      color: var(--color-secondary);
    }

    .blog .comments .comment h5 .reply i {
      font-size: 20px;
    }

    .blog .comments .comment time {
      display: block;
      font-size: 14px;
      color: rgba(82, 86, 94, 0.8);
      margin-bottom: 5px;
    }

    .blog .comments .comment.comment-reply {
      padding-left: 40px;
    }

    .blog .comments .reply-form {
      margin-top: 30px;
      padding: 30px;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    }

    .blog .comments .reply-form h4 {
      font-weight: bold;
      font-size: 22px;
    }

    .blog .comments .reply-form p {
      font-size: 14px;
    }

    .blog .comments .reply-form input {
      border-radius: 4px;
      padding: 10px 10px;
      font-size: 14px;
    }

    .blog .comments .reply-form input:focus {
      box-shadow: none;
      border-color: rgba(254, 185, 0, 0.8);
    }

    .blog .comments .reply-form textarea {
      border-radius: 4px;
      padding: 10px 10px;
      font-size: 14px;
    }

    .blog .comments .reply-form textarea:focus {
      box-shadow: none;
      border-color: rgba(254, 185, 0, 0.8);
    }

    .blog .comments .reply-form .form-group {
      margin-bottom: 25px;
    }

    .blog .comments .reply-form .btn-primary {
      border-radius: 4px;
      padding: 10px 20px;
      border: 0;
      background-color: var(--color-secondary);
    }

    .blog .comments .reply-form .btn-primary:hover {
      color: var(--color-secondary);
      background-color: var(--color-primary);
    }

    /* button */
    .btn-daftar {
      --color: #0077ff;
      --color1: white;
      --color2: #FF6500;
      font-family: inherit;
      display: inline-block;
      width: 6em;
      height: 2.6em;
      line-height: 2.5em;
      overflow: hidden;
      cursor: pointer;
      margin: 20px;
      font-size: 17px;
      z-index: 1;
      color: var(--color2);
      border: 2px solid var(--color1);
      border-radius: 6px;
      position: relative;
    }

    .btn-daftar::before {
      position: absolute;
      content: "";
      background: var(--color2);
      width: 150px;
      height: 200px;
      z-index: -1;
      border-radius: 50%;
    }

    .btn-daftar:hover {
      color: var(--color1);
    }

    .btn-daftar:before {
      top: 100%;
      left: 100%;
      transition: 0.3s all;
    }

    .btn-daftar:hover::before {
      top: -30px;
      left: -30px;
    }
  </style>

  <section>
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?php echo base_url('assets/gambar/back.jpg'); ?>'); height: 400px; background-size: cover; background-position: center;">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2><?php echo $title ?></h2>
        <a href="<?php echo site_url('dc/list') ?>" class="btn btn-daftar">Daftar</a>
      </div>
    </div><!-- End Breadcrumbs -->
  </section>

  <section id="blog" class="blog" style="padding-top: 70px;">
    <div class="container">
      <div>
        <h3 class="text-center mb-5">Disciples Community (DC): Komunitas Pemuridan di Gereja GBI El Shaddai</h3>
      </div>
      <div>
        <p>Disciples Community, atau yang sering disingkat sebagai DC, merupakan komunitas pemuridan berbasis cell group yang berada di bawah naungan Gereja Bethel Indonesia (GBI) El Shaddai. Komunitas ini dibentuk dengan tujuan utama untuk mengembangkan iman, membangun hubungan antar jemaat, dan mendukung setiap anggotanya dalam perjalanan rohani mereka. DC hadir sebagai sarana bagi jemaat untuk saling mendukung, bertumbuh bersama, dan memperkuat kehidupan rohani mereka dalam Kristus.</p>
        <h5>Tujuan Disciples Community</h5>
        <p>Tujuan utama dari DC adalah pemuridan, yaitu suatu proses yang membantu para jemaat untuk menjadi murid Kristus yang sejati. Melalui kegiatan-kegiatan yang diselenggarakan, DC berharap agar setiap anggota bisa:</p>

        <p> <b>Memiliki Hubungan yang Dekat dengan Tuhan:</b> Setiap anggota didorong untuk semakin mendalami ajaran Kristus dan membangun hubungan yang lebih erat dengan Tuhan melalui doa, pemahaman firman, dan refleksi rohani.
        <p><b>Membangun Komunitas yang Kuat dan Solid:</b> DC mengutamakan nilai-nilai kekeluargaan dan kebersamaan. Setiap anggota diajak untuk saling mendukung, berbagi pengalaman hidup, dan menguatkan satu sama lain dalam perjalanan iman.</p>
        <p>Komunitas DC terdiri dari beberapa cell group, yaitu kelompok kecil yang berkumpul secara rutin. Setiap cell group biasanya terdiri dari beberapa anggota yang berfokus pada pembelajaran firman, sharing pengalaman, dan saling mendoakan. Pertemuan rutin ini juga menjadi momen penting untuk membahas berbagai topik rohani dan menumbuhkan keterbukaan antar anggota.</p>


        <h5><b> Beberapa kegiatan utama yang biasa diadakan oleh Disciples Community meliputi:</b></h5>
        <p>Pertemuan Cell Group: Pertemuan ini diadakan secara berkala dan difokuskan pada pembahasan firman Tuhan, sharing, dan diskusi seputar kehidupan rohani.
          Pelatihan dan Seminar Pemuridan: DC juga mengadakan pelatihan pemuridan dan seminar yang dirancang untuk memperdalam pemahaman anggota tentang Kristus serta bagaimana menjadi murid yang efektif.</p>
        <p>Retret Rohani dan Kegiatan Outing: Kegiatan ini diadakan untuk mempererat hubungan antar anggota dan memberi kesempatan bagi mereka untuk merefleksikan hubungan mereka dengan Tuhan di lingkungan yang tenang dan mendukung.</p>
        <h5>Nilai-Nilai yang Dijunjung Disciples Community</h5>
        <p>Dalam menjalankan setiap kegiatan, DC menjunjung nilai-nilai utama yang selaras dengan ajaran Kristus. Nilai-nilai tersebut meliputi:</p>
        <p>Kebersamaan: Menjadi komunitas yang saling mendukung, tanpa memandang latar belakang, status, atau perbedaan.</p>
        <p>Kerendahan Hati: Setiap anggota didorong untuk melayani satu sama lain dengan kasih dan kerendahan hati, seperti yang diajarkan oleh Kristus.</p>
        <p>Kesetiaan pada Firman Tuhan: DC menempatkan firman Tuhan sebagai landasan utama dalam setiap pengajaran dan kegiatan komunitas.</p>
        <p>Komitmen untuk Bertumbuh: Setiap anggota diharapkan untuk terus bertumbuh dalam iman dan menjadi pribadi yang lebih baik dalam Kristus.</p>
        <h4>Kesimpulan</h4>
        <p>Disciples Community di GBI El Shaddai adalah komunitas pemuridan yang berkomitmen untuk membentuk murid-murid Kristus yang sejati. Dengan pendekatan cell group, DC menyediakan tempat yang nyaman bagi setiap anggota untuk bertumbuh, berbagi, dan mendalami iman mereka. Dengan berbagai kegiatan yang bermanfaat dan suasana kekeluargaan yang hangat, DC berperan penting dalam membantu jemaat mencapai kedewasaan rohani dan menjadi terang bagi dunia di sekitarnya</p>

      </div>
  </section>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-6 mb-3">
        <div class="card bg-dark text-white" style="height: 200px;">
          <img src="<?php echo base_url('assets/assetku/img/blog/kids.png'); ?>" class="card-img" style="height:100%; object-fit:cover" alt="...">
          <div class="card-img-overlay">
            <h5 class="card-title text-white m-3">GOLD</h5>
            <p class="card-text text-white"> This is a wider card with supporting text below as a natural</p>
            <p class="card-text text-white"><a href="<?php echo base_url('gold'); ?>"><b>JOIN DC</b></a></p>
          </div>
        </div>
      </div>
      <div class="col-6 mb-3">
        <div class="card bg-dark text-white" style="height: 200px;">
          <img src="<?php echo base_url('assets/assetku/img/blog/kids.png'); ?>" class="card-img" style="height:100%; object-fit:cover" alt="...">
          <div class="card-img-overlay">
            <h5 class="card-title text-white m-3">KIDS</h5>
            <p class="card-text text-white"> This is a wider card with supporting text below as a natural</p>
            <p class="card-text text-white"><a href="<?php echo base_url('kids'); ?>"><b>JOIN KIDS</b></a></p>
          </div>
        </div>
      </div>
    </div>
  </div>



</body>

<?php $this->load->view('template/festavalive/footer'); ?>