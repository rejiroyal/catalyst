<?php

$host="localhost"; // Host name.
$db_username="root"; //mysql username
$db_password=""; //mysql password
$db='UsersDB'; // Database name.

//Connecting to MySQL database

$con=mysqli_connect($host,$db_username,$db_password,$db);
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

  $query = "CREATE TABLE IF NOT EXISTS USERS (
    ID int(11) AUTO_INCREMENT,
    Firstname varchar(255) NOT NULL,
    Surname varchar(255) NOT NULL,
    Email varchar(255) NOT NULL UNIQUE,
    PRIMARY KEY  (ID)
    )";
  if(mysqli_query($con, $query)){
    echo "Table created successfully.";
  } else{
      echo "ERROR: Could not able to execute $query. " . mysqli_error($con);
  }
  mysqli_close($con);
 
  if (($handle      = fopen("users.csv", "r")) !== FALSE) {
    while (($userData = fgetcsv($handle, 10000, ",")) !== FALSE)
    {
      if (!filter_var($userData[2], FILTER_VALIDATE_EMAIL)){
      print "Invalid email found, insert to user table has been skipped";
    }
      else{
        $sql = "INSERT into USERS(name,email,address) values('$userData[0]','ucwords($userData[1])','strtolower($userData[2])')";
        //ucwords - in-built php function - convert words to capitalize
        //strtolower - in-built php function convert the words to lowercase
        mysqli_query($con, $sql);
      }   
    }
  }  
    echo "User with valid data from CSV File has been successfully uploaded to users table.";
?>