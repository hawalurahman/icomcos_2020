<?php
error_reporting(0);
session_start();
date_default_timezone_set('Asia/Jakarta');
$dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");
//$dbconnect=mysqli_connect("localhost","root","","icomcos2020") or die("Koneksi gagal");

//if ($_GET['act']=='save')
{			
	$tgl=Date("Y-m-d");
	$jam=date('H:i:s a');
	$lokasi_file1 = $_FILES['fuploadfile1']['tmp_name'];
	$nama_file1   = $_FILES['fuploadfile1']['name'];
	$acak1 = rand(0000000,9999999);
	$nama_file_acak1 = $acak1.$nama_file1;
	$type_file1   = $_FILES['fuploadfile1']['type'];
	$size_file1   = $_FILES['fuploadfile1']['size'];

	$lokasi_file2 = $_FILES['fuploadfile2']['tmp_name'];
	$nama_file2   = $_FILES['$nmfile2']['name'];
	$acak1 = rand(0000000,9999999);
	$nama_file_acak2 = $acak2.$nama_file2;
	$type_file2   = $_FILES['fuploadfile2']['type'];
	$size_file2   = $_FILES['fuploadfile2']['size'];

	if (!empty($lokasi_file1)){
		move_uploaded_file($lokasi_file1,"../berkas/$nama_file_acak1");
		$nmfile1=$nama_file_acak1;
	}else{
		$nmfile1=NULL;
	}
	if (!empty($lokasi_file2)){
		move_uploaded_file($lokasi_file2,"../berkas/$nama_file_acak2");
		$nmfile2=$nama_file_acak2;
	}else{
		$nmfile2=NULL;
	}

	mysqli_query($dbconnect,"INSERT INTO pesanmasuk(tglpesan,jampesan,pengirim,penerima,subyek,isi,idbalas,file1,file2) VALUES('$tgl','$jam','$_POST[idu]','$_POST[idt]','$_POST[subyek]','$_POST[pesan]',$_POST[idp],'$nmfile1','$nmfile2')");
	
	$jlhnotif=mysqli_num_rows(mysqli_query($dbconnect,"SELECT idpesan FROM pesanmasuk WHERE penerima='$_SESSION[iduser]' and (tgldibaca IS NULL)"));
    if ($jlhnotif==0){
        $_SESSION[jlhno]="";
    }else{
        $_SESSION[jlhno]=$jlhnotif;
    }

	$jlhmasuk=mysqli_num_rows(mysqli_query($dbconnect,"SELECT a.idpesan,a.pengirim,b.nmdepan,b.nmakhir,a.isi,a.tglpesan,a.jampesan,a.subyek,a.buka,a.file1,a.file2 FROM pesanmasuk a  left join user b on b.iduser=a.pengirim where a.penerima='$_SESSION[iduser]' and a.buka=0 ORDER BY a.tglpesan+a.jampesan desc"));
	$_SESSION[jlhmsk]=$jlhmasuk;
	$jlhmasukall=mysqli_num_rows(mysqli_query($dbconnect,"SELECT a.idpesan,a.pengirim,b.nmdepan,b.nmakhir,a.isi,a.tglpesan,a.jampesan,a.subyek,a.buka,a.file1,a.file2 FROM pesanmasuk a  left join user b on b.iduser=a.pengirim where a.penerima='$_SESSION[iduser]' ORDER BY a.tglpesan+a.jampesan desc"));  
	$_SESSION[jlhmskall]=$jlhmasukall;
	$jlhkeluar=mysqli_num_rows(mysqli_query($dbconnect,"SELECT a.idpesan,a.penerima,b.nmdepan,b.nmakhir,a.isi,a.tglpesan,a.jampesan,a.subyek,a.buka,a.file1,a.file2 FROM pesanmasuk a  left join user b on b.iduser=a.penerima where a.pengirim='$_SESSION[iduser]' and a.buka=0 ORDER BY a.tglpesan+a.jampesan desc"));
	$_SESSION[jlhklr]=$jlhkeluar;
	$jlhkeluarall=mysqli_num_rows(mysqli_query($dbconnect,"SELECT a.idpesan,a.penerima,b.nmdepan,b.nmakhir,a.isi,a.tglpesan,a.jampesan,a.subyek,a.buka,a.file1,a.file2 FROM pesanmasuk a  left join user b on b.iduser=a.penerima where a.pengirim='$_SESSION[iduser]' ORDER BY a.tglpesan+a.jampesan desc"));
	$_SESSION[jlhklrall]=$jlhkeluarall;
	//location.href=javascript:Request('cnt_pesan.php','','utama');
	echo "<SCRIPT LANGUAGE='JavaScript'>location.href='./index.php';Request('cnt_pesan.php','','utama');var x=alert('Save Process Successfully..!');</SCRIPT>";
}
mysqli_close($dbconnect);
?>