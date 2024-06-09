<?php 
    include '../../koneksi.php';

    $nama = $_POST['nama'];
    $nip = $_POST['nip'];
    $tgl = $_POST['tgl_lahir'];
    $tmp_lahir = $_POST['tmp_lahir'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];

    
    $check_nip = mysqli_query($koneksi, "SELECT nip FROM pegawai WHERE nip = '$nip'");
    $check_nisn = mysqli_query($koneksi, "SELECT nisn FROM siswa WHERE nisn = '$nip'");
    if(mysqli_num_rows($check_nip)> 0){
        echo "<script>
                window.location='../tbh/pegawai.php?status=data_ada';
            </script>";
    }else{

        if(mysqli_num_rows($check_nip)> 0){
            echo "<script>
                window.location='../tbh/pegawai.php?status=data_ada';
            </script>";
        }else{
            $sql = mysqli_query($koneksi, "INSERT INTO pegawai (nip, nama_pegawai, tgl_lahir, tempat_lahir, alamat, jenis_kelamin) 
                        VALUES ('$nip', '$nama', '$tgl', '$tmp_lahir', '$alamat', '$jk')");

            $sw = mysqli_query($koneksi, "INSERT INTO user (username, profile_name, password, role, nisn) 
                            VALUES ('$nip', '$nip', MD5('$nip'), 'guru', '$nip')");

            if(!$sql){
                die("Query Error = " .mysql_errno($koneksi). "-" .mysqli_error($koneski));
            }else{
                echo "<script>
                        window.location='../pegawai.php?status=success';
                    </script>";
            }   
        }

        
    }
    
    
?>