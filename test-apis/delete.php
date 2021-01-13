<?php

//Title: Delete a record
//Date: 13th Jan 2021
//Purpose: Interview PHP test

// headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");

// include config for db connection
include_once 'config.php';

$dbname = 'phptest';
$collection = 'users';

// connection string
$db = new DbManager();
$conn = $db->getConnection();


$data = json_decode(file_get_contents("php://input", true));
//_id field value
$id = $data->{'where'};

$delete = new MongoDB\Driver\BulkWrite();
$delete->delete(
	['_id' => new MongoDB\BSON\ObjectId($id)],
	['limit' => 0]
);

$result = $conn->executeBulkWrite("$dbname.$collection", $delete);

// result in json form
if ($result->getDeletedCount() == 1) {
    echo json_encode(
		array("message" => "Record!!! is deleted successfully")
	);
} else {
    echo json_encode(
            array("message" => "Error!!! - record not deleted")
    );
}

?>