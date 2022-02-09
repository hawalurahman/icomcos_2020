<?php
error_reporting(0);
session_start();
date_default_timezone_set('Asia/Jakarta');
	include "../config/fungsi_indotgl.php";
	//include "../config/koneksi.php";
	$dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");
	//$dbconnect=mysqli_connect("localhost","root","","icomcos2020") or die("Koneksi gagal");
//	$_SESSION[iduser]='edi_winarko@yahoo.com';
	$tampil = mysqli_query($dbconnect,"SELECT a.idpesan,a.pengirim,b.nmdepan,b.nmakhir,a.isi,a.penerima,a.tglpesan,a.jampesan,a.buka,a.subyek FROM pesanmasuk a  left join user b on b.iduser=a.pengirim WHERE idpesan=$_GET[id]");
	$r      = mysqli_fetch_array($tampil);
	echo "<fieldset><legend><font color='#680099' size=4><b>REPLY MESSAGE</b></font></legend>";
	echo  "
        <form id='bpesan' name='bpesan' method=POST action='savebalas.php'  enctype='multipart/form-data'>
		<table bgcolor='#6699ff' width='100%'>
        <tr><td bgcolor='#6699ff' width='120'><font color='blue' size=2><b>To </b></font></td><td> : </td><td bgcolor='#6699ff' align='left'>$r[nmdepan] $r[nmakhir] ($r[pengirim])</td></tr>
		<tr><td bgcolor='#6699ff' width='120'><font color='blue' size=2><b>Subject Message </b></font></td><td> : </td><td bgcolor='#6699ff' align='left'><input type=text name=subyek size=60 value='Re:$r[subyek]'></td></tr>
        <tr><td bgcolor='#6699ff' width='120'><font color='blue' size=2><b>Message  </b></font></td><td> : </td><td bgcolor='#6699ff' align='left'></td></tr>
		<tr><td bgcolor='#6699ff' colspan=3><textarea name=pesan rows=13 cols=90></textarea></td></tr>
		<tr><td colspan=3>
		<input type=file name=fuploadfile1 id=fuploadfile1 size=100><br>
		<input type=file name=fuploadfile2 id=fuploadfile2 size=100></td></tr>
        <tr><td bgcolor='#6699ff' colspan=3 align='center'>
		<input type=hidden name=idu value='$_SESSION[iduser]'>
		<input type=hidden name=idp value=$_GET[id]>
		<input type=hidden name=idt value='$r[pengirim]'>
		<input type=hidden name=pos value='formdetail'>
		<input class='button' type=submit value=Send>
        <input class='button' type=button value=Cancel  onclick=javascript:Request('detailmasuk.php',$_GET[id],'formpesan')></td></tr>
				</table>
        </form>";
	echo "</fieldset>";

mysqli_close($dbconnect);
?>