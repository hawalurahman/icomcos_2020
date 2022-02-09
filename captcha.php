<?php
error_reporting(0);
session_start();
header("Content-type: image/png");
$bg = array("captcha1.png","captca1.png","captlava1.png",
										"captleav1.png");
$tc1=array(25,100,170,150,13,200);
$tc2=array(250,50,150,25,99,250);
$tc3=array(25,135,150,150,00,200);

srand(time());
$random = (rand()%4);
$rdmc = (rand()%6);

$captcha_image = imagecreatefrompng("counter/$bg[$random]");
$captcha_font = imageloadfont("counter/font.gdf");
$captcha_text = substr(md5(uniqid('')),-6,6);

$_SESSION['captcha_session'] = $captcha_text;
$captcha_color = imagecolorallocate($captcha_image,$tc1[$rdmc],$tc2[$rdmc],$tc3[$rdmc]);
imagestring($captcha_image,$captcha_font,15,5,$captcha_text,$captcha_color);
imagepng($captcha_image);
imagedestroy($captcha_image);
?>
