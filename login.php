<?php 
    session_start();
    include 'koneksi.php';
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = mysqli_query($koneksi,"SELECT role FROM user WHERE username = '$username'");
    $rs = mysqli_fetch_assoc($sql);
    $role = $rs['role'];

    $data = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' AND password = '$password' AND role = '$role'");
    $cek = mysqli_num_rows($data);
    if($cek > 0){
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        if($role == "admin"){
            header("location:admin/index.php");
        }else if($role == "guru"){
            header("location:guru/index.php");
        }else if($role == "siswa"){
            header("location:siswa/index.php");
        }
    }else{
        header("location:index.php?pesan=gagal");
    }

?>