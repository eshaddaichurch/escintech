<?php

class MYPDF extends TCPDF
{

    //Page header
    public function Header()
    {

        $this->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

        // set header and footer fonts
        $this->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $this->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set margins
        //$this->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $this->SetMargins(PDF_MARGIN_LEFT, 10, PDF_MARGIN_RIGHT);
        $this->SetHeaderMargin(PDF_MARGIN_HEADER);
        $this->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set image scale factor
        $this->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set default header data
        $cop = '
        <div></div>
            <table border="0">
                <tr>

                    <td width="100%">
                        <div style="text-align:left; font-size:20px; font-weight:bold; padding-top:10px;">' . $namaskpd . '</div>

                        <i style="text-align:left; font-weight:bold; font-size:14px;">Cabang Pontianak </i>
                    </td>

                </tr>
            </table>
            <hr>
            ';

        // $this->writeHTML($cop, true, false, false, false, '');
        // // set margins
        // $this->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        // $this->SetHeaderMargin(PDF_MARGIN_HEADER);
        // set default header data

    }

    // Page footer
    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->AddPage();

$title .= '<table cellpadding="5">
            <tbody>
                <tr>
                    <td width="30%" style="text-align: right;" rowspan="2"><img src="' . base_url('images/sonar-logo.png') . '" alt="" width="50px;"></td>
                    <td width="70%" style="text-align: left; font-weight: bold; font-size: 20px;">SONAR</td>
                </tr>
                <tr>
                    <td width="70%" style="text-align: left; font-weight: bold; font-size: 20px;">LAPORAN PEKERJAAN</td>
                </tr>
            </tbody>
            </table>';

// $title = '
//     <span style="text-align:center; font-size:20px; font-weight:bold; padding-top:10px;">' . $namaskpd . '</span><br>
//     <span style="text-align:center; font-size:15px; font-weight:bold; padding-top:10px;">LAPORAN RKA SKPD</span>
// ';
$pdf->SetFont('times', '', 16);
$pdf->writeHTML($title, true, false, false, false, '');
$pdf->SetTopMargin(15);

$table = '<br><br><table border="1" cellpadding="5">';
$table .= '
            <thead>
                <tr>
                    <th width="5%" style="font-size:12px; font-weight:bold; text-align:center;">NO</th>
                    <th width="10%" style="font-size:12px; font-weight:bold; text-align:center;">TGL TASK</th>
                    <th width="10%" style="font-size:12px; font-weight:bold; text-align:center;">TGL MULAI<br>TGL SELESAI</th>
                    <th width="35%" style="font-size:12px; font-weight:bold; text-align:center;">JUDUL TUGAS</th>
                    <th width="15%" style="font-size:12px; font-weight:bold; text-align:center;">PEMBUAT TASK</th>
                    <th width="15%" style="font-size:12px; font-weight:bold; text-align:center;">PIC</th>
                    <th width="10%" style="font-size:12px; font-weight:bold; text-align:center;">STATUS</th>
                </tr>
            </thead></tbody>';

$no = 1;

if ($rstask->num_rows() > 0) {
    foreach ($rstask->result() as $row) {

        $table .= '
          <tr style="font-size:12px">
            <td width="5%" style="text-align:center;">' . $no++ . '</td>
            <td width="10%" style="text-align:center;">' . tglindonesia($row->tglinsert) . '</td>
            <td width="10%" style="text-align:center;">' . tglindonesia($row->tglmulai) . '<br>' . tglindonesia($row->tglselesai) . '</td>
            <td width="35%" style="text-align:left;"><span style="font-weight: bold">' . htmlentities($row->namatask) . '</span><br>' . $row->namaproyek . '<br>Kategori: ' . $row->namakategori . ' | Prioritas: ' . $row->prioritas . '</td>
            <td width="15%" style="text-align:center;">' . $row->namapembuattask . '</td>';
        if (!empty($row->idpic2)) {
            $table .= '<td width="15%" style="text-align:center;">' . $row->namapic . ' & ' . $row->namapic2 . '</td>';
        } else {
            $table .= '<td width="15%" style="text-align:center;">' . $row->namapic . '</td>';
        }

        $table .= '
            <td width="10%" style="text-align:center;">' . $row->statustask . '</td>
          </tr>
        ';

    }

} else {
    $table .= '
                <tr>
                    <td width="100%" style="font-size:12px; text-align:center;" colspan="5">Data tidak ditemukan...</td>
                </tr>
            ';
}

$table .= ' </tbody>
            </table>';

$pdf->SetTopMargin(35);
$pdf->SetFont('times', '', 10);
$pdf->writeHTML($table, true, false, false, false, '');

$tglcetak = date('d-m-Y');

$pdf->Output();
