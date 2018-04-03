<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 03-Apr-18
 * Time: 2:45 PM
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['accept'])) {
    /* Sets cookie to show that cookies are accepted, although only the Session ID is actually used */
    $accepted = "accepted";
    $val = "User_has_accepted_cookies";
    setcookie($accepted, $val, time()+300, "/"); //5 minutes login time
}

echo "<script type='text/javascript'> location = '../index.php'</script>";

?>