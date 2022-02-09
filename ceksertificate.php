<?php
error_reporting(0);
session_start();
//include "../config/koneksi.php";
$dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");
{
	$_SESSION['log']='33531';
	///=============== content  ===============
	$id=$_GET['id'];
	if (!empty($id)){
	    $editjo = mysqli_query($dbconnect,"SELECT a.pappercode,title,a.thnicomcos,a.firstname,a.lastname,a.email,a.status FROM sertifikat a WHERE a.thnicomcos=2020 and a.idmd5='$id'");
		$rs=mysqli_fetch_array($editjo);
		
		$jlpeserta = mysqli_num_rows($editjo);

		if ($jlpeserta>0){
		    echo "<fieldset><legend align='left' style='background:#FFFFFF;border:none'><img src='../icon/downarrow-1.png'><font color=red size=5><b>Certificate recognized...!</b></font></legend>";	
		    echo "<br>";
		    echo "<center><table width='80%'>
			<tr><td align='left'><img src='./icon/homeputih.jpg'></td></tr>
			<tr><td align='center'><img src='./icon/icomcos2020_br.png' width='60%' height='60%'><br><br></td></tr>
			<tr><td align=center  style='line-height:3.0em;'><font color=#800000 size=6><b>INTERNATIONAL CONFERENCE on MATHEMATICS, <br>COMPUTATIONAL SCIENCES AND STATISTICS 2020</b></font><br>
			<font color=#000040 size=5><b>29<sup>th</sup> September, 2020 <font color=#FFCC33><b>|</b></font> Online Conference</b></font>
			</td></tr>
			<tr>
				<td align='center'>
					<br>
					<font color=#F20000 size=6 style='font-family: Cambria,Times New Roman,serif;'>
						<b>Mathematics, Computational Sciences and Statistics for Better Future</b>
					</font>
				</td>
			</tr>
			</table></center><br>";
			if ($rs[status]==0){
			echo "<center><table width='50%'>";
//			echo "<tr><td width=20> <font color=#0000A0><b>Year</b></font> </td><td width=5> <font color=#0000A0><b>:</b></font> </td><td> <font color=#5E5EFF><b>$rs[thnicomcos]</b></font></td></tr>";
			echo "<tr><td width=100> <font color=#0000A0 size=5><b>Paper ID</b></font> </td><td width=5> <font color=#0000A0><b>:</b></font> </td><td> <font color=#5E5EFF size=5><b>$rs[pappercode]</b></font></td></tr>";
			echo "<tr><td><font color=#0000A0 size=5><b>Name</b></font></td> <td> <font color=#0000A0 size=5><b>:</b></font> </td><td><font color=#C44000 size=5><b>$rs[firstname] $rs[lastname]</b></font> </td></tr>";
		    echo "<tr><td valign='top'><font color=#0000A0 size=5><b>Title</b></font></td> <td valign='top'> <font color=#0000A0 size=5><b>:</b></font> </td><td valign='top'><font color=#C44000 size=5><b>$rs[title]</b></font> </td></tr>";
		    echo "<tr><td colspan=3><br></td></tr>";
		    echo "<tr><td colspan=3 align=center><font color=blue size=6>as <b>Presenter</b></font> </td></tr>";
			}elseif ($rs[status]==1){
			echo "<center><table width='20%'>";
//			echo "<tr><td width=20> <font color=#0000A0><b>Year</b></font> </td><td width=5> <font color=#0000A0><b>:</b></font> </td><td> <font color=#5E5EFF><b>$rs[thnicomcos]</b></font></td></tr>";
            echo "<tr><td colspan=3><br></td></tr>";
			echo "<tr><td width=20> <font color=#0000A0 size=5><b>Registration</b></font> </td><td width=5> <font color=#0000A0 size=5><b>:</b></font> </td><td> <font color=#5E5EFF size=5><b>$rs[title]</b></font></td></tr>";
			echo "<tr><td><font color=#0000A0 size=5><b>Name</b></font></td> <td> <font color=#0000A0 size=5><b>:</b></font> </td><td size=5><font color=#C44000 size=5><b>$rs[firstname] $rs[lastname]</b></font> </td></tr>";
			echo "<tr><td colspan=3><br></td></tr>";
		    echo "<tr><td colspan=3 align=center><font color=blue size=6>as <b>Participan</b></font> </td></tr>";			    
			}elseif ($rs[status]==2){
			echo "<center><table width='50%'>";
//			echo "<tr><td width=20> <font color=#0000A0><b>Year</b></font> </td><td width=5> <font color=#0000A0><b>:</b></font> </td><td> <font color=#5E5EFF><b>$rs[thnicomcos]</b></font></td></tr>";
//			echo "<tr><td width=100> <font color=#0000A0 size=5><b>Paper ID</b></font> </td><td width=5> <font color=#0000A0><b>:</b></font> </td><td> <font color=#5E5EFF size=5><b>$rs[pappercode]</b></font></td></tr>";
			echo "<tr><td><font color=#0000A0 size=5><b>Name</b></font></td> <td> <font color=#0000A0 size=5><b>:</b></font> </td><td><font color=#C44000 size=5><b>$rs[firstname] $rs[lastname]</b></font> </td></tr>";
		    echo "<tr><td valign='top'><font color=#0000A0 size=5><b>Title</b></font></td> <td valign='top'> <font color=#0000A0 size=5><b>:</b></font> </td><td valign='top'><font color=#C44000 size=5><b>$rs[title]</b></font> </td></tr>";
		    echo "<tr><td colspan=3><br></td></tr>";
		    echo "<tr><td colspan=3 align=center><font color=blue size=6>as <b>Keynote Speaker</b></font> </td></tr>";			    
			}
			echo "<tr><td colspan=3><br></td></tr>";
			echo "</table></center>";
			echo "</fieldset>";
		}else{
		    echo "<fieldset><legend align='left' style='background:#FFFFFF;border:none'><img src='../icon/downarrow-1.png'><font color=red size=5><b>Certificate not recognized...!</b></font></legend>";
		    echo "<br>";
			echo "<center><table>";
			echo "<tr><td align=center><br><br><font color=red size=5><b>Certificate not recognized ...!</b></font><br><br></td></tr>";
			echo "</table></center>";
			echo "</fieldset>";
		}
	}
}
mysqli_close($dbconnect);	
//include "../config/closekoneksi.php";
//echo  "</div>";
//================ batas content =================
?>
