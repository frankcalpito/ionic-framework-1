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

$query = "SELECT * FROM tblstudents";
$result = sqlsrv_query($conn, $query);

if( $result === false ) {
     die( print_r( sqlsrv_errors(), true));
}

if($result->num_rows > 0) {
	while($row = sqlsrv_fetch_object()) {
		$arr[] = $row;	
	}
}

	sqlsrv_free_stmt($result);
    sqlsrv_close($conn);

	$json_response = json_encode($arr);
	echo $json_response;
