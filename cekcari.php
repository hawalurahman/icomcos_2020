<?php
error_reporting(0);
session_start();
$dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");
//if ($_SESSION[topik]=='Advertising'){
    echo "<fieldset><legend align='left' style='background:#FFFFFF;border:none'><img src='../icon/downarrow-1.png'> <font color='#FF8000' size=2><b>SEARCH &nbsp;&nbsp;&nbsp;R E S U L T</b></font></legend>";
	$kunci=strtoupper($_GET['katakunci']);
	if (!empty($kunci)){
		$editjo = mysqli_query($dbconnect,"SELECT a.iduser,a.nmdepan,a.nmtengah,nmakhir,a.instansi,a.hp,a.idoto,a.passworda,a.passworde,a.status,a.tgldaftar,b.statuspeserta,b.statusbayar,b.tglbayar,b.filebayar,b.ketbayar FROM (user a left join peserta b on a.iduser=b.iduser) WHERE b.thnsnma=$_SESSION[thnsnma] and ((a.nmdepan like '%$kunci%') or(a.nmakhir like '%$kunci%'))");

		$jlhketemu=mysqli_num_rows($editjo);
		if ($jlhketemu!=0){
		    //<th style='background:#5F9ADC;'> Payment Status </th>
			echo "<br>";
			echo "<table align=right width='100%' border=1>";
			echo  "<tr><th style='background:#5F9ADC;'>No.</th><th style='background:#5F9ADC;'> Name of Participant </th><th style='background:#5F9ADC;'> Status </th></tr>";
			$n=0;
			$warna='#FFFFFF';
			while ($dtjo=mysqli_fetch_array($editjo))
 			{		
				$no++;
				$nmdiv="ktbayar".$no;
				if ($dtjo['statuspeserta']==0){
					$peserta="Presenter";
				}else{
					$peserta="Non-Presenter";
				}
				if ($dtjo['statusbayar']==0){
					$bayar ="<font color=red><b>UNPAID</b></font>";
				}else{
					$bayar ="<font color=green><b>PAID</b></font>";
				}
				//<td valign='middle' style='background:$warna;padding : 2px 2px 2px 5px;' width='15%' align='center'> <font color=#C44000><b>$bayar</b></font> </td>
				echo  "<tr><td width='5%' valign='middle' style='background:$warna;padding : 2px 2px 2px 5px;'> <font color=#C44000><b>$no.</b></font> </td><td width='60%' valign='middle' style='background:$warna;padding : 2px 2px 2px 5px;' align='left'> <font color=#C44000><b>$dtjo[nmdepan] $dtjo[nmakhir]</b></font> </td><td valign='middle' style='background:$warna;padding : 2px 2px 2px 5px;' width='20%' align='center'> <font color=#C44000><b>$peserta</b></font> </td></tr>
				<tr><td colspan=6><div id='$nmdiv'></div></td></tr>";
				if ($warna=='#B0DCFD'){
					$warna='#FFFFFF';
				}else{
					$warna='#B0DCFD';
				}
			}
			echo "</table></center><br><br>";	
		}else{
		echo "
		<center>
			<font color=red size=4><b>
			DATA is NOT FOUND..!
			</b></font>
		</center>";
		echo  "</font><br><br>
		<a href='./index.php' style='color:#D76B00;'><b>CLOSE</b></a></center>";
		}
	}else{
        echo "
		<center>
			<font color=red size=4><b>
			DATA is NOT FOUND..!
			</b></font>
		</center>";
		echo  "</font><br><br>
		<a href='./index.php' style='color:#D76B00;'><b>CLOSE</b></a></center>";
	}
	echo "</fieldset>";
//}
//header('location:./');
mysqli_close($dbconnect);
//include "config/closekoneksi.php";
echo "</div>";

?>
