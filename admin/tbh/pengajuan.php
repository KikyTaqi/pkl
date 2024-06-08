<?php 
    include 'header.php';
    include '../../koneksi.php';

    $sql = "SELECT * FROM dudi";
    $result = mysqli_query($koneksi, $sql);
    if (!$result) {
        die("Query Error : " . mysqli_errno($koneksi) . "-" . mysqli_error($koneksi));
    }

    $d = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $siswa = mysqli_query($koneksi, "SELECT * FROM siswa");
    $sw = mysqli_fetch_all($siswa, MYSQLI_ASSOC);
?>

<div class="container">
    <div class="col-md-9 offset-md-2 mt-4">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Pengajuan</h3>
            </div>
            <div class="card-body" style="margin: 2px 30px 2px 30px">
                <form id="pengajuanForm" action="../prs/pengajuan.php" method="post">
                    <div class="mb-3 mt-3">
                        <div class="form-group">

                            <label for="dudi">Dudi</label>
                            <select data-dselect-search="true" name="dudi" id="dudi" class="form-select mb-3">
                                <option hidden selected disabled class="0" value="">- Pilih Industri -</option>
                                <?php
                                    foreach ($d as $dudi) {
                                        echo "<option class='".$dudi['jml_siswa']."' value='" . $dudi['id_dudi'] . "'>" . $dudi['nama_dudi'] . "</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group mb-3" id="djsiswa" style="display:none;">
                            <label for="jsiswa">Jumlah Siswa</label>
                            <select name="jsiswa" id="jsiswa" class="form-select">
                                <option hidden selected disabled value="0">- Pilih Jumlah -</option>
                                <option value="1">1 Siswa</option>
                                <option value="2">2 Siswa</option>
                                <option value="3">3 Siswa</option>
                                <option value="4">4 Siswa</option>
                            </select>
                        </div>
                        
                        <div class="form-group mb-3" id="nisn1" style="display:none;">
                            <label for="nisn">NISN (Antum Sendiri)</label>
                            <input readonly name="nisn1" value="00600000015151" type="text" class="form-control">
                        </div>
                        <div class="form-group" id="nisn2" style="display:none;">
                            <label for="nisn">Nama Siswa ke 2</label>
                            <select data-dselect-search="true" name="nisn2" class="form-select mb-3" id="siswa2">
                                <option hidden selected disabled class="0" value="">- Pilih Siswa -</option>
                                <?php
                                    foreach ($sw as $dsiswa) {
                                        echo "<option value='" . $dsiswa['nisn'] . "'>" . $dsiswa['nama_siswa'] . "</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group" id="nisn3" style="display:none;">
                            <label for="nisn">Nama Siswa ke 3</label>
                            <select data-dselect-search="true" name="nisn3" class="form-select mb-3" id="siswa3">
                                <option hidden selected disabled class="0" value="">- Pilih Siswa -</option>
                                <?php
                                    foreach ($sw as $dsiswa) {
                                        echo "<option value='" . $dsiswa['nisn'] . "'>" . $dsiswa['nama_siswa'] . "</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group" id="nisn4" style="display:none;">
                            <label for="nisn">Nama Siswa ke 4</label>
                            <select data-dselect-search="true" name="nisn4" class="form-select mb-3" id="siswa4">
                                <option hidden selected disabled class="0" value="">- Pilih Siswa -</option>
                                <?php
                                    foreach ($sw as $dsiswa) {
                                        echo "<option value='" . $dsiswa['nisn'] . "'>" . $dsiswa['nama_siswa'] . "</option>";
                                    }
                                ?>
                            </select>
                        </div><br>
                        <div class="form-group mb-3">
                            <label for="thn_ajaran">Tahun Ajaran</label>
                            <select name="thn_ajaran" id="thn_ajaran" class="form-select">
                                <option hidden selected disabled class="0" value="">- Pilih Tahun Ajaran -</option>
                                <option value="2024/2025">2024/2025</option>
                                <option value="2025/2026">2025/2026</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="tgl">Tanggal</label>
                            <input readonly value="<?= date('d-m-Y') ?>" id="tgl" name="tgl" type="text" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="tgl_mulai">Mulai Tanggal</label>
                            <input class="form-control startDate" type="date" name="tgl_mulai" id="tgl_mulai">
                        </div>
                        <div class="form-group mb-3">
                            <label for="tgl_selesai">Sampai Tanggal</label>
                            <input class="form-control endDate" type="date" name="tgl_selesai" id="tgl_selesai">
                        </div>
                        <div class="form-group mb-3">
                            <label for="durasi">Durasi Magang</label>
                            <input type="text" id="durasi" name="durasi" value="" class="form-control" readonly>
                        </div>
                        <div class="form-group mb-3">
                            <label for="kepsek">Kepala Sekolah</label>
                            <select name="kepsek" id="kepsek" class="form-select">
                                <option hidden selected disabled class="0" value="">- Pilih Kepala Sekolah -</option>
                                <option value="ABDUL MALIK NUGROHO, S.Pd.T.">ABDUL MALIK NUGROHO, S.Pd.T.</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input readonly name="thn" value="<?= date('Y'); ?>" type="text" id="tahun" class="form-control">
                        </div>

                    </div>
                    <a href="../pengajuan.php" class="btn btn-danger">Kembali</a>
                    <input type="submit" value="Dapatkan PDF" class="btn btn-outline-danger float-end">
                </form>
            </div>
        </div>
    </div>
</div><br><br><br>
<?php include '../footer.php' ?>
<script>

    dselect(document.querySelector('#dudi'));
    dselect(document.querySelector('#siswa2'));
    dselect(document.querySelector('#siswa3'));
    dselect(document.querySelector('#siswa4'));
    dselect(document.querySelector('#thn_ajaran'));
    dselect(document.querySelector('#kepsek'));

    document.addEventListener('DOMContentLoaded', (event) => {
    const selectDudi = document.getElementById('dudi');
    const djsiswa = document.getElementById('djsiswa');
    const jsiswaSelect = document.getElementById('jsiswa');
    const nisn1Div = document.getElementById('nisn1');
    const nisn2Div = document.getElementById('nisn2');
    const nisn3Div = document.getElementById('nisn3');
    const nisn4Div = document.getElementById('nisn4');
    const pengajuanForm = document.getElementById('pengajuanForm');

    function getSelectedClass() {
        const selectedOption = selectDudi.options[selectDudi.selectedIndex];
        const selectedClass = selectedOption.className;

        if (selectedClass === '0') {
            djsiswa.style.display = 'none';
            nisn1Div.style.display = 'none';
            nisn2Div.style.display = 'none';
            nisn3Div.style.display = 'none';
            nisn4Div.style.display = 'none';
            jsiswaSelect.selectedIndex = 0;
        } else {
            djsiswa.style.display = 'block';
            updateNisnFields();
        }
    }

    function updateNisnFields() {
        const selectedValue = jsiswaSelect.value;

        nisn1Div.style.display = selectedValue >= 1 ? 'block' : 'none';
        nisn2Div.style.display = selectedValue >= 2 ? 'block' : 'none';
        nisn3Div.style.display = selectedValue >= 3 ? 'block' : 'none';
        nisn4Div.style.display = selectedValue >= 4 ? 'block' : 'none';

        if (selectedValue < 2 && nisn2Div.querySelector('select')) {
            nisn2Div.querySelector('select').selectedIndex = 0;
        }
        if (selectedValue < 3 && nisn3Div.querySelector('select')) {
            nisn3Div.querySelector('select').selectedIndex = 0;
        }
        if (selectedValue < 4 && nisn4Div.querySelector('select')) {
            nisn4Div.querySelector('select').selectedIndex = 0;
        }
    }

    function calculateDuration() {
        var mulai = new Date(document.getElementById('tgl_mulai').value);
        var akhir = new Date(document.getElementById('tgl_selesai').value);

        if (mulai && akhir && !isNaN(mulai) && !isNaN(akhir)) {
            var differenceInMonths = (akhir.getFullYear() - mulai.getFullYear()) * 12 + (akhir.getMonth() - mulai.getMonth());

            if (akhir.getDate() >= mulai.getDate()) {
                differenceInMonths++;
            }

            document.getElementById('durasi').value = differenceInMonths;
        } else {
            document.getElementById('durasi').value = '';
        }
    }

    function validateForm(event) {
        const selects = pengajuanForm.querySelectorAll('select');
        for (let select of selects) {
            if (select.value === "0") {
                Swal.fire({
                    icon: "warning",
                    title: "Peringatan",
                    text: "Mohon pilih semua opsi yang tersedia sebelum mengirimkan form!"
                });
                event.preventDefault();
                return false;
            }
        }
        return true;
    }

    selectDudi.addEventListener('change', getSelectedClass);
    jsiswaSelect.addEventListener('change', updateNisnFields);
    document.getElementById('tgl_mulai').addEventListener('change', calculateDuration);
    document.getElementById('tgl_selesai').addEventListener('change', calculateDuration);
    pengajuanForm.addEventListener('submit', validateForm);

    getSelectedClass();
});


        // Mendapatkan elemen input tanggal
        const startDateInput = document.querySelector('.startDate');
        const endDateInput = document.querySelector('.endDate');

        // Fungsi untuk mengatur batas maksimal tanggal selesai
        const updateEndDateMax = () => {
            const startDateValue = startDateInput.value;
            if (startDateValue) {
                const startDate = new Date(startDateValue);
                const endDateMax = new Date(startDate);
                endDateMax.setMonth(endDateMax.getMonth() + 6);

                const dd = String(endDateMax.getDate()).padStart(2, '0');
                const mm = String(endDateMax.getMonth() + 1).padStart(2, '0'); // Januari adalah 0
                const yyyy = endDateMax.getFullYear();
                const endDateMaxFormatted = `${yyyy}-${mm}-${dd}`;

                endDateInput.max = endDateMaxFormatted;
                endDateInput.min = startDateValue; // Opsional: memastikan end date tidak lebih awal dari start date
            } else {
                endDateInput.max = ""; // Reset max jika start date dihapus
                endDateInput.min = ""; // Reset min jika start date dihapus
            }
        };

        // Menambahkan event listener untuk mengupdate batas maksimal tanggal selesai
        startDateInput.addEventListener('change', updateEndDateMax);


</script>
