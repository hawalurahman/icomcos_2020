<?php
error_reporting(0);
//include "../config/koneksi.php";
$dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");
session_start();
function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {
    // mengambil nilai kode ex: KNS0015 hasil KNS
    $kode = substr($id_terakhir, 0, $panjang_kode);
    // mengambil nilai angka
    // ex: KNS0015 hasilnya 0015
    $angka = substr($id_terakhir, $panjang_kode, $panjang_angka);
    // menambahkan nilai angka dengan 1
    // kemudian memberikan string 0 agar panjang string angka menjadi 4
    // ex: angka baru = 6 maka ditambahkan strig 0 tiga kali
    // sehingga menjadi 0006
    $angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);
    // menggabungkan kode dengan nilang angka baru
    $id_baru = $kode.$angka_baru;
    return $id_baru;
}
// contoh penggunaan kode
//echo autonumber('KNS0009', 3, 4); // hasil KNS0010
//echo '<br/>';
 
//echo autonumber('D001', 1, 3); // hasil D002

if ($_GET['act']=='save')
{	
	if (($_GET['stat']==0)OR($_GET['stat']==1)){
		$tgl=Date("Y-m-d");
		$edit=mysqli_query($dbconnect,"SELECT a.kdpeserta FROM peserta a ORDER BY a.kdpeserta DESC limit 1");
		$r=mysqli_fetch_array($edit);
		$reg=$r['kdpeserta'];
		if (!empty($reg)){
		    $regic=autonumber($reg, 5, 4);
		}else{
		    $regic='REGIC'.'0001';
		}
		$qpapper=mysqli_query($dbconnect,"SELECT papperid FROM makalah WHERE papperid like '$_GET[idkat]%' ORDER BY papperid DESC limit 1");
		$rp=mysqli_fetch_array($qpapper);
		$papper=$rp['papperid'];
		if (!empty($papper)){
		    $idpapper=autonumber($papper, 2, 3);   
		}else{
		    $idpapper=$_GET['idkat'].'001';
		}
		mysqli_query($dbconnect,"INSERT INTO peserta(iduser,kdpeserta,thnsnma,statuspeserta,statusbayar) VALUES('$_SESSION[iduser]','$regic',$_SESSION[thnsnma],$_GET[stat],0)");
		if (!empty($_GET[had1])){
		    $hadir1=1;
		}else{
		    $hadir1=0;
		}
		if (!empty($_GET[had2])){
		    $hadir2=1;
		}else{
		    $hadir2=0;
		}
		if (!empty($_GET[had3])){
		    $hadir3=1;
		}else{
		    $hadir3=0;
		}
		if (!empty($_GET[had4])){
		    $hadir4=1;
		}else{
		    $hadir4=0;
		}
		if (!empty($_GET[had5])){
		    $hadir5=1;
		}else{
		    $hadir5=0;
		}
		if (!empty($_GET[had6])){
		    $hadir6=1;
		}else{
		    $hadir6=0;
		}
		if (!empty($_GET[had7])){
		    $hadir7=1;
		}else{
		    $hadir7=0;
		}
		if (!empty($_GET[had8])){
		    $hadir8=1;
		}else{
		    $hadir8=0;
		}
		if (!empty($_GET[had9])){
		    $hadir9=1;
		}else{
		    $hadir9=0;
		}
		if (!empty($_GET[had10])){
		    $hadir10=1;
		}else{
		    $hadir10=0;
		}
		if (!empty($_GET[had11])){
		    $hadir11=1;
		}else{
		    $hadir11=0;
		}
		if (!empty($_GET[had12])){
		    $hadir12=1;
		}else{
		    $hadir12=0;
		}
		
		if ($_GET['stat']==0){
			mysqli_query($dbconnect,"INSERT INTO makalah(iduser,thnsnma,papperid,judul,idkategori,author1,hadir1,author2,hadir2,author3,hadir3,author4,hadir4,author5,hadir5,author6,hadir6,author7,hadir7,author8,hadir8,author9,hadir9,author10,hadir10,author11,hadir11,author12,hadir12,keyword) VALUES('$_SESSION[iduser]',$_SESSION[thnsnma],'$idpapper','$_GET[jdl]','$_GET[idkat]','$_GET[auth1]',$hadir1,'$_GET[auth2]',$hadir2,'$_GET[auth3]',$hadir3,'$_GET[auth4]',$hadir4,'$_GET[auth5]',$hadir5,'$_GET[auth6]',$hadir6,'$_GET[auth7]',$hadir7,'$_GET[auth8]',$hadir8,'$_GET[auth9]',$hadir9,'$_GET[auth10]',$hadir10,'$_GET[auth11]',$hadir11,'$_GET[auth12]',$hadir12,'$_GET[keyw]')");
//echo "INSERT INTO makalah(iduser,thnsnma,papperid,judul,idkategori,author1,hadir1,author2,hadir2,author3,hadir3,author4,hadir4,author5,hadir5,author6,hadir6,author7,hadir7,author8,hadir8,author9,hadir9,author10,hadir10,author11,hadir11,author12,hadir12,keyword) VALUES('$_SESSION[iduser]',$_SESSION[thnsnma],'$idpapper','$_GET[jdl]','$_GET[idkat]','$_GET[auth1]',$hadir1,'$_GET[auth2]',$hadir2,'$_GET[auth3]',$hadir3,'$_GET[auth4]',$hadir4,'$_GET[auth5]',$hadir5,'$_GET[auth6]',$hadir6,'$_GET[auth7]',$hadir7,'$_GET[auth8]',$hadir8,'$_GET[auth9]',$hadir9,'$_GET[auth10]',$hadir10,'$_GET[auth11]',$hadir11,'$_GET[auth12]',$hadir12,'$_GET[keyw]')";
		}

		echo "<center><font size=5>";
		echo  "<br><table width='80%'><tr><td align='center'><font color=#00008A><b>Tank you...</b></font> </td></tr>
		<tr><td  align='center'>Mr./Mrs. <font color=#800080><b>$_SESSION[namauser]</b></font> <font color=#00008A>Please make payments according to the following Contribution Table :</font> <br><br>";
		echo  "<table width='80%' style='margin-left=0px;'>
			<tr><td align='left'><img src='../icon/konstribusi.jpg'></td></tr>
			<tr><td align=center><br>
				<table border=1 bordercolor=#5F9ADC width='100%'>
					<tr>
						<td style='padding-left:5px;padding-right:5px;' width='40%'><font color=#808080><b></b></font></td>
						<td style='padding-left:5px;padding-right:5px;' width='20%'><font color=#808080><b>Batch 1</b></font></td>
						<td style='padding-left:5px;padding-right:5px;' width='20%'><font color=#808080><b>Batch 2</b></font></td>
						<td style='padding-left:5px;padding-right:5px;' width='20%'><font color=#808080><b>Additional Papers</b></font></td>
					</tr>
					<tr>
						<td style='padding-left:5px;padding-right:5px;'><font color=#808080><b>Domestic Presenters</b></font></td>
						<td style='padding-left:5px;padding-right:5px;'><font color=#808080><b>IDR 2.000.000</b></font></td>
						<td style='padding-left:5px;padding-right:5px;'><font color=#808080><b>IDR 2.500.000</b></font></td>
						<td style='padding-left:5px;padding-right:5px;'><font color=#808080><b>IDR 1.500.000</b></font></td>
					</tr>
					<tr>
						<td style='padding-left:5px;padding-right:5px;'><font color=#808080><b>International Presenters</b></font></td>
						<td style='padding-left:5px;padding-right:5px;'><font color=#808080><b>USD 250</b></font></td>
						<td style='padding-left:5px;padding-right:5px;'><font color=#808080><b>USD 300</b></font></td>
						<td style='padding-left:5px;padding-right:5px;'><font color=#808080><b>USD 90</b></font></td>
					</tr>
					<tr>
						<td style='padding-left:5px;padding-right:5px;'><font color=#808080><b>Domestic Participants</b></font></td>
						<td style='padding-left:5px;padding-right:5px;' colspan=3 align=center><font color=#808080><b>IDR 500.000</b></font></td>
					</tr>
				</table>
				</td>
			</tr>
		</table>
		</td></tr>
		<tr><td><br>&nbsp;
			    <font color=#FF8040 size=5><b>Payment</b></font>
				<table border=0 bordercolor=#5F9ADC width='100%'>
					<tr><td style='padding-left:5px;padding-right:5px;' width='50%'><font color=#800000>
						Conference registration and publication fees are transferred via :<br>
						Mandiri Bank : A/C Name <b>Siti Zahidah</b></font><br>
						<font color=#800000><b>International Conference ICOMCOS 2020</b></font><br>
						<font color=#2020FF><b>Account Number. 142-00-1816829-3</b></font>
					</td></tr>
				</table>
		</td></tr>		
		<tr><td>
		<font color=#00008A>After making a payment, please upload proof of payment through the menu <font color=#800000><b>Participation</b></font> which appears in the right-hand menu<br><br>
		Thank you<br>
		Regards<br><br>
		Committee</font>
		</td></tr>
		</table>";
		echo  "</font><br><br>
		<a href='./index.php' style='color:#D76B00;'><b>CLOSE</b></a></center>";
	}else{
		$utama = "
		<center>
			<font color=red size=4><b>
			DATA TIDAK LENGKAP..!
			</b></font>
		</center>";
		echo  "</font><br><br>
		<a href='./index.php' style='color:#D76B00;'><b>CLOSE</b></a></center>";
	}
	
}
mysqli_close($dbconnect);
//include "../config/closekoneksi.php";
?>
