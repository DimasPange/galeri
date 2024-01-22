<?php
    $hostname = 'localhost';
	$username = 'root';
	$password = '';
	$dbname   = 'web_galeri';
	
	$conn = mysqli_connect($hostname, $username, $password, $dbname) or die ('gagal terhubung ke database');
?>