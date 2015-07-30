<?php 
//Production
// $mysql_host = "mysql12.000webhost.com";
// $mysql_database = "a5866833_student";
// $mysql_user = "a5866833_root";
// $mysql_password = "Admin123";

// Development
$mysql_host = "https://192.168.0.101";
$mysql_database = "db_student";
$mysql_user = "root";
$mysql_password = "";
$conn = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database);
