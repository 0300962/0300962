<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 14/03/2018
 * Time: 17:08
 */?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href = "header-style.css" type="text/css">
</head>
<body>
    <div class="header-flex-container">
        <div id="logo">
            <a href="old_index.php">
                <img id="logo" src="img\logo.png" alt="logo">
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
            <?php include 'login.php' ?>
        </div>

    </div>
    <div class="navbar">
        <div><a href="#">About</a></div>
        <div><a href="#">Projects</a></div>
        <div><a href="#">My Profile</a></div>
    </div>

    </div>





</body>
</html>