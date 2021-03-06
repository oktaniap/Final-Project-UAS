<!DOCTYPE html>
<html>
<head>
    <title>SI-PANDU</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script type="text/javascript" src="Chart.js"></script>
    <style type="text/css">
        #cari{
            border-collapse: collapse;
            width: 80%;
            font-size: 17px;
            margin-left: 10%; margin-right: 10%;
        }
        #cari td, #cari th{
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
        }
        #cari tr:nth-child(even){
            background-color: #f2f2f2;
        }
        #cari tr:nth-child(odd){
            background-color: #ddd;
        }
        #cari tr:hover {
            background-color: #ddd;
        }
        #cari th{
            text-align: center;
            background-color: #2E8B57;
            color: white;
        }
    </style>
</head>
<body>
    <div id="container">
        <div id="header">
            <br>
            <img src="logo.png" width="140px" class="posyandu">
            <img src="waru.png" width="140px" class="waru">
            <img src="judul.png" width="700px" class="judul">
            <marquee bgcolor=#66CDAA><b>WEBSITE SISTEM INFORMASI POSYANDU TANJUNG 1 PEPELEGI WARU SIDOARJO</b></marquee>
            <nav>
                <ul>
                    <li><a href="daftarbalita.php" style="font-size: 15px;"><i class="fa fa-plus"></i> Pendaftaran</a>
                        <ul class="sub1">
                            <li><a href="daftarbalita.php">Balita</a></li>
                            <li><a href="daftaribu.php">Ibu Hamil</a></li>
                        </ul>
                    </li>
                    <li><a href="kehadiran.php" style="font-size: 15px;"><i class="fa fa-book"></i> Kehadiran</a></li>
                    <li><a href="pemeriksaan.php" style="font-size: 15px;"><i class="fa fa-stethoscope"></i> Pemeriksaan Kesehatan</a>
                        <ul class="sub1">
                            <li><a href="pemeriksaan.php">Berat Badan</a></li>
                            <li><a href="imunisasi.php">Imunisasi</a></li>
                        </ul>
                    </li>
                    <li><a href="edit.php" style="font-size: 15px;"><i class="fas fa-edit"></i> Edit Data</a></li>
                    <li><a href="preview.php" style="font-size: 15px;"><i class="fas fa-file"></i> Preview Data</a></li>
                    <<li><a href="laporanbalita.php" style="font-size: 15px;"><i class="fas fa-print"></i> Print Laporan</a>
                        <ul class="sub1">
                            <li><a href="laporanbalita.php">Data Balita</a></li>
                            <li><a href="laporanibu.php">Data Ibu Hamil</a></li>
                        </ul>
                    </li>
                    <li style="float: right;"><a href="index.php" style="font-size: 15px;"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                </ul>
            </nav>
        </div>
        <div id="isi" style="height:100%; width:100%; float:left; padding-top: 30px; padding-bottom: 30px;">
            <div style="background-color:rgba(152,251,152,0.5); height: 100%; padding-bottom: 50px;"><br><br>
                <?php
            if ($_GET['preview']==1) {
                include "koneksi.php";
                $nik=$_GET['nik'];
                $sql="SELECT * FROM balita WHERE nik='$nik'";
                $query=mysqli_query($conn, $sql);
                ?>
                <h3 style="text-align: center; font-weight: bold;">PREVIEW DATA POSYANDU</h3>
                <br><br>
                <?php
                while ($row=mysqli_fetch_array($query)) {
                    ?>
                    <table style="text-align: left; margin-left: 5cm;">
                        <tr>
                            <td>NIK</td>
                            <td style="padding-left: 1cm;"><?php echo $row['nik']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td style="padding-left: 1cm;"><?php echo $row['namalengkap']." / ".$row['namapanggil']; ?></td>
                        </tr>
                        <tr>
                            <td>Tempat, Tanggal Lahir</td>
                            <td style="padding-left: 1cm;"><?php echo $row['tempat'].", ";
                                                            $tgl=$row['tgllahir'];
                                                            $ttl=date("d F Y",strtotime($tgl)); 
                                                            echo $ttl;?></td>
                        </tr>
                        <tr>
                            <td>Umur</td>
                            <td style="padding-left: 1cm;"><?php $date=date("Y-m-d");
                                $tgl=$row['tgllahir'];
                                $lahir=strtotime($tgl);
                                $now=strtotime($date);
                                $bln=(date("Y",$now)-date("Y",$lahir))*12;
                                $bln+= date("m",$now)-date("m",$lahir);
                                echo $bln."&nbspBulan";?></td>
                        </tr>
                    </table>
                    <?php
                }

                $nik=$_GET['nik'];
                $sql="SELECT * FROM ibuhamil WHERE nik='$nik'";
                $query=mysqli_query($conn, $sql);
                while ($row=mysqli_fetch_array($query)) {
                    ?>
                    <table style="text-align: left; margin-left: 5cm;">
                        <tr>
                            <td>NIK</td>
                                        <td style="padding-left: 1cm;"><?php echo $row['nik']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td style="padding-left: 1cm;"><?php echo $row['namalengkap']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tempat, Tanggal Lahir</td>
                                        <td style="padding-left: 1cm;"><?php echo $row['tempat'].", ";
                                            $tgl=$row['tgllahir'];
                                            $ttl=date("d F Y",strtotime($tgl)); 
                                            echo $ttl;?></td>
                                    </tr>
                                    <tr>
                                        <td>Umur</td>
                                        <td style="padding-left: 1cm;"><?php $date=date("Y-m-d");
                                            $tgl=$row['tgllahir'];
                                            $lahir=strtotime($tgl);
                                            $now=strtotime($date);
                                            $bln=(date("Y",$now)-date("Y",$lahir))*12;
                                            $bln+= date("m",$now)-date("m",$lahir);
                                            $thn=floor($bln/12);
                                            echo $thn."&nbspTahun";
                                            ?></td>
                        </tr>
                    </table>
                    <?php
                }
                ?>
                <br>
                <center>
                <button type="submit" class="btn" style="background-color: #008B8B; color: white;" onclick="window.location.href='previewdata.php?preview=1&nik=<?php echo $nik;?>'">BERAT BADAN & TINGGI BADAN</button>
                <button type="submit" class="btn" style="background-color: #008B8B; color: white;" onclick="window.location.href='previewdataa.php?preview=1&nik=<?php echo $nik;?>'">IMUNISASI</button>
                </center>
                <br>
                <?php
                $no=1;
                $sql= "SELECT * FROM cek WHERE nik='$nik' AND obat<>'' ORDER BY bulan ASC";
                $query = mysqli_query($conn,$sql);
                $cek = mysqli_num_rows($query);
                if ($cek > 0) {
                    ?>
                    <br>
                    <br><button type="submit" class="btn btn-primary" style="margin-left: 10%;" onclick="window.print()">PRINT</button>
                    <h5 style="font-weight: bold; text-align: center;">DATA IMUNISASI</h5>
                    <br><br>
                    <center><table id="cari">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Bulan</th>
                        <th>Jenis Imunisasi</th>
                    </tr>
                    <?php
                    while($row = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php $tgl=$row['tgl'];
                                $tanggal=date("d F Y", strtotime($tgl));
                                echo $tanggal; ?></td>
                            <td><?php echo $row['bulan']." bulan"; ?></td>
                            <td><?php echo $row['obat']; ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
                </table>
                </center>
                <?php
            }
            ?>
            </div>
        </div>
        <div id="footer">
            <font color="white">Copyright &#169; 2020 SI-PANDU</font>
        </div>
    </div>
</body>
</html>