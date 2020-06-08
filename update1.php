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
            <div style="background-color:rgba(152,251,152,0.5); height: 1000px; padding-bottom: 50px;"><br><br>
                <b style="font-size: 30px;"><center>UPDATE DATA PROFIL PESERTA POSYANDU</center></b><br>
                <?php
                $namalengkap=""; $tempat=""; $tgllahir=""; $pekerjaan=""; $alamat=""; $nomor=""; 
                if ($_SERVER["REQUEST_METHOD"]=="POST") {
                    if (!empty($_POST['namalengkap'])) {
                        $namalengkap=cek($_POST['namalengkap']);
                    }
                    if (isset($_POST['tempat'])) {
                        $tempat=cek($_POST['tempat']);
                    }
                    if (isset($_POST['tgllahir'])) {
                        $tgllahir=cek($_POST['tgllahir']);
                    }
                    if ($_POST['pekerjaan']=="p") {
                        $pekerjaan="";
                    }else{
                        $pekerjaan=cek($_POST['pekerjaan']);
                    }
                    if (isset($_POST['alamat'])) {
                        $alamat=cek($_POST['alamat']);
                    }
                    if (isset($_POST['nomor'])) {
                        $nomor=cek($_POST['nomor']);
                    }
                    $nik=cek($_POST['nik']);
                }
                function cek($data){
                    $data=trim($data);
                    $data=stripslashes($data);
                    $data=htmlspecialchars($data);
                    return $data;
                }
                include "koneksi.php";
                if (!empty($nik)) {
                    $sql="UPDATE ibuhamil SET namalengkap='$namalengkap', tempat='$tempat', tgllahir='$tgllahir', pekerjaan='$pekerjaan', alamat='$alamat', nomor='$nomor' WHERE nik='$nik'";
                    if (mysqli_query($conn, $sql)) {
                        echo "<script>alert('Data Profil ".$nik." berhasil diupdate!')
                        document.location.href='update1.php?edit=1&nik=".$nik."';</script>";
                    }else{
                        echo "<script>alert('Data Profil ".$nik." gagal diupdate!')
                        document.location.href='update1.php?edit=1&nik=".$nik."';</script>";
                    }
                }
                ?>
                <font style="font-size: 18px; letter-spacing: 0.3px; padding-left: 2cm; font-weight: bold;">
                    <button class="btn btn-primary" onclick="window.location.href='edit.php'">KEMBALI</button><br><br>
                    <form method="POST" action="update1.php">
                        <?php
                        include "koneksi.php";
                        if ($_GET['edit']==1) {
                            $nik=$_GET['nik'];
                            $sql="SELECT * FROM ibuhamil WHERE nik='$nik'";
                            $query=mysqli_query($conn, $sql);
                            while ($row=mysqli_fetch_array($query)) {
                            ?>
                            <div style="background-color:rgba(152,251,152,0.5); height: 100%;">
                                <div style="float: left;">
                                    <table style="text-align: left; margin-left: 1cm;">
                                        <tr>
                                            <th></th>
                                            <th style="text-align: center;">DATA SEKARANG</th>
                                            <th style="text-align: center;">DATA BARU</th>
                                        </tr>
                                        <tr>
                                            <td>NIK</td>
                                            <td style="padding-left: 1cm;"><?php echo $row['nik']; ?></td>
                                            <input type="hidden" name="nik" value="<?php echo $row['nik']; ?>">
                                        </tr>
                                        <tr>
                                            <td>Nama Lengkap</td>
                                            <td style="padding-left: 1cm;"><?php echo $row['namalengkap']; ?></td>
                                            <td><input type="text" name="namalengkap" value="<?php echo $row['namalengkap']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Tempat, Tanggal Lahir</td>
                                            <td style="padding-left: 1cm;"><?php echo $row['tempat'].", ";
                                                    $tgl=$row['tgllahir'];
                                                    $ttl=date("d F Y",strtotime($tgl)); 
                                                    echo $ttl;?></td>
                                            <td><input type="text" name="tempat" value="<?php echo $row['tempat']; ?>">,&nbsp&nbsp<input type="date" name="tgllahir" class="form-control <?php echo($error_tgllahir !="" ? "is-invalid" : ""); ?>" id="tgllahir" value="<?php echo $row['tgllahir']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td style="padding-left: 1cm;"><?php echo $row['alamat'];?></td>
                                            <td><input type="text" name="alamat" value="<?php echo $row['alamat']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Pekerjaan</td>
                                            <td style="padding-left: 1cm;"><?php echo $row['pekerjaan'];?></td>
                                            <td>
                                                <select class="form-control" name="pekerjaan">
                                                    <option value="p" >Pekerjaan</option>
                                                    <option value="Belum / Tidak Bekerja" <?php if ($row['pekerjaan']=="Belum / Tidak Bekerja") { echo "selected=\"selected\""; } ?>>Belum / Tidak Bekerja</option>
                                                    <option value="Mengurus Rumah Tangga" <?php if ($row['pekerjaan']=="Mengurus Rumah Tangga") { echo "selected=\"selected\""; } ?>>Mengurus Rumah Tangga</option>
                                                    <option value="Industri" <?php if ($row['pekerjaan']=="Industri") { echo "selected=\"selected\""; } ?>>Industri</option>
                                                    <option value="Pensiunan" <?php if ($row['pekerjaan']=="Pensiunan") { echo "selected=\"selected\""; } ?>>Pensiunan</option>
                                                    <option value="Pegawai Negeri Sipil" <?php if ($row['pekerjaan']=="Pegawai Negeri Sipil") { echo "selected=\"selected\""; } ?>>Pegawai Negeri Sipil</option>
                                                    <option value="Tentara Nasional Indonesia" <?php if ($row['pekerjaan']=="Tentara Nasional Indonesia") { echo "selected=\"selected\""; } ?>>Tentara Nasional Indonesia</option>
                                                    <option value="Kepolisian RI" <?php if ($row['pekerjaan']=="Kepolisian RI") { echo "selected=\"selected\""; } ?>>Kepolisian RI</option>
                                                    <option value="Perdagangan" <?php if ($row['pekerjaan']=="Perdagangan") { echo "selected=\"selected\""; } ?>>Perdagangan</option>
                                                    <option value="Petani / Pekebun" <?php if ($row['pekerjaan']=="Petani / Pekebun") { echo "selected=\"selected\""; } ?>>Petani / Pekebun</option>
                                                    <option value="Peternak" <?php if ($row['pekerjaan']=="Peternak") { echo "selected=\"selected\""; } ?>>Peternak</option>
                                                    <option value="Nelayan / Perikanan" <?php if ($row['pekerjaan']=="Nelayan / Perikanan") { echo "selected=\"selected\""; } ?>>Nelayan / Perikanan</option>
                                                    <option value="Karyawan Swasta" <?php if ($row['pekerjaan']=="Karyawan Swasta") { echo "selected=\"selected\""; } ?>>Karyawan Swasta</option>
                                                    <option value="Seniman" <?php if ($row['pekerjaan']=="Seniman") { echo "selected=\"selected\""; } ?>>Seniman</option>
                                                    <option value="Guru" <?php if ($row['pekerjaan']=="Guru") { echo "selected=\"selected\""; } ?>>Guru</option>
                                                    <option value="Dokter" <?php if ($row['pekerjaan']=="Dokter") { echo "selected=\"selected\""; } ?>>Dokter</option>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td>Nomor Telp</td>
                                            <td style="padding-left: 1cm;"><?php echo $row['nomor']; ?></td>
                                            <td><input type="text" name="nomor" value="<?php echo $row['nomor']; ?>"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <?php
                            }  
                        }
                        ?>
                        <button type="submit" class="btn btn-primary">UPDATE</button>
                    </form>
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