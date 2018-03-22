<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 23/02/2018
 * Time: 15:49
 */

/*session_start();
$_SESSION['logged-in'] = true;
$_SESSION['name'] = 'Jimbo';*/

/*Presents login boxes if user is not logged-in*/
if (isset($_SESSION['logged-in'])) {
    echo "Welcome, {$_SESSION['name']}!";
    echo "<div id='login'>
            <form name='form' method='post'>
            <input id='logout' type='submit' name='logout' value='Logout'>
            </form>
          </div>";
} else {
    echo "<div id='login'>
            <form name='loginform' method='post'>
                Welcome! Please sign in:<br/>
                <input type='text' name='username' placeholder='Email Address' ><br/>
                <input type='password' name='password' placeholder='Password'><br/>
                <input id='login' type='submit' value='Sign in'>
            </form>
            Or Register:<br/>
            <a href='register.php' type='button'>Register</a> 
        </div>"; /*Link to register.php shows as wrong, but is fine*/
}

/*Checks whether loginPanel.php has been called for a reason*/
if (isset($_POST['logout'])) {
    /*Wipes Session and redirects to homepage*/
    $_SESSION = array();
    session_destroy();
    echo "<script type='text/javascript'> location = 'index.php'</script>";
} else if(isset($_REQUEST['login'])) {
    /* Sanitizes user inputs*/
    $un = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL);
    $pw = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    include_once 'connection.php';
    /*Retrieves the hashed password and User's Name from the database*/
    $sql = "SELECT L.hashedPassword as hashedPassword, U.name as name, U.userNo as userNo
                FROM L.LoginDetails, U.Users
                WHERE login = {$un}
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
        echo "<script type='text/javascript'> location = '{$_SESSION['last_page']}'</script>";
    }
} else if(isset($_POST['register'])) {
    echo "New User";
    /* Sanitizes user inputs*/
    $un = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL);
    $pw = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    /* Hashes sanitized username and connects to the DB*/
    $hashedUN = password_hash($un, PASSWORD_DEFAULT);
    $hashedPW = password_hash($pw, PASSWORD_DEFAULT);
    include_once 'connection.php';
    /*Retrieves the hashed password and User's Name from the database*/
    $sql = "INSERT INTO LoginDetails (hashedLogin, hashedPassword)
            VALUES ({$hashedUN}, {$hashedPW})";
    $result = mysqli_query($dbcon, $sql);
    if($result) {
        header("location='{$_SESSION['last_page']}'");
    } else {
        echo "Error adding new user";
    }
    mysqli_close($dbcon);
}
/*Wipes temporary variables*/
unset ($pw);
unset ($un);

?>

