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

session_start();
$_SESSION['logged-in'] = null;
$_SESSION['name'] = 'Jimbo';

if (isset($_SESSION['logged-in'])) {
    echo "Welcome, {$_SESSION['name']}!";
    echo "<div id='login'><a href=login.php?action=logout>Logout</a></div>";
} else {
    echo "<div id='login'>
            <form action='login.php'>
                Welcome! Please sign in:<br/>
                <input type='text' name='username' placeholder='Username' ><br/>
                <input type='password' name='password' placeholder='Password'>
                <input type='submit' value='Go!'>
            </form>
        </div>";
}




?>

