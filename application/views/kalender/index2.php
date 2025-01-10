<?php $this->load->view('template/festavalive/header'); ?>

<body>
    <style>
        .mobile-wrapper {
            background: #fff;
            /* relative with .today-box::before*/
            z-index: 1;
            /*positive*/
            // PARENT
            position: relative;
            /*---------*/
            width: 380px;
            min-height: 100%;
            margin: auto;
            padding: 10px 0 20px;
            border-radius: 10px;
            box-shadow: 0px 10px 30px -10px #000;
            overflow: hidden;

        }

        .header {
            padding-bottom: 15px;
            margin-bottom: 40px;

            .container {
                position: relative;

                span {
                    color: #444;

                    font: {
                        family: 'Ramabhadra';
                        size: 21px;
                        weight: 700;
                    }
                }

                h1 {
                    margin-top: 5px;
                    color: #919294;

                    font: {
                        size: 13px;
                        weight: 300;
                    }
                }

                .menu-toggle {
                    width: 25px;
                    height: 25px;
                    background: #fff;
                    padding: 24px;
                    border-radius: 50%;
                    direction: rtl;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    box-shadow: 0px 10px 30px -14px #000;
                    position: absolute;
                    top: 0;
                    right: 0;
                    cursor: pointer;

                    span {
                        display: block;
                        width: 25px;
                        height: 2px;
                        background: #777;
                        border-radius: 2px;
                        transition: all 300ms ease;

                        &:not(:last-child) {
                            margin-bottom: 5px;
                        }

                        &:first-child {
                            width: 20px;
                        }

                        &:last-child {
                            width: 15px;
                        }
                    }

                    &:hover span:first-child,
                    &:hover span:last-child {
                        width: 100%;
                    }
                }

                &::before {
                    content: "";
                    display: block;
                    width: 0;
                    height: 0;
                    border: 6px solid transparent;
                    border-left-color: #e8e8e8;
                    position: absolute;
                    bottom: -13px;
                    right: 0px;
                }

                &::after {
                    content: "";
                    display: block;
                    width: calc(100% - 10px);
                    height: 2px;
                    background-color: #e8e8e8;
                    position: relative;
                    top: 8px;
                }
            }
        }

        .today-box {
            background: linear-gradient(to left, #485fed, rgba(255, 44, 118, .25)), #485fed;
            color: #FFF;
            padding: 37px 40px;
            position: relative;
            box-shadow: 0px 0px 40px -9px #485fed;
            margin-bottom: 50px;

            &::before {
                content: "";
                background: linear-gradient(to left, #485fed, rgba(255, 44, 118, .25)), #485fed;
                opacity: 0.4;
                z-index: -1; // CHILD /*negative*/ /* relative with .mobile-wrapper it's his parent background*/
                display: block;
                width: 100%;
                height: 40px;
                margin: auto;
                position: absolute;
                bottom: -13px;
                left: 50%;
                transform: translatex(-50%);
                border-radius: 50%;
                box-shadow: 0px 0px 40px 0 #485fed;
            }

            .breadcrumb {
                font-weight: 300;
                position: relative;

                &::after {
                    content: "\f3d1";
                    font-family: 'Ionicons';
                    vertical-align: middle;
                    font-size: 12px;
                    font-weight: 100;
                    display: inline-block;
                    color: #fff;
                    text-align: center;
                    position: absolute;
                    left: 45px;
                    top: 3px;
                }
            }

            .date-title {
                font-size: 20px;
                margin: 7px 0 0 0;
                letter-spacing: 1px;
                font-weight: 600;
                text-shadow: 0px 0px 5px rgba(#000, 0.15);

            }

            .plus-icon {
                border: 2px solid rgba(#FFF, 0.6);
                border-radius: 50%;
                box-shadow: 0px 10px 30px -14px #000;
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                right: 40px;
                cursor: pointer;
                transition: all 350ms ease;
                transition-timing-function: cubic-bezier(0.05, 1.8, 1, 1.57);

                &:hover {
                    transform: translateY(-40%);
                }

                i {
                    font-size: 22px;
                    font-weight: 700;
                    background: #fff;
                    color: #777;
                    width: 45px;
                    height: 45px;
                    border: 6px solid #485fed;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                &:active {
                    top: 52%;
                    transform: translatey(-52%);
                    right: 38px;
                    box-shadow: 0px 8px 30px -14px #000;

                }
            }
        }


        .upcoming-events {
            .container {
                h3 {
                    color: #333;
                    font-size: 17px;
                    margin-bottom: 30px;
                    position: relative;

                    &::before {
                        content: "";
                        display: block;
                        width: 58%;
                        height: 2px;
                        background-color: #e8e8e8;
                        position: absolute;
                        top: 60%;
                        transform: translatey(-60%);
                        right: 0;
                    }

                    &::after {
                        content: "\f3ff";
                        font-family: 'Ionicons';
                        color: rgba(0, 0, 0, 0.1);
                        vertical-align: middle;
                        font-size: 36px;
                        font-weight: 100;
                        display: inline-block;
                        background: #fff;
                        color: #919294;
                        width: 38px;
                        text-align: center;
                        position: absolute;
                        right: 60px;
                        top: -10px;
                    }
                }

                .events-wrapper {
                    margin-bottom: 30px;

                    .event {
                        position: relative;
                        margin-bottom: 25px;
                        padding-left: 30px;
                        cursor: pointer;

                        i {
                            font-size: 24px;
                            font-weight: 100;
                            position: absolute;
                            left: 0;
                            top: -4px;
                        }

                        .event__point {
                            margin: 0;
                            color: #555;

                            font: {
                                size: 15px;
                                weight: 800;
                            }

                            letter-spacing: 1px;
                        }

                        .event__duration {
                            position: absolute;
                            top: 5px;
                            right: 0;
                            color: #999;

                            font: {
                                size: 10px;
                                weight: 800;
                                style: italic;
                            }
                        }

                        .event__description {
                            margin-top: 10px;
                            color: #919294;
                            font-size: 13px;
                            font-weight: 300;

                        }

                        &.active {
                            background: #e8e8e8;
                            padding: 17px 0 5px 60px;
                            margin-bottom: 38px;
                            border-radius: 5px;

                            &::after {
                                content: "";
                                display: block;
                                width: 90%;
                                height: 10px;
                                background: #fff;
                                border: 2px solid #ddd;
                                border-top: 0;
                                border-radius: 0 0 5px 5px;
                                position: absolute;
                                bottom: -10px;
                                left: 50%;
                                transform: translatex(-50%);
                            }

                            i {
                                position: absolute;
                                left: 25px;
                                top: 17px;
                            }

                            .event__description {

                                &::before,
                                &::after {
                                    content: "\f3d1";
                                    font-family: 'Ionicons';
                                    font-size: 32px;
                                    display: inline-block;
                                    color: #919294;
                                    text-align: center;
                                    position: absolute;
                                    right: 30px;
                                    top: 50%;
                                    transform: translateY(-50%);
                                    cursor: pointer;
                                }

                                &::before {
                                    right: 45px;
                                    font-size: 22px;
                                    transition: all 550ms ease;
                                    transition-timing-function: cubic-bezier(0.05, 1.8, 1, 1.57);
                                }
                            }

                            &:hover .event__description::before {
                                transform: translate(15px, -12px);
                            }
                        }
                    }
                }
            }
        }


        .hot {
            color: #ee6b51;
        }

        .done {
            color: #999 !important;
        }

        .icon-in-active-mode {
            color: #43ff28;
            font-size: 20px !important;
        }

        .upcoming {
            font-weight: bold;
            color: #777
        }


        .add-event-button {
            display: flex;
            align-items: center;
            margin-left: auto;
            border: 0;
            padding: 0;
            background: linear-gradient(to left, #485fed, rgba(255, 44, 118, .25)), #485fed;
            border-radius: 50px;
            cursor: pointer;
            box-shadow: 0px 0px 40px -9px #485fed;

            &:active {
                position: relative;
                top: 2px;
                left: 2px;
            }

            .add-event-button__title {
                color: #FFF;
                padding: 0 18px 0 23px;
                text-shadow: 0px 0px 5px rgba(#000, 0.2);

                font: {
                    family: 'Lato';
                    size: 15px;
                    weight: 600;
                }
            }

            .add-event-button__icon {
                display: inline-block;
                background: rgba(#FFF, 0.1);
                padding: 0 17px 0 12px;
                height: 100%;

                i {
                    margin: 0;
                    color: #fff;
                    font-size: 25px;
                    padding: 13px 0;
                }
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

                        <div class="mobile-wrapper">

                            <!--======= Upcoming Events =======-->

                            <section class="upcoming-events">
                                <div class="container">
                                    <h3>
                                        Lastest Events

                                    </h3>
                                    <div class="events-wrapper">
                                        <div class="event">
                                            <i class="ion ion-ios-flame hot"></i>
                                            <h4 class="event__point">11:00 am</h4>
                                            <span class="event__duration">in 30 minutes.</span>
                                            <p class="event__description">
                                                Monday briefing with the team (...).
                                            </p>
                                        </div>
                                        <div class="event">
                                            <i class="ion ion-ios-flame done"></i>
                                            <h4 class="event__point">12:00 pm</h4>
                                            <span class="event__duration">in 1 hour.</span>
                                            <p class="event__description">
                                                Lunch with Paul Mccartney @Burgers House!
                                            </p>
                                        </div>
                                        <div class="event active">
                                            <i class="ion ion-ios-radio-button-on icon-in-active-mode"></i>
                                            <h4 class="event__point">14:00 pm</h4>
                                            <p class="event__description">
                                                Meet clients from project.
                                            </p>
                                        </div>
                                        <div class="event">
                                            <i class="ion ion-ios-flame-outline upcoming"></i>
                                            <h4 class="event__point">20:45 pm</h4>
                                            <span class="event__duration">in 45 minutes.</span>
                                            <p class="event__description">
                                                Watch sci-fi series.
                                            </p>
                                        </div>
                                        <div class="event">
                                            <i class="ion ion-ios-flame-outline upcoming"></i>
                                            <h4 class="event__point">23:15 pm</h4>
                                            <span class="event__duration">in 20 minutes.</span>
                                            <p class="event__description">
                                                Customer dialog on Skype.
                                            </p>
                                        </div>
                                    </div>
                                    <button class="add-event-button">
                                        <span class="add-event-button__title">Add Event</span>

                                        <span class="add-event-button__icon">
                                            <i class="ion ion-ios-star-outline"></i>
                                        </span>


                                    </button>
                                </div>
                            </section>


                        </div>


                    </div>
                </div>
        </section>






    </main>


    <?php $this->load->view('template/festavalive/footer'); ?>



    <script>
        $(document).ready(function() {


        });

        // • based on and inspired from: https://dribbble.com/shots/4594817-Calendar-Plan-Tasks-Events-App-Freebies

        // • May 25, 2018 
        // • CSS Daily Practice

        // • Front-end Daily
        // • frontenddaily.blogspot.com
    </script>


</body>

</html>