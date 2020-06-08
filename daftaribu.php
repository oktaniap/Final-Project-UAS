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
            $error_nik = "";
            $error_tempat = "";
            $error_tgllahir = "";
            $error_alamat = "";
            $error_nomor = "";
            $error_pekerjaan = "";

            $namalengkap = "";
            $nik = "";
            $tempat = "";
            $tgllahir = "";
            $alamat = "";
            $nomor = "";
            $pekerjaan = "";

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


                if (empty($_POST["alamat"])){
                    $error_alamat = "Alamat tidak boleh kosong";
                }else{
                    $alamat = cek_input($_POST["alamat"]);
                }


                if (empty($_POST["nomor"])){
                    $error_nomor = "Nomor Telepon tidak boleh kosong";
                }else{
                    if (!is_numeric(cek_input($_POST["nomor"]))) {
                        $error_nomor="Nomor Telepon hanya terdiri dari angka!";
                    }else{
                        $nomor = cek_input($_POST["nomor"]);
                    }
                }

                if ($_POST["pekerjaan"]=="p"){
                    $error_pekerjaan = "Pekerjaan tidak boleh kosong";
                }else{
                        $pekerjaan = cek_input($_POST["pekerjaan"]);
                }
            }
            include "koneksi.php";
            if (!empty($namalengkap)&&!empty($nik)&&!empty($tempat)&&!empty($tgllahir)&&!empty($alamat)&&!empty($nomor)&&!empty($pekerjaan)) {
                $sql = "INSERT INTO ibuhamil VALUES ('$nik', '$namalengkap','$tempat','$tgllahir','$alamat','$nomor','$pekerjaan');";
                if (mysqli_query($conn, $sql)) {
                    echo "<script> 
                    alert('Data berhasil dimasukkan!');
                    document.location.href = '2.html';
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
                        <h4><center> DATA IBU HAMIL </center></h4>
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
                                    <label for="nik" class="col-sm-2 col-form-label"> 
                                        2. NIK 
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
                                        3. Tempat Lahir 
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
                                        4. Tanggal Lahir 
                                    </label>
                                        <div class="col-sm-10">
                                        <input type="date" name="tgllahir" class="form-control <?php echo($error_tgllahir !="" ? "is-invalid" : ""); ?>" id="tgllahir" placeholder="YYYY-MM-DD" value="<?php echo $tgllahir; ?>">
                                        <span class="warning">
                                            <?php echo $error_tgllahir; ?>
                                        </span>
                                        </div>
                                </div>

                                <div class="form-group row">
                                    <label for="alamat" class="col-sm-2 col-form-label"> 
                                        5. Alamat 
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="alamat" class="form-control <?php echo($error_alamat !="" ? "is-invalid" : ""); ?>" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>">
                                        <span class="warning">
                                            <?php echo $error_alamat; ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="nomor" class="col-sm-2 col-form-label"> 
                                        6. Nomor Telepon  
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nomor" class="form-control <?php echo($error_nomor !="" ? "is-invalid" : ""); ?>" id="nomor" placeholder="Nomor Telepon" value="<?php echo $nomor; ?>">
                                        <span class="warning">
                                            <?php echo $error_nomor; ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="pekerjaan" class="col-sm-2 col-form-label"> 
                                        7. Pekerjaan 
                                    </label>
                                    <div class="col-sm-10">
                                        <select class="form-control <?php echo($error_pekerjaan !="" ?"is-invalid" : "");?>" name="pekerjaan">
                                            <option value="p" >Pekerjaan</option>
                                            <option value="Belum / Tidak Bekerja" <?php if ($pekerjaan=="Belum / Tidak Bekerja") { echo "selected=\"selected\""; } ?>>Belum / Tidak Bekerja</option>
                                            <option value="Mengurus Rumah Tangga" <?php if ($pekerjaan=="Mengurus Rumah Tangga") { echo "selected=\"selected\""; } ?>>Mengurus Rumah Tangga</option>
                                            <option value="Industri" <?php if ($pekerjaan=="Industri") { echo "selected=\"selected\""; } ?>>Industri</option>
                                            <option value="Pensiunan" <?php if ($pekerjaan=="Pensiunan") { echo "selected=\"selected\""; } ?>>Pensiunan</option>
                                            <option value="Pegawai Negeri Sipil" <?php if ($pekerjaan=="Pegawai Negeri Sipil") { echo "selected=\"selected\""; } ?>>Pegawai Negeri Sipil</option>
                                            <option value="Tentara Nasional Indonesia" <?php if ($pekerjaan=="Tentara Nasional Indonesia") { echo "selected=\"selected\""; } ?>>Tentara Nasional Indonesia</option>
                                            <option value="Kepolisian RI" <?php if ($pekerjaan=="Kepolisian RI") { echo "selected=\"selected\""; } ?>>Kepolisian RI</option>
                                            <option value="Perdagangan" <?php if ($pekerjaan=="Perdagangan") { echo "selected=\"selected\""; } ?>>Perdagangan</option>
                                            <option value="Petani / Pekebun" <?php if ($pekerjaan=="Petani / Pekebun") { echo "selected=\"selected\""; } ?>>Petani / Pekebun</option>
                                            <option value="Peternak" <?php if ($pekerjaan=="Peternak") { echo "selected=\"selected\""; } ?>>Peternak</option>
                                            <option value="Nelayan / Perikanan" <?php if ($pekerjaan=="Nelayan / Perikanan") { echo "selected=\"selected\""; } ?>>Nelayan / Perikanan</option>
                                            <option value="Karyawan Swasta" <?php if ($pekerjaan=="Karyawan Swasta") { echo "selected=\"selected\""; } ?>>Karyawan Swasta</option>
                                            <option value="Seniman" <?php if ($pekerjaan=="Seniman") { echo "selected=\"selected\""; } ?>>Seniman</option>
                                            <option value="Guru" <?php if ($pekerjaan=="Guru") { echo "selected=\"selected\""; } ?>>Guru</option>
                                            <option value="Dokter" <?php if ($pekerjaan=="Dokter") { echo "selected=\"selected\""; } ?>>Dokter</option>
                                        </select>
                                        <span class="warning">
                                            <?php echo $error_pekerjaan; ?>
                                        </span>
                                    </div>
                                </div>
                                <br>
                                <h5><font color="red"> NB : MOHON DATA DIISI SESUAI DENGAN KTP </font></h5>
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