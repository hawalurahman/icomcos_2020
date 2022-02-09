<?php
error_reporting(0);
session_start();
include "../config/koneksi.php";
if ($_SESSION['level']==1)
{
  ///=============== content  ===============
	echo "<center><font color=brown><b><h2>UPLOAD ABSTRAK</h2></b></font></center>";
	echo "<form id='tambah' name='tambah' method=POST action='./saveabstrak.php?act=save'  enctype='multipart/form-data'>
        <center><table>
        <tr><td><font color='blue' size=2><b>File Abstrak</b> <br> <input type=file name=fuploadabs size=100></td></tr>";
		echo "<tr><td><input class='button' type=submit value=Simpan><a href='./index.php'><input class='button' type=button value=BATAL></a></td></tr></table></center>
        </form>";
}else{
	echo "<SCRIPT LANGUAGE='JavaScript'>location.href='./';</SCRIPT>";
}
include "../config/closekoneksi.php";
?>
