<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 19-Mar-18
 * Time: 6:01 PM
 */
session_start();
?>

<html lang="en">
<head>
    <link rel="stylesheet" href = "CSS/register.css" type="text/css">
</head>
<body>
    <div class="container">
        <div id="disclaimer">
            <h3>Please read carefully before creating an account:</h3>
            <ul>
                <li>Do not give out any personal information, in profiles or messages.</li>
                <li>This site is not liable for any data loss that may occur as a result of using it.</li>
                <li>This site may use cookies as part of the login system.</li>
            </ul>

        </div>

        <div id="form">
            <form name="register" action="Scripts/register.php" method = "post">
                Name =
                <input name="name" type = "text" placeholder="Your Name"><br/><br/>
                Email address =
                <input name="email" type="email" placeholder="me@somedomain.com"><br/><br/>
                Password =
                <input name="password" type="password" label = "Password = " placeholder="Password"><br/><br/>
                Confirm Password =
                <input name="password" type="password" label = "Password = " placeholder="Password"><br/><br/>
                Profile image =
                <input name="image" type="file"><br/><br/>
                Account type =
                <select name="type">
                    <option value="1">Helper - I want to use my skills to help others</option>
                    <option value="0">Cause - I am a good cause in need of some assistance</option>
                </select><br/><br/>
                <input id="register" type="submit" value="Register">
            </form>
        </div>

    </div>
</body>
</html>