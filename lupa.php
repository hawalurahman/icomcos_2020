<?php
error_reporting(0);
session_start();
//include "./config/koneksi.php";
	echo "<fieldset><legend align='left' style='background:#FFFFFF;border:none'><img src='./icon/downarrow-1.png'> <font color='#FF8000' size=2><b>FORGOT THE PASSWORD</b></font></legend>";
	echo "<center><form id='tambahor' name='tambahor' method=POST action=javascript:sendRequest('savelupa.php','','save',document.tambahor,'utama')  enctype='multipart/form-data'>
        <table width='80%'>
		<tr><td colspan=3><br><br></td></tr>
        <tr><td align=center colspan=3>E-mail : <input type=text name=email id=email size=30 value='' onblur='validasiEmail(this);' placeholder='Email' style='border:1px solid #AEAEFF;'></td></tr>
		<tr><td align='center' colspan=3><div id=cpath><img src='./captcha.php'></div>
		<a  class='moseover' href='javascript:void(0)' onclick=javascript:Request('vcaptcha.php','','cpath')><img src='./icon/refresh1.png' width=12 height=12 title='Refresh'></a>
		</td></tr>
		<tr><td align='center' colspan=3><input type=text name=kode placeholder='Verification Code' required='' style='border:1px solid #AEAEFF;'></td></tr>
		<tr><td colspan=3 align=center><input class='button' type=submit value=Send></td></tr>
        </table>
        </form></center>";
	echo "</fieldset>";
?>