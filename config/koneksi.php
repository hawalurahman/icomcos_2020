<?php
$server = "localhost";
$username = "icomcos_edwin";
$password = "1C0MC0S2020";
$database = "icomcos_2020";
//$dbconnect=mysqli_connect($server,$username,$password,$database) or die("Koneksi gagal");
$dbconnect=mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
?>
