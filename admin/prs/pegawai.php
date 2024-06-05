<?php 
    include '../../koneksi.php';

    $nama = $_POST['nama'];
    $nip = $_POST['nip'];
    $tgl = $_POST['tgl_lahir'];
    $tmp_lahir = $_POST['tmp_lahir'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];

    $sql = mysqli_query($koneksi, "INSERT INTO pegawai (nip, nama_pegawai, tgl_lahir, alamat, jenis_kelamin) 
                        VALUES ('$nip', '$nama', '$tgl', '$alamat', '$jk')");
    if(!$sql){
        die("Query Error = " .mysql_errno($koneksi). "-" .mysqli_error($koneski));
    }else{
        echo "<script>
                alert('Data Berhasil Ditambah');
                window.location='../pegawai.php';
            </script>";
    }   
?>