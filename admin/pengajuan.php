<?php  
    include 'header.php'; 
    include '../koneksi.php';
    
    if(isset($_GET['status'])){
        if($_GET['status']=='success'){
            echo "<script>
                    Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Data berhasil ditambah',
                                showConfirmButton: false,
                                timer: 1500
                            });
                </script>";
        }
    }
?>

<div class="container">
    <div class="mt-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h4>Surat Pengajuan</h4><br><br>
                <a href="tbh/pengajuan.php" class="btn btn-primary float-end mx-3"><i class="bi bi-plus"></i> Tambah</a><br><br>
                <div class="table-responsive px-3 py-2">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Hari/Tanggal</th>
                                <th>Tahun Ajaran</th>
                                <th>Industri</th>
                                <th>Surat Pengajuan</th>
                                <th>Surat Pengantar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $sql = mysqli_query($koneksi, "SELECT * FROM pengajuan ORDER BY id_surat");

                                $days = array(
                                    'Sun' => 'Minggu',
                                    'Mon' => 'Senin',
                                    'Tue' => 'Selasa',
                                    'Wed' => 'Rabu',
                                    'Thu' => 'Kamis',
                                    'Fri' => 'Jumat',
                                    'Sat' => 'Sabtu'
                                );

                                $months = array(
                                    'Jan' => 'Jan',
                                    'Feb' => 'Feb',
                                    'Mar' => 'Mar',
                                    'Apr' => 'Apr',
                                    'May' => 'Mei',
                                    'Jun' => 'Jun',
                                    'Jul' => 'Jul',
                                    'Aug' => 'Agu',
                                    'Sep' => 'Sep',
                                    'Oct' => 'Okt',
                                    'Nov' => 'Nov',
                                    'Dec' => 'Des'
                                );

                                while ($d = mysqli_fetch_array($sql)) {
                                    $pengantar = $d['id_surat'];
                                    $date = $d['tgl'];
                                    $dt = strtotime($date);
                                    $day = $days[date("D", $dt)];
                                    $tanggal = date("d", $dt);
                                    $bulan = $months[date("M", $dt)];
                                    $magang = $d['dudi'];

                                    $pklResult = mysqli_query($koneksi, "SELECT nama_dudi FROM dudi WHERE id_dudi = '$magang'");
                                    $pkl = mysqli_fetch_assoc($pklResult)['nama_dudi'];
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $day. ", ". $tanggal. " " . $bulan ?></td>
                                <td><?= $d['thn_ajaran']; ?></td>
                                <td><?= $pkl ?></td>
                                <td><a href="#" class="btn btn-danger"><i class="bi bi-printer"></i> Dapatkan PDF</a></td>
                                <td>
                                    <?php 
                                    if ($d['pengantar'] == null) {
                                        echo 'Surat Belum Ada!';
                                    } else {
                                        echo "<a href='cetak.php?id=".$pengantar."' class='btn btn-warning'><i class='bi bi-printer'></i> Dapatkan PDF</a>";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
