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
            width: 50%;
            margin-left: 25%; margin-right: 25%;
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
                <?php
                $obat="";
                if ($_SERVER["REQUEST_METHOD"]=="POST") {
                    if (isset($_POST['imun'])) {
                        $obat=cek($_POST['imun']);
                    }
                    date_default_timezone_set("asia/jakarta");
                    $tgl=date("Y-m-d");
                    $nik=cek($_POST['nik']);
                }
                function cek($data){
                    $data=trim($data);
                    $data=stripslashes($data);
                    $data=htmlspecialchars($data);
                    return $data;
                }
                include "koneksi.php";
                if (!empty($nik)&&!empty($tgl)) {
                    $sql="UPDATE cek SET obat='$obat' WHERE nik='$nik' AND tgl='$tgl'";
                    if (mysqli_query($conn, $sql)) {
                        echo "<script>alert('Data Imunisasi ".$nik." berhasil dimasukkan!')
                        document.location.href='imunisasi2.php?imun=2&nik=".$nik."&tgl=".$tgl."';</script>";
                    }else{
                        echo "<script>alert('Data Imunisasi ".$nik." gagal dimasukkan!')
                        document.location.href='imunisasi1.php?imun=1&nik=".$nik."';</script>";
                    }
                }
                ?>
                <form action="imunisasi1.php?" method="POST">
                    <b style="font-size: 30px;"><center>PEMERIKSAAN IMUNISASI</center></b><br><br>
                    <font style="margin-left: 5cm; font-size: 18px; letter-spacing: 0.3px; padding-left: 2cm; font-weight: bold;">
                        <?php
                        date_default_timezone_set("asia/jakarta");
                        $tgl=date("d F Y");
                        echo "TANGGAL ".$tgl."</font><br><br>";
                        include "koneksi.php";
                        if ($_GET['imun']==1) {
                            $nik=$_GET['nik'];
                            $sql="SELECT * FROM balita WHERE nik='$nik'";
                            $query=mysqli_query($conn, $sql);
                            while ($row=mysqli_fetch_array($query)){
                                ?>
                                <table style="text-align: left; margin-left: 5cm;">
                                    <tr>
                                        <td>NIK</td>
                                        <td style="padding-left: 1cm;"><?php echo $row['nik']; ?></td>
                                        <input type="hidden" name="nik" value="<?php echo $row['nik'];?>">
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
                                            echo $bln."&nbspBulan";
                                            ?></td>
                                    </tr>
                                </table>
                                <?php
                                $nik=$row['nik'];
                                $nama=$row['namalengkap'];
                                date_default_timezone_set("asia/jakarta");
                                $tanggal=date("Y-m-d");
                                $sql="SELECT * FROM cek WHERE tgl='$tanggal' AND nik='$nik'";
                                $query=mysqli_query($conn, $sql);
                                while ($row=mysqli_fetch_array($query)) {
                                    if ($row['obat']=="") {
                                        ?>
                                        <br>
                                        <br>
                                        <table id="cari">
                                        <tr>
                                            <th>Imunisasi Yang Diberikan</th>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" name="imun" style="height: 100px; text-align: center;"></td>
                                        </tr>
                                        </table>
                                        <br><br>
                                        <center><button class="btn btn-primary">MASUKKAN DATA</button></center>
                                        <?php
                                    }else{
                                        echo "<script>alert('Pemberian Imunisasi ".$nik." / ".$nama." sudah dimasukkan hari ini!')
                                            document.location.href='imunisasi2.php?imun=2&nik=".$nik."&tgl=".$tanggal."'</script>";
                                    }
                                }

                            }

                            
                            $sql="SELECT * FROM ibuhamil WHERE nik='$nik'";
                            $query=mysqli_query($conn, $sql);
                            while ($row=mysqli_fetch_array($query)){
                                ?>
                                <table style="text-align: left; margin-left: 5cm;">
                                    <tr>
                                        <td>NIK</td>
                                        <td style="padding-left: 1cm;"><?php echo $row['nik']; ?></td>
                                        <input type="hidden" name="nik" value="<?php echo $row['nik'];?>">
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
                                $nik=$row['nik'];
                                $nama=$row['namalengkap'];
                                date_default_timezone_set("asia/jakarta");
                                $tanggal=date("Y-m-d");
                                $sql="SELECT * FROM cek WHERE tgl='$tanggal' AND nik='$nik'";
                                $query=mysqli_query($conn, $sql);
                                while ($row=mysqli_fetch_array($query)) {
                                    if ($row['obat']=="") {
                                        ?>
                                        <br>
                                        <br>
                                        <table id="cari">
                                        <tr>
                                            <th>Imunisasi Yang Diberikan</th>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" name="imun" style="height: 100px; text-align: center;"></td>
                                        </tr>
                                        </table>
                                        <br><br>
                                        <center><button class="btn btn-primary">MASUKKAN DATA</button></center>
                                        <?php
                                    }else{
                                        echo "<script>alert('Pemberian Imunisasi ".$nik." / ".$nama." sudah dimasukkan hari ini!')
                                            document.location.href='imunisasi2.php?imun=2&nik=".$nik."&tgl=".$tanggal."'</script>";
                                    }
                                }

                            }
                        }else{
                            echo "";
                            }                        
                            ?>
                    </font>
                </form>
            </div>
        </div>
        <div id="footer">
            <font color="white">Copyright &#169; 2020 SI-PANDU</font>
        </div>
    </div>
</body>
</html>