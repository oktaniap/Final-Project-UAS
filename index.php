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
            font-size: 17px;
            width: 70%;
            margin-right: 7%;
        }
        #cari td, #cari th{
            border: 1px solid black;
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
            <marquee bgcolor="#66CDAA"><b>SELAMAT DATANG DI WEBSITE SISTEM INFORMASI POSYANDU TANJUNG 1 PEPELEGI WARU SIDOARJO</b></marquee>
        </div>
        <div id="isi" style="height:100%; width:100%; float:left; padding-top: 30px; padding-bottom: 30px;">
            <div style="float:left; background-color:  rgba(143,188,143,0.5); width: 600px; height:400px; padding-bottom: 10px">
            <h2 style="padding-top: 10px; padding-left: 20px; letter-spacing: 0.1cm;">FOTO KEGIATAN</h2>
            <div style="padding-top: 20px; padding-left: 40px;">
                  <img class="slideshow" src="1.jpg">
                  <img class="slideshow" src="2.jpeg">
                  <img class="slideshow" src="3.jpeg">
                  <img class="slideshow" src="4.jpeg">
                  <img class="slideshow" src="5.jpeg">
            </div>
            </div>
            <div style="float: right; background-color: rgba(143,188,143,0.5); width: 600px;height:400px; padding-bottom: 10px">
                <h2 style="padding-top: 10px; padding-right: 20px;text-align: right; letter-spacing: 0.1cm;">JUMLAH ANGGOTA</h2>
                <br>
                <br>
                <h5 style="margin-left: 5%; margin-right: 2%">Jumlah anggota yang terdaftar pada website Posyandu Tanjung 1 (SI-PANDU) adalah:</h5>
                <br><br>
                <div style="padding-top: 20px; padding-left: 40px;">
                    <?php
                    include "koneksi.php";
                    $sql="SELECT count(nik) FROM balita";
                    $query=mysqli_query($conn,$sql);
                    while ($row=mysqli_fetch_array($query)){
                        $balita=$row[0];
                    }
                    $sql="SELECT count(nik) FROM ibuhamil";
                    $query=mysqli_query($conn,$sql);
                    while ($row=mysqli_fetch_array($query)){
                        $ibuhamil=$row[0];
                    }
                    $sql="SELECT count(username) FROM kader";
                    $query=mysqli_query($conn,$sql);
                    while ($row=mysqli_fetch_array($query)){
                        $kader=$row[0];
                    }
                    ?>
                    <center><table id="cari">
                        <tr>
                            <th>KADER</th>
                            <th>BALITA</th>
                            <th>IBU HAMIL</th>
                        </tr>
                        <tr>
                            <td><?php echo $kader." orang";?></td>
                            <td><?php echo $balita." orang";?></td>
                            <td><?php echo $ibuhamil." orang";?></td>
                        </tr>
                    </table></center>
                </div>
                <div style="padding-right: 50px;"></div>
            </div>
            <br>
            <script>
                var myIndex = 0;
                carousel();

                function carousel() {
                    var i;
                    var x = document.getElementsByClassName("slideshow");
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = "none";  
                    }

                    myIndex++;
                    if (myIndex > x.length) {myIndex = 1}    
                    x[myIndex-1].style.display = "block";  
                    setTimeout(carousel, 5000); 
                }
            </script>
        </div>
        <div id="footer">
            <font color="white">Copyright &#169; 2020 SI-PANDU</font>
        </div>
    </div>
</body>
</html>