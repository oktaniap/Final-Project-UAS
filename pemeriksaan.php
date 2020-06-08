<!DOCTYPE html>
<html>
<head>
    <title>SI-PANDU</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <style type="text/css">
        #cari{
            border-collapse: collapse;
            font-size: 17px;
            width: 100%;
        }
        #cari td, #cari th{
            border: 1px solid black;
            padding: 15px;
        }
        #cari tr:nth-child(even){
            background-color: #f2f2f2;
        }
        #cari tr:nth-child(odd){
            background-color: #ddd;
        }
        #cari tr:hover {
            background-color: #C0C0C0;
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
                <form action="pemeriksaan.php" method="get">
                <b style="font-size: 30px;"><center>PEMERIKSAAN BERAT BADAN DAN TINGGI BADAN</center></b><br><br>
                <input type="text" name="cari" style="font-size: 20px; margin-right: 2cm; border-radius: 4px; float: right; width: 10cm" placeholder="Cari berdasarkan NIK / Nama">
                <button type="submit" class="btn" style="margin-left: 21cm; margin-bottom: 2px; background-color: #008B8B; color: white;">CARI</button>
                </form>
                <br><br>
                <div style="text-align: center;">
                    <table id="cari">
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Tempat,&nbspTanggal&nbspLahir</th>
                            <th>Umur</th>
                            <th style="width: 10%;"></th>
                        </tr>
                        <?php
                        $no=1;
                        include "koneksi.php";
                        date_default_timezone_set("asia/jakarta");
                        $tanggal=date("Y-m-d");
                        if (isset($_GET['cari'])=="") {
                            $sql="SELECT * FROM kehadiran WHERE tanggal = '$tanggal'";
                            $query=mysqli_query($conn, $sql);
                            while ($row=mysqli_fetch_array($query)) {
                                $nik=$row['nik'];
                                $sql1="SELECT * FROM balita WHERE nik='$nik'";
                                $query1=mysqli_query($conn, $sql1);
                                while ($row1=mysqli_fetch_array($query1)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row1['nik']; ?></td>
                                        <td><?php echo $row1['namalengkap']; ?></td>
                                        <td><?php echo $row1['tempat'].", "; 
                                            $tgl=$row1['tgllahir'];
                                            $ttl=date("d F Y",strtotime($tgl)); 
                                            echo $ttl;?></td>
                                        <td><?php $date=date("Y-m-d");
                                            $tgl=$row1['tgllahir'];
                                            $lahir=strtotime($tgl);
                                            $now=strtotime($date);
                                            $bln=(date("Y",$now)-date("Y",$lahir))*12;
                                            $bln+= date("m",$now)-date("m",$lahir);
                                            echo $bln."&nbspBulan";
                                            ?></td>
                                        <td><button class="btn btn-primary" onclick="window.location.href='pemeriksaan1.php?hadir=1&nik=<?php echo $row['nik'];?>'">CEK</button></form></td>
                                    </tr>
                                    <?php
                                }
                                $sql2="SELECT * FROM ibuhamil WHERE nik='$nik'";
                                $query2=mysqli_query($conn, $sql2);
                                while ($row2=mysqli_fetch_array($query2)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row2['nik']; ?></td>
                                        <td><?php echo $row2['namalengkap']; ?></td>
                                        <td>
                                            <?php echo $row2['tempat'].", "; 
                                            $tgl=$row2['tgllahir'];
                                            $ttl=date("d F Y",strtotime($tgl)); 
                                            echo $ttl;?>
                                        </td>
                                        <td><?php $date=date("Y-m-d");
                                            $tgl=$row2['tgllahir'];
                                            $lahir=strtotime($tgl);
                                            $now=strtotime($date);
                                            $bln=(date("Y",$now)-date("Y",$lahir))*12;
                                            $bln+= date("m",$now)-date("m",$lahir);
                                            $thn=floor($bln/12);
                                            echo $thn."&nbspTahun";
                                            ?>     
                                        </td>
                                        <td><button class="btn btn-primary" onclick="window.location.href='pemeriksaan1.php?hadir=1&nik=<?php echo $row['nik'];?>'">CEK</button></td>
                                    </tr>
                                    <?php
                                }
                            }
                        }else{
                            $cari = $_GET['cari'];
                            $sql="SELECT * FROM kehadiran WHERE tanggal = '$tanggal'";
                            $query=mysqli_query($conn, $sql);
                            while ($row=mysqli_fetch_array($query)) {
                                $nik=$row['nik'];
                                $sql="SELECT * FROM balita WHERE nik='$nik' AND nik='$cari'";
                                $data = mysqli_query($conn, $sql);
                                $cek = mysqli_num_rows($data);
                                $sql1="SELECT * FROM ibuhamil WHERE nik='$nik'AND nik='$cari'";
                                $data1 = mysqli_query($conn, $sql1);
                                $cek1 = mysqli_num_rows($data1);
                                $sql2="SELECT * FROM balita WHERE nik='$nik' AND namalengkap LIKE '%".$cari."%'";
                                $data2 = mysqli_query($conn, $sql2);
                                $cek2 = mysqli_num_rows($data2);
                                $sql3="SELECT * FROM ibuhamil WHERE nik='$nik' AND namalengkap LIKE '%".$cari."%'";
                                $data3 = mysqli_query($conn, $sql3);
                                $cek3 = mysqli_num_rows($data3);
                                if ($cek > 0) {
                                    while ($row=mysqli_fetch_array($data)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['nik']; ?></td>
                                            <td><?php echo $row['namalengkap']; ?></td>
                                            <td>
                                                <?php echo $row['tempat'].", "; 
                                                $tgl=$row['tgllahir'];
                                                $ttl=date("d F Y",strtotime($tgl)); 
                                                echo $ttl;?>
                                            </td>
                                            <td><?php $date=date("Y-m-d");
                                                $tgl=$row['tgllahir'];
                                                $lahir=strtotime($tgl);
                                                $now=strtotime($date);
                                                $bln=(date("Y",$now)-date("Y",$lahir))*12;
                                                $bln+= date("m",$now)-date("m",$lahir);
                                                $thn=floor($bln/12);
                                                echo $bln." Bulan";
                                                ?>     
                                            </td>
                                            <td><button class="btn btn-primary" onclick="window.location.href='pemeriksaan1.php?hadir=1&nik=<?php echo $row['nik'];?>'">CEK</button></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                if ($cek1 >0) {
                                    while ($row1=mysqli_fetch_array($data1)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row1['nik']; ?></td>
                                            <td><?php echo $row1['namalengkap']; ?></td>
                                            <td>
                                                <?php echo $row1['tempat'].", "; 
                                                $tgl=$row1['tgllahir'];
                                                $ttl=date("d F Y",strtotime($tgl)); 
                                                echo $ttl;?>
                                            </td>
                                            <td><?php $date=date("Y-m-d");
                                                $tgl=$row1['tgllahir'];
                                                $lahir=strtotime($tgl);
                                                $now=strtotime($date);
                                                $bln=(date("Y",$now)-date("Y",$lahir))*12;
                                                $bln+= date("m",$now)-date("m",$lahir);
                                                $thn=floor($bln/12);
                                                echo $thn." Tahun";
                                                ?>     
                                            </td>
                                            <td><button class="btn btn-primary" onclick="window.location.href='pemeriksaan1.php?hadir=1&nik=<?php echo $row['nik'];?>'">CEK</button></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                if ($cek2 > 0) {
                                    while ($row2=mysqli_fetch_array($data2)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row2['nik']; ?></td>
                                            <td><?php echo $row2['namalengkap']; ?></td>
                                            <td>
                                                <?php echo $row2['tempat'].", "; 
                                                $tgl=$row2['tgllahir'];
                                                $ttl=date("d F Y",strtotime($tgl)); 
                                                echo $ttl;?>
                                            </td>
                                            <td><?php $date=date("Y-m-d");
                                                $tgl=$row2['tgllahir'];
                                                $lahir=strtotime($tgl);
                                                $now=strtotime($date);
                                                $bln=(date("Y",$now)-date("Y",$lahir))*12;
                                                $bln+= date("m",$now)-date("m",$lahir);
                                                $thn=floor($bln/12);
                                                echo $bln." Bulan";
                                                ?>     
                                            </td>
                                            <td><button class="btn btn-primary" onclick="window.location.href='pemeriksaan1.php?hadir=1&nik=<?php echo $row['nik'];?>'">CEK</button></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                if ($cek3 >0) {
                                    while ($row3=mysqli_fetch_array($data3)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row3['nik']; ?></td>
                                            <td><?php echo $row3['namalengkap']; ?></td>
                                            <td>
                                                <?php echo $row3['tempat'].", "; 
                                                $tgl=$row3['tgllahir'];
                                                $ttl=date("d F Y",strtotime($tgl)); 
                                                echo $ttl;?>
                                            </td>
                                            <td><?php $date=date("Y-m-d");
                                                $tgl=$row3['tgllahir'];
                                                $lahir=strtotime($tgl);
                                                $now=strtotime($date);
                                                $bln=(date("Y",$now)-date("Y",$lahir))*12;
                                                $bln+= date("m",$now)-date("m",$lahir);
                                                $thn=floor($bln/12);
                                                echo $thn." Tahun";
                                                ?>     
                                            </td>
                                            <td><button class="btn btn-primary" onclick="window.location.href='pemeriksaan1.php?hadir=1&nik=<?php echo $row['nik'];?>'">CEK</button></td>
                                        </tr>
                                        <?php
                                    }
                                }
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div id="footer">
            <font color="white">Copyright &#169; 2020 SI-PANDU</font>
        </div>
    </div>
</body>
</html>