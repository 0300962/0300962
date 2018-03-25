<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 20/03/2018
 * Time: 13:04
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<html lang="en">
<head>
    <link rel="stylesheet" href = "CSS/projects.css" type="text/css">
</head>
<body>
    <div class = "container">
        <div id="controls">
            <form name="controls" method="post">
                <input type="text" name="search" placeholder="Search"><br/>
                <!-- Tag selector?-->
                <!-- Deadline selector?-->
                <br/>
                <input id="go" type="submit" value="Search!">
            </form><br/>
        <?php /* Checks for a looged-in, Cause user */
            if(isset($_SESSION['logged-in']) && ($_SESSION['logged-in'] == TRUE)){
                if ($_SESSION['type'] == 0) {
                    echo "<a href='new-project.php' type='button'>Create a New Project</a>";
                }
            }
            echo "<br/><br/><a href='projects.php' type='button'>View all Projects</a>";

            ?>
        </div>
        <div id="projectlist">
            <?php
                include_once 'Scripts/connection.php';
                $sql = "SELECT name, tags, summary, deadline, image
                        FROM projects
                        WHERE status = 1";
                $result = mysqli_query($dbcon, $sql);
                echo "<table><tr><th></th><th>Project</th><th>Project Summary</th></tr>";
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)){
                        echo "<tr><td><img src = '{$row['image']}' alt = 'Project image'></td><td>{$row['name']}</td><td>{$row['summary']}</td></tr>";
                    };
                } else {
                    echo "<tr><td colspan='3'>No projects found!</td></tr>";
                }
                echo "</table>";
            ?>
        </div>





    </div>
</body>
</html>