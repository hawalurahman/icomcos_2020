<?php
	error_reporting(0);
	session_start();
//	include "../config/koneksi.php";
	$iduser=$_GET['id'];
	$vare=$_GET['varedit'];
	$lokasi=$_GET['lokasi'];
	$dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");
	if ($vare=='namadepan'){
	mysqli_query($dbconnect,"UPDATE user SET nmdepan='$iduser' WHERE iduser='$_SESSION[iduser]'");
	echo "<font color=#C44000><b>$iduser</b></font> <a class='moseover' href='javascript:void(0)' onclick=javascript:AEditRequest('edit.php','$iduser','namadepan','nmdepandiv')><img src='../icon/edit.gif'></a>";
	}elseif ($vare=='namatengah'){
	mysqli_query($dbconnect,"UPDATE user SET nmtengah='$iduser' WHERE iduser='$_SESSION[iduser]'");
	echo "<font color=#C44000><b>$iduser</b></font> <a class='moseover' href='javascript:void(0)' onclick=javascript:AEditRequest('edit.php','$iduser','namatengah','nmtengahdiv')><img src='../icon/edit.gif'></a>";
	}elseif ($vare=='namaakhir'){
	mysqli_query($dbconnect,"UPDATE user SET nmakhir='$iduser' WHERE iduser='$_SESSION[iduser]'");
	echo "<font color=#C44000><b>$iduser</b></font> <a class='moseover' href='javascript:void(0)' onclick=javascript:AEditRequest('edit.php','$iduser','namaakhir','nmakhirdiv')><img src='../icon/edit.gif'></a>";
	}elseif ($vare=='nmtitle'){
	mysqli_query($dbconnect,"UPDATE user SET title='$iduser' WHERE iduser='$_SESSION[iduser]'");
	echo "<font color=#C44000><b>$iduser</b></font> <a class='moseover' href='javascript:void(0)' onclick=javascript:AEditRequest('edit.php','$iduser','nmtitle','titlediv')><img src='../icon/edit.gif'></a>";
	}elseif ($vare=='nmaffi'){
	mysqli_query($dbconnect,"UPDATE user SET instansi='$iduser' WHERE iduser='$_SESSION[iduser]'");
	echo "<font color=#C44000><b>$iduser</b></font> <a class='moseover' href='javascript:void(0)' onclick=javascript:AEditRequest('edit.php','$iduser','nmaffi','affidiv')><img src='../icon/edit.gif'></a>";
	}elseif ($vare=='nmdepart'){
	mysqli_query($dbconnect,"UPDATE user SET departemen='$iduser' WHERE iduser='$_SESSION[iduser]'");
	echo "<font color=#C44000><b>$iduser</b></font> <a class='moseover' href='javascript:void(0)' onclick=javascript:AEditRequest('edit.php','$iduser','nmdepart','departdiv')><img src='../icon/edit.gif'></a>";
	}elseif ($vare=='nmcity'){
	mysqli_query($dbconnect,"UPDATE user SET kota='$iduser' WHERE iduser='$_SESSION[iduser]'");
	echo "<font color=#C44000><b>$iduser</b></font> <a class='moseover' href='javascript:void(0)' onclick=javascript:AEditRequest('edit.php','$iduser','nmcity','citydiv')><img src='../icon/edit.gif'></a>";

	}elseif ($vare=='title'){
	mysqli_query($dbconnect,"UPDATE makalah SET judul='$iduser' WHERE iduser='$_SESSION[iduser]'");
	echo "<font color=#C44000><b>$iduser</b></font> <a class='moseover' href='javascript:void(0)' onclick=javascript:AEditRequest('edit.php','$iduser','judul','jdldiv')><img src='../icon/edit.gif'></a>";
	}elseif ($vare=='keyword'){
	mysqli_query($dbconnect,"UPDATE makalah SET keyword='$iduser' WHERE iduser='$_SESSION[iduser]'");
	echo "<font color=#C44000><b>$iduser</b></font> <a class='moseover' href='javascript:void(0)' onclick=javascript:AEditRequest('edit.php','$iduser','keyword','keydiv')><img src='../icon/edit.gif'></a>";
	}elseif ($vare=='kategori'){
	mysqli_query($dbconnect,"UPDATE makalah SET idkategori='$iduser' WHERE iduser='$_SESSION[iduser]'");
	$qukat="select a.idkategori,a.nmkategori from kategori a where a.idkategori='$iduser'";
	$pukat=mysqli_fetch_array(mysqli_query($dbconnect,$qukat));
	echo "<font color=#C44000><b>$pukat[nmkategori]</b></font> <a class='moseover' href='javascript:void(0)' onclick=javascript:AEditRequest('edit.php','$iduser','kategori','kategoridiv')><img src='../icon/edit.gif'></a>";
	}
	mysqli_close($dbconnect);
//include "../config/closekoneksi.php";
?>