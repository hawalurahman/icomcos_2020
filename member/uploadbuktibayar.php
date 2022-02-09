<?php
error_reporting(0);
session_start();
//include "../config/koneksi.php";
if ($_SESSION['level']==1)
{
  ///=============== content  ===============
	echo "<center><font color=brown><b><h2>UPLOAD PROOF OF PAY</h2></b></font><br></center>";
	echo "<form id='tambah' name='tambah' method=POST action='./savebukti.php?act=save'  enctype='multipart/form-data'>
        <center><table>
        <tr><td><font color='blue' size=2><b>Select the Proof of Pay File (Image)</b> <br> <input type=file name=fuploadgbr size=100></td></tr>
		<tr><td><font color='blue' size=2><b>Information</b></font> <br><font color=#FF0000 size=2><b><i>If payment is made for more than 1 participant, please write the name and email address ...!</i></b></font><br><textarea name=isiket rows=10 cols=80 value=''></textarea></td></tr>";
		echo "<tr><td><input class='button' type=submit value=SAVE> <a href='./index.php'><input class='button' type=button value=CANCEL></a></td></tr></table></center>
        </form>";
}else{
	echo "<SCRIPT LANGUAGE='JavaScript'>location.href='./';</SCRIPT>";
}
//include "../config/closekoneksi.php";
?>
