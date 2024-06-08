<?php

    include '../../koneksi.php';

    if(isset($_GET['nos'])){
        $nos = $_GET['nos'];
        $s = '1';

        $sql = mysqli_query($koneksi, "UPDATE pengajuan SET pengantar = '$s' WHERE id_surat = '$nos'");
        if (!$sql){
            die("Query Error : " .mysqli_errno($koneksi). "-" .mysqli_error($koneksi));
        } else {
            echo "<script>
                    window.location='../pengajuan.php?status=success_terima';
                </script>";
        }
    }
