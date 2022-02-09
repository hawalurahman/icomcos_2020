<?php
error_reporting(0);
session_start();
//include "../config/koneksi.php";
$server = "localhost";
$username = "fstunair_snma";
$password = "Snma2017";
$database = "fstunair_snma";
$dbconnect=mysqli_connect($server,$username,$password,$database) or die("Koneksi gagal");
{
	$_SESSION['log']='33531';
	$nmkat[1]="Analisis dan Aljabar";
	$nmkat[2]="Matematika Terapan";
	$nmkat[3]="Statistika";
	$nmkat[4]="Sistem Informasi";
	$nmkat[5]="Pendidikan Matematika";
	$tgl=Date("d-m-Y");

	$filename = "peserta_".$tgl.".xls";
	header("Content-Disposition: attachment; filename=\"$filename\"");
	header("Content-Type: application/vnd.ms-excel");

	echo "No.\tEmail\tNama Peserta\tHP\tStatus\tPeserta\tFileAbstrak\r\n";
		$editjo = mysqli_query($dbconnect,"SELECT  DISTINCT  a.iduser,a.nmuser,a.instansi,a.hp,a.idoto,a.passworda,a.passworde,a.status,a.tgldaftar,b.statuspeserta,b.statusbayar,b.tglbayar,b.filebayar,b.ketbayar,c.fileabstrak,c.filefull,c.idkategori FROM ((user a left join peserta b on a.iduser=b.iduser) left join makalah c on a.iduser=c.iduser) WHERE b.thnsnma=$_SESSION[thnsnma] and b.statuspeserta=$id  ORDER BY a.tgldaftar DESC");

		while ($dtjo=mysqli_fetch_array($editjo))
 		{	$no++;
			$nmdiv="ktbayar".$no;
			$stbayar="stbayar".$no;
			if ($dtjo['statuspeserta']==0){
				$peserta="Pemakalah";
			}else{
				$peserta="Non-Pemakalah";
			}
			if ($dtjo['status']=='D'){
				$statuspeserta="Dosen/Umum";
			}else{
				$statuspeserta="Mahasiswa";
			}
			if ($dtjo['statusbayar']==0){
				$bayar="<div id='$stbayar'><select name='statbayar' onchange=javascript:Request('bayar.php','$dtjo[iduser]','$stbayar')>";
				if ($dtjo['statusbayar']==0){
				$bayar.=" 	<option id='statbayar' value=0 selected> Belum Bayar </option>";
				$bayar.=" 	<option id='statbayar' value=1> Bayar </option>";
				$bayar.="</select></div>";
				}else{
				$bayar.=" 	<option id='statbayar' value=1 selected> Bayar </option>";
				$bayar.="</select></div>";
				}
			}else{
				$bayar="<select name='statbayar'>";
				$bayar.=" 	<option id='statbayar' value=1 selected> Bayar </option>";
				$bayar.="</select>";
			}
			if (!empty($dtjo['filebayar'])){
				$file="<a href='../images/$dtjo[filebayar]' target='_blank'><img src='../images/$dtjo[filebayar]' width=40 height=30></a>";
			}else{
				$file="";
			}
			if (empty($dtjo['fileabstrak'])){
				$fabstrak="<font color=red><b>-</b></font>";
			}else{
				$rsfileabstrak=substr($dtjo[fileabstrak],7);
				$fabstrak="<a href='../images/$dtjo[fileabstrak]' target='_blank'><font color=green><b>V</b></font></a>";
			}
			if (empty($dtjo['filefull'])){
				$ffull="<font color=red><b>-</b></font>";
			}else{
				$rsfilefull=substr($dtjo[filefull],7);
				$ffull="<a href='../images/$dtjo[filefull]' target='_blank'><font color=green><b>V</b></font></a>";
			}
			$indkat=$dtjo[idkategori];
			$jlkat[$indkat]++;
			echo $no."\t".$dtjo['iduser']."\t".$dtjo['nmuser']."\t".$dtjo['hp']."\t".$statuspeserta."\t".$peserta."\t".$fabstrak."\r\n";
		}
}

?>