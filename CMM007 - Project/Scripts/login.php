<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 22-Mar-18
 * Time: 4:36 PM
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['logout'])) {
    /*Wipes Session and redirects to homepage*/
    $_SESSION = array();
    session_destroy();
    echo "<script type='text/javascript'> location = '../index.php'</script>";
} else if(isset($_REQUEST['login'])) {
    /* Sanitizes user inputs*/
    $un = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL);
    $pw = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    include_once 'connection.php';

    /*Retrieves the hashed password and User's Name from the database*/
    $sql = "SELECT L.hashedPassword as hashedPassword, U.name as name, U.userNo as userNo,
                  U.reputation as reputation, U.userType as userType, U.image as image, U.description as description
                FROM LoginDetails L, Users U
                WHERE login = '{$un}'
                AND L.userNo = U.userNo";
    $result = mysqli_query($dbcon, $sql);
    $row = mysqli_fetch_assoc($result);
    $pwhash = $row['hashedPassword'];
    mysqli_close($dbcon);

    /*Checks whether password matches the one held in DB*/
    if (password_verify($pw, $pwhash)){
        /*Sets session details for logged-in User*/
        $_SESSION['logged-in'] = true;
        $_SESSION['name'] = $row['name'];
        $_SESSION['userno'] = $row['userNo'];
        $_SESSION['rep'] = $row['reputation'];
        $_SESSION['type'] = $row['userType'];
        $_SESSION['image'] = $row['image'];
        $_SESSION['desc'] = $row['description'];

        /*Forwards back to last page*/
        echo "<script type='text/javascript'> location = '../{$_SESSION['last_page']}'</script>";
    } else {
        /* Failed login */
        $_SESSION['logged-in'] = false;
        echo "<script type='text/javascript'> location = '../register.php?error=10'</script>";
    }
}