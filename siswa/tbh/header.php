<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/2.0.1/css/select.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.css">

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
    
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.bootstrap5.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">
    <script src="https://unpkg.com/@jarstone/dselect/dist/js/dselect.js"></script>
    
    <script src="https://cdn.datatables.net/select/2.0.1/js/select.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/select/2.0.1/js/dataTables.select.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/6.0.0/bootbox.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    
    <link rel="shortcut icon" href="https://static.wikia.nocookie.net/gensin-impact/images/1/1f/Item_Intertwined_Fate.png" type="image/x-icon">
    <title id="title">System PKL</title>
    
    <style>
         ::-webkit-scrollbar {
        width: 6px;
        }

        ::-webkit-scrollbar-track {
        background: rgb(255, 255, 255, 0); 
        }
        
        ::-webkit-scrollbar-thumb {
        background: rgb(136, 136, 136, 30); 
        }

        ::-webkit-scrollbar-thumb:hover {
        background: #555; 
        }
    </style>

</head>
<body style="background: #f0f0f0; padding-top: 70px;">
        <?php 
            include '../../koneksi.php';

            session_start();
            if($_SESSION['status']!="login"){
                header("location:../index.php?pesan=belum_login");
            }

            $user = $_SESSION['username'];

            $sql = "SELECT * FROM user WHERE nisn = '$user'";
            $result = mysqli_query($koneksi, $sql);

            $d = mysqli_fetch_assoc($result);

        ?>

        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="border-radius: 0px;">
        <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#bs-example-navbar-collapse-1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">System PKL</a>
                </div>
                <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="nav-item">
                            <a href="../index.php" class="nav-link <?php echo (strpos($_SERVER['REQUEST_URI'], '/tugel2/admin/index.php') !== false) ? 'active' : ''; ?>"><i class="bi bi-house"></i> Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="../siswa.php" class="nav-link <?php echo (strpos($_SERVER['REQUEST_URI'], '/tugel2/admin/siswa.php') !== false) ? 'active' : ''; ?>"><i class="bi bi-person"></i> Siswa</a>
                        </li>
                        <li class="nav-item">
                            <a href="../pegawai.php" class="nav-link <?php echo (strpos($_SERVER['REQUEST_URI'], '/tugel2/admin/pegawai.php') !== false) ? 'active' : ''; ?>"><i class="bi bi-person-vcard"></i> Pegawai</a>
                        </li>
                        <li class="nav-item">
                            <a href="../dudi.php" class="nav-link <?php echo (strpos($_SERVER['REQUEST_URI'], '/tugel2/admin/dudi.php') !== false) ? 'active' : ''; ?>"><i class="bi bi-building"></i> Du/di</a>
                        </li>
                    </ul>
                    <div id="surat" class="ml-auto">
                    <ul class="nav navbar-nav">
                        <li class="nav-item dropdown dropdown-hover">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-envelope"></i>
                                Surat
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="../pengajuan.php" class="dropdown-item">Surat Pengajuan & Pengantar</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a href="../penarikan.php" class="dropdown-item">Surat Penarikan</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a href="../ijin.php" class="dropdown-item">Surat Ijin</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a href="../pkl.php" class="dropdown-item">Surat PKL</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                    <ul class="nav navbar-nav">
                        <li class="nav-item dropdown dropdown-hover dh">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i>
                                <b><?php echo $d['profile_name']; ?></b>
                            </a>
                            <ul class="dropdown-menu dm" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a href="../../logout.php" class="dropdown-item"><i class="bi bi-box-arrow-left"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
</body>
</html>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    var dropdown = document.querySelector('.dh');

    dropdown.addEventListener('mouseenter', function() {
        this.querySelector('.dm').classList.add('show');
    });

    dropdown.addEventListener('mouseleave', function() {
        this.querySelector('.dm').classList.remove('show');
    });
});
</script>