<?php
include "koneksi.php";
$username = $_POST['username'];
$password = ($_POST['password']);
$sql = "SELECT * FROM kader WHERE username='$username' AND password='$password'";
$query=mysqli_query($conn,$sql);
$cek = mysqli_num_rows($query);
if($cek > 0){
	echo "<script> 
            alert('Login Berhasil!');
            document.location.href = 'kehadiran.php';
        </script>";
}else{
	echo "<script> 
            alert('Login Gagal!');
            document.location.href = 'login.html';
        </script>";
}
?>