<?php
/**
 * Created by PhpStorm.
 * User: Bobsan
 * Date: 19-Mar-18
 * Time: 5:57 PM
 */

session_start();

include_once 'connection.php';

//Takes form data from register.php and creates new user in DB

$un = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$pw = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
/* Hashes sanitized username and connects to the DB*/
$hashedUN = password_hash($un, PASSWORD_DEFAULT);
$hashedPW = password_hash($pw, PASSWORD_DEFAULT);

include_once 'connection.php';
/*Need to check for existing user*/
/*Retrieves the hashed password and User's Name from the database*/
$sql = "SELECT hashedPassword
                FROM LoginDetails
                WHERE hashedLogin = {$hashedUN}";
$result = mysqli_query($dbcon, $sql);
$row = mysqli_fetch_assoc($result);
if($row)


$sql = "INSERT INTO LoginDetails (hashedLogin, hashedPassword)
            VALUES ({$hashedUN}, {$hashedPW})";
$result = mysqli_query($dbcon, $sql);
if($result) {
    header("location='{$_SESSION['last_page']}'");
} else {
    echo "Error adding new user";
}
mysqli_close($dbcon);