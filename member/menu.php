<?php
session_start(); 
//include "../config/koneksi.php";
$dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");
$cekpeserta=mysqli_query($dbconnect,"SELECT iduser,thnsnma,statuspeserta,statusbayar,tglbayar,filebayar FROM peserta WHERE iduser='$_SESSION[iduser]' AND thnsnma=$_SESSION[thnsnma]");
$rcek=mysqli_fetch_array($cekpeserta);

$cekppt=mysqli_query($dbconnect,"SELECT iduser,thnsnma,fileppt FROM makalah WHERE iduser='$_SESSION[iduser]' AND thnsnma=$_SESSION[thnsnma]");
$pptcek=mysqli_fetch_array($cekppt);
$jlh=mysqli_num_rows($cekpeserta);

$mnu ="<font size='2' color='#FFFFFF'><b><a href='./index.php'>HOME</a>&nbsp;&nbsp;&nbsp;&nbsp; <font color=#5300A6><b>|</b></font> &nbsp;&nbsp;&nbsp;&nbsp;<a class='moseover' href='javascript:void(0)' onclick=javascript:Request('jadual.php','','utama') title='Important Dates'>IMPORTANT DATES</a>&nbsp;&nbsp;&nbsp;&nbsp; <font color=#5300A6><b>|</b></font> &nbsp;&nbsp;&nbsp;&nbsp;<a class='moseover' href='javascript:void(0)' onclick=javascript:Request('konstribusi.php','','utama') title='Fee&Payment'> FEE & PAYMENT</a>&nbsp;&nbsp;&nbsp;&nbsp; <font color=#5300A6><b>|</b></font> &nbsp;&nbsp;&nbsp;&nbsp;<a class='moseover' href='javascript:void(0)' onclick=javascript:Request('submission.php','','utama') title='Submission&Registration'>SUBMISSION & REGISTRASION</a>&nbsp;&nbsp;&nbsp;&nbsp; <font color=#5300A6><b>|</b></font> &nbsp;&nbsp;&nbsp;&nbsp;<a class='moseover' href='javascript:void(0)' onclick=javascript:Request('committe.php','','utama') title='Commitee'>COMMITEE</a>&nbsp;&nbsp;&nbsp;&nbsp; <font color=#5300A6><b>|</b></font> &nbsp;&nbsp;&nbsp;&nbsp;<a class='moseover' href='javascript:void(0)' onclick=javascript:Request('keynote.php','','utama') title='Keynote Speaker'>KEYNOTE SPEAKER</a>&nbsp;&nbsp;&nbsp;&nbsp; <font color=#5300A6><b>|</b></font> &nbsp;&nbsp;&nbsp;&nbsp;<a class='moseover' href='javascript:void(0)' onclick=javascript:Request('venue.php','','utama') title='Venue'>VENUE</a>";

// cellspacing='0' cellpadding='0'

$jlhnotif=mysqli_num_rows(mysqli_query($dbconnect,"SELECT idpesan FROM pesanmasuk WHERE penerima='$_SESSION[iduser]' and (tgldibaca IS NULL)"));
if ($jlhnotif==0){
    $_SESSION[jlhno]="";
}else{
    $_SESSION[jlhno]=$jlhnotif;
}

if ($_SESSION['level']==1){
$login="<a href='javascript:void(0)' onclick=javascript:Request('cnt_pesan.php','','utama') title='Notification Under construction'><img src='../icon/notifikasi.png' width='15' height='15'><sup><font color=red><b>$_SESSION[jlhno]</b></font></sup></a> <font color=#0000A0><b>$_SESSION[namauser] $_SESSION[namauserblk]</b></font> (<font color=#800000><b>PESERTA</b></font>)<br> <a href='./logout.php'><font color=red><b>LOG-OUT</b></font></a>";
}elseif (($_SESSION['level']==0)OR($_SESSION['level']==2)){
$login="<a href='javascript:void(0)' onclick=javascript:Request('cnt_pesan.php','','utama') title='Notification Under construction'><img src='../icon/notifikasi.png' width='15' height='15'><sup><font color=red><b>$_SESSION[jlhno]</b></font></sup></a> <font color=#0000A0><b>$_SESSION[namauser] $_SESSION[namauserblk]</b></font> (<font color=#800000><b>PANITIA</b></font>)<br><a href='./logout.php'><font color=red><b>LOG-OUT</b></font></a>";
}elseif ($_SESSION['level']==3){
$login="<a href='javascript:void(0)' onclick=javascript:Request('cnt_pesan.php','','utama') title='Notification Under construction'><img src='../icon/notifikasi.png' width='15' height='15'><sup><font color=red><b>$_SESSION[jlhno]</b></font></sup></a> <font color=#0000A0><b>$_SESSION[namauser] $_SESSION[namauserblk]</b></font> (<font color=#800000><b>TIM REVIEWER</b></font>)<br><a href='./logout.php'><font color=red><b>LOG-OUT</b></font></a>";
}

if ($_SESSION['level']==1){
$kanan ="<table style='border-color:#ff00ff;' width='100%'>
		<tr><td style='font-family: Arial, Helvetica, sans-serif;padding-left:15px;padding-right:15px;'>
		<font color=#5300A6 size=4><b>PARTICIPANTS</b></font><br>
		<ul>";
		$kanan .="<li><a class='moseover' href='javascript:void(0)' onclick=javascript:Request('datadiripeserta.php','','utama')  title='Select Membership'>Personal data</a></li>";
		if ((($rcek['statuspeserta']!=0) and($rcek['statuspeserta']!=1))or($jlh==0)){
//			$kanan .="<li><a class='moseover' href='javascript:void(0)' onclick=javascript:Request('cnt_user.php','','utama')  title='Select Membership'>Participation</a></li>";
		}elseif ($rcek['statuspeserta']==0){
			if ($rcek['statusbayar']==0){
				$kanan .="<li><a class='moseover' href='javascript:void(0)' onclick=javascript:Request('uploadbuktibayar.php','','utama')  title='Select the Proof of Pay File'>Upload Proof of Pay</a></li>";
			}else{
				$kanan .="<li> <font color=blue><b>Payment <font color=red>PAID</font></b></font>&nbsp;&nbsp;<a href='kwitansi.php?id=$rcek[iduser]' target='_blank'><img src='../icon/pdf.png'></a></li>";	
			}
		    if (!empty($pptcek['fileppt'])){
			    $kanan .="<li> <font color=blue><b>File <font color=red>Presentation : </font></b></font>&nbsp;<a href='../berkas/$pptcek[fileppt]' target='_blank'><img src='../icon/ppt.png' width='30' height='25'></a></li>";		    
		    }else{
			    $kanan .="<li><a class='moseover' href='javascript:void(0)' onclick=javascript:Request('uploadppt.php','','utama')  title='Select Presentation File'>Upload Presentation</a> <font color=red size=1><i><b>New</b></i></font></li>";
		    }
		}elseif ($rcek['statuspeserta']==1){
			if ($rcek['statusbayar']==0){
				$kanan .="<li><a class='moseover' href='javascript:void(0)' onclick=javascript:Request('uploadbuktibayar.php','','utama')  title='Select the Proof of Pay File'>Upload Proof of Pay</a></li>";
			}else{
				$kanan .="<li> <font color=blue><b>Payment <font color=red>PAID</font></b></font>&nbsp;&nbsp;<a href='kwitansi.php?id=$rcek[iduser]' target='_blank'><img src='../icon/pdf.png'></a></li>";	
			}
		}
		
	$kanan .="</ul>
		</td></tr></table>
		<br><br>";
//		<li><a href='#'>Pemakalah</a></li>
//		<li><a href='#'>Non-Pemakalah</a></li>
}elseif (($_SESSION['level']==0)OR($_SESSION['level']==2)){
	$kanan ="<table style='border-color:#ff00ff;' width='100%'>
		<tr><td style='font-family: Arial, Helvetica, sans-serif;padding-left:15px;padding-right:15px;'>
		<font color=#5300A6 size=4><b>PARTICIPANTS</b></font><br>
		<ul>";
	$kanan .="<li><a class='moseover' href='javascript:void(0)' onclick=javascript:Request('ent_user.php',2,'utama')  title='Pilih Kepesertaan'>Participant</a></li>";
	$kanan .="<li><a class='moseover' href='javascript:void(0)' onclick=javascript:Request('ent_user.php',0,'utama')  title='Pilih Kepesertaan'>Speaker</a> <font color=red size=1><i><b>New PPT</b></i></font></li>";
	$kanan .="<li><a class='moseover' href='javascript:void(0)' onclick=javascript:Request('ent_user.php',1,'utama')  title='Pilih Kepesertaan'>Non Speakers</a></li>";
	$kanan .="</ul>
		</td></tr></table>
		<br><br>";
}elseif ($_SESSION['level']==3){
	$kanan ="<table style='border-color:#ff00ff;' width='100%'>
		<tr><td style='font-family: Arial, Helvetica, sans-serif;padding-left:15px;padding-right:15px;'>
		<font color=#5300A6 size=4><b>PAPER PARTICIPANTS</b></font><br>
		<ul>";
	$kanan .="<li><a class='moseover' href='javascript:void(0)' onclick=javascript:Request('ent_user.php',3,'utama')  title='Update Status Paper'>Speaker</a></li>";
	$kanan .="</ul>
		</td></tr></table>
		<br><br>";

}

$kanan .="<table style='border-color:#ff00ff;' width='100%'>
		<tr><td style='font-family: Arial, Helvetica, sans-serif;padding-left:15px;padding-right:15px;padding-left:25px;'>
		<font color=#5300A6 size=4><b>Download</b></font><br>
		<font color=#000000 size=3>
		<ul>
		<li><a href='../berkas/Template_IcomCos.pptx' target='_blank'>Template PPT</a> <font color=red size=1><i><b>New</b></i></font></li>
		<li><a href='../berkas/postericomcosonline.jpeg' target='_blank'>Poster</a></li>
		<li><a href='../berkas/8x11WordTemplates.zip' target='_blank'>Full Paper Template</a></li>
		</ul>
		</font>
		</td></tr></table>
		<br><br>";

$kanan .="<table style='border-color:#ff00ff;'>
        <tr><td style='font-family: Arial, Helvetica, sans-serif;padding-left:15px;padding-right:15px;'><hr width='100%' size='3' align='left' color='#800000'><br></td><tr>
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
			<img src='../icon/noimage.png' width='70%' height='70%'><br>		
			</center>
		</td></tr></table>";

mysqli_close($dbconnect);
?>
