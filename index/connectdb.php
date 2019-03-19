<?php
/**
 * using mysqli_connect for database connection
 */
 
$databaseHost = 'localhost'; /*Ganti ke IP server terbuka*/
$databaseName = 'terbuka';
$databaseUsername = 'root'; /*Gunakan username pada db di server terbuka*/
$databasePassword = ''; /*Gunakan password pada db di server terbuka*/
 
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
 
?>
