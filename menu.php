<?php
//include "./config/koneksi.php";
$mnu ="<font size='2' color='#FFFFFF'><b><a href='./index.php'>HOME</a>&nbsp;&nbsp;&nbsp;&nbsp; <font color=#5300A6><b>|</b></font> &nbsp;&nbsp;&nbsp;&nbsp;<a class='moseover' href='javascript:void(0)' onclick=javascript:Request('jadual.php','','utama') title='Important Dates'>IMPORTANT DATES</a>&nbsp;&nbsp;&nbsp;&nbsp; <font color=#5300A6><b>|</b></font> &nbsp;&nbsp;&nbsp;&nbsp;<a class='moseover' href='javascript:void(0)' onclick=javascript:Request('konstribusi.php','','utama') title='Fee&Payment'> FEES & PAYMENT</a>&nbsp;&nbsp;&nbsp;&nbsp; <font color=#5300A6><b>|</b></font> &nbsp;&nbsp;&nbsp;&nbsp;<a class='moseover' href='javascript:void(0)' onclick=javascript:Request('submission.php','','utama') title='Submission&Registration'>SUBMISSION & REGISTRATION</a>&nbsp;&nbsp;&nbsp;&nbsp; <font color=#5300A6><b>|</b></font> &nbsp;&nbsp;&nbsp;&nbsp;<a class='moseover' href='javascript:void(0)' onclick=javascript:Request('committe.php','','utama') title='Commitee'>COMMITTEE</a>&nbsp;&nbsp;&nbsp;&nbsp; <font color=#5300A6><b>|</b></font> &nbsp;&nbsp;&nbsp;&nbsp;<a class='moseover' href='javascript:void(0)' onclick=javascript:Request('keynote.php','','utama') title='Keynote Speaker'>KEYNOTE SPEAKER</a>&nbsp;&nbsp;&nbsp;&nbsp; <font color=#5300A6><b>|</b></font> &nbsp;&nbsp;&nbsp;&nbsp;<a class='moseover' href='javascript:void(0)' onclick=javascript:Request('venue.php','','utama') title='Venue'>VENUE</a>";


$kanan="<fieldset width='80%' align=center style='padding-left:15px;'><legend align='left' style='background:#FFFFFF;border:none'><img src='./icon/downarrow-1.png'> <font color='#FF8000' size=2><b>FORM LOGIN</b></font></legend><br>
            <center><table><tr><td align=center style='padding-left:15px;'>
			<form method=POST action=cek_login.php>
			<table style='font-family: Arial, Helvetica, sans-serif;padding-left:15px;padding-right:15px;border-color:#ff00ff;' width='100%'>
			<tr><td align='left'><input type=text name=username size=30 placeholder='Email' required=''></td></tr>
			<tr><td align='left'><br><input type=password name=password size=30 placeholder='Password' required=''></td></tr>
			<tr><td align='left'><br><input  class='button' type=submit name=masuk value=Login>&nbsp;&nbsp;&nbsp;&nbsp;<input class='button'  type=submit name=masuk value=Forget onclick=javascript:Request('lupa.php','','utama')>&nbsp;&nbsp;&nbsp;&nbsp;<input class='button'  type=submit name=masuk value=Registration onclick=javascript:Request('daftar.php','','utama')><br><br></td></tr></table>
			</form></td></tr></table></center></fieldset>
		<br><br>";

$kanan .="<fieldset width='80%' style='padding-left:15px;'><legend align='left' style='background:#FFFFFF;border:none'><img src='./icon/downarrow-1.png'> <font color='#FF8000' size=2><b>SEARCH PARTICIPANTS</b></font></legend><br>
        <table style='border-color:#ff00ff;' width='100%'>
		<tr><td style='padding-left:15px;'>
		<form id='cariok' name='cariok' method=POST action=javascript:cariRequest('cekcari.php',document.cariok,'utama')>
			<input id=cari name=cari type=text size=40 style='height:30px;'/>&nbsp;<input name=search type=submit style='height:30px;' value=Search>
		</form>
		</td></tr></table>
		<br></fieldset>
		<br>
";

$kanan .="<table style='border-color:#ff00ff;' width='100%'>
        <tr><td><hr width='100%' size='3' align='left' color='#800000'><br></td><tr>
		<tr><td style='font-family: Arial, Helvetica, sans-serif;padding-left:15px;padding-right:15px;padding-left:25px;'>
		<font color=#5300A6 size=4><b>Download</b></font><br>
		<font color=#000000 size=3>
		<ul>
		<li><a href='./berkas/BookofAbstractICoMCoS2020.pdf' target='_blank'>Book of Abstract ICoMCoS 2020</a> <font color=red size=1><i><b>New</b></i></font></li>
		<li><a href='./berkas/conference_schedule_icomcos2020.jpeg' target='_blank'>Conference Schedule</a> <font color=red size=1><i><b>New</b></i></font></li>
		<li><a href='./berkas/Template_IcomCos.pptx' target='_blank'>Template PPT</a> <font color=red size=1><i><b>New</b></i></font></li>
		<li><a href='./berkas/postericomcosonline.jpeg' target='_blank'>Poster IComCos</a></li>
		<li><a href='./berkas/8x11WordTemplates.zip' target='_blank'>Full Paper Template</a></li>
		<li><a href='./berkas/R-INLA-1024x1024.jpeg' target='_blank'>Poster Workshop R-INLA</a></li>
		</ul>
		</font>
		</td></tr></table>
		<br><br>";

$kanan .="<table style='border-color:#ff00ff;'>
		<tr><td style='font-family: Arial, Helvetica, sans-serif;padding-left:15px;padding-right:15px;'>
		<font color=#5300A6 size=4><b>Secretariat</b></font><br>
		<font color=#000000 size=3>Department of Mathematics<br>
		Faculty of Science and Technology <br>
		Airlangga University
		Kampus C, Mulyorejo Surabaya (60115)<br>
		Telephone. +62(031)5936501, +62(031)5936502<br>
		Fax. +62(031)5936502<br>
		<b>Email : <a href='mailto:icomcos@fst.unair.ac.id'>icomcos@fst.unair.ac.id</a></b></font><br><br>";

$kanan .="<font color=#5300A6 size=4><b>Contact Person</b></font><br>
		<font color=#000000 size=3><b>Purbandini, +6285230045971</b></font><br>
		<font color=#2020FF><b><i>(Whatsapp, Phone)</i></b></font><br><br>
		<font color=#000000 size=3><b>Abdulloh Jaelani, +6285852136447</b></font><br>
		<font color=#2020FF><b><i>(Whatsapp, Phone)</i></b></font><br><br><br>";

$kanan .="<center>
			<br>
			<hr width='100%' size='3' align='left' color='#800000'><br>
			<font color=#5300A6 size=4><b>Supported By</b></font><br>
			<img src='./icon/noimage.png' width='70%' height='70%'><br>		
			</center>
		</td></tr></table>";

// cellspacing='0' cellpadding='0'
/*  width='100' height='75'
$kanan="
			<font color=#5300A6 size=4><b>FORM LOGIN</b></font><br>
			<form method=POST action=cek_login.php>
			<table style='border-color:#ff00ff;' width='100%'>
			<tr><td align='left'><input type=text name=username size=30 placeholder='Email' required=''></td></tr>
			<tr><td align='left'><br><input type=password name=password size=30 placeholder='Password' required=''></td></tr>
			<tr><td align='left'><br><input  class='button' type=submit name=masuk value=Login>&nbsp;&nbsp;&nbsp;&nbsp;<input class='button'  type=submit name=masuk value=Lupa onclick=javascript:Request('lupa.php','','utama')>&nbsp;&nbsp;&nbsp;&nbsp;<input class='button'  type=submit name=masuk value=Daftar onclick=javascript:Request('daftar.php','','utama')><br><br></td></tr></table>
			</form>
		<br><br>";
/*
			<tr><td align='left'><img src='./captcha.php'></td></tr>
			<tr><td align='left'><input type=text name=kode placeholder='Kode Verifikasi' required=''></td></tr>


$kanan .="<table style='border-color:#ff00ff;' width='100%'>
		<tr><td>
		<font color=#5300A6 size=4><b>Download</b></font><br>
		<ul>
		<li><a href='./images/brosur_snma2017_fst_unair.zip'>Poster</a></li>
		<li><a href='./berkas/Template_abstrak_SNMA2017.docx'>Format Abstrak</a></li>
		<li><a href='./berkas/Template_fullpaperSNMA2017.docx'>Format Fullpaper</a></li>
		</ul>
		</td></tr></table>
		<br><br>";

$kanan .="<font color=#5300A6 size=4><b>Secretariat</b></font><br>
		Department of Mathematics<br>
		Faculty of Science and Technology <br>
		Airlangga University
		Kampus C, Mulyorejo Surabaya (60115)<br>
		Telephone. (031) 5936501, 5936502<br>
		Fax. (031)5936502<br>
		Email : <a href='mailto:icomcos2020@fst.unair.ac.id'>icomcos2020@fst.unair.ac.id</a><br><br>";

$kanan .="<font color=#5300A6 size=4><b>Contact Person</b></font><br>
		<font color=#800000><b>Purbandini, 085230045971</b></font><br>
		<font color=#2020FF><b><i>(WA, Line, SMS, Telephone)</i></b></font><br><br>
		<font color=#800000><b>Marisa, 085648266260</b></font><br>
		<font color=#2020FF><b><i>(WA, Line, SMS, Telephone)</i></b></font><br><br>";

*/
?>
