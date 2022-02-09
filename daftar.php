<?php
error_reporting(0);
session_start();
//include "./config/koneksi.php";

$dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");
	echo "<center>
		<table width='100%' style='margin-padding=50px;'>
		<tr><td align='center'><font color='#800000' size=5><b> Registration </b></font></td></tr>
		</table>
		<table width='100%' style='margin-padding=50px;border=1px;'>
		<tr><td align='center'><br><font color='#800008' size=4><b>Note : <font color=red>Please note whether the confirmation letter arrives at Inbox or Advertising Letter.</font></b></font> </td></tr>
		</table>
		";
	echo "<form id='tambahor' name='tambahor' method=POST action=javascript:sendRequest('saveuser.php','','save',document.tambahor,'utama')  enctype='multipart/form-data'>
        <table cellspacing=6>
		<tr><td colspan=3><br><br></td></tr>
        <tr><td valign='top'><font color='#800000' size=3><b>First Name</b></font></td> <td><font color='#800000' size=3><b> : </b></font></td><td> <input type=text name=namadepan size=60 value='' placeholder='First Name' style='border:1px solid #AEAEFF;height:30px;'><br></td></tr>
		<tr><td valign='top'><font color='#800000' size=3><b>Middle Name</b></font></td> <td><font color='#800000' size=3><b> : </b></font></td><td> <input type=text name=namatengah size=60 value=''  placeholder='Middle Name' style='border:1px solid #AEAEFF;height:30px;'><br></td></tr>
		<tr><td valign='top'><font color='#800000' size=3><b>Last Name/Family Name</b></font></td> <td><font color='#800000' size=3><b> : </b></font></td><td> <input type=text name=namaakhir size=60 value=''  placeholder='Last Name' style='border:1px solid #AEAEFF;height:30px;'><br></td></tr>
		<tr><td valign='top'><font color='#800000' size=3><b>Title</b></font></td> <td><font color='#800000' size=3><b> : </b></font></td><td>";
	echo "<div id='ptitle'>";
	echo "<select name='title' enabled style='height:30px;'>";
	echo " 	<option id='title' value=0> - Please Select - </option>";
	echo "  <option id='title' value='Professor' > Professor</option>";
	echo "  <option id='title' value='Associate Professor' > Associate Professor </option>";
	echo "  <option id='title' value='Assistant Professor' > Assistant Professor </option>";
	echo "  <option id='title' value='Lecturer' > Lecturer </option>";
	echo "  <option id='title' value='Research Fellow' > Research Fellow </option>";
	echo "  <option id='title' value='Ph.D Student' > Ph.D Student </option>";
	echo "  <option id='title' value='Master Student' > Master Student </option>";
	echo "  <option id='title' value='Mr.' > Mr. </option>";
	echo "  <option id='title' value='Mrs.' > Mrs. </option>";
	echo "  <option id='title' value='Ms.' > Ms. </option>";
	echo "</select>";
	echo "</div></td></tr>

		<tr><td><font color='#800000' size=3><b>Affiliation</b></font></td> <td><font color='#800000' size=3><b> : </b></font></td><td> <input type=text name=instansi size=100 value=''  placeholder='Univ./Org.Co.'  style='border:1px solid #AEAEFF;height:30px;'></td></tr>
        <tr><td><font color='#800000' size=3><b>Department</b></font></td> <td><font color='#800000' size=3><b> : </b></font></td><td> <input type=text name=departemen size=100 value=''  placeholder='Full address of the Institution'  style='border:1px solid #AEAEFF;height:30px;'></td></tr>
		<tr><td><font color='#800000' size=3><b>City</b></font></td> <td><font color='#800000' size=3><b> : </b></font></td><td> <input type=text name=kota size=60 value=''  placeholder='Name of City'  style='border:1px solid #AEAEFF;height:30px;'></td></tr>
		<tr><td><font color='#800000' size=3><b>Country</b></font></td> <td><font color='#800000' size=3><b> : </b></font></td><td>";
	echo "<div id='pcountry'>";
	$queryngr="select a.kdnegara,a.nmnegara from negara a";		
	$qngr=mysqli_query($dbconnect,$queryngr) or die('query failed');
	echo "<select name='country' enabled style='height:30px;'>";
	echo " 	<option id='country' value=0> - Please Select - </option>";
		while ($ingr=mysqli_fetch_array($qngr))
 		{
			echo "<option id='country' value=$ingr[nmnegara]>$ingr[nmnegara]</option>";
		}
	echo "</select>";
	echo "</div></td></tr>
		<tr><td><font color='#800000' size=3><b>E-mail</b></font></td><td><font color='#800000' size=3><b> : </b></font></td><td> <input type=text name=email id=email size=30 value='' onblur='validasiEmail(this);' placeholder='Email' style='border:1px solid #AEAEFF;height:30px;'></td></tr>
		<tr><td><font color='#800000' size=3><b>Telephone (HP)</b></font></td>       <td><font color='#800000' size=3><b> : </b></font></td><td> <input type=text name=hp size=30 value=''  placeholder='Mobile phone number +62 8564123456' style='border:1px solid #AEAEFF;height:30px;'></td></tr>
		<tr><td><font color='#800000' size=3><b>Participation</td>       <td><font color='#800000' size=3><b> : </b></font></td><td> ";
	echo "<div id='participant'>";
	echo "<select name='participant' enabled style='height:30px;'>";
	echo " 	<option id='participant' value=0> - Please Select - </option>";
	echo "  <option id='participant' value='Lecture' > Lecture </option>";
	echo "  <option id='participant' value='Ph.D Student' > Ph.D Student </option>";
	echo "  <option id='participant' value='Master Student' > Master Student </option>";
	echo "  <option id='participant' value='Undergraduate Student' > Undergraduate Student </option>";
	echo "  <option id='participant' value='General' > General </option>";
	echo "</select>";
	echo "</div></td></tr>
        <tr><td><font color='#800000' size=3><b>Password</b></font></td>     <td><font color='#800000' size=3><b> : </b></font></td><td> <input type=password name=password1 value='' placeholder='Create Password' style='border:1px solid #AEAEFF;height:30px;'></td></tr>
        <tr><td><font color='#800000' size=3><b>Re-Type Password</b></font></td>     <td><font color='#800000' size=3><b> : </b></font></td><td> <input type=password name=password2 value='' placeholder='Re-Type Password' style='border:1px solid #AEAEFF;height:30px;'></td></tr>
		<tr><td align='center' colspan3><div id='cpath'><img src='./captcha.php'></div>
		<a  class='moseover' href='javascript:void(0)' onclick=javascript:Request('vcaptcha.php','','cpath')><img src='./icon/refresh1.png' width=12 height=12 title='Refresh'></a>
		</td></tr>
		<tr><td align='left' colspan3><input type=text name=kode placeholder='Kode Verifikasi' required='' style='border:1px solid #AEAEFF;height:30px;'></td></tr>
		<tr><td align='left' colspan=3><input type=hidden name=act value='save'><input class='button' type=submit value=SAVE>
        <input class='button' type=button value=CANCEL onclick='./index.php'></td></tr>
        </table>
        </form></center>";
	echo "</fieldset>";

mysqli_close($dbconnect);

//echo "<br><br><center><font color=red siz3=4><b>Registration is Closed</b></font></center>";

?>