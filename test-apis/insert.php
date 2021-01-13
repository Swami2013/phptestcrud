<?php


//Title: Insert a record
//Date: 13th Jan 2021
//Purpose: Interview PHP test

// headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include config file
include_once 'config.php';

// DB to connect
$dbname = 'phptest';
$collection = 'users';

// Database connection
$db = new DbManager();
$conn = $db->getConnection();

$data = json_decode(file_get_contents("php://input", true));

// insert record
$insert = new MongoDB\Driver\BulkWrite();
$insert->insert($data);

$result = $conn->executeBulkWrite("$dbname.$collection", $insert);

if ($result->getInsertedCount() == 1) {
    echo json_encode(
		array("message" => "Record!!! inserted successfully")
	);
} else {
    echo json_encode(
            array("message" => "Error!!! record is not inserted")
    );
}

?>