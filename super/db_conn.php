<?php
session_start();
define('DBNAME', 'db_enroll');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBHOST', 'localhost');

try {
	$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	die("Issue -> Connection failed: " . $e->getMessage());
}
?>
