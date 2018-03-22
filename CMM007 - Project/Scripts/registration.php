<?php
/**
 * Created by PhpStorm.
 * User: Bobsan
 * Date: 19-Mar-18
 * Time: 5:57 PM
 */

session_start();

/* Returns to the register page with error code*/
function redirect($err_no) {
    echo "test";
    echo "<!DOCTYPE html><html lang='en'><head></head><body><script type='text/javascript'> location = '../register.php?error={$err_no}'</script></html>";
}

include_once 'Scripts/connection.php';

//Takes form data from register-page.php and creates new user in DB
$un = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$pw = filter_var($_POST['password1'], FILTER_SANITIZE_STRING);
$pw2 = filter_var($_POST['password2'], FILTER_SANITIZE_STRING);

if ($pw != $pw2) {
    echo "Passwords do not match!";
    redirect('1');
} else if(!filter_var($un, FILTER_VALIDATE_EMAIL)){
    echo "Invalid email address!";
    redirect('2');
} else {
    /* Hashes sanitized username and connects to the DB*/
    $hashedUN = password_hash($un, PASSWORD_DEFAULT);
    $hashedPW = password_hash($pw, PASSWORD_DEFAULT);

    include_once 'connection.php';
    /*Checks if email address already in the database*/
    $sql = "SELECT hashedLogin, userNo
                FROM LoginDetails
                WHERE hashedLogin = {$hashedUN}";
    $result = mysqli_query($dbcon, $sql);

    if ($result) {
        echo "Username already registered!";
        redirect(3);
    } else {
        $imgext = pathinfo($_POST['image'], PATHINFO_EXTENSION);
        if ($imgext !== 'jpg' && $imgext !== 'jpeg') {
            echo "Error adding login details";
            redirect(4);
        } else {
            $sql = "INSERT INTO LoginDetails (hashedLogin, hashedPassword)
                VALUES ({$hashedUN}, {$hashedPW})";
            $result = mysqli_query($dbcon, $sql);
            if ($result) {
                /*Retrieves user number for just-added account*/
                $sql = "SELECT userNo
                        FROM LoginDetails
                        WHERE hashedLogin = {$hashedUN}";
                $result = mysqli_query($dbcon, $sql);
                $row = mysqli_fetch_assoc($result);

                $userNo = $row['userNo'];
                $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
                $image = $_POST['image'];
                $type = $_POST['type'];
                /*Checks whether the UserType flag has been tampered-with*/
                if (!in_array($type, range(0, 1, 1))) {
                    echo "Invalid user type";
                    redirect(5);
                } else {
                    /*Adds new user details to the system*/
                    $sql = "INSERT INTO Users (userNo, name, image, reputation, userType)
                VALUES ({$userNo}, {$name}, {$image}, 5, {$type})";
                    $result = mysqli_query($dbcon, $sql);
                    if ($result) {
                        header("Location: 'index.php'");
                    }
                }
            }
            mysqli_close($dbcon);
        } else {
            echo "Image file not JPG or JPEG";
            redirect(7);
        }
    }
}
?>