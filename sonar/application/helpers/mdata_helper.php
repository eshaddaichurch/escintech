<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

// function __construct()
// {
//     __construct();
// }

function kekata($x)
{
    $x     = abs($x);
    $angka = array("", "satu", "dua", "tiga", "empat", "lima",
        "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($x < 12) {
        $temp = " " . $angka[$x];
    } else if ($x < 20) {
        $temp = kekata($x - 10) . " belas";
    } else if ($x < 100) {
        $temp = kekata($x / 10) . " puluh" . kekata($x % 10);
    } else if ($x < 200) {
        $temp = " seratus" . kekata($x - 100);
    } else if ($x < 1000) {
        $temp = kekata($x / 100) . " ratus" . kekata($x % 100);
    } else if ($x < 2000) {
        $temp = " seribu" . kekata($x - 1000);
    } else if ($x < 1000000) {
        $temp = kekata($x / 1000) . " ribu" . kekata($x % 1000);
    } else if ($x < 1000000000) {
        $temp = kekata($x / 1000000) . " juta" . kekata($x % 1000000);
    } else if ($x < 1000000000000) {
        $temp = kekata($x / 1000000000) . " milyar" . kekata(fmod($x, 1000000000));
    } else if ($x < 1000000000000000) {
        $temp = kekata($x / 1000000000000) . " trilyun" . kekata(fmod($x, 1000000000000));
    }
    return $temp;
}

function terbilang($x, $style)
{
    if ($x < 0) {
        $hasil = "minus " . trim(kekata($x));
    } else {
        $hasil = trim(kekata($x));
    }
    switch ($style) {
        case 1:
            $hasil = strtoupper($hasil);
            break;
        case 2:
            $hasil = strtolower($hasil);
            break;
        case 3:
            $hasil = ucwords($hasil);
            break;
        default:
            $hasil = ucfirst($hasil);
            break;
    }
    return $hasil;
}

function bulan($id_bulan)
{
    switch ($id_bulan) {
        case '1':
            $strbulan = 'Januari';
            break;
        case '2':
            $strbulan = 'Februari';
            break;
        case '3':
            $strbulan = 'Maret';
            break;
        case '4':
            $strbulan = 'April';
            break;
        case '5':
            $strbulan = 'Mei';
            break;
        case '6':
            $strbulan = 'Juni';
            break;
        case '7':
            $strbulan = 'Juli';
            break;
        case '8':
            $strbulan = 'Agustus';
            break;
        case '9':
            $strbulan = 'September';
            break;
        case '10':
            $strbulan = 'Oktober';
            break;
        case '11':
            $strbulan = 'November';
            break;
        case '12':
            $strbulan = 'Desember';
            break;
        default:
            $strbulan = '';
            break;
    }
    return $strbulan;
}

function hari_libur($tanggal)
{
    $CI = &get_instance();

    $lreturn = false;
    $nhari   = date("N", $tanggal);
    if ($nhari == '7') {
        $lreturn = true;
    } else {
        $nlibur = $CI->db->query('select * from libur where tgl_libur= "' . date('Y-m-d', $tanggal) . '"')->num_rows();
        if ($nlibur > 0) {
            $lreturn = true;
        }
    }
    return $lreturn;
}

function hari($date)
{
    $hari = date("D", strtotime($date));

    switch ($hari) {
        case 'Sun':
            $hari_ini = "Minggu";
            break;

        case 'Mon':
            $hari_ini = "Senin";
            break;

        case 'Tue':
            $hari_ini = "Selasa";
            break;

        case 'Wed':
            $hari_ini = "Rabu";
            break;

        case 'Thu':
            $hari_ini = "Kamis";
            break;

        case 'Fri':
            $hari_ini = "Jumat";
            break;

        case 'Sat':
            $hari_ini = "Sabtu";
            break;

        default:
            $hari_ini = "Tidak di ketahui";
            break;
    }

    return $hari_ini;

}

function tglindonesialengkap($tanggal)
{
    if (!empty($tanggal)) {

        $ntgl = date('d', strtotime($tanggal));
        $nbln = date('m', strtotime($tanggal));
        $nthn = date('Y', strtotime($tanggal));

        switch ($nbln) {
            case '01':
                $cBln = 'Januari';
                break;
            case '02':
                $cBln = 'Februari';
                break;
            case '03':
                $cBln = 'Maret';
                break;
            case '04':
                $cBln = 'April';
                break;
            case '05':
                $cBln = 'Mei';
                break;
            case '06':
                $cBln = 'Juni';
                break;
            case '07':
                $cBln = 'Juli';
                break;
            case '08':
                $cBln = 'Agustus';
                break;
            case '09':
                $cBln = 'September';
                break;
            case '10':
                $cBln = 'Oktober';
                break;
            case '11':
                $cBln = 'November';
                break;
            default:
                $cBln = 'Desember';
                break;
        }

        return $ntgl . ' ' . $cBln . ' ' . $nthn;
    } else {
        return '';
    }

}

function tglindonesia($tanggal)
{
    if (!empty($tanggal)) {
        $ntgl = date('d', strtotime($tanggal));
        $nbln = date('m', strtotime($tanggal));
        $nthn = date('Y', strtotime($tanggal));

        switch ($nbln) {
            case '01':
                $cBln = 'Jan';
                break;
            case '02':
                $cBln = 'Feb';
                break;
            case '03':
                $cBln = 'Mar';
                break;
            case '04':
                $cBln = 'Apr';
                break;
            case '05':
                $cBln = 'Mei';
                break;
            case '06':
                $cBln = 'Jun';
                break;
            case '07':
                $cBln = 'Jul';
                break;
            case '08':
                $cBln = 'Ags';
                break;
            case '09':
                $cBln = 'Sep';
                break;
            case '10':
                $cBln = 'Okt';
                break;
            case '11':
                $cBln = 'Nov';
                break;
            default:
                $cBln = 'Des';
                break;
        }

        return $ntgl . ' ' . $cBln . ' ' . $nthn;
    } else {
        return '';
    }

}

function tgldb($tanggal)
{
    return date('Y-m-d', strtotime($tanggal));
}

function numberformat_indonesia($tenama)
{
    $cReturn = number_format($tenama, 0, '.', ',');
    return $cReturn;
}

function replwzero($value, $jumlahchar)
{
    $chrreturn = $value + 0; //supaya jadi integer
    $nlen      = strlen($chrreturn);

    for ($i = $nlen; $i < $jumlahchar; $i++) {
        $chrreturn = '0' . $chrreturn;
    }
    return $chrreturn;
}

function get_saldo_normal($kdakun)
{
    if (substr($kdakun, 0, 1) == '1' || substr($kdakun, 0, 1) == '5') {
        return 'D';
    } else {
        return 'K';
    }
}

function format_rupiah($jumlah)
{
    return number_format($jumlah);
}

function untitik($jumlah)
{
    return str_replace(',', '', $jumlah);
}

function berapawaktuyanglalu($tanggal)
{

    $tanggal         = new DateTime(date("Y-m-d H:i:s", strtotime($tanggal)));
    $tanggalsekarang = new DateTime();
    $interval        = $tanggal->diff($tanggalsekarang);
    $waktulalu       = '';

    if ($interval->format('%y') >= 1) {
        $waktulalu = $interval->format('%y Tahun');
    }

    if ($interval->format('%m') >= 1) {
        $waktulalu = $interval->format('%m bulan');
    }

    if ($interval->format('%d') >= 1) {
        $waktulalu = $interval->format('%d Hari');
    } else {
        if ($interval->format('%h') >= 1) {
            $waktulalu .= $interval->format('%h Jam ');
        } else {
            $waktulalu .= $interval->format('%i Menit');
        }
    }

    if ($interval->format('%i') <= 0) {
        return $waktulalu = 'Baru saja';
    } else {
        return $waktulalu . ' yang lalu';
    }

}
