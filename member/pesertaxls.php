<?php
error_reporting(0);
session_start();
//include "../config/koneksi.php";
$server = "localhost";
$username = "fstunair_snma";
$password = "Snma2017";
$database = "fstunair_snma";
$dbconnect=mysqli_connect($server,$username,$password,$database) or die("Koneksi gagal");
{
	$_SESSION['log']='33531';
	$nmkat[1]="Analisis dan Aljabar";
	$nmkat[2]="Matematika Terapan";
	$nmkat[3]="Statistika";
	$nmkat[4]="Sistem Informasi";
	$nmkat[5]="Pendidikan Matematika";
	$tgl=Date("d-m-Y");

	$filename = "peserta_pendaftar_".$tgl.".xls";
	header("Content-Disposition: attachment; filename=\"$filename\"");
	header("Content-Type: application/vnd.ms-excel");
	echo "No.\tEMAIL\tNamaPeserta\tStatus\tTglDaftar\r\n";

		$editjo = mysqli_query($dbconnect,"SELECT a.iduser,a.nmuser,a.instansi,a.hp,a.idoto,a.passworda,a.passworde,a.status,a.tgldaftar,a.verified,a.kirimveri FROM user a WHERE a.idoto=1 ORDER BY a.tgldaftar DESC");
		while ($dtjo=mysqli_fetch_array($editjo))
 		{	$no++;
			$daftar=$dtjo['tgldaftar'];
			$nmdiv='ktbayar'.$no;
			if ($dtjo['verified']==1){
				$status="Verified";
				$aksi="<a href='./hapususer.php?username=$dtjo[iduser]'><input  class='button' type=submit name=masuk value='Hapus'></a>";
			}else{
				$status="<a href='./kirimverifikasi.php?username=$dtjo[iduser]'><input  class='button' type=submit name=masuk value='Kirim Verifikasi ($dtjo[kirimveri])'></a>";
				$aksi="<a href='./hapususer.php?username=$dtjo[iduser]'><input  class='button' type=submit name=masuk value='Hapus'></a>";
			}
			if ($dtjo['status']=='D'){
				$statuspeserta="Dosen/Umum";
			}else{
				$statuspeserta="Mahasiswa";
			}
			echo $no."\t".$dtjo['iduser']."\t".$dtjo['nmuser']."\t".$statuspeserta."\t".$daftar."\r\n";
		}
}

?>