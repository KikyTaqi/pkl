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
            <h3 class="text-center">Data Dudi</h3>
        </div>
        <div class="card-body mt-4 p-4 my-5">
            <a href="tbh/dudi.php" class="btn btn-primary float-end"><i class="bi bi-building"></i> Tambah</a><br><br><br>   
            <div class="table-responsive">
                <table id="tbl_dudi"  class="table table-striped nowrap">
                    <thead  class="table-dark">
                        <tr>
                            <th width="5px">NO</th>
                            <th>Nama DU/DI</th>
                            <th>Pimpinan DU/DI</th>
                            <th>Alamat</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        $data = mysqli_query($koneksi, "SELECT * FROM dudi
                        ORDER BY id_dudi ASC");
                        while ($d = mysqli_fetch_array($data)) {
                    ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $d['nama_dudi']?></td>
                                <td><?= $d['ceo']?></td>
                                <td><?= $d['alamat']?></td>
                                <td>
                                    <a href="edit/dudi.php?id_dudi=<?= $d['id_dudi']?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a> | 
                                    <a href="prs/hs_dudi.php?id_dudi=<?= $d['id_dudi'] ?>" onclick="hapus(event, this)" class="btn btn-danger delete"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>

<script>

    $(document).ready(function() {
        var table = $('#tbl_dudi').DataTable( {
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
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = element.href;
                }
            });
        }
</script>

