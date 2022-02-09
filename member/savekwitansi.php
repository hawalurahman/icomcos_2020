<?php
error_reporting(0);
//include "../config/koneksi.php";
session_start();
include "menu.php";//742
$dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");
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


//if ($_GET['act']=='save')
{			
		$tgl=Date("Y-m-d");
		$edit=mysqli_query($dbconnect,"SELECT kwnomor FROM peserta ORDER BY kwnomor DESC limit 1");
		$rn=mysqli_fetch_array($edit);
		$jlhrn==mysqli_num_rows($edit);
		if ($rn[kwnomor]!=""){
		$nokwitansi=$rn[kwnomor];
		$nokw=autonumber($nokwitansi, 11, 4);
		}else{
		$nokw='ICMUA-2020.0001';
		}
		$savepdf=$_POST['kd']."_".$nokw.".pdf";
		mysqli_query($dbconnect,"UPDATE peserta SET statusbayar=1,kwketerangan='$_POST[keterangan]',kwjumlah='$_POST[jumlah]',kwrupiah='$_POST[rupiah]',kwmtuang='$_POST[mtuang]',filekwitansi='$savepdf',tglkwitansi='$tgl',kwnomor='$nokw' WHERE iduser='$_POST[id]' and thnsnma=$_SESSION[thnsnma]");
		echo "<font size=5>";
/*
		echo "
		<center>
			<font color=red size=4><b>
			Successful receipt creation..!
			</b></font>";
		echo  "</font><br><br>
		<a href='./index.php' style='color:#D76B00;'><b>CLOSE</b></a></center>";
*/
		echo "
		<SCRIPT LANGUAGE='JavaScript'>
			var x=alert('Successful receipt creation..!');
			location.href='./index.php';
		</SCRIPT>
		";
}
mysqli_close($dbconnect);
//include "../config/closekoneksi.php";
?>
