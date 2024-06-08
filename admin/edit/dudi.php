<?php 
    include '../header.php';

    include '../../koneksi.php';

    if(isset($_GET['id_dudi'])){
        $id_dudi = $_GET['id_dudi'];
        $sql = mysqli_query($koneksi, "SELECT * FROM dudi WHERE id_dudi = '$id_dudi'");
        if (!$sql){
            die("Query Error : " .mysqli_errno($koneksi). "-" .mysqli_error($koneksi));
        }
        $d = mysqli_fetch_assoc($sql);
    }
?>

<div class="container">
    <div class="col-md-9 offset-md-2 mt-4">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Tambah Dudi</h3>
            </div>
            <div class="card-body" style="margin: 2px 30px 2px 30px">
                <form action="../prs/ed_dudi.php" method="post">
                    <div class="row mb-3">
                        <div class="form-group">
                            <input required type="hidden" name="id" id="nama" class="form-control" value="<?= $d['id_dudi']?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-group">
                            <label for="nama">Nama DU/DI</label>
                            <input required type="text" name="nm_dudi" id="nama" class="form-control" value="<?= $d['nama_dudi']?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-group">
                            <label for="pimpinan">Nama Pimpinan</label>
                            <input required type="text" name="nm_pimpinan" id="pimpinan" class="form-control" value="<?= $d['ceo']?>">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="alamat">Alamat</label>
                        <input required type="text" name="alamat" id="alamat" class="form-control" value="<?= $d['alamat']?>">
                    </div>
                    <a href="../dudi.php" class="btn btn-danger">Kembali</a>
                    <input type="submit" value="Tambah" class="btn btn-primary float-end">
                </form>
            </div>
        </div>
    </div>
</div>