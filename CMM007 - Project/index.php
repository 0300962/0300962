<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 23/02/2018
 * Time: 13:57
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to my nightmare</title>
    <link rel="stylesheet" href = "old_style.css" type="text/css">
</head>

<body>
<section id="top_row"> <!--Upper third of page-->
    <div>
        <div id="login_bar">
            <form action="login.php">
                Welcome! Please sign in:<br/>
                <input type="text" name="username" placeholder="Username" >
                <input type="password" name="password" placeholder="Password">
                <input type="submit" value="Go!"
            </form>
        </div>

        <a href="index.php">
            <img id="logo" src="#img\logo.png" alt="logo">
        </a>
    </div>

    <div>
        <div id="tabs">
            <a href="about.php" title="About Us">Learn More</a>
            <a href="projects.php" title="See current projects">Current Projects</a>
            <a href="profile.php" title="View your profile page">My Profile</a>
        </div>
    </div>
</section>

<section><!--Central image pane-->
    <div id="main_images">
        <img src="img\#" alt="Full-width image"/>
    </div>
</section>

<section> <!--Testimonials/blurb-->
    <div id="testimonials">
        <h3>Testimonials</h3>
        <div class="testimonial">
            <h3>Some user</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus at laoreet elit. Sed at dui justo. Phasellus leo nulla, consequat nec sodales vel, finibus at nulla. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ac lorem vel felis egestas bibendum. Integer venenatis bibendum eros, vel convallis sapien consequat a.</p>
        </div>
        <div class="testimonial">
            <h3>Some other user</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus at laoreet elit. Sed at dui justo. Phasellus leo nulla, consequat nec sodales vel, finibus at nulla. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ac lorem vel felis egestas bibendum. Integer venenatis bibendum eros, vel convallis sapien consequat a.</p>
        </div>
    </div>
</section>

<section> <!--footer-->
    <div id="footer">
        Developed by Brendan Campbell<br/>
        2018, Robert Gordon University

    </div>
</section>

</body>
</html>