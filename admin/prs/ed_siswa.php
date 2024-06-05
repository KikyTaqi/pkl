<?php 

    include '../../koneksi.php';

    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $tgl = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $nis = $_POST['nis'];
    $jk = $_POST['jk'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $sql = mysqli_query($koneksi, "UPDATE siswa SET nama_siswa = '$nama', tgl_lahir = '$tgl', alamat = '$alamat', 
                    nis = '$nis', jenis_kelamin = '$jk', kelas = '$kelas', jurusan = '$jurusan' WHERE nisn = '$nisn'");

    if (!$sql){
        die("Query Error : " .mysqli_errno($koneksi). "-" .mysqli_error($koneksi));
    } else {
        echo "<script>
                window.location='../siswa.php?status=success_edit';
            </script>";
    }
