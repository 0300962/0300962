<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 19-Mar-18
 * Time: 6:01 PM
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<html lang="en">
<head>
    <link rel="stylesheet" href = "CSS/register.css" type="text/css">
</head>
<body>
    <div class = "container"> <!-- Error message panel -->
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
                    case 8:
                        echo "Error: Image greater than 750KB.";
                        break;
                    case 9:
                        echo "Image upload failure. Possible duplicate image name.";
                        break;
                    case 10:
                        echo "Incorrect Username or Password; please check and try again.";
                        break;
                    case 11:
                        echo "Error: Cookies are required to log into this website. Please accept and try again.";
                        break;
                    default:
                        echo "Unknown error: Please contact system administrator.";
                }
                echo "</div>";
            }
        ?>

    </div>
    <div class="container">
        <div id="banner">
            <img src="img/profile_banner2.jpg" alt="Register new account">
        </div>
    </div>
    <div class="container">
        <div id="disclaimer">
            <h3>Please read carefully before creating an account:</h3>
            <ul>
                <li>Do not give out any personal information, in profiles or messages.</li>
                <li>This site is not liable for any data loss that may occur as a result of using it.</li>
                <li>Login details are stored with a robust hash algorithm, however it is strongly recommended to not reuse passwords on other services.</li>
                <li>This site may use cookies as part of the login system.</li>
                <li>Labour For Change is a non-political entity.</li>
                <li>Labour For Change does not perform any vetting or authentication of users.  This system was developed as an academic exercise.</li>
            </ul>
        </div>

        <div id="form">
            <form name="register" action="Scripts/registration.php" method = "post" enctype="multipart/form-data">
                <label for="name">Your Name</label>
                <input name="name" type = "text" maxlength="30" placeholder="Your Name" required><br/><br/>
                <label for="email">Email address</label>
                <input name="email" type="email" placeholder="me@somedomain.com" required><br/><br/>
                <label for="password1">Password</label>
                <input name="password1" type="password" placeholder="Password" required><br/><br/>
                <label for="password2">Confirm Password</label>
                <input name="password2" type="password" placeholder="Password" required><br/><br/>
                <label for="image">Profile image (.jpg or .jpeg only, <750KB)</label>
                <input name="image" id="image" type="file" required><br/><br/>
                <label for="description">About you</label>
                <textarea title="description" name="description" rows="5" cols="60" maxlength="500" placeholder="Tell us a little about yourself.  What do you do, why are you here? (max 500 characters)" required></textarea><br/><br/>
                <label for="type">Account type</label>
                <select title="Account type = " name="type" required>
                    <option value="1">Helper - I want to use my skills to help others</option>
                    <option value="0">Cause - I am a good cause in need of some assistance</option>
                </select><br/><br/>
                <input id="register" type="submit" value="Register">
            </form>

        </div>

    </div>
</body>
</html>