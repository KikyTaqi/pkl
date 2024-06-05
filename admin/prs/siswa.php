<?php 
    include '../../koneksi.php';

    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $tgl = $_POST['tgl_lahir'];
    $nis = $_POST['nis'];
    $tmp_lahir = $_POST['tmp_lahir'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];

    $sql = mysqli_query($koneksi, "INSERT INTO siswa (nisn, nama_siswa, tgl_lahir, tempat_lahir, alamat, nis, jenis_kelamin, kelas, jurusan) 
                        VALUES ('$nisn', '$nama', '$tgl', '$tmp_lahir', '$alamat', '$nis', '$jk', '$kelas', '$jurusan')");
    if(!$sql){
        die("Query Error = " .mysql_errno($koneksi). "-" .mysqli_error($koneski));
    }else{
        echo "<script>
                alert('Data Berhasil Ditambah');
                window.location='../siswa.php';
            </script>";
    }   
?>