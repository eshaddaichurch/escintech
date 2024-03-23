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
class MYPDF extends TCPDF
{
    //Page header
    public function Header()
    {
        // get the current page break margin
        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // set bacground image
        $file_name = 'admin/uploads/kelas/sertifikat_g1.png';

        $img_file = K_PATH_IMAGES . 'image_demo.jpg';
        $this->Image($file_name, 0, 0, 297, 210, '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $this->setPageMark();
    }
}

// create new PDF document
$pdf = new MYPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Elshaddai Church');
$pdf->SetTitle('SERTIFIKAT GRADE 1');
$pdf->SetSubject('SERTIFIKAT GRADE 1');
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
        font-size: 20px;
        width: 100%;
        text-align: center;
    }
    .namasertifikat {
        font-size: 40px;
        width: 100%;
        text-align: center;
    }

    .listmateri {
        font-size: 11px;
        width: 100%;
    }
</style>
';

$rstemp = $this->db->query("select * from registrasikelasmateri where idregistrasikelas='" . $idregistrasikelas . "' order by tglpelaksanaan limit 1");
if ($rstemp->num_rows() > 0) {
    $tgl1 = tglindonesialengkap($rstemp->row()->tglpelaksanaan);
} else {
    $tgl1 = "";
}

$rstemp = $this->db->query("select * from registrasikelasmateri where idregistrasikelas='" . $idregistrasikelas . "' order by tglpelaksanaan desc limit 1");
if ($rstemp->num_rows() > 0) {
    $tgl2 = tglindonesialengkap($rstemp->row()->tglpelaksanaan);
} else {
    $tgl2 = "";
}


$html = $css . '<span class="tglsertifikat">' . $tgl1 . ' - ' . $tgl2 . '</span>';
$pdf->SetXY(10, 60);
$pdf->writeHTML($html, true, false, true, false, '');



$html = $css . '<span class="namasertifikat">' . $rsregistrasi->namalengkap . '</span>';
$pdf->SetXY(10, 79);
$pdf->writeHTML($html, true, false, true, false, '');



$rsregistrasimateri = $this->db->query("select * from registrasikelasmateri where idregistrasikelas='" . $idregistrasikelas . "'");


if ($rsregistrasimateri->num_rows() > 0) {

    $html = $css . '
        <table border="0" width="100%" cellpadding="10">
            <tbody>
                <tr class="listmateri">';

    $no = 1; //untuk pembagi
    foreach ($rsregistrasimateri->result() as $rowregistrasimateri) {

        if ($no > 2) {
            $html .= '
                </tr>
                <tr class="listmateri">
                ';
            $no = 1;
        }

        $html .= '
                        <td style="" width="50%">' . $rowregistrasimateri->judulmateri . '<br>Nilai : <strong>' . $rowregistrasimateri->nilaimateri . '</strong></td>                    
        ';

        $no++;
    }

    $html .= '
                    </tr>
                </tbody>  
            </table>
    ';
}
$pdf->SetXY(25, 102);
$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_051.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+