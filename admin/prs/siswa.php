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

    $check_nisn = mysqli_query($koneksi, "SELECT nisn FROM siswa WHERE nisn = '$nisn'");
    $check_nip = mysqli_query($koneksi, "SELECT nip FROM pegawai WHERE nip = '$nisn'");
    if (mysqli_num_rows($check_nisn) > 0) {
        echo "<script>
                window.location='../tbh/siswa.php?status=data_ada';
            </script>";
    } else {

        if(mysqli_num_rows($check_nip) > 0){
            echo "<script>
                window.location='../tbh/siswa.php?status=data_ada';
            </script>";
        }else{
            $sql = mysqli_query($koneksi, "INSERT INTO siswa (nisn, nama_siswa, tgl_lahir, tempat_lahir, alamat, nis, jenis_kelamin, kelas, jurusan) 
                            VALUES ('$nisn', '$nama', '$tgl', '$tmp_lahir', '$alamat', '$nis', '$jk', '$kelas', '$jurusan')");

            $sw = mysqli_query($koneksi, "INSERT INTO user (username, profile_name, password, role, nisn) 
                                VALUES ('$nisn', '$nisn', MD5('$nisn'), 'siswa', '$nisn')");
            if(!$sql){
                die("Query Error = " .mysqli_errno($koneksi). "-" .mysqli_error($koneksi));
            } else {
                echo "<script>
                        window.location='../siswa.php?status=success';
                    </script>";
            }
        }
        
    }
?>
