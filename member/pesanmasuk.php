<?php
error_reporting(0);
session_start();
$dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");
{
	$tampil=mysqli_query($dbconnect,"SELECT a.idpesan,a.tglpesan,a.jampesan,a.pengirim,a.penerima,a.subyek,a.isi,a.tgldibaca,b.nmuser FROM pesan a  left join user b on b.iduser=a.pengirim where a.penerima='$_SESSION[iduser]' ORDER BY a.tglpesan+a.jampesan desc");
	echo "<center><br>
		<table style='border:1px solid #0B9BE1;border-collapse: collapse;'>
		<tr><td style='border:none;' colspan=5 align='center'><font color='red' size=5><b>Pesan Masuk</b></font></td></tr>
		<tr style='background:#BFBFFF;'><td style='border: 1px solid #ddd;' align='center' width=10><font color=brown><b> no </b></font></td><td  style='border: 1px solid #ddd;' align='center' width=60><font color=brown><b> Pengirim </b></font></td><td style='border: 1px solid #ddd;' align='center'><font color=brown><b> Subyek </b></font></td><td style='border: 1px solid #ddd;' align='center'><font color=brown><b> Attach </b></font></td><td style='border: 1px solid #ddd;' align='center'><font color=brown><b> tanggal </b></font></td><td  style='border: 1px solid #ddd;' align='center'><font color=brown><b> aksi </b></font></td></tr>";
	$no=1;
	while ($r=mysqli_fetch_array($tampil)){
	$tgl=$r['tglpesan']."<br>[".$r['jampesan']."]";
	if (!empty($r['tgldibaca'])){
		$warna="#f0ffff";
		echo "<tr valign='top' bgcolor=$warna><td style='padding : 2px 2px 2px 15px;border: 1px solid #ddd;' width=10><b>$no</b></td>";
		echo "<td align='center' style='padding : 2px 2px 2px 15px;border: 1px solid #ddd;' width=50><img src='../gambaruser/$r[ftuser]' width='30' height='30' style='border-style:none;' title='$r[nmuser]'/><br>";
		echo "$r[nmuser]";
		echo "</td>";
		echo "<td valign='top' width='250' bgcolor=$warna style='padding : 2px 2px 2px 15px;border: 1px solid #ddd;'>";			
		if (empty($r['subyek'])){
			echo "<font color='#3B3B3B' size=2><i> [Tidak ada Subyek] </i></font>";
		}else{
			echo "<a href=javascript:pesanRequest('pesandetail.php','$GETidp',$r[kdpesan],'detpesan'); title='$r[isipesan]'><font color='#3B3B3B' size=2> $r[subyek] </font></a>";
		}
		echo "</td>";
		echo "<td valign='top' width='150' style='padding : 2px 2px 2px 15px;border: 1px solid #ddd;'><a href='#' title='Sudah Dibaca'><font color='#004080' size=2>$tgl</font></a></td>
		<td width='30' style='padding : 2px 2px 2px 5px;'><a href=javascript:pesanRequest('pesanmasuk.php','$del',$r[kdpesan],'detpesan');><img src='../Icon/ed_delete.gif'></a>
		</td></tr>";
	}
}
mysqli_close($dbconnect);
//include "../config/closekoneksi.php";
?>