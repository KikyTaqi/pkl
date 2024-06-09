<?php
require('fpdf/fpdf.php');
include '../koneksi.php';

if(isset($_GET['no_surat'])){
    $nos = $_GET['no_surat'];
    $sql = mysqli_query($koneksi, "SELECT * FROM pengajuan WHERE id_surat = '$nos'");
    if (!$sql){
        die("Query Error : " .mysqli_errno($koneksi). "-" .mysqli_error($koneksi));
    }
    $d = mysqli_fetch_assoc($sql);
}

$magang = $d['dudi'];
$pklResult = mysqli_query($koneksi, "SELECT * FROM dudi WHERE id_dudi = '$magang'");
$pkl = mysqli_fetch_assoc($pklResult);


$dm = array(
    '1' => 'Satu',
    '2' => 'Dua',
    '3' => 'Tiga',
    '4' => 'Empat',
    '5' => 'Lima',
    '6' => 'Enam'
);

$durasi = $dm[$d['durasi']];
$jsiswa = $dm[$d['jml_siswa']];

$months = array(
    'Jan' => 'Januari',
    'Feb' => 'Februari',
    'Mar' => 'Maret',
    'Apr' => 'April',
    'May' => 'Mei',
    'Jun' => 'Juni',
    'Jul' => 'Juli',
    'Aug' => 'Agustus',
    'Sep' => 'September',
    'Oct' => 'Oktober',
    'Nov' => 'November',
    'Dec' => 'Desember'
);

$date_mulai = $d['tgl_mulai'];
$dtm = strtotime($date_mulai);
$tgl_mulai = date('d', $dtm);
$bln_mulai = $months[date("M", $dtm)];
$thn_mulai = date('Y', $dtm);

$date_selesai = $d['tgl_selesai'];
$dts = strtotime($date_selesai);
$tgl_selesai = date('d', $dts);
$bln_selesai = $months[date("M", $dts)];
$thn_selesai = date('Y', $dts);

$tgl = $d['tgl'];
$ts = strtotime($tgl);
$tgls = date('d', $ts);
$blns = $months[date("M", $ts)];
$thns = date('Y', $ts);

// Initialize FPDF with custom size (A4)
$pdf = new FPDF();
$pdf->AddPage('P', array(210, 330)); // Portrait, A4 size

// Set font
$pdf->SetFont('Arial', '', 12);

$jarakx = 5;

// Header section
$pdf->Image('https://images2.imgbox.com/be/fc/4Ckttr7v_o.png', 15, 10, 25); // Add image
$pdf->Cell($jarakx);
$pdf->Cell(0, 5, 'PEMERINTAH PROVINSI JAWA TENGAH', 0, 1, 'C');
$pdf->SetFont('Arial', '', 14);
$pdf->Cell($jarakx);
$pdf->Cell(0, 5, 'DINAS PENDIDIKAN DAN KEBUDAYAAN', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell($jarakx);
$pdf->Cell(0, 5, 'SEKOLAH MENENGAH KEJURUAN NEGERI 3 KENDAL', 0, 1, 'C');
$pdf->SetFont('Arial', '', 9);
$pdf->Cell($jarakx);
$pdf->Cell(0, 4, 'Jalan Boja - Limbangan Kilometer 1 Boja, Kabupaten Kendal, Kode Pos 51381', 0, 1, 'C');
$pdf->Cell($jarakx);
$pdf->Cell(0, 4, 'Telepon 0294-572623  Faksimile 0294-572623 Surat Elektronik smktelukendal@yahoo.com,', 0, 1, 'C');
$pdf->Cell($jarakx);
$pdf->Cell(0, 4, 'smk@smkn3kendal.sch.id', 0, 1, 'C');

// Draw a line
$pdf->setLineWidth(1);
$pdf->Line(10, 39, 200, 39);

// Add some space
$pdf->Ln(10);

$pdf->SetFont('helvetica', '', 12);
// Body section;
$pdf->Cell(21, 2, 'Nomor     : 422/1.'.$d['id_surat'].'/SMK.PKL/'.$d['tahun'].'', 0, 0);
$pdf->Cell(0, 2, 'Kendal, '.$tgls.' '.$blns.' '.$thns, 0, 1, 'R');
$pdf->Cell(0, 10, 'Lampiran : -', 0, 1);
$pdf->Cell(21, 3, 'Perihal     : ', 0, 0);

// Teks yang ingin ditebalkan
$pdf->SetFont('helvetica', 'B', 12); // Set font menjadi bold
$pdf->Cell(0, 3, 'Permohonan Praktik Kerja Lapangan (PKL)', 0, 1);

$pdf->SetFont('helvetica', '', 12);
$pdf->Ln(10);

$pdf->Cell(0, 5, 'Yth. Pimpinan '.$pkl['nama_dudi'], 0, 1);
$pdf->MultiCell(60, 7, $pkl['alamat'], 0, 1);
$pdf->Cell(0, 10, 'di Tempat', 0, 1);
$pdf->Ln(2);

$pdf->Cell(10);
$pdf->Cell(0, 10, 'Dengan hormat,', 0, 1);
$pdf->Ln(1);
$pdf->Cell(10);

$pdf->MultiCell(0, 7, 'Berdasarkan Program Kerja SMK Negeri 3 Kendal tentang Praktik Kerja Lapangan (PKL) Tahun Pelajaran '.$d["thn_ajaran"].' dengan ini kami mohon kepada Pimpinan '.$d["dudi"].' untuk berkenan menerima siswa SMK Negeri 3 Kendal untuk melaksanakan Praktik Kerja Lapangan (PKL) dalam waktu '.$d["durasi"].' ( '.$durasi.' ) bulan mulai tanggal '.$tgl_mulai.' '.$bln_mulai.' '.$thn_mulai.' sampai dengan '.$tgl_selesai.' '.$bln_selesai.' '.$thn_selesai.'. Adapun siswa yang akan mengikuti Praktik Kerja Lapangan (PKL) sejumlah '.$d["jml_siswa"].' ( '.$jsiswa.' ) orang dengan data sebagai berikut:', 0, 1);
$pdf->Ln(10);

// Table header
$pdf->setLineWidth(0.2);
$pdf->Cell(10);
$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(10, 10, 'No', 1, 0, 'C');
$pdf->Cell(75, 10, 'NAMA', 1, 0, 'C');
$pdf->Cell(45, 10, 'NISN', 1, 0, 'C');
$pdf->Cell(40, 10, 'KELAS', 1, 1, 'C');

// Table content
$pdf->SetFont('helvetica', '', 8);

    $n1 = $d['nisn_1'];

    $ns1 = mysqli_query($koneksi, "SELECT nama_siswa, kelas, jurusan FROM siswa WHERE nisn = '$n1'");
    $s1 = mysqli_fetch_assoc($ns1);

    $pdf->Cell(10);
    $pdf->Cell(10, 10, "1", 1, 0, 'C');
    $pdf->Cell(75, 10, $s1['nama_siswa'], 1, 0, 'C');
    $pdf->Cell(45, 10, $d["nisn_1"], 1, 0, 'C');
    $pdf->Cell(40, 10, $s1['kelas']. " ".$s1['jurusan'], 1, 1, 'C');

    if($d['nisn_2'] != ''){
                            
        $n2 = $d['nisn_2'];

        $ns2 = mysqli_query($koneksi, "SELECT nama_siswa, kelas, jurusan FROM siswa WHERE nisn = '$n2'");
        $s2 = mysqli_fetch_assoc($ns2);

        $pdf->Cell(10);
        $pdf->Cell(10, 10, "1", 1, 0, 'C');
        $pdf->Cell(75, 10, $s2['nama_siswa'], 1, 0, 'C');
        $pdf->Cell(45, 10, $d["nisn_2"], 1, 0, 'C');
        $pdf->Cell(40, 10, $s2['kelas']. " ".$s2['jurusan'], 1, 1, 'C'); 
    }
    if($d['nisn_3'] != ''){
                            
        $n3 = $d['nisn_3'];

        $ns3 = mysqli_query($koneksi, "SELECT nama_siswa, kelas, jurusan FROM siswa WHERE nisn = '$n3'");
        $s3 = mysqli_fetch_assoc($ns3);

        $pdf->Cell(10);
        $pdf->Cell(10, 10, "1", 1, 0, 'C');
        $pdf->Cell(75, 10, $s3['nama_siswa'], 1, 0, 'C');
        $pdf->Cell(45, 10, $d["nisn_3"], 1, 0, 'C');
        $pdf->Cell(40, 10, $s3['kelas']. " ".$s3['jurusan'], 1, 1, 'C'); 
    }
    if($d['nisn_4'] != ''){
                            
        $n4 = $d['nisn_4'];

        $ns4 = mysqli_query($koneksi, "SELECT nama_siswa, kelas, jurusan FROM siswa WHERE nisn = '$n4'");
        $s4 = mysqli_fetch_assoc($ns4);

        $pdf->Cell(10);
        $pdf->Cell(10, 10, "1", 1, 0, 'C');
        $pdf->Cell(75, 10, $s4['nama_siswa'], 1, 0, 'C');
        $pdf->Cell(45, 10, $d["nisn_4"], 1, 0, 'C');
        $pdf->Cell(40, 10, $s4['kelas']. " ".$s4['jurusan'], 1, 1, 'C'); 
    }


// Additional information
$pdf->SetFont('helvetica', '', 12);
$pdf->Ln(10);
$pdf->Cell(10);
$pdf->MultiCell(0, 7, 'Adapun jawaban Bpk/Ibu/Sdr untuk menerima/belum menerima siswa/siswi kami dapat langsung mengisi blangko jawaban terlampir atau dapat mengirimkan jawaban melalui email Urs Praktek Kerja Lapangan (email=prakerin@smkn3kendal.sch.id).', 0, 1);
$pdf->Ln(1);
$pdf->Cell(10);
$pdf->MultiCell(0, 7, 'Demikian Surat Permohonan PKL ini kami sampaikan. Atas perhatian dukungan serta kesediaannya disampaikan terima kasih.', 0, 1);
$pdf->Ln(10);

$pdf->Cell(100);
$pdf->Cell(0, 10, 'Kepala Sekolah,', 0, 1, 'L');
$pdf->Ln(16);
$pdf->Cell(100);
$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(0, 10, 'ABDUL MALIK NUGROHO, S.Pd.T.', 0, 1, 'L');
$pdf->Cell(100);
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(0, 1, 'NIP.198111222014021001', 0, 1, 'L');

// Add new page
$pdf->AddPage('P', array(210, 330)); // Portrait, A4 size

// Repeat the header section
// Header section
$pdf->Image('https://images2.imgbox.com/be/fc/4Ckttr7v_o.png', 15, 10, 25); // Add image
$pdf->Cell($jarakx);
$pdf->Cell(0, 5, 'PEMERINTAH PROVINSI JAWA TENGAH', 0, 1, 'C');
$pdf->SetFont('Arial', '', 14);
$pdf->Cell($jarakx);
$pdf->Cell(0, 5, 'DINAS PENDIDIKAN DAN KEBUDAYAAN', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell($jarakx);
$pdf->Cell(0, 5, 'SEKOLAH MENENGAH KEJURUAN NEGERI 3 KENDAL', 0, 1, 'C');
$pdf->SetFont('Arial', '', 9);
$pdf->Cell($jarakx);
$pdf->Cell(0, 4, 'Jalan Boja - Limbangan Kilometer 1 Boja, Kabupaten Kendal, Kode Pos 51381', 0, 1, 'C');
$pdf->Cell($jarakx);
$pdf->Cell(0, 4, 'Telepon 0294-572623  Faksimile 0294-572623 Surat Elektronik smktelukendal@yahoo.com,', 0, 1, 'C');
$pdf->Cell($jarakx);
$pdf->Cell(0, 4, 'smk@smkn3kendal.sch.id', 0, 1, 'C');

// Draw a line
$pdf->setLineWidth(1);
$pdf->Line(10, 39, 200, 39);
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'PERSETUJUAN PENGAJUAN PRAKERIN', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Tahun Pelajaran '.$d['thn_ajaran'], 0, 1, 'C');
$pdf->Cell(0, 10, 'Waktu Pelaksanaan : '.$tgl_mulai.' '.$bln_mulai.' '.$thn_mulai.' sampai dengan '.$tgl_selesai.' '.$bln_selesai.' '.$thn_selesai, 0, 1, 'C');
$pdf->Ln(10);

// Information table
$pdf->setLineWidth(0.2);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(30);
$pdf->Cell(50, 10, 'Nama DU/DI (Bengkel)', 0, 0);
$pdf->Cell(0, 10, ': '.$pkl['nama_dudi'], 0, 1);
$pdf->Cell(30);
$pdf->Cell(50, 10, 'Nama Pimpinan DU/DI', 0, 0);
$pdf->Cell(0, 10, ': '.$pkl['ceo'], 0, 1);
$pdf->Cell(30);
$pdf->Cell(50, 10, 'Alamat DU/DI', 0, 0);
$pdf->MultiCell(90, 10, ': '.$pkl['alamat'], 0, 1);
$pdf->Cell(30);
$pdf->Cell(50, 10, 'No. Tlp./ HP', 0, 0);
$pdf->Cell(0, 10, ': -', 0, 1);


$pdf->Ln(10);
$pdf->Cell(30);
$pdf->Cell(50, 1, 'Nama Siswa', 0, 0);
$pdf->Cell(0, 1, ':', 0, 1);
$pdf->Ln(3);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(35);
$pdf->Cell(10, 10, 'NO', 1, 0, 'C');
$pdf->Cell(60, 10, 'NAMA', 1, 0, 'C');
$pdf->Cell(35, 10, 'NIS', 1, 0, 'C');
$pdf->Cell(30, 10, 'KELAS', 1, 1, 'C');

// Table content
$pdf->SetFont('Arial', '', 8);



    $pdf->Cell(35);
    $pdf->Cell(10, 10, "1", 1, 0, 'C');
    $pdf->Cell(60, 10, $s1['nama_siswa'], 1, 0, 'C');
    $pdf->Cell(35, 10, $d["nisn_1"], 1, 0, 'C');
    $pdf->Cell(30, 10, $s1['kelas']. " ".$s1['jurusan'], 1, 1, 'C');

    if($d['nisn_2'] != ''){
                            
        $n2 = $d['nisn_2'];

        $ns2 = mysqli_query($koneksi, "SELECT nama_siswa, kelas, jurusan FROM siswa WHERE nisn = '$n2'");
        $s2 = mysqli_fetch_assoc($ns2);

        $pdf->Cell(35);
        $pdf->Cell(10, 10, "1", 1, 0, 'C');
        $pdf->Cell(60, 10, $s2['nama_siswa'], 1, 0, 'C');
        $pdf->Cell(35, 10, $d["nisn_2"], 1, 0, 'C');
        $pdf->Cell(30, 10, $s2['kelas']. " ".$s2['jurusan'], 1, 1, 'C');
    }
    if($d['nisn_3'] != ''){
                            
        $n3 = $d['nisn_3'];

        $ns3 = mysqli_query($koneksi, "SELECT nama_siswa, kelas, jurusan FROM siswa WHERE nisn = '$n3'");
        $s3 = mysqli_fetch_assoc($ns3);

        $pdf->Cell(35);
        $pdf->Cell(10, 10, "1", 1, 0, 'C');
        $pdf->Cell(60, 10, $s3['nama_siswa'], 1, 0, 'C');
        $pdf->Cell(35, 10, $d["nisn_3"], 1, 0, 'C');
        $pdf->Cell(30, 10, $s3['kelas']. " ".$s3['jurusan'], 1, 1, 'C');
    }
    if($d['nisn_4'] != ''){
                            
        $n4 = $d['nisn_4'];

        $ns4 = mysqli_query($koneksi, "SELECT nama_siswa, kelas, jurusan FROM siswa WHERE nisn = '$n4'");
        $s4 = mysqli_fetch_assoc($ns4);

        $pdf->Cell(35);
        $pdf->Cell(10, 10, "1", 1, 0, 'C');
        $pdf->Cell(60, 10, $s4['nama_siswa'], 1, 0, 'C');
        $pdf->Cell(35, 10, $d["nisn_4"], 1, 0, 'C');
        $pdf->Cell(30, 10, $s4['kelas']. " ".$s4['jurusan'], 1, 1, 'C');
    }


// Approval section
$pdf->SetFont('Arial', '', 12);
$pdf->Ln(50);
$pdf->Cell(100);
$pdf->Cell(0, 5, 'Menyetujui', 0, 1, 'L');
$pdf->Cell(100);
$pdf->Cell(0, 10, 'Ka. Program TKR/TKJ/RPL/TEI/KI', 0, 1, 'L');
$pdf->Ln(20);
$pdf->Cell(100);
$pdf->Cell(0, 5, '(..................................................)', 0, 1, 'L');
$pdf->Cell(100);
$pdf->Cell(0, 5, 'NIP.', 0, 1, 'L');

// Output PDF
$pdf->Output();
?>
