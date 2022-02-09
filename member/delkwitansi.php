<?php
	error_reporting(0);
	session_start();
//	include "../config/koneksi.php";
	$iduser=$_GET['id'];
	$pos=$_GET['pos'];
	$nilai=intval(substr($pos,7,3));
	$nmdiv="ktbayar".$nilai;
	$dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");
	mysqli_query($dbconnect,"UPDATE peserta SET statusbayar=0,kwketerangan='',kwjumlah='',kwrupiah=0,kwmtuang='',filekwitansi='',tglkwitansi='',kwnomor='' WHERE iduser='$iduser' and thnsnma=$_SESSION[thnsnma]");
	
	echo "<select name='statbayar' onchange=javascript:Request('bayar.php','$iduser','$nmdiv')>";
	echo " 	<option id='statbayar' value=0 selected> UNPAID </option>";
	echo " 	<option id='statbayar' value=1> PAID </option>";
	echo "</select>";

    //header('location:./');
	mysqli_close($dbconnect);
//include "../config/closekoneksi.php";
?>
