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

/* Confirms login status and links to messaging page */
if ((isset($_SESSION['logged-in'])) && ($_SESSION['logged-in'] == TRUE)) {
        echo "<div id='login'>Welcome, {$_SESSION['name']}!";
        echo "<form name='form' action='Scripts/login.php' method='post'><br/>
            <input id='logout' type='submit' name='logout' value='Logout'><br/>
            </form><br/>
            <a href='messages.php' type='button'>Messages</a>
            </div>";
} else {  /*Presents login boxes if user is not logged-in*/
    echo "<div id='login'>
        <form name='loginform' action='Scripts/login.php' method='post'>
            Welcome! Please sign in:<br/>
            <input type='text' name='username' placeholder='Email Address' ><br/>
            <input type='password' name='password' placeholder='Password'><br/>
            <input type='submit' name='login' value='Sign in'>
        </form><br/>
        Or Register: <a href='register.php' type='button'>Register</a>
    </div>";
    }

?>

