<?php
error_reporting(0);
session_start();
//include "../config/koneksi.php";
$dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");
	$edit=mysqli_query($dbconnect,"SELECT iduser,nmdepan,nmtengah,nmakhir,title,instansi,participant,kota,country,departemen,hp,idoto,passworda,passworde,status,tgldaftar FROM user WHERE iduser='$_SESSION[iduser]'");
	$r=mysqli_fetch_array($edit);
	echo "<table width='100%' style='margin-left=0px;'>
		<tr><td align='left'><img src='../icon/kepesertaan.jpg'></td></tr></table><br>";
	echo "<fieldset width='80%'><legend align='left' style='background:#FFFFFF;border:none'><img src='../icon/downarrow-1.png'> <font color='#FF8000' size=2><b>Personal</b></font></legend>";
	echo "<center>
        <table width='80%'>
		<tr><td colspan=3></td></tr>
        <tr><td><font color=#0000A0><b>First Name</b></font></td> <td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#C44000><b>$r[nmdepan]</b></font> </td></tr>
		<tr><td><font color=#0000A0><b>Middle Name</b></font></td> <td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#C44000><b>$r[nmtengah]</b></font> </td></tr>
		<tr><td><font color=#0000A0><b>Last Name</b></font></td> <td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#C44000><b>$r[nmakhir]</b></font> </td></tr>
		<tr><td><font color=#0000A0><b>Title</b></font></td> <td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#C44000><b>$r[title]</b></font> </td></tr>
		<tr><td><font color=#0000A0><b>Affiliation</b></font></td> <td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#C44000><b>$r[instansi]</b></font> </td></tr>
		<tr><td><font color=#0000A0><b>Department</b></font></td> <td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#C44000><b>$r[departemen]</b></font> </td></tr>
		<tr><td><font color=#0000A0><b>City</b></font></td> <td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#C44000><b>$r[kota]</b></font> </td></tr>
		<tr><td><font color=#0000A0><b>Country</b></font></td> <td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#C44000><b>$r[country]</b></font> </td></tr>
		<tr><td><font color=#0000A0><b>Participant</b></font></td> <td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#C44000><b>$r[participant]</b></font> </td></tr>
        <tr><td><font color=#0000A0><b>Email</b></font></td>   <td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#C44000><b>$r[iduser]</b></font> </td></tr>
		<tr><td><font color=#0000A0><b>HP</b></font></td>       <td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#C44000><b>$r[hp]</b></font> </td></tr></table>";
	echo "</center>";
	echo "</fieldset><br>";

	echo "<form id='tambahor' name='tambahor' method=POST action=javascript:resendRequest('savestatus.php','','save',document.tambahor,'utama')  enctype='multipart/form-data'>";
	echo "<fieldset><legend align='left' style='background:#FFFFFF;border:none'><img src='../icon/downarrow-1.png'> <font color='#FF8000' size=2><b>Participation</b></font></legend>";
	echo "
		<center>
		<table width='80%'>
		<tr><td align=center><font color=#5300A6 size=4><b>CHOOSE YOUR PARTICIPATION</b></font></td></tr>
        <tr><td align=center><br>
			<input type=radio name=statuspeserta value=0 onclick=javascript:seton()> <font color=#800000><b>Presenter</b></font> 
			<input type=radio name=statuspeserta value=1 onclick=javascript:setoff()> <font color=#800000><b>Non-Presenter</b></font> <br><br>
		</td></tr>
        </table>
        </center>";
	echo "</fieldset><br>";

	echo "<div id=isimklh  style='display:none'>";
	echo "<fieldset><legend align='left' style='background:#FFFFFF;border:none'><img src='../icon/downarrow-1.png'> <font color='#FF8000' size=2><b>Paper</b></font></legend>";
	echo "<center>";
	echo "<table width='80%'>";
	echo "<tr><td valign='top'><font color=#0000A0><b>Title </b></font> </td><td valign='top'> <font color=#0000A0><b>:</b></font> </td><td> <textarea name=judul value='' cols=80 rows=5></textarea></td></tr>";
	echo "<tr><td><font color=#0000A0><b>Category </b></font> </td><td> <font color=#0000A0><b>:</b></font> </td><td> ";
	$querycust="select a.idkategori,a.nmkategori from kategori a";		
	$qcust=mysqli_query($dbconnect,$querycust) or die('query failed');
	echo "<select name='pkategori'>";
	echo " 	<option id='pkategori' value=0> - </option>";
		while ($icust=mysqli_fetch_array($qcust))
 		{
			echo "<option id='pkategori' value='$icust[idkategori]'>$icust[nmkategori]</option>";
		}
	echo "</select></td></tr>";
	echo "<tr><td valign='top'><font color=#0000A0><b>Keyword</b></font> </td><td valign='top'> <font color=#0000A0><b>:</b></font> </td><td> <textarea name=keyword value='' cols=80 rows=5></textarea></td></tr>";
	echo "<tr><td colsan=3><font color=#0000A0><b>Author</b></font> </td></tr>";
	echo "<tr><td valign='top'><b>+</b> <font color=#E17100><b>Name 1</b></font> </td><td valign='top'> <font color=#0000A0><b>:</b></font> </td><td> <input type=text name=author1 value='' size=50><input type=checkbox name=hadir1 value=1> <font color=#FA1C03><b>Presenter</b></font></td></tr>";
	echo "<tr><td valign='top'><b>+</b> <font color=#E17100><b>Name 2</b></font> </td><td valign='top'> <font color=#0000A0><b>:</b></font> </td><td> <input type=text name=author2 value='' size=50><input type=checkbox name=hadir2 value=1> <font color=#FA1C03><b>Presenter</b></font></td></tr>";
	echo "<tr><td valign='top'><b>+</b> <font color=#E17100><b>Name 3</b></font> </td><td valign='top'> <font color=#0000A0><b>:</b></font> </td><td> <input type=text name=author3 value='' size=50><input type=checkbox name=hadir3 value=1> <font color=#FA1C03><b>Presenter</b></font></td></tr>";
	echo "<tr><td valign='top'><b>+</b> <font color=#E17100><b>Name 4</b></font> </td><td valign='top'> <font color=#0000A0><b>:</b></font> </td><td> <input type=text name=author4 value='' size=50><input type=checkbox name=hadir4 value=1> <font color=#FA1C03><b>Presenter</b></font></td></tr>";
	echo "<tr><td valign='top'><b>+</b> <font color=#E17100><b>Name 5</b></font> </td><td valign='top'> <font color=#0000A0><b>:</b></font> </td><td> <input type=text name=author5 value='' size=50><input type=checkbox name=hadir5 value=1> <font color=#FA1C03><b>Presenter</b></font></td></tr>";
	echo "<tr><td valign='top'><b>+</b> <font color=#E17100><b>Name 6</b></font> </td><td valign='top'> <font color=#0000A0><b>:</b></font> </td><td> <input type=text name=author6 value='' size=50><input type=checkbox name=hadir6 value=1> <font color=#FA1C03><b>Presenter</b></font></td></tr>";
	echo "<tr><td valign='top'><b>+</b> <font color=#E17100><b>Name 7</b></font> </td><td valign='top'> <font color=#0000A0><b>:</b></font> </td><td> <input type=text name=author7 value='' size=50><input type=checkbox name=hadir7 value=1> <font color=#FA1C03><b>Presenter</b></font></td></tr>";
	echo "<tr><td valign='top'><b>+</b> <font color=#E17100><b>Name 8</b></font> </td><td valign='top'> <font color=#0000A0><b>:</b></font> </td><td> <input type=text name=author8 value='' size=50><input type=checkbox name=hadir8 value=1> <font color=#FA1C03><b>Presenter</b></font></td></tr>";
	echo "<tr><td valign='top'><b>+</b> <font color=#E17100><b>Name 9</b></font> </td><td valign='top'> <font color=#0000A0><b>:</b></font> </td><td> <input type=text name=author9 value='' size=50><input type=checkbox name=hadir9 value=1> <font color=#FA1C03><b>Presenter</b></font></td></tr>";
	echo "<tr><td valign='top'><b>+</b> <font color=#E17100><b>Name 10</b></font> </td><td valign='top'> <font color=#0000A0><b>:</b></font> </td><td> <input type=text name=author10 value='' size=50><input type=checkbox name=hadir10 value=1> <font color=#FA1C03><b>Presenter</b></font></td></tr>";
	echo "<tr><td valign='top'><b>+</b> <font color=#E17100><b>Name 11</b></font> </td><td valign='top'> <font color=#0000A0><b>:</b></font> </td><td> <input type=text name=author11 value='' size=50><input type=checkbox name=hadir11 value=1> <font color=#FA1C03><b>Presenter</b></font></td></tr>";
	echo "<tr><td valign='top'><b>+</b> <font color=#E17100><b>Name 12</b></font> </td><td valign='top'> <font color=#0000A0><b>:</b></font> </td><td> <input type=text name=author12 value='' size=50><input type=checkbox name=hadir12 value=1> <font color=#FA1C03><b>Presenter</b></font></td></tr>";
	echo "<tr><td valign='bottom' colspan=3><br><font color=#0000A0><b><u>NB :</u></b></font> <font color=#FD3613><b> Click the checkbox if the author is presenter</b></font></td></tr>";
	echo "<tr><td valign='bottom' colspan=3><br></td></tr>";
	echo "</table>";
	echo "</center>";
	echo "</fieldset>";
	echo "</div>";

	echo "<center>";
	echo "<input class='button' type=submit value=SAVE>
        <input class='button' type=button value=CANCEL onclick='./index.php'>";
/*	echo "<table>
		<tr><td align=center><br>
		<input class='button' type=submit value=Simpan>
        <input class='button' type=button value=BATAL onclick='./index.php'></td></tr>
        </table>";
		*/
	echo "</center>";
	echo "</form>";

mysqli_close($dbconnect);
//include "../config/closekoneksi.php";
?>