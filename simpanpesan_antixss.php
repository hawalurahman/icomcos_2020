<?php
error_reporting(0);
session_start();
include "../config/koneksi.php";
function anti_injection($d){
  $f=stripslashes(strip_tags(htmlspecialchars($d,ENT_QUOTES)));
  return $f;
}
/*
$ainama=anti_injection($_POST[nama]);
$aialamat=anti_injection($_POST[alamat]);
$aikota=anti_injection($_POST[kota]);
$ainmsekolah=anti_injection($_POST[namasekolah]);
*/
	$lokasi_file = $_FILES['fuploadfile']['tmp_name'];
	$nama_file   = $_FILES['fuploadfile']['name'];
	$acak = rand(0000000,9999999);
	$nama_file_acak = $acak.$nama_file;
	$menit=substr(date('H:i:s'),3,2);
	$code=md5(date()+9).'9'.md5(time()+$menit).$menit.md5(time());
	$tgl=Date("Y-m-d");
	$jam=Date("H:i:s");
	$isisubyek=ereg_replace("'","\'","$_POST[subyek]");
	$isibaru=ereg_replace("'","\'","$_POST[pesan]");
	$isibaru=ereg_replace("<p>","","$isibaru");
	$isibaru=ereg_replace("</p>","<br>","$isibaru");
	if (!empty($lokasi_file)){
		move_uploaded_file($lokasi_file,"makalah/$nama_file_acak");
		mysql_query("INSERT INTO pesan(asalpesan,untukpesan,isipesan,tglpesan,jampesan,buka,fileattact,subyek) 
	                       VALUES('$_SESSION[iduser]',
                                '$_POST[tujuan]',
                                '$isibaru',
                                '$tgl','$jam',0,'$nama_file_acak','$isisubyek')");
	}else{
		mysql_query("INSERT INTO pesan(asalpesan,untukpesan,isipesan,tglpesan,jampesan,buka,subyek) 
	                       VALUES('$_SESSION[iduser]',
                                '$_POST[tujuan]',
                                '$isibaru',
                                '$tgl','$jam',0,'$isisubyek')");
	}
	echo "
		<SCRIPT LANGUAGE='JavaScript'>
			location.href='./cnt_pesan.php?module=pesan&idp=pm&code=$code';
		</SCRIPT>
		";
?>
