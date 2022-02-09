<?php
error_reporting(0);
session_start();
//include "../config/koneksi.php";
$dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");
    $pos=$_GET['pos'];
	$iduser=$_GET['id'];
	$lokasi=$_GET['lokasi'];
	mysqli_query($dbconnect,"UPDATE peserta SET statusbayar=1 WHERE iduser='$iduser' and thnsnma=$_SESSION[thnsnma]");

$login=mysqli_query($dbconnect,"SELECT a.iduser,a.idoto,a.nmdepan,a.nmtengah,a.nmakhir,a.instansi,a.hp,a.passworda,a.passworde,b.kdpeserta FROM user a left join peserta b on a.iduser=b.iduser WHERE a.iduser='$iduser'");
$r=mysqli_fetch_array($login);
$nmsaya=$r[nmdepan]." ".$r[nmakhir];
$kd=$r[kdpeserta];
$tgl=Date("Y-m-d");
$isiund ="<center><table><tr><td align=center colspan=3><font color=#464646>Welcome to <img src='http://icomcos.fst.conference.unair.ac.id/icon/icomcos2020.png' width=100 height=20> (<font color=#800000 size=2><b>INTERNATIONAL CONFERENCE on MATHEMATICS,
COMPUTATIONAL SCIENCES AND STATISTICS 2020</b></font>).<br><br>Thank you Mr./Mrs. <font color=red size=3><b>$nmsaya</b></font> Your payment has been <font color=red size=3><b>VERIFIED</b></font>.</td></tr>";
$isiund .="<tr><td colspan=3></td></tr>";
$isiund .="<tr><td align=justify colspan=3><br>Please click the following link to <font color=red size=3><b>LOGIN</b></font> into ICOMCOS2020 : <br>";
$isiid=md5($r['iduser']).md5($tgl);
$isiund .="<br><font color=red size=3><b><a href='http://icomcos.fst.conference.unair.ac.id'>ENTER</a></b></font> <br></td></tr>";
$isiund .="<tr><td align=center colspan=3><br><br>";
$isiund .="Thank you for your cooperation. Good luck...!!<br><br>";
$isiund .="<br><br><br>Admin <img src='http://icomcos.fst.conference.unair.ac.id/icon/icomcos2020.png' width=100 height=20></td></tr></table></center>";
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: Admin ICOMCOS2020 <icomcos@fst.unair.ac.id>' . "\r\n";
mail($r[iduser],'ICOMCOS2020 Payment Verification...',$isiund,$headers);
//javascript:sendRequest('kwitansi.php','','save',document.tambahor,'$lokasi')
echo "<form id='tambahor' name='tambahor' method=POST action='savekwitansi.php'  enctype='multipart/form-data'>";
echo "<center><table><tr><td colspan=3 align=center><font color='#804040' size=4><b>Making Payment Receipt</b></font></td></tr>
	 <tr><td colspan=3><br></td></tr>
	 <tr><td> <font color='#5F9ADC'>Name </font> </td><td> <font color='#000080'><b>:</b></font> </td><td> <font color='#5F9ADC'><b>$nmsaya</b></font> </td></tr>
	 <tr><td> <font color='#5F9ADC'>Amount </font> </td><td> <font color='#000080'><b>:</b></font> </td><td> <input type=text name=jumlah valu='' size=70 style='color:#E17100;' placeholder='Write in Sentence,
Example: Three Hundred'> US Dollars / Rupiah </td></tr>
	 <tr><td valign=top> <font color='#5F9ADC'>Description</font> </td><td valign=top> <font color='#000080'><b>:</b></font> </td><td valign=top> <textarea rows=4 cols=50 name=keterangan style='color:#E17100;'></textarea> </td></tr>
	 <tr><td colspan=3><br></td></tr>
	 <tr><td> <font color='#5F9ADC'><input type=radio name=mtuang value='Rp'>IDR. <input type=radio name=mtuang value='US' checked>US $. </font> </td><td> <font color='#000080'><b>:</b></font> </td><td valign=top> <input type=text name=rupiah value='' style='color:#E17100;'> </td></tr>
	 <tr><td colspan=3 align=right><font color='#5F9ADC'><b>Surabaya</b>, $tgl</font> </td></tr>
	 <tr><td colspan=3><br></td></tr>
	 <tr><td align='center' colspan=3>
		<input type=hidden name=id value='$iduser'>
		<input type=hidden name=nm value='$nmsaya'>
		<input type=hidden name=kd value='$kd'>
		<input type=hidden name=pos value='$pos'>
		<input class='button' type=submit value=CREATE>
        <input class='button' type=button value=CANCEL onclick='./index.php'></td></tr>
	 </table></center>

	 </form>";
mysqli_close($dbconnect);	
//include "../config/closekoneksi.php";
?>