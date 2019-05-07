<?php
$dsn = "mysql:dbname=bms;host=127.0.0.1";
$user = 'root';
$dbh = new PDO($dsn,$user);
$dbh->query("SET NAMES utf8");
?>
