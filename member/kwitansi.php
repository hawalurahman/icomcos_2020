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
	}

	function Footer() {
		$this->SetY(-1.5);
		$this->SetFont('Arial','I',8);
		$this->Cell(0,1,'Page '.$this->PageNo().'/{nb}',0,0,'L');
		$tanggal=date("d M Y",time());
		$this->SetFont('Arial','',10);
		$this->Cell(0,1,'printed date : '.$tanggal,0,0,'R');
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

$sql = mysqli_query($dbconnect, "SELECT a.iduser,a.nmdepan,a.nmtengah,a.nmakhir,b.kdpeserta,b.kwketerangan,b.kwjumlah,b.kwrupiah,b.kwmtuang,b.filekwitansi,b.tglkwitansi,a.instansi,b.kwnomor FROM (user a left join peserta b on a.iduser=b.iduser) WHERE a.iduser='$_GET[id]' and b.thnsnma=$_SESSION[thnsnma] and (b.statusbayar=1)");
while ($rw=mysqli_fetch_row($sql)) {
	$nm=$rw[1]." ".$rw[3]." (".$rw[4].")";
	$kd=$rw[4];
	$ket=$rw[5];
	$rp=$rw[7];
	$mtuang=$rw[8];
	$file=$rw[9];
	$tgl=$rw[10];
	$instansi=$rw[11];
	if ($mtuang=='US'){
		$jlh=$rw[6]." US Dollars (USD ".$rw[7].")";
	}elseif ($mtuang=='Rp'){
		$jlh=$rw[6]." Rupiah (IDR ".$rw[7].")";
	}
	$nomor=$rw[12];
//	$pdf->SetFont('Arial','BU',12);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(27.8,0,'',1,0);
	$pdf->Ln(0.5);
	$pdf->Cell(2.5,0,'',0,0);
	$pdf->Cell(23.5,0,'No. '.$nomor,0,0,'R');
	$pdf->Ln();
	$pdf->SetFont('Arial','B',13);
	$pdf->Cell(2.5,0,'',0,0);
	$pdf->Cell(23.5,1,'RECEIPT',0,0,'C');
	$pdf->Ln();
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(2.5,0,'',0,0);
	$pdf->Cell(23.5,0,'Surabaya, '.$tgl,0,0,'R');
	$pdf->Ln();
	$pdf->Ln(1);
	$pdf->Cell($left,0,'',0,0);
	$pdf->Cell(3.5,0.7,'Name',0,0,'L');
	$pdf->Cell(1,0.7,':',0,0,'R');
	$pdf->Cell(8,0.7,$nm,0,0,'L');
	$pdf->Ln();
	$pdf->Cell($left,0,'',0,0);
	$pdf->Cell(3.5,0.7,'Address',0,0,'L');
	$pdf->Cell(1,0.7,':',0,0,'R');
	$pdf->Cell(8,0.7,$instansi,0,0,'L');
	$pdf->Ln();
	$pdf->Cell($left,0,'',0,0);
	$pdf->Cell(3.5,0.7,'Amount',0,0,'L');
	$pdf->Cell(1,0.7,':',0,0,'R');
	$pdf->Cell(10,0.7,$jlh,0,0,'L');
	$pdf->Ln();
	$pdf->Cell($left,0,'',0,0);
	$pdf->Cell(3.5,0.7,'Description',0,0,'L');
	$pdf->Cell(1,0.7,':',0,0,'R');
	$pdf->Cell(10,0.7,'Registration Fee INTERNATIONAL CONFERENCE on MATHEMATICS',0,0,'L');
	$pdf->Ln();
	$pdf->Cell($left,0,'',0,0);
	$pdf->Cell(3.5,0.7,' ',0,0,'L');
	$pdf->Cell(1,0.7,' ',0,0,'R');
	$pdf->Cell(10,0.7,'COMPUTATIONAL SCIENCES AND STATISTICS 2020 (ICoMCoS-2020)',0,0,'L');
	$pdf->Ln();
	$pdf->Cell($left,0,'',0,0);
	$pdf->Cell(3.5,0.7,' ',0,0,'L');
	$pdf->Cell(1,0.7,' ',0,0,'R');
	$tglkeg='29th';
	$pdf->Cell(10,0.7,$tglkeg.' September, 2020, Surabaya, Indonesia',0,0,'L');
	$pdf->Ln();
/*
	$pdf->Ln();
	$pdf->Cell($left,0,'',0,0);
	if ($mtuang=='Rp'){
		$pdf->Cell(1.5,0.7,'IDR. ',0,0,'L');
	}else{
		$pdf->Cell(1.5,0.7,'US$. ',0,0,'L');
	}
	$pdf->Cell(0.5,0.7,':',0,0,'L');
	$pdf->Cell(10,0.7,$rp,0,0,'L');
	$pdf->Ln();*/
	$pdf->Ln();
	$pdf->Cell($left,0,'',0,0);
	$pdf->Cell(19,0.7,'Surabaya, '.$tgl,0,0,'R');
	$pdf->Ln();
	$pdf->Cell($left,0,'',0,0);
//	$pdf->Cell(19,0.7,'Bendahara',0,0,'R');
//	$pdf->Cell(16.9,0.7,'Treasurer',0,0,'R');
	$pdf->Ln();
}
$pdf->Ln();
$pdf->Ln();
$pdf->Cell($left,0,'',0,0);
$sttd='../icon/'.$ttd;
$pdf->Image($sttd,18,13,5);
$pdf->Ln();
$pdf->Ln(1.8);
$pdf->Cell($left,0,'',0,0);
$pdf->Cell(20,0.7,'Signature....................................',0,0,'R');
$pdf->Cell($left,0,'',0,0);
$pdf->Ln(0.5);
$pdf->Cell(22,0.7,'('.'SITI ZAHIDAH, S.Si., M.Si.'.')',0,0,'R');
//$pdf->Cell(23,0.7,'('.'INDAH WERDININGSIH S.Si., M.Kom.'.')',0,0,'R');
//$pdf->Cell(27.8,0,'',1,0);
mysqli_close($dbconnect);	
$pdf->Ln();
$pdf->Output($file,true);
?> 