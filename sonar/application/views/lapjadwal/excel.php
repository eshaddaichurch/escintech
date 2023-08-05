<?php

header("Content-type: application/vnd-ms-excel");

// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=laporan-pekerjaan.xls");

$table = '';

$table .= '<table cellpadding="5">
            <tbody>
                <tr>
                    <td width="100%" style="text-align: left; font-weight: bold; font-size: 20px;">SONAR</td>
                </tr>
                <tr>
                    <td width="100%" style="text-align: left; font-weight: bold; font-size: 20px;">LAPORAN PEKERJAAN</td>
                </tr>
            </tbody>
            </table>';

$table .= '<br><br><table border="1" cellpadding="5">';
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
          <tr style="font-size:12px" style="vertical-align: top;">
            <td width="5%" style="text-align:center;">' . $no++ . '</td>
            <td width="10%" style="text-align:center;">' . tglindonesia($row->tglinsert) . '</td>
            <td width="10%" style="text-align:center;">' . tglindonesia($row->tglmulai) . '<br>' . tglindonesia($row->tglselesai) . '</td>
            <td width="35%" style="text-align:left;"><span style="font-weight: bold">' . htmlentities($row->namatask) . '</span><br>' . $row->namaproyek . '<br>Kategori: ' . $row->namakategori . ' | Prioritas: ' . $row->prioritas . '</td>
            <td width="15%" style="text-align:center;">' . $row->namapembuattask . '</td>
            <td width="15%" style="text-align:center;">' . $row->namapic . '</td>
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

echo $table;
