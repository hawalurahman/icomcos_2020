<?php
//include "templ.php";
//include "menu.php";

//include "../config/koneksi.php";
 	session_start(); 
  	session_destroy();
	header('location:../');
//include "../config/closekoneksi.php";

//$index .="</div>";
/*
$tpl=new template;
$tpl -> define_theme("thememaster.htm");
$tpl -> define_tag("{mnu}",$mnu);
$tpl -> define_tag("{tglhari}",$tglhari);
$tpl -> define_tag("{menu1}",$menu1);
$tpl -> define_tag("{menu2}",$menu2);
$tpl -> define_tag("{menu}",$menu);
$tpl -> define_tag("{content}",$index);
$tpl -> parse();
$tpl -> printproses(); 
*/
?>
<!--  -->