<?php
error_reporting(0);
//include "./config/koneksi.php";
session_start();
$dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");
if ($_GET['act']=='save')
{
	if ($_GET['kode']==$_SESSION['captcha_session']){ 
	if (!empty($_GET['email'])){
		$passa=$_GET['password1'];
		$passe=md5($_GET['password1']);
		$emaile=md5($_GET['email']);
		$tgl=Date("Y-m-d");
		$emailp=$_GET['email'];
		$emailicomcos="icomcos2020@fst.unair.ac.id";
		$instansi=$_GET['instansi'];
		$hp=$_GET['hp'];
		$nmsaya=$_GET['namadepan']." ".$_GET['namaakhir'];
		mysqli_query($dbconnect,"INSERT INTO user(iduser,nmdepan,nmtengah,nmakhir,title,instansi,departemen,kota,country,hp,participant,idoto,passworda,passworde,status,tgldaftar,emaile) VALUES('$_GET[email]','$_GET[namadepan]','$_GET[namatengah]','$_GET[namaakhir]','$_GET[title]','$_GET[instansi]','$_GET[departemen]','$_GET[kota]','$_GET[country]','$_GET[hp]','$_GET[participant]',1,'$passa','$passe','0','$tgl','$emaile')");
		echo "<center><font size=5>";
		echo "<br><br><table width='80%'><tr><td align='center'><font color=#00008A><b>Congratulations...</b></font> </td></tr>
		<tr><td  align='center'><font color=#464646>Mr./Mrs. <font color=#800080><b>$nmsaya</b></font> You have registered as a participant at the ICoMCoS-2020....<br> <font color=red><b>Please check the verification e-mail to complete your registation...!</b></font><br><br>
			Regards<br><br>
		Committee</font></td></tr></table>";
		echo "</font></center>";
    	$isiund ="<center><table><tr><td align=center colspan=3><font color=#464646>Welcome to join <img src='http://icomcos.fst.conference.unair.ac.id/icon/icomcos2020.png' width=100 height=20> (<font color=#800000 size=2><b>INTERNATIONAL CONFERENCE on MATHEMATICS,
COMPUTATIONAL SCIENCES AND STATISTICS 2020</b></font>).<br>Thank You <font color=red size=3><b>$nmsaya</b></font>  for registering at Icomcos2020, hopefully it will be useful...</font></td></tr>";
		$isiund .="<tr><td colspan=3></td></tr>";
		$isiund .="<tr><td align=justify width='30'><font color=#464646><b>User </b></font></td><td  width='2'> : </td><td width='100'> <font color=red size=3>$emailp</font></b></font></td></tr>";
		$isiund .="<tr><td align=justify width='30'><font color=#464646><b>Password </b></font></td><td width='2'> : </td><td width='100'> <font color=red size=3>$passa</font></b></font></td></tr>";
		$isiund .="<tr><td align=justify width='30'><font color=#464646><b>Institution </b></font></td><td width='2'> : </td><td width='100'> <font color=red size=3>$instansi</font></b></font></td></tr>";
		$isiund .="<tr><td align=justify width='30'><font color=#464646><b>HP </b></font></td><td width='2'> : </td><td width='100'> <font color=red size=3>$hp</font></b></font><br></td></tr>";
		$isiund .="<tr><td align=center colspan=3><br><font color=#464646>Please click the following link to ensure that you have registered at ICOMCOS2020 : <br>";
		$isiid=md5($_GET['email']).md5($tgl);
//		echo "verified.php?id=".$isiid;
		$isiund .="<br><a href='http://icomcos.fst.conference.unair.ac.id/verified.php?id=$isiid'>verification?=$isiid</a></font><br></td></tr>";
		$isiund .="<tr><td align=center colspan=3><font color=#464646>If you don't feel like registering, just ignore it.<br>";
		$isiund .="Thank you for your cooperation. Good luck...!!<br><br>";
		$isiund .="<br><br><br>Admin <img src='http://icomcos.fst.conference.unair.ac.id/icon/icomcos2020.png' width=100 height=20></font></td></tr></table></center>";
//		echo "<br>".$isiund;
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: Admin ICOMCOS-2020 <icomcos@fst.unair.ac.id>' . "\r\n";
		mail($emailp,'Congratulations on joining ICOMCOS2020...',$isiund,$headers);
		mail($emailicomcos,'A New Participant Joins ICOMCOS2020...',$isiund,$headers);
	}else{
		echo "<center><font color=red size=5><b>e-MAIL MUST BE FILLED..!</b></font></center>";
/*
		echo "
		<SCRIPT LANGUAGE='JavaScript'>
			var x=alert('DATA TIDAK LENGKAP..!');
			location.href='./index.php';
		</SCRIPT>
		";
		*/
	}
	}else{
		echo "<center><font color=red size=5><b>WRONG VERIFICATION CODE..!</b></font></center>";
	}
}
mysqli_close($dbconnect);
//include "./config/closekoneksi.php";
?>
