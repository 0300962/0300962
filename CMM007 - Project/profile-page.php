<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 16/03/2018
 * Time: 15:16
 */
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
            <img src="#" alt = "Profile picture"> <!--Need to set picture from DB-->
        </div>
        <div id = "details">
            Name: <!--Consider how to allow guest access; name should not be set by session--><br/>
            My projects: <!--Need to retrieve linked projects from DB--><br/>
        </div>
        <!--Consider ading button for logged-in users to contact?-->
    </div>

    <div id = "details-column">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    </div>

</div>


</body>
</html>
