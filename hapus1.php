<?php
include "koneksi.php";
if ($_GET['hapus']==1) {
	$nik = $_GET['nik'];
	$sql="DELETE FROM ibuhamil WHERE nik='$nik'";
	if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Data Profil ".$nik." berhasil dihapus!')
        document.location.href='edit.php';</script>";
    }else{
        echo "<script>alert('Data Profil ".$nik." gagal dihapus!')
        document.location.href='edit.php';</script>";
    }
}
?>