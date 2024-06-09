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
                <h3 class="text-center">Tambah Pegawai</h3>
            </div>
            <div class="card-body" style="margin: 2px 30px 2px 30px">
                <form action="../prs/pegawai.php" method="post">
                    <div class="row mb-3">
                       <div class="col-md-3">
                           <div class="form-group">
                               <label for="nisn">NIP</label>
                               <input required type="text" name="nip" id="nisn" class="form-control">
                           </div>
                       </div>
                       <div class="col-md-9">
                           <div class="form-group">
                               <label for="nama">Nama</label>
                               <input required type="text" name="nama" id="nama" class="form-control">
                           </div>
                       </div>
                    </div>
                    <div class="row mb-3">
                       <div class="col-md-3">
                           <div class="form-group">
                               <label for="tl">Tgl. Lahir</label>
                               <input required type="date" name="tgl_lahir" id="tl" class="form-control">
                           </div>
                       </div>
                       <div class="col-md-6">
                           <div class="form-group">
                               <label for="tempatl">Tempat Lahir</label>
                               <input required type="text" name="tmp_lahir" id="tempatl" class="form-control">
                           </div>
                       </div>
                       <div class="col-md-3">
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select name="jk" id="jk" class="form-select">
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="alamat">Alamat</label>
                        <input required type="text" name="alamat" id="alamat" class="form-control">
                    </div>
                    <a href="../pegawai.php" class="btn btn-danger">Kembali</a>
                    <input type="submit" value="Tambah" class="btn btn-primary float-end">
                </form>
            </div>
        </div>
    </div>
</div><br><br><br>
<?php include '../footer.php' ?>