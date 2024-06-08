<?php 
    include '../tbh/header.php';
    include '../../koneksi.php';

    if(isset($_GET['nisn'])){
        $nisn = $_GET['nisn'];
        $sql = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn = '$nisn'");
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
                <h3 class="text-center">Edit Siswa</h3>
            </div>
            <div class="card-body" style="margin: 2px 30px 2px 30px">
                <form action="../prs/ed_siswa.php" method="post">
                    <div class="row mb-3">
                       <div class="col-md-3">
                           <div class="form-group">
                               <label for="nisn">NISN</label>
                               <input required readonly value="<?= $d['nisn']; ?>" type="text" name="nisn" id="nisn" class="form-control">
                           </div>
                       </div>
                       <div class="col-md-9">
                           <div class="form-group">
                               <label for="nama">Nama</label>
                               <input required value="<?= $d['nama_siswa']; ?>" type="text" name="nama" id="nama" class="form-control">
                           </div>
                       </div>
                    </div>
                    <div class="row mb-3">
                       <div class="col-md-3">
                           <div class="form-group">
                               <label for="tl">Tgl. Lahir</label>
                               <input required value="<?= $d['tgl_lahir']; ?>" type="date" name="tgl_lahir" id="tl" class="form-control">
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="form-group">
                               <label for="nis">NIS</label>
                               <input required value="<?= $d['nis']; ?>" type="text" name="nis" id="nis" class="form-control">
                           </div>
                       </div>
                       <div class="col-md-6">
                           <div class="form-group">
                               <label for="tempatl">Tempat Lahir</label>
                               <input required value="<?= $d['tempat_lahir']; ?>" type="text" name="tmp_lahir" id="tempatl" class="form-control">
                           </div>
                       </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <select name="kelas" id="kelas" class="form-select">
                                    <option <?php if($d['kelas'] === 'X'){echo 'selected';} ?> value="X">X</option>
                                    <option <?php if($d['kelas'] === 'XI'){echo 'selected';} ?> value="XI" value="XI">XI</option>
                                    <option <?php if($d['kelas'] === 'XII'){echo 'selected';} ?> value="XII" value="XII">XII</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="jurursan">Jurursan</label>
                                <select name="jurusan" id="jurusan" class="form-select" data-dselect-search="true" data-dselect-max-height="100px">
                                    <option <?php if($d['jurusan'] === 'TO 1'){echo 'selected';} ?> value="TO 1">TO 1</option>
                                    <option <?php if($d['jurusan'] === 'TO 2'){echo 'selected';} ?> value="TO 2">TO 2</option>
                                    <option <?php if($d['jurusan'] === 'TO 3'){echo 'selected';} ?> value="TO 3">TO 3</option>
                                    <option <?php if($d['jurusan'] === 'TJKT 1'){echo 'selected';} ?> value="TJKT 1">TJKT 1</option>
                                    <option <?php if($d['jurusan'] === 'TJKT 2'){echo 'selected';} ?> value="TJKT 2">TJKT 2</option>
                                    <option <?php if($d['jurusan'] === 'TJKT 3'){echo 'selected';} ?> value="TJKT 3">TJKT 3</option>
                                    <option <?php if($d['jurusan'] === 'PPLG 1'){echo 'selected';} ?> value="PPLG 1">PPLG 1</option>
                                    <option <?php if($d['jurusan'] === 'PPLG 2'){echo 'selected';} ?> value="PPLG 2">PPLG 2</option>
                                    <option <?php if($d['jurusan'] === 'PPLG 3'){echo 'selected';} ?> value="PPLG 3">PPLG 3</option>
                                    <option <?php if($d['jurusan'] === 'TE 1'){echo 'selected';} ?> value="TE 1">TE 1</option>
                                    <option <?php if($d['jurusan'] === 'TE 2'){echo 'selected';} ?> value="TE 2">TE 2</option>
                                    <option <?php if($d['jurusan'] === 'TE 3'){echo 'selected';} ?> value="TE 3">TE 3</option>
                                    <option <?php if($d['jurusan'] === 'KI 1'){echo 'selected';} ?> value="KI 1">KI 1</option>
                                    <option <?php if($d['jurusan'] === 'KI 2'){echo 'selected';} ?> value="KI 2">KI 2</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
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
                        <input required value="<?= $d['alamat']; ?>" type="text" name="alamat" id="alamat" class="form-control">
                    </div>
                    <a href="../siswa.php" class="btn btn-danger">Kembali</a>
                    <input type="submit" value="Ubah" class="btn btn-warning float-end">
                </form>
            </div>
        </div>
    </div>
</div><br><br><br>
<?php include '../footer.php' ?>
<script>

    dselect(document.querySelector('#jurusan'))
    dselect(document.querySelector('#kelas'))
    dselect(document.querySelector('#jk'))

</script>