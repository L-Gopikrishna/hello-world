<?php
session_start();
$DATABASE_HOST = "localhost";
$DATABASE_USER = "root";
$DATABASE_PASS = "";
$DATABASE_NAME = "test11";

$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if(mysqli_connect_error($conn)) {
    exit('Error connecting to database');
}
 function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }

 $username = validate($_POST['username']);
 $password = validate($_POST['password']);
 if(empty($username)){
     exit('Username is required');
 }
 if(empty($password)) {
     exit('Password is required');
 }
 $qry = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
 $result = mysqli_query($conn, $qry);
 if(mysqli_num_rows($result) === 1) {
     $row = mysqli_fetch_assoc($result);
     if($row['username'] === "$username" && $row['password'] === "$password") {
         echo "Signed In";
         $_SESSION['name'] = $row['name'];
         $_SESSION['username'] = $row['username'];
         $_SESSION['id'] = $row['id'];
         header ('Location: home.php');
     }
     else {
         exit("Username or Password Incorrect");
     }
 }
 else {
     header ('Location: index.php');
 }
?>