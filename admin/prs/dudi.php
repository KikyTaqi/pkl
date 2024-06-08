<?php

    include '../../koneksi.php';

    $nm_dudi = $_POST['nm_dudi'];
    $nm_pimpinan = $_POST['nm_pimpinan'];
    $alamat = $_POST['alamat'];

    $sql = mysqli_query($koneksi, "INSERT INTO dudi(nama_dudi, ceo, alamat) 
                        VALUES ('$nm_dudi', '$nm_pimpinan', '$alamat')");

    if(!$sql){
        die("Query Error = " .mysql_errno($koneksi). "-" .mysqli_error($koneski));
    }else{
        echo "<script>
                window.location='../dudi.php?status=success';
            </script>";
    }