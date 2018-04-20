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
        $reqNo = filter_var($_GET['profile'], FILTER_SANITIZE_NUMBER_INT);

        include_once 'Scripts/connection.php';
        $sql = "SELECT name, image, description, reputation, userType
                FROM Users
                WHERE userNo = {$reqNo}";
        $result = mysqli_query($dbcon, $sql);
        $row = mysqli_fetch_array($result);
        $name = $row['name'];
        $image = $row['image'];
        $userType = $row['userType'];
        $reputation = $row['reputation'];
        $desc = $row['description'];
        $profileNo = $_GET['profile'];
    } else {
        /*User is viewing their own page*/
        $name = $_SESSION['name'];
        $image = $_SESSION['image'];
        $reputation = $_SESSION['rep'];
        $userType = $_SESSION['type'];
        $desc = $_SESSION['desc'];
        $profileNo = $_SESSION['userno'];
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
            <a href="<?php echo $image; ?>">
                <img src="<?php echo $image; ?>" alt = "User-submitted Profile picture" width="200px" height="200px" >
            </a>
        </div>
        <div id = "details">
            Name: <?php echo $name ?><br/>
            Type: <?php if ($userType == 1) { //Displays the type of user
                echo "Helper";
            } else {
                echo "Cause";
            }?><br/>
            My reputation: <?php echo $reputation ?>/10<br/>
            My projects: <br/><br/>
            <?php  /* Displays titles and links to associated projects */
            if (isset($_SESSION['logged-in']) && ($_SESSION['logged-in'] == true)){
                include_once 'Scripts/connection.php';
                if ($userType == 1) { /* Gets project No's that the Helper user has helped with */
                    $sql = "SELECT projectNo, name FROM Projects
                        WHERE helperNo = '{$profileNo}'";
                } else { /* Gets project No's that the Cause user has created */
                    $sql = "SELECT projectNo, name FROM Projects
                        WHERE userNo = '{$profileNo}'";
                }
                $result = mysqli_query($dbcon, $sql);
                if ($result){  /* Adds a button for each project user is linked to */
                    echo "<div id='projectList'>";
                    while($row = mysqli_fetch_array($result)){
                        echo "<a href='project-details.php?project={$row['projectNo']}' type='button'>{$row['name']}</a><br/>";
                    }
                    echo "</div>";
                } else {
                    echo "No projects yet!";
                }
            }
            ?>
        </div>
    </div>

    <div id = "details-column">
        <?php echo $desc ?><br/>
    </div>

</div>


</body>
</html>
