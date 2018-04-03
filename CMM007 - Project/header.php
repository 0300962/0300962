<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 14/03/2018
 * Time: 17:08
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href = "CSS/header-style.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
</head>
<body>
    <div class="header-flex-container">
        <?php
            if (!isset($_COOKIE["accepted"])) {
                echo "<div id='cookiemonster'>This site uses cookies to help us remember who you are.  Please click here to accept and close this banner: ";
                echo "<form name='cook' action='Scripts/cookie.php?accept=y' method='post'> ";
                echo "<input id='accept' type='submit' name='accept' value='Accept'></form>";
                echo "</div><br/></div><div class='header-flex-container'>";
            }
        ?>
        <div id="logo">
            <a href="index.php">
                <img id="logo" src="img/logo.png" alt="Labour For Change Logo">
            </a>
        </div>

        <div id="colourtest">
            <div id="colour1"></div>
            <div id="colour2"></div>
            <div id="colour3"></div>
            <div id="colour4"></div>
            <div id="colour5"></div>
        </div>

        <div id="Login">
            <?php include 'Scripts/loginPanel.php' ?>
        </div>

    </div>
    <div id="navbar">
        <div id="abouttab" onmouseover="changer('about')"><a href="about.php">About</a></div>
        <div id="projectstab" onmouseover="changer('projects')"><a href="projects.php">Projects</a></div>
        <div id="profiletab" onmouseover="changer('profile')"><a href="profile.php">My Profile</a></div>
    </div>

    </div>

</body>
</html>