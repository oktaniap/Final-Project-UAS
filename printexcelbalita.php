<?php
include "koneksi.php";
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$tgl=$_GET['tgl'];
$tanggal=date("d F Y", strtotime($tgl));
$sheet->setCellValue('A1','LAPORAN DATA BALITA POSYANDU '.$tanggal);
$sheet->setCellValue('A2','No');
$sheet->setCellValue('B2','NIK');
$sheet->setCellValue('C2','Nama');
$sheet->setCellValue('D2','Tempat, Tanggal Lahir');
$sheet->setCellValue('E2','Umur');
$sheet->setCellValue('F2','Berat Badan');
$sheet->setCellValue('G2','Tinggi Badan');
$sheet->setCellValue('H2','Imunisasi');

$query = mysqli_query($conn, "SELECT a.tgl , a.nik, b.namalengkap, b.tempat, b.tgllahir, a.bulan, a.berat, a.tinggi, a.obat FROM cek a JOIN balita b ON a.nik=b.nik WHERE a.tgl='$tgl'");
$i = 3;
$no = 1;
while($row = mysqli_fetch_array($query))
{
	$sheet->setCellValue('A'.$i, $no++);
	$sheet->setCellValue('B'.$i, $row['nik']);
	$sheet->setCellValue('C'.$i, $row['namalengkap']);
	$tgl=$row['tgllahir'];
    $ttl=date("d F Y",strtotime($tgl));
	$sheet->setCellValue('D'.$i, $row['tempat'].', '.$ttl);
	$sheet->setCellValue('E'.$i, $row['bulan']." bulan");
	$sheet->setCellValue('F'.$i, $row['berat']." kg");
	$sheet->setCellValue('G'.$i, $row['tinggi']." cm");
	$sheet->setCellValue('H'.$i, $row['obat']);
	$i++;
}
$styleArray = [
	'borders' => [
		'allBorders' => [
			'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
		],
	],
];
$i = $i - 1;
$sheet->getStyle('A2:H'.$i)->applyFromArray($styleArray);
$writer = new Xlsx($spreadsheet);
$writer->save('Laporan Balita.xlsx');
echo "<script>
		alert('Berhasil didownload!');
        document.location.href = 'laporanbalita.php';
      </script>";
?>