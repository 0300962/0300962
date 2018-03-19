<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 15-Mar-18
 * Time: 1:35 PM
 */?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href = "CSS/front-page.css" type="text/css">
</head>
<body>

    <script> //Changes the banner image in response to navbar tab interaction
        function changer(img) {
            if (img === 'about') {
                document.getElementById("banner").src = "img/about_banner.jpg";
            } else if (img === 'projects'){
                document.getElementById("banner").src = "img/projects_banner.jpg";
            } else {
                document.getElementById("banner").src = "img/profile_banner.jpg";
            }
        }
    </script>

    <div class="imgcontainer">
        <div id="images">
            <img id="banner" src="img/about_banner.jpg" alt="Banner image">
        </div>
    </div>

    <div class="container">
        <div id="columns">
        <h3>Testimonials</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

        </div>
        <div id="social">
            <div>
                <a class="twitter-timeline" data-width="400" data-height="400" href="https://twitter.com/SPTelescope?ref_src=twsrc%5Etfw">Tweets by SPTelescope</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>
    </div>
</body>
</html>