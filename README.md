README.md

# phptestcrud
PHP code test

Problem statement


Build a RESTful API service using just Core PHP. The service should contain all the needed routes to perform standard CRUD (Create, Retrieve by ID, Retrieve all, Update, Delete) operations for a User object. 

The User object could just be a JSON document with a set of expected fields like first name, last name and so on.

MongoDB should be used for storage.

---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

For a given above application - created 4 different RESTful APIs (CRUD Operations - Create/ insert, Read/ get, Update and Delete). The details of these APIs on how to execute as request and response is in postman - is added to the link below.

URL [ API documentation ] - https://documenter.getpostman.com/view/6390751/TVzSmHyz

Please follow below steps to run this application on Windows 10, Xampp, PHP 7.2.34, Apache 2.4, MongoDB 4.4.3

1: Install MongoDB on windows 10
2: Configure MongoDB to work with PHP 7 w/ extension addition and php.ini config
3: Download the repo folder and copy it to xampp/htdocs folder. OR Use the sourcecode in this repo
4: A postman documentation for rest api created .
5: Run the apis in postman as per the documentation provided for CRUD operations.


API 1: Insert/ Create a record
http://localhost/test-apis/insert.php

POST

Request
{
    "firstName" : "Amol",
    "lastName" : "Joshi",
    "tags" : [ "IT", "AI", "ML"]
}
---------------------------------------------

API 2: Read a record
http://localhost/test-apis/get.php

GET

Request: none
---------------------------------------------

API 3 : Update a record
http://localhost/test-apis/update.php

PUT

Request:
{
    "where" : "5ffeea2b0eaef41e60006985",
    "fields" : [
        { "firstName" : "Mahesh"},
        { "lastName" : "Kulkarni"}
    ]
}
---------------------------------------------

A{I 4: Delete a record
http://localhost/test-apis/delete.php

DELETE

Request: 
{
    "where" : "5ffee8440eaef41e60006984"
}


----------------------------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------------------
Happy coding :)
