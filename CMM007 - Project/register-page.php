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
    <div class = "container">
        <?php
            if (isset($_GET['error'])) {
                echo "<div id='error_box'>";
                switch ($_GET['error']) {
                    case 1:
                        echo "Error: Passwords do not match!";
                        break;
                    case 2:
                        echo "Error: Invalid email address!";
                        break;
                    case 3:
                        echo "Error: That email address is already registered!";
                        break;
                    case 4:
                        echo "Error: Could not create new User. Please contact system administrator.";
                        break;
                    case 5:
                        echo "Error: Invalid User type.  Please contact system administrator.";
                        break;
                    case 6:
                        echo "Error: Could not add User details.  Please contact system administrator.";
                        break;
                    case 7:
                        echo "Error: Image file not .jpg or .jpeg.";
                        break;
                    default:
                        echo "Unknown error: Please contact system administrator.";
                }
                echo "</div>";
            }
        ?>

    </div>
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
            <form name="register" action="Scripts/registration.php" method = "post">
                Name =
                <input name="name" type = "text" placeholder="Your Name"><br/><br/>
                Email address =
                <input name="email" type="email" placeholder="me@somedomain.com"><br/><br/>
                Password =
                <input name="password1" type="password" placeholder="Password"><br/><br/>
                Confirm Password =
                <input name="password2" type="password" placeholder="Password"><br/><br/>
                Profile image =
                <input name="image" type="file"><br/><br/>
                Account type =
                <select title="Account type = " name="type">
                    <option value="1">Helper - I want to use my skills to help others</option>
                    <option value="0">Cause - I am a good cause in need of some assistance</option>
                </select><br/><br/>
                <input id="register" type="submit" value="Register">
            </form>

        </div>

    </div>
</body>
</html>