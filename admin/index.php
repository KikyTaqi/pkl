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
        width: 10px;
        }

        ::-webkit-scrollbar-track {
        background: #f1f1f1; 
        }
        
        ::-webkit-scrollbar-thumb {
        background: #888; 
        }

        ::-webkit-scrollbar-thumb:hover {
        background: #555; 
        }
    </style>
</head>
<body style="background: #f0f0f0;">
        <?php 
            session_start();
            if($_SESSION['status']!="login"){
                header("location:../index.php?pesan=belum_login");
            }
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
                            <a href="siswa.php" class="nav-link <?php echo (strpos($_SERVER['REQUEST_URI'], '/tugel2/admin/siswa.php') !== false) ? 'active' : ''; ?>"><i class="bi bi-person"></i> Siswa</a>
                        </li>
                        <li class="nav-item">
                            <a href="pegawai.php" class="nav-link <?php echo (strpos($_SERVER['REQUEST_URI'], '/tugel2/admin/pegawai.php') !== false) ? 'active' : ''; ?>"><i class="bi bi-person-vcard"></i> Pegawai</a>
                        </li>
                        <li class="nav-item">
                            <a href="dudi.php" class="nav-link <?php echo (strpos($_SERVER['REQUEST_URI'], '/tugel2/admin/dudi.php') !== false) ? 'active' : ''; ?>"><i class="bi bi-building"></i> Du/di</a>
                        </li>
                    </ul>
                </div>
                <div id="surat" class="ml-auto">
                    <ul class="nav navbar-nav">
                        <li class="nav-item dropdown dropdown-hover">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-envelope"></i>
                                Surat
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="pengajuan.php" class="dropdown-item">Surat Pengajuan & Pengantar</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a href="penarikan.php" class="dropdown-item">Surat Penarikan</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a href="ijin.php" class="dropdown-item">Surat Ijin</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a href="pkl.php" class="dropdown-item">Surat PKL</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div id="profile" class="ml-auto">
                    <ul class="nav navbar-nav">
                        <li class="nav-item dropdown dropdown-hover dh">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i>
                                <b><?php echo $_SESSION['username']; ?></b>
                            </a>
                            <ul class="dropdown-menu dm" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Edit Profile</a></li>
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
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
                </div>
                <div class="carousel-item">
                    <!-- <p>https://smkn3kendal.sch.id/2024/assets/img/smk-2.webp</p> -->
                <img class="cr" draggable="false" src="https://smkn3kendal.sch.id/2024/assets/img/smk-2.webp" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
                </div>
                <div class="carousel-item">
                <img class="cr" draggable="false" src="https://images2.imgbox.com/b0/fd/fVY7jIJF_o.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
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
        
        <div class="card">
            <div class="card-body">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos in doloribus libero beatae ipsam nulla, necessitatibus architecto, eum accusantium aperiam ad debitis. Quos culpa in molestiae optio maxime veniam quae autem impedit. Ex incidunt corrupti aliquid sunt dolorum voluptates, iure harum esse quidem? Adipisci sequi fugiat dicta aliquid in. Commodi exercitationem voluptatibus beatae officia repellendus excepturi autem officiis reprehenderit consequatur pariatur. Quos neque dolorum esse in praesentium ut nobis odit laboriosam, possimus sunt omnis voluptatem architecto. Sed dolor amet temporibus excepturi assumenda, provident, dolorem quis magnam aut repellat, quia eos nesciunt praesentium fugit qui doloremque fugiat error officia nostrum commodi.
            </div>
        </div>
</body>
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