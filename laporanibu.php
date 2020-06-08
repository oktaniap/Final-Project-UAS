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
            width: 100%;
            font-size: 17px;
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
        <div id="isi" style="height:100%; width:100%; float:left; padding-top: 3%; padding-bottom: 3%;">
            <div style="background-color:rgba(152,251,152,0.5); height: 100%; padding-bottom: 5%;"><br><br>
            <form action="laporanibu.php" method="post">
                <b style="font-size: 30px;"><center>DATA IBU HAMIL</center></b><br>
                <div class="form-group row">
                <font style="padding-left: 10%; font-size: 20px; padding-right: 2%;">PILIH TANGGAL</font>
                <div class="col-sm-2">
                <select name="tgl" class="form-control">
                <?php 
                    include "koneksi.php";
                    $sql="SELECT DISTINCT tgl FROM cek ORDER BY tgl DESC";
                    $query=mysqli_query($conn, $sql);
                    while ($row=mysqli_fetch_array($query)) {
                        ?>
                        <option value="<?php echo $row['tgl'];?>">
                            <?php $tgl=$row['tgl'];
                            $tanggal=date("d F Y",strtotime($tgl)); 
                            echo $tanggal;?></option>
                        <?php

                    }
                ?>
                </select>
                </div>
                <button type="submit" class="btn" style="background-color: #008B8B; color: white;">TAMPILKAN</button>
                </div>
            </form>
            <div style="text-align: center;">
            <?php 
            include "koneksi.php";
            if(isset($_POST['tgl'])){
                $tgl = $_POST['tgl'];
                $no=1;
                ?>
                <br><br>
                <font style="font-size: 20px;">POSYANDU TANGGAL <?php $tanggal=date("d F Y",strtotime($tgl)); echo $tanggal; ?></font>
                <br><br>
                <?php
                $sql="SELECT a.tgl , a.nik, b.namalengkap, b.tempat, b.tgllahir, a.bulan, a.berat, a.tinggi, a.obat FROM cek a JOIN ibuhamil b ON a.nik=b.nik WHERE a.tgl='$tgl'";
                $data = mysqli_query($conn, $sql);
                $cek=mysqli_num_rows($data);
                if ($cek>0) {
                    ?>
                    <button type="submit" class="btn" style="float: left; background-color: #FF0000; color: white; margin-left: 10%;" onclick="window.location.href='printpdfibu.php?tgl=<?php echo $tgl; ?>'">PRINT PDF</button>
                    <button type="submit" class="btn" style="float: left; background-color: #228B22; color: white; margin-left: 3%;" onclick="window.location.href='printexcelibu.php?tgl=<?php echo $tgl; ?>'">PRINT EXCEL</button>
                    <br>
                    <br>
                    <table id="cari">
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>Umur</th>
                            <th>Usia Kandungan</th>
                            <th>Berat Badan</th>
                            <th>Tinggi Badan</th>
                            <th>Imunisasi</th>
                        </tr>
                    <?php
                    while ($row=mysqli_fetch_array($data)) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row['nik']; ?></td>
                            <td><?php echo $row['namalengkap']; ?></td>
                            <td><?php echo $row['tempat'].", "; 
                                $tgl=$row['tgllahir'];
                                $ttl=date("d F Y",strtotime($tgl)); 
                                echo $ttl;?></td>
                            <td><?php $date=date("Y-m-d");
                                $tgl=$row['tgllahir'];
                                $lahir=strtotime($tgl);
                                $now=strtotime($date);
                                $bln=(date("Y",$now)-date("Y",$lahir))*12;
                                $bln+= date("m",$now)-date("m",$lahir);
                                $thn=floor($bln/12);
                                echo $thn."&nbspTahun <br>";?></td>
                            <td><?php echo $row['bulan']."bulan"; ?></td>
                            <td><?php echo $row['berat']." kg"; ?></td>
                            <td><?php echo $row['tinggi']." cm";?></td>
                            <td><?php echo $row['obat']; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <?php
                }
                else{
                    echo "";
                }
            }
            ?>
            </div>
            </div>
        </div>
        <div id="footer">
            <font color="white">Copyright &#169; 2020 SI-PANDU</font>
        </div>
    </div>
</body>
</html>