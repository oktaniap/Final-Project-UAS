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
            width: 90%;
            margin-right: 5%; margin-left: 5%;
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
                <b style="font-size: 30px;"><center>UPDATE DATA PROFIL PESERTA POSYANDU</center></b><br>
                <?php
                $namalengkap=""; $namapanggil=""; $jk=""; $tempat=""; $tgllahir=""; $ayah=""; $nikayah=""; $ibu=""; $nikibu=""; $umurayah=""; $umuribu=""; $kerjaayah=""; $kerjaibu=""; $alamat=""; $noayah=""; $noibu="";
                if ($_SERVER["REQUEST_METHOD"]=="POST") {
                    if (!empty($_POST['namalengkap'])) {
                        $namalengkap=cek($_POST['namalengkap']);
                    }
                    if (isset($_POST['namapanggil'])) {
                        $namapanggil=cek($_POST['namapanggil']);
                    }
                    if (isset($_POST['jk']) || isset($_POST['jk'])) {
                        $jk=cek($_POST['jk']);
                    }
                    if (isset($_POST['tempat'])) {
                        $tempat=cek($_POST['tempat']);
                    }
                    if (isset($_POST['tgllahir'])) {
                        $tgllahir=cek($_POST['tgllahir']);
                    }
                    if (isset($_POST['ayah'])) {
                        $ayah=cek($_POST['ayah']);
                    }
                    if (isset($_POST['nikayah'])) {
                        $nikayah=cek($_POST['nikayah']);
                    }
                    if (isset($_POST['ibu'])) {
                        $ibu=cek($_POST['ibu']);
                    }
                    if (isset($_POST['nikibu'])) {
                        $nikibu=cek($_POST['nikibu']);
                    }
                    if (isset($_POST['umurayah'])) {
                        $umurayah=cek($_POST['umurayah']);
                    }
                    if (isset($_POST['umuribu'])) {
                        $umuribu=cek($_POST['umuribu']);
                    }
                    if ($_POST['kerjaayah']=="p") {
                        $kerjaayah="";
                    }else{
                        $kerjaayah=cek($_POST['kerjaayah']);
                    }
                    if ($_POST['kerjaibu']=="pp") {
                        $kerjaibu="";
                    }else{
                        $kerjaibu=cek($_POST['kerjaibu']);
                    }
                    if (isset($_POST['alamat'])) {
                        $alamat=cek($_POST['alamat']);
                    }
                    if (isset($_POST['noayah'])) {
                        $noayah=cek($_POST['noayah']);
                    }
                    if (isset($_POST['noibu'])) {
                        $noibu=cek($_POST['noibu']);
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
                    $sql="UPDATE balita SET namalengkap='$namalengkap', namapanggil='$namapanggil', jk='$jk', tempat='$tempat', tgllahir='$tgllahir', ayah='$ayah', nikayah='$nikayah', ibu='$ibu', nikibu='$nikibu', umurayah='$umurayah', umuribu='$umuribu', kerjaayah='$kerjaayah', kerjaibu='$kerjaibu', alamat='$alamat', noayah='$noayah', noibu='$noibu' WHERE nik='$nik'";
                    if (mysqli_query($conn, $sql)) {
                        echo "<script>alert('Data Profil ".$nik." berhasil diupdate!')
                        document.location.href='update.php?edit=1&nik=".$nik."';</script>";
                    }else{
                        echo "<script>alert('Data Profil ".$nik." gagal diupdate!')
                        document.location.href='update.php?edit=1&nik=".$nik."';</script>";
                    }
                }
                ?>
                    <button class="btn" style="margin-left: 5%;background-color: #008B8B; color: white;" onclick="window.location.href='edit.php'">KEMBALI</button>
                    <form method="POST" action="update.php">
                        <div style="float: right; margin-right: 5%;">
                        <button type="submit" class="btn btn-danger">UPDATE</button></div>
                        <br><br>
                        <?php
                        include "koneksi.php";
                        if ($_GET['edit']==1) {
                            $nik=$_GET['nik'];
                            $sql="SELECT * FROM balita WHERE nik='$nik'";
                            $query=mysqli_query($conn, $sql);
                            while ($row=mysqli_fetch_array($query)) {
                            ?>
                            <div style="height: 100%;">
                                <div>
                                    <table id="cari">
                                        <tr>
                                            <th></th>
                                            <th>DATA SAAT INI</th>
                                            <th>DATA BARU</th>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">NIK</td>
                                            <td><?php echo $row['nik']; ?></td>
                                            <td>TIDAK BISA DIUPDATE</td>
                                            <input type="hidden" name="nik" value="<?php echo $row['nik']; ?>">
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Nama Lengkap</td>
                                            <td><?php echo $row['namalengkap']; ?></td>
                                            <td><input type="text" class="form-control" name="namalengkap" value="<?php echo $row['namalengkap']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Nama Panggilan</td>
                                            <td><?php echo $row['namapanggil']; ?></td>
                                            <td><input type="text" class="form-control" name="namapanggil" value="<?php echo $row['namapanggil']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Tempat Lahir</td>
                                            <td><?php echo $row['tempat'];?></td>
                                            <td><input type="text" name="tempat" class="form-control" value="<?php echo $row['tempat']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Tanggal Lahir</td>
                                            <td><?php $tgl=$row['tgllahir'];
                                                $ttl=date("d F Y",strtotime($tgl)); 
                                                echo $ttl;?></td>
                                                <td><input type="date" name="tgllahir" class="form-control <?php echo($error_tgllahir !="" ? "is-invalid" : ""); ?>" id="tgllahir" value="<?php echo $row['tgllahir']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Jenis Kelamin</td>
                                            <td><?php echo $row['jk']; ?></td>
                                            <td>
                                                <input type="radio" name="jk" value="Laki-laki" <?php if($row['jk']=='Laki-laki'){echo 'checked';}?>/> Laki-laki&nbsp &nbsp
                                                <input type="radio" name="jk" value="Perempuan" <?php if($row['jk']=='Perempuan'){echo 'checked';}?>/> Perempuan</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Alamat</td>
                                            <td><?php echo $row['alamat'];?></td>
                                            <td><input type="text" class="form-control" name="alamat" value="<?php echo $row['alamat']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Nama Ayah</td>
                                            <td><?php echo $row['ayah'];?></td>
                                            <td><input type="text" class="form-control" name="ayah" value="<?php echo $row['ayah']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">NIK Ayah</td>
                                            <td><?php echo $row['nikayah']; ?></td>
                                            <td><input type="text" class="form-control" name="nikayah" value="<?php echo $row['nikayah']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Umur Ayah</td>
                                            <td><?php echo $row['umurayah'];?></td>
                                            <td><input type="text" class="form-control" name="umurayah" value="<?php echo $row['umurayah']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Pekerjaan Ayah</td>
                                            <td><?php echo $row['kerjaayah'];?></td>
                                            <td>
                                                <select class="form-control" name="kerjaayah">
                                                    <option value="p" >Pekerjaan Ayah</option>
                                                    <option value="Belum / Tidak Bekerja" <?php if ($row['kerjaayah']=="Belum / Tidak Bekerja") { echo "selected=\"selected\""; } ?>>Belum / Tidak Bekerja</option>
                                                    <option value="Mengurus Rumah Tangga" <?php if ($row['kerjaayah']=="Mengurus Rumah Tangga") { echo "selected=\"selected\""; } ?>>Mengurus Rumah Tangga</option>
                                                    <option value="Industri" <?php if ($row['kerjaayah']=="Industri") { echo "selected=\"selected\""; } ?>>Industri</option>
                                                    <option value="Pensiunan" <?php if ($row['kerjaayah']=="Pensiunan") { echo "selected=\"selected\""; } ?>>Pensiunan</option>
                                                    <option value="Pegawai Negeri Sipil" <?php if ($row['kerjaayah']=="Pegawai Negeri Sipil") { echo "selected=\"selected\""; } ?>>Pegawai Negeri Sipil</option>
                                                    <option value="Tentara Nasional Indonesia" <?php if ($row['kerjaayah']=="Tentara Nasional Indonesia") { echo "selected=\"selected\""; } ?>>Tentara Nasional Indonesia</option>
                                                    <option value="Kepolisian RI" <?php if ($row['kerjaayah']=="Kepolisian RI") { echo "selected=\"selected\""; } ?>>Kepolisian RI</option>
                                                    <option value="Perdagangan" <?php if ($row['kerjaayah']=="Perdagangan") { echo "selected=\"selected\""; } ?>>Perdagangan</option>
                                                    <option value="Petani / Pekebun" <?php if ($row['kerjaayah']=="Petani / Pekebun") { echo "selected=\"selected\""; } ?>>Petani / Pekebun</option>
                                                    <option value="Peternak" <?php if ($row['kerjaayah']=="Peternak") { echo "selected=\"selected\""; } ?>>Peternak</option>
                                                    <option value="Nelayan / Perikanan" <?php if ($row['kerjaayah']=="Nelayan / Perikanan") { echo "selected=\"selected\""; } ?>>Nelayan / Perikanan</option>
                                                    <option value="Karyawan Swasta" <?php if ($row['kerjaayah']=="Karyawan Swasta") { echo "selected=\"selected\""; } ?>>Karyawan Swasta</option>
                                                    <option value="Seniman" <?php if ($row['kerjaayah']=="Seniman") { echo "selected=\"selected\""; } ?>>Seniman</option>
                                                    <option value="Guru" <?php if ($row['kerjaayah']=="Guru") { echo "selected=\"selected\""; } ?>>Guru</option>
                                                    <option value="Dokter" <?php if ($row['kerjaayah']=="Dokter") { echo "selected=\"selected\""; } ?>>Dokter</option>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Nomor Telp Ayah</td>
                                            <td><?php echo $row['noayah']; ?></td>
                                            <td><input type="text" class="form-control" name="noayah" value="<?php echo $row['noayah']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Nama Ibu</td>
                                            <td><?php echo $row['ibu']; ?></td>
                                            <td><input type="text" class="form-control" name="ibu" value="<?php echo $row['ibu']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">NIK Ibu</td>
                                            <td><?php echo $row['nikibu'];?></td>
                                            <td><input type="text" class="form-control" name="nikibu" value="<?php echo $row['nikibu']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Umur Ibu</td>
                                            <td><?php echo $row['umuribu'];?></td>
                                            <td><input type="text" class="form-control" name="umuribu" value="<?php echo $row['umuribu']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Pekerjaan Ibu</td>
                                            <td><?php echo $row['kerjaibu'];?></td>
                                            <td>
                                                <select class="form-control" name="kerjaibu">
                                                    <option value="p" >Pekerjaan Ibu</option>
                                                    <option value="Belum / Tidak Bekerja" <?php if ($row['kerjaibu']=="Belum / Tidak Bekerja") { echo "selected=\"selected\""; } ?>>Belum / Tidak Bekerja</option>
                                                    <option value="Mengurus Rumah Tangga" <?php if ($row['kerjaibu']=="Mengurus Rumah Tangga") { echo "selected=\"selected\""; } ?>>Mengurus Rumah Tangga</option>
                                                    <option value="Industri" <?php if ($row['kerjaibu']=="Industri") { echo "selected=\"selected\""; } ?>>Industri</option>
                                                    <option value="Pensiunan" <?php if ($row['kerjaibu']=="Pensiunan") { echo "selected=\"selected\""; } ?>>Pensiunan</option>
                                                    <option value="Pegawai Negeri Sipil" <?php if ($row['kerjaibu']=="Pegawai Negeri Sipil") { echo "selected=\"selected\""; } ?>>Pegawai Negeri Sipil</option>
                                                    <option value="Tentara Nasional Indonesia" <?php if ($row['kerjaibu']=="Tentara Nasional Indonesia") { echo "selected=\"selected\""; } ?>>Tentara Nasional Indonesia</option>
                                                    <option value="Kepolisian RI" <?php if ($row['kerjaibu']=="Kepolisian RI") { echo "selected=\"selected\""; } ?>>Kepolisian RI</option>
                                                    <option value="Perdagangan" <?php if ($row['kerjaibu']=="Perdagangan") { echo "selected=\"selected\""; } ?>>Perdagangan</option>
                                                    <option value="Petani / Pekebun" <?php if ($row['kerjaibu']=="Petani / Pekebun") { echo "selected=\"selected\""; } ?>>Petani / Pekebun</option>
                                                    <option value="Peternak" <?php if ($row['kerjaibu']=="Peternak") { echo "selected=\"selected\""; } ?>>Peternak</option>
                                                    <option value="Nelayan / Perikanan" <?php if ($row['kerjaibu']=="Nelayan / Perikanan") { echo "selected=\"selected\""; } ?>>Nelayan / Perikanan</option>
                                                    <option value="Karyawan Swasta" <?php if ($row['kerjaibu']=="Karyawan Swasta") { echo "selected=\"selected\""; } ?>>Karyawan Swasta</option>
                                                    <option value="Seniman" <?php if ($row['kerjaibu']=="Seniman") { echo "selected=\"selected\""; } ?>>Seniman</option>
                                                    <option value="Guru" <?php if ($row['kerjaibu']=="Guru") { echo "selected=\"selected\""; } ?>>Guru</option>
                                                    <option value="Dokter" <?php if ($row['kerjaibu']=="Dokter") { echo "selected=\"selected\""; } ?>>Dokter</option>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Nomor Telp Ibu</td>
                                            <td><?php echo $row['noibu'];?></td>
                                            <td><input type="text" class="form-control" name="noibu" value="<?php echo $row['noibu']; ?>"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <?php
                            }  
                        }
                        ?>
                    </form>
                    <br><br>
            </div>
        </div>
        <div id="footer">
            <font color="white">Copyright &#169; 2020 SI-PANDU</font>
        </div>
    </div>
</body>
</html>