<?php

    include '../../koneksi.php';

    if(isset($_GET['nip'])){
        $nip = $_GET['nip'];
        
        $sql = mysqli_query($koneksi, "DELETE FROM pegawai WHERE nip = '$nip'");

        if(!$sql){
            die("Query Error = " .mysql_errno($koneksi). "-" .mysqli_error($koneski));
        }else{
            echo "<script>
                    alert('Data Berhasil Dihapus');
                    window.location='../pegawai.php';
                </script>";
        }   
    }


?>