<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 16/03/2018
 * Time: 15:16
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION['userFile'])){
    /*User has requested another user's profile page*/
    $name = $_SESSION['userFile']['name'];
    $image = $_SESSION['userFile']['image'];
    $reputation = $_SESSION['userFile']['reputation'];
    $userType = $_SESSION['userFile']['userType'];
    unset($_SESSION['userFile']);
} elseif (isset($_SESSION['logged-in']) && ($_SESSION['logged-in'] == true)) {
    /*User is viewing their own page*/
    $name = $_SESSION['name'];
    $image = $_SESSION['image'];
    $reputation = $_SESSION['rep'];
    $userType = $_SESSION['type'];
} else {
    /*Guest User*/
    $name = "Please log in!";
    $image = "img/blank.jpeg";
    $reputation = '?';
    $userType = 0;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href = "CSS/profile-style.css" type="text/css">
</head>
<body>

<div class = "profile-flex-c">
    <div id = "lh-column">
        <div id = "profile-pic">
            <img src="<?php echo $image; ?>" alt = "Profile picture" width="200px" height="200px" > <!--Need to set picture from DB-->
        </div>
        <div id = "details">
            Name: <?php echo $name ?><br/>
            My projects: <!--Need to retrieve linked projects from DB--><br/>
            My reputation: <?php echo $reputation ?>/10<br/>
        </div>
        <!--Consider adding button for logged-in users to contact?-->
    </div>

    <div id = "details-column">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>

</div>


</body>
</html>
