<?php $this->load->view('template/festavalive/header'); ?>

<body>

  <main>



    <?php $this->load->view('template/festavalive/topmenu'); ?>


    <section class="about-section section-padding">
      <div class="container">
        <div class="row">

          <div class="col-12 mb-4 mb-lg-0">
            <h2 class="text-white text-center mb-4 mt-3"><?php echo $rowKelas->namakelas ?></h2>
          </div>

        </div>
      </div>
    </section>

    <div class="container mt-5">
      <?php
      // Periksa apakah data kelas ada
      if (!empty($rowKelas)) {
        // Ambil namakelas dari objek rowKelas
        $namakelas = $rowKelas->namakelas;

        //data berdasarkan kondisi namakelas
        if ($namakelas == "Foundation Class 1") {
          echo "<p>" . $namakelas . " Salvation and Baptism (FC 1) adalah kelas dasar yang bertujuan membantu jemaat memahami secara mendalam arti keselamatan dan baptisan, dua aspek penting dalam kehidupan orang beriman. Kelas ini mengajak jemaat untuk mengenal lebih dalam anugerah keselamatan dari Yesus Kristus serta memahami peran baptisan sebagai langkah iman dalam menerima kasih karunia-Nya.</p>
                <p>Topik Pembelajaran :</p>
                <p>
                  <ol>
                    <li>Keselamatan dalam Kristus – Membahas firman Tuhan mengenai keselamatan sebagai anugerah dari Allah, bukan hasil usaha manusia, dengan dasar ayat dari Efesus 2:8-9.</li>
                    <li>Baptisan Air dan Roh Kudus – Memaparkan arti simbolis dan spiritual dari baptisan, sekaligus pentingnya komitmen pribadi dalam menerima baptisan sebagai wujud iman, sesuai Roma 6:3-4 dan Kisah Para Rasul 2:38.</li>
                  </ol>
                </p>
                <p>Kelas ini dikemas secara interaktif dengan diskusi dan tanya jawab, memungkinkan setiap jemaat untuk menggali konsep-konsep penting, bertanya, dan berbagi pengalaman guna memperdalam iman. Setelah mengikuti kelas ini, jemaat diharapkan semakin siap melangkah dalam iman dan menerima baptisan sebagai bentuk ketaatan perubahan hidup dalam Kristus.</p>
                ";
        } elseif ($namakelas == "Membership Class") {
          echo "<p>" . $namakelas . " adalah kelas khusus yang dirancang untuk membantu jemaat memahami arti menjadi anggota gereja dan peran penting yang dapat mereka jalankan dalam tubuh Kristus. Kelas ini mengajarkan dasar-dasar iman, nilai-nilai gereja, visi dan misi, serta peran dan tanggung jawab setiap anggota dalam pelayanan dan kehidupan komunitas.</p>
                <p>Topik Pembelajaran :</p>
                <ol>
                            <li>Arti Keanggotaan dalam Tubuh Kristus – Menggali pemahaman tentang apa artinya menjadi bagian dari gereja sebagai tubuh Kristus, sesuai dengan pengajaran Alkitab (1 Korintus 12:12-27).</li>
                            <li>Visi, Misi, dan Nilai Gereja – Menjelaskan visi dan misi gereja, nilai-nilai yang dipegang teguh, serta bagaimana setiap anggota berkontribusi dalam mencapai tujuan bersama.</li>
                            <li>Peran dan Tanggung Jawab Anggota – Mengajarkan peran aktif dan tanggung jawab setiap anggota dalam pelayanan dan kehidupan gereja, serta bagaimana menjaga keterlibatan yang sehat dan bermakna (Efesus 4:11-13).</li>
                            <li>Komitmen dan Pertumbuhan Rohani – Mengajak anggota untuk berkomitmen dalam pertumbuhan iman dan membangun relasi yang kuat dengan Tuhan dan sesama, demi pertumbuhan gereja yang sehat dan harmonis.</li>
                          </ol>
                          <p>Kelas ini diadakan dalam suasana yang interaktif dengan diskusi, sharing, dan pemaparan praktis, sehingga jemaat yang mendaftarkan kelas ini dapat memahami dengan jelas dan terhubung secara mendalam dengan tujuan gereja. Dengan mengikuti Membership Class, jemaat akan lebih siap melayani, bertumbuh dalam iman, dan memperkuat hubungan di dalam gereja sebagai bagian dari keluarga rohani yang mengasihi.</p>
        ";
        } elseif ($namakelas == "Foundation Class 2") {
          echo "<p>" . $namakelas . " Pray adalah kelas yang dirancang untuk memberikan pemahaman yang mendalam tentang doa dan peran pentingnya dalam kehidupan orang percaya. Kelas ini membahas berbagai aspek doa, dimulai dari definisinya hingga praktik mendalam yang membantu peserta membangun kehidupan doa yang lebih bermakna dan efektif.</p>
          <p>Topik Pembelajaran :</p>
                <ol>
                    <li> 
                    Apa Itu Doa: Menjelaskan konsep dasar doa sebagai komunikasi langsung dengan Tuhan, yang memungkinkan setiap orang percaya berhubungan secara pribadi dengan-Nya.
                    </li>              
                    <li> 
                      Mengapa Allah Meminta Kita Berdoa: Membahas alasan dan kehendak Allah mengapa umat-Nya dipanggil untuk berdoa, serta manfaat doa yang memperkuat hubungan kita dengan Tuhan dan membawa damai serta bimbingan-Nya dalam hidup (1 Tesalonika 5:17).
                    </li>
                  
                    <li> 
                    Penghalang-Penghalang Doa: Mengidentifikasi hal-hal yang dapat menghalangi keefektifan doa, seperti keraguan, dosa yang belum diselesaikan, atau kurangnya iman, serta bagaimana mengatasinya agar doa kita dapat dijawab sesuai kehendak Tuhan (Yesaya 59:2, Yakobus 1:6) 
                    </li>
                    <li> 
                    Saat Teduh: Mengajarkan pentingnya memiliki waktu khusus yang hening dan fokus untuk berdoa dan merenungkan firman Tuhan, yang membantu menguatkan iman dan keintiman dengan Tuhan (Mazmur 46:10). 
                    </li>
                    <li>  
                    Doa Syafaat: Memahami peran doa syafaat sebagai bentuk kepedulian dan dukungan dalam mendoakan orang lain atau situasi tertentu, sehingga peserta dapat menjadi perantara doa yang efektif dan berbelas kasih (1 Timotius 2:1). 
                    </li>
                    <li>
                    Peperangan Rohani: Membahas konsep peperangan rohani dan peran doa dalam melawan kuasa kegelapan serta memperkuat iman dalam menghadapi tantangan rohani (Efesus 6:12-18).  
                    </li>
                </ol>
          <p>Kelas ini menggunakan pendekatan yang interaktif, memungkinkan peserta untuk berdiskusi, bertanya, dan mempraktikkan berbagai jenis doa, termasuk doa syafaat dan peperangan rohani. Melalui Foundation Class 2: Pray, peserta diharapkan untuk memperkaya kehidupan doa, memperdalam hubungan dengan Tuhan, dan menjadi saksi iman yang kuat dalam keluarga, komunitas dan dalam masyarakat.</p>
          ";
        } elseif ($namakelas == "Foundation Class 3") {
          echo "<p>" . $namakelas . " Renewal Life (FC 3) adalah kelas yang ditujukan untuk membimbing peserta dalam proses pembaharuan hidup melalui pemulihan yang mendalam. Kelas ini membahas tentang bagaimana setiap orang percaya dapat mengalami pemulihan total dalam hubungan dengan Tuhan, pemulihan gambar diri, dan penyembuhan luka batin, serta menerima pelepasan dari hal-hal yang mengikat hidup mereka.
          <p>Topik Pembelajaran :</p>
                    <ol>
                    <li>
                      Pemulihan Hati Bapa: Mengajarkan konsep pemulihan hubungan dengan Allah sebagai Bapa yang penuh kasih. Melalui topik ini, peserta diajak untuk memahami dan merasakan kasih Bapa yang sejati, yang menyembuhkan luka hati dan memperbaiki relasi yang rusak antara manusia dan Tuhan (Lukas 15:11-24).
                    </li>
                    <li>
                      Pemulihan Gambar Diri: Membantu peserta untuk melihat diri mereka sebagai ciptaan yang berharga di hadapan Tuhan. Dalam pemulihan gambar diri ini, peserta diajarkan untuk melepaskan pola pikir negatif dan menggantinya dengan kebenaran firman Tuhan, sehingga mereka dapat menghargai diri sendiri sebagaimana Allah menghargai mereka (Mazmur 139:13-14).
                    </li>
                    <li>
                      Pemulihan Luka Batin: Memberikan ruang bagi peserta untuk mengatasi luka batin dan beban emosional yang menghalangi pertumbuhan rohani. Dengan mengandalkan kuasa Tuhan, peserta diajak untuk mengampuni dan menerima kesembuhan, agar luka-luka batin mereka tidak lagi menjadi penghalang dalam kehidupan sehari-hari (Yesaya 61:1).
                    </li>
                    <li>
                      Pelayanan Pelepasan dan Pengusiran Roh Jahat: Mengajarkan bagaimana menghadapi dan melawan kekuatan gelap yang mungkin mempengaruhi hidup seseorang. Dalam sesi ini, peserta diberikan pemahaman dan panduan untuk terlibat dalam pelayanan pelepasan, memahami kuasa Tuhan yang memerdekakan, dan melepaskan diri dari segala belenggu kuasa jahat (Markus 16:17).
                    </li>
                    </ol>
          <p>Kelas ini dikemas secara interaktif dengan kesempatan untuk berdiskusi, berdoa bersama, serta melakukan praktik langsung dalam pelayanan pelepasan. Melalui Foundation Class 3 Renewal Life, peserta diharapkan dapat mengalami pembaharuan hidup yang sejati, hidup dengan penuh kebebasan dan damai, serta lebih siap untuk melayani sebagai saksi kasih dan kuasa Tuhan di tengah keluarga, komunitas, lingkungan masyarakat.</p>
          </p>";
        } elseif ($namakelas == "Grade 1") {
          echo "<p> " . $namakelas . " The Cross adalah kelas pengajaran dasar yang bertujuan untuk memberikan pemahaman tentang doktrin inti kekristenan yang berkaitan dengan iman dan karya keselamatan melalui Yesus Kristus. Melalui kelas ini, peserta akan diajak untuk memahami dasar-dasar iman yang terdapat dalam Alkitab dan diperkuat dengan doktrin-doktrin utama.</p>
          <p>Topik yang diajarkan:</p>
          <ol>
            <li>
              <b>Doktrin Tentang Alkitab</b> – Menjelaskan Alkitab sebagai Firman Tuhan yang hidup, berkuasa, dan menjadi sumber kebenaran mutlak bagi orang percaya. Topik ini akan membahas inspirasi, otoritas, serta kesatuan Alkitab sebagai pedoman hidup yang dapat diandalkan (2 Timotius 3:16-17).
            </li>
            <li>
              <b>Doktrin Tentang Allah</b> – Menggali sifat-sifat Allah sebagai Pencipta yang Mahakuasa, Mahakasih, dan Mahakudus. Peserta diajak untuk memahami karakter Allah yang mengasihi manusia dan menginginkan hubungan yang dekat dengan umat-Nya (Mazmur 145:8-9).
            </li>
            <li>
              <b>Doktrin Tentang Kristus</b> – Membahas siapa Yesus Kristus sebagai Putra Allah, Tuhan, dan Juruselamat. Melalui topik ini, peserta akan diajak untuk memahami karya keselamatan yang diberikan oleh Yesus melalui penyaliban dan kebangkitan-Nya (Yohanes 1:1, 14; Filipi 2:6-8).
            </li>
            <li>
                <b>Doktrin Tentang Penciptaan</b> – Mempelajari tindakan Allah dalam menciptakan alam semesta dan manusia sebagai bagian dari rancangan-Nya. Kelas ini mengajarkan tujuan Allah menciptakan segala sesuatu serta bagaimana manusia seharusnya menjaga ciptaan-Nya (Kejadian 1:1, 26-27).
            </li>
            <li>
              <b>Doktrin Tentang Manusia</b> – Menjelaskan asal-usul manusia menurut Alkitab, sifat manusia sebagai gambar dan rupa Allah, serta kondisi manusia yang berdosa dan memerlukan keselamatan dari Allah (Mazmur 8:4-6, Roma 3:23).
            </li>
            <li>
                <b>Doktrin Tentang Keselamatan</b> – Membahas konsep keselamatan sebagai anugerah Allah melalui iman kepada Yesus Kristus. Peserta akan memahami makna keselamatan dan proses pertobatan, pengampunan dosa, dan kehidupan kekal yang diberikan Tuhan (Efesus 2:8-9).
            </li>
          </ol>
          <p> Kelas ini dirancang dengan pendekatan yang mendalam dan interaktif, memungkinkan peserta untuk berdiskusi dan bertanya, serta memperdalam pengertian tentang dasar iman Kristen. <i>Melalui Grade 1 The Cross</i>, peserta diharapkan mendapatkan fondasi yang kuat dalam iman dan lebih siap untuk menjalani panggilan hidup sebagai pengikut Kristus yang sejati.</p>
          ";
        } elseif ($namakelas == "Grade 2") {
          echo "<p> " . $namakelas . " The Power adalah kelas pengajaran lanjutan yang dirancang untuk membantu peserta mengenal lebih dalam tentang Roh Kudus, pribadi-Nya, dan peran-Nya dalam kehidupan orang percaya. Melalui kelas ini, peserta akan mempelajari doktrin tentang Roh Kudus serta karya, karunia, dan buah Roh yang memampukan orang percaya menjalani hidup yang penuh kuasa dan kebenaran.</p>
          <p>Topik yang diajarkan:</p>
          <ol>
            <li>Doktrin Tentang Roh Kudus – Menjelaskan siapa Roh Kudus sebagai Pribadi ketiga dalam Tritunggal, yang berperan penting dalam kehidupan orang percaya sebagai Penghibur, Penolong, dan Pembimbing dalam segala kebenaran (Yohanes 14:26).
            </li>
            <li>Nama dan Lambang-Lambang Roh Kudus – Menggali makna nama dan simbol-simbol Roh Kudus dalam Alkitab, seperti angin, api, dan air, yang menggambarkan kuasa, penyucian, dan penyegaran yang diberikan oleh Roh Kudus (Kisah Para Rasul 2:2-4).
            </li>
            <li>Baptisan Roh Kudus – Mengajarkan tentang pengalaman baptisan dalam Roh Kudus sebagai pemberdayaan rohani yang membawa kuasa dan keberanian untuk bersaksi dan melayani Tuhan. Topik ini akan mencakup pemahaman akan tanda-tanda baptisan Roh Kudus (Kisah Para Rasul 1:8, Kisah Para Rasul 2:4).
            </li>
            <li>Karya Roh Kudus – Membahas peran aktif Roh Kudus dalam membimbing, menghibur, mengajar, dan menguatkan orang percaya dalam setiap aspek kehidupan mereka, serta bagaimana Roh Kudus bekerja dalam kehidupan sehari-hari (Roma 8:26-27).
            </li>
            <li>Karunia-Karunia Rohani – Menjelaskan berbagai karunia Roh yang diberikan kepada setiap orang percaya untuk membangun jemaat, seperti karunia berbicara dalam bahasa roh, karunia menyembuhkan, dan karunia nubuat. Peserta akan didorong untuk menemukan dan menggunakan karunia mereka dalam pelayanan (1 Korintus 12:7-11).
            </li>
            <li>Buah Roh – Memahami buah Roh sebagai karakter yang dihasilkan oleh Roh Kudus dalam kehidupan orang percaya, yaitu kasih, sukacita, damai sejahtera, kesabaran, kemurahan, kebaikan, kesetiaan, kelemahlembutan, dan penguasaan diri (Galatia 5:22-23).
            </li>
            </ol>
          <p>Kelas ini diselenggarakan secara interaktif, dengan diskusi dan latihan untuk membantu peserta memahami dan mengalami kuasa Roh Kudus dalam kehidupan mereka.Melalui  <i>Grade 2: The Power</i>, peserta akan dibimbing untuk menjalani hidup yang berkuasa, dipimpin oleh Roh Kudus, serta diperlengkapi dengan karunia dan buah Roh untuk memuliakan Tuhan dalam kehidupan sehari-hari dan pelayanan.</p>
          ";
        } elseif ($namakelas == "Grade 3") {
          echo "<p> " . $namakelas . "The Eternity adalah kelas pengajaran lanjutan yang mendalam mengenai doktrin-doktrin kekristenan tentang akhir zaman, kedatangan Kristus yang kedua, dan janji kehidupan kekal. Kelas ini bertujuan untuk memberikan pemahaman yang menyeluruh tentang apa yang dijanjikan Tuhan di masa depan dan bagaimana hal tersebut mempengaruhi hidup orang percaya saat ini.</p>
          <p>Topik yang diajarkan:</p>
          <ol>
            <li>Doktrin Tentang Akhir Zaman – Menjelaskan peristiwa-peristiwa yang akan terjadi pada akhir zaman menurut Alkitab, serta apa yang harus dipahami orang percaya mengenai tanda-tanda zaman.</li>
            <li>Doktrin Tentang Pengangkatan Orang Percaya – Membahas janji Tuhan tentang pengangkatan orang-orang percaya, yaitu saat di mana mereka akan dijemput untuk bertemu dengan Kristus di awan-awan (1 Tesalonika 4:16-17).</li>
            <li>Doktrin Tentang Tahta Pengadilan Kristus – Menjelaskan peristiwa di mana orang percaya akan dihakimi berdasarkan perbuatan mereka, bukan untuk keselamatan, tetapi untuk menerima pahala kekal (2 Korintus 5:10).</li>
            <li>Doktrin Tentang Perjamuan Kawin Anak Domba – Menggali arti perjamuan kudus ini sebagai lambang penyatuan yang sempurna antara Kristus dan jemaat-Nya (Wahyu 19:7-9).</li>
            <li>Doktrin Tentang Antikristus – Membahas siapa dan apa yang digambarkan sebagai Antikristus, serta peranannya dalam masa akhir zaman (1 Yohanes 2:18).</li>
            <li>Doktrin Tentang Masa Berlangsungnya Kuasa Kejahatan Antikristus – Memahami masa kuasa kegelapan saat Antikristus akan berkuasa dan dampaknya bagi dunia (Daniel 9:27, Wahyu 13).</li>
            <li>Doktrin Tentang Kedatangan Yesus yang Kedua – Mengajarkan janji kedatangan Yesus yang kedua kali untuk menegakkan keadilan dan menggenapi rencana keselamatan Allah (Matius 24:30).</li>
            <li>Doktrin Tentang Perang Harmagedon – Membahas perang terakhir antara kebaikan dan kejahatan yang akan terjadi di Harmagedon sebelum kedatangan Kristus yang kedua (Wahyu 16:16).</li>
            <li>Doktrin Tentang Kerajaan 1000 Tahun Damai – Menjelaskan masa damai seribu tahun di mana Kristus akan memerintah sebagai Raja di bumi, membawa kedamaian sejati (Wahyu 20:1-6).</li>
            <li>Doktrin Tentang Gog dan Magog – Memahami peristiwa perlawanan terakhir setelah seribu tahun damai, di mana kekuatan jahat mencoba bangkit kembali sebelum dihancurkan selamanya (Wahyu 20:7-9).</li>
            <li>Doktrin Tentang Tahta Putih yang Besar – Menggali pengadilan terakhir bagi semua orang yang belum percaya, di mana mereka akan dihakimi berdasarkan kehidupan mereka (Wahyu 20:11-15).</li>
            <li>Doktrin Tentang Kebangkitan yang Pertama dan yang Kedua – Mengajarkan tentang dua kebangkitan yang digambarkan dalam Alkitab: kebangkitan bagi orang benar untuk kehidupan kekal dan kebangkitan bagi yang tidak percaya untuk penghakiman (Wahyu 20:5-6, Yohanes 5:28-29).</li>
            <li>Doktrin Tentang Surga – Menjelaskan apa yang Alkitab ajarkan tentang sorga sebagai tempat kediaman kekal bersama Allah, dipenuhi damai dan sukacita bagi mereka yang diselamatkan (Yohanes 14:2-3, Wahyu 21:1-4).</li>
            <p>Kelas ini dirancang untuk memberikan pemahaman yang mendalam melalui diskusi, penjelasan Alkitab, dan sesi tanya jawab yang memungkinkan peserta untuk memperdalam iman mereka dan hidup dalam kesiapan akan janji kehidupan kekal. Melalui Grade 3 The Eternity, peserta diharapkan memiliki pengharapan yang teguh dalam janji keselamatan dan mampu menghadapi masa depan dengan iman yang kokoh serta pengharapan yang berlandaskan kebenaran firman Tuhan.</p>
            </ol>
";
        } elseif ($namakelas == "Volunteer Class") {
          echo "<p> " . $namakelas . " adalah kelas yang dirancang untuk membekali peserta dengan pemahaman dan keterampilan yang diperlukan untuk melayani Tuhan dan sesama. Kelas ini akan membahas mengapa pelayanan penting dalam kehidupan orang percaya, makna sejati dari melayani, dan bagaimana cara melayani Allah dengan efektif.</p>
          <p>Topik yang diajarkan:</p>
          <ol>
              <li>
                <b>Mengapa Kita Melayani</b> – Membahas alasan-alasan mendasar mengapa setiap orang percaya dipanggil untuk melayani. Peserta akan diajak untuk memahami bahwa pelayanan adalah respon terhadap kasih dan anugerah Tuhan, serta bagian dari panggilan iman kita sebagai pengikut Kristus (Markus 10:45).
              </li>
              <li>
                  <b>Apa Artinya Melayani</b> – Menggali makna pelayanan dari perspektif Alkitab, yang menunjukkan bahwa melayani adalah tentang memberi diri kepada orang lain dengan kasih, membagikan berkat yang telah kita terima, dan mencerminkan karakter Kristus dalam tindakan kita. Dalam sesi ini, peserta juga akan memahami bahwa pelayanan bukan hanya tugas, tetapi panggilan yang membawa sukacita dan pertumbuhan rohani (Galatia 5:13).</li>
              <li>
                  <b>Bagaimana Cara Melayani Allah</b> – Mengajarkan berbagai cara untuk melayani Tuhan, baik dalam konteks gereja maupun di luar gereja. Peserta akan diperkenalkan pada berbagai bentuk pelayanan, mulai dari pelayanan di dalam komunitas gereja, misi sosial, hingga pelayanan dalam kehidupan sehari-hari. Juga, akan dibahas tentang pentingnya penggunaan karunia dan talenta yang diberikan Allah dalam pelayanan kita (Kolose 3:23-24).
              </li>
              <p>Kelas ini diadakan dengan pendekatan interaktif yang memungkinkan peserta untuk berdiskusi, berbagi pengalaman, dan merencanakan langkah-langkah konkret dalam pelayanan. Melalui Volunteer Class (VC), peserta diharapkan untuk semakin menyadari panggilan mereka untuk melayani, memperoleh motivasi yang kuat untuk terlibat dalam pelayanan, dan merasakan kepuasan yang mendalam ketika hidup mereka berdampak positif bagi orang lain dan kemuliaan Tuhan.</p>
          ";
        } else {
          echo "<p>Kelas " . $namakelas . " belum memiliki deskripsi</p>";
        }
      } else {
        echo "<p>Tidak ada data kelas.</p>";
      }
      ?>
    </div>

    <!-- Untuk Mobile -->
    <section class="page-content section-padding d-md-none d-sm-block">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="row">

                  <?php
                  if ($rsJadwal->num_rows() > 0) {
                    $no = 1;
                    foreach ($rsJadwal->result() as $rowJadwal) {
                      $tglmulai = date('d-m-Y', strtotime($rowJadwal->tglmulai));
                      $tglselesai = date('d-m-Y', strtotime($rowJadwal->tglselesai));

                      $jamMulai = date('H:i', strtotime($rowJadwal->tglmulai));
                      $jamSelesai = date('H:i', strtotime($rowJadwal->tglselesai));

                      if ($tglmulai == $tglselesai) {
                        $tglEvent = $tglmulai;
                      } else {
                        $tglEvent = $tglmulai . ' s/d ' . $tglselesai;
                      }

                      if ($jamMulai == $jamSelesai) {
                        $jamEvent = $jamMulai;
                      } else {
                        $jamEvent = $jamMulai . ' WIB s/d ' . $jamSelesai . ' WIB';
                      }

                      $maxJemaat = $rowJadwal->jumlahjemaat;
                      if (empty($maxJemaat)) {
                        $maxJemaat = 0;
                      }

                      $nJumlah = $this->db->query("
                      

                                                                    select count(*) as jlh from jadwaleventregistrasi where idjadwalevent='" . $rowJadwal->idjadwalevent . "' and statuskonfirmasi<>'Ditolak'
                                                                  ")->row()->jlh;
                      $jumlahPeserta = $nJumlah . '/' . $maxJemaat;
                      if ($maxJemaat == 0) {
                        $jumlahPeserta = $nJumlah;
                      } else {
                        if ($nJumlah == $maxJemaat) {
                          $jumlahPeserta = '<span class="text-danger">' . $nJumlah . '/' . $maxJemaat . '</span>';
                        }
                      }

                      $sudahPernahDaftar = $this->Nextstep_model->sudahPernahDaftar($rowJadwal->idjadwalevent, $this->session->userdata('idjemaat'));

                      if ($sudahPernahDaftar) {
                        // $button = '<button href="#" class="btn btn-success btn-sm" data-idjadwalevent="' . $rowJadwal->idjadwalevent . '" disabled>Daftar Sekarang</button>';

                        $button = '';
                      } else {
                        $button = '<a href="#" class="btn btn-success btn-sm" data-idjadwalevent="' . $rowJadwal->idjadwalevent . '" id="btnDaftar">Daftar Sekarang</a>';
                      }

                      $rsLokasi = $this->db->query("
                        select * from jadwaleventdetailtanggal where idjadwalevent = '" . $rowJadwal->idjadwalevent . "' limit 1
                      ");
                      if ($rsLokasi->num_rows() > 0) {
                        $namaLokasi = $rsLokasi->row()->lokasievent;
                      } else {
                        $namaLokasi = '';
                      }


                      echo '
                        <div class="col-12">
                          <h5>' . $rowJadwal->namaevent . '</h5>
                        </div>
                        <div class="col-12">
                          <i class="fas fa-map-marker-alt me-3"></i> ' . $namaLokasi . '
                        </div>
                        <div class="col-12">
                          <i class="fa fa-calendar me-3"></i> ' . $tglEvent . '
                        </div>
                        <div class="col-12">
                          <i class="far fa-clock me-3"></i> ' . $jamEvent . '
                        </div>
                        <div class="col-12">
                          <i class="fas fa-user-check me-3"></i> ' . $jumlahPeserta . '
                        </div>
                        ';

                      if ($sudahPernahDaftar) {

                        $rsDaftar = $this->db->query("select * from v_jadwaleventregistrasi where idjadwalevent='" . $rowJadwal->idjadwalevent . "' and idjemaat='" . $this->session->userdata('idjemaat') . "'");
                        if ($rsDaftar->num_rows() > 0) {
                          foreach ($rsDaftar->result() as $rowDaftar) {


                            if ($rowDaftar->statuskonfirmasi == 'Menunggu') {
                              echo '
                                    <div class="col-12 mt-3 ps-5">
                                      <div class="alert alert-warning" role="alert">
                                      <strong>Status Pengajuan : ' . $rowDaftar->statuskonfirmasi . '</strong><br><br>
                                      Pengajuan pendaftaran kelas anda masih dalam proses <strong>Menunggu</strong>!
                                      </div>
                                    </div>';
                            }

                            if ($rowDaftar->statuskonfirmasi == 'Disetujui') {
                              echo '
                                    <div class="col-12 mt-3 ps-5">
                                      <div class="alert alert-success" role="alert">
                                      <strong>Status Pengajuan : ' . $rowDaftar->statuskonfirmasi . '</strong><br><br>
                                      Pengajuan pendaftaran kelas sudah <strong>Disetujui</strong>!<br>
                                      Silahkan datang pada waktu jadwal yang telah ditentukan.
                                      </div>
                                    </div>';
                            }


                            if ($rowDaftar->statuskonfirmasi == 'Ditolak') {
                              echo '
                                    <div class="col-12 mt-3 ps-5">
                                      <div class="alert alert-danger" role="alert">
                                      <strong>Status Pengajuan : ' . $rowDaftar->statuskonfirmasi . '</strong><br><br>
                                      Pengajuan pendaftaran kelas <strong>Ditolak</strong>!<br>
                                      ' . $rowDaftar->keterangankonfirmasi . '.
                                      </div>
                                    </div>';
                            }
                          }
                        }
                      }


                      echo '
                        <div class="col-12 mt-3">
                          ' . $button . '
                        </div>
                      ';
                    }
                  } else {
                    echo '
                      <div class="">Jadwal kelas belum dibuka...</div>                    
                    ';
                  }
                  ?>



                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
    </section>

    <!-- Untuk PC -->
    <section class="page-content d-none d-md-block">
      <div class="container">
        <div class="row justify-content-center">

          <div class="col-12 p-5">
            <?php echo $rowKelas->deskripsi ?>
          </div>
          <div class="col-12 p-5">
            <div class="row">
              <div class="col-12">
                <h5>Jadwal Pendaftaran Kelas</h5>
                <hr>
              </div>
              <div class="col-12">
                <table class="table table-condesed text-sm table-jadwal">
                  <thead>
                    <tr>
                      <th style="width: 5%; text-align: center;">No</th>
                      <th style="text-align: left;">Nama Kelas</th>
                      <th style="width: 15%; text-align: center;">Tanggal Kelas</th>
                      <th style="width: 15%; text-align: center;">Jam Kelas</th>
                      <th style="width: 15%; text-align: center;">Jumlah Peserta</th>
                      <th style="width: 15%; text-align: center;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    if ($rsJadwal->num_rows() > 0) {
                      $no = 1;
                      foreach ($rsJadwal->result() as $rowJadwal) {
                        $tglmulai = date('d-m-Y', strtotime($rowJadwal->tglmulai));
                        $tglselesai = date('d-m-Y', strtotime($rowJadwal->tglselesai));

                        $jamMulai = date('H:i', strtotime($rowJadwal->tglmulai));
                        $jamSelesai = date('H:i', strtotime($rowJadwal->tglselesai));

                        if ($tglmulai == $tglselesai) {
                          $tglEvent = $tglmulai;
                        } else {
                          $tglEvent = $tglmulai . '<br>S/D<br>' . $tglselesai;
                        }

                        if ($jamMulai == $jamSelesai) {
                          $jamEvent = $jamMulai;
                        } else {
                          $jamEvent = $jamMulai . ' WIB<br>S/D<br>' . $jamSelesai . ' WIB';
                        }

                        $maxJemaat = $rowJadwal->jumlahjemaat;
                        if (empty($maxJemaat)) {
                          $maxJemaat = 0;
                        }

                        $nJumlah = $this->db->query("
                                                                    select count(*) as jlh from jadwaleventregistrasi where idjadwalevent='" . $rowJadwal->idjadwalevent . "' and statuskonfirmasi<>'Ditolak'
                                                                  ")->row()->jlh;
                        $jumlahPeserta = $nJumlah . '/' . $maxJemaat;
                        if ($maxJemaat == 0) {
                          $jumlahPeserta = $nJumlah;
                        } else {
                          if ($nJumlah == $maxJemaat) {
                            $jumlahPeserta = '<span class="text-danger">' . $nJumlah . '/' . $maxJemaat . '</span>';
                          }
                        }

                        $sudahPernahDaftar = $this->Nextstep_model->sudahPernahDaftar($rowJadwal->idjadwalevent, $this->session->userdata('idjemaat'));

                        if ($sudahPernahDaftar) {
                          $button = '<button href="#" class="btn btn-success btn-sm" data-idjadwalevent="' . $rowJadwal->idjadwalevent . '" disabled>Daftar Sekarang</button>';
                        } else {
                          $button = '<a href="#" class="btn btn-success btn-sm" data-idjadwalevent="' . $rowJadwal->idjadwalevent . '" id="btnDaftar">Daftar Sekarang</a>';
                        }

                        echo '
                                      <tr>
                                        <td style="width: 5%; text-align: center;">' . $no++ . '</td>
                                        <td style="text-align: left;">' . $rowJadwal->namaevent . '</td>
                                        <td style="width: 15%; text-align: center;">' . $tglEvent . '</td>
                                        <td style="width: 15%; text-align: center;">' . $jamEvent . '</td>
                                        <td style="width: 15%; text-align: center;">' . $jumlahPeserta . '</td>
                                        <td style="width: 15%; text-align: center;">
                                          ' . $button . '
                                        </td>
                                      </tr>
                                    ';

                        if ($sudahPernahDaftar) {


                          $rsDaftar = $this->db->query("select * from v_jadwaleventregistrasi where idjadwalevent='" . $rowJadwal->idjadwalevent . "' and idjemaat='" . $this->session->userdata('idjemaat') . "'");
                          if ($rsDaftar->num_rows() > 0) {
                            foreach ($rsDaftar->result() as $rowDaftar) {


                              if ($rowDaftar->statuskonfirmasi == 'Menunggu') {
                                echo '
                                              <tr>
                                                <td style="width: 100%; text-align: center;" colspan="6">
                                                  <div class="alert alert-warning" role="alert">
                                                    <strong>Nama Jemaat : ' . $rowDaftar->namalengkap . '</strong><br>
                                                    <strong>Tgl Pengajuan : ' . date('d-m-Y H:i:s', strtotime($rowDaftar->tglregistrasi)) . '</strong><br>
                                                    <strong>Status Pengajuan : ' . $rowDaftar->statuskonfirmasi . '</strong><br><br>
                                                    Pengajuan pendaftaran kelas anda masih dalam proses <strong>Menunggu</strong>!
                                                  </div>
                                                </td>
                                              </tr>
                                            ';;
                              }

                              if ($rowDaftar->statuskonfirmasi == 'Disetujui') {
                                echo '
                                              <tr>
                                                <td style="width: 100%; text-align: center;" colspan="6">
                                                  <div class="alert alert-success" role="alert">
                                                    <strong>Nama Jemaat : ' . $rowDaftar->namalengkap . '</strong><br>
                                                    <strong>Tgl Pengajuan : ' . date('d-m-Y H:i:s', strtotime($rowDaftar->tglregistrasi)) . '</strong><br>
                                                    <strong>Status Pengajuan : ' . $rowDaftar->statuskonfirmasi . '</strong><br><br>
                                                    Pengajuan pendaftaran kelas sudah <strong>Disetujui</strong>!<br>
                                                    Silahkan datang pada waktu jadwal yang telah ditentukan.
                                                  </div>
                                                </td>
                                              </tr>
                                            ';;
                              }


                              if ($rowDaftar->statuskonfirmasi == 'Ditolak') {
                                echo '
                                              <tr>
                                                <td style="width: 100%; text-align: center;" colspan="6">
                                                  <div class="alert alert-danger" role="alert">
                                                    <strong>Nama Jemaat : ' . $rowDaftar->namalengkap . '</strong><br>
                                                    <strong>Tgl Pengajuan : ' . date('d-m-Y H:i:s', strtotime($rowDaftar->tglregistrasi)) . '</strong><br>
                                                    <strong>Status Pengajuan : ' . $rowDaftar->statuskonfirmasi . '</strong><br><br>
                                                    Pengajuan pendaftaran kelas <strong>Ditolak</strong>!<br>
                                                    ' . $rowDaftar->keterangankonfirmasi . '.
                                                  </div>
                                                </td>
                                              </tr>
                                            ';;
                              }
                            }
                          }
                        }
                      }
                    } else {
                      echo '
                                  <tr>
                                    <td style="width: 100%; text-align: center;" colspan="6"><i>Jadwal kelas ' . $rowKelas->namakelas . ' belum dibuka.</i></td>
                                  </tr>
                                  ';
                    }
                    ?>


                  </tbody>
                </table>
              </div>


            </div>
          </div>



        </div>
      </div>
    </section>






  </main>


  <?php $this->load->view('template/festavalive/footer'); ?>

  <script>
    $(document).on('click', '#btnDaftar', function(e) {
      var idjadwalevent = $(this).attr('data-idjadwalevent');

      e.preventDefault();

      swal({
          title: "Daftar Kelas?",
          text: "Anda ingin mendaftar di kelas ini? Pastikan anda sudah memenuhi persyaratan untuk mendaftar.",
          icon: "warning",
          buttons: ["Batal!", "Ya!"],
          dangerMode: true,
        })
        .then((daftarkelas) => {
          if (daftarkelas) {

            $.ajax({
                url: '<?php echo site_url('nextstep/daftar') ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                  'idjadwalevent': idjadwalevent
                },
              })
              .done(function(daftarResult) {
                console.log(daftarResult);

                if (daftarResult.success) {
                  swal("Berhasil", "Pengajuan pendaftaran kelas next step anda berhasil disimpan. Periksa kembali status pengajuan pendaftaran anda dalam 2x24 Jam", "success")
                    .then(function() {
                      window.open("<?php echo site_url('nextstep/kelas/' . $kelas_slug . '/' . $this->encrypt->encode($menu)) ?>", "_self");
                    });
                } else {
                  swal("Gagal", daftarResult.msg, "info");
                }
              })
              .fail(function() {
                console.log("error");
              });

          }
        });

    });
  </script>

</body>

</html>