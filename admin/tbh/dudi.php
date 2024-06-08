<?php 
    include 'header.php';

    if(isset($_GET['status'])){
        if($_GET['status']== 'data_ada'){
            echo "<script>
                            Swal.fire({
                                        position: 'center',
                                        icon: 'error',
                                        title: 'NIP telah digunakan!',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                        </script>";
        }
    }
?>

<div class="container">
    <div class="col-md-9 offset-md-2 mt-4">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Tambah Dudi</h3>
            </div>
            <div class="card-body" style="margin: 2px 30px 2px 30px">
                <form action="../prs/dudi.php" method="post">
                    <div class="row mb-3">
                        <div class="form-group">
                            <label for="nama">Nama DU/DI</label>
                            <input required type="text" name="nm_dudi" id="nama" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-group">
                            <label for="pimpinan">Nama Pimpinan</label>
                            <input required type="text" name="nm_pimpinan" id="pimpinan" class="form-control">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="alamat">Alamat</label>
                        <input required type="text" name="alamat" id="alamat" class="form-control">
                    </div>
                    <a href="../dudi.php" class="btn btn-danger">Kembali</a>
                    <input type="submit" value="Tambah" class="btn btn-primary float-end">
                </form>
            </div>
        </div>
    </div>
</div><br><br><br>
<?php include '../footer.php' ?>