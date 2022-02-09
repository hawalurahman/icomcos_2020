<?php
error_reporting(0);
session_start();
if (!empty($_SESSION[namauser])){
header('location:../');
}else{
header('location:../../');
}
?> 