<?php

    include '../../koneksi.php';

    if(isset($_GET['nip'])){
        $nip = $_GET['nip'];
        
        $sql = mysqli_query($koneksi, "DELETE FROM pegawai WHERE nip = '$nip'");
        $sql = mysqli_query($koneksi, "DELETE FROM user WHERE nisn = '$nip'");

        if(!$sql){
            die("Query Error = " .mysql_errno($koneksi). "-" .mysqli_error($koneski));
        }else{
            echo "<script>
                    window.location='../pegawai.php?status=success';
                </script>";
        }   
    }


?>