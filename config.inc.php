<?php
error_reporting(E_ALL);
ini_set('display_error', '1');
// database logingegevens
$db_hostname = 'localhost';
$db_username = '82112';
$db_password = 'Zsih21#5';
$db_database = 'beroeps2.1';

// maak de database-verbinding
$mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

if(!$mysqli) {
	echo "slecht";
}

