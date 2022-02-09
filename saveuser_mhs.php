<?php
error_reporting(0);
include "./config/koneksi.php";
session_start();
if ($_GET['act']=='save')
{
	if ($_GET['kode']==$_SESSION['captcha_session']){ 
	if (!empty($_GET['email'])){
		$passa=$_GET['pass'];
		$passe=md5($_GET['pass']);
		$emaile=md5($_GET['email']);
		$tgl=Date("Y-m-d");
		mysql_query("INSERT INTO user(iduser,nmuser,instansi,hp,idoto,passworda,passworde,status,tgldaftar,emaile) VALUES('$_GET[email]','$_GET[nm]','$_GET[ins]','$_GET[hp]',1,'$passa','$passe','$_GET[stat]','$tgl','$emaile')");
		echo "<center><font size=5>";
		echo "<br><br><table width='80%'><tr><td align='center'>Selamat... </td></tr>
		<tr><td  align='center'>Saudara/Saudari <font color=#800080><b>$_GET[nm]</b></font> Berhasil terdaftar di Peserta SNMA2017....<br> <font color=red><b>Silahkan cek email verifikasi kami</b></font>, untuk memastikan pendaftaran yang Saudara/Saudari lakukan...!<br><br>
		Terima kasih<br>
		Salam<br><br>
		Panitia</td></tr></table>";
		echo "</font></center>";
    	$isiund ="<center><table><tr><td align=center colspan=3>Selamat bergabung di <img src='http://snma.fst.unair.ac.id/icon/snma2017.png' width=100 height=20> (<font color=#800000 size=2><b>SEMINAR NASIONAL MATEMATIKA DAN APLIKASINYA</b></font>).<br>Terima kasih Saudara/Saudari <font color=red size=3><b>$nmsaya</b></font> telah mendaftar di kegiatan kami, semoga bermanfaat...</td></tr>";
		$isiund .="<tr><td colspan=3></td></tr>";
		$isiund .="<tr><td align=justify width='30'><font size=3><b>User </b></font></td><td  width='2'> : </td><td width='100'> <font color=red size=3>$_GET[email]</font></b></font></td></tr>";
		$isiund .="<tr><td align=justify width='30'><font size=3><b>Password </b></font></td><td width='2'> : </td><td width='100'> <font color=red size=3>$passa</font></b></font></td></tr>";
		$isiund .="<tr><td align=justify width='30'><font size=3><b>Institusi </b></font></td><td width='2'> : </td><td width='100'> <font color=red size=3>$_GET[ins]</font></b></font></td></tr>";
		$isiund .="<tr><td align=justify width='30'><font size=3><b>HP </b></font></td><td width='2'> : </td><td width='100'> <font color=red size=3>$_GET[hp]</font></b></font><br></td></tr>";
		$isiund .="<tr><td align=center colspan=3><br>Silahkan klik link berikut ini untuk memastikan bahwa Anda benar telah mendaftar di SNMA2017 : <br>";
		$isiid=md5($_GET['email']).md5($tgl);
//		echo "verified.php?id=".$isiid;
		$isiund .="<br><a href='http://snma.fst.unair.ac.id/verified.php?id=$isiid'>verification?=$isiid</a> <br></td></tr>";
		$isiund .="<tr><td align=center colspan=3>Jika Anda merasa tidak melakukan Pendaftaran abaikan saja.<br>";
		$isiund .="Terima kasih atas kerjasamanya. Semoga Sukses Selalu...!!<br><br>";
		$isiund .="<br><br><br>Admin <img src='http://snma.fst.unair.ac.id/icon/snma2017.png' width=100 height=20></td></tr></table></center>";
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: Admin SNMA-2017 <snma@fst.unair.ac.id>' . "\r\n";
		mail($_GET['email'],'Selamat Bergabung di SNMA2017...',$isiund,$headers);
	}else{
		echo "<center><font color=red size=5><b>e-MAIL HARUS DI ISI..!</b></font></center>";
	}
	}else{
		echo "<center><font color=red size=5><b>MAAF KODE VERIFIKASI SALAH..!</b></font></center>";
	}
}
include "./config/closekoneksi.php";
?>
