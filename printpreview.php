<?php
include "koneksi.php";
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$nik=$_GET['nik'];
$sql="SELECT * FROM balita WHERE nik='$nik'";
$query=mysqli_query($conn, $sql);
$cek=mysqli_num_rows($query);
if ($cek>0) {
	$html = '<html>
			<head>
			<script type="text/javascript" src="Chart.js"></script>
			</head>
			<body>
				<center>
					<h3>LAPORAN PEMERIKSAAN POSYANDU TANJUNG 1</h3>
				</center>
			<hr><br>';
	while ($row=mysqli_fetch_array($query)) {
		$html.='<table style="width:50%">
	                <tr>
	                    <td>NIK</td>
	                    <td style="padding-left: 1cm;">'.$row['nik'].'</td>
	                </tr>
	                <tr>
	                    <td>Nama</td>
	                    <td style="padding-left: 1cm;">'.$row['namalengkap'].' / '.$row['namapanggil'].'</td>
	                </tr>
	                <tr>
	                    <td>Tempat, Tanggal Lahir</td>
	                    <td style="padding-left: 1cm;">'.$row['tempat'].', ';       
	    $tgl=$row['tgllahir'];
	    $ttl=date("d F Y",strtotime($tgl)); 
	    $html.=$ttl.'</td>
	                </tr>
	                <tr>
	                    <td>Umur</td>
	                    <td style="padding-left: 1cm;">';
	    $date=date("Y-m-d");
	    $tgl=$row['tgllahir'];
	    $lahir=strtotime($tgl);
	    $now=strtotime($date);
	    $bln=(date("Y",$now)-date("Y",$lahir))*12;
	    $bln+= date("m",$now)-date("m",$lahir);
	    $html.=$bln.' Bulan</td>
	                </tr>
	            </table>';
	}
	$sql= "SELECT * FROM cek WHERE nik='$nik' ORDER BY bulan ASC";
	$query = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($query)){
        $berat[] = $row['berat'];
        $tinggi[] = $row['tinggi'];
        $bulan[]=$row['bulan'];
    }
    $html.="<script>
				var ctx = document.getElementById('Chart-line').getContext('2d');
				var myChart = new Chart(ctx, {
					type: 'line',
					data: {
						labels: <?php echo json_encode($bulan); ?>,
						datasets: [{
							label: 'Grafik Tinggi Badan (cm)',
							data: <?php echo json_encode($tinggi); ?>,
							backgroundColor: 'rgba(220, 20, 60, 0)',
							borderColor: 'rgba(220, 20, 60,1)',
							borderWidth: 3
						}, {
							label: 'Grafik Berat Badan (kg)',
							data: <?php echo json_encode($berat); ?>,
							backgroundColor: 'rgba(70, 130, 180, 0)',
							borderColor: 'rgba(70, 130, 180,1)',
							borderWidth: 3
						}]
					},
					options: {
						scales: {
							yAxes: [{
								ticks: {
									beginAtZero:true
								}
							}]
						}
					}
				});
			</script>";
    $html.="<div style='background-color: white; margin-left: 10%; margin-right: 10%;'>
                <canvas id='Chart-line' style='width: 80%;'></canvas>
            </div>
            <br><br>";
}else{
	$sql="SELECT * FROM ibuhamil WHERE nik='$nik'";
$query=mysqli_query($conn, $sql);
$html = '<html>
			<head>
			</head>
			<body>
				<center>
					<h3>LAPORAN PEMERIKSAAN POSYANDU TANJUNG 1</h3>
				</center>
			<hr><br>';
	while ($row=mysqli_fetch_array($query)) {
		$html.='<table style="width:50%">
	                <tr>
	                    <td>NIK</td>
	                    <td style="padding-left: 1cm;">'.$row['nik'].'</td>
	                </tr>
	                <tr>
	                    <td>Nama</td>
	                    <td style="padding-left: 1cm;">'.$row['namalengkap'].'</td>
	                </tr>
	                <tr>
	                    <td>Tempat, Tanggal Lahir</td>
	                    <td style="padding-left: 1cm;">'.$row['tempat'].', ';       
	    $tgl=$row['tgllahir'];
	    $ttl=date("d F Y",strtotime($tgl)); 
	    $html.=$ttl.'</td>
	                </tr>
	                <tr>
	                    <td>Umur</td>
	                    <td style="padding-left: 1cm;">';
	    $date=date("Y-m-d");
	    $tgl=$row['tgllahir'];
	    $lahir=strtotime($tgl);
	    $now=strtotime($date);
	    $bln=(date("Y",$now)-date("Y",$lahir))*12;
	    $bln+= date("m",$now)-date("m",$lahir);
	    $thn=floor($bln/12);
	    $html.=$thn.' Tahun</td>
	                </tr>
	            </table>';
	}
}
$html .= "</table>";
$html .= "</body></html>";
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'potrait');
$dompdf->render();
$dompdf->stream('Laporan Preview.pdf');
?>