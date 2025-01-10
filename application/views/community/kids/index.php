<?php

use PhpParser\Node\Stmt\Echo_;

 $this->load->view('template/festavalive/header'); ?> 
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

/* Tombol */
/* button {
  --color: #0077ff;
  --color1:white;
  --color2:#FF6500;
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

button::before {
  position: absolute;
  content: "";
  background: var(--color2);
  width: 150px;
  height: 200px;
  z-index: -1;
  border-radius: 50%;
}

button:hover {
  color: var(--color1);
}

button:before {
  top: 100%;
  left: 100%;
  transition: 0.3s all;
}

button:hover::before {
  top: -30px;
  left: -30px;
} */






</style>
  
    <section>
        <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?php echo base_url('assets/gambar/back.jpg'); ?>'); height: 400px; background-size: cover; background-position: center;" >
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2><?php echo $title ?></h2>
        <!-- <button>Daftar</button> -->
        

      </div>
    </div><!-- End Breadcrumbs -->
    </section>
    
<section id="blog" class="blog" style="padding-top: 70px;">
      <div class="container">
        
        <div>
            <p>KIDS adalah komunitas anak-anak di GBI Elshaddai yang dirancang khusus untuk bayi hingga usia 11 tahun. Di komunitas ini, anak-anak memiliki kesempatan untuk belajar dan bertumbuh dalam nilai-nilai kekristenan melalui pengalaman yang menyenangkan dan penuh kasih. Dalam setiap kegiatan, KIDS mengedepankan prinsip bahwa anak-anak adalah anugerah Tuhan yang perlu dibimbing dengan baik agar mereka dapat tumbuh menjadi pribadi yang penuh kasih, berkarakter, dan beriman kuat.</p>
            <h5>Misi KIDS: Membentuk Generasi yang Beriman dan Berkarakter</h5> 
            <p>Misi utama dari komunitas KIDS adalah menanamkan nilai-nilai kekristenan yang kuat dan membentuk karakter positif sejak dini. Setiap aktivitas, baik itu permainan, lagu, hingga pelajaran, dirancang agar anak-anak dapat mengenal Tuhan, memahami kasih-Nya, serta belajar hidup dengan nilai-nilai positif seperti kejujuran, kerendahan hati, dan tanggung jawab.</p>
            <h5>Kegiatan di KIDS</h5>
            <p>Di KIDS, setiap kegiatan disesuaikan dengan tahapan perkembangan anak. Berikut adalah beberapa kegiatan utama yang menjadi fokus di komunitas ini:</p>

                <ul>
                    <li>
                        Cerita Alkitab: Anak-anak diajak untuk mendengarkan cerita Alkitab dengan cara yang menarik dan mudah dipahami sesuai usia mereka. Melalui cerita ini, mereka dapat belajar tentang kasih Tuhan dan berbagai nilai moral penting.
                    </li>
                    <li>Aktivitas Kreatif: Kegiatan seperti menggambar, mewarnai, dan membuat kerajinan tangan menjadi media bagi anak-anak untuk mengekspresikan kreativitas mereka. Aktivitas ini juga sering kali dikaitkan dengan tema Alkitab, seperti membuat simbol kasih atau doa.</li>
                    <li>Permainan Edukatif: Berbagai permainan yang melibatkan kerja sama, kecerdasan, dan ketangkasan membantu anak-anak mengembangkan keterampilan sosial dan motorik. Di samping itu, permainan ini juga mengajarkan pentingnya kerja sama dan saling membantu.</li>
                    <li>Worship dan Doa: Setiap pertemuan KIDS juga melibatkan waktu untuk worship dan doa singkat. Dengan cara ini, anak-anak belajar mengucapkan syukur dan mendoakan teman-temannya, membentuk pola pikir yang penuh dengan rasa syukur dan ketergantungan pada Tuhan.</li>
                </ul>

            <h5> Lingkungan yang Aman dan Peduli</h5>
            <p>KIDS menyediakan lingkungan yang aman dan penuh perhatian, di mana anak-anak merasa nyaman untuk bereksplorasi dan belajar. Para guru dan mentor di KIDS adalah orang-orang yang peduli dan memiliki pengalaman dalam menangani anak-anak. Mereka membimbing setiap anak dengan sabar dan memberikan perhatian khusus agar setiap anak merasa diterima dan dihargai.</p>
          
            <h5>Menggali Potensi Anak Sejak Dini</h5>
            <p>Komunitas KIDS juga berfokus pada penggalian potensi yang dimiliki oleh setiap anak. Dengan metode pembelajaran yang interaktif dan penuh dorongan positif, setiap anak diharapkan dapat menemukan minat serta bakat mereka. Di KIDS, anak-anak belajar untuk menjadi diri sendiri dan menghargai apa yang Tuhan berikan pada mereka.</p>
            <h5>Bergabung dengan KIDS</h5>


            <p>Bagi para orang tua yang ingin anak-anak mereka tumbuh dalam lingkungan yang mendukung perkembangan iman dan karakter, KIDS adalah tempat yang tepat. Komunitas ini bukan hanya tempat bermain, tetapi juga arena bagi anak-anak untuk mengenal Tuhan dan hidup dalam nilai-nilai kekristenan.</p>
            <p>Komunitas KIDS di GBI Elshaddai adalah tempat bagi anak-anak untuk belajar, bertumbuh, dan menjadi generasi yang beriman dan berkarakter positif. Di sinilah mereka diajarkan nilai-nilai kekristenan yang kuat dan dikelilingi oleh lingkungan yang penuh kasih, aman, dan mendukung. Mari bersama-sama membentuk generasi masa depan yang mencintai Tuhan dan siap menjadi terang bagi sekitarnya!</p>
      </div>
</section>
<div class="container mt-5">
          <div class="row justify-content-center">
                <div class="col-6 mb-3">
                      <div class="card bg-dark text-white" style="height: 200px;">
                          <img src="<?php echo base_url('assets/assetku/img/blog/dc.png');?>" class="card-img" style="height:100%; object-fit:cover" alt="...">
                          <div class="card-img-overlay">
                            <h5 class="card-title text-white m-3">YOUNG ADULT</h5>
                            <p class="card-text text-white"> This is a wider card with supporting text below as a natural</p>
                            <p class="card-text text-white"><a href="<?php echo base_url('youngadult');?>"><b>JOIN YOUNG ADULT</b></a></p>
                          </div>
                      </div>
                </div>
                <div class="col-6 mb-3">
                      <div class="card bg-dark text-white" style="height: 200px;">
                          <img src="<?php echo base_url('assets/gambar/back.jpg');?>" class="card-img" style="height:100%; object-fit:cover" alt="...">
                          <div class="card-img-overlay">
                            <h5 class="card-title text-white m-3">YOUTH</h5>
                            <p class="card-text text-white"> This is a wider card with supporting text below as a natural</p>
                            <p class="card-text text-white"><a href="<?php echo base_url('youth');?>"><b>JOIN YOUTH</b></a></p>
                          </div>
                      </div>
                </div>
            </div>
      </div>
          
   





</body>

<?php $this->load->view('template/festavalive/footer'); ?> 