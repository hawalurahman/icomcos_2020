<?php
error_reporting(0);
session_start(); 
include "templ.php";
include "menu.php";//742
//include "../config/koneksi.php";
$dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");

$dt = mysqli_fetch_array(mysqli_query($dbconnect,"SELECT a.papperid,b.nmdepan,b.nmtengah,b.nmakhir FROM makalah a left join user b on a.iduser=b.iduser WHERE a.thnsnma=$_SESSION[thnsnma] and a.iduser='$_SESSION[iduser]'"));


if ($_GET['act']=='save')
{
	$lokasi_file = $_FILES['fuploadgbr']['tmp_name'];
	$nama_file   = $_FILES['fuploadgbr']['name'];
	$acak = rand(0000000,9999999);
	$nama_file_acak = $dt['kdpeserta']."_".$nama_file;
	$type_file   = $_FILES['fuploadgbr']['type'];
	$size_file   = $_FILES['fuploadgbr']['size'];
	$nmfile=$dt['papperid']."_".$dt['nmdepan'].$dt['nmtengah'].$dt['nmakhir'].".pptx";
	if (!empty($lokasi_file)){
		move_uploaded_file($lokasi_file,"../berkas/$nama_file_acak");
        $fileAwal = "../berkas/$nama_file_acak";
        $fileBaru = "../berkas/$nmfile";
        rename($fileAwal, $fileBaru); // mengubah nama file		
		mysqli_query($dbconnect,"UPDATE makalah SET fileppt='$nmfile' WHERE iduser='$_SESSION[iduser]' and thnsnma=$_SESSION[thnsnma]");
		$utama ="<br><br><br><center>
			<font color=#F20D24 size=4><b>SUCCESSFUL PPT FILE IN UPLOAD..!</b></font><br><br>
			<a href='./index.php'><font color=red><b>CLOSE</b></font></a>
			</center>";
//		$utama ="<SCRIPT LANGUAGE='JavaScript'>var x=alert('SUCCESSFUL PPT FILE IN UPLOAD..!');location.href='http:./index.php';</SCRIPT>";
	}else{
		$utama ="<SCRIPT LANGUAGE='JavaScript'>var x=alert('NOTHING HAS BEEN CHOSEN..!');location.href='http:./index.php';</SCRIPT>";
	}
}
mysqli_close($dbconnect);
//include "../config/closekoneksi.php";
$tpl=new template;

$tpl -> define_theme("thememaster.htm");
$tpl -> define_tag("{mnu}",$mnu);
$tpl -> define_tag("{tglhari}",$tglhari);
$tpl -> define_tag("{headran}",$headran);
$tpl -> define_tag("{utama}",$utama);
$tpl -> define_tag("{kanan}",$kanan);
$tpl -> define_tag("{menu}",$menu);
$tpl -> define_tag("{login}",$login);
$tpl -> parse();
$tpl -> printproses(); 
?>