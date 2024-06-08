<?php

    include '../../koneksi.php';

    if(isset($_GET['id_dudi'])){
        $id_dudi = $_GET['id_dudi'];
        
        $sql = mysqli_query($koneksi, "DELETE FROM dudi WHERE id_dudi = '$id_dudi'");

        if(!$sql){
            die("Query Error = " .mysql_errno($koneksi). "-" .mysqli_error($koneski));
        }else{
            echo "<script>
                    window.location='../dudi.php?status=success';
                </script>";
        }   
    }


?>