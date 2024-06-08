<?php

    include '../../koneksi.php';

    $id = $_POST['id'];
    $nm_dudi = $_POST['nm_dudi'];
    $nm_pimpinan = $_POST['nm_pimpinan'];
    $alamat = $_POST['alamat'];

    $sql = mysqli_query($koneksi, "UPDATE dudi SET nama_dudi = '$nm_dudi', ceo = '$nm_pimpinan',
                             alamat = '$alamat' WHERE id_dudi = '$id'");

    if (!$sql){
        die("Query Error : " .mysqli_errno($koneksi). "-" .mysqli_error($koneksi));
    } else {
        echo "<script>
                window.location='../dudi.php?status=success_edit';
            </script>";
    }
