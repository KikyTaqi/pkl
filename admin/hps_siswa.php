<?php 
    include '../koneksi.php';
    $id = $_GET['id'];
    $query = "DELETE FROM siswa WHERE nisn = '$id'";
    $result = mysqli_query($koneksi, $query);
    if (!$result){
        die("Query Error : " .mysqli_errno($koneksi). "-" .mysqli_error($koneksi));
    } else {
        echo "<script>
                alert('Data Berhasil Dihapus');
                window.location='siswa.php';
            </script>";
    }
?>