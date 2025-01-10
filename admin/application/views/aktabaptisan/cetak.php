<?php
//============================================================+
// File name   : example_051.php
// Begin       : 2009-04-16
// Last Update : 2013-05-14
//
// Description : Example 051 for TCPDF class
//               Full page background
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Full page background
 * @author Nicola Asuni
 * @since 2009-04-16
 */

// Include the main TCPDF library (search for installation path).
// require_once('tcpdf_include.php');


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {}

// create new PDF document
$pdf = new MYPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Elshaddai Church');
$pdf->SetTitle('SERTIFIKAT FC1');
$pdf->SetSubject('SERTIFIKAT FC1');
$pdf->SetKeywords('elshaddai, churc');

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

// remove default footer
$pdf->setPrintFooter(false);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)

if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('pdfacourier', '', 48);

// add a page
$pdf->AddPage();

// Print a text
$css = '

<style>
    .tglsertifikat {
        font-size: 35px;
        width: 100%;
        text-align: center;
    }
    .namasertifikat {
        font-size: 40px;
        width: 100%;
        text-align: center;
    }
    .default-text {
        font-size: 14px;
        width: 100%;
    }
        .nama-jemaat {
        font-size: 18px;
        font-weight: bold;
        width: 100%;
    }

    .listmateri {
        font-size: 11px;
        width: 100%;
    }
</style>
';


$html = $css . '<span class="default-text">' . $rsakta->noakta . '</span>';
$pdf->SetXY(10, 20);
$pdf->writeHTML($html, true, false, true, false, '');




$html = $css . '<span class="default-text">' . hari($rsakta->tglakta) . ', ' . tglindonesialengkap($rsakta->tglakta) . '</span>';
$pdf->SetXY(60, 110);
$pdf->writeHTML($html, true, false, true, false, '');
$html = $css . '<span class="default-text">EL SHADDAI</span>';
$pdf->SetXY(60, 120);
$pdf->writeHTML($html, true, false, true, false, '');

$html = $css . '<span class="nama-jemaat">' . $rsakta->namalengkap . '</span>';
$pdf->SetXY(60, 140);
$pdf->writeHTML($html, true, false, true, false, '');

$html = $css . '<span class="default-text">' . $rsakta->tempatlahir . '</span>';
$pdf->SetXY(60, 150);
$pdf->writeHTML($html, true, false, true, false, '');

$html = $css . '<span class="default-text">' . tglindonesia($rsakta->tanggallahir) . '</span>';
$pdf->SetXY(150, 150);
$pdf->writeHTML($html, true, false, true, false, '');

$html = $css . '<span class="default-text">' . $rsakta->namaayah . '</span>';
$pdf->SetXY(60, 160);
$pdf->writeHTML($html, true, false, true, false, '');


$html = $css . '<span class="default-text">' . $rsakta->namaibu . '</span>';
$pdf->SetXY(60, 170);
$pdf->writeHTML($html, true, false, true, false, '');


$html = $css . '<span class="default-text">' . $rsakta->dilakukanoleh . '</span>';
$pdf->SetXY(60, 190);
$pdf->writeHTML($html, true, false, true, false, '');


$html = $css . '<span class="default-text">Pontianak, ' . tglindonesia($rsakta->tglakta) . '</span>';
$pdf->SetXY(100, 210);
$pdf->writeHTML($html, true, false, true, false, '');

$html = $css . '<span class="default-text">Pontianak, ' . GEMBALAGEREJA . '</span>';
$pdf->SetXY(100, 230);
$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_051.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+