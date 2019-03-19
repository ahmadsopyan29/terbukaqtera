<?php
/**
 * using mysqli_connect for database connection
 */
 
$databaseHost = 'localhost';
$databaseName = 'tertutup';
$databaseUsername = 'root';
$databasePassword = 'qtera123';
 
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
 
?>
