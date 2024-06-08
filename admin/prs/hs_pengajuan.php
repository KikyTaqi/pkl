<?php

    include '../../koneksi.php';

    if(isset($_GET['nos'])){
        $nos = $_GET['nos'];
        
        $sql = mysqli_query($koneksi, "DELETE FROM pengajuan WHERE id_surat = '$nos'");

        if(!$sql){
            die("Query Error = " .mysql_errno($koneksi). "-" .mysqli_error($koneski));
        }else{
            echo "<script>
                    window.location='../pengajuan.php?status=success_hapus';
                </script>";
        }   
    }


?>