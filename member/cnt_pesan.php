<?
error_reporting(0);
session_start();
include "../config/fungsi_indotgl.php";
//include "../config/koneksi.php";
$dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");
//$dbconnect=mysqli_connect("localhost","root","","icomcos2020") or die("Koneksi gagal");
//$_SESSION[iduser]='edi_winarko@yahoo.com';
$logsession=mysqli_query($dbconnect,"SELECT session,jamlogin,level,nama FROM login WHERE username='$_SESSION[iduser]'");
$rsession=mysqli_fetch_array($logsession);
$rjlh=mysqli_num_rows($logsession);
$_GET[module]='pesan';
if ($_GET[module]=='pesan'){
	$menit=substr(date('H:i:s'),3,2);
	$code=md5(date()+9).'9'.md5(time()+$menit).$menit.md5(time());
	$jlhmasuk=mysqli_num_rows(mysqli_query($dbconnect,"SELECT a.idpesan,a.pengirim,b.nmdepan,b.nmakhir,a.isi,a.tglpesan,a.jampesan,a.subyek,a.buka FROM pesanmasuk a  left join user b on b.iduser=a.pengirim where a.penerima='$_SESSION[iduser]' and a.buka=0 ORDER BY a.tglpesan+a.jampesan desc"));
	$_SESSION[jlhmsk]=$jlhmasuk;
	$jlhmasukall=mysqli_num_rows(mysqli_query($dbconnect,"SELECT a.idpesan,a.pengirim,b.nmdepan,b.nmakhir,a.isi,a.tglpesan,a.jampesan,a.subyek,a.buka FROM pesanmasuk a  left join user b on b.iduser=a.pengirim where a.penerima='$_SESSION[iduser]' ORDER BY a.tglpesan+a.jampesan desc"));  
	$_SESSION[jlhmskall]=$jlhmasukall;
	$jlhkeluar=mysqli_num_rows(mysqli_query($dbconnect,"SELECT a.idpesan,a.penerima,b.nmdepan,b.nmakhir,a.isi,a.tglpesan,a.jampesan,a.subyek,a.buka FROM pesanmasuk a  left join user b on b.iduser=a.penerima where a.pengirim='$_SESSION[iduser]' and a.buka=0 ORDER BY a.tglpesan+a.jampesan desc"));
	$_SESSION[jlhklr]=$jlhkeluar;
	$jlhkeluarall=mysqli_num_rows(mysqli_query($dbconnect,"SELECT a.idpesan,a.penerima,b.nmdepan,b.nmakhir,a.isi,a.tglpesan,a.jampesan,a.subyek,a.buka FROM pesanmasuk a  left join user b on b.iduser=a.penerima where a.pengirim='$_SESSION[iduser]' ORDER BY a.tglpesan+a.jampesan desc"));
	$_SESSION[jlhklrall]=$jlhkeluarall;
	echo "<div id='utama'>";
	echo "<fieldset><legend><font color='#680099' size=4><b>MESSAGE</b></font></legend>";
	echo "<center><a href='javascript:void(0)' onclick=javascript:Request('lihatmasuk.php','','formpesan')><font color='#008080'><b>IN-BOX (<font color='red'>$_SESSION[jlhmsk]</font>/<font color='red'>$_SESSION[jlhmskall]</font>)</b></font></a> &nbsp;&nbsp;&nbsp; <a href='javascript:void(0)' onclick=javascript:Request('lihatkeluar.php','','formpesan')><font color='#008080'><b>OUT-BOX (<font color='red'>$_SESSION[jlhklr]</font>/<font color='red'>$_SESSION[jlhklrall]</font>)</b></font></a> &nbsp;&nbsp;&nbsp; <a href='?act=klikemail&code=$code'><font color='#008080'><b>Create Message</b></font></a></center>";
	echo "<div id='formpesan'>";
	echo "</div>";
	echo "<br>";
	echo "</div>";
}
mysqli_close($dbconnect);
echo  "</div>";
//================ batas content =================

?>
