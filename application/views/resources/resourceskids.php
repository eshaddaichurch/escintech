<?php

use PhpParser\Node\Stmt\Echo_;

$this->load->view('template/festavalive/header'); ?>



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
    /**
* Template Name: Selecao
* Template URL: https://bootstrapmade.com/selecao-bootstrap-template/
* Updated: Aug 07 2024 with Bootstrap v5.3.3
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/

    /*--------------------------------------------------------------
# Font & Color Variables
# Help: https://bootstrapmade.com/color-system/
--------------------------------------------------------------*/
    /* Fonts */
    :root {
      --default-font: "Roboto", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
      --heading-font: "Raleway", sans-serif;
      --nav-font: "Poppins", sans-serif;
    }

    /* Global Colors - The following color variables are used throughout the website. Updating them here will change the color scheme of the entire website */
    :root {
      --background-color: #ffffff;
      /* Background color for the entire website, including individual sections */
      --default-color: #444444;
      /* Default color used for the majority of the text content across the entire website */
      --heading-color: #2a2c39;
      /* Color for headings, subheadings and title throughout the website */
      --accent-color: #ef6603;
      /* Accent color that represents your brand on the website. It's used for buttons, links, and other elements that need to stand out */
      --surface-color: #ffffff;
      /* The surface color is used as a background of boxed elements within sections, such as cards, icon boxes, or other elements that require a visual separation from the global background. */
      --contrast-color: #ffffff;
      /* Contrast color for text, ensuring readability against backgrounds of accent, heading, or default colors. */
    }

    /* Nav Menu Colors - The following color variables are used specifically for the navigation menu. They are separate from the global colors to allow for more customization options */
    :root {
      --nav-color: #ffffff;
      /* The default color of the main navmenu links */
      --nav-hover-color: #ef6603;
      /* Applied to main navmenu links when they are hovered over or active */
      --nav-mobile-background-color: #ffffff;
      /* Used as the background color for mobile navigation menu */
      --nav-dropdown-background-color: #ffffff;
      /* Used as the background color for dropdown items that appear when hovering over primary navigation items */
      --nav-dropdown-color: #060606;
      /* Used for navigation links of the dropdown items in the navigation menu. */
      --nav-dropdown-hover-color: #ef6603;
      /* Similar to --nav-hover-color, this color is applied to dropdown navigation links when they are hovered over. */
    }

    /* Color Presets - These classes override global colors when applied to any section or element, providing reuse of the sam color scheme. */

    .light-background {
      --background-color: #f9f9f9;
      --surface-color: #ffffff;
    }

    .dark-background {
      --background-color: #2a2c39;
      --default-color: #ffffff;
      --heading-color: #ffffff;
      --surface-color: #404356;
      --contrast-color: #ffffff;
    }

    /* Smooth scroll */
    :root {
      scroll-behavior: smooth;
    }

    /*--------------------------------------------------------------
# General Styling & Shared Classes
--------------------------------------------------------------*/
    body {
      color: var(--default-color);
      background-color: var(--background-color);
      font-family: var(--default-font);
    }

    a {
      color: var(--accent-color);
      text-decoration: none;
      transition: 0.3s;
    }

    a:hover {
      color: color-mix(in srgb, var(--accent-color), transparent 25%);
      text-decoration: none;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      color: var(--heading-color);
      font-family: var(--heading-font);
    }

    /* PHP Email Form Messages
------------------------------*/
    

    @keyframes php-email-form-loading {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }

    /*--------------------------------------------------------------
# Global Header
--------------------------------------------------------------*/
    .header {
      --background-color: rgba(255, 255, 255, 0);
      --heading-color: #ffffff;
      color: var(--default-color);
      background-color: var(--background-color);
      padding: 20px 0;
      transition: all 0.5s;
      z-index: 997;
    }

    .header .logo {
      line-height: 1;
    }

    .header .logo img {
      max-height: 32px;
      margin-right: 8px;
    }

    .header .logo h1 {
      font-size: 30px;
      margin: 0;
      font-weight: 700;
      color: var(--heading-color);
    }

    .scrolled .header {
      box-shadow: 0px 0 18px rgba(0, 0, 0, 0.1);
    }

    /* Global Header on Scroll
------------------------------*/
    .scrolled .header {
      --background-color: rgba(42, 44, 57, 0.9);
    }

    /*--------------------------------------------------------------

    /*--------------------------------------------------------------
# Global Page Titles & Breadcrumbs
--------------------------------------------------------------*/
    .page-title {
      color: var(--default-color);
      background-color: var(--background-color);
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      padding: 160px 0 80px 0;
      text-align: center;
      position: relative;
    }

    .page-title:before {
      content: "";
      background-color: color-mix(in srgb, var(--background-color), transparent 50%);
      position: absolute;
      inset: 0;
    }

    .page-title h1 {
      font-size: 42px;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .page-title .breadcrumbs ol {
      display: flex;
      flex-wrap: wrap;
      list-style: none;
      justify-content: center;
      padding: 0;
      margin: 0;
      font-size: 16px;
      font-weight: 400;
    }

    .page-title .breadcrumbs ol li+li {
      padding-left: 10px;
    }

    .page-title .breadcrumbs ol li+li::before {
      content: "/";
      display: inline-block;
      padding-right: 10px;
      color: color-mix(in srgb, var(--default-color), transparent 50%);
    }

    /*--------------------------------------------------------------
# Global Sections
--------------------------------------------------------------*/
    section,
    .section {
      color: var(--default-color);
      background-color: var(--background-color);
      padding: 60px 0;
      scroll-margin-top: 77px;
      overflow: clip;
    }

    /*--------------------------------------------------------------
# Global Section Titles
--------------------------------------------------------------*/
    .section-title {
      padding-bottom: 60px;
      position: relative;
    }

    .section-title h2 {
      font-size: 14px;
      font-weight: 500;
      padding: 0;
      line-height: 1px;
      margin: 0;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      color: color-mix(in srgb, var(--default-color), transparent 50%);
      position: relative;
    }

    .section-title h2::after {
      content: "";
      width: 120px;
      height: 1px;
      display: inline-block;
      background: var(--accent-color);
      margin: 4px 10px;
    }

    .section-title p {
      color: var(--heading-color);
      margin: 0;
      font-size: 28px;
      font-weight: 700;
      text-transform: uppercase;
      font-family: var(--heading-font);
    }

  

    @keyframes move-forever2 {
      0% {
        transform: translate(-90px, 0%);
      }

      100% {
        transform: translate(85px, 0%);
      }
    }

    @keyframes move-forever3 {
      0% {
        transform: translate(-90px, 0%);
      }

      100% {
        transform: translate(85px, 0%);
      }
    }

    /*--------------------------------------------------------------
# About Section
--------------------------------------------------------------*/
    .about ul {
      list-style: none;
      padding: 0;
    }

    .about ul li {
      padding-bottom: 5px;
      display: flex;
      align-items: center;
    }

    .about ul i {
      font-size: 20px;
      padding-right: 4px;
      color: var(--accent-color);
    }

    .about .read-more {
      background: var(--accent-color);
      color: var(--contrast-color);
      font-family: var(--heading-font);
      font-weight: 500;
      font-size: 16px;
      letter-spacing: 1px;
      padding: 10px 28px;
      border-radius: 5px;
      transition: 0.3s;
      display: inline-flex;
      align-items: center;
      justify-content: center;
    }

    .about .read-more i {
      font-size: 18px;
      margin-left: 5px;
      line-height: 0;
      transition: 0.3s;
    }

    .about .read-more:hover {
      background: color-mix(in srgb, var(--accent-color), transparent 20%);
    }

    .about .read-more:hover i {
      transform: translate(5px, 0);
    }

    /*--------------------------------------------------------------
# Features Section
--------------------------------------------------------------*/
    .features .nav-tabs1 {
      border: 30px;
      color: orange;
    }

    .features .nav-link {
      background-color: var(--surface-color);
      color: var(--heading-color);
      border: 1px solid color-mix(in srgb, var(--default-color), transparent 85%);
      padding: 15px 20px;
      transition: 0.3s;
      border-radius: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      height: 100%;
    }

    .features .nav-link i {
      padding-right: 15px;
      font-size: 48px;
    }

    .features .nav-link h4 {
      font-size: 18px;
      font-weight: 600;
      margin: 0;
    }

    .features .nav-link:hover {
      color: var(--accent-color);
      border-color: var(--accent-color);
    }

    .features .nav-link.active {
      background: var(--accent-color);
      color: var(--contrast-color);
      border-color: var(--accent-color);
    }

    .features .nav-link.active h4 {
      color: var(--contrast-color);
    }

    @media (max-width: 768px) {
      .features .nav-link i {
        padding: 0;
        line-height: 1;
        font-size: 36px;
      }
    }

    @media (max-width: 575px) {
      .features .nav-link {
        padding: 15px;
      }

      .features .nav-link i {
        font-size: 24px;
      }
    }

    .features .tab-content {
      margin-top: 30px;
    }

    .features .tab-pane h3 {
      color: var(--heading-color);
      font-weight: 700;
      font-size: 26px;
    }

    .features .tab-pane ul {
      list-style: none;
      padding: 0;
    }

    .features .tab-pane ul li {
      padding-bottom: 10px;
    }

    .features .tab-pane ul i {
      font-size: 20px;
      padding-right: 4px;
      color: var(--accent-color);
    }

    .features .tab-pane p:last-child {
      margin-bottom: 0;
    }

    /*--------------------------------------------------------------
# Call To Action Section
--------------------------------------------------------------*/
    .call-to-action {
      padding: 80px 0;
      position: relative;
      clip-path: inset(0);
    }

    .call-to-action .container {
      position: relative;
      z-index: 3;
    }

    .call-to-action h3 {
      color: var(--default-color);
      font-size: 28px;
      font-weight: 700;
    }

    .call-to-action p {
      color: var(--default-color);
    }

    .call-to-action .cta-btn {
      font-family: var(--heading-font);
      font-weight: 500;
      font-size: 16px;
      letter-spacing: 1px;
      display: inline-block;
      padding: 12px 40px;
      border-radius: 50px;
      transition: 0.5s;
      margin: 10px;
      background: var(--accent-color);
      color: var(--contrast-color);
    }

    .call-to-action .cta-btn:hover {
      background: color-mix(in srgb, var(--accent-color) 90%, white 15%);
    }

    /*--------------------------------------------------------------
# Services Section
--------------------------------------------------------------*/
    .services .service-item {
      background-color: var(--surface-color);
      box-shadow: 0 5px 30px 0 rgba(0, 0, 0, 0.1);
      padding: 60px 30px 60px 70px;
      transition: all ease-in-out 0.3s;
      border-radius: 18px;
      height: 100%;
      position: relative;
      overflow: hidden;
    }

    .services .service-item .icon {
      position: absolute;
      left: -20px;
      top: calc(50% - 30px);
    }

    .services .service-item .icon i {
      font-size: 64px;
      line-height: 1;
      transition: 0.5s;
    }

    .services .service-item h3 {
      font-weight: 700;
      margin: 10px 0 15px 0;
      font-size: 22px;
      transition: ease-in-out 0.3s;
    }

    .services .service-item p {
      line-height: 24px;
      font-size: 14px;
      margin-bottom: 0;
    }

    @media (min-width: 1365px) {
      .services .service-item:hover {
        transform: translateY(-10px);
      }

      .services .service-item:hover h3 {
        color: var(--accent-color);
      }
    }

    /*--------------------------------------------------------------
# Portfolio Section
--------------------------------------------------------------*/
    .portfolio .portfolio-filters {
      padding: 0;
      margin: 0 auto 20px auto;
      list-style: none;
      text-align: center;
    }

    .portfolio .portfolio-filters li {
      cursor: pointer;
      display: inline-block;
      padding: 8px 20px 10px 20px;
      margin: 0;
      font-size: 15px;
      font-weight: 500;
      line-height: 1;
      margin-bottom: 5px;
      border-radius: 50px;
      transition: all 0.3s ease-in-out;
      font-family: var(--heading-font);
    }

    .portfolio .portfolio-filters li:hover,
    .portfolio .portfolio-filters li.filter-active {
      color: var(--contrast-color);
      background-color: var(--accent-color);
    }

    .portfolio .portfolio-filters li:first-child {
      margin-left: 0;
    }

    .portfolio .portfolio-filters li:last-child {
      margin-right: 0;
    }

    @media (max-width: 575px) {
      .portfolio .portfolio-filters li {
        font-size: 14px;
        margin: 0 0 10px 0;
      }
    }

    .portfolio .portfolio-item {
      position: relative;
      overflow: hidden;
    }

    .portfolio .portfolio-item .portfolio-info {
      opacity: 0;
      position: absolute;
      left: 12px;
      right: 12px;
      bottom: -100%;
      z-index: 3;
      transition: all ease-in-out 0.5s;
      background: color-mix(in srgb, var(--surface-color), transparent 10%);
      padding: 15px;
    }

    .portfolio .portfolio-item .portfolio-info h4 {
      font-size: 18px;
      font-weight: 600;
      padding-right: 50px;
    }

    .portfolio .portfolio-item .portfolio-info p {
      color: color-mix(in srgb, var(--default-color), transparent 30%);
      font-size: 14px;
      margin-bottom: 0;
      padding-right: 50px;
    }

    .portfolio .portfolio-item .portfolio-info .preview-link,
    .portfolio .portfolio-item .portfolio-info .details-link {
      position: absolute;
      right: 50px;
      font-size: 24px;
      top: calc(50% - 14px);
      color: color-mix(in srgb, var(--default-color), transparent 30%);
      transition: 0.3s;
      line-height: 0;
    }

    .portfolio .portfolio-item .portfolio-info .preview-link:hover,
    .portfolio .portfolio-item .portfolio-info .details-link:hover {
      color: var(--accent-color);
    }

    .portfolio .portfolio-item .portfolio-info .details-link {
      right: 14px;
      font-size: 28px;
    }

    .portfolio .portfolio-item:hover .portfolio-info {
      opacity: 1;
      bottom: 0;
    }

    /*--------------------------------------------------------------
# Testimonials Section
--------------------------------------------------------------*/
    .testimonials .testimonial-item {
      background-color: var(--surface-color);
      box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
      box-sizing: content-box;
      padding: 30px;
      margin: 30px 15px;
      position: relative;
      height: 100%;
    }

    .testimonials .testimonial-item .testimonial-img {
      width: 90px;
      border-radius: 50px;
      margin-right: 15px;
    }

    .testimonials .testimonial-item h3 {
      font-size: 18px;
      font-weight: bold;
      margin: 10px 0 5px 0;
    }

    .testimonials .testimonial-item h4 {
      font-size: 14px;
      color: color-mix(in srgb, var(--default-color), transparent 40%);
      margin: 0;
    }

    .testimonials .testimonial-item .stars {
      margin: 10px 0;
    }

    .testimonials .testimonial-item .stars i {
      color: #ffc107;
      margin: 0 1px;
    }

    .testimonials .testimonial-item .quote-icon-left,
    .testimonials .testimonial-item .quote-icon-right {
      color: color-mix(in srgb, var(--accent-color), transparent 50%);
      font-size: 26px;
      line-height: 0;
    }

    .testimonials .testimonial-item .quote-icon-left {
      display: inline-block;
      left: -5px;
      position: relative;
    }

    .testimonials .testimonial-item .quote-icon-right {
      display: inline-block;
      right: -5px;
      position: relative;
      top: 10px;
      transform: scale(-1, -1);
    }

    .testimonials .testimonial-item p {
      font-style: italic;
      margin: 15px auto 15px auto;
    }

    .testimonials .swiper-wrapper {
      height: auto;
    }

    .testimonials .swiper-pagination {
      margin-top: 20px;
      position: relative;
    }

    .testimonials .swiper-pagination .swiper-pagination-bullet {
      width: 12px;
      height: 12px;
      background-color: color-mix(in srgb, var(--default-color), transparent 85%);
      opacity: 1;
    }

    .testimonials .swiper-pagination .swiper-pagination-bullet-active {
      background-color: var(--accent-color);
    }

    @media (max-width: 767px) {
      .testimonials .testimonial-wrap {
        padding-left: 0;
      }

      .testimonials .testimonial-item {
        padding: 30px;
        margin: 15px;
      }

      .testimonials .testimonial-item .testimonial-img {
        position: static;
        left: auto;
      }
    }

    /*--------------------------------------------------------------
# Pricing Section
--------------------------------------------------------------*/
    .pricing .pricing-item {
      background-color: var(--surface-color);
      box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.1);
      padding: 20px;
      text-align: center;
      border-radius: 5px;
      position: relative;
      overflow: hidden;
    }

    .pricing .pricing-item h3 {
      font-weight: 400;
      margin: -20px -20px 20px -20px;
      padding: 20px 15px;
      font-size: 16px;
      font-weight: 600;
      color: color-mix(in srgb, var(--default-color), transparent 20%);
      background: color-mix(in srgb, var(--default-color), transparent 95%);
    }

    .pricing .pricing-item h4 {
      font-size: 36px;
      font-weight: 600;
      font-family: var(--heading-font);
    }

    .pricing .pricing-item h4 sup {
      font-size: 20px;
      top: -15px;
      left: -3px;
    }

    .pricing .pricing-item h4 span {
      color: color-mix(in srgb, var(--default-color), transparent 40%);
      font-size: 16px;
      font-weight: 300;
    }

    .pricing .pricing-item ul {
      padding: 15px 0;
      list-style: none;
      text-align: center;
      line-height: 20px;
      font-size: 14px;
    }

    .pricing .pricing-item ul li {
      padding-bottom: 16px;
    }

    .pricing .pricing-item ul i {
      color: var(--accent-color);
      font-size: 18px;
      padding-right: 4px;
    }

    .pricing .pricing-item ul .na {
      color: color-mix(in srgb, var(--default-color), transparent 40%);
      text-decoration: line-through;
    }

    .pricing .btn-wrap {
      background: color-mix(in srgb, var(--default-color), transparent 95%);
      margin: 0 -20px -20px -20px;
      padding: 20px 15px;
      text-align: center;
    }

    .pricing .btn-buy {
      background: var(--accent-color);
      color: var(--contrast-color);
      display: inline-block;
      padding: 8px 35px 10px 35px;
      border-radius: 4px;
      transition: none;
      font-size: 14px;
      font-weight: 400;
      font-family: var(--heading-font);
      font-weight: 600;
      transition: 0.3s;
    }

    .pricing .btn-buy:hover {
      background: color-mix(in srgb, var(--accent-color), transparent 20%);
    }

    .pricing .featured h3 {
      background: var(--accent-color);
      color: var(--contrast-color);
    }

    .pricing .advanced {
      background: var(--accent-color);
      color: var(--contrast-color);
      width: 200px;
      position: absolute;
      top: 18px;
      right: -68px;
      transform: rotate(45deg);
      z-index: 1;
      font-size: 14px;
      padding: 1px 0 3px 0;
    }

    /*--------------------------------------------------------------
# Faq Section
--------------------------------------------------------------*/
    .faq .content-subtitle {
      font-size: 15px;
      margin-bottom: 10px;
      display: block;
      color: var(--default-color);
    }

    .faq .content-title {
      color: var(--heading-color);
      font-size: 22px;
      margin-bottom: 30px;
    }

    .faq p {
      line-height: 1.7;
      color: var(--default-color);
    }

    .faq .custom-accordion .accordion-item {
      background-color: var(--surface-color);
      margin-bottom: 0px;
      position: relative;
      border-radius: 0px;
      overflow: hidden;
    }

    .faq .custom-accordion .accordion-item .btn-link {
      display: block;
      width: 100%;
      padding: 15px 0;
      text-decoration: none;
      text-align: left;
      color: var(--default-color);
      border: none;
      padding-left: 40px;
      border-radius: 0;
      position: relative;
      background-color: color-mix(in srgb, var(--default-color), transparent 94%);
    }

    .faq .custom-accordion .accordion-item .btn-link:before {
      content: "\f282";
      display: inline-block;
      font-family: "bootstrap-icons" !important;
      font-style: normal;
      font-weight: normal !important;
      font-variant: normal;
      text-transform: none;
      line-height: 1;
      vertical-align: -0.125em;
      -webkit-font-smoothing: antialiased;
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      left: 15px;
    }

    .faq .custom-accordion .accordion-item .btn-link[aria-expanded=true] {
      color: var(--accent-color);
    }

    .faq .custom-accordion .accordion-item .btn-link[aria-expanded=true]:before {
      font-family: "bootstrap-icons" !important;
      content: "\f286";
      position: absolute;
      color: var(--accent-color);
      top: 50%;
      transform: translateY(-50%);
    }

    .faq .custom-accordion .accordion-item .accordion-body {
      padding: 20px 20px 20px 20px;
      color: var(--default-color);
    }

    /*--------------------------------------------------------------
# Team Section
--------------------------------------------------------------*/
    .team .team-member {
      background-color: var(--surface-color);
      overflow: hidden;
      border-radius: 5px;
      box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
      height: 100%;
    }

    .team .team-member .member-img {
      position: relative;
      overflow: hidden;
    }

    .team .team-member .social {
      position: absolute;
      left: 0;
      bottom: 30px;
      right: 0;
      opacity: 0;
      transition: ease-in-out 0.3s;
      text-align: center;
    }

    .team .team-member .social a {
      background: color-mix(in srgb, var(--contrast-color), transparent 25%);
      color: color-mix(in srgb, var(--default-color), transparent 20%);
      margin: 0 3px;
      border-radius: 4px;
      width: 36px;
      height: 36px;
      transition: ease-in-out 0.3s;
      display: inline-flex;
      justify-content: center;
      align-items: center;
    }

    .team .team-member .social a:hover {
      color: var(--contrast-color);
      background: var(--accent-color);
    }

    .team .team-member .social i {
      font-size: 18px;
      line-height: 0;
    }

    .team .team-member .member-info {
      padding: 25px 15px;
    }

    .team .team-member .member-info h4 {
      font-weight: 700;
      margin-bottom: 5px;
      font-size: 18px;
    }

    .team .team-member .member-info span {
      display: block;
      font-size: 13px;
      font-weight: 400;
      color: color-mix(in srgb, var(--default-color), transparent 40%);
    }

    .team .team-member:hover .social {
      opacity: 1;
      bottom: 15px;
    }

    /*--------------------------------------------------------------
# Recent Posts Section
--------------------------------------------------------------*/
    .recent-posts article {
      background: var(--surface-color);
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
      padding: 30px;
      height: 100%;
      border-radius: 10px;
      overflow: hidden;
    }

    .recent-posts .post-img {
      max-height: 240px;
      margin: -30px -30px 15px -30px;
      overflow: hidden;
    }

    .recent-posts .post-category {
      font-size: 16px;
      color: color-mix(in srgb, var(--default-color), transparent 50%);
      margin-bottom: 10px;
    }

    .recent-posts .title {
      font-size: 20px;
      font-weight: 700;
      padding: 0;
      margin: 0 0 20px 0;
    }

    .recent-posts .title a {
      color: var(--heading-color);
      transition: 0.3s;
    }

    .recent-posts .title a:hover {
      color: var(--accent-color);
    }

    .recent-posts .post-author-img {
      width: 50px;
      border-radius: 50%;
      margin-right: 15px;
    }

    .recent-posts .post-author {
      font-weight: 600;
      margin-bottom: 5px;
    }

    .recent-posts .post-date {
      font-size: 14px;
      color: color-mix(in srgb, var(--default-color), transparent 50%);
      margin-bottom: 0;
    }

    /*--------------------------------------------------------------
# Contact Section
--------------------------------------------------------------*/
    .contact .info-item+.info-item {
      margin-top: 40px;
    }

    .contact .info-item i {
      color: var(--accent-color);
      background: color-mix(in srgb, var(--accent-color), transparent 92%);
      font-size: 20px;
      width: 44px;
      height: 44px;
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 50px;
      transition: all 0.3s ease-in-out;
      margin-right: 15px;
    }

    .contact .info-item h3 {
      padding: 0;
      font-size: 18px;
      font-weight: 700;
      margin-bottom: 5px;
    }

    .contact .info-item p {
      padding: 0;
      margin-bottom: 0;
      font-size: 14px;
    }

    .contact .info-item:hover i {
      background: var(--accent-color);
      color: var(--contrast-color);
    }

    .contact .php-email-form {
      height: 100%;
    }

    .contact .php-email-form input[type=text],
    .contact .php-email-form input[type=email],
    .contact .php-email-form textarea {
      font-size: 14px;
      padding: 10px 15px;
      box-shadow: none;
      border-radius: 0;
      color: var(--default-color);
      background-color: color-mix(in srgb, var(--background-color), transparent 50%);
      border-color: color-mix(in srgb, var(--default-color), transparent 80%);
    }

    .contact .php-email-form input[type=text]:focus,
    .contact .php-email-form input[type=email]:focus,
    .contact .php-email-form textarea:focus {
      border-color: var(--accent-color);
    }

    .contact .php-email-form input[type=text]::placeholder,
    .contact .php-email-form input[type=email]::placeholder,
    .contact .php-email-form textarea::placeholder {
      color: color-mix(in srgb, var(--default-color), transparent 70%);
    }

    .contact .php-email-form button[type=submit] {
      color: var(--contrast-color);
      background: var(--accent-color);
      border: 0;
      padding: 10px 30px;
      transition: 0.4s;
      border-radius: 50px;
    }

    .contact .php-email-form button[type=submit]:hover {
      background: color-mix(in srgb, var(--accent-color), transparent 25%);
    }

    /*--------------------------------------------------------------
# Portfolio Details Section
--------------------------------------------------------------*/
    .portfolio-details .portfolio-details-slider img {
      width: 100%;
    }

    .portfolio-details .swiper-wrapper {
      height: auto;
    }

    .portfolio-details .swiper-button-prev,
    .portfolio-details .swiper-button-next {
      width: 48px;
      height: 48px;
    }

    .portfolio-details .swiper-button-prev:after,
    .portfolio-details .swiper-button-next:after {
      color: rgba(255, 255, 255, 0.8);
      background-color: rgba(0, 0, 0, 0.15);
      font-size: 24px;
      border-radius: 50%;
      width: 48px;
      height: 48px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: 0.3s;
    }

    .portfolio-details .swiper-button-prev:hover:after,
    .portfolio-details .swiper-button-next:hover:after {
      background-color: rgba(0, 0, 0, 0.3);
    }

    @media (max-width: 575px) {

      .portfolio-details .swiper-button-prev,
      .portfolio-details .swiper-button-next {
        display: none;
      }
    }

    .portfolio-details .swiper-pagination {
      margin-top: 20px;
      position: relative;
    }

    .portfolio-details .swiper-pagination .swiper-pagination-bullet {
      width: 10px;
      height: 10px;
      background-color: color-mix(in srgb, var(--default-color), transparent 85%);
      opacity: 1;
    }

    .portfolio-details .swiper-pagination .swiper-pagination-bullet-active {
      background-color: var(--accent-color);
    }

    .portfolio-details .portfolio-info h3 {
      font-size: 22px;
      font-weight: 700;
      margin-bottom: 20px;
      padding-bottom: 20px;
      position: relative;
    }

    .portfolio-details .portfolio-info h3:after {
      content: "";
      position: absolute;
      display: block;
      width: 50px;
      height: 3px;
      background: var(--accent-color);
      left: 0;
      bottom: 0;
    }

    .portfolio-details .portfolio-info ul {
      list-style: none;
      padding: 0;
      font-size: 15px;
    }

    .portfolio-details .portfolio-info ul li {
      display: flex;
      flex-direction: column;
      padding-bottom: 15px;
    }

    .portfolio-details .portfolio-info ul strong {
      text-transform: uppercase;
      font-weight: 400;
      color: color-mix(in srgb, var(--default-color), transparent 50%);
      font-size: 14px;
    }

    .portfolio-details .portfolio-info .btn-visit {
      padding: 8px 40px;
      background: var(--accent-color);
      color: var(--contrast-color);
      border-radius: 50px;
      transition: 0.3s;
    }

    .portfolio-details .portfolio-info .btn-visit:hover {
      background: color-mix(in srgb, var(--accent-color), transparent 20%);
    }

    .portfolio-details .portfolio-description h2 {
      font-size: 26px;
      font-weight: 700;
      margin-bottom: 20px;
    }

    .portfolio-details .portfolio-description p {
      padding: 0;
    }

    .portfolio-details .portfolio-description .testimonial-item {
      padding: 30px 30px 0 30px;
      position: relative;
      background: color-mix(in srgb, var(--default-color), transparent 97%);
      margin-bottom: 50px;
    }

    .portfolio-details .portfolio-description .testimonial-item .testimonial-img {
      width: 90px;
      border-radius: 50px;
      border: 6px solid var(--background-color);
      float: left;
      margin: 0 10px 0 0;
    }

    .portfolio-details .portfolio-description .testimonial-item h3 {
      font-size: 18px;
      font-weight: bold;
      margin: 15px 0 5px 0;
      padding-top: 20px;
    }

    .portfolio-details .portfolio-description .testimonial-item h4 {
      font-size: 14px;
      color: #6c757d;
      margin: 0;
    }

    .portfolio-details .portfolio-description .testimonial-item .quote-icon-left,
    .portfolio-details .portfolio-description .testimonial-item .quote-icon-right {
      color: color-mix(in srgb, var(--accent-color), transparent 50%);
      font-size: 26px;
      line-height: 0;
    }

    .portfolio-details .portfolio-description .testimonial-item .quote-icon-left {
      display: inline-block;
      left: -5px;
      position: relative;
    }

    .portfolio-details .portfolio-description .testimonial-item .quote-icon-right {
      display: inline-block;
      right: -5px;
      position: relative;
      top: 10px;
      transform: scale(-1, -1);
    }

    .portfolio-details .portfolio-description .testimonial-item p {
      font-style: italic;
      margin: 0 0 15px 0 0 0;
      padding: 0;
    }

    /*--------------------------------------------------------------
# Service Details Section
--------------------------------------------------------------*/
    .service-details .service-box {
      background-color: var(--surface-color);
      padding: 20px;
      box-shadow: 0px 2px 20px rgba(0, 0, 0, 0.1);
    }

    .service-details .service-box+.service-box {
      margin-top: 30px;
    }

    .service-details .service-box h4 {
      font-size: 20px;
      font-weight: 700;
      border-bottom: 2px solid color-mix(in srgb, var(--default-color), transparent 92%);
      padding-bottom: 15px;
      margin-bottom: 15px;
    }

    .service-details .services-list {
      background-color: var(--surface-color);
    }

    .service-details .services-list a {
      color: color-mix(in srgb, var(--default-color), transparent 20%);
      background-color: color-mix(in srgb, var(--default-color), transparent 96%);
      display: flex;
      align-items: center;
      padding: 12px 15px;
      margin-top: 15px;
      transition: 0.3s;
    }

    .service-details .services-list a:first-child {
      margin-top: 0;
    }

    .service-details .services-list a i {
      font-size: 16px;
      margin-right: 8px;
      color: var(--accent-color);
    }

    .service-details .services-list a.active {
      color: var(--contrast-color);
      background-color: var(--accent-color);
    }

    .service-details .services-list a.active i {
      color: var(--contrast-color);
    }

    .service-details .services-list a:hover {
      background-color: color-mix(in srgb, var(--accent-color), transparent 95%);
      color: var(--accent-color);
    }

    .service-details .download-catalog a {
      color: var(--default-color);
      display: flex;
      align-items: center;
      padding: 10px 0;
      transition: 0.3s;
      border-top: 1px solid color-mix(in srgb, var(--default-color), transparent 90%);
    }

    .service-details .download-catalog a:first-child {
      border-top: 0;
      padding-top: 0;
    }

    .service-details .download-catalog a:last-child {
      padding-bottom: 0;
    }

    .service-details .download-catalog a i {
      font-size: 24px;
      margin-right: 8px;
      color: var(--accent-color);
    }

    .service-details .download-catalog a:hover {
      color: var(--accent-color);
    }

    .service-details .help-box {
      background-color: var(--accent-color);
      color: var(--contrast-color);
      margin-top: 30px;
      padding: 30px 15px;
    }

    .service-details .help-box .help-icon {
      font-size: 48px;
    }

    .service-details .help-box h4,
    .service-details .help-box a {
      color: var(--contrast-color);
    }

    .service-details .services-img {
      margin-bottom: 20px;
    }

    .service-details h3 {
      font-size: 26px;
      font-weight: 700;
    }

    .service-details p {
      font-size: 15px;
    }

    .service-details ul {
      list-style: none;
      padding: 0;
      font-size: 15px;
    }

    .service-details ul li {
      padding: 5px 0;
      display: flex;
      align-items: center;
    }

    .service-details ul i {
      font-size: 20px;
      margin-right: 8px;
      color: var(--accent-color);
    }

    /*--------------------------------------------------------------
# Starter Section Section
--------------------------------------------------------------*/
    .starter-section {
      /* Add your styles here */
    }

    /*--------------------------------------------------------------
# Blog Posts Section
--------------------------------------------------------------*/
    .blog-posts article {
      background-color: var(--surface-color);
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
      padding: 30px;
      height: 100%;
      border-radius: 10px;
      overflow: hidden;
    }

    .blog-posts .post-img {
      max-height: 240px;
      margin: -30px -30px 15px -30px;
      overflow: hidden;
    }

    .blog-posts .post-category {
      font-size: 16px;
      color: color-mix(in srgb, var(--default-color), transparent 40%);
      margin-bottom: 10px;
    }

    .blog-posts .title {
      font-size: 20px;
      font-weight: 700;
      padding: 0;
      margin: 0 0 20px 0;
    }

    .blog-posts .title a {
      color: var(--heading-color);
      transition: 0.3s;
    }

    .blog-posts .title a:hover {
      color: var(--accent-color);
    }

    .blog-posts .post-author-img {
      width: 50px;
      border-radius: 50%;
      margin-right: 15px;
    }

    .blog-posts .post-author {
      font-weight: 600;
      margin-bottom: 5px;
    }

    .blog-posts .post-date {
      font-size: 14px;
      color: color-mix(in srgb, var(--default-color), transparent 40%);
      margin-bottom: 0;
    }

    /*--------------------------------------------------------------
# Blog Pagination Section
--------------------------------------------------------------*/
    .blog-pagination {
      padding-top: 0;
      color: color-mix(in srgb, var(--default-color), transparent 40%);
    }

    .blog-pagination ul {
      display: flex;
      padding: 0;
      margin: 0;
      list-style: none;
    }

    .blog-pagination li {
      margin: 0 5px;
      transition: 0.3s;
    }

    .blog-pagination li a {
      color: var(--accent-color);
      display: flex;
      align-items: center;
      justify-content: center;
      width: 36px;
      height: 36px;
      border-radius: 50%;
      border: 1px solid var(--accent-color);
    }

    .blog-pagination li a.active,
    .blog-pagination li a:hover {
      background: var(--accent-color);
      color: var(--contrast-color);
    }

    .blog-pagination li a.active a,
    .blog-pagination li a:hover a {
      color: var(--contrast-color);
    }

    /*--------------------------------------------------------------
# Blog Details Section
--------------------------------------------------------------*/
    .blog-details {
      padding-bottom: 30px;
    }

    .blog-details .article {
      background-color: var(--surface-color);
      padding: 30px;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    }

    .blog-details .post-img {
      margin: -30px -30px 20px -30px;
      overflow: hidden;
    }

    .blog-details .title {
      color: var(--heading-color);
      font-size: 28px;
      font-weight: 700;
      padding: 0;
      margin: 30px 0;
    }

    .blog-details .content {
      margin-top: 20px;
    }

    .blog-details .content h3 {
      font-size: 22px;
      margin-top: 30px;
      font-weight: bold;
    }

    .blog-details .content blockquote {
      overflow: hidden;
      background-color: color-mix(in srgb, var(--default-color), transparent 95%);
      padding: 60px;
      position: relative;
      text-align: center;
      margin: 20px 0;
    }

    .blog-details .content blockquote p {
      color: var(--default-color);
      line-height: 1.6;
      margin-bottom: 0;
      font-style: italic;
      font-weight: 500;
      font-size: 22px;
    }

    .blog-details .content blockquote:after {
      content: "";
      position: absolute;
      left: 0;
      top: 0;
      bottom: 0;
      width: 3px;
      background-color: var(--accent-color);
      margin-top: 20px;
      margin-bottom: 20px;
    }

    .blog-details .meta-top {
      margin-top: 20px;
      color: color-mix(in srgb, var(--default-color), transparent 40%);
    }

    .blog-details .meta-top ul {
      display: flex;
      flex-wrap: wrap;
      list-style: none;
      align-items: center;
      padding: 0;
      margin: 0;
    }

    .blog-details .meta-top ul li+li {
      padding-left: 20px;
    }

    .blog-details .meta-top i {
      font-size: 16px;
      margin-right: 8px;
      line-height: 0;
      color: color-mix(in srgb, var(--default-color), transparent 40%);
    }

    .blog-details .meta-top a {
      color: color-mix(in srgb, var(--default-color), transparent 40%);
      font-size: 14px;
      display: inline-block;
      line-height: 1;
    }

    .blog-details .meta-bottom {
      padding-top: 10px;
      border-top: 1px solid color-mix(in srgb, var(--default-color), transparent 90%);
    }

    .blog-details .meta-bottom i {
      color: color-mix(in srgb, var(--default-color), transparent 40%);
      display: inline;
    }

    .blog-details .meta-bottom a {
      color: color-mix(in srgb, var(--default-color), transparent 40%);
      transition: 0.3s;
    }

    .blog-details .meta-bottom a:hover {
      color: var(--accent-color);
    }

    .blog-details .meta-bottom .cats {
      list-style: none;
      display: inline;
      padding: 0 20px 0 0;
      font-size: 14px;
    }

    .blog-details .meta-bottom .cats li {
      display: inline-block;
    }

    .blog-details .meta-bottom .tags {
      list-style: none;
      display: inline;
      padding: 0;
      font-size: 14px;
    }

    .blog-details .meta-bottom .tags li {
      display: inline-block;
    }

    .blog-details .meta-bottom .tags li+li::before {
      padding-right: 6px;
      color: var(--default-color);
      content: ",";
    }

    .blog-details .meta-bottom .share {
      font-size: 16px;
    }

    .blog-details .meta-bottom .share i {
      padding-left: 5px;
    }

    /*--------------------------------------------------------------
# Blog Comments Section
--------------------------------------------------------------*/
    .blog-comments {
      padding: 10px 0;
    }

    .blog-comments .comments-count {
      font-weight: bold;
    }

    .blog-comments .comment {
      margin-top: 30px;
      position: relative;
    }

    .blog-comments .comment .comment-img {
      margin-right: 14px;
    }

    .blog-comments .comment .comment-img img {
      width: 60px;
    }

    .blog-comments .comment h5 {
      font-size: 16px;
      margin-bottom: 2px;
    }

    .blog-comments .comment h5 a {
      font-weight: bold;
      color: var(--default-color);
      transition: 0.3s;
    }

    .blog-comments .comment h5 a:hover {
      color: var(--accent-color);
    }

    .blog-comments .comment h5 .reply {
      padding-left: 10px;
      color: color-mix(in srgb, var(--default-color), transparent 20%);
    }

    .blog-comments .comment h5 .reply i {
      font-size: 20px;
    }

    .blog-comments .comment time {
      display: block;
      font-size: 14px;
      color: color-mix(in srgb, var(--default-color), transparent 40%);
      margin-bottom: 5px;
    }

    .blog-comments .comment.comment-reply {
      padding-left: 40px;
    }

    /*--------------------------------------------------------------
# Comment Form Section
--------------------------------------------------------------*/
    .comment-form {
      padding-top: 10px;
    }

    .comment-form form {
      background-color: var(--surface-color);
      margin-top: 30px;
      padding: 30px;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    }

    .comment-form form h4 {
      font-weight: bold;
      font-size: 22px;
    }

    .comment-form form p {
      font-size: 14px;
    }

    .comment-form form input {
      background-color: var(--surface-color);
      color: var(--default-color);
      border: 1px solid color-mix(in srgb, var(--default-color), transparent 70%);
      font-size: 14px;
      border-radius: 4px;
      padding: 10px 10px;
    }

    .comment-form form input:focus {
      color: var(--default-color);
      background-color: var(--surface-color);
      box-shadow: none;
      border-color: var(--accent-color);
    }

    .comment-form form input::placeholder {
      color: color-mix(in srgb, var(--default-color), transparent 50%);
    }

    .comment-form form textarea {
      background-color: var(--surface-color);
      color: var(--default-color);
      border: 1px solid color-mix(in srgb, var(--default-color), transparent 70%);
      border-radius: 4px;
      padding: 10px 10px;
      font-size: 14px;
      height: 120px;
    }

    .comment-form form textarea:focus {
      color: var(--default-color);
      box-shadow: none;
      border-color: var(--accent-color);
      background-color: var(--surface-color);
    }

    .comment-form form textarea::placeholder {
      color: color-mix(in srgb, var(--default-color), transparent 50%);
    }

    .comment-form form .form-group {
      margin-bottom: 25px;
    }

    .comment-form form .btn-primary {
      border-radius: 4px;
      padding: 10px 20px;
      border: 0;
      background-color: var(--accent-color);
      color: var(--contrast-color);
    }

    .comment-form form .btn-primary:hover {
      color: var(--contrast-color);
      background-color: color-mix(in srgb, var(--accent-color), transparent 20%);
    }

    /*--------------------------------------------------------------
# Widgets
--------------------------------------------------------------*/
    .widgets-container {
      margin: 60px 0 30px 0;
    }

    .widget-title {
      color: var(--heading-color);
      font-size: 20px;
      font-weight: 600;
      padding: 0 0 0 10px;
      margin: 0 0 20px 0;
      border-left: 4px solid var(--accent-color);
    }

    .widget-item {
      margin-bottom: 30px;
      background-color: color-mix(in srgb, var(--default-color), transparent 98%);
      border: 1px solid color-mix(in srgb, var(--default-color), transparent 90%);
      padding: 30px;
      border-radius: 5px;
    }

    .widget-item:last-child {
      margin-bottom: 0;
    }

    .blog-author-widget img {
      max-width: 160px;
    }

    .blog-author-widget h4 {
      font-weight: 600;
      font-size: 24px;
      margin: 15px 0 0 0;
      padding: 0;
      color: color-mix(in srgb, var(--default-color), transparent 20%);
    }

    .blog-author-widget .social-links {
      margin: 5px 0;
    }

    .blog-author-widget .social-links a {
      color: color-mix(in srgb, var(--default-color), transparent 60%);
      margin: 0 3px;
      font-size: 18px;
    }

    .blog-author-widget .social-links a:hover {
      color: var(--accent-color);
    }

    .blog-author-widget p {
      font-style: italic;
      color: color-mix(in srgb, var(--default-color), transparent 30%);
      margin: 10px 0 0 0;
    }

    .search-widget form {
      background: var(--background-color);
      border: 1px solid color-mix(in srgb, var(--default-color), transparent 75%);
      padding: 3px 10px;
      position: relative;
      border-radius: 50px;
      transition: 0.3s;
    }

    .search-widget form input[type=text] {
      border: 0;
      padding: 4px 10px;
      border-radius: 4px;
      width: calc(100% - 40px);
      background-color: var(--background-color);
      color: var(--default-color);
    }

    .search-widget form input[type=text]:focus {
      outline: none;
    }

    .search-widget form button {
      background: none;
      color: var(--default-color);
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      border: 0;
      font-size: 16px;
      padding: 0 16px;
      transition: 0.3s;
      line-height: 0;
    }

    .search-widget form button i {
      line-height: 0;
    }

    .search-widget form button:hover {
      color: var(--accent-color);
    }

    .search-widget form:is(:focus-within) {
      border-color: var(--accent-color);
    }

    .categories-widget ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .categories-widget ul li {
      padding-bottom: 10px;
    }

    .categories-widget ul li:last-child {
      padding-bottom: 0;
    }

    .categories-widget ul a {
      color: color-mix(in srgb, var(--default-color), transparent 20%);
      transition: 0.3s;
    }

    .categories-widget ul a:hover {
      color: var(--accent-color);
    }

    .categories-widget ul a span {
      padding-left: 5px;
      color: color-mix(in srgb, var(--default-color), transparent 50%);
      font-size: 14px;
    }

    .recent-posts-widget .post-item {
      display: flex;
      flex-direction: column;
      margin-bottom: 20px;
    }

    .recent-posts-widget .post-item:last-child {
      margin-bottom: 0;
    }

    .recent-posts-widget .post-item h4 {
      font-size: 16px;
      font-weight: 600;
      margin-bottom: 5px;
    }

    .recent-posts-widget .post-item h4 a {
      color: var(--default-color);
      transition: 0.3s;
    }

    .recent-posts-widget .post-item h4 a:hover {
      color: var(--accent-color);
    }

    .recent-posts-widget .post-item time {
      display: block;
      font-style: italic;
      font-size: 14px;
      color: color-mix(in srgb, var(--default-color), transparent 50%);
    }

    .tags-widget ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .tags-widget ul li {
      display: inline-block;
    }

    .tags-widget ul a {
      background-color: color-mix(in srgb, var(--default-color), transparent 94%);
      color: color-mix(in srgb, var(--default-color), transparent 30%);
      border-radius: 50px;
      font-size: 14px;
      padding: 5px 15px;
      margin: 0 6px 8px 0;
      display: inline-block;
      transition: 0.3s;
    }

    .tags-widget ul a:hover {
      background: var(--accent-color);
      color: var(--contrast-color);
    }

    .tags-widget ul a span {
      padding-left: 5px;
      color: color-mix(in srgb, var(--default-color), transparent 60%);
      font-size: 14px;
    }
  </style>


  <style>
    a {
      text-decoration: none;
    }

    /* Card Styles */

    .card-sl {
      border-radius: 8px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .card-image img {
      max-height: 100%;
      max-width: 100%;
      border-radius: 8px 8px 0px 0;
    }

    .card-action {
      position: relative;
      float: right;
      margin-top: -25px;
      margin-right: 20px;
      z-index: 2;
      color: #E26D5C;
      background: #fff;
      border-radius: 100%;
      padding: 15px;
      font-size: 15px;
      box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 1px 2px 0 rgba(0, 0, 0, 0.19);
    }

    .card-action:hover {
      color: #fff;
      background: #E26D5C;
      -webkit-animation: pulse 1.5s infinite;
    }

    .card-heading {
      font-size: 18px;
      font-weight: bold;
      background: #fff;
      padding: 10px 15px;
    }

    .card-text {
      padding: 10px 15px;
      background: #fff;
      font-size: 14px;
      color: #636262;
    }

    .card-button {
      display: flex;
      justify-content: center;
      padding: 10px 0;
      width: 100%;
      background-color: #1F487E;
      color: #fff;
      border-radius: 0 0 8px 8px;
    }

    .card-button:hover {
      text-decoration: none;
      background-color: #1D3461;
      color: #fff;

    }


    @-webkit-keyframes pulse {
      0% {
        -moz-transform: scale(0.9);
        -ms-transform: scale(0.9);
        -webkit-transform: scale(0.9);
        transform: scale(0.9);
      }

      70% {
        -moz-transform: scale(1);
        -ms-transform: scale(1);
        -webkit-transform: scale(1);
        transform: scale(1);
        box-shadow: 0 0 0 50px rgba(90, 153, 212, 0);
      }

      100% {
        -moz-transform: scale(0.9);
        -ms-transform: scale(0.9);
        -webkit-transform: scale(0.9);
        transform: scale(0.9);
        box-shadow: 0 0 0 0 rgba(90, 153, 212, 0);
      }
    }
  </style>

  <main>



    <?php $this->load->view('template/festavalive/topmenu'); ?>


    <section class="about-section section-padding">
      <div class="container">
        <div class="row">

          <div class="col-12 mb-4 mb-lg-0">
            <h2 class="text-white text-center mb-4 mt-3">KIDS RESOURCES</h2>
          </div>

        </div>
      </div>
    </section>






    </div>
    </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features section">

      <div class="container">

        <ul class="nav nav-tabs1 row  d-flex" style="display: flex; align-items: center; justify-content: space-between;"  data-aos="fade-up" data-aos-delay="100">
          <li class="nav-item col-2">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
              <i class="bi bi-stickies"></i>
              <h4 class="d-none d-lg-block">Kumpulan Alat Peraga Kids</h4>
            </a>
          </li>
          <li class="nav-item col-2">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
              <i class="bi bi-music-note-beamed"></i>
              <h4 class="d-none d-lg-block">Kumpulan Audio Kids</h4>
            </a>
          </li>
          <li class="nav-item col-2">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
              <i class="bi bi-play-btn"></i>
              <h4 class="d-none d-lg-block">Kumpulan Video Kids</h4>
            </a>
          </li>
          <li class="nav-item col-2">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-4">
            <i class="bi bi-pencil"></i>
              <h4 class="d-none d-lg-block">Lembar Aktifitas</h4>
            </a>
          </li>
          <li class="nav-item col-2">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-4">
              <i class="bi bi-journal-text"></i>
              <h4 class="d-none d-lg-block">Panduan Orang Tua</h4>
            </a>
          </li>
        </ul><!-- End Tab Nav -->

        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

          <div class="tab-pane fade active show" id="features-tab-1">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Kumpulan Gambar alat peraga untuk Kids/sekolah minggu di gereja</h3>
                <!-- <p class="fst-italic">
                  Anda Bebas Download asset-asset ini dan dipakai untuk kebutuhan ibadah kids di gereja Anda masing-masing
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i>
                    <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span>
                  </li>
                  <li><i class="bi bi-check2-all"></i> <span>Duis aute irure dolor in reprehenderit in voluptate velit</span>.</li>
                  <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li>
                </ul> -->
                <p>
                  Di tengah perkembangan zaman dan tantangan pelayanan, gereja perlu terus berinovasi dalam membimbing anak-anak agar semakin mengenal kasih Tuhan dengan cara yang menarik dan mudah dipahami.</p>
                <p>Kami memahami pentingnya mendukung gereja dalam menciptakan pengalaman belajar yang efektif untuk anak-anak. Oleh karena itu, kami menyediakan berbagai aset digital yang dapat digunakan untuk kebutuhan pelayanan anak di gereja Anda. Aset-aset ini mencakup bahan presentasi, video cerita Alkitab, lembar aktivitas, ilustrasi, dan lagu-lagu pujian anak yang dirancang untuk membuat pelayanan lebih interaktif dan kreatif.</p>
                <p>Seluruh aset ini dapat diunduh secara bebas, sehingga gereja dapat dengan mudah menggunakannya sesuai kebutuhan. Harapannya, dengan adanya dukungan ini, gereja dapat menciptakan pengalaman pelayanan yang berkesan dan membangun iman anak-anak yang akan menjadi generasi penerus gereja di masa depan.
                </p>


              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="<?php echo base_url('assets/gambar/kids_play.png'); ?> " alt="" class="img-fluid">
              </div>

            </div>
            <div>
              <!-- Start Card -->
              <div class="row" style="padding-top: 30px;">
                <div class="col-12 col-sm-3">
                  <div class="card-sl">
                    <div class="card-image">
                      <img src="<?php echo base_url('assets/gambar/jesus.jpg');?>" alt="" class="img-fluid">
                    </div>
                    <div style="padding: 15px;">
                      <h6>Air Bah</h6>
                      <p>Cerita tentang air bah, Tuhan memerintahkan Nuh untuk membuat bahtera</p>
                    </div>
                    <div class="card-action">
                      <a href="#">
                        <i class="bi bi-download"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-3">
                  <div class="card-sl">
                    <div class="card-image">
                      <img src="<?php echo base_url('assets/gambar/jesus2.jpg');?>" alt="" class="img-fluid">
                    </div>
                    <div style="padding: 15px;">
                      <h6>Air Bah</h6>
                      <p>Cerita tentang air bah, Tuhan memerintahkan Nuh untuk membuat bahtera</p>
                    </div>
                    <div class="card-action">
                      <a href="#">
                        <i class="bi bi-download"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-3">
                  <div class="card-sl">
                    <div class="card-image">
                      <img src="<?php echo base_url('assets/gambar/ss.jpg');?>" alt="" class="img-fluid">
                    </div>
                    <div style="padding: 15px;">
                      <h6>Air Bah</h6>
                      <p>Cerita tentang air bah, Tuhan memerintahkan Nuh untuk membuat bahtera</p>
                    </div>
                    <div class="card-action">
                      <a href="#">
                        <i class="bi bi-download"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-3">
                  <div class="card-sl">
                    <div class="card-image">
                      <img src="<?php echo base_url('assets/gambar/jesus$kids.png');?>" alt="" class="img-fluid">
                    </div>
                    <div style="padding: 15px;">
                      <h6>Air Bah</h6>
                      <p>Cerita tentang air bah, Tuhan memerintahkan Nuh untuk membuat bahtera</p>
                    </div>
                    <div class="card-action">
                      <a href="#">
                        <i class="bi bi-download"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row" style="padding-top: 30px;">
                <div class="col-12 col-sm-3">
                  <div class="card-sl">
                    <div class="card-image">
                      <img src="<?php echo base_url('assets/gambar/jesuslanscape.jpg');?>" alt="" class="img-fluid">
                    </div>
                    <div style="padding: 15px;">
                      <h6>Air Bah</h6>
                      <p>Cerita tentang air bah, Tuhan memerintahkan Nuh untuk membuat bahtera</p>
                    </div>
                    <div class="card-action">
                      <a href="#">
                        <i class="bi bi-download"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-3">
                  <div class="card-sl">
                    <div class="card-image">
                      <img src="<?php echo base_url('assets/gambar/jesuslanscape2.png');?>" alt="" class="img-fluid">
                    </div>
                    <div style="padding: 15px;">
                      <h6>Air Bah</h6>
                      <p>Cerita tentang air bah, Tuhan memerintahkan Nuh untuk membuat bahtera</p>
                    </div>
                    <div class="card-action">
                      <a href="#">
                        <i class="bi bi-download"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-3">
                  <div class="card-sl">
                    <div class="card-image">
                      <img src="<?php echo base_url('assets/gambar/jesuslanscape3.png'); ?>" alt="" class="img-fluid">
                    </div>
                    <div style="padding: 15px;">
                      <h6>Air Bah</h6>
                      <p>Cerita tentang air bah, Tuhan memerintahkan Nuh untuk membuat bahtera</p>
                    </div>
                    <div class="card-action">
                      <a href="#">
                        <i class="bi bi-download"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-3">
                  <div class="card-sl">
                    <div class="card-image">
                      <img src="<?php echo base_url('assets/gambar/jesuslanscape4.jpg'); ?>" alt="" class="img-fluid">
                    </div>
                    <div style="padding: 15px;">
                      <h6>Air Bah</h6>
                      <p>Cerita tentang air bah, Tuhan memerintahkan Nuh untuk membuat bahtera</p>
                    </div>
                    <div class="card-action">
                      <a href="#">
                        <i class="bi bi-download"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Card -->
            </div>

          </div><!-- End Tab Content Item -->

          <div class="tab-pane fade" id="features-tab-2">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Audio</h3>
                <p>
                  Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                  velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                  culpa qui officia deserunt mollit anim id est laborum
                </p>
                <p class="fst-italic">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna aliqua.
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Provident mollitia neque rerum asperiores dolores quos qui a. Ipsum neque dolor voluptate nisi sed.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li>
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="<?php echo base_url('assets/gambar/alkitab2.jpg'); ?> " alt="" class="img-fluid">
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-sm-4">
                <figure>
                  <figcaption>Listen: Shine Bless And Glory</figcaption>
                  <audio controls src="<?php echo base_url('/assets/audio/kids/Shine Bless And Glory _ ESC Kids.mp3'); ?> "></audio>
                  <a href="/assets/audio/kids/Shine Bless And Glory _ ESC Kids.mp3" download> Download audio </a>
                </figure>
              </div>
              <div class="col-12 col-sm-4">
                <figure>
                  <figcaption>Listen to the T-Rex:</figcaption>
                  <audio controls src="/media/cc0-audio/t-rex-roar.mp3"></audio>
                  <a href="/media/cc0-audio/t-rex-roar.mp3"> Download audio </a>
                </figure>
              </div>
              <div class="col-12 col-sm-4">
                <figure>
                  <figcaption>Listen to the T-Rex:</figcaption>
                  <audio controls src="/media/cc0-audio/t-rex-roar.mp3"></audio>
                  <a href="/media/cc0-audio/t-rex-roar.mp3"> Download audio </a>
                </figure>
              </div>

            </div>
          </div><!-- End Tab Content Item -->

          <div class="tab-pane fade" id="features-tab-3">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Musik</h3>
                <p>
                  Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                  velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                  culpa qui officia deserunt mollit anim id est laborum
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Provident mollitia neque rerum asperiores dolores quos qui a. Ipsum neque dolor voluptate nisi sed.</span></li>
                </ul>
                <p class="fst-italic">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna aliqua.
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/working-3.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End Tab Content Item -->

          <div class="tab-pane fade" id="features-tab-4">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Omnis fugiat ea explicabo sunt dolorum asperiores sequi inventore rerum</h3>
                <p>
                  Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                  velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                  culpa qui officia deserunt mollit anim id est laborum
                </p>
                <p class="fst-italic">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna aliqua.
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li>
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="<?php echo base_url('assets/gambar/alkitab.jpg'); ?>">
              </div>
            </div>
          </div><!-- End Tab Content Item -->

        </div>

      </div>

    </section><!-- /Features Section -->




  </main>


  <?php $this->load->view('template/festavalive/footer'); ?>




</body>

</html>