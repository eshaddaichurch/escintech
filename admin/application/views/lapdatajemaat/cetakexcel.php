<?php

header("Content-type: application/vnd-ms-excel");

// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=laporan-data-jemaat.xls");

$table .= '<h5 style="text-align: center;">LAPORAN DATA JEMAAT</h5>';

$table .= '<table border="1" cellpadding="5">';
$table .= '
            <thead>
                <tr style="font-size:12px; font-weight:bold;">
                    <th width="5%" style="text-align:center;">NO</th>
                    <th width="15%" style="text-align:center;">No AJ</th>
                    <th width="30%" style="text-align:center;">Nama Lengkap</th>
                    <th width="5%" style="text-align:center;">JK</th>
                    <th width="5%" style="text-align:center;">Umur</th>
                    <th width="15%" style="text-align:center;">Status<br>Pernikahan</th>
                    <th width="15%" style="text-align:center;">Pekerjaan</th>
                    <th width="10%" style="text-align:center;">Status</th>
                </tr>
            </thead></tbody>';

$no = 1;

if ($rsJemaat->num_rows() > 0) {
    foreach ($rsJemaat->result() as $row) {
        if ($row->jeniskelamin=='Laki-laki') {
            $jeniskelamin = 'L';
        }else{
            $jeniskelamin = 'P';
        }
        $table .= '
            <tr style="font-size:10px;">
                <td width="5%" style="text-align:center;">'.$no++.'</td>
                <td width="15%" style="text-align:center;">'.$row->noaj.'</td>
                <td width="30%" style="text-align:left;">'.$row->namalengkap.'</td>
                <td width="5%" style="text-align:center;">'.$jeniskelamin.'</td>
                <td width="5%" style="text-align:center;">'.$row->umur.' Thn</td>
                <td width="15%" style="text-align:center;">'.$row->statuspernikahan.'</td>
                <td width="15%" style="text-align:center;">'.$row->pekerjaan.'</td>
                <td width="10%" style="text-align:center;">'.$row->statusjemaat.'</td>
            </tr>
        ';

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

echo $table;
