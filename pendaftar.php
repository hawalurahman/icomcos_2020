<?php
error_reporting(0);
session_start();
//include "./config/koneksi.php";
$dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");
{
	$editjo = mysqli_query($dbconnect,"SELECT a.iduser,a.nmuser,a.instansi,a.hp,a.idoto,a.passworda,a.passworde,a.status,a.tgldaftar,a.verified,a.kirimveri FROM user a WHERE a.idoto=1");
	echo "<table width='80%' style='margin-left=0px;'>
		<tr><td align='left'><img src='../icon/pesertapendaftar.jpg'></td></tr></table>";
	echo  "<center>";
	echo "<br><br>";
	echo  "<table border=1 cellpadding=0 cellspacing=0 width='95%'>";
	$no=0;
	echo  "<tr><th style='background:#5F9ADC;'>No.</th><th style='background:#5F9ADC;'>Nama Peserta</th><th style='background:#5F9ADC;'> Status Peserta </th><th style='background:#5F9ADC;'> Status </th><th style='background:#5F9ADC;'> Tanggal Daftar </th><th style='background:#5F9ADC;'>AKSI</th></tr>";
	$warna='#FFFFFF';
	while ($dtjo=mysqli_fetch_array($editjo))
 	{	$no++;
		$daftar=$dtjo['tgldaftar'];
		$nmdiv='ktbayar'.$no;
		$aksi="";
		if ($dtjo['verified']==1){
			$status="Verified";
		}else{
			$status="Not-Verified";
//			$status="<a href='./kirimverifikasi.php?username=$dtjo[iduser]'><input  class='button' type=submit name=masuk value='Kirim Verifikasi ($dtjo[kirimveri])'></a>";
		}
		if ($dtjo['status']=='D'){
			$statuspeserta="Dosen/Umum";
		}else{
			$statuspeserta="Mahasiswa";
		}
		echo  "<tr><td width='5%' valign='middle' style='background:$warna;padding : 2px 2px 2px 5px;'> $no. </td><td width='30%' valign='middle' style='background:$warna;padding : 2px 2px 2px 5px;' width='20%'> $dtjo[nmuser] </td><td valign='middle' align='center' style='background:$warna;padding : 2px 2px 2px 5px;' width='10%'> $statuspeserta </td><td valign='middle' align='center' style='background:$warna;padding : 2px 2px 2px 2px;' width='8%'> $status </td><td valign='middle' align='center' style='background:$warna;padding : 2px 2px 2px 2px;' width='10%'> $daftar </td><td valign='middle' align='center' style='background:$warna;padding : 2px 2px 2px 2px;' width='10%'> $aksi </td></tr>
		<tr><td colspan=6><div id='$nmdiv'></div></td></tr>
		";
		if ($warna=='#B0DCFD'){
			$warna='#FFFFFF';
		}else{
			$warna='#B0DCFD';
		}
	}
	echo  "</table><br>";
	echo  "</center>";		
}
mysqli_close($dbconnect);
//include "./config/closekoneksi.php";
echo  "</div>";
?>
