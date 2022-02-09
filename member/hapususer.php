<?php
error_reporting(0);
session_start();
include "templ.php";
include "menu.php";
if ($_SESSION['level']==0){
	$ip=$_SERVER['REMOTE_ADDR'];
	//@$REMOTE_ADDR; 
	$_SESSION['thnsnma']=2017;
	include "../config/koneksi.php";
	$pass=md5($_POST['password']);
	$login=mysql_query("SELECT iduser,idoto,nmuser,instansi,hp,passworda,passworde,kirimveri FROM user WHERE iduser='$_GET[username]'");
	$r=mysql_fetch_array($login);
	$tgl=Date("Y-m-d");
	mysql_query("DELETE FROM user WHERE iduser='$_GET[username]'");
	$utama ="<br><br><br><center>
				<font color=#F20D24 size=4><b>ACCOUNT $r[iduser] ($r[nmuser]) BERHASIL DIHAPUS..!</b></font><br>
				</center>";
	include "../config/closekoneksi.php";
}else{
	$utama ="<br><br><br><center>
				<font color=#F20D24 size=4><b>ANDA TIDAK BERHAK MENGHAPUS..!</b></font><br><br>
				</center>";
}

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
