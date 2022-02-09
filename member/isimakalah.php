<?php
include "../config/koneksi.php";

if ($_GET['id']=='0'){
	echo "<fieldset><legend align='left' style='background:#FFFFFF;border:none'><img src='../icon/downarrow-1.png'> <font color='#FF8000' size=2><b>Makalah</b></font></legend>";
	echo "<center>";
	echo "<table>";
	echo "<tr><td valign='top'><font color=#0000A0><b>Judul</b></font> </td><td valign='top'> : </td><td> <textarea name=judul value='' cols=80 rows=5></textarea></td>";
	echo "<tr><td><font color=#0000A0><b>Kategori</b></font> </td><td> : </td><td> ";
	$querycust="select a.idkategori,a.nmkategori from kategori a";		
	$qcust=mysql_query($querycust) or die('query failed');
	echo "<select name='pkategori'>";
	echo " 	<option id='pkategori' value=0> - </option>";
		while ($icust=mysql_fetch_array($qcust))
 		{
			echo "<option id='pkategori' value=$icust[idkategori]>$icust[nmkategori]</option>";
		}
	echo "</select></td>";
	echo "<tr><td colsan=3><font color=#0000A0><b>Author</b></font> </td></tr>";
	echo "<tr><td valign='top'><b>+</b> <font color=#E17100><b>Nama</b></font> </td><td valign='top'> : </td><td> <input type=text nama=author1 value='' size=50><input type=checkbox name=hadir1 value=1> Hadir</td>";
	echo "<tr><td valign='top'><b>+</b> <font color=#E17100><b>Nama</b></font> </td><td valign='top'> : </td><td> <input type=text nama=author2 value='' size=50><input type=checkbox name=hadir2 value=1> Hadir</td>";
	echo "<tr><td valign='top'><b>+</b> <font color=#E17100><b>Nama</b></font> </td><td valign='top'> : </td><td> <input type=text nama=author3 value='' size=50><input type=checkbox name=hadir3 value=1> Hadir</td>";
	echo "<tr><td valign='top'><b>+</b> <font color=#E17100><b>Nama</b></font> </td><td valign='top'> : </td><td> <input type=text nama=author4 value='' size=50><input type=checkbox name=hadir4 value=1> Hadir</td>";
	echo "</table>";
	echo "</center>";
	echo "</fieldset>";
}else{
	echo "<input type=hidden name=judul value=''>";
	echo "<input type=hidden name=pkategori value=0>";
	echo "<input type=hidden name=judul value=''>";
	echo "<input type=hidden nama=author1 value=''><input type=hidden name=hadir1 value=0>";
	echo "<input type=hidden nama=author2 value=''><input type=hidden name=hadir2 value=0>";
	echo "<input type=hidden nama=author3 value=''><input type=hidden name=hadir3 value=0>";
	echo "<input type=hidden nama=author4 value=''><input type=hidden name=hadir4 value=0>";
}
include "../config/closekoneksi.php";
?>