<?php 
// $databaseHost = 'localhost';
// $databaseName = 'megacareer';
// $databaseUsername = 'root';
// $databasePassword = '';

$databaseHost = 'localhost';
$databaseName = 'megn4313_dbmegacareerexpo';
$databaseUsername = 'megn4313_usermegacareer';
$databasePassword = 'usercpanel@megacareer';

$koneksi = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>
