<?php
error_reporting(0);
session_start(); 
include "./config/koneksi.php";
include "templ.php";
include "menu.php";//742
include "../config/koneksi.php";
if ($_GET['act']=='save')
{
	$lokasi_file = $_FILES['fuploadfull']['tmp_name'];
	$nama_file   = $_FILES['fuploadfull']['name'];
	$acak = rand(0000000,9999999);
	$nama_file_acak = $acak.$nama_file;
	$type_file   = $_FILES['fuploadfull']['type'];
	$size_file   = $_FILES['fuploadfull']['size'];
	if (!empty($lokasi_file)){
		move_uploaded_file($lokasi_file,"../images/$nama_file_acak");
		mysql_query("UPDATE peserta SET filefull='$nama_file_acak' WHERE iduser='$_SESSION[iduser]' and thnsnma=$_SESSION[thnsnma]");
		$utama ="<br><br><br><center>
				<font color=#F20D24 size=4><b>FULLPAPER BERHASIL DI UPLOAD..!</b></font><br><br>
				</center>";
//		$utama ="<SCRIPT LANGUAGE='JavaScript'>var x=alert('BUKTI BERHASIL DI UPLOAD..!');location.href='http:./index.php';</SCRIPT>";
	}else{
		$utama ="<SCRIPT LANGUAGE='JavaScript'>var x=alert('BELUM ADA FILE YANG DIPILIH..!');location.href='http:./index.php';</SCRIPT>";
	}
}
include "../config/closekoneksi.php";
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
