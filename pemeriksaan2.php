<!DOCTYPE html>
<html>
<head>
    <title>SI-PANDU</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
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
                    <li><a href="laporanbalita.php" style="font-size: 15px;"><i class="fas fa-print"></i> Print Laporan</a>
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
                <b style="font-size: 30px;"><center>PEMERIKSAAN BERAT BADAN DAN TINGGI BADAN</center></b><br>
                <button class="btn" style="margin-left: 5%; background-color: #008B8B; color: white;" onclick="window.location.href='pemeriksaan.php'">KEMBALI</button>
                <br>
                <br>
                <font style="font-size: 18px; letter-spacing: 0.3px; padding-left: 2cm; font-weight: bold;">
                    <?php
                    date_default_timezone_set("asia/jakarta");
                    $tgl=date("d F Y");
                    echo "TANGGAL ".$tgl."</font><br><br>";
                    include "koneksi.php";
                    if ($_GET['cek']==1) {
                        $nik=$_GET['nik'];
                        $sql="SELECT * FROM balita WHERE nik='$nik'";
                        $query=mysqli_query($conn, $sql);
                        while ($row=mysqli_fetch_array($query)) {
                            ?>
                            <table style="text-align: left; margin-left: 5cm;">
                                <font style="margin-left: 5cm; font-size: 18px; letter-spacing: 0.3px; padding-left: 2cm; font-weight: bold;">
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
                                        echo $bln." Bulan";
                                        ?></td>
                                </tr>
                                <?php
                                $nik=$row['nik'];
                                date_default_timezone_set("asia/jakarta");
                                $tanggal=date("Y-m-d");
                                $sql="SELECT * FROM cek WHERE tgl='$tanggal' AND nik='$nik'";
                                $query=mysqli_query($conn, $sql);
                                while ($row=mysqli_fetch_array($query)) {
                                    ?>
                                    <tr>
                                        <td>Berat Badan Bulan Ini</td>
                                        <td style="padding-left: 1cm;"><?php echo $row['berat']." kg"; ?></td>
                                    </tr>
                                    <?php
                                    if ($row['tinggi']=="") {
                                        ?>
                                        <tr>
                                            <td>Tinggi</td>
                                        </tr>
                                        <?php
                                    }else{
                                        ?>
                                        <tr>
                                            <td>Tinggi</td>
                                            <td style="padding-left: 1cm;"><?php echo $row['tinggi']." cm"; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                            </table>
                                <?php
                                }
                                ?>
                                <br><br>
                                <button class="btn btn-primary" style="margin-left: 5%;" onclick="window.location.href='pemeriksaan3.php?update=1&nik=<?php echo $nik;?>&tgl=<?php echo $tanggal; ?>'">UPDATE DATA</button>
                                <?php
                        }

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
                                <?php
                                $nik=$row['nik'];
                                date_default_timezone_set("asia/jakarta");
                                $tanggal=date("Y-m-d");
                                $sql="SELECT * FROM cek WHERE tgl='$tanggal' AND nik='$nik'";
                                $query=mysqli_query($conn, $sql);
                                while ($row=mysqli_fetch_array($query)) {
                                    ?>
                                    <tr>
                                        <td>Usia Kandungan</td>
                                        <td style="padding-left: 1cm;"><?php echo $row['bulan']." bulan"; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Berat Badan Bulan Ini</td>
                                        <td style="padding-left: 1cm;"><?php echo $row['berat']." kg"; ?></td>
                                    </tr>
                                    <?php
                                    if ($row['tinggi']=="") {
                                        ?>
                                        <tr>
                                            <td>Tinggi</td>
                                        </tr>
                                        <?php
                                    }else{
                                        ?>
                                        <tr>
                                            <td>Tinggi</td>
                                            <td style="padding-left: 1cm;"><?php echo $row['tinggi']." cm"; ?></td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                            </table>
                                <?php    
                                }
                                ?>
                                <br><br>
                                <button class="btn btn-primary" style="margin-left: 5%;" onclick="window.location.href='pemeriksaan3.php?update=1&nik=<?php echo $nik;?>&tgl=<?php echo $tanggal; ?>'">UPDATE DATA</button>
                                <?php
                        }
                    }
                    ?>
                    <br><br>
                </font>
            </div>
        </div>
        <div id="footer">
            <font color="white">Copyright &#169; 2020 SI-PANDU</font>
        </div>
    </div>
</body>
</html>