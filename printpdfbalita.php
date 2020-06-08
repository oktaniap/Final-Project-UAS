<?php
include "koneksi.php";
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$tgl=$_GET['tgl'];
$sql = "SELECT a.tgl , a.nik, b.namalengkap, b.tempat, b.tgllahir, a.bulan, a.berat, a.tinggi, a.obat FROM cek a JOIN balita b ON a.nik=b.nik WHERE a.tgl='$tgl'";
$query = mysqli_query($conn, $sql);
$tanggal = date("d F Y",strtotime($tgl));
$html = '<html>
		<head>
			<style type="text/css">
		        #cari{
		            border-collapse: collapse;
		            font-size: 17px;
		            width:100%;
		        }
		        #cari td, #cari th{
		            border: 1px solid black;
		            padding: 7px;
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
			<center>
				<h3>LAPORAN POSYANDU TANGGAL '.$tanggal.'</h3>
			</center>
		<hr><br>';
$html .= '<table id="cari">
 <tr>
 <th style="width:4%;">No</th>
 <th style="width:10%;">NIK</th>
 <th>Nama</th>
 <th>Tempat, Tanggal Lahir</th>
 <th style="width:7%;">Umur</th>
 <th style="width:10%;">Berat Badan</th>
 <th style="width:10%;">Tinggi Badan</th>
 <th style="width:10%;">Imunisasi</th>
 </tr>';
$no = 1;
while ($row = mysqli_fetch_array($query)) {
	$html .= "<tr>
	<td style='text-align:center;'>".$no++."</td>
	<td>".$row['nik']."</td>
	<td>".$row['namalengkap']."</td>
	<td style='text-align:center;'>".$row['tempat'];
	$ttl=date('d F Y',strtotime($row['tgllahir']));
	$html .= ", ".$ttl."</td>
	<td style='text-align:center;'>".$row['bulan']." bulan </td>
	<td style='text-align:center;'>".$row['berat']." kg</td>
	<td style='text-align:center;'>".$row['tinggi']." cm</td>
	<td>".$row['obat']."</td>
	</tr>";
}
$html .= "</table>";
$html .= "</body></html>";
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream('Laporan Balita.pdf');
?>