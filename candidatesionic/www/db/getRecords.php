<?php
header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");
include('../partials/dbconfig.php');

function ReadData()
{
	$conn = OpenConnection();
	$tsql = "SELECT FROM dbo.tblstudents";
	$result = sqlsrv_query($conn, $tsql);

	if ($result == FALSE)
		die(''.FormatErrors(sqlsrv_errors()));
	$ctr = 0;


	while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
	{
		$arr[$ctr] = array(
			'name' => $row['name'],
			'city' => $row['city'],
			'country' => $row['country']
			);
		$ctr++;
	}

	sqlsrv_free_stmt($result);
	sqlsrv_close($conn);

	$json_response = json_encode($arr);
	die(''.$json_response);


}



