<?php 

    include '../../koneksi.php';

    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $tgl = $_POST['tgl_lahir'];
    $tmp_lahir = $_POST['tmp_lahir'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jk'];

    $sql = mysqli_query($koneksi, "UPDATE pegawai SET nama_pegawai = '$nama', tgl_lahir = '$tgl', 
                        tempat_lahir = '$tmp_lahir', alamat = '$alamat', jenis_kelamin = '$jk' WHERE nip = '$nip'");

    if (!$sql){
        die("Query Error : " .mysqli_errno($koneksi). "-" .mysqli_error($koneksi));
    } else {
        echo "<script>
                window.location='../pegawai.php?status=success_edit';
            </script>";
    }
