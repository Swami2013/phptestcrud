<?php

//Title: Read a record
//Date: 13th Jan 2021
//Purpose: Interview PHP test

// headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include config file
include_once 'config.php';

$dbname = 'phptest';
$collection = 'users';

$db = new DbManager();
$conn = $db->getConnection();

// get all records
$filter = [];
$option = [];
$read = new MongoDB\Driver\Query($filter, $option);

//fetch records
$records = $conn->executeQuery("$dbname.$collection", $read);

echo json_encode(iterator_to_array($records));

?>