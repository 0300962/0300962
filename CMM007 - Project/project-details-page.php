<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 29-Mar-18
 * Time: 10:14 AM
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(isset($_GET['project'])) { /* Gets project details */
    $number = $_GET['project'];
    include_once 'Scripts/connection.php';
    $sql = "SELECT name, userNo, tags, summary, description, deadline, image, deadline, outputs
                        FROM projects
                        WHERE projectNo = {$number}";
    $result = mysqli_query($dbcon, $sql);
    $row = mysqli_fetch_array($result);
}


?>
<html lang="en">
    <head>
        <link rel="stylesheet" href = "CSS/profile-style.css" type="text/css">
    </head>
    <body>

    <div class = "container">
        <?php //Have to check for login status
           if(isset($_SESSION['logged-in']) && ($_SESSION['logged-in'] == TRUE)){
                if ($_SESSION['type'] == 1) {
                echo "<div id='error'>Error - User must be logged-in to view project details!</div></div>";
                } else {
                ?>
                <div class = "profile-flex-c">
                    <div id = "lh-column">
                        <div id = "profile-pic">
                            <img src="<?php echo $row['image']; ?>" alt = "Project picture" width="200px" height="200px" >
                        </div>
                        <div id = "details">
                            Project Name: <?php echo $row['name'] ?><br/>
                            Deadline: <?php echo $row['deadline']?><br/>
                            Category Tags: <?php echo $row['tags']?><br/>
                        </div>
                        <!--Consider adding button for logged-in users to contact?-->
                    </div>

                    <div id = "details-column">
                        <h2><?php echo $row['name']?></h2>
                        <p><?php echo $row['summary']?></p>
                        <p><?php echo $row['description']?></p>
                        <h2>Required Outputs</h2>
                        <p><?php echo $row['outputs']?></p>
                        <h3>Deadline - <?php echo $row['deadline']?></h3>
                    </div>

                </div>
                <?php
                }
            }





















