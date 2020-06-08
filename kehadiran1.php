<?php
include "koneksi.php";
date_default_timezone_set("asia/jakarta");
$date=date("Y-m-d");
if ($_GET['hadir']==1) {
	$nik=$_GET['nik'];
	$nama=$_GET['nama'];
	$sql="SELECT * FROM kehadiran WHERE nik='$nik' AND tanggal='$date'";
	$query = mysqli_query($conn, $sql);
    $absen = mysqli_num_rows($query);
	if ($absen==0) {
		$sql="INSERT INTO kehadiran (tanggal, nik) VALUES ('$date', '$nik')";
		if (mysqli_query($conn, $sql)) {
			echo "<script> 
	            alert('Berhasil mengabsen ".$nik." / ".$nama."');
	            document.location.href = 'kehadiran.php';
	        </script>";
		}else{
			echo "Gagal".mysqli_error($conn);
		}	
	}else{
		echo "<script> 
	            alert('".$nik." / ".$nama." sudah terabsen!');
	            document.location.href = 'kehadiran.php';
	        </script>";	
	}
}
?>