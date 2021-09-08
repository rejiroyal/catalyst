<?php

$host="localhost"; // Host name.
$db_username="root"; //mysql username
$db_password=""; //mysql password
$db='UsersDB'; // Database name.

//Connecting to MySQL database

$con=mysqli_connect($host,$db_user,$db_password,$db);
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$query = "SELECT ID FROM users";
$result = mysqli_query($con, $query);

if(empty($result)) {
                $query = "CREATE TABLE USERS (
                          ID int(11) AUTO_INCREMENT,
                          Firstname varchar(255) NOT NULL,
                          Surname varchar(255) NOT NULL,
                          Email varchar(255) NOT NULL UNIQUE,
                          PRIMARY KEY  (ID)
                          )";
                $result = mysqli_query($dbConnection, $query);
}
 
 
$file = fopen("users.csv", "r");
         while (($userData = fgetcsv($file, 10000, ",")) !== FALSE)
         {
            $sql = "INSERT into tableName(name,email,address) values('$userData[0]','ucwords($userData[1])','strtolower($userData[2])')";
            //ucwords - in-built php function - convert words to capitalize
            //strtolower - in-built php function convert the words to lowercase
            mysqli_query($con, $sql);
         }
         fclose($file);
         echo "CSV File has been successfully uploaded to users table.";
