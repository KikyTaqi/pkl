<?php
    include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
    <link rel="shortcut icon" href="https://static.wikia.nocookie.net/gensin-impact/images/1/1f/Item_Intertwined_Fate.png" type="image/x-icon">
    <title id="title">Login!</title>
    <style>
        .gf{
            margin: 2px 20px 2px 20px;
        }
        .bg{
            background: #F0F0F0;
        }
        .hd{
            display: none;
        }
    </style>
</head>
<body class="bg">
    <div class="container">
        <br><br>
        <center><h2>System PKL</h2></center><br><br>
        <div class="col-md-6 offset-md-3">
            <form action="login.php" method="post" id="login">
                <div class="card">
                    <div class="card-header">
                        <center><h3>Login</h3></center>
                    </div>
                    <div class="card-body gf">
                        <?php
                            if(isset($_GET['pesan'])){
                                if($_GET['pesan'] == "belum_login"){
                                    echo "<br><div class='alert alert-danger text-center'>Anda belum login!</div>";
                                }else if($_GET['pesan'] == "gagal"){
                                    echo "<br><div class='alert alert-danger text-center'>Username atau Password salah!</div>";
                                }else if($_GET['pesan'] == "logout"){
                                    echo "<br><div class='alert alert-danger text-center'>Berhasil Logout!</div>";
                                }
                            } 
                        ?>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><span class="bi bi-person"></span></span>
                                <input type="text" name="username" class="form-control" placeholder="NISN/NIP">
                            </div>
                        </div>

                        <div class="form-group">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><span class="bi bi-lock"></span></span>
                            <input id="passwordInput" type="password" name="password" class="form-control" placeholder="Password">
                            <button class="btn btn-secondary" id="togglePassword" type="button"><i class="bi bi-eye-slash"></i></button>
                            </div>
                        </div>
                        <input type="submit" value="Log In" class="btn btn-primary"><br><br>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#togglePassword").click(function(){
            var passwordField = $("#passwordInput");
            var passwordFieldType = passwordField.attr('type');
            if(passwordFieldType == 'password') {
                passwordField.attr('type', 'text');
                $("#togglePassword").html('<i class="bi bi-eye"></i>');
            } else {
                passwordField.attr('type', 'password');
                $("#togglePassword").html('<i class="bi bi-eye-slash"></i>');
            }
            });
        });
    </script>
</body>
</html>



