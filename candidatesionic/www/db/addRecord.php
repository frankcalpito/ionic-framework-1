<?php
    header('Access-Control-Allow-Origin: *');	
    header('Access-Control-Allow-Methods: GET, POST');
	
	include('../partials/dbconfig.php');
	$postdata = json_decode(file_get_contents("php://input"));
    if(isset($postdata))
    {
        $name = $postdata->name;
        $city = $postdata->city;
        $country = $postdata->country;
        $query = "INSERT INTO tblstudents (name,city,country) VALUES ('$name', '$city', '$country')";
		$result['result'] = $conn->query($query) or die($conn->error.__LINE__);

		echo $query;
    }