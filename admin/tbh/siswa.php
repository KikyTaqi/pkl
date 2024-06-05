<?php 
    include 'header.php';
?>

<div class="container">
    <div class="col-md-9 offset-md-2 mt-4">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Tambah Siswa</h3>
            </div>
            <div class="card-body" style="margin: 2px 30px 2px 30px">
                <form action="../prs/siswa.php" method="post">
                    <div class="row mb-3">
                       <div class="col-md-3">
                           <div class="form-group">
                               <label for="nisn">NISN</label>
                               <input required type="text" name="nisn" id="nisn" class="form-control">
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
                       <div class="col-md-3">
                           <div class="form-group">
                               <label for="nis">NIS</label>
                               <input required type="text" name="nis" id="nis" class="form-control">
                           </div>
                       </div>
                       <div class="col-md-6">
                           <div class="form-group">
                               <label for="tempatl">Tempat Lahir</label>
                               <input required type="text" name="tmp_lahir" id="tempatl" class="form-control">
                           </div>
                       </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <select name="kelas" id="kelas" class="form-select">
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII">XII</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="jurursan">Jurursan</label>
                                <select name="jurusan" id="jurusan" class="form-select" data-dselect-search="true" data-dselect-max-height="100px">
                                    <option value="TO 1">TO 1</option>
                                    <option value="TO 2">TO 2</option>
                                    <option value="TO 3">TO 3</option>
                                    <option value="TJKT 1">TJKT 1</option>
                                    <option value="TJKT 2">TJKT 2</option>
                                    <option value="TJKT 3">TJKT 3</option>
                                    <option value="PPLG 1">PPLG 1</option>
                                    <option value="PPLG 2">PPLG 2</option>
                                    <option value="PPLG 3">PPLG 3</option>
                                    <option value="TE 1">TE 1</option>
                                    <option value="TE 2">TE 2</option>
                                    <option value="TE 3">TE 3</option>
                                    <option value="KI 1">KI 1</option>
                                    <option value="KI 2">KI 2</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
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
                    <a href="../siswa.php" class="btn btn-danger">Kembali</a>
                    <input type="submit" value="Tambah" class="btn btn-primary float-end">
                </form>
            </div>
        </div>
    </div>
</div>

<script>

    dselect(document.querySelector('#jurusan'))
    dselect(document.querySelector('#kelas'))
    dselect(document.querySelector('#jk'))

</script>