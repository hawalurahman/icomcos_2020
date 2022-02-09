<?php
error_reporting(0);
session_start();
date_default_timezone_set('Asia/Jakarta');
//include "../config/koneksi.php";
$dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");
	$iduser=$_GET['id'];
	$varedit=$_GET['varst'];
	$lokasi=$_GET['lokasi'];
	mysqli_query($dbconnect,"UPDATE makalah SET status=$varedit WHERE papperid='$iduser' and thnsnma=$_SESSION[thnsnma]");
	$spesan = mysqli_fetch_array(mysqli_query($dbconnect,"SELECT a.iduser,a.nmdepan,a.nmakhir,b.papperid,c.idstatus,c.nmstatus FROM (user a right join makalah b on a.iduser=b.iduser) left join statusmakalah c on b.status=c.idstatus WHERE b.papperid='$iduser'"));
//action=javascript:EditRequest('$iduser',document.tpesan,'savepesan.php','$lokasi')
echo "<form id='tpesan' name='tpesan' method=POST action='savepesan.php'   enctype='multipart/form-data'>";
echo "<center><table><tr><td colspan=3 align=center><font color='#804040' size=4><b>Message Reviewer</b></font></td></tr>
	 <tr><td colspan=3><br></td></tr>
	 <tr><td valign=top> <font color='#5F9ADC'>Paper ID</font> </td><td valign=top> <font color='#000080'><b>:</b></font> </td><td valign=top> <font color='#00376F'><b>$spesan[papperid]</b></font> </td></tr>
	 <tr><td valign=top> <font color='#5F9ADC'>USER ID</font> </td><td valign=top> <font color='#000080'><b>:</b></font> </td><td valign=top> <font color='#00376F'><b>$spesan[iduser]</b></font> </td></tr>
	 <tr><td valign=top> <font color='#5F9ADC'>Name</font> </td><td valign=top> <font color='#000080'><b>:</b></font> </td><td valign=top> <font color='#00376F'><b>$spesan[nmdepan] $spesan[nmakhir]</b></font> </td></tr>
	 <tr><td valign=top> <font color='#5F9ADC'>Status</font> </td><td valign=top> <font color='#000080'><b>:</b></font> </td><td valign=top> <font color=red><b>$spesan[nmstatus]</b></font> </td></tr>
	 <tr><td valign=top> <font color='#5F9ADC'>Description</font> </td><td valign=top> <font color='#000080'><b>:</b></font> </td><td valign=top> <textarea rows=4 cols=50 name=keter style='color:#E17100;' placeholder='Write in Sentence' value=''></textarea> </td></tr>
	 <tr><td colspan=3><br></td></tr>
	 <tr><td colspan=3><font color=blue><b>Attact File : </b></font><br>
		<input type=file name=fuploadfile1 size=100><br>
		<input type=file name=fuploadfile2 size=100></td></tr>
	 <tr><td align='center' colspan=3>
		<input type=hidden name=idu value='$spesan[iduser]'>
		<input type=hidden name=idp value='$spesan[papperid]'>
		<input type=hidden name=nmst value='$spesan[nmstatus]'>
		<input type=hidden name=pos value='$lokasi'>
		<input class='button' type='submit' value='SAVE'> <input class='button' type='button' value='CANCEL' onclick='./index.php'>
		</td></tr>
	 </table></center>
	 </form>";


/*
	$editst = mysqli_fetch_array(mysqli_query($dbconnect,"SELECT a.iduser,a.nmdepan,a.nmtengah,a.nmakhir,b.status,b.papperid,b.judul,b.idkategori,c.kdpeserta FROM (user a right join makalah b on a.iduser=b.iduser) left join peserta c on b.iduser=c.iduser WHERE b.papperid='$iduser' AND b.thnsnma=$_SESSION[thnsnma]"));
		$querystat="select a.idstatus,a.nmstatus from statusmakalah a";		
		$qstat=mysqli_query($dbconnect,$querystat) or die('query failed');
		echo "<div id='$lokasi'><select name='statpaper' onchange=javascript:EditRequest('$iduser',this,'savestpaper.php','$lokasi'>";
		echo "<option id='statpaper' value=0> - </option>";
		while ($istat=mysqli_fetch_array($qstat))
 		{
			if ($istat[idstatus]==$editst[status]){
				echo "<option id='statpaper' value=$istat[idstatus] selected>$istat[nmstatus]</option>";
			}else{
				echo "<option id='statpaper' value=$istat[idstatus]>$istat[nmstatus]</option>";
			}
		}
		echo "</select></div>";
*/
//    echo "UPDATE makalah SET status=$varedit WHERE iduser='$iduser' and thnsnma=$_SESSION[thnsnma]";
mysqli_close($dbconnect);	
//include "../config/closekoneksi.php";
?>