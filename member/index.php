<?php
error_reporting(0);
session_start(); 
//include "./config/koneksi.php";
include "templ.php";
include "menu.php";//742
if (!empty($_SESSION[log])){
// width='100%' height='100%'
$utama = "<center>
			<table width='100%'>
			<tr><td align='left'><img src='../icon/homeputih.jpg'></td></tr>
			<tr><td align='center'><img src='../icon/icomcos2020_br.png' width='60%' height='60%'><br><br></td></tr>
			<tr><td align=center  style='line-height:3.0em;'><font color=#800000 size=6><b>INTERNATIONAL CONFERENCE on MATHEMATICS, <br>COMPUTATIONAL SCIENCES AND STATISTICS 2020</b></font><br>
			<font color=#000040 size=5><b>29<sup>th</sup> September, 2020 <font color=#FFCC33><b>|</b></font> Surabaya, Indonesia</b></font>
			</td></tr>
			<tr>
				<td align='center'>
					<br>
					<font color=#F20000 size=6 style='font-family: Cambria,Times New Roman,serif;'>
						<b>Mathematics, Computational Sciences and Statistics for Better Future</b>
					</font>
				</td>
			</tr>
			<tr>
			</table>
		</center>";
}else{
    header('location:../');
}
//$utama .= "</div>";
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
<!--  -->