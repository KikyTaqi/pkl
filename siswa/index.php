<?php 
    include '../koneksi.php';
?>

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
    
    <script src="https://cdn.datatables.net/select/2.0.1/js/select.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/select/2.0.1/js/dataTables.select.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/6.0.0/bootbox.js"></script>
    
    
    <link rel="shortcut icon" href="https://static.wikia.nocookie.net/gensin-impact/images/1/1f/Item_Intertwined_Fate.png" type="image/x-icon">
    <title id="title">System PKL</title>

    <style>
        .rnd{
            border-radius: 6px;
        }

        .cr{
            width: 100%;
            height: 100vh;
            object-fit: cover;
            filter: brightness(70%);
        }
        .tsp{
                background: transparent;
                position: absolute;
                z-index: 2;
        }

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
<body style="background: #f0f0f0;">
        <?php 
            include '../koneksi.php';

            session_start();
            if($_SESSION['status']!="login"){
                header("location:../index.php?pesan=belum_login");
            }

            $user = $_SESSION['username'];

            $sql = "SELECT * FROM user WHERE nisn = '$user'";
            $result = mysqli_query($koneksi, $sql);

            $d = mysqli_fetch_assoc($result);
        ?>

        <nav class="navbar navbar-expand-lg navbar-dark tsp text-white" style="border-radius: 0px;">
        <div class="container-fluid d-flex justify-content-between">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#bs-example-navbar-collapse-1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">System PKL</a>
                </div>
                <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link <?php echo (strpos($_SERVER['REQUEST_URI'], '/tugel2/admin/index.php') !== false) ? 'active' : ''; ?>"><i class="bi bi-house"></i> Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="dudi.php" class="nav-link <?php echo (strpos($_SERVER['REQUEST_URI'], '/tugel2/admin/dudi.php') !== false) ? 'active' : ''; ?>"><i class="bi bi-building"></i> Du/di</a>
                        </li>
                        <li class="nav-item">
                            <a href="pengajuan.php" class="nav-link <?php echo (strpos($_SERVER['REQUEST_URI'], '/tugel2/admin/pengajuan.php') !== false) ? 'active' : ''; ?>"><i class="bi bi-envelope"></i> Surat</a>
                        </li>
                    </ul>
                </div>
                <div id="profile" class="ml-auto">
                    <ul class="nav navbar-nav">
                        <li class="nav-item dropdown dropdown-hover dh">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i>
                                <b><?php echo $d['profile_name']; ?></b>
                            </a>
                            <ul class="dropdown-menu dm" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a href="../logout.php" class="dropdown-item"><i class="bi bi-box-arrow-left"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="carouselExampleCaptions" class="carousel slide" data-bs-touch="false" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <!-- <p>https://smkn3kendal.sch.id/2024/assets/img/smk-1.webp</p> -->
                <img class="cr" draggable="false" src="https://smkn3kendal.sch.id/2024/assets/img/smk-1.webp" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <!-- <p>https://smkn3kendal.sch.id/2024/assets/img/smk-2.webp</p> -->
                <img class="cr" draggable="false" src="https://smkn3kendal.sch.id/2024/assets/img/smk-2.webp" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img class="cr" draggable="false" src="https://images2.imgbox.com/b0/fd/fVY7jIJF_o.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        
        <!-- Deskripsi Sistem PKL -->
        <section class="container mt-5">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2>Selamat Datang di Sistem PKL</h2>
                    <p>Sistem PKL adalah platform yang dirancang untuk memudahkan pengelolaan dan monitoring program Praktek Kerja Lapangan (PKL). Dengan fitur-fitur yang lengkap dan mudah digunakan, kami membantu sekolah, siswa, dan perusahaan untuk mengelola semua aspek dari PKL secara efisien.</p>
                </div>
            </div>
        </section>

        <!-- Fitur-Fitur Utama -->
        <section class="container mt-5">
            <div class="row">
                <div class="col-lg-10 mx-auto text-center">
                    <h2>Fitur Utama</h2>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <i class="bi bi-calendar-check"></i>
                            <h4>Manajemen Jadwal</h4>
                            <p>Memudahkan pengelolaan jadwal PKL bagi siswa dan pengajar.</p>
                        </div>
                        <div class="col-md-4">
                            <i class="bi bi-people"></i>
                            <h4>Pelacakan Siswa</h4>
                            <p>Melacak kemajuan dan kehadiran siswa selama PKL.</p>
                        </div>
                        <div class="col-md-4">
                            <i class="bi bi-file-earmark-text"></i>
                            <h4>Generasi Surat</h4>
                            <p>Membuat dan mengelola surat-surat resmi terkait PKL dengan mudah.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Testimonial -->
        <section class="container mt-5">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2>Testimonial</h2>
                    <div class="testimonial mt-4">
                        <p>"Sistem PKL sangat membantu kami dalam mengatur semua proses PKL. Fitur-fiturnya mudah digunakan dan efisien. Terima kasih!"</p>
                    </div>
                </div>
            </div>
        </section>
            <br><br><br>

</body>
<?php include 'footer.php' ?>
</html>

<script>
    var carouselImages = document.querySelectorAll('.cr');

    carouselImages.forEach(function(image) {
        image.addEventListener('contextmenu', function(event) {
            event.preventDefault();
        });
    });

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
