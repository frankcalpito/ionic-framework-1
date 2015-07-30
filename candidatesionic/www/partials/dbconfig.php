<?php 
//Production
// $mysql_host = "mysql12.000webhost.com";
// $mysql_database = "a5866833_student";
// $mysql_user = "a5866833_root";
// $mysql_password = "Admin123";

// Development
// $mysql_host = "https://192.168.0.101";
// $mysql_database = "db_student";
// $mysql_user = "root";
// $mysql_password = "";
// $conn = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database);

//SQL Server
	
	$conn;

    try
    {
        $serverName = "tcp:qhkdzwx2fn.database.windows.net,1433";
        $connectionOptions = array("Database"=>"dbTest",
            "Uid"=>"farfd4323fs", "PWD"=>'@zuR3s3rvER');
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if($conn == false)
            die(FormatErrors(sqlsrv_errors()));
    }
    catch(Exception $e)
    {
        echo("Error!");
    }