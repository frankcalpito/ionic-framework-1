<?php 

global $conn; 

try
{
	$serverName = "tcp:qhkdzwx2fn.database.windows.net,1433";
	$connectionOptions = array("Database"=>"dbTest",
		"Uid"=>"farfd4323fs", "PWD"=>"@zuR3s3rvER");
	$conn = sqlsrv_connect($serverName, $connectionOptions);
	if($conn == false)
		die(FormatErrors(sqlsrv_errors()));
}
catch(Exception $e)
{
	echo("Error!");
}