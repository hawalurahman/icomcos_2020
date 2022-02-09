<?php
error_reporting(0);
session_start();
//include "../config/koneksi.php";

$server = "localhost";
$username = "fstunair_snma";
$password = "Snma2017";
$database = "fstunair_snma";
$dbconnect=mysqli_connect($server,$username,$password,$database) or die("Koneksi gagal");

//	$edit=mysqli_query($dbconnect,"SELECT iduser,nmuser,instansi,hp,idoto,passworda,passworde,status,tgldaftar FROM user WHERE iduser='$_SESSION[iduser]'");
	$edit = mysqli_query($dbconnect,"SELECT a.iduser,a.nmuser,a.instansi,a.hp,a.idoto,a.passworda,a.passworde,a.status,a.tgldaftar,b.statuspeserta,b.statusbayar,b.tglbayar,b.filebayar,b.ketbayar,c.fileabstrak,c.filefull FROM ((user a left join peserta b on a.iduser=b.iduser) left join makalah c on a.iduser=c.iduser) WHERE b.thnsnma=$_SESSION[thnsnma] and b.iduser='$_SESSION[iduser]'");
	$r=mysqli_fetch_array($edit);
	echo "<table width='100%' style='margin-left=0px;'>
		<tr><td align='left'><img src='../icon/kepesertaan.jpg' width='100%' height='100%'></td></tr></table><br>";
	echo "<fieldset width='80%'><legend align='left' style='background:#FFFFFF;border:none'><img src='../icon/downarrow-1.png'> <font color='#FF8000' size=2><b>Data Pribadi</b></font></legend>";
	echo "<center>
        <table>
		<tr><td colspan=3></td></tr>
        <tr><td><font color=#0000A0><b>Nama Lengkap</b></font></td> <td> : </td><td> <font color=#C44000><b>$r[nmuser]</b></font> </td></tr>
		<tr><td><font color=#0000A0><b>Instansi</b></font></td> <td> : </td><td> <font color=#C44000><b>$r[instansi]</b></font> </td></tr>
        <tr><td><font color=#0000A0><b>Email</b></font></td>   <td> : </td><td> <font color=#C44000><b>$r[iduser]</b></font> </td></tr>
		<tr><td><font color=#0000A0><b>HP</b></font></td>       <td> : </td><td> <font color=#C44000><b>$r[hp]</b></font> </td></tr>
		<tr><td><font color=#0000A0><b>Status</b></font></td>       <td> : </td><td> <font color=#C44000><b>";
		if ($r['status']=='D'){
			echo "Dosen dan Umum ";
		}else{
			echo "Mahasiswa ";
		}
		if ($rs['statuspeserta']==0){
			$peserta="Pemakalah";
		}else{
			$peserta="Non-Pemakalah";
		}
		echo "</b></font></td></tr>
			<tr><td><font color=#0000A0><b> Status Peserta </b></font></td><td> : </td><td> <font color=#5E5EFF><b>$peserta</b></font></td></tr>";
		if ($rs['statusbayar']==0){
			$bayar="<font color=red><b>Belum Bayar</b></font>";
		}else{
			$bayar="<font color=green><b>Sudah Bayar</b></font>";
		}
		echo "<tr><td><font color=#0000A0><b> Status Bayar </b></font></td><td> : </td><td> <font color=#5E5EFF><b>$bayar</b></font></td></tr>";
		if ($rs['statuspeserta']==0){
		if (empty($rs['fileabstrak'])){
			$fabstrak="<font color=red><b><a class='moseover' href='javascript:void(0)' onclick=javascript:Request('uploadabstrak.php','','utama')  title='Upload Abstrak'>Upload Abstrak</a></b></font>";
		}else{
			$rsfileabstrak=substr($rs['fileabstrak'],7);
			$fabstrak="<a href='../images/$rs[fileabstrak]' target='_blank'><font color=green><b>$rsfileabstrak</b></font></a> [<a class='moseover' href='javascript:void(0)' onclick=javascript:Request('uploadabstrak.php','','utama')  title='Update Abstrak'>Update Abstrak</a>]";
		}
		echo "<tr><td><font color=#0000A0><b> File Abstrak </b></font></td><td> : </td><td> <font color=#5E5EFF><b>$fabstrak</b></font></td></tr>";
		if (empty($rs['filefull'])){
			$ffull="<font color=red><b><a class='moseover' href='javascript:void(0)' onclick=javascript:Request('uploadfull.php','','utama')  title='Upload Full Paper'>Upload Full Paper</a></b></font>";
		}else{
			$rsfilefull=substr($rs['filefull'],7);
			$ffull="<a href='../images/$rs[filefull]' target='_blank'><font color=green><b>$rsfilefull</b></font></a> [<a class='moseover' href='javascript:void(0)' onclick=javascript:Request('uploadfull.php','','utama')  title='Update FullPaper'>Update Paper</a>]";
		}
		echo "<tr><td><font color=#0000A0><b> File Full Paper </b></font></td><td> : </td><td> <font color=#5E5EFF><b>$ffull</b></font></td></tr>";
		}

	echo "</table>";
	echo "</center>";
	echo "</fieldset><br>";

	$edit1=mysqli_query($dbconnect,"SELECT a.iduser,a.statuspeserta,b.thnsnma,b.judul,b.idkategori,b.author1,b.hadir1,b.author2,b.hadir2,b.author3,b.hadir3,b.author4,b.hadir4,b.keyword FROM makalah b left join peserta a on b.iduser=a.iduser WHERE b.iduser='$_SESSION[iduser]' and b.thnsnma=$_SESSION[thnsnma]");
	$r1=mysqli_fetch_array($edit1);

	echo "<form id='tambahor' name='tambahor' method=POST action=javascript:sendRequest('savestatus.php','','edit',document.tambahor,'utama')  enctype='multipart/form-data'>";
	echo "<fieldset><legend align='left' style='background:#FFFFFF;border:none'><img src='../icon/downarrow-1.png'> <font color='#FF8000' size=2><b>Kepesertaan</b></font></legend>";
	echo "
		<center>
		<table width='100%'>
		<tr><td align=center><font color=#5300A6 size=4><b>PILIH KEPESERTAAN ANDA</b></font></td></tr>
        <tr><td align=center><br>";
	if ($r1[statuspeserta]==0){
		echo "<input type=radio name=statuspeserta value=0 onclick=javascript:seton() checked> Pemakalah 
			<input type=radio name=statuspeserta value=1 onclick=javascript:setoff()> Non-Pemakalah ";
		echo "<SCRIPT LANGUAGE='JavaScript'>seton();</SCRIPT>";
	}else{
		echo "<input type=radio name=statuspeserta value=0 onclick=javascript:seton()> Pemakalah 
			<input type=radio name=statuspeserta value=1 onclick=javascript:setoff() checked> Non-Pemakalah ";
		echo "<SCRIPT LANGUAGE='JavaScript'>setoff();</SCRIPT>";
	}
	echo "</td></tr>
        </table>
        </center>";
	echo "</fieldset><br>";

	echo "<div id=isimklh  style='display:none'>";
	echo "<fieldset><legend align='left' style='background:#FFFFFF;border:none'><img src='../icon/downarrow-1.png'> <font color='#FF8000' size=2><b>Makalah</b></font></legend>";
	echo "<center>";
	echo "<table width='90%'>";
	echo "<tr><td valign='top'><font color=#0000A0><b>Judul</b></font> </td><td valign='top'> : </td><td> <textarea name=judul value='$r1[judul]' cols=60 rows=5>$r1[judul]</textarea></td></tr>";
	echo "<tr><td><font color=#0000A0><b>Kategori</b></font> </td><td> : </td><td> ";
	$querycust="select a.idkategori,a.nmkategori from kategori a";		
	$qcust=mysqli_query($dbconnect,$querycust) or die('query failed');
	echo "<select name='pkategori'>";
	echo " 	<option id='pkategori' value=0> - </option>";
		while ($icust=mysqli_fetch_array($qcust))
 		{
			if ($r1[idkategori]==$icust[idkategori]){
				echo "<option id='pkategori' value=$icust[idkategori] selected>$icust[nmkategori]</option>";
			}else{
				echo "<option id='pkategori' value=$icust[idkategori]>$icust[nmkategori]</option>";
			}
		}
	echo "</select></td>";
	echo "<tr><td valign='top'><font color=#0000A0><b>Keyword</b></font> </td><td valign='top'> : </td><td> <input type=text name=keyword value='$r1[keyword]' size=60></td></tr>";
	echo "<tr><td colsan=3><font color=#930000><b>Author</b></font> </td></tr>";
	echo "<tr><td valign='top'><b>+</b> <font color=#E17100><b>Nama</b></font> </td><td valign='top'> : </td><td> <input type=text name=author1 value='$r1[author1]' size=50><input type=checkbox name=hadir1 value=$r1[hadir1]> Hadir</td></tr>";
	echo "<tr><td valign='top'><b>+</b> <font color=#E17100><b>Nama</b></font> </td><td valign='top'> : </td><td> <input type=text name=author2 value='$r1[author2]' size=50><input type=checkbox name=hadir2 value=$r1[hadir2]> Hadir</td></tr>";
	echo "<tr><td valign='top'><b>+</b> <font color=#E17100><b>Nama</b></font> </td><td valign='top'> : </td><td> <input type=text name=author3 value='$r1[author3]' size=50><input type=checkbox name=hadir3 value=$r1[hadir3]> Hadir</td></tr>";
	echo "<tr><td valign='top'><b>+</b> <font color=#E17100><b>Nama</b></font> </td><td valign='top'> : </td><td> <input type=text name=author4 value='$r1[author4]' size=50><input type=checkbox name=hadir4 value=$r1[hadir4]> Hadir</td></tr>";
	echo "</table>";
	echo "</center><br>";
	echo "<font color=red><b><u>Catatan: </u></b></font><br>";
	echo " <ul><li><font color=blue><i>Untuk Upload Abstrak dan Full Paper Klik Link di sebelah kanan yang akan muncul setelah ANDA tekan tombol SIMPAN..! </i></font></li></ul><br>";
	echo "</fieldset><br>";
	echo "</div>";

	echo "<center>";
	echo "<input class='button' type=submit value=Simpan>
        <input class='button' type=button value=BATAL onclick='./index.php'>";
/*	echo "<table>
		<tr><td align=center><br><br>
		<input class='button' type=submit value=Simpan>
        <input class='button' type=button value=BATAL onclick='./index.php'></td></tr>
        </table>";
		*/
	echo "</center>";
	echo "</form>";


include "../config/closekoneksi.php";
?>