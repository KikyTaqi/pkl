<?php 
    include '../header.php';

    include '../../koneksi.php';

    if(isset($_GET['nip'])){
        $nip = $_GET['nip'];
        $sql = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE nip = '$nip'");
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
                <h3 class="text-center">Tambah Pegawai</h3>
            </div>
            <div class="card-body" style="margin: 2px 30px 2px 30px">
                <form action="../prs/ed_pegawai.php" method="post">
                    <div class="row mb-3">
                       <div class="col-md-3">
                           <div class="form-group">
                               <label for="nip">NIP</label>
                               <input required value="<?= $d['nip']?>" type="text" name="nip" id="nip" class="form-control">
                           </div>
                       </div>
                       <div class="col-md-9">
                           <div class="form-group">
                               <label for="nama">Nama</label>
                               <input required value="<?= $d['nama_pegawai']?>" type="text" name="nama" id="nama" class="form-control">
                           </div>
                       </div>
                    </div>
                    <div class="row mb-3">
                       <div class="col-md-3">
                           <div class="form-group">
                               <label for="tl">Tgl. Lahir</label>
                               <input required value="<?= $d['tgl_lahir']?>" type="date" name="tgl_lahir" id="tl" class="form-control">
                           </div>
                       </div>
                       <div class="col-md-6">
                           <div class="form-group">
                               <label for="tempatl">Tempat Lahir</label>
                               <input required value="<?= $d['tempat_lahir']?>" type="text" name="tmp_lahir" id="tempatl" class="form-control">
                           </div>
                       </div>
                       <div class="col-md-3">
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select name="jk" id="jk" class="form-select">
                                    <option <?php if($d['jenis_kelamin'] === 'L'){echo 'selected';} ?> value="L">Laki-laki</option>
                                    <option <?php if($d['jenis_kelamin'] === 'P'){echo 'selected';} ?> value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="alamat">Alamat</label>
                        <input required value="<?= $d['alamat']?>" type="text" name="alamat" id="alamat" class="form-control">
                    </div>
                    <a href="../pegawai.php" class="btn btn-danger">Kembali</a>
                    <input type="submit" value="Edit" class="btn btn-warning float-end">
                </form>
            </div>
        </div>
    </div>
</div>
