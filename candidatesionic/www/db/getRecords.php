<?php
header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");
include('../partials/dbconfig.php');

 try
    {
        $conn = OpenConnection();
        $tsql = "SELECT [CompanyName] FROM SalesLT.Customer";
        $result = sqlsrv_query($conn, $tsql);
        if ($result == FALSE)
            die(FormatErrors(sqlsrv_errors()));
        $ctr = 0;
        $arr[];

        while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
        {
            $arr[$ctr] = $row;
            $ctr++;
        }

        sqlsrv_free_stmt($result);
        sqlsrv_close($conn);

        $json_response = json_encode($arr);
		echo $json_response;
    }
    catch(Exception $e)
    {
        echo("Error!");
    }




