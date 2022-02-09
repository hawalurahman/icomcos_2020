<?php
error_reporting(0);
session_start();
//include "../config/koneksi.php";
$dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");
	$iduser=$_GET['id'];
	$varedit=$_GET['varedit'];
	$lokasi=$_GET['lokasi'];
	mysqli_query($dbconnect,"UPDATE makalah SET status=$varedit WHERE iduser='$iduser' and thnsnma=$_SESSION[thnsnma]");
	$editst = mysqli_fetch_array(mysqli_query($dbconnect,"SELECT a.iduser,a.nmdepan,a.nmtengah,a.nmakhir,b.status,b.papperid,b.judul,b.idkategori,c.kdpeserta FROM (user a right join makalah b on a.iduser=b.iduser) left join peserta c on b.iduser=c.iduser WHERE a.iduser='$iduser' AND b.thnsnma=$_SESSION[thnsnma]"));
		$querystat="select a.idstatus,a.nmstatus from statusmakalah a";		
		$qstat=mysqli_query($dbconnect,$querystat) or die('query failed');
		echo "<form id='formtitle' name='formtitle' method=POST action=onchange=javascript:EditRequest('$dtjo[iduser]',document.formtitle,'statpaper.php','stpaper')  enctype='multipart/form-data'>";
		echo "<select name='statpaper' >";
		echo "<option id='statpaper' value=0> - </option>";
		while ($istat=mysqli_fetch_array($qstat))
 		{
			if ($istat[idstatus]==$editst[status]){
				echo "<option id='statpaper' value=$istat[idstatus] selected>$istat[nmstatus]</option>";
			}else{
				echo "<option id='statpaper' value=$istat[idstatus]>$istat[nmstatus]</option>";
			}
		}
		echo "</select><input class='button' type='submit' value='SAVE'></form>";
//    echo "UPDATE makalah SET status=$varedit WHERE iduser='$iduser' and thnsnma=$_SESSION[thnsnma]";
mysqli_close($dbconnect);	
//include "../config/closekoneksi.php";
?>