<?php
error_reporting(0);
session_start();
date_default_timezone_set('Asia/Jakarta');
//	include "../config/fungsi_indotgl.php";
	//include "../config/koneksi.php";
	$dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");
	//$dbconnect=mysqli_connect("localhost","root","","icomcos2020") or die("Koneksi gagal");
//	if ($_GET[act]=='pm'){
        $tgl=Date("Y-m-d");
		 $tam =mysqli_fetch_array(mysqli_query($dbconnect,"SELECT a.idpesan,a.pengirim,b.nmdepan,b.nmakhir,a.isi,a.tglpesan,a.jampesan,a.buka,a.subyek,a.file1,a.file2 FROM pesanmasuk a left join user b on b.iduser=a.pengirim WHERE a.idpesan=$_GET[id]"));
		 //$tgl=$tam[tglpesan];
		 if (!empty($tam[file1])){
			$attact1="<img src='../icon/attactfile.png' width='10' heught='10' title='Attact File'> <a href='../berkas/$tam[file1]' target='_blank'><font color=brown><b>$tam[file1]</b></font></a><br>";
		 }else{
			$attact1="";
		 }
		 if (!empty($tam[file2])){
			$attact2="<img src='../icon/attactfile.png' width='10' heught='10' title='Attact File'> <a href='../berkas/$tam[file2]' target='_blank'><font color=brown><b>$tam[file2]</b></font></a>";
		 }else{
			$attact2="";
		 }
		 echo  "<center><table bgcolor='#6699ff' width='770'>";
		 echo  "<tr><td colspan=3  bgcolor='white' align='center'><font color='red' size=3><b>IN-BOX MESSAGE</b></font></td></tr>";
		 echo  "<tr><td bgcolor='#6699ff' width='140' style='padding-left:10px;'><font color='red'><b>Sender</b></font></td><td style='padding:0px;'> : </td><td bgcolor='#6699ff' style='padding-left:10px;'><font color='brown'><b>$tam[nmdepan] $tam[nmakhir]</b></font></td></tr>";
		 echo  "<tr><td bgcolor='#6699ff' width='140' style='padding-left:10px;'><font color='red'><b>Date</b></font></td><td style='padding:0px;'> : </td><td bgcolor='#6699ff' align='left' style='padding-left:10px;'><font color='blue'><b>$tgl</b></font></td></tr>";
		 echo  "<tr><td bgcolor='#6699ff' width='140' style='padding-left:10px;'><font color='red'><b>Subject Message</b></font></td><td style='padding:0px;'> : </td><td bgcolor='#6699ff' align='left' style='padding-left:10px;'><font color='blue'><b>$tam[subyek]</b></font></td></tr>";
		 echo  "<tr><td bgcolor='#f0f8ff' colspan=3 style='padding:10px;'><textarea cols=90 rows=10>$tam[isi]</textarea></td></tr>";
		 echo "<tr><td colspan=3 style='padding-left:10px;'>
		 $attact1 
		 $attact2 </td></tr>";
		 echo  "<tr><td colspan=3 align='center'><input class='button' type=submit value='Replay' onclick=javascript:Request('balaspesan.php',$_GET[id],'formdetail')><input class='button' type=button value=Cancel onclick=javascript:Request('lihatmasuk.php','','formpesan')></td></tr>";
		 echo  "</table></center>";
	 	 mysqli_query($dbconnect,"UPDATE pesanmasuk SET buka=1,tgldibaca='$tgl' where idpesan=$_GET[id]");
//	}
mysqli_close($dbconnect);
?>