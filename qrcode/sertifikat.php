<?php
session_start();
//if (!isset($nim) && empty($nim)) {
//	echo "Akses langsung ditolak!";
//	return 0;
//}
//include "../config/koneksi.php";
$dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");
define('FPDF_FONTPATH','fpdf/font/');
//require('fpdf/fpdf_protection.php');
require('fpdf/fpdf.php');
//require('bar128.php');
$bg = array("bendahara1_1.png","bendahara1_2.png","bendahara1_3.png",
										"bendahara1_4.png");
srand(time());
$random = (rand()%4);
$ttd=$bg[$random];

$tanggal=date("d M Y",time());

class PDF extends FPDF {
var $col=0;
var $y0;
var $lebar=19;
var $total=14.5;
var $kiri=2.75;

	function Header() {
/*
		$this->Image('../icon/logo_icomcos2020.jpg',1.8,1.2,3);
		$this->Image('../icon/unair.jpg',25.2,1.2,3);
		$this->SetFont('Arial','B',10);
		$this->SetTextColor(0,0,0);
		$this->Cell(1.9,0,'',0,0);
		$this->Cell(23.5,1,'C O M M I T T E E',0,0,'C');
		$this->Ln(0.5);
		$this->Cell(1.9,0,'',0,0);
		$this->Cell(23.5,1,'International Conference on Mathematics, Computational Sciences and Statistics 2020',0,0,'C');
		$this->Ln(0.5);
		$this->Cell(1.9,0,'',0,0);
		$this->Cell(23.5,1,'(ICoMCoS-2020)',0,0,'C');
		$this->Ln(0.5);
		$this->Cell(1.9,0,'',0,0);
		$this->Cell(23.5,1,'Department of Mathematics',0,0,'C');
		$this->Ln(0.5);
		$this->Cell(1.9,0,'',0,0);
		$this->Cell(23.5,1,'Faculty of Science and Technology',0,0,'C');
		$this->Ln(0.5);
		$this->Cell(1.9,0,'',0,0);
		$this->Cell(23.5,1,'Universitas Airlangga',0,0,'C');
		$this->Ln(0.5);
		$this->Cell(1.9,0,'',0,0);
		$this->Cell(20.5,1,'Kampus C, Mulyorejo Surabaya (60115), Telephone. +62(031)5936501, +62(031)5936502;
Fax. +62(031)5936502; Email : ',0,0,'C');
		$this->SetTextColor(0,0,255);
//		$this->Ln(0.5);
//		$this->Cell(1.9,0,'',0,0);
		$this->Cell(4,1,'icomcos@fst.unair.ac.id',0,0,'R');
		$this->SetTextColor(0,0,0);
		$this->Ln(1);
		*/
	}
	function Footer() {
/*
		$this->SetY(-1.5);
		$this->SetFont('Arial','I',8);
		$this->Cell(0,1,'Page '.$this->PageNo().'/{nb}',0,0,'L');
		$tanggal=date("d M Y",time());
		$this->SetFont('Arial','',10);
		$this->Cell(0,1,'printed date : '.$tanggal,0,0,'R');
		*/
	} 
}
$pdf=new PDF('L','cm','A4');
//$pdf=new FPDF_Protection('P','cm','A4');
//$pdf-> SetProtection(array('print'));
$pdf->Open();
$pdf->AliasNbPages();
$pdf->AddPage();
$lebar=19;
$total=16.5;
$left=2;
$kiri=($lebar-$total)/2;

$sql = mysqli_query($dbconnect, "SELECT a.firstname,a.lastname,a.title,a.idmd5,a.id FROM sertifikat a WHERE a.id=$_GET[idqr]");
while ($rw=mysqli_fetch_row($sql)) {
	$nm=$rw[0]." ".$rw[1];
	$tt=$rw[2];
	$qr=100+$rw[4]."png";
//	$pdf->SetFont('Arial','BU',12);
	$pdf->Image('./certificatefinal.png',18,13,5);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(27.8,0,'',1,0);
	$pdf->Ln(0.5);
	$pdf->Cell(2.5,0,'',0,0);
	$pdf->Cell(23.5,0,$nm,0,0,'C');
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(2.5,0,'',0,0);
	$pdf->Cell(23.5,0,$tt,0,0,'C');
	$pdf->Ln();
	$pdf->Image('./$qr',18,13,5);
	$pdf->Ln(1);
	$pdf->Ln();
}
mysqli_close($dbconnect);	
$pdf->Ln();
$pdf->Output($file,true);
?> 