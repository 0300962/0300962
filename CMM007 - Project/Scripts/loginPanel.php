<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 23/02/2018
 * Time: 15:49
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/*Presents login boxes if user is not logged-in*/
if ($_SESSION['logged-in'] == true) {
    echo "Welcome, {$_SESSION['name']}!";
    echo "<div id='login'>
            <form name='form' action='Scripts/login.php' method='post'>
            <input id='logout' type='submit' name='logout' value='Logout'>
            </form>
          </div>";
} else {
    echo "<div id='login'>
            <form name='loginform' action='Scripts/login.php' method='post'>
                Welcome! Please sign in:<br/>
                <input type='text' name='username' placeholder='Email Address' ><br/>
                <input type='password' name='password' placeholder='Password'><br/>
                <input id='login' type='submit' name='login' value='Sign in'>
            </form>
            Or Register:<br/><br/>
            <a href='register.php' type='button'>Register</a> 
        </div>"; /*Link to register.php shows as wrong, but is fine once embedded on page */
}

?>

