<?php
error_reporting(0);
session_start();
include "../config/koneksi.php";
include "menu.php";//742
$server = "localhost";
$username = "fstunair_snma";
$password = "Snma2017";
$database = "fstunair_snma";
$dbconnect=mysqli_connect($server,$username,$password,$database) or die("Koneksi gagal");

function anti_injection($d){
  $f=stripslashes(strip_tags(htmlspecialchars($d,ENT_QUOTES)));
  return $f;
}
if ($_GET['act']=='save')
{	
		$aihsl=anti_injection($_GET['hslrev']);
		$iduser=$_GET['id'];
		$iddiv=$_GET['iddiv'];
		$tgl=Date("Y-m-d");
		mysqli_query($dbconnect,"UPDATE makalah SET hasilreviewerabs='$aihsl',tglreviewerabs='$tgl',statusabstrak=$_GET['stsrev'],idreviewerabs='$_SESSION[iduser]' WHERE iduser='$_GET[iduser]' and thnsnma=$_SESSION[thnsnma]");
		echo "<center><br><font color=red size=3><b>BERHASIL DISIMPAN..!</b></font><br><input class='button' type=button value=CLOSE onclick=javascript:Request('kosong.php','','$iddiv')>";
}
include "../config/closekoneksi.php";
?>