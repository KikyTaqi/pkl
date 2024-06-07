<?php
    include '../../koneksi.php';

    // Mendapatkan data dari form
    $dudi = $_POST['dudi'];
    $nisn1 = $_POST['nisn1'];
    $nisn2 = !empty($_POST['nisn2']) ? $_POST['nisn2'] : NULL;
    $nisn3 = !empty($_POST['nisn3']) ? $_POST['nisn3'] : NULL;
    $nisn4 = !empty($_POST['nisn4']) ? $_POST['nisn4'] : NULL;
    $thn_ajaran = $_POST['thn_ajaran'];
    $tgl = date('Y-m-d');
    $tgl_mulai = $_POST['tgl_mulai'];
    $tgl_selesai = $_POST['tgl_selesai'];
    $durasi = $_POST['durasi'];
    $kepsek = $_POST['kepsek'];
    $thn = $_POST['thn'];

    $sql = "INSERT INTO pengajuan (nisn_1, nisn_2, nisn_3, nisn_4, dudi, thn_ajaran, tgl, tgl_mulai, tgl_selesai, durasi, kepsek, tahun) 
            VALUES ('$nisn1', " . ($nisn2 ? "'$nisn2'" : "NULL") . ", " . ($nisn3 ? "'$nisn3'" : "NULL") . ", " . ($nisn4 ? "'$nisn4'" : "NULL") . ", 
                    '$dudi', '$thn_ajaran', '$tgl', '$tgl_mulai', '$tgl_selesai', '$durasi', '$kepsek', '$thn')";
    
    $result = mysqli_query($koneksi, $sql);

    if(!$result){
        die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
    }else{
        echo "<script>
                window.location='../pengajuan.php?status=success';
            </script>";
    }
?>
