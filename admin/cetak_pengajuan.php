<?php

    require 'fpdf/fpdf.php';

    $date = date('dd-MM-yyyy');

    $tanggal = date('d', $date);
    $tahun = date('Y', $date);

    $daftar_bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli"
                        , "Agustus", "September", "Oktober","November", "Desember"];

    $bulan = $daftar_bulan[date("n", $timestamp) - 1];

    $daftar_hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"]; 
    $day = date("w", $date);

    $hari = $daftar_hari[$day];

    $pdf = new FPDF();
    $pdf->addPage();

    $pdf->setFont('helvetica', '',16);