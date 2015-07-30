<?php 
	
	global $conn; 
    try
    {
        $serverName = "tcp:qhkdzwx2fn.database.windows.net,1433";
        $user = "farfd4323fs";
        $pass = '@zuR3s3rvER';

        $conn = mssql_connect($serverName, $user, $Pass) or die("Couldn't connect to SQL Server on $myServer"); 

        $selected = mssql_select_db('dbTest', $conn)
  		or die("Couldn't open database dbTest");

    }
    catch(Exception $e)
    {
        echo("Error!");
    }