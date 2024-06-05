<?php 
    $koneksi = mysqli_connect("localhost","root","","database_pkl");

    if (mysqli_connect_errno()){
        echo "Koneksi data base gagal " .mysqli_connect_error();
    }
?>