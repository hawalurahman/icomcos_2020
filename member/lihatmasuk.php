<?php
error_reporting(0);
session_start();
date_default_timezone_set('Asia/Jakarta');
//include "../config/fungsi_indotgl.php";
$dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");
//$dbconnect=mysqli_connect("localhost","root","","icomcos2020") or die("Koneksi gagal");
	$tampil=mysqli_query($dbconnect,"SELECT a.idpesan,a.pengirim,b.nmdepan,b.nmakhir,a.penerima,a.isi,a.tglpesan,a.jampesan,a.buka,a.subyek,a.file1,a.file2 FROM pesanmasuk a  left join user b on b.iduser=a.pengirim where a.penerima='$_SESSION[iduser]' ORDER BY a.tglpesan+a.jampesan desc");  	
	
	echo  "
	<center>
	<table width='770'><tr><td>
	<div id='formdetail'>
	<table>
	<tr><td colspan=5 style='border:1px solid #3399ff;' bgcolor='white' align='center'><font color='red' size=4><b>IN-BOX MESSAGE</b></font></td></tr>
	<tr bgcolor='#778899'><th style='border:1px solid #3399ff;' width='20'>no</th><th style='border:1px solid #3399ff;' width='150'>Sender</th><th style='border:1px solid #3399ff;' width='450'>Subject Message</th><th style='border:1px solid #3399ff;' width='100'>Date</th><th style='border:1px solid #3399ff;' width='50'>Action</th></tr>";

	$no=1;
	while ($r=mysqli_fetch_array($tampil)){
		if (!empty($r[file1]) || !empty($r[file2])){
			$attact="<img src='../icon/attactfile.png' width='10' heught='10' title='Attact File'>";
		}else{
			$attact="";
		}
		$tgl=$r[tglpesan]." [".$r[jampesan]."]";
		if ($r[buka]==0){
			$warna="#9999ff";
			echo  "<tr bgcolor=$warna class='data'><td style='border:1px solid #3399ff;'><font size='2' color=#FFFFFF><b>$no</b></font></td>
			<td style='border:1px solid #3399ff;padding:5px;'><font size='2' color=#FFFFFF><b>$r[nmdepan] $r[nmakhir]</b></font></td>
			<td style='border:1px solid #3399ff;padding:5px;'><a href='javascript:void(0)' onclick=javascript:Request('detailmasuk.php',$r[idpesan],'formdetail')><font size='2' color=#FFFFFF><b>";
			echo  $r[subyek];
			if ($r[blokir]==1){
				echo "...</b></font></a></td>
				<td style='border:1px solid #3399ff;' align='center'><a href='#' title='Unread'><font size='1' color=#FFFFFF><b>$tgl</b></font></a></td>
				<td style='border:1px solid #3399ff;'></td></tr>";
			}else{
				echo "...</b></font></a></td>
				<td style='border:1px solid #3399ff;' align='center'><a href='#' title='Unread'><font size='1' color=#FFFFFF><b>$tgl</b></font></a></td>
				<td style='border:1px solid #3399ff;' align='center'><a href='#'><img src='../icon/ed_delete.gif'></a>
				</td></tr>";
			}
		}else{
			$warna="#f0ffff";
			echo  "<tr bgcolor=$warna class='data'><td style='border:1px solid #3399ff;'><font size='2' color=#FFFFFF><b>$no</b></font></td>
			<td style='border:1px solid #3399ff;padding:5px;'><font size='2' color=#0000DD>$r[nmdepan] $r[nmakhir]</font></td>
			<td style='border:1px solid #3399ff;padding:5px;'><a href='javascript:void(0)' onclick=javascript:Request('detailmasuk.php',$r[idpesan],'formdetail')><font size='2'>";
			echo  $r[subyek];
			if ($r[blokir]==1){
				echo "...</font></a></td>
				<td style='border:1px solid #3399ff;' align='center'><font size='1'><a href='#' title='Already Read'>$tgl</a></font></td>
				<td style='border:1px solid #3399ff;'></td></tr>";
			}else{
				echo "...</font></a></td>
				<td style='border:1px solid #3399ff;' align='center'><font size='1'><a href='#' title='Already Read'>$tgl</a></font></td>
				<td style='border:1px solid #3399ff;' align='center'><a href='#'><img src='../icon/ed_delete.gif'></a>
				</td></tr>";
			}
		}
		$no++;
	}
	echo "</table>
	</div>
	</td></tr></table>
	</center>";
	echo "";

mysqli_close($dbconnect);
?>