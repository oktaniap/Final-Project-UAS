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
            <?php
            $error_namalengkap = "";
            $error_namapanggil = "";
            $error_jk = "";
            $error_nik = "";
            $error_tempat = "";
            $error_tgllahir = "";

            $error_ayah = "";
            $error_nikayah = "";
            $error_ibu = "";
            $error_nikibu = "";
            $error_umurayah = "";
            $error_umuribu = "";
            $error_kerjaayah = "";
            $error_kerjaibu = "";
            $error_alamat = "";
            $error_noayah = "";
            $error_noibu = "";

            $namalengkap = "";
            $namapanggil = "";
            $jk = "";
            $nik = "";
            $tempat = "";
            $tgllahir = "";

            $ayah = "";
            $nikayah = "";
            $ibu = "";
            $nikibu = "";
            $umurayah = "";
            $umuribu = "";
            $kerjaayah = "";
            $kerjaibu = "";
            $alamat = "";
            $noayah = "";
            $noibu = "";

            if ($_SERVER ["REQUEST_METHOD"] == "POST") {
                if (empty ($_POST ["namalengkap"])){
                    $error_namalengkap = "Nama Lengkap tidak boleh kosong";
                }else {
                    if (!preg_match("/^[a-zA-Z ]*$/", cek_input ($_POST["namalengkap"]))){
                        $error_namalengkap = "Nama Lengkap hanya boleh huruf dan spasi!";
                    }else{
                        $namalengkap=cek_input($_POST["namalengkap"]);
                    }
                }

                if (empty ($_POST ["namapanggil"])){
                    $error_namapanggil = "Nama Panggilan tidak boleh kosong";
                }
                else {
                    if (!preg_match("/^[a-zA-Z ]*$/", cek_input ($_POST["namapanggil"]))){
                        $error_namapanggil = "Nama Panggilan hanya boleh huruf dan spasi";
                    }else{
                        $namapanggil=cek_input($_POST["namapanggil"]);
                    }
                }

                if (empty($_POST["jk"])||empty($_POST["jk"])) {
                    $error_jk="Jenis Kelamin tidak boleh kosong";
                }else{
                    $jk=cek_input($_POST["jk"]);
                }

                if (empty($_POST["nik"])){
                    $error_nik = "NIK tidak boleh kosong";
                }else{
                    if (!is_numeric(cek_input($_POST["nik"]))) {
                        $error_nik="NIK hanya boleh angka!";
                    }else{
                        if (strlen(cek_input($_POST["nik"]))>16) {
                            $error_nik="NIK hanya terdiri dari 16 angka!";
                        }else{
                            $nik=cek_input($_POST["nik"]);
                        }
                    }
                }

                if (empty($_POST["tempat"])){
                    $error_tempat = "Tempat Lahir tidak boleh kosong";
                }else{
                    if (!preg_match("/^[a-zA-Z ]*$/", cek_input($_POST["tempat"]))) {
                        $error_tempat="Tempat Lahir hanya boleh huruf dan spasi!";
                    }else{
                        $tempat=cek_input($_POST["tempat"]);
                    }
                }

                if (empty($_POST["tgllahir"])){
                    $error_tgllahir = "Tanggal Lahir tidak boleh kosong";
                }else{
                    $tgllahir = cek_input($_POST["tgllahir"]);
                }

                if (empty ($_POST ["ayah"])){
                    $error_ayah = "Nama Lengkap Ayah tidak boleh kosong";
                }else {
                    if (!preg_match("/^[a-zA-Z ]*$/", cek_input ($_POST["ayah"]))){
                        $error_ayah = "Nama Lengkap Ayah hanya boleh huruf dan spasi!";
                    }else{
                        $ayah=cek_input($_POST["ayah"]);
                    }
                }

                if (empty($_POST["nikayah"])){
                    $error_nikayah = "NIK Ayah tidak boleh kosong";
                }else{
                    if (!is_numeric(cek_input($_POST["nikayah"]))) {
                        $error_nikayah="NIK Ayah hanya boleh angka!";
                    }else{
                        if (strlen(cek_input($_POST["nikayah"]))>16) {
                            $error_nikayah="NIK Ayah hanya terdiri dari 16 angka!";
                        }else{
                            $nikayah=cek_input($_POST["nikayah"]);
                        }
                    }
                }

                if (empty ($_POST ["ibu"])){
                    $error_ibu = "Nama Lengkap Ibu tidak boleh kosong";
                }else {
                    if (!preg_match("/^[a-zA-Z ]*$/", cek_input ($_POST["ibu"]))){
                        $error_ibu = "Nama Lengkap Ibu hanya boleh huruf dan spasi!";
                    }else{
                        $ibu=cek_input($_POST["ibu"]);
                    }
                }

                if (empty($_POST["nikibu"])){
                    $error_nikibu = "NIK Ibu tidak boleh kosong";
                }else{
                    if (!is_numeric(cek_input($_POST["nikibu"]))) {
                        $error_nikibu="NIK Ibu hanya boleh angka!";
                    }else{
                        if (strlen(cek_input($_POST["nikibu"]))>16) {
                            $error_nikibu="NIK Ibu hanya terdiri dari 16 angka!";
                        }else{
                            $nikibu=cek_input($_POST["nikibu"]);
                        }
                    }
                }

                if (empty($_POST["umurayah"])){
                    $error_umurayah = "Umur Ayah tidak boleh kosong";
                }
                else{
                    if (!is_numeric(cek_input($_POST["umurayah"]))) {
                        $error_umurayah="Umur Ayah hanya boleh angka!";
                    }else{
                        $umurayah=cek_input($_POST["umurayah"]);
                    }
                }

                if (empty($_POST["umuribu"])){
                    $error_umuribu = "Umur Ibu tidak boleh kosong";
                }else{
                    if (!is_numeric(cek_input($_POST["umuribu"]))) {
                        $error_umuribu="Umur Ibu hanya boleh angka!";
                    }else{
                        $umuribu = cek_input($_POST["umuribu"]);
                    }
                }

                if (empty($_POST["alamat"])){
                    $error_alamat = "Alamat tidak boleh kosong";
                }else{
                    $alamat = cek_input($_POST["alamat"]);
                }

                if (empty($_POST["noayah"])){
                    $error_noayah = "Nomor Telepon Ayah tidak boleh kosong";
                }else{
                    if (!is_numeric(cek_input($_POST["noayah"]))) {
                        $error_noayah="No Ayah hanya terdiri dari angka!";
                    }else{
                        $noayah = cek_input($_POST["noayah"]);
                    }
                }

                if (empty($_POST["noibu"])){
                    $error_noibu = "Nomor Telepon Ibu tidak boleh kosong";
                }else{
                    if (!is_numeric(cek_input($_POST["noibu"]))) {
                        $error_noibu="No Ibu hanya terdiri dari angka!";
                    }else{
                        $noibu = cek_input($_POST["noibu"]);
                    }
                }

                if ($_POST["kerjaayah"]=="p"){
                    $error_kerjaayah = "Kerja Ayah tidak boleh kosong";
                }else{
                    $kerjaayah = cek_input($_POST["kerjaayah"]);
                }

                if ($_POST["kerjaibu"]=="pp"){
                    $error_kerjaibu = "Kerja Ibu tidak boleh kosong";
                }else{
                    $kerjaibu = cek_input($_POST["kerjaibu"]);
                }
            }
            include "koneksi.php";
            if (!empty($namalengkap)&&!empty($namapanggil)&&!empty($jk)&&!empty($nik)&&!empty($tempat)&&!empty($tgllahir)&&!empty($ayah)&&!empty($ibu)&&!empty($nikayah)&&!empty($nikibu)&&!empty($umurayah)&&!empty($umuribu)&&!empty($kerjaayah)&&!empty($kerjaibu)&&!empty($alamat)&&!empty($noayah)&&!empty($noibu)) {
                $sql = "INSERT INTO balita VALUES ('$nik', '$namalengkap','$namapanggil','$jk', '$tempat','$tgllahir','$ayah','$nikayah', '$ibu', '$nikibu','$umurayah','$umuribu','$kerjaayah','$kerjaibu','$alamat','$noayah','$noibu');";
                if (mysqli_query($conn, $sql)) {
                    echo "<script> 
                        alert('Data berhasil dimasukkan!');
                        document.location.href = '1.html';
                        </script>";
                }else{
                    echo "Gagal".mysqli_error($conn);
                }
            }
            mysqli_close($conn);

            function cek_input ($data){  
                $data = trim ($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            ?>

            <div class="row" style="background-color:rgba(152,251,152,0.5); height: 100%; padding-bottom: 50px; padding-top: 50px;">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="background-color: #2E8B57; color: white;">
                            <h2><center><b> FORM PENDAFTARAN POSYANDU </b></center></h2>
                        </div>
                        <br>
                        <h4><center> DATA BALITA </center></h4>
                        <div class="card-body">
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                <div class="form-group row">
                                    <label for="namalengkap" class="col-sm-2 col-form-label">
                                        1. Nama Lengkap 
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="namalengkap" class="form-control <?php echo ($error_namalengkap !="" ? "is-invalid" : ""); ?>" id="namalengkap" placeholder="Nama Lengkap" value="<?php echo $namalengkap; ?>">
                                        <span class="warning">
                                            <?php echo $error_namalengkap;?>        
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="namapanggil" class="col-sm-2 col-form-label">
                                        2. Nama Panggilan 
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="namapanggil" class="form-control <?php echo($error_namapanggil !="" ? "is-invalid" : ""); ?>" id="namapanggil" placeholder="Nama Panggilan" value="<?php echo $namapanggil; ?>">
                                        <span class="warning">
                                            <?php echo $error_namapanggil; ?>       
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="jk" class="col-sm-2 col-form-label">
                                        3. Jenis Kelamin 
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="radio" name="jk" value="Laki-laki" <?php if($jk=='Laki-laki'){echo 'checked';}?>/> Laki-laki 
                                            &nbsp &nbsp
                                        <input type="radio" name="jk" value="Perempuan" <?php if($jk=='Perempuan'){echo 'checked';}?>/> Perempuan 
                                            &nbsp &nbsp
                                        <span class="warning">
                                            <?php echo $error_jk; ?>        
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="nik" class="col-sm-2 col-form-label">
                                        4. NIK 
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nik" class="form-control <?php echo($error_nik !="" ? "is-invalid" : ""); ?>" id="nik" placeholder="NIK" value="<?php echo $nik; ?>">
                                        <span class="warning">
                                        <?php echo $error_nik; ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="tempat" class="col-sm-2 col-form-label">
                                        5. Tempat Lahir 
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="tempat" class="form-control <?php echo($error_tempat !="" ? "is-invalid" : ""); ?>" id="tempat" placeholder="Tempat Lahir" value="<?php echo $tempat; ?>">
                                        <span class="warning">
                                            <?php echo $error_tempat; ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="tgllahir" class="col-sm-2 col-form-label">
                                        6. Tanggal Lahir 
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="date" name="tgllahir" class="form-control <?php echo($error_tgllahir !="" ? "is-invalid" : ""); ?>" id="tgllahir" placeholder="Tanggal Lahir" value="<?php echo $tgllahir; ?>">
                                        <span class="warning">
                                            <?php echo $error_tgllahir; ?>
                                        </span>
                                    </div>
                                </div>
                                <br><hr>

                                <h4><center> DATA ORANG TUA / WALI </center></h4>
                                <br>
                                <div class="form-group row">
                                    <label for="ayah" class="col-sm-2 col-form-label">
                                        1. Nama Lengkap Ayah 
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="ayah" class="form-control <?php echo ($error_ayah !="" ? "is-invalid" : ""); ?>" id="ayah" placeholder="Nama Lengkap Ayah" value="<?php echo $ayah; ?>">
                                        <span class="warning">
                                            <?php echo $error_ayah;?>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="nikayah" class="col-sm-2 col-form-label"> 
                                        2. NIK Ayah 
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nikayah" class="form-control <?php echo($error_nikayah !="" ? "is-invalid" : ""); ?>" id="nikayah" placeholder="NIK Ayah" value="<?php echo $nikayah; ?>">
                                        <span class="warning">
                                            <?php echo $error_nikayah; ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="ibu" class="col-sm-2 col-form-label"> 
                                        3. Nama Lengkap Ibu 
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="ibu" class="form-control <?php echo($error_ibu !="" ? "is-invalid" : ""); ?>" id="ibu" placeholder="Nama Lengkap Ibu" value="<?php echo $ibu; ?>">
                                        <span class="warning">
                                            <?php echo $error_ibu; ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="nikibu" class="col-sm-2 col-form-label"> 
                                        4. NIK Ibu 
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nikibu" class="form-control <?php echo($error_nikibu !="" ? "is-invalid" : ""); ?>" id="nikibu" placeholder="NIK Ibu" value="<?php echo $nikibu; ?>">
                                        <span class="warning">
                                            <?php echo $error_nikibu; ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="umurayah" class="col-sm-2 col-form-label"> 
                                        5. Umur Ayah 
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="umurayah" class="form-control <?php echo($error_umurayah !="" ? "is-invalid" : ""); ?>" id="umurayah" placeholder="Umur Ayah" value="<?php echo $umurayah; ?>">
                                        <span class="warning">
                                            <?php echo $error_umurayah; ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="umuribu" class="col-sm-2 col-form-label"> 
                                        4. Umur Ibu 
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="umuribu" class="form-control <?php echo($error_umuribu !="" ? "is-invalid" : ""); ?>" id="umuribu" placeholder="Umur Ibu" value="<?php echo $umuribu; ?>">
                                        <span class="warning">
                                            <?php echo $error_umuribu; ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="kerjaayah" class="col-sm-2 col-form-label"> 
                                        5. Pekerjaan Ayah 
                                    </label>
                                    <div class="col-sm-10">
                                        <select class="form-control <?php echo($error_kerjaayah !="" ?"is-invalid" : "");?>" name="kerjaayah">
                                            <option value="p" >Pekerjaan Ayah</option>
                                            <option value="Belum / Tidak Bekerja" <?php if ($kerjaayah=="Belum / Tidak Bekerja") { echo "selected=\"selected\""; } ?>>Belum / Tidak Bekerja</option>
                                            <option value="Mengurus Rumah Tangga" <?php if ($kerjaayah=="Mengurus Rumah Tangga") { echo "selected=\"selected\""; } ?>>Mengurus Rumah Tangga</option>
                                            <option value="Industri" <?php if ($kerjaayah=="Industri") { echo "selected=\"selected\""; } ?>>Industri</option>
                                            <option value="Pensiunan" <?php if ($kerjaayah=="Pensiunan") { echo "selected=\"selected\""; } ?>>Pensiunan</option>
                                            <option value="Pegawai Negeri Sipil" <?php if ($kerjaayah=="Pegawai Negeri Sipil") { echo "selected=\"selected\""; } ?>>Pegawai Negeri Sipil</option>
                                            <option value="Tentara Nasional Indonesia" <?php if ($kerjaayah=="Tentara Nasional Indonesia") { echo "selected=\"selected\""; } ?>>Tentara Nasional Indonesia</option>
                                            <option value="Kepolisian RI" <?php if ($kerjaayah=="Kepolisian RI") { echo "selected=\"selected\""; } ?>>Kepolisian RI</option>
                                            <option value="Perdagangan" <?php if ($kerjaayah=="Perdagangan") { echo "selected=\"selected\""; } ?>>Perdagangan</option>
                                            <option value="Petani / Pekebun" <?php if ($kerjaayah=="Petani / Pekebun") { echo "selected=\"selected\""; } ?>>Petani / Pekebun</option>
                                            <option value="Peternak" <?php if ($kerjaayah=="Peternak") { echo "selected=\"selected\""; } ?>>Peternak</option>
                                            <option value="Nelayan / Perikanan" <?php if ($kerjaayah=="Nelayan / Perikanan") { echo "selected=\"selected\""; } ?>>Nelayan / Perikanan</option>
                                            <option value="Karyawan Swasta" <?php if ($kerjaayah=="Karyawan Swasta") { echo "selected=\"selected\""; } ?>>Karyawan Swasta</option>
                                            <option value="Seniman" <?php if ($kerjaayah=="Seniman") { echo "selected=\"selected\""; } ?>>Seniman</option>
                                            <option value="Guru" <?php if ($kerjaayah=="Guru") { echo "selected=\"selected\""; } ?>>Guru</option>
                                            <option value="Dokter" <?php if ($kerjaayah=="Dokter") { echo "selected=\"selected\""; } ?>>Dokter</option>
                                        </select>
                                        <span class="warning">
                                            <?php echo $error_kerjaayah; ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="kerjaibu" class="col-sm-2 col-form-label"> 
                                        6. Pekerjaan Ibu 
                                    </label>
                                    <div class="col-sm-10">
                                        <select class="form-control <?php echo($error_kerjaibu !="" ?"is-invalid" : "");?>" name="kerjaibu">
                                            <option value="pp" >Pekerjaan Ibu</option>
                                            <option value="Belum / Tidak Bekerja" <?php if ($kerjaibu=="Belum / Tidak Bekerja") { echo "selected=\"selected\""; } ?>>Belum / Tidak Bekerja</option>
                                            <option value="Mengurus Rumah Tangga" <?php if ($kerjaibu=="Mengurus Rumah Tangga") { echo "selected=\"selected\""; } ?>>Mengurus Rumah Tangga</option>
                                            <option value="Industri" <?php if ($kerjaibu=="Industri") { echo "selected=\"selected\""; } ?>>Industri</option>
                                            <option value="Pensiunan" <?php if ($kerjaibu=="Pensiunan") { echo "selected=\"selected\""; } ?>>Pensiunan</option>
                                            <option value="Pegawai Negeri Sipil" <?php if ($kerjaibu=="Pegawai Negeri Sipil") { echo "selected=\"selected\""; } ?>>Pegawai Negeri Sipil</option>
                                            <option value="Tentara Nasional Indonesia" <?php if ($kerjaibu=="Tentara Nasional Indonesia") { echo "selected=\"selected\""; } ?>>Tentara Nasional Indonesia</option>
                                            <option value="Kepolisian RI" <?php if ($kerjaibu=="Kepolisian RI") { echo "selected=\"selected\""; } ?>>Kepolisian RI</option>
                                            <option value="Perdagangan" <?php if ($kerjaibu=="Perdagangan") { echo "selected=\"selected\""; } ?>>Perdagangan</option>
                                            <option value="Petani / Pekebun" <?php if ($kerjaibu=="Petani / Pekebun") { echo "selected=\"selected\""; } ?>>Petani / Pekebun</option>
                                            <option value="Peternak" <?php if ($kerjaibu=="Peternak") { echo "selected=\"selected\""; } ?>>Peternak</option>
                                            <option value="Nelayan / Perikanan" <?php if ($kerjaibu=="Nelayan / Perikanan") { echo "selected=\"selected\""; } ?>>Nelayan / Perikanan</option>
                                            <option value="Karyawan Swasta" <?php if ($kerjaibu=="Karyawan Swasta") { echo "selected=\"selected\""; } ?>>Karyawan Swasta</option>
                                            <option value="Seniman" <?php if ($kerjaibu=="Seniman") { echo "selected=\"selected\""; } ?>>Seniman</option>
                                            <option value="Guru" <?php if ($kerjaibu=="Guru") { echo "selected=\"selected\""; } ?>>Guru</option>
                                            <option value="Dokter" <?php if ($kerjaibu=="Dokter") { echo "selected=\"selected\""; } ?>>Dokter</option>
                                        </select>
                                        <span class="warning">
                                            <?php echo $error_kerjaibu; ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="alamat" class="col-sm-2 col-form-label"> 
                                        7. Alamat 
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="alamat" class="form-control <?php echo($error_alamat !="" ? "is-invalid" : ""); ?>" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>">
                                        <span class="warning">
                                            <?php echo $error_alamat; ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="noayah" class="col-sm-2 col-form-label"> 
                                        8. No. Telepon Ayah 
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="noayah" class="form-control <?php echo($error_noayah !="" ? "is-invalid" : ""); ?>" id="noayah" placeholder="Nomor Telepon Ayah" value="<?php echo $noayah; ?>">
                                        <span class="warning">
                                            <?php echo $error_noayah; ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="noibu" class="col-sm-2 col-form-label"> 
                                        9. No. Telepon Ibu 
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="noibu" class="form-control <?php echo($error_noibu !="" ? "is-invalid" : ""); ?>" id="noibu" placeholder="Nomor Telepon Ibu" value="<?php echo $noibu; ?>">
                                        <span class="warning">
                                            <?php echo $error_noibu; ?>
                                        </span>
                                    </div>
                                </div>
                                <br>
                                <h5><font color="red"> NB : MOHON DATA DIISI SESUAI DENGAN KTP DAN AKTA LAHIR </font></h5>
                                <br>
                                <button type="daftar" class="btn btn-primary">
                                    DAFTAR 
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer">
            <font color="white">Copyright &#169; 2020 SI-PANDU</font>
        </div>
    </div>
</body>
</html>