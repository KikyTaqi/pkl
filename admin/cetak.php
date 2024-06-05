<?php include '../koneksi.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>PERMOHONAN PKL</title>
    <style>

            .page {
                width: 21cm;
                min-height: 29.7cm;
                padding: 2cm;
                margin: 2cm auto;
                border: 1px #D3D3D3 solid;
                border-radius: 5px;
                background: white;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
                position: relative;
            }

            .subpage {
                
                padding: 1cm;
                height: 3cm;
                margin-left: -75px;
                font-size: 16px;
                position: relative;
            }
            .isi{
                padding: 0.5cm;
                height: 17cm;
                width: 19cm;
                margin-left: -2px;
                bottom: 0px;
                font-size: 16px;
                position: relative;
            }

            @page {
                size: A4;
                margin: 0;
            }

            @media print {
            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }
            .mg{
                margin-top: -18px;
                width: 98px;
                position: absolute;
                margin-left: -370px;
            }

            .lnk{
                color: blue;
            }

            .dwr{
                width: 2cm;
                height: 2cm;
                margin-left: -30px;
                font-size: 16px;
                position: relative;
                display: inline-block;
                line-height: 13px;
            }
            .tgh{
                width: 10cm;
                height: 5cm;
                margin-left: 1px;
                font-size: 16px;
                position: absolute;
                display: inline-block;
                line-height: 13px;
            }
            .tpt{
                width: 10cm;
                height: 5cm;
                margin-left: 1px;
                font-size: 16px;
                position: absolute;
                display: inline-block;
                line-height: 13px;
            }
            .pgr{
                width: 2cm;
                height: 1cm;
                margin-left: 460px;
                margin-top: -25px;
                font-size: 16px;
                position: absolute;
                display: inline-block;
                line-height: 13px;
            }

            </style>
</head>
<body style="background: #f0f0f0">
        <?php 
            session_start();
            if($_SESSION['status']!="login"){
                header("location:../index.php?pesan=belum_login");
            }
        ?>
    <div class="container">
        <div class="page">
            <div class="text-center" style="margin-left: 1cm;">
                <img src="https://bit.ly/3IWbNLC" alt="jawa" class="mg">
                <p style="font-size: 18px; line-height: 1px;">PEMERINTAH PROVINSI JAWA TENGAH</p>
                <p style="font-size: 20px; line-height: 20px;">DINAS PENDIDIKAN DAN KEBUDAYAAN<br><b>SEKOLAH MENENGAH KEJURUAN  NEGERI 3 KENDAL</b></p>
                <p style="font-size: 12px; line-height: 1px;">Jalan Boja - Limbangan Kilometer 1 Boja, Kabupaten Kendal Kode Pos 51381</p>
                <p style="font-size: 12px; line-height: 8px;">Telepon 0294-572623  Faksimile 0294-572623 Surat Elektronik <a class="lnk" href="#">smktelukendal@yahoo.com</a>,</p>
                <p style="font-size: 12px; line-height: 2px;"><a class="lnk" href="#">smk@smkn3kendal.sch.id</a></p>
                <div style="width: 19cm; height: 4px; border: 3px solid black; padding 0.5cm; margin: 0.5cm auto; margin-left: -2cm; position: auto"> </div><br>
            </div>
            <div class="dwr">
                <p>Nomor</p> <div class="pgr"><p>Kendal, ...</p></div>
                <p>Lampiran</p>
                <p>Perihal</p>
            </div>
            <div class="tgh">
                <p>: 422/1.001/SMK.PKL/2024</p>
                <p>: -</p>
                <p>: <b>Permohonan Praktik Kerja Lapangan (PKL)</b></p>
            </div>
            <div class="subpage" >
                <p style="line-height: 2px;">Yth. Pimpinan (industri)</p>
                <p style="margin-left: 35px;">ALAMAT</p>
                <p style="line-height: 10px;">di Tempat</p>
                <div class="isi">
                    <p>Dengan hormat,</p>
                    <p style="text-align: justify;">Berdasarkan Program Kerja SMK Negeri 3 Kendal tentang Praktik Kerja Lapangan (PKL) Tahun Pelajaran
                        2024/2025, dengan ini kami mohon kepada Pimpinan (Industri) untuk berkenan menerima siswa 
                        SMK Negeri 3 Kendal untuk melaksanakan Praktik Kerja Lapangan (PKL) dalam waktu (bulan)(Terbilang bulan)
                        bulan mulai tanggal (Mulai) sampai dengan (SAMPAI). Adapun siswa yang akan mengikuti Praktik Kerja Lapangan 
                        (PKL) sejumlah (JUMLAH SISWA) ( TERBILANG SISWA ) orang dengan data sebagai berikut:
                    </p>
                    <table class="table table-bordered " style="font-size: 15px;">
                        <tr>
                            <th class="text-center" width="20px">NO</th>
                            <th class="text-center">NAMA</th>
                            <th class="text-center" width="160px">NIS</th>
                            <th class="text-center" width="160px">KELAS</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>as</td>
                            <td>12</td>
                            <td>xz</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>sa</td>
                            <td>as</td>
                            <td>xc</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>fd</td>
                            <td>xc</td>
                            <td>gf</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>fs</td>
                            <td>xc</td>
                            <td>fg</td>
                        </tr>
                    </table>
                    <p style="text-align: justify;">Adapun jawaban Bpk/Ibu/Sdr untuk menerima/belum menerima siswa/siswi kami,
                         dapat langsung mengisi blangko jawaban terlampir, atau dapat mengirimkan jawaban melalui
                          email Urs Praktek Kerja Lapangan (email=prakerin@smkn3kendal.sch.id).</p>
                    <table class="pull-right" style="margin-right: 15px;">
                        <tr height="100px">
                            <td style="margin-top: 10px">Kepala Sekolah,</td>
                        </tr>
                        <tr height="40px">
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <td>Nama KepSek</td>
                        </tr style="line-height: 1px">
                        <tr>
                            <td>NIP. 839283928938</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="page">
            <div class="text-center" style="margin-left: 1cm;">
                <img src="https://bit.ly/3IWbNLC" alt="jawa" class="mg">
                <p style="font-size: 18px; line-height: 1px;">PEMERINTAH PROVINSI JAWA TENGAH</p>
                <p style="font-size: 20px; line-height: 20px;">DINAS PENDIDIKAN DAN KEBUDAYAAN<br><b>SEKOLAH MENENGAH KEJURUAN  NEGERI 3 KENDAL</b></p>
                <p style="font-size: 12px; line-height: 1px;">Jalan Boja - Limbangan Kilometer 1 Boja, Kabupaten Kendal Kode Pos 51381</p>
                <p style="font-size: 12px; line-height: 8px;">Telepon 0294-572623  Faksimile 0294-572623 Surat Elektronik <a class="lnk" href="#">smktelukendal@yahoo.com</a>,</p>
                <p style="font-size: 12px; line-height: 2px;"><a class="lnk" href="#">smk@smkn3kendal.sch.id</a></p>
                <div style="width: 19cm; height: 4px; border: 3px solid black; padding 0.5cm; margin: 0.5cm auto; margin-left: -2cm; position: auto"> </div><br>
                
                <h4 style="margin-top: -10px;"><b>PERSETUJUAN PENGAJUAN PRAKERIN</b></h4><br>
                <p style="margin-top: -23px; font-size: 18px;">Tahun Pelajaran 2024/2025</p>
                <p style="margin-top: -14px; font-size: 18px;">Waktu Pelaksanaan: (mulai) sampai dengan (sampai)</p>
                
            </div>
            <div class="isi" style="font-size: 18px; margin-top: 50px;">
                <table style="width: 13cm; height: 5cm;">
                    <tr>
                        <td>Nama DU/DI (Bengkel) </td>
                        <td>: INDUSTRI</td>
                    </tr>
                    <tr>
                        <td>Nama Pimpinan DU/DI </td>
                        <td>: PIMPINAN INDUSTRI</td>
                    </tr>
                    <tr>
                        <td>Alamat DU/DI </td>
                        <td>: ALAMAT</td>
                    </tr>
                    <tr>
                        <td>No. Tlp. / Hp </td>
                        <td>: TELP INDUSTRI</td>
                    </tr>
                    <tr>
                        <td>Nama Siswa </td>
                        <td>: </td>
                    </tr>
                </table>
                <div class="" style="margin-right: 1.2cm">
                    <table class="table table-bordered" style="font-size: 14px;">
                        <tr>
                            <th class="text-center" width="10px">NO</th>
                            <th class="text-center">NAMA</th>
                            <th class="text-center" width="150px">NIS</th>
                            <th class="text-center" width="150px">KELAS</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>ANU</td>
                            <td>29012</td>
                            <td>X PPLG 1</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>HEHE</td>
                            <td>38293</td>
                            <td>XI PPLG 1</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>XIXI</td>
                            <td>29102</td>
                            <td>XII RPL 1</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>WKWK</td>
                            <td>99032</td>
                            <td>XIV RPL 1</td>
                        </tr>
                    </table>
                </div>
                <br><br><br>
                <table class="pull-right" style="margin-right: 3cm;">
                    <tr height="40px">
                        <td style="margin-top: 10px">Menyetujui,</td>
                    </tr>
                    <tr>
                        <td>Ka. Program TKR/TKJ/RPL/TEI/KI</td>
                    </tr>
                    <tr height="100px">
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>(.................................)</td>
                    </tr style="line-height: 1px">
                    <tr>
                        <td>NIP. 839283928938</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <script>
        // window.print();
    </script>
</body>
</html>