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
        $cop = '';

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

$header .= '<table cellpadding="5">
            <tbody>
                <tr style="font-weight: bold;">
                    <td width="10%" style="text-align: center;"><img src="' . base_url('images/icon.png') . '" alt="" width="55px;"></td>
                    <td width="80%" style="text-align: left;"><span style="font-size: 20px;">' . $rowInfoGereja->namagereja . '</span>
                        <br><span style="font-size: 12px;">' . $rowInfoGereja->alamatgereja . '</span>
                        <br><span style="font-size: 12px;">Email: ' . $rowInfoGereja->emailgereja . '</span>
                    </td>
                </tr>   
            </tbody>
            </table>';

$pdf->SetFont('times', '', 16);
$pdf->writeHTML($header, true, false, false, false, '');
$pdf->SetTopMargin(0);


$title .= '<h5 style="text-align: center;">LAPORAN DATA KELAS JEMAAT</h5>';

$pdf->SetFont('times', '', 16);
$pdf->writeHTML($title, true, false, false, false, '');



// $subTitle = 'Jumlah Jemaat: '.number_format($rsJemaat->num_rows()).'<br>';
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTML($subTitle, true, false, false, false, 'R');



$no = 1;

$table = '';

if ($rsRegistrasi->num_rows() > 0) {
    foreach ($rsRegistrasi->result() as $row) {

        $table .= '<br><br><br><table border="0" cellpadding="0">
            <thead>
                <tr style="font-size:14px; font-weight:bold;">
                    <td width="100%" style="text-align:left;">' . $row->namaevent . '</td>                    
                </tr>
                <tr style="font-size:12px; font-weight:bold;">
                    <td width="100%" style="text-align:left;">Tanggal ' . tglindonesia($row->tglmulaievent) . ' s/d ' . tglindonesia(($row->tglselesaievent)) . '</td>                    
                </tr>
            </thead></table>';

        $table .= '<br><br><table border="1" cellpadding="5">';
        $table .= '
            <thead>
                <tr style="font-size:12px; font-weight:bold;">
                    <th width="5%" style="text-align:center;">NO</th>
                    <th width="30%" style="text-align:center;">NAMA</th>
                    <th width="15%" style="text-align:center;">TANGGAL KELAS</th>
                    <th width="20%" style="text-align:center;">NO SERTIFIKAT</th>
                    <th width="15%" style="text-align:center;">TGL SERTIFIKAT</th>
                    <th width="15%" style="text-align:center;">KETERANGAN</th>
                </tr>
            </thead></tbody>';



        $rsDetail = $this->db->query("
            select * from v_laporan_kelas_jemaat 
                        where idjadwalevent = '" . $row->idjadwalevent . "'  
                        ORDER BY namalengkap
        ");

        if ($rsDetail->num_rows() > 0) {
            $no = 1;
            foreach ($rsDetail->result() as $rowDetail) {
                if ($row->tglmulaievent != $row->tglselesaievent && $row->tglselesaievent != "") {
                    $tanggalkelas = tglindonesia($row->tglmulaievent) . '<br> S.D ' . tglindonesia($row->tglselesaievent);
                } else {
                    $tanggalkelas = tglindonesia($row->tglmulaievent);
                }

                if ($rowDetail->statuslulus == "1") {
                    $statuslulus = "Lulus";
                } else {
                    $statuslulus = "Tidak Lulus";
                }
                $table .= '
                    <tr style="font-size:12px;">
                            <td width="5%" style="text-align:center;">' . $no++ . '</td>
                            <td width="30%" style="text-align:left;">' . $rowDetail->namalengkap . '</td>
                            <td width="15%" style="text-align:center;">' . $tanggalkelas . '</td>
                            <td width="20%" style="text-align:center;">' . $rowDetail->nomorsertifikat . '</td>
                            <td width="15%" style="text-align:center;">' . $rowDetail->tglsertifikat . '</td>
                            <td width="15%" style="text-align:center;">' . $statuslulus . '</td>
                        </tr>
                ';
            }
        }


        $table .= ' </tbody>
            </table>';
    }
} else {
    $table .= '<div>data tidak ditemukan</div>';
}



$pdf->SetTopMargin(35);
$pdf->SetFont('times', '', 10);
$pdf->writeHTML($table, true, false, false, false, '');

$tglcetak = date('d-m-Y');

$pdf->Output();
