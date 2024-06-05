<?php

    include '../../koneksi.php';

    if(isset($_GET['nisn'])){
        $nisn = $_GET['nisn'];
        
        $sql = mysqli_query($koneksi, "DELETE FROM siswa WHERE nisn = '$nisn'");

        if(!$sql){
            die("Query Error = " .mysql_errno($koneksi). "-" .mysqli_error($koneski));
        }else{
            echo "<script>
                    window.location='../siswa.php?status=success';
                </script>";
        }   
    }


?>