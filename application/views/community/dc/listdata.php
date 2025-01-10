<?php $this->load->view('template/festavalive/header'); ?>



<body>


    <style>
        /*--------------------------------------------------------------
        # Hero Section
        --------------------------------------------------------------*/
        #hero {
            width: 100%;
            height: 40vh;
            background: url("<?php echo base_url('images/banner2.jpg') ?>") center center;
            background-size: cover;
            position: relative;
        }

        #hero .container {
            padding-top: 80px;
        }

        #hero:before {
            content: "";
            background: rgba(0, 0, 0, 0.6);
            position: absolute;
            bottom: 0;
            top: 0;
            left: 0;
            right: 0;
        }

        #hero h1 {
            margin: 0 0 10px 0;
            font-size: 48px;
            font-weight: 700;
            line-height: 56px;
            color: #fff;
        }

        #hero h2 {
            color: #eee;
            margin-bottom: 40px;
            font-size: 15px;
            font-weight: 500;
            font-family: "Open Sans", sans-serif;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        #hero .btn-get-started {
            font-family: "Poppins", sans-serif;
            text-transform: uppercase;
            font-weight: 500;
            font-size: 14px;
            letter-spacing: 1px;
            display: inline-block;
            padding: 8px 28px;
            border-radius: 50px;
            transition: 0.5s;
            margin: 10px;
            border: 2px solid #fff;
            color: #fff;
        }

        #hero .btn-get-started:hover {
            background: #EE6F09;
            border: 2px solid #EE6F09;
        }

        @media (min-width: 1024px) {
            #hero {
                background-attachment: fixed;
            }
        }

        @media (max-width: 768px) {
            #hero {
                height: 100vh;
            }

            #hero .container {
                padding-top: 60px;
            }

            #hero h1 {
                font-size: 32px;
                line-height: 36px;
            }
        }
    </style>

    <style>
        #map {
            height: 700px;
        }

        .link-popup {
            font-size: 14px;
            float: right;
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>

    <style>
        .ulCabang li {
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .ulCabang li a {
            text-decoration: none;
            color: #243EAE;
            font-size: 16px;
        }
    </style>


    <style>
        /*****************
    - Header -
*****************/
        header {
            position: relative;
            left: 0;
            top: 0;
            width: 100%;
            min-height: 120px;
            padding: 50px 0;
            color: #fff;
            background: #383838 url(https://www.athenadesignstudio.com/plugins/switch/images/bg.jpg) no-repeat center center;
            margin-bottom: 30px
        }

        /* Logo */
        header .logo {
            clear: both;
            display: block;
            text-align: center;
            padding-bottom: 10px;
        }

        /* Title */
        header h1 {
            font-weight: 300;
            font-size: 24px;
            color: #eee;
            letter-spacing: 2px;
            text-align: center;
            text-transform: uppercase;
            margin: 0 !important;
            padding-bottom: 25px;
        }

        @charset "utf-8";
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900|Open Sans:400,600,800');

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        div,
        input,
        p,
        a {
            font-family: "Open Sans";
            margin: 0px;
        }

        a,
        a:hover,
        a:focus {
            color: inherit;
        }

        body {
            background-color: #F1F2F3;
        }

        .container-fluid,
        .container {
            max-width: 1200px;
        }

        .card-container {
            padding: 100px 0px;
            -webkit-perspective: 1000;
            perspective: 1000;
        }

        .profile-card-1 {
            background-color: #FFF;
            border-radius: 10px;
            box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
            background-image: url(../img/profile-bg-1.jpg);
            background-position: center;
            padding-top: 100px;
            overflow: hidden;
            position: relative;
            margin: 10px auto;
            cursor: pointer;
            max-width: 300px;
        }

        .profile-card-1 .profile-content {
            position: relative;
            background-color: #FFF;
            padding: 70px 20px 20px 20px;
            text-align: center;
        }

        .profile-card-1 .profile-img {
            position: absolute;
            left: 0px;
            right: 0px;
            z-index: 10;
            top: -50px;
            transition: all 0.25s linear;
            transform-style: preserve-3d;
        }

        .profile-card-1 .profile-img img {
            height: 100px;
            margin: auto;
            border-radius: 50%;
            border: 5px solid #FFF;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .profile-card-1 .profile-name {
            font-size: 18px;
            font-weight: bold;
            color: #021830;
        }

        .profile-card-1 .profile-address {
            color: #777;
            font-size: 12px;
            margin: 0px 0px 15px 0px;
        }

        .profile-card-1 .profile-description {
            font-size: 13px;
            padding: 5px 10px;
            color: #777;
        }

        .profile-card-1 .profile-icons .fa {
            margin: 5px;
            color: #777;
        }

        .profile-card-1:hover {
            box-shadow: 0px 0px 50px rgba(0, 0, 0, 0.1);
        }

        .profile-card-1:hover .profile-img {
            transform: rotateY(180deg);
        }

        .profile-card-2 {
            max-width: 300px;
            background-color: #FFF;
            box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
            background-position: center;
            overflow: hidden;
            position: relative;
            margin: 10px auto;
            cursor: pointer;
            border-radius: 10px;
        }

        .profile-card-2 img {
            transition: all linear 0.25s;
            width: 100%;

        }


        .profile-card-2 .profile-buttons {
            position: absolute;
            left: 30px;
            bottom: 30px;
            font-size: 14px;
            color: #FFF;
            text-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);
            font-weight: bold;
            transition: all linear 0.25s;
        }

        .profile-card-2 .profile-name {
            position: absolute;
            left: 30px;
            top: 10px;
            font-size: 25px;
            color: #FFF;
            text-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);
            font-weight: bold;
            transition: all linear 0.25s;
        }

        .profile-card-2 .profile-icons {
            position: absolute;
            bottom: 30px;
            right: 30px;
            color: #FFF;
            transition: all linear 0.25s;
        }

        .profile-card-2 .profile-username {
            position: absolute;
            top: 50px;
            left: 30px;
            color: #FFF;
            font-size: 13px;
            transition: all linear 0.25s;
        }

        .profile-card-2 .profile-icons .fa {
            margin: 5px;
        }

        .profile-card-2:hover img {
            filter: grayscale(100%);
        }

        .profile-card-2:hover .profile-name {
            bottom: 80px;
        }

        .profile-card-2:hover .profile-username {
            bottom: 60px;
        }

        .profile-card-2:hover .profile-icons {
            right: 40px;
        }

        .profile-card-3 {
            background-color: #FFF;
            border-radius: 5px;
            box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            margin: 10px auto;
            cursor: pointer;
            padding: 25px 15px;
        }

        .profile-card-3 .profile-name {
            font-weight: bold;
            color: #21304e;
        }

        .profile-card-3 .profile-location {
            color: #999;
            font-size: 13px;
            font-weight: 600;
        }

        .profile-card-3 img {
            height: 100px;
            width: 100px;
            object-fit: cover;
            margin: 10px auto;
            border-radius: 50%;
            transition: all linear 0.25s;
        }

        .profile-card-3 .profile-description {
            font-size: 13px;
            color: #777;
            padding: 10px;
        }

        .profile-card-3 .profile-icons {
            margin: 15px 0px;
        }

        .profile-card-3 .profile-icons .fa {
            color: #fe455a;
            margin: 0px 5px;
        }

        .profile-card-3:hover img {
            height: 110px;
            width: 110px;
            margin: 5px auto;
        }

        .profile-card-4 {
            max-width: 300px;
            background-color: #FFF;
            border-radius: 5px;
            box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            margin: 10px auto;
            cursor: pointer;
        }

        .profile-card-4 img {
            transition: all 0.25s linear;
        }

        .profile-card-4 .profile-content {
            position: relative;
            padding: 15px;
            background-color: #FFF;
        }

        .profile-card-4 .profile-name {
            font-weight: bold;
            position: absolute;
            left: 0px;
            right: 0px;
            top: -70px;
            color: #FFF;
            font-size: 17px;
        }

        .profile-card-4 .profile-name p {
            font-weight: 600;
            font-size: 13px;
            letter-spacing: 1.5px;
        }

        .profile-card-4 .profile-description {
            color: #777;
            font-size: 12px;
            padding: 10px;
        }

        .profile-card-4 .profile-overview {
            padding: 15px 0px;
        }

        .profile-card-4 .profile-overview p {
            font-size: 10px;
            font-weight: 600;
            color: #777;
        }

        .profile-card-4 .profile-overview h4 {
            color: #273751;
            font-weight: bold;
        }

        .profile-card-4 .profile-content::before {
            content: "";
            position: absolute;
            height: 20px;
            top: -10px;
            left: 0px;
            right: 0px;
            background-color: #FFF;
            z-index: 0;
            transform: skewY(3deg);
        }

        .profile-card-4:hover img {
            transform: rotate(5deg) scale(1.1, 1.1);
            filter: brightness(110%);
        }

        .profile-card-5 {
            max-width: 300px;
            background-color: #FFF;
            border-radius: 5px;
            box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            margin: 10px auto;
            cursor: pointer;
            padding: 50px 15px 25px 15px;
        }

        .profile-card-5 img {
            height: 100px;
            width: 100px;
            object-fit: cover;
            margin: 10px auto;
            border-radius: 50%;
            transition: all linear 0.25s;
            position: relative;
        }

        .profile-card-5::before {
            content: "";
            position: absolute;
            top: -60px;
            right: 0px;
            left: 0px;
            height: 170px;
            background-color: #4fb96e;
            transform: skewY(-20deg);
        }

        .profile-card-5 .profile-name {
            padding-top: 15px;
            font-weight: bold;
            color: #333;
        }

        .profile-card-5 .profile-designation {
            font-size: 13px;
            color: #777;
        }

        .profile-card-3 .profile-location {
            color: #999;
            font-size: 13px;
            font-weight: 600;
        }

        .profile-card-5 .profile-description {
            font-size: 13px;
            color: #777;
            padding: 10px;
        }

        .profile-card-5 .profile-overview {
            padding: 15px 0px;
        }

        .profile-card-5 .profile-overview p {
            color: #777;
            font-size: 13px;
        }

        .profile-card-5 .profile-overview h2 {
            font-weight: bold;
            color: #1e2832;
        }

        .profile-card-5 .profile-icons .fa {
            margin: 7px;
            color: #4fb96e;
        }

        .profile-card-5:hover img {
            transform: rotate(-5deg);
        }

        .profile-card-6 {
            max-width: 300px;
            background-color: #FFF;
            border-radius: 5px;
            box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            margin: 10px auto;
            cursor: pointer;
        }

        .profile-card-6 img {
            transition: all 0.15s linear;
        }

        .profile-card-6 .profile-name {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 25px;
            font-weight: bold;
            color: #FFF;
            padding: 15px 20px;
            background: linear-gradient(140deg, rgba(0, 0, 0, 0.4) 50%, rgba(255, 255, 0, 0) 50%);
            transition: all 0.15s linear;
        }

        .profile-card-6 .profile-position {
            position: absolute;
            color: rgba(255, 255, 255, 0.4);
            left: 30px;
            top: 100px;
            transition: all 0.15s linear;
        }

        .profile-card-6 .profile-overview {
            position: absolute;
            bottom: 0px;
            left: 0px;
            right: 0px;
            background: linear-gradient(0deg, rgba(0, 0, 0, 0.4) 50%, rgba(255, 255, 0, 0));
            color: #FFF;
            padding: 50px 0px 20px 0px;
            transition: all 0.15s linear;
        }

        .profile-card-6 .profile-overview h3 {
            font-weight: bold;
        }

        .profile-card-6 .profile-overview p {
            color: rgba(255, 255, 255, 0.7);
        }

        .profile-card-6:hover img {
            filter: brightness(80%);
        }

        .profile-card-6:hover .profile-name {
            padding-left: 25px;
            padding-top: 20px;
        }

        .profile-card-6:hover .profile-position {
            left: 40px;
        }

        .profile-card-6:hover .profile-overview {
            padding-bottom: 25px;
        }

        .profile-card-7 {
            background-color: #FFF;
            border-radius: 5px;
            box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            margin: 10px auto;
            cursor: pointer;
        }

        .profile-card-7 .profile-content {
            padding: 60px 30px 30px 30px;
            background-color: #FFF;
            position: relative;
        }

        .profile-card-7 .profile-content img {
            position: absolute;
            height: 80px;
            width: 80px;
            border-radius: 50%;
            top: -40px;
            border: 5px solid #FFF;
        }

        .profile-card-7 .profile-content .profile-name {
            position: absolute;
            font-size: 17px;
            font-weight: bold;
            top: -35px;
            left: 125px;
            color: #FFF;
        }

        .profile-card-7 .profile-overview {
            padding: 5px 0px;
        }

        .profile-card-7 .profile-overview p {
            color: #777;
            font-size: 11px;
            font-weight: 600;
        }

        .profile-card-7 .profile-overview h5 {
            color: #142437;
            font-weight: bold;
        }

        .profile-card-8 {
            background: linear-gradient(#09121c, #36445a);
            border-radius: 5px;
            box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            margin: 10px auto;
            cursor: pointer;
            transition: all 0.25s linear;
        }

        .profile-card-8 .profile-name {
            position: absolute;
            left: 0px;
            right: 0px;
            top: 25px;
            color: #58d683;
            font-size: 17px;
            font-weight: bold;
        }

        .profile-card-8 .profile-designation {
            position: absolute;
            left: 0px;
            right: 0px;
            top: 50px;
            color: #FFF;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .profile-card-8 .profile-icons {
            position: absolute;
            left: 0px;
            right: 0px;
            top: 80px;
            color: rgba(255, 255, 255, 0.7);
        }

        .profile-card-8 .profile-icons .fa {
            margin: 5px;
        }

        .profile-card-8:hover {
            transform: scale(1.05, 1.05);
        }

        .profile-card-9 {
            border-radius: 10px;
            box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            margin: 10px auto;
            cursor: pointer;
            padding: 30px 15px;
            background-color: #FFF;
            transition: all 0.25s linear;
        }

        .profile-card-9 img {
            height: 120px;
            width: 120px;
            border-radius: 50%;
            margin: 10px auto;
        }

        .profile-card-9 .profile-name {
            font-size: 15px;
            color: #3249b9;
            font-weight: 600;
        }

        .profile-card-9 .profile-designation {
            font-size: 13px;
            color: #777;
        }

        .profile-card-9 .profile-description {
            padding: 10px;
            font-size: 13px;
            color: #777;
            margin: 15px 0px;
            background-color: #F1F2F3;
            border-radius: 5px;
        }

        .profile-card-9 a {
            padding: 10px 15px;
            background-color: #3249b9;
            color: #FFF;
            font-size: 11px;
            border-radius: 25px;
        }

        .profile-card-9:hover {
            transform: scale(1.05, 1.05);
        }

        .profile-card-10 {
            border-radius: 5px;
            box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            margin: 10px auto;
            cursor: pointer;
            padding: 30px 15px;
            background-color: #1f2124;
            color: #EEE;
        }

        .profile-card-10 img {
            margin: 10px auto;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 10px solid transparent;
            box-shadow: 0px 0px 0px 2px #64c17b;
            transition: all 0.25s linear;
        }

        .profile-card-10 .profile-name {
            color: #FFF;
            font-weight: bold;
            font-size: 17px;
        }

        .profile-card-10 .profile-location {
            font-size: 13px;
            opacity: 0.7;
        }

        .profile-card-10 .profile-description {
            padding: 10px;
            font-size: 13px;
        }

        .profile-card-10 .profile-icons .fa {
            color: #ffc75e;
            margin: 10px;
        }

        .profile-card-10:hover img {
            transform: scale(1.1);
        }
    </style>

    <main>



        <?php $this->load->view('template/festavalive/topmenu'); ?>


        <section class="about-section section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-12 mb-4 mb-lg-0">
                        <h2 class="text-white text-center mb-4 mt-3">DAFTAR DISCIPLES COMMUNITY</h2>
                    </div>

                </div>
            </div>
        </section>



        <section class="page-content section-padding">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <h5 class="text-muted">Filter Nama Disciples Community</h5>
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="">Kategori DC</label>
                                    <select name="idkategoridc" id="idkategoridc" class="form-control select2">
                                        <option value="">Semua</option>
                                        <option value="Umum">Umum</option>
                                        <option value="Youth">Youth</option>
                                        <option value="Young">Young</option>
                                        <option value="Adult">Adult</option>
                                        <option value="Kids">Kids</option>
                                        <option value="Family">Family</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Kabupaten/ Kota</label>
                                        <select name="idkabupaten" id="idkabupaten" class="form-control select2">
                                            <option value="">Pilih kabupaten</option>
                                            <?php
                                            $rsKabupaten = $this->db->query("
                                                                    select * from kabupaten where idprovinsi='001' and deleted_at is null order by namakabupaten
                                                                ");
                                            if ($rsKabupaten->num_rows() > 0) {
                                                foreach ($rsKabupaten->result() as $row) {
                                                    echo '
                                                            <option value="' . $row->idkabupaten . '">' . $row->namakabupaten . '</option>
                                                    ';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label for="" class="">Kecamatan</label>
                                    <select name="idkecamatan" id="idkecamatan" class="form-control select2">
                                        <option value="">Pilih kecamatan ...</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="" class="">Cari Nama DC</label>
                                    <input type="text" name="carinamadc" id="carinamadc" class="form-control" placeholder="Cari berdasarkan nama dc">
                                </div>
                                <div class="col-md text-center mt-3">
                                    <button class="btn btn-primary" id="btnCari"><i class="fa fa-search me-2"></i>Cari</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>

                        <div class="col-12">
                            <div class="row" id="divListDC">
                                <?php
                                if ($rsDC->num_rows() > 0) {
                                    foreach ($rsDC->result() as $row) {

                                        if (!empty($row->fotodm)) {
                                            $fotodm = base_url('admin/uploads/jemaat/' . $row->fotodm);
                                        } else {
                                            $fotodm = base_url('images/bg-dc.png');
                                        }

                                        echo '
                                                <div class="col-md-4">
                                                    <div class="profile-card-2 d-flex justify-content-center"><img src="' . $fotodm . '" class="img img-responsive">
                                                        <div class="profile-name">' . $row->namadc . '</div>
                                                        <div class="profile-username">' . $row->namadm . '</div>
                                                        <div class="profile-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a></div>
                                                        <a href="' . site_url('disciples_community/bergabung/' . $this->encrypt->encode($row->iddc)) . '" class="btn btn-primary profile-buttons">Bergabung Sekarang</a>
                                                    </div>
                                                </div>
                                                ';
                                    }
                                }
                                ?>

                            </div>
                        </div>



                    </div>
        </section>






    </main>


    <?php $this->load->view('template/festavalive/footer'); ?>

    <script>
        $('#idkabupaten').change(function(e) {
            var idkabupaten = $(this).val();
            getKecamatan(idkabupaten);
        });

        // $('#idkecamatan').change(function(e) {
        //   var idkecamatan = $(this).val();
        //   getdesa(idkecamatan);
        // });

        function getKecamatan(idkabupaten, idkecamatandefault = "") {

            $('#idkecamatan').empty();
            // console.log(idkabupaten);

            addSelectOption('idkecamatan', '', 'Pilih kecamatan ...')

            $.ajax({
                    url: '<?= site_url('disciples_community/getKecamatan') ?>',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        'idkabupaten': idkabupaten
                    },
                })
                .done(function(response) {
                    // console.log(response);
                    if (response.length > 0) {
                        for (var i = 0; i < response.length; i++) {
                            // console.log(response[i]);
                            addSelectOption('idkecamatan', response[i]['idkecamatan'], response[i]['namakecamatan']);
                            if (idkecamatandefault != "" && idkecamatandefault == response[i]['idkecamatan']) {
                                $('#idkecamatan').val(response[i]['idkecamatan']).trigger('change');
                            }
                        }
                    }
                })
                .fail(function() {
                    console.log('error getKecamatan');
                });

        }

        $(document).on('click', '#btnCari', function() {
            console.log("1");
            cari();
        });

        function cari() {
            var idkategoridc = $('#idkategoridc').val();
            var idkabupaten = $('#idkabupaten').val();
            var idkecamatan = $('#idkecamatan').val();
            var cari = $('#carinamadc').val();

            $('#divListDC').empty();

            var baseURL = "<?php echo base_url() ?>";
            $.ajax({
                    url: '<?php echo site_url('disciples_community/getListDC') ?>',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        'idkategoridc': idkategoridc,
                        'idkabupaten': idkabupaten,
                        'idkecamatan': idkecamatan,
                        'cari': cari,
                    },
                })
                .done(function(response) {
                    if (response.success && response.data.length > 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            var fotodm;
                            if (response.data[i]['fotodm'] && response.data[i]['fotodm'] !== "") {
                                fotodm = baseURL + "admin/uploads/jemaat/" + response.data[i]['fotodm'];
                            } else {
                                fotodm = baseURL + "images/bg-dc.png";
                            }

                            var addText = `
                    <div class="col-md-4">
                        <div class="profile-card-2 d-flex justify-content-center">
                            <img src="${fotodm}" class="img img-responsive">
                            <div class="profile-name">${response.data[i]['namadc']}</div>
                            <div class="profile-username">${response.data[i]['namadm']}</div>
                            <div class="profile-icons">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </div>
                            <a href="${baseURL}dc/bergabungsekarang" class="btn btn-primary profile-buttons">Bergabung Sekarang</a>
                        </div>
                    </div>
                `;

                            $('#divListDC').append(addText);
                        }
                    } else {
                        $('#divListDC').html('<p>Tidak ada data ditemukan</p>');
                    }
                })
                .fail(function(xhr, status, error) {
                    console.error('Error:', error);
                    $('#divListDC').html('<p>Terjadi kesalahan saat memuat data</p>');
                });
        }
    </script>

</body>

</html>