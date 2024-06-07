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
            <div class="card-header">
                <center>
                    <h4>Pengajuan</h4>
                </center>
            </div>
            <div class="card-body">
                <a href="tbh/pengajuan.php" class="btn btn-primary float-end mx-3"><i class="bi bi-plus"></i> Tambah</a><br><br>
                <div class="table-responsive px-3 py-2">
                    <table class="table table-striped" id="tbl_pengajuan">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Hari/Tanggal</th>
                                <th>Tahun Ajaran</th>
                                <th>Industri</th>
                                <th>Surat Pengajuan</th>
                                <th>Surat Pengantar</th>
                                <th>Opsi</th>
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
                                    $siswa = $d['nisn_1'];

                                    $pklResult = mysqli_query($koneksi, "SELECT nama_dudi FROM dudi WHERE id_dudi = '$magang'");
                                    $pkl = mysqli_fetch_assoc($pklResult)['nama_dudi'];

                                    $swRs = mysqli_query($koneksi, "SELECT nama_siswa FROM siswa WHERE nisn = '$siswa'");
                                    $sw = mysqli_fetch_assoc($swRs)['nama_siswa'];
                                    ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $sw ?></td>
                                <td><?= $day. ", ". $tanggal. " " . $bulan ?></td>
                                <td><?= $d['thn_ajaran']; ?></td>
                                <td><?= $pkl ?></td>
                                <td><a href="cetak_pengajuan.php?no_surat=<?= $d['id_surat'] ?>" target="_blank" class="btn btn-danger"><i class="bi bi-printer"></i> Dapatkan PDF</a></td>
                                <td>
                                    <?php 
                                    if ($d['pengantar'] == null) {
                                        echo 'Surat Belum Ada!';
                                    } else {
                                        echo "<a href='cetak_pengantar.php?no_surat=".$pengantar."' target='_blank' class='btn btn-warning'><i class='bi bi-printer'></i> Dapatkan PDF</a>";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        if($d['pengantar'] == ""){
                                            echo '<a href="prs/terima.php" class="btn btn-success"><i class="bi bi-check-lg"></i></a>';
                                        }else{
                                            echo '<a href="prs/batal.php" class="btn btn-warning"><i class="bi bi-x-lg"></i></a>';
                                        }
                                    ?>
                                    <a href="prs/hs_pengajuan.php" class="btn btn-danger"><i class="bi bi-trash"></i></a>
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

<script>
     $(document).ready(function() {
        var table = $('#tbl_pengajuan').DataTable( {
            responsive: true
        } );
    
        new $.fn.dataTable.FixedHeader( table );
    } );

</script>