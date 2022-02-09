<?php
error_reporting(0);
session_start();
//include "../config/koneksi.php";
$dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");
{
	$_SESSION['log']='33531';
	///=============== content  ===============
	$id=$_GET['id'];
	if ($id==0){
		$editjo = mysqli_query($dbconnect,"SELECT a.iduser,a.nmdepan,a.nmakhir,a.instansi,a.hp,a.idoto,a.passworda,a.passworde,a.status,a.tgldaftar,b.kdpeserta,b.statuspeserta,b.statusbayar,b.tglbayar,b.filebayar,b.ketbayar,c.fileppt FROM (user a left join peserta b on a.iduser=b.iduser) left join makalah c on a.iduser=c.iduser WHERE b.thnsnma=$_SESSION[thnsnma] and b.statuspeserta=$id");
		echo "<table width='80%' style='margin-left:0px;'>
				<tr><td align='left'><img src='../icon/pesertapemakalah.jpg'></td></tr></table>";
		echo  "<center>";
		echo "<br><br>";
		echo  "<table border=1 cellpadding=0 cellspacing=0 width='95%'>";
		$no=0;
		echo  "<tr><th style='background:#5F9ADC;'>No.</th><th style='background:#5F9ADC;'> Reg. Number </th><th style='background:#5F9ADC;'> Name of Participant </th><th style='background:#5F9ADC;'> Status of Participants </th><th style='background:#5F9ADC;'> PPT </th><th style='background:#5F9ADC;'> Payment Status </th><th style='background:#5F9ADC;'> Payment File </th><th style='background:#5F9ADC;'> Details </th></tr>";
		$warna='#FFFFFF';
		while ($dtjo=mysqli_fetch_array($editjo))
 		{	$no++;
			$nmdiv="ktbayar".$no;
			$stdiv="stbayar".$no;
			if ($dtjo['statuspeserta']==0){
				$peserta="Presenter";
			}else{
				$peserta="Non-Presenter";
			}
			if ($dtjo['statusbayar']==0){
				if ($_SESSION['level']==2){
				$bayar="<div id='$stdiv'><select name='statbayar' onchange=javascript:Request('bayar.php','$dtjo[iduser]','$nmdiv')>";
				$bayar.=" 	<option id='statbayar' value=0 selected> UNPAID </option>";
				$bayar.=" 	<option id='statbayar' value=1> PAID </option>";
				$bayar.="</select>";
				$bayar.="</div>";
				}else{
				$bayar="<select name='statbayar'>";
				$bayar.=" 	<option id='statbayar' value=0 selected> UNPAID </option>";
				$bayar.="</select>";
				}
			}else{
				$bayar="<div id='$stdiv'>";
				$bayar.="<select name='statbayar'>";
				$bayar.=" 	<option id='statbayar' value=1 selected> PAID </option>";
				$bayar.="</select>&nbsp;&nbsp;";
				if ($_SESSION['level']==2){
				$bayar.="<a href='kwitansi.php?id=$dtjo[iduser]' target='_blank'><img src='../icon/pdf.png'></a> <a href=javascript:Request('delkwitansi.php','$dtjo[iduser]','$stdiv') title='Delete'><img src='../icon/ed_delete.gif'></a>";
				}else{
				$bayar.="<a href='kwitansi.php?id=$dtjo[iduser]' target='_blank'><img src='../icon/pdf.png'></a>";
				}
				$bayar.="</div>";
			}

			if (!empty($dtjo['filebayar'])){
				$file="<a href='../images/$dtjo[filebayar]' target='_blank'><img src='../images/$dtjo[filebayar]' width=40 height=30></a>";
			}else{
				$file="";
			}
			if (!empty($dtjo['fileppt'])){
			    $ppt ="<a href='../berkas/$dtjo[fileppt]' target='_blank'><img src='../icon/ppt.png' width='30' height='25'></a>"; 
		    }else{
			    $ppt ="<font color=red size=2><b>-</b></font>";
		    }
			
			echo  "<tr><td width='5%' valign='middle' style='background:$warna;padding : 2px 2px 2px 5px;'> <font color=#C44000><b>$no.</b></font> </td><td width='10%' valign='middle' style='background:$warna;padding : 2px 2px 2px 5px;' width='15%' align='center'> <font color=#C44000><b>$dtjo[kdpeserta]</b></font> </td><td width='30%' valign='middle' style='background:$warna;padding : 2px 2px 2px 5px;' width='20%'> <font color=#C44000><b>$dtjo[nmdepan] $dtjo[nmakhir]</b></font> </td><td valign='middle' style='background:$warna;padding : 2px 2px 2px 5px;' width='10%'> <font color=#C44000><b>$peserta</b></font> </td><td valign='middle' align='center' style='background:$warna;padding : 2px 2px 2px 5px;' width='5%'> <font color=#C44000><b>$ppt</b></font> </td><td valign='middle' style='background:$warna;padding : 2px 2px 2px 5px;' width='10%' align='center'> <font color=#C44000><b>$bayar</b></font> </td><td valign='middle' align='center' style='background:$warna;border-right-style:none;padding : 2px 2px 2px 5px;' width='15%'> <font color=#C44000><b>$file</b></font> </td><td valign='middle' align='center' style='background:$warna;border-right-style:none;padding : 2px 2px 2px 5px;' width='15%'><a class='moseover' href='javascript:void(0)' onclick=javascript:sendRequest('ketbayar.php','$dtjo[iduser]','','','$nmdiv')>Details</a></td></tr>
			<tr><td colspan=7 align='center'><div id='$nmdiv'></div></td></tr>
			";
			if ($warna=='#B0DCFD'){
				$warna='#FFFFFF';
			}else{
				$warna='#B0DCFD';
			}
		}
		echo  "</table><br>";
		echo  "</center>";
	}elseif ($id==1){
		$editjo = mysqli_query($dbconnect,"SELECT a.iduser,a.nmdepan,a.nmakhir,a.instansi,a.hp,a.idoto,a.passworda,a.passworde,a.status,a.tgldaftar,b.kdpeserta,b.statuspeserta,b.statusbayar,b.tglbayar,b.filebayar,b.ketbayar FROM user a left join peserta b on a.iduser=b.iduser WHERE b.thnsnma=$_SESSION[thnsnma] and b.statuspeserta=$id");
		echo "<table width='80%' style='margin-left:0px;'>
				<tr><td align='left'><img src='../icon/pesertanonpemakalah.jpg'></td></tr></table>";
		echo  "<center>";
		echo "<br><br>";
		echo  "<table border=1 cellpadding=0 cellspacing=0 width='95%'>";
		$no=0;
        echo  "<tr><th style='background:#5F9ADC;'>No.</th><th style='background:#5F9ADC;'> Reg. Number </th><th style='background:#5F9ADC;'> Name of Participant </th><th style='background:#5F9ADC;'> Status of Participants </th><th style='background:#5F9ADC;'> Payment Status </th><th style='background:#5F9ADC;'> Payment File </th><th style='background:#5F9ADC;'> Details </th></tr>";
		$warna='#FFFFFF';
		while ($dtjo=mysqli_fetch_array($editjo))
 		{	
			$no++;
			$nmdiv='ktbayar'.$no;
			$stdiv="stbayar".$no;
			if ($dtjo['statuspeserta']==0){
				$peserta="Presenter";
			}else{
				$peserta="Non-Presenter";
			}
			if ($dtjo['statusbayar']==0){
				if ($_SESSION['level']==2){
				$bayar="<div id='$stdiv'><select name='statbayar' onchange=javascript:Request('bayar.php','$dtjo[iduser]','$nmdiv')>";
				$bayar.=" 	<option id='statbayar' value=0 selected> UNPAID </option>";
				$bayar.=" 	<option id='statbayar' value=1> PAID </option>";
				$bayar.="</select>";
				$bayar.="</div>";
				}else{
				$bayar="<select name='statbayar'>";
				$bayar.=" 	<option id='statbayar' value=0 selected> UNPAID </option>";
				$bayar.="</select>";
				}
			}else{
				$bayar="<div id='$stdiv'>";
				$bayar.="<select name='statbayar'>";
				$bayar.=" 	<option id='statbayar' value=1 selected> PAID </option>";
				$bayar.="</select>&nbsp;&nbsp;";
				if ($_SESSION['level']==2){
				$bayar.="<a href='kwitansi.php?id=$dtjo[iduser]' target='_blank'><img src='../icon/pdf.png'></a> <a href=javascript:Request('delkwitansi.php','$dtjo[iduser]','$stdiv') title='Delete'><img src='../icon/ed_delete.gif'></a>";
				}else{
				$bayar.="<a href='kwitansi.php?id=$dtjo[iduser]' target='_blank'><img src='../icon/pdf.png'></a>";
				}
				$bayar.="</div>";
			}

			if (!empty($dtjo['filebayar'])){
				$file="<a href='../images/$dtjo[filebayar]' target='_blank'><img src='../images/$dtjo[filebayar]' width=40 height=30></a>";
			}else{
				$file="";
			}
			echo  "<tr><td width='5%' valign='middle' style='background:$warna;padding : 2px 2px 2px 5px;'> <font color=#C44000><b>$no.</b></font> </td><td width='10%' valign='middle' style='background:$warna;padding : 2px 2px 2px 5px;' width='20%' align='center'> <font color=#C44000><b>$dtjo[kdpeserta]</b></font> </td><td width='30%' valign='middle' style='background:$warna;padding : 2px 2px 2px 5px;' width='20%'> <font color=#C44000><b>$dtjo[nmdepan] $dtjo[nmakhir]</b></font> </td><td valign='middle' style='background:$warna;padding : 2px 2px 2px 5px;' width='10%'> <font color=#C44000><b>$peserta</b></font> </td><td valign='middle' style='background:$warna;padding : 2px 2px 2px 5px;' width='10%' align='center'> <font color=#C44000><b>$bayar</b></font> </td><td valign='middle' align='center' style='background:$warna;border-right-style:none;padding : 2px 2px 2px 5px;' width='15%'> <font color=#C44000><b>$file</b></font> </td><td valign='middle' align='center' style='background:$warna;border-right-style:none;padding : 2px 2px 2px 5px;' width='15%'><a class='moseover' href='javascript:void(0)' onclick=javascript:sendRequest('ketbayar.php','$dtjo[iduser]','','','$nmdiv')>Details</a></td></tr>
			<tr><td colspan=7 align='center'><div id='$nmdiv'></div></td></tr>
			";
			if ($warna=='#B0DCFD'){
				$warna='#FFFFFF';
			}else{
				$warna='#B0DCFD';
			}
		}
		echo  "</table><br>";
		echo  "</center>";		
	}elseif ($id==2){
		$editjo = mysqli_query($dbconnect,"SELECT a.iduser,a.nmdepan,a.nmtengah,a.nmakhir,a.instansi,a.hp,a.idoto,a.passworda,a.passworde,a.status,a.tgldaftar,b.kdpeserta,b.statuspeserta,b.statusbayar,b.tglbayar,b.filebayar,b.ketbayar FROM user a left join peserta b on a.iduser=b.iduser WHERE b.thnsnma=$_SESSION[thnsnma]");
		echo "<table width='80%' style='margin-left:0px;'>
				<tr><td align='left'><img src='../icon/peserta.jpg'></td></tr></table>";
		echo "<center>";
		echo "<br><br>";
		echo  "<table border=1 cellpadding=0 cellspacing=0 width='95%'>";
		$no=0;
        echo  "<tr><th style='background:#5F9ADC;'>No.</th><th style='background:#5F9ADC;'> Reg. Number </th><th style='background:#5F9ADC;'> Name of Participant </th><th style='background:#5F9ADC;'> Status of Participants </th><th style='background:#5F9ADC;'>Payment Status</th><th style='background:#5F9ADC;'>File</th><th style='background:#5F9ADC;'> Details </th></tr>";
		$warna='#FFFFFF';
		while ($dtjo=mysqli_fetch_array($editjo))
 		{	
			$no++;
			$nmdiv='ktbayar'.$no;
			$stdiv="stbayar".$no;
			if ($dtjo['statuspeserta']==0){
				$peserta="Presenter";
			}else{
				$peserta="Non-Presenter";
			}
			if ($dtjo['statusbayar']==0){
				if ($_SESSION['level']==2){
				$bayar="<div id='$stdiv'><select name='statbayar' onchange=javascript:Request('bayar.php','$dtjo[iduser]','$nmdiv')>";
				$bayar.=" 	<option id='statbayar' value=0 selected> UNPAID </option>";
				$bayar.=" 	<option id='statbayar' value=1> PAID </option>";
				$bayar.="</select>";
				$bayar.="</div>";
				}else{
				$bayar="<select name='statbayar'>";
				$bayar.=" 	<option id='statbayar' value=0 selected> UNPAID </option>";
				$bayar.="</select>";
				}
			}else{
				$bayar="<div id='$stdiv'>";
				$bayar.="<select name='statbayar'>";
				$bayar.=" 	<option id='statbayar' value=1 selected> PAID </option>";
				$bayar.="</select>&nbsp;&nbsp;";
				if ($_SESSION['level']==2){
				$bayar.="<a href='kwitansi.php?id=$dtjo[iduser]' target='_blank'><img src='../icon/pdf.png'></a> <a href=javascript:Request('delkwitansi.php','$dtjo[iduser]','$stdiv') title='Delete'><img src='../icon/ed_delete.gif'></a>";
				}else{
				$bayar.="<a href='kwitansi.php?id=$dtjo[iduser]' target='_blank'><img src='../icon/pdf.png'></a>";
				}
				$bayar.="</div>";
			}
			if (!empty($dtjo['filebayar'])){
				$file="<a href='../images/$dtjo[filebayar]' target='_blank'><img src='../images/$dtjo[filebayar]' width=40 height=30></a>";
			}else{
				$file="";
			}
			echo  "<tr><td width='5%' valign='middle' style='background:$warna;padding : 2px 2px 2px 5px;'> <font color=#C44000><b>$no.</b></font> </td><td width='10%' valign='middle' style='background:$warna;padding : 2px 2px 2px 5px;' width='20%' align='center'> <font color=#C44000><b>$dtjo[kdpeserta]</b></font> </td><td width='30%' valign='middle' style='background:$warna;padding : 2px 2px 2px 5px;' width='20%'> <font color=#C44000><b>$dtjo[nmdepan] $dtjo[nmakhir]</b></font> </td><td valign='middle' style='background:$warna;padding : 2px 2px 2px 5px;' width='10%'> <font color=#C44000><b>$peserta</b></font> </td><td valign='middle' style='background:$warna;padding : 2px 2px 2px 5px;' width='10%' align='center'> <font color=#C44000><b>$bayar</b></font> </td><td valign='middle' align='center' style='background:$warna;border-right-style:none;padding : 2px 2px 2px 5px;' width='7%'> <font color=#C44000><b>$file</b></font> </td><td valign='middle' align='center' style='background:$warna;border-right-style:none;padding : 2px 2px 2px 5px;' width='7%'><a class='moseover' href='javascript:void(0)' onclick=javascript:sendRequest('ketbayar.php','$dtjo[iduser]','','','$nmdiv')>Details</a></td></tr>
			<tr><td colspan=7 align='center'><div id='$nmdiv'></div></td></tr>
			";
			if ($warna=='#B0DCFD'){
				$warna='#FFFFFF';
			}else{
				$warna='#B0DCFD';
			}
		}
		echo  "</table><br>";
		echo  "</center>";		
	}elseif ($id==3){
		$editjo = mysqli_query($dbconnect,"SELECT a.iduser,a.nmdepan,a.nmtengah,a.nmakhir,b.status,b.papperid,b.judul,b.idkategori,c.kdpeserta FROM (user a right join makalah b on a.iduser=b.iduser) left join peserta c on b.iduser=c.iduser WHERE b.thnsnma=$_SESSION[thnsnma]");
		echo "<table width='80%' style='margin-left:0px;'><tr><td align='left'><img src='../icon/peserta.jpg'></td></tr></table>";
//		echo "<center>";
		echo "<br><br>";
		echo "<table border=1 cellpadding=0 cellspacing=0 width='95%'>";
		$no=0;
		echo "<tr><th style='background:#5F9ADC;'>No.</th><th style='background:#5F9ADC;'> Reg. Number </th><th style='background:#5F9ADC;'> Name of Participant </th><th style='background:#5F9ADC;'> ID Paper </th><th style='background:#5F9ADC;'> Status of Paper </th><th style='background:#5F9ADC;' width='60'> Details </th></tr>";
		$warna='#FFFFFF';
		while ($dtjo=mysqli_fetch_array($editjo))
 		{	
			$no++;
			$stdiv="stbayar".$no;
			$nmdiv='ktbayar'.$no;
			if ($dtjo['statuspeserta']==0){
				$peserta="Presenters";
			}else{
				$peserta="Non-Presenters";
			}
			$querystat="select a.idstatus,a.nmstatus from statusmakalah a";		
			$qstat=mysqli_query($dbconnect,$querystat) or die('query failed');
			$bayar="<div id='$stdiv'><select name='statpaper' onchange=javascript:EditRequest('$dtjo[papperid]',this,'savestpaper.php','$nmdiv')>";
			$bayar.="<option id='statpaper' value=0> - </option>";
			while ($istat=mysqli_fetch_array($qstat))
 			{
				if ($istat[idstatus]==$dtjo[status]){
					$bayar.="<option id='statpaper' value=$istat[idstatus] selected>$istat[nmstatus]</option>";
				}else{
					$bayar.="<option id='statpaper' value=$istat[idstatus]>$istat[nmstatus]</option>";
				}
			}
			$bayar.="</select>";
			$bayar.="</div>";
			echo  "<tr><td width='5%' valign='middle' style='background:$warna;padding : 2px 2px 2px 5px;'> <font color=#C44000><b>$no.</b></font> </td><td width='10%' valign='middle' style='background:$warna;padding : 2px 2px 2px 5px;' width='20%' align='center'> <font color=#C44000><b>$dtjo[kdpeserta]</b></font> </td><td width='30%' valign='middle' style='background:$warna;padding : 2px 2px 2px 5px;' width='20%'> <font color=#C44000><b>$dtjo[nmdepan] $dtjo[nmakhir]</b></font> </td><td valign='middle' style='background:$warna;padding : 2px 2px 2px 5px;' width='10%'> <font color=#C44000><b>$dtjo[papperid]</b></font> </td><td valign='middle' style='background:$warna;padding : 2px 2px 2px 5px;' width='10%'> <font color=#C44000><b>$bayar</b></font> </td><td valign='middle' align='center' style='background:$warna;border-right-style:none;padding : 2px 2px 2px 5px;' width='15%'><a class='moseover' href='javascript:void(0)' onclick=javascript:sendRequest('ketbayar.php','$dtjo[iduser]','','','$nmdiv')>Details</a></td></tr>
			    <tr><td colspan=6 align='center'><div id='$nmdiv'></div></td></tr>
			";
			if ($warna=='#B0DCFD'){
				$warna='#FFFFFF';
			}else{
				$warna='#B0DCFD';
			}
		}
		echo  "</table><br>";
//		echo  "</center>";		
	}
	
}
mysqli_close($dbconnect);
//include "../config/closekoneksi.php";
echo  "</div>";
//================ batas content =================
?>
