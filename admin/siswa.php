<?php 
    include '../koneksi.php';
    include 'header.php';
?>
<div class="container">
    <div class="card mt-4 mb-4">

        <?php 
            if(isset($_GET['status'])){
                if($_GET['status']=='success_hapus'){
                    echo "<script>
                            Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: 'Data berhasil dihapus',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                        </script>";
                }if($_GET['status']=='success_edit'){
                    echo "<script>
                            Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: 'Data berhasil diubah',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                        </script>";
                }if($_GET['status']=='success'){
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

        <div class="card-header">
            <h3>Data Siswa</h3>
        </div>
        <div class="card-body mt-4 p-4 my-5">
            <div class="table-responsive">
                <a href="tbh/siswa.php" class="btn btn-primary float-end"><i class="bi bi-person"></i> Tambah</a><br><br><br>   
                <table id="tbl_siswa"  class="table table-striped nowrap">
                    <thead>
                        <tr class="table-dark">
                            <th width="5px">NO</th>
                            <th>Nama</th>
                            <th>NISN</th>
                            <th>Tanggal Lahir</th>
                            <th>Tempat Lahir</th>
                            <th>Alamat</th>
                            <th>NIS</th>
                            <th>Jenis Kelamin</th>
                            <th>Kelas</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        $data = mysqli_query($koneksi, "SELECT * FROM siswa
                        ORDER BY nisn DESC");
                        while ($d = mysqli_fetch_array($data)) {
                    ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $d['nama_siswa']?></td>
                                <td><?= $d['nisn']?></td>
                                <td><?= $d['tgl_lahir']?></td>
                                <td><?= $d['tempat_lahir']?></td>
                                <td><?= $d['alamat']?></td>
                                <td><?= $d['nis']?></td>
                                <td><?= $d['jenis_kelamin']?></td>
                                <td><?= $d['kelas']. " ".$d['jurusan'] ?></td>
                                <td>
                                    <a href="edit/siswa.php?nisn=<?= $d['nisn']?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a> | 
                                    <a href="prs/hs_siswa.php?nisn=<?= $d['nisn'] ?>" onclick="hapus(event, this)" class="btn btn-danger delete"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="bootbox.all.min.js"></script>
<script>

    $(document).ready(function() {
        var table = $('#tbl_siswa').DataTable( {
            responsive: true
        } );
    
        new $.fn.dataTable.FixedHeader( table );
    } );


    function hapus(event, element) {
            event.preventDefault();

            Swal.fire({
                title: 'Apakah Kamu yakin?',
                text: "Data akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = element.href;
                }
            });
        }
</script>

