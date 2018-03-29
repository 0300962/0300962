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

if (isset($_SESSION['logged-in']) && ($_SESSION['logged-in'] == true)){
    if(isset($_GET['profile'])) {
        /*User has requested another user's profile page*/
        include_once 'Scripts/connection.php';
        $sql = "SELECT name, image, description, reputation, userType
                FROM Users
                WHERE userNo = {$_GET['profile']}";
        $result = mysqli_query($dbcon, $sql);
        $row = mysqli_fetch_array($result);
        $name = $row['name'];
        $image = $row['image'];
        $userType = $row['userType'];
        $reputation = $row['reputation'];
        $desc = $row['description'];
    } else {
        /*User is viewing their own page*/
        $name = $_SESSION['name'];
        $image = $_SESSION['image'];
        $reputation = $_SESSION['rep'];
        $userType = $_SESSION['type'];
        $desc = $_SESSION['desc'];
    }
} else {
    /*Guest User*/
    $name = "Please log in!";
    $image = "img/blank.jpeg";
    $reputation = '?';
    $userType = 0;
    $desc = "Sorry, there's nothing to see here.";
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
            <img src="<?php echo $image; ?>" alt = "Profile picture" width="200px" height="200px" >
        </div>
        <div id = "details">
            Name: <?php echo $name ?><br/>
            My projects: <!--Need to retrieve linked projects from DB--><br/>
            My reputation: <?php echo $reputation ?>/10<br/>
        </div>
        <!--Consider adding button for logged-in users to contact?-->
    </div>

    <div id = "details-column">
        <?php echo $desc ?><br/>
    </div>

</div>


</body>
</html>
