<?php
error_reporting(0);
session_start();
//include "../config/koneksi.php";
$dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");
{
	$tampil=mysqli_query($dbconnect,"SELECT a.idpesan,a.tglpesan,a.jampesan,a.pengirim,a.penerima,a.subyek,a.isi,a.tgldibaca,b.nmuser FROM pesan a  left join user b on b.iduser=a.penerima where a.pengirim='$_SESSION[iduser]' ORDER BY a.tglpesan+a.jampesan desc");
	echo "<center><br>
		<table style='border:1px solid #0B9BE1;border-collapse: collapse;' width='100%'>
		<tr><td style='border:none;' colspan=5 align='center'><font color='red' size=5><b>Buat Pesan</b></font></td></tr>
		<tr style='background:#BFBFFF;'><td style='border: 1px solid #ddd;' align='center'><font color=brown><b>Tujuan</b></font></td><td  style='border: 1px solid #ddd;' align='center'> : </td><td style='border: 1px solid #ddd;' align='center'><input id=tujuan name=tujuan size=60></td></tr>
		<tr style='background:#BFBFFF;'><td style='border: 1px solid #ddd;' align='center'><font color=brown><b>Subyek</b></font></td><td  style='border: 1px solid #ddd;' align='center'> : </td><td style='border: 1px solid #ddd;' align='center'><input id=subyek name=subyek size=60></td></tr>
		<tr style='background:#BFBFFF;'><td style='border: 1px solid #ddd;' align='center' colspan=3><textarea id=isipesan name=isipesan cols=60 rows=5></td></tr>";
	echo "</table><center>";
}

mysqli_close($dbconnect);
//include "../config/closekoneksi.php";

?>