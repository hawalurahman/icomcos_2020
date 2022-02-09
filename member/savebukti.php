<?php
error_reporting(0);
session_start(); 
include "templ.php";
include "menu.php";//742
//include "../config/koneksi.php";
$dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");
if ($_GET['act']=='save')
{
	$lokasi_file = $_FILES['fuploadgbr']['tmp_name'];
	$nama_file   = $_FILES['fuploadgbr']['name'];
	$acak = rand(0000000,9999999);
	$nama_file_acak = $acak.$nama_file;
	$type_file   = $_FILES['fuploadgbr']['type'];
	$size_file   = $_FILES['fuploadgbr']['size'];
	if (!empty($lokasi_file)){
		move_uploaded_file($lokasi_file,"../images/$nama_file_acak");
		mysqli_query($dbconnect,"UPDATE peserta SET filebayar='$nama_file_acak',ketbayar='$_POST[isiket]' WHERE iduser='$_SESSION[iduser]' and thnsnma=$_SESSION[thnsnma]");
		$utama ="<br><br><br><center>
				<font color=#F20D24 size=4><b>PROOF OF PAY SUCCESS IN UPLOAD..!</b></font><br><br>
				<font color=#004040 size=3><i>Please wait for the Verification from the Committee...!</i></font>
				</center>";
//		$utama ="<SCRIPT LANGUAGE='JavaScript'>var x=alert('BUKTI BERHASIL DI UPLOAD..!');location.href='http:./index.php';</SCRIPT>";
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

?>
