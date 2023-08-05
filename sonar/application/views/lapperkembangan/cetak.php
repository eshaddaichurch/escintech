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
					<td width="30%" style="text-align: right;" rowspan="2"><img src="' . base_url('images/mirsuma.png') . '" alt="" width="50px;"></td>
		            <td width="70%" style="text-align: left; font-weight: bold; font-size: 20px;">CV. MIRSUMA MITRA BERSAMA</td>
		        </tr>
		        <tr>
		            <td width="70%" style="text-align: left; font-weight: bold; font-size: 20px;">LAPORAN PERKEMBANGAN KARYAWAN</td>
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
					<th width="5%" style="font-size:16px; font-weight:bold; text-align:center;" rowspan="2">NO</th>
					<th width="45%" style="font-size:16px; font-weight:bold; text-align:center;" rowspan="2">NAMA PROYEK<br>NAMA PROGRAMMER</th>
					<th width="30%" style="font-size:16px; font-weight:bold; text-align:center;" colspan="3">PRIORITAS</th>
					<th width="20%" style="font-size:16px; font-weight:bold; text-align:center;" colspan="2">STATUS</th>
				</tr>
                <tr>
                    <th width="10%" style="font-size:16px; font-weight:bold; text-align:center;">RENDAH</th>
                    <th width="10%" style="font-size:16px; font-weight:bold; text-align:center;">SEDANG</th>
                    <th width="10%" style="font-size:16px; font-weight:bold; text-align:center;">TINGGI</th>
                    <th width="10%" style="font-size:16px; font-weight:bold; text-align:center;">BELUM SELESAI</th>
                    <th width="10%" style="font-size:16px; font-weight:bold; text-align:center;">SUDAH SELESAI</th>                    
                </tr>
			</thead></tbody>';

$no     = 1;
$namaproyek_old = '';

if ($rstask->num_rows() > 0) {
    foreach ($rstask->result() as $row) {

        $prioritasrendah = ($row->prioritasrendah==0) ? '-' : $row->prioritasrendah;
        $prioritassedang = ($row->prioritassedang==0) ? '-' : $row->prioritassedang;
        $prioritastinggi = ($row->prioritastinggi==0) ? '-' : $row->prioritastinggi;

        $statusbelumselesai = ($row->statusbelumselesai==0) ? '-' : $row->statusbelumselesai;
        $statussudahselesai = ($row->statussudahselesai==0) ? '-' : $row->statussudahselesai;

        if ($namaproyek_old!= $row->namaproyek) {
            
            $table .= '
                      <tr style="font-size:14px; font-weight: bold;">
                        <td width="5%" style="text-align:center;">'.$no++.'</td>
                        <td width="95%" style="text-align:left;" colspan="6">'.$row->namaproyek.'</td>
                      </tr>
                    ';

        }

        $table .= '
                      <tr style="font-size:12px">
                        <td width="5%" style="text-align:center;"></td>
                        <td width="45%" style="text-align:left;">'.$row->namaprogrammer.'</td>
                        <td width="10%" style="text-align:center;">'.$prioritasrendah.'</td>
                        <td width="10%" style="text-align:center;">'.$prioritassedang.'</td>
                        <td width="10%" style="text-align:center;">'.$prioritastinggi.'</td>
                        <td width="10%" style="text-align:center;">'.$statusbelumselesai.'</td>
                        <td width="10%" style="text-align:center;">'.$statussudahselesai.'</td>
                      </tr>
                    ';

        $namaproyek_old = $row->namaproyek;
    }

} else {
    $table .= '
				<tr>
					<td width="100%" style="font-size:12px; text-align:center;" colspan="7">Data tidak ditemukan...</td>
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
