<?php
error_reporting(0);
session_start();
//include "../config/koneksi.php";
$dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");
		$iduser=$_GET['id'];
		$iddiv=$_GET['iddiv'];
		$jlpeserta = mysqli_num_rows(mysqli_query($dbconnect,"SELECT a.iduser,a.thnsnma FROM peserta a WHERE a.thnsnma=$_SESSION[thnsnma] and a.iduser='$iduser'"));

		$editjo = mysqli_query($dbconnect,"SELECT a.iduser,a.nmdepan,a.nmtengah,nmakhir,a.title,a.instansi,a.departemen,a.kota,a.country,a.participant, a.hp,a.idoto,a.passworda,a.passworde,a.status,a.tgldaftar,b.kdpeserta,b.statuspeserta,b.statusbayar,b.tglbayar,b.filebayar,b.ketbayar FROM (user a left join peserta b on a.iduser=b.iduser) WHERE b.thnsnma=$_SESSION[thnsnma] and b.iduser='$iduser'");
		$rs=mysqli_fetch_array($editjo);
		echo "<fieldset width='80%'><legend align='left' style='background:#FFFFFF;border:none'><img src='../icon/downarrow-1.png'> <font color='#FF8000' size=2><b>Data Pribadi</b></font> <font color='blue'>[<a class='moseover' href='javascript:void(0)' onclick=javascript:Request('kosong.php','','$iddiv') ><font color='red' size=2><b>Close</b></font></a>]</font></legend>";	
		echo "<br>";
		if ($jlpeserta>0){
			echo "<center><table width='80%'>";
			echo "<tr><td width=120> <font color=#0000A0><b>Year</b></font> </td><td width=5> <font color=#0000A0><b>:</b></font> </td><td  width=300> <font color=#5E5EFF><b>$_SESSION[thnsnma]</b></font></td></tr>";
			echo "<tr><td width=120> <font color=#0000A0><b>Registration number</b></font> </td><td width=5> <font color=#0000A0><b>:</b></font> </td><td  width=300> <font color=#5E5EFF><b>$rs[kdpeserta]</b></font></td></tr>";
			echo "<tr><td><font color=#0000A0><b>First Name</b></font></td> <td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#C44000><b>$rs[nmdepan]</b></font> </td></tr>
			<tr><td><font color=#0000A0><b>Middle Name</b></font></td> <td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#C44000><b>$rs[nmtengah]</b></font> </td></tr>
			<tr><td><font color=#0000A0><b>Last Name</b></font></td> <td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#C44000><b>$rs[nmakhir]</b></font> </td></tr>
		<tr><td><font color=#0000A0><b>Title</b></font></td> <td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#C44000><b>$rs[title]</b></font> </td></tr>
		<tr><td><font color=#0000A0><b>Affiliation</b></font></td> <td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#C44000><b>$rs[instansi]</b></font> </td></tr>
		<tr><td valign='top'><font color=#0000A0><b>Department</b></font></td> <td valign='top'> <font color=#0000A0><b>:</b></font> </td><td> <font color=#C44000><b>$rs[departemen]</b></font> </td></tr>
		<tr><td><font color=#0000A0><b>City</b></font></td> <td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#C44000><b>$rs[kota]</b></font> </td></tr>
		<tr><td><font color=#0000A0><b>Country</b></font></td> <td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#C44000><b>$rs[country]</b></font> </td></tr>
		<tr><td><font color=#0000A0><b>Participant</b></font></td> <td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#C44000><b>$rs[participant]</b></font> </td></tr>
        <tr><td><font color=#0000A0><b>Email</b></font></td>   <td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#C44000><b>$rs[iduser]</b></font> </td></tr>
		<tr><td><font color=#0000A0><b>HP</b></font></td>       <td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#C44000><b>$rs[hp]</b></font> </td></tr>";

			if ($rs['statuspeserta']==0){
				$peserta="Presenter";
			}else{
				$peserta="Non-Presenter";
			}
			echo "<tr><td> <font color=#0000A0><b>Status of Participants</b></font> </td><td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#5E5EFF><b>$peserta</b></font></td></tr>";
			if ($rs['statusbayar']==0){
				$bayar="<font color=red><b>UNPAID</b></font>";
			}else{
				$bayar="<font color=green><b>PAID</b></font>";
			}
			echo "<tr><td> <font color=#0000A0><b>Payment Status</b></font> </td><td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#5E5EFF><b>$bayar</b></font></td></tr>";
			echo "<tr><td colspan=3><br></td></tr>";
			if ($rs['statuspeserta']==0){
				$stpeserta = mysqli_fetch_array(mysqli_query($dbconnect,"SELECT a.iduser,a.thnsnma,a.judul,a.papperid,a.idkategori,a.keyword,a.author1,a.hadir1,a.author2,a.hadir2,a.author3,a.hadir3,a.author4,a.hadir4,a.author5,a.hadir5,a.author6,a.hadir6,a.author7,a.hadir7,a.author8,a.hadir8,a.author9,a.hadir9,a.author10,a.hadir10,a.author11,a.hadir11,a.author12,a.hadir12,b.nmkategori,c.nmstatus FROM (makalah a left join kategori b on a.idkategori=b.idkategori) left join statusmakalah c on c.idstatus=a.status WHERE a.thnsnma=$_SESSION[thnsnma] and a.iduser='$rs[iduser]'"));
				echo "<tr><td> <font color=#0000A0><b>Papper ID</b></font> </td><td> <font color=#0000A0><b>:</b></font> </td><td> <font color=blue><b>$stpeserta[papperid] (</b></font><font color=red><b>$stpeserta[nmstatus]</b></font><font color=blue><b>)</b></font></td></tr>";
				echo "<tr><td valign='top'> <font color=#0000A0><b>Title</b></font> </td><td valign='top'> <font color=#0000A0><b>:</b></font> </td><td> <textare cols=60 rows=5><font color=#5E5EFF><b>$stpeserta[judul]</b></font></textarea></td></tr>";
				echo "<tr><td> <font color=#0000A0><b>Keyword</b></font> </td><td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#5E5EFF><b>$stpeserta[keyword]</b></font></td></tr>";
				echo "<tr><td> <font color=#0000A0><b>Topic</b></font> </td><td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#5E5EFF><b>$stpeserta[nmkategori]</b></font></td></tr>";
				echo "<tr><td colspan=3 align=center><br> <font color=blue size=4><b>A U T H O R</b></font></td></tr>";
				if (!empty($stpeserta[author1])){
				if ($stpeserta[hadir1]==1){
					$hadir='Presenter';
				}else{
					$hadir='';
				}
				echo "<tr><td> <font color=#0000A0><b>Author 1</b></font> </td><td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#5E5EFF><b>$stpeserta[author1] (<font color=red><b>$hadir</b></font>)</b></font></td></tr>";
				}
				if (!empty($stpeserta[author2])){
				if ($stpeserta[hadir2]==1){
					$hadir2='Presenter';
				}else{
					$hadir2='';
				}
				echo "<tr><td> <font color=#0000A0><b>Author 2</b></font> </td><td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#5E5EFF><b>$stpeserta[author2] (<font color=red><b>$hadir2</b></font>)</b></font></td></tr>";
				}
				if (!empty($stpeserta[author3])){
				if ($stpeserta[hadir3]==1){
					$hadir3='Presenter';
				}else{
					$hadir3='';
				}
				echo "<tr><td> <font color=#0000A0><b>Author 3</b></font> </td><td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#5E5EFF><b>$stpeserta[author3] (<font color=red><b>$hadir3</b></font>)</b></font></td></tr>";
				}		
				if (!empty($stpeserta[author4])){
				if ($stpeserta[hadir4]==1){
					$hadir4='Presenter';
				}else{
					$hadir4='';
				}
				echo "<tr><td> <font color=#0000A0><b>Author 4</b></font> </td><td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#5E5EFF><b>$stpeserta[author4] (<font color=red><b>$hadir4</b></font>)</b></font></td></tr>";
				}
				if (!empty($stpeserta[author5])){
					if ($stpeserta[hadir5]==1){
						$hadir5='Presenter';
					}else{
						$hadir5='';
					}
					echo "<tr><td> <font color=#0000A0><b>Author 5</b></font> </td><td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#5E5EFF><b>$stpeserta[author5] (<font color=red><b>$hadir5</b></font>)</b></font></td></tr>";
				}
				if (!empty($stpeserta[author6])){
					if ($stpeserta[hadir6]==1){
						$hadir6='Presenter';
					}else{
						$hadir6='';
					}
					echo "<tr><td> <font color=#0000A0><b>Author 6</b></font> </td><td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#5E5EFF><b>$stpeserta[author6] (<font color=red><b>$hadir6</b></font>)</b></font></td></tr>";
				}
				if (!empty($stpeserta[author7])){
					if ($stpeserta[hadir7]==1){
						$hadir7='Presenter';
					}else{
						$hadir7='';
					}
					echo "<tr><td> <font color=#0000A0><b>Author 7</b></font> </td><td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#5E5EFF><b>$stpeserta[author7] (<font color=red><b>$hadir7</b></font>)</b></font></td></tr>";
				}
				if (!empty($stpeserta[author8])){
					if ($stpeserta[hadir8]==1){
						$hadir8='Presenter';
					}else{
						$hadir8='';
					}
					echo "<tr><td> <font color=#0000A0><b>Author 8</b></font> </td><td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#5E5EFF><b>$stpeserta[author8] (<font color=red><b>$hadir8</b></font>)</b></font></td></tr>";
				}
				if (!empty($stpeserta[author9])){
					if ($stpeserta[hadir9]==1){
						$hadir9='Presenter';
					}else{
						$hadir9='';
					}
					echo "<tr><td> <font color=#0000A0><b>Author 9</b></font> </td><td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#5E5EFF><b>$stpeserta[author9] (<font color=red><b>$hadir9</b></font>)</b></font></td></tr>";
				}
				if (!empty($stpeserta[author10])){
					if ($stpeserta[hadir10]==1){
						$hadir10='Presenter';
					}else{
						$hadir10='';
					}
					echo "<tr><td> <font color=#0000A0><b>Author 10</b></font> </td><td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#5E5EFF><b>$stpeserta[author10] (<font color=red><b>$hadir10</b></font>)</b></font></td></tr>";
				}
				if (!empty($stpeserta[author11])){
					if ($stpeserta[hadir11]==1){
						$hadir11='Presenter';
					}else{
						$hadir11='';
					}
					echo "<tr><td> <font color=#0000A0><b>Author 11</b></font> </td><td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#5E5EFF><b>$stpeserta[author11] (<font color=red><b>$hadir11</b></font>)</b></font></td></tr>";
				}
				if (!empty($stpeserta[author12])){
					if ($stpeserta[hadir12]==1){
						$hadir12='Presenter';
					}else{
						$hadir12='';
					}
					echo "<tr><td> <font color=#0000A0><b>Author 12</b></font> </td><td> <font color=#0000A0><b>:</b></font> </td><td> <font color=#5E5EFF><b>$stpeserta[author12] (<font color=red><b>$hadir12</b></font>)</b></font></td></tr>";
				}
				echo "<tr><td colspan=3><br></td></tr>";
			}else{
				echo "<tr><td colspan=3><br></td></tr>";
			}
			echo "</table></center>";
		}
mysqli_close($dbconnect);	
//include "../config/closekoneksi.php";
?>