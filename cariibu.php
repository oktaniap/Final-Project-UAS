<!DOCTYPE html>
<html>
<head>
    <title>SI-PANDU</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <style type="text/css">
        #cari{
            border-collapse: collapse;
            width: 100%;
            font-size: 17px;
        }
        #cari td, #cari th{
            border: 1px solid #ddd;
            padding: 15px;
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
            <nav>
                <ul>
                    <li><a href="index.php" style="font-size: 18px;"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="lokasi.html" style="font-size: 18px;"><i class="fas fa-globe"></i> Lokasi</a></li>
                    <li><a href="cari.html" style="font-size: 18px;"><i class="fas fa-search"></i> Cari Data</a></li>
                    <li style="float: right;"><a href="login.html" style="font-size: 18px;"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                </ul>
            </nav>
            <img src="logo.png" width="140px" class="posyandu">
            <img src="waru.png" width="140px" class="waru">
            <img src="judul.png" width="700px" class="judul">
            <marquee bgcolor=#66CDAA><b>SELAMAT DATANG DI WEBSITE SISTEM INFORMASI POSYANDU TANJUNG 1 PEPELEGI WARU SIDOARJO</b></marquee>
        </div>
        <div id="isi" style="height:100%; width:100%; float:left; padding-top: 50px; padding-bottom: 50px; text-align: center;">
            <div style="background-color:rgba(152,251,152,0.5); height: 100%; padding-bottom: 50px; text-align: center;"><br><br>
                <form action="cariibu.php" method="get">
                    <b style="font-size: 30px;">MASUKAN NIK / NAMA IBU HAMIL</b><br><br>
                    <input type="text" name="cari" style="font-size: 23px; border-radius: 4px;"><br><br>
                    <button type="submit" class="btn btn-primary">CARI</button>
                </form>
                <div style="text-align: center;">
                <?php 
                include "koneksi.php";
                if(isset($_GET['cari'])){
                    if ($_GET['cari']=="") {
                        echo "";
                    }else{
                        $cari = $_GET['cari'];
                        $sql="SELECT * FROM ibuhamil WHERE nik='$cari' OR namalengkap LIKE '%".$cari."%'";
                        $data = mysqli_query($conn, $sql);
                        $cek = mysqli_num_rows($data);
                        if ($cek > 0) {
                            $no=1;
                            ?>
                            <br><br>
                            <table id="cari" border="1">
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Tempat,&nbspTanggal&nbspLahir</th>
                                    <th></th>
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
                                        <td><button class="btn btn-primary" onclick="window.location.href='previewinfo.php?preview=1&nik=<?php echo $row['nik'];?>'">PREVIEW DATA</button></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table><br><br>
                            <?php
                        }else{
                            ?>
                            <br><br>
                            <font style="font-size: 17px; font-weight: bold;">DATA TIDAK DITEMUKAN</font>
                            <br><br> 
                            <?php
                        }
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