<?php
error_reporting(0);
//include "./config/koneksi.php";
session_start();
$dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");
if ($_GET['act']=='save')
{
	if ($_GET['kode']==$_SESSION['captcha_session']){ 
		if (!empty($_GET['email'])){
			$login=mysqli_query($dbconnect,"SELECT iduser,idoto,nmdepan,nmtengah,nmakhir,instansi,hp,passworda,passworde FROM user WHERE iduser='$_GET[email]'");
			$ketemu=mysqli_num_rows($login);
			if ($ketemu>0){
				$passa=$_GET['pass'];
				$passe=md5($_GET['pass']);
				$emaile=md5($_GET['email']);
				$tgl=Date("Y-m-d");
				echo "<center><font size=5>";
				echo "<br><br><table width='80%'>
				<tr><td  align='center'><font color='#000000'><b>Please check the email <font color=blue>$_GET[email]</font> on our INBOX / SPAM verification</b>, to ensure a FORGET PASSWORD request...!<br><br>
				Thank you<br>
				Regards<br><br>
				Committee</font></td></tr></table>";

				echo "</font></center>";
    			$isiund ="<center><table><tr><td align=center colspan=3><font color=#464646>Welcome to join <img src='http://icomcos.fst.conference.unair.ac.id/icon/icomcos2020.png' width=100 height=20> (<font color=#800000 size=2><b>INTERNATIONAL CONFERENCE on MATHEMATICS, COMPUTATIONAL SCIENCES AND STATISTICS 2020</b></font>).<br>Thank you for making a FORGET PASSWORD request...</td></tr>";
				$isiund .="<tr><td align=center colspan=3><br>Please click the following link to ensure that you have correctly requested FORGOT PASSWORD : <br>";
				$isiid=md5($tgl).md5($_GET['email']).md5($tgl);
				$isiund .="<br><a href='http://icomcos.fst.conference.unair.ac.id/verilupa.php?id=$isiid'>lupa?=$isiid</a> <br></td></tr>";
				$isiund .="<tr><td align=center colspan=3>If you feel you have not done the FORGET PASSWORD Request, just ignore it.<br>";
				$isiund .="Thank you for your cooperation. Good luck...!!<br><br>";
				$isiund .="<br><br><br>Admin <img src='http://icomcos.fst.conference.unair.ac.id/icon/icomcos2020.png' width=100 height=20></td></tr></table></center>";
				$headers = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= 'From: Admin ICoMCoS2020 <icomcos@fst.unair.ac.id>' . "\r\n";
				mail($_GET['email'],'Forgot Password on ICoMCoS2020...',$isiund,$headers);
			}else{
				echo "<center><br><br><br><font color=red size=4><b>SORRY email <font color=blue>$_GET[email]</font> not registered yet...!</b></font></center>";
			}
		}else{
			echo "<center><font color=red size=5><b>e-MAIL E-MAIL MUST BE FILLED IN..!</b></font></center>";
		}
	}else{
		echo "<center><font color=red size=5><b>SORRY WRONG VERIFICATION CODE..!</b></font></center>";
	}
}
mysqli_close($dbconnect);
//include "./config/closekoneksi.php";
?>
