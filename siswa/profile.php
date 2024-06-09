<?php 
    include '../koneksi.php';
    include 'header.php';

    $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE nisn = '$user'");
    $d = mysqli_fetch_assoc($sql);
    
    $sql2 = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn = '$user'");
    $sw = mysqli_fetch_assoc($sql2);

    if(isset($_GET['status'])){
        if($_GET['status']=='success'){
            echo "<script>
                    Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Profile berhasil diubah',
                                showConfirmButton: false,
                                timer: 1500
                            });
                </script>";
        }
    }
?>

<div class="container">
    <div class="my-4">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">
                    Profile
                </h3>
            </div>
            <div class="card-body">
                <a href="edit/profile.php" class="btn btn-outline-primary float-end">Edit Profile</a>
                <table class="table mt-4">
                    <tr>
                        <td>Nama </td>
                        <td>: <?= $d['profile_name'] ?></td>
                    </tr>
                    <tr>
                        <td>NISN</td>
                        <td>: <?= $sw['nisn'] ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>: <?= $sw['tgl_lahir'] ?></td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td>: <?= $sw['tempat_lahir'] ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: <?= $sw['alamat'] ?></td>
                    </tr>
                    <tr>
                        <td>NIS</td>
                        <td>: <?= $sw['nis'] ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>: <?= $sw['jenis_kelamin'] == "L" ? "Laki-Laki" : "Perempuan"; ?></td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td>: <?= $sw['kelas']. " ". $sw['jurusan'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>