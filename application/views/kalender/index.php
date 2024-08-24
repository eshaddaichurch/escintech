<?php $this->load->view('template/festavalive/header'); ?>

<body>

  <style>
    .card-event {
      margin: 0;
      padding: 0;
      /* background-color: #ff6d6d; */
      font-family: arial
    }

    .box {
      margin: 0 10%;
      height: 100%;
      overflow: hidden;
      padding: 10px 0 40px 60px
    }

    .box ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      position: relative;
      transition: all 0.5s linear;
      top: 0
    }

    .box ul:last-of-type {
      top: 80px
    }

    .box ul:before {
      content: "";
      display: block;
      width: 0;
      height: 100%;
      border: 0.3px dashed;
      color: #D0B8A8;

      position: absolute;
      top: 0;
      left: 30px
    }

    .box ul li {
      margin: 20px 60px 60px;
      position: relative;
      padding: 10px 10px;
      background: rgba(227, 225, 217, 1);
      color: #000000;
      border-radius: 10px;
      line-height: 20px;
      width: 75%
    }


    .box ul li>span {
      content: "";
      display: block;
      width: 0;
      height: 100%;
      border: 1px solid;
      position: absolute;
      top: 0;
      left: -30px
    }

    .box ul li>span:before,
    .box ul li>span:after {
      content: "";
      display: block;
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background: #000000;
      border: 2px solid;
      position: absolute;
      left: -7.5px
    }

    .box ul li>span:before {
      top: -10px
    }

    .box ul li>span:after {
      top: 95%
    }

    .box .title {
      text-transform: uppercase;
      font-weight: 700;
      font-size: 12px;
      margin-bottom: 5px
    }

    .box .info:first-letter {
      text-transform: capitalize;
      line-height: 1.7
    }

    .box .name {
      margin-top: 10px;
      text-transform: capitalize;
      font-style: italic;
      text-align: right;
      margin-right: 20px
    }
    .jam{
      /* color:white; */
      font-style: italic;

    }


    .box .time span {
      position: absolute;
      left: -100px;
      /* color: #fff; */
      font-size: 80%;
      font-weight: bold;
    }

    .box .time span:first-child {
      top: -16px
    }
    

    .box .time span:last-child {
      top: 1%
    }


    .arrow {
      position: absolute;
      top: 105%;
      left: 22%;
      cursor: pointer;
      height: 20px;
      width: 20px
    }

    .arrow:hover {
      -webkit-animation: arrow 1s linear infinite;
      -moz-animation: arrow 1s linear infinite;
      -o-animation: arrow 1s linear infinite;
      animation: arrow 1s linear infinite;
    }

    .box ul:last-of-type .arrow {
      position: absolute;
      top: 105%;
      left: 22%;
      transform: rotateX(180deg);
      cursor: pointer;
    }

    svg {
      width: 20px;
      height: 20px
    }

    @keyframes arrow {

      0%,
      100% {
        top: 105%
      }

      50% {
        top: 106%
      }
    }

    @-webkit-keyframes arrow {

      0%,
      100% {
        top: 105%
      }

      50% {
        top: 106%
      }
    }

    @-moz-keyframes arrow {

      0%,
      100% {
        top: 105%
      }

      50% {
        top: 106%
      }
    }

    @-o-keyframes arrow {

      0%,
      100% {
        top: 105%
      }

      50% {
        top: 106%
      }
    }
  </style>

  <main>



    <?php $this->load->view('template/festavalive/topmenu'); ?>


    <section class="about-section section-padding">
      <div class="container">
        <div class="row">

          <div class="col-12 mb-4 mb-lg-0">
            <h2 class="text-white text-center mb-4 mt-3">JADWAL ELSHADDAI EVENT </h2>
          </div>

        </div>
      </div>
    </section>


    <section class="page-content section-padding">
      <div class="container">
        <div class="row justify-content-center">

          <div class="col-12 card-event">
            <h5>Januari 2024</h5>
            <div class="box">
              <ul id="first-list">

                <?php
                if ($rsEvent->num_rows() > 0) {
                  foreach ($rsEvent->result() as $row) {
                    echo '
                      <li>
                        
                        <span></span>
                       
                        <div class="title">' . $row->jenisjadwal . '</div>
                        <div class="info">' . $row->namaevent . '</div>
                         <div class="jam"><sub>Pukul ' . date('H:m', strtotime($row->tgljadwal)) . '</sub></div>
                        <div class="time">
                          <span>' . date('M', strtotime($row->tgljadwal)) . '</span>
                          <span>' . date('D,d', strtotime($row->tgljadwal)) . '</span>
                        
                          
                        </div>
                      </li>
                      ';
                  }
                }
                ?>


                <li>
                  <span></span>
                  <div class="title">summery #01</div>
                  <div class="info">the best animation , the best toturials you would ever see here only . you can learn how to animate and how to use SVG . even else you can add your own animations .</div>
                  <div class="name">- eng. amr -</div>
                  <div class="time">
                    <span>29<sup>th</sup></span>
                    <span>11:36 AM</span>
                  </div>
                </li>
                <li>
                  <span></span>
                  <div class="title">comment #02</div>
                  <div class="info">the best animation , the best toturials you would ever see . what about canvas ?? do you like it ..</div>
                  <div class="name">- dr. ahmed -</div>
                  <div class="time">
                    <span>FEB, 2<sup>nd</sup></span>
                    <span>02:00 PM</span>
                  </div>
                </li>


              </ul>





              <script src="JavaScript/timeline-V2.js"></script>
            </div>



          </div>
        </div>
    </section>






  </main>


  <?php $this->load->view('template/festavalive/footer'); ?>



  <script>
    $(document).ready(function() {


    });

    var downArrow = document.getElementById("btn1");
    var upArrow = document.getElementById("btn2");

    downArrow.onclick = function() {
      'use strict';
      document.getElementById("first-list").style = "top:-620px";
      document.getElementById("second-list").style = "top:-620px";
      downArrow.style = "display:none";
      upArrow.style = "display:block";
    };

    upArrow.onclick = function() {
      'use strict';
      document.getElementById("first-list").style = "top:0";
      document.getElementById("second-list").style = "top:80px";
      upArrow.style = "display:none";
      downArrow.style = "display:block";
    };
  </script>


</body>

</html>