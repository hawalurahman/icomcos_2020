<?php
error_reporting(0);
	session_start();
	//include "../config/koneksi.php";
	$dbconnect=mysqli_connect("localhost","icomcos_edwin","1C0MC0S2020","icomcos_2020") or die("Koneksi gagal");
	$iduser=$_GET['id'];
	$vart=$_GET['varedit'];
	$lokasi=$_GET['lokasi'];
	if ($vart=='namadepan'){
		$editdpn = mysqli_fetch_array(mysqli_query($dbconnect,"SELECT a.iduser,a.nmdepan,a.nmtengah,nmakhir,a.instansi,a.hp FROM user a WHERE a.iduser='$_SESSION[iduser]'"));
	echo "<form id='formdepan' name='formdepan' method=POST action=javascript:EditRequest('saveedit.php',document.formdepan,'namadepan','$lokasi')  enctype='multipart/form-data'>";
	echo "<input type=text name=namadepan size=60 value='$editdpn[nmdepan]' placeholder='First Name' style='border:1px solid #AEAEFF;height:30px;'> <input class='button' type=hidden value='SUBMIT'>";
	echo "</form>";
	}elseif ($vart=='namatengah'){
		$edittgh = mysqli_fetch_array(mysqli_query($dbconnect,"SELECT a.iduser,a.nmdepan,a.nmtengah,nmakhir,a.instansi,a.hp FROM user a WHERE a.iduser='$_SESSION[iduser]'"));
	echo "<form id='formtengah' name='formtengah' method=POST action=javascript:EditRequest('saveedit.php',document.formtengah,'namatengah','$lokasi')  enctype='multipart/form-data'>";
	echo "<input type=text name=namatengah size=60 value='$edittgh[nmtengah]' placeholder='Middle Name' style='border:1px solid #AEAEFF;height:30px;'> <input class='button' type=hidden value='SUBMIT'>";
	echo "</form>";
	}elseif ($vart=='namaakhir'){
		$editakhir = mysqli_fetch_array(mysqli_query($dbconnect,"SELECT a.iduser,a.nmdepan,a.nmtengah,nmakhir,a.instansi,a.hp FROM user a WHERE a.iduser='$_SESSION[iduser]'"));
	echo "<form id='formakhir' name='formakhir' method=POST action=javascript:EditRequest('saveedit.php',document.formakhir,'namaakhir','$lokasi')  enctype='multipart/form-data'>";
	echo "<input type=text name=namaakhir size=60 value='$editakhir[nmakhir]' placeholder='Last Name' style='border:1px solid #AEAEFF;height:30px;'> <input class='button' type=hidden value='SUBMIT'>";
	echo "</form>";
	}elseif ($vart=='nmtitle'){
		$edittitle = mysqli_fetch_array(mysqli_query($dbconnect,"SELECT a.iduser,a.nmdepan,a.nmtengah,nmakhir,a.title,a.instansi,a.hp FROM user a WHERE a.iduser='$_SESSION[iduser]'"));
	echo "<form id='formtitle' name='formtitle' method=POST action=javascript:EditRequest('saveedit.php',document.formtitle,'nmtitle','$lokasi')  enctype='multipart/form-data'>";

	echo "<select name='nmtitle' enabled style='height:30px;'>";
	if ($edittitle[title]=='Professor'){
		echo "  <option id='title' value='Professor' selected> Professor</option>";
	}else{
		echo "  <option id='title' value='Professor'> Professor</option>";
	}
	if ($edittitle[title]=='Associate Professor'){
		echo "  <option id='title' value='Associate Professor' selected> Associate Professor </option>";
	}else{
		echo "  <option id='title' value='Associate Professor' > Associate Professor </option>";
	}
	if ($edittitle[title]=='Assistant Professor'){
		echo "  <option id='title' value='Assistant Professor' selected> Assistant Professor </option>";
	}else{
		echo "  <option id='title' value='Assistant Professor' > Assistant Professor </option>";
	}
	if ($edittitle[title]=='Lecturer'){
		echo "  <option id='title' value='Lecturer' selected> Lecturer </option>";
	}else{
		echo "  <option id='title' value='Lecturer' > Lecturer </option>";
	}
	if ($edittitle[title]=='Research Fellow'){
		echo "  <option id='title' value='Research Fellow' selected> Research Fellow </option>";
	}else{
		echo "  <option id='title' value='Research Fellow' > Research Fellow </option>";
	}
	if ($edittitle[title]=='Ph.D Student'){
		echo "  <option id='title' value='Ph.D Student' selected> Ph.D Student </option>";
	}else{
		echo "  <option id='title' value='Ph.D Student' > Ph.D Student </option>";
	}
	if ($edittitle[title]=='Master Student'){
		echo "  <option id='title' value='Master Student' selected> Master Student </option>";
	}else{
		echo "  <option id='title' value='Master Student' > Master Student </option>";
	}
	if ($edittitle[title]=='Mr.'){
		echo "  <option id='title' value='Mr.' selected> Mr. </option>";
	}else{
		echo "  <option id='title' value='Mr.' > Mr. </option>";
	}
	if ($edittitle[title]=='Mrs.'){
		echo "  <option id='title' value='Mrs.' selected> Mrs. </option>";
	}else{
		echo "  <option id='title' value='Mrs.' > Mrs. </option>";
	}
	if ($edittitle[title]=='Ms.'){
		echo "  <option id='title' value='Ms.' selected> Ms. </option>";
	}else{
		echo "  <option id='title' value='Ms.' > Ms. </option>";
	}
	echo "</select><input class='button' type='submit' value='SAVE'>";
	echo "</form>";
	}elseif ($vart=='nmaffi'){
		$editaffi = mysqli_fetch_array(mysqli_query($dbconnect,"SELECT a.iduser,a.nmdepan,a.nmtengah,nmakhir,a.title,a.instansi,a.hp FROM user a WHERE a.iduser='$_SESSION[iduser]'"));
	echo "<form id='formaffi' name='formaffi' method=POST action=javascript:EditRequest('saveedit.php',document.formaffi,'nmaffi','$lokasi')  enctype='multipart/form-data'>";
	echo "<input type=text name=nmaffi size=60 value='$editaffi[instansi]' placeholder='Title' style='border:1px solid #AEAEFF;height:30px;'> <input class='button' type=hidden value='SUBMIT'>";
	echo "</form>";
	}elseif ($vart=='nmdepart'){
		$editdepart = mysqli_fetch_array(mysqli_query($dbconnect,"SELECT a.iduser,a.nmdepan,a.nmtengah,nmakhir,a.title,a.instansi,a.departemen,a.hp FROM user a WHERE a.iduser='$_SESSION[iduser]'"));
	echo "<form id='formdepart' name='formdepart' method=POST action=javascript:EditRequest('saveedit.php',document.formdepart,'nmdepart','$lokasi')  enctype='multipart/form-data'>";
	echo "<input type=text name=nmdepart size=60 value='$editdepart[departemen]' placeholder='Title' style='border:1px solid #AEAEFF;height:30px;'> <input class='button' type=hidden value='SUBMIT'>";
	echo "</form>";
	}elseif ($vart=='nmcity'){
		$editcity = mysqli_fetch_array(mysqli_query($dbconnect,"SELECT a.iduser,a.nmdepan,a.nmtengah,nmakhir,a.title,a.instansi,a.departemen,a.kota,a.hp FROM user a WHERE a.iduser='$_SESSION[iduser]'"));
	echo "<form id='formcity' name='formcity' method=POST action=javascript:EditRequest('saveedit.php',document.formcity,'nmcity','$lokasi')  enctype='multipart/form-data'>";
	echo "<input type=text name=nmcity size=60 value='$editcity[kota]' placeholder='Title' style='border:1px solid #AEAEFF;height:30px;'> <input class='button' type=hidden value='SUBMIT'>";
	echo "</form>";

	}elseif ($vart=='title'){
		$stpes = mysqli_fetch_array(mysqli_query($dbconnect,"SELECT a.iduser,a.thnsnma,a.judul,a.idkategori,a.keyword,a.author1,a.hadir1,a.author2,a.hadir2,a.author3,a.hadir3,a.author4,a.hadir4,b.nmkategori FROM (makalah a left join kategori b on a.idkategori=b.idkategori) WHERE a.thnsnma=$_SESSION[thnsnma] and a.iduser='$_SESSION[iduser]'"));
	echo "<form id='formjdl' name='formjdl' method=POST action=javascript:EditRequest('saveedit.php',document.formjdl,'title','$lokasi')  enctype='multipart/form-data'>";
	echo "<textarea cols=80 rows=5 name=judul placeholder='Title' value='$iduser'>$stpes[judul]</textarea> <input class='button' type='submit' value='SAVE'>";
	echo "</form>";
	}elseif ($vart=='keyword'){
		$stkey = mysqli_fetch_array(mysqli_query($dbconnect,"SELECT a.iduser,a.thnsnma,a.judul,a.idkategori,a.keyword,a.author1,a.hadir1,a.author2,a.hadir2,a.author3,a.hadir3,a.author4,a.hadir4,b.nmkategori FROM (makalah a left join kategori b on a.idkategori=b.idkategori) WHERE a.thnsnma=$_SESSION[thnsnma] and a.iduser='$_SESSION[iduser]'"));
	echo "<form id='formkey' name='formkey' method=POST action=javascript:EditRequest('saveedit.php',document.formkey,'keyword','$lokasi')  enctype='multipart/form-data'>";
	echo "<input type=text name=keyword size=60 value='$stkey[keyword]' placeholder='Keyword' style='border:1px solid #AEAEFF;height:30px;'> <input class='button' type=hidden value='SUBMIT'>";
	echo "</form>";
	}elseif ($vart=='kategori'){
		$stkat = mysqli_fetch_array(mysqli_query($dbconnect,"SELECT a.iduser,a.thnsnma,a.judul,a.idkategori,a.keyword,a.author1,a.hadir1,a.author2,a.hadir2,a.author3,a.hadir3,a.author4,a.hadir4,b.nmkategori FROM (makalah a left join kategori b on a.idkategori=b.idkategori) WHERE a.thnsnma=$_SESSION[thnsnma] and a.iduser='$_SESSION[iduser]'"));
	echo "<form id='formkat' name='formkat' method=POST onchange=javascript:EditRequest('saveedit.php',document.formkat,'kategori','$lokasi') enctype='multipart/form-data'>";
	$querykat="select a.idkategori,a.nmkategori from kategori a";		
	$qkat=mysql_query($querykat) or die('query failed');
	echo "<select name='pkat' >";
	echo " 	<option id='pkat' value=0> - </option>";
		while ($ikat=mysql_fetch_array($qkat))
 		{
			if ($ikat[idkategori]==$stkat[idkategori]){
				echo "<option id='pkat' value=$ikat[idkategori] selected>$ikat[nmkategori]</option>";
			}else{
				echo "<option id='pkat' value=$ikat[idkategori]>$ikat[nmkategori]</option>";
			}
		}
	echo "</select><input class='button' type='submit' value='SAVE'>";
	echo "</form>";
	}
mysqli_close($dbconnect);	
//include "../config/closekoneksi.php";
?>