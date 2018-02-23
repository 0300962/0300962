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
    <title>Welcome to Jamrock</title>
    <link rel="stylesheet" href = "style.css" type="text/css">
</head>

<body>
<section> <!--Upper third of page-->
    <div>
        <div id="login_bar">  <!--https://stackoverflow.com/questions/3135524/comparing-passwords-with-crypt-in-php
                                  http://php.net/manual/en/function.password-hash.php
                                  http://php.net/manual/en/function.password-verify.php        -->
            <form action="login.php">
                Welcome! Please sign in:<br/>
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <input type="submit" value="Go!"
            </form>
        </div>

        <a href="index.php">
            <img id="logo" src="#img\logo.png" alt="logo">
        </a>

        <div id="tabs">
            <
        </div>
    </div>
</section>

<section> <!--Testimonials/blurb-->
    <div id="testimonials">
        <h2>Testimonials</h2>
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


    </div>
</section>

</body>
</html>