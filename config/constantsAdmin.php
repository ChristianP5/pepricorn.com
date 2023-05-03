<?php
    //Start Session
    session_start();
    //Create constant to Store non Repeating Values
    define('SITEURL', 'http://localhost/Pepricorn/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'admin');
    define('DB_PASSWORD', 'admin111');
    define('DB_NAME', 'pepricorn');
    
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die(mysqli_error());
    //usually 'username' for us developers is 'root' and passowrd is blank
    //mysqli_connect format: " mysqli_connect('localhost', 'username', 'password') "

    //$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
    //mysqli_select_db format: "mysqli_select_db('DBNAME')"