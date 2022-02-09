<?php
error_reporting(0);
session_start();
include "templ.php";
include "menu.php";
$ip=$_SERVER['REMOTE_ADDR'];
//@$REMOTE_ADDR; 
$_SESSION['thnsnma']=2020;
$isiform=$_POST['masuk'];
if ($isiform=='Login'){
//  include "./config/koneksi.php";
  $dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");
  $pass=md5($_POST['password']);
  $login=mysqli_query($dbconnect,"SELECT iduser,idoto,nmdepan,nmtengah,nmakhir,instansi,hp,passworda,passworde FROM user WHERE iduser='$_POST[username]' AND passworde='$pass'");
  $ketemu=mysqli_num_rows($login);
  $r=mysqli_fetch_array($login);
  if ($ketemu > 0){
		$loginv=mysqli_query($dbconnect,"SELECT iduser,idoto,nmdepan,nmtengah,nmakhir,passworda,passworde FROM user WHERE iduser='$_POST[username]' AND passworde='$pass' AND verified=1");
		$ketemuv=mysqli_num_rows($loginv);
		if ($ketemuv > 0){
			$uniqlog=substr(md5(uniqid('')),-6,6);
			$_SESSION['log']=$uniqlog;
			$_SESSION['kosong']="";
			$_SESSION['iduser']=trim($r['iduser']);
			$_SESSION['passuser']=$r['passworde'];
			$_SESSION['namauser']=$r['nmdepan'];
			$_SESSION['namatengah']=$r['nmtengah'];
			$_SESSION['namauserblk']=$r['nmakhir'];
			$_SESSION['level']=$r['idoto'];
//			$_SESSION['ftuser']=$r['ftuser'];
			header('location:./member/index.php');
		}else{
			$tgl=Date("Y-m-d");
/*
            $isiund ="<center><table><tr><td align=center colspan=3>Selamat bergabung di <br><img src='http://snma.fst.unair.ac.id/icon/snma2017.png' width=100 height=20> (<font color=#800000 size=2><b>SEMINAR NASIONAL MATEMATIKA DAN APLIKASINYA</b></font>).<br>Terima kasih Saudara/Saudari <font color=red size=3><b>$nmsaya</b></font> telah mendaftar di kegiatan kami, semoga bermanfaat...</td></tr>";
			$isiund .="<tr><td colspan=3></td></tr>";
			$isiund .="<tr><td align=justify width='30'><font size=3><b>User </b></font></td><td  width='2'> : </td><td width='100'> <font color=red size=3>$r[iduser]</font></b></font></td></tr>";
			$isiund .="<tr><td align=justify width='30'><font size=3><b>Password </b></font></td><td width='2'> : </td><td width='100'> <font color=red size=3>$r[passworda]</font></b></font></td></tr>";
			$isiund .="<tr><td align=justify width='30'><font size=3><b>Institusi </b></font></td><td width='2'> : </td><td width='100'> <font color=red size=3>$r[instansi]</font></b></font></td></tr>";
			$isiund .="<tr><td align=justify width='30'><font size=3><b>HP </b></font></td><td width='2'> : </td><td width='100'> <font color=red size=3>$r[hp]</font></b></font><br></td></tr>";
			$isiund .="<tr><td align=center colspan=3><br>Silahkan klik link berikut ini untuk memastikan bahwa Anda benar telah mendaftar di SNMA2017 : <br>";
			$isiid=md5($r['iduser']).md5($tgl);
//			$utama ="verified.php?id=".$isiid;
			$isiund .="<br><a href='http://snma.fst.unair.ac.id/verified.php?id=$isiid'>verification?=$isiid</a> <br></td></tr>";
			$isiund .="<tr><td align=center colspan=3>Jika Anda merasa tidak melakukan Pendaftaran abaikan saja.<br>";
			$isiund .="Terima kasih atas kerjasamanya. Semoga Sukses Selalu...!!<br><br>";
			$isiund .="<br><br><img src='http://snma.fst.unair.ac.id/icon/snma2017.png' width=100 height=20><br>Admin </td></tr></table></center>";
			$headers = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: Admin SNMA-2017 <snma@fst.unair.ac.id>' . "\r\n";
			mail($r['iduser'],'Selamat Bergabung di SNMA2017...',$isiund,$headers);
*/
			$utama .="<br><br><br><center>
				<font color=#F20D24 size=4><b>EMAIL NOT VERIFIED...!</b></font><br><br>
				<font color=#800040 size=3><i><b>Please CHECK YOUR EMAIL (INBOX OR SPAM)...!</b></i></font>
				</center>";
//			echo "<SCRIPT LANGUAGE='JavaScript'>var x=alert('EMAIL BELUM TERVERIFIKASI.! Silahkan CEK EMAIL ANDA...!');location.href='http:./';</SCRIPT>";
		}
  }
  else{
		echo "<SCRIPT LANGUAGE='JavaScript'>var x=alert('LOGIN FAILED.! USERNAME / PASSWORD IS NOT TRUE..!');location.href='http:./';</SCRIPT>";
  }
}
elseif ($isiform==Batal){
//	header('location:./');
}
mysqli_close($dbconnect);
//include "./config/closekoneksi.php";
//$index .= "</div>";
$tpl=new template;

$tpl -> define_theme("thememaster.htm");
$tpl -> define_tag("{mnu}",$mnu);
$tpl -> define_tag("{tglhari}",$tglhari);
$tpl -> define_tag("{headran}",$headran);
$tpl -> define_tag("{utama}",$utama);
$tpl -> define_tag("{kanan}",$kanan);
$tpl -> define_tag("{menu}",$menu);
$tpl -> define_tag("{login}",$login);
$tpl -> parse();
$tpl -> printproses(); 
?>

?>
