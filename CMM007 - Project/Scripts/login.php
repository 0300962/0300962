<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 23/02/2018
 * Time: 15:49
 */
/*
https://stackoverflow.com/questions/3135524/comparing-passwords-with-crypt-in-php
http://php.net/manual/en/function.password-hash.php
http://php.net/manual/en/function.password-verify.php
*/

/*session_start();
$_SESSION['logged-in'] = true;
$_SESSION['name'] = 'Jimbo';*/

/*Presents login boxes if user is not logged-in*/
if (isset($_SESSION['logged-in'])) {
    echo "Welcome, {$_SESSION['name']}!";
    echo "<div id='login'>
            <form name='form' method='post'>
            <input id=logout type='submit' name='logout' value='Logout'>
            </form>
          </div>";
} else {
    echo "<div id='login'>
            <form name='form' method='post'>
                Welcome! Please sign in:<br/>
                <input type='text' name='username' placeholder='Username' ><br/>
                <input type='password' name='password' placeholder='Password'>
                <input id='login' type='submit' value='Go!'>
            </form>
        </div>";
}

/*Checks whether Login.php has been called for a reason*/
if (isset($_POST['logout'])) {
    /*Wipes Session and redirects to homepage*/
    $_SESSION = array();
    session_destroy();
    header("location='../index.php'");
} else if(isset($_POST['login'])) {
    /* Sanitizes user inputs*/
    $un = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL);
    $pw = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    /* Hashes sanitized username and connects to the DB*/
    $hashedUN = password_hash($un, PASSWORD_DEFAULT);
    include_once 'connection.php';
    /*Retrieves the hashed password and User's Name from the database*/
    $sql = "SELECT L.hashedPassword as hashedPassword, U.name as name, U.userNo as userNo
                FROM L.LoginDetails, U.Users
                WHERE hashedLogin = {$hashedUN}
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
        /*Forwards back to last page*/
        header("location='{$_SESSION['last_page']}'");
    }
}



?>

