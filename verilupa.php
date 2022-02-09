<?php
error_reporting(0);
//include "./config/koneksi.php";
$dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");
session_start();
include "templ.php";
include "menu.php";//742
{	$pjid=strlen($_GET['id']);
	if ($pjid>60){
		$tgl=Date("Y-m-d");
		$tanggale=substr($_GET['id'],0,32);
		$emaile=substr($_GET['id'],32,32);
		$tgle=md5($tgl);
		$edit=mysqli_query($dbconnect,"SELECT iduser,nmdepan,nmakhir,instansi,hp,idoto,passworda,passworde,status,tgldaftar FROM user WHERE emaile='$emaile'");
		$jlh=mysqli_num_rows($edit);
		$r=mysqli_fetch_array($edit);
		if ($tgle==$tanggale){
			if ($jlh>0){
				$utama .= "<fieldset><legend align='left' style='background:#FFFFFF;border:none'><img src='./icon/downarrow-1.png'> <font color='#FF8000' size=2><b>LUPA PASSWORD</b></font></legend>";
				$utama .= "<center><form id='tambahor' name='tambahor' method=POST action=javascript:sendRequest('savepass.php','','save',document.tambahor,'utama')  enctype='multipart/form-data'>
				<table width='80%'>
				<tr><td colspan=3><br></td></tr>
				<tr><td><font color=#6A0000><b>Password</b></font> </td><td> : </td><td> <input type=text name=password1 size=60 value='' placeholder='Password' style='border:1px solid #AEAEFF;'></td></tr>
				<tr><td><font color=#6A0000><b>Repeat Password</b></font> </td><td> : </td><td> <input type=text name=password2 size=60 value='' placeholder='Password' style='border:1px solid #AEAEFF;'></td></tr>
				<tr><td colspan=3 align=center><input type=hidden name=email size=60 value='$r[iduser]'><input class='button' type=submit value=Send><br></td></tr>
				</table>
				</form></center>";
				$utama .= "</fieldset>";
			}else{				
/*				echo "
				<SCRIPT LANGUAGE='JavaScript'>
				var x=alert('DATA KEDALUARSA..!');
				location.href='http://snma.fst.unair.ac.id';
				</SCRIPT>";
*/			}
		}

	}else{
		echo "
		<SCRIPT LANGUAGE='JavaScript'>
			var x=alert('DATA TIDAK VALID..!');
			location.href='http://snma.fst.unair.ac.id';
		</SCRIPT>
		";
	}
}
mysqli_close($dbconnect);
//include "./config/closekoneksi.php";
$tpl=new template;

$tpl -> define_theme("thememaster.htm");
$tpl -> define_tag("{mnu}",$mnu);
$tpl -> define_tag("{tglhari}",$tglhari);
$tpl -> define_tag("{headran}",$headran);
$tpl -> define_tag("{utama}",$utama);
$tpl -> define_tag("{kanan}",$kanan);
$tpl -> define_tag("{menu}",$menu);
$tpl -> define_tag("{content}",$index);
$tpl -> parse();
$tpl -> printproses(); 

?>
