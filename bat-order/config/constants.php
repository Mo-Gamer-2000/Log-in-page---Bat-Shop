<?php
          ob_start();

          //Start the session
          session_start();

         //Create constants to store non repeating values
         define('SITEURL', 'http://localhost/bat-order/');
         define('LOCALHOST', 'localhost');
         define('DB_USERNAME', 'root');
         define('DB_PASSWORD', '');
         define('DB_NAME', 'bat-order');
         
         $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($conn)); //Database connection
         $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn)); //Selecting database
?>