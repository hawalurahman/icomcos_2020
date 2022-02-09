<?php
error_reporting(0);
//include "./config/koneksi.php";
session_start();
$dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");
{	$pjid=strlen($_GET['id']);
	if ($pjid>60){
		$tgl=Date("Y-m-d");
		$emaile=substr($_GET['id'],0,32);
		$tanggale=substr($_GET['id'],32,32);
		$tgle=md5($tgl);
		$edit=mysqli_query($dbconnect,"SELECT iduser,nmdepan,nmakhir,instansi,hp,passworda FROM user WHERE emaile='$emaile'");
		$jlh=mysqli_num_rows($edit);
		$r=mysqli_fetch_array($edit);
		$emailp=$r[iduser];
//		$emailicomcos="softinsys@gmail.com";
		$instansi=$r[instansi];
		$hp=$r[hp];
		$passa=$r[passworda];
		if ($tgle==$tanggale){
			if ($jlh>0){
				mysqli_query($dbconnect,"UPDATE user SET verified=1 WHERE emaile='$emaile'");
				echo "
				<SCRIPT LANGUAGE='JavaScript'>
				var x=alert('VERIFICATION OF SUCCESS ..! PLEASE LOGIN');
				location.href='http://icomcos.fst.conference.unair.ac.id';
				</SCRIPT>";

			}else{				
				echo "
				<SCRIPT LANGUAGE='JavaScript'>
				var x=alert('EXPIRED LINK..!');
				location.href='http://icomcos.fst.conference.unair.ac.id';
				</SCRIPT>";
			}
		}else{
			$nmsaya=$r[nmdepan]." ".$r[nmakhir];
			/*************************/
    		$isiund ="<center><table><tr><td align=center colspan=3><font color=#464646>Welcome to join <img src='http://icomcos.fst.conference.unair.ac.id/icon/icomcos2020.png' width=100 height=20> (<font color=#800000 size=2><b>INTERNATIONAL CONFERENCE on MATHEMATICS, COMPUTATIONAL SCIENCES AND STATISTICS 2020</b></font>).<br>Tank You <font color=red size=3><b>$nmsaya</b></font>  for registering at ICoMCoS2020, hopefully it will be useful...</font></td></tr>";
			$isiund .="<tr><td colspan=3></td></tr>";
			$isiund .="<tr><td align=justify width='30'><font color=#464646><b>User </b></font></td><td  width='2'> : </td><td width='100'> <font color=red size=3>$emailp</font></b></font></td></tr>";
			$isiund .="<tr><td align=justify width='30'><font color=#464646><b>Password </b></font></td><td width='2'> : </td><td width='100'> <font color=red size=3>$passa</font></b></font></td></tr>";
			$isiund .="<tr><td align=justify width='30'><font color=#464646><b>Institution </b></font></td><td width='2'> : </td><td width='100'> <font color=red size=3>$instansi</font></b></font></td></tr>";
			$isiund .="<tr><td align=justify width='30'><font color=#464646><b>HP </b></font></td><td width='2'> : </td><td width='100'> <font color=red size=3>$hp</font></b></font><br></td></tr>";
			$isiund .="<tr><td align=center colspan=3><br><font color=#464646>Please click the following link to ensure that you have registered at ICoMCoS2020 : <br>";
			$isiid=md5($_GET['email']).md5($tgl);
//			echo "verified.php?id=".$isiid;
			$isiund .="<br><a href='http://icomcos.fst.conference.unair.ac.id/verified.php?id=$isiid'>verification?=$isiid</a></font><br></td></tr>";
			$isiund .="<tr><td align=center colspan=3><font color=#464646>If you don't feel like registering, just ignore it.<br>";
			$isiund .="Thank you for your cooperation. Good luck...!!<br><br>";
			$isiund .="<br><br><br>Admin <img src='http://icomcos.fst.conference.unair.ac.id/icon/icomcos2020.png' width=100 height=20></font></td></tr></table></center>";
			$headers = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: Admin ICoMCoS-2020 <icomcos@fst.unair.ac.id>' . "\r\n";
			mail($emailp,'Congratulations on joining ICoMCoS2020...',$isiund,$headers);
			echo "
				<SCRIPT LANGUAGE='JavaScript'>
				var x=alert('Request Expired ..! Please Check YOUR EMAIL!');
				location.href='http://icomcos.fst.conference.unair.ac.id';
				</SCRIPT>";
		}

	}else{
		echo "
		<SCRIPT LANGUAGE='JavaScript'>
			var x=alert('LINK IS NOT VALID..!');
			location.href='http://icomcos.fst.conference.unair.ac.id';
		</SCRIPT>
		";
	}
}
mysqli_close($dbconnect);
//include "./config/closekoneksi.php";
?>
