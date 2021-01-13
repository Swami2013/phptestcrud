<?php

//Title: Read a record
//Date: 13th Jan 2021
//Purpose: Interview PHP test

class DbManager {

	//Database configuration
	private $dbhost = 'localhost';
	private $dbport = '27017';
	private $conn;
	
	function __construct(){
        try {
	    $this->conn = new MongoDB\Driver\Manager('mongodb://' . $this->dbhost . ':' . $this->dbport);
        }catch (MongoDBDriverExceptionException $e) {
            echo $e->getMessage();
			echo nl2br("Error! not connected");
        }
    }

	function getConnection() {
		return $this->conn;
	}

}

?>