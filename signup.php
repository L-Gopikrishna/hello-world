<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 $DATABASE_HOST = "localhost";
 $DATABASE_USER = "root";
 $DATABASE_PASS = "";
 $DATABASE_NAME = "test11";

 $conn = mysqli_connect( $DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

 function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }

 $username = validate($_POST['username']);
 $name = validate($_POST['name']);
 $password = validate($_POST['password']);
 $email = validate($_POST['email']);
 if(mysqli_connect_error()) {
    exit('Error connecting to the database' . mysqli_connect_error()); 
 }
 if(!isset($name, $username, $email, $password)) {
     exit('Fields Empty');
 }
 if(empty($name || $username || $email || $password)) {
     exit('Empty Value(s)');
 }
 $stmt = $conn->prepare('SELECT id, password FROM `users` WHERE `username` = ?');
 if($stmt = $conn->prepare('SELECT id, password FROM `users` WHERE `username` = ?')) {
     $stmt->bind_param('s', $username);
     $stmt->execute();
     $stmt->store_result();
     if($stmt->num_rows>0) {
         echo ('Username already exists');
     }
     else {
        // $stmt = $conn->prepare('INSERT INTO users (name, username, password, email) VALUES (?, ?, ?, ?)');
        // print_r($_POST);die;
        if($stmt = $conn->prepare('INSERT INTO users (name, username, password, email) VALUES (?, ?, ?, ?)')){
        //$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt->bind_param('ssss', $name, $username, $password, $email);
        $stmt->execute();
        header ('Location: index.php?error=Successfully Registered');
        }
        else {
            echo 'Error occurred';
        }
     }
     $stmt->close();
 }
 else {
     echo 'Error occurred';
 }
 $conn->close();
?>