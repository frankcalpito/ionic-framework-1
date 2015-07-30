<?php
header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");
include('../partials/dbconfig.php');

// $query="select * from tblstudents";
// $result = $conn->query($query) or die($conn->error.__LINE__);

// $arr = array();

// if($result->num_rows > 0) {
// 	while($row = $result->fetch_assoc()) {
// 		$arr[] = $row;	
// 	}
// }

$query = 'SELECT * FROM tblstudents';
$result = mssql_query($query);

if( $result === false ) {
     die( print_r( sqlsrv_errors(), true));
}

if($result->num_rows > 0) {
	while($row = mssql_fetch_array($result))
	{
  		$arr[] = $row;
	}
}

	$json_response = json_encode($arr);
	echo $json_response;
