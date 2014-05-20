<?php
/*
	Koneksi ke MySQL
	$dbh = new PDO ('mysql:host=localhost;dbname='.$dbname, $user, $pass);
	Koneksi ke PostgreSQL
	$dbh = new PDO ('pgsql:host=localhost;dbname='.$dbname, $user, $pass);
	Koneksi ke MS SQL Server  
	$dbh = new PDO ('mssql:host=localhost;dbname='.$dbname, $user, $pass);
	Koneksi ke Sybase  
	$dbh = new PDO ('sybase:host=localhost;dbname='.$dbname, $user, $pass);
    Koneksi ke SQLite
    $dbh = new PDO("sqlite3:database/database.db");
*/


//with variables for easy changes
$dbhost = 'localhost';
$dbname = 'ktemplate';
//for PDO put into $dns variable for ease (PDO connects with DSN or Data Source name)
$dbcon = "mysql:host=".$dbhost.";dbname=".$dbname;
$dbusr = 'root';
$dbpas = '';

try {
	$dbh = new PDO ('mysql:host=localhost;dbname='.$dbname, $dbusr, $dbpas);	
} catch (PDOException $e) {	echo $e->getMessage();	}



$baseurl	= "http://localhost/project/ktemplate/";
$ptname		= "PT XXX";


?>