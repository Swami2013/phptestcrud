<?php


//Title: Update a record
//Date: 13th Jan 2021
//Purpose: Interview PHP test

// headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


// include config file
include_once 'config.php';

$dbname = 'phptest';
$collection = 'users';

// Database connection
$db = new DbManager();
$conn = $db->getConnection();

$data = json_decode(file_get_contents("php://input", true));

$fields = $data->{'fields'};

$set_values = array();

foreach ($fields as $key => $fields) {
	$arr = (array)$fields;
	foreach ($fields as $key => $value) {
		$set_values[$key] = $value;
	}
}

$id = $data->{'where'};

// update record
$update = new MongoDB\Driver\BulkWrite();
$update->update(
	['_id' => new MongoDB\BSON\ObjectId($id)], ['$set' => $set_values], ['multi' => false, 'upsert' => false]
);

$result = $conn->executeBulkWrite("$dbname.$collection", $update);

// verify
if ($result->getModifiedCount() == 1) {
    echo json_encode(
		array("message" => "Record!!! updated successfully")
	);
} else {
    echo json_encode(
            array("message" => "Error!!! while updating record")
    );
}

?>