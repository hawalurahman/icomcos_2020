<?php
error_reporting(0);
//include "./config/koneksi.php";
session_start();
$dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");
if ($_GET['act']=='save')
{
		if (!empty($_GET['email'])){
			$login=mysqli_query($dbconnect,"SELECT iduser,idoto,nmdepan,nmtengah,nmakhir,instansi,hp,passworda,passworde FROM user WHERE iduser='$_GET[email]'");
			$ketemu=mysqli_num_rows($login);
			if ($ketemu>0){
				$passa=$_GET['pass1'];
				$passb=$_GET['pass2'];
				$passe=md5($_GET['pass1']);
				if ($passa==$passb){
					mysqli_query($dbconnect,"UPDATE user SET passworda='$passa',passworde='$passe' WHERE iduser='$_GET[email]'");
					echo "<center><font size=5>";
					echo "<br><br><table width='80%'>
					<tr><td  align='center'><font color=blue><b>Your password</b> has been successfully changed...<br>Please LOGIN with the new PASSWORD...!<br><br>
					Thank You<br>
					Regards<br><br>
		            Committee</b></td></tr></table>";
					echo "</font></center>";
				}else{
				echo "<center><br><br><br><font color=red size=4><b>SORRY YOUR PASSWORD <font color=blue>IS NOT THE SAME</font> ...!</b></font></center>";
				}
			}else{
				echo "<center><br><br><br><font color=red size=4><b>SORRY EMAIL  <font color=blue>$_GET[email]</font> NOT REGISTERED...!</b></font></center>";
			}
		}else{
			echo "<center><font color=red size=5><b>EMAIL MUST BE AT CONTENT..!</b></font></center>";
		}
}
mysqli_close($dbconnect);
//include "./config/closekoneksi.php";
?>
