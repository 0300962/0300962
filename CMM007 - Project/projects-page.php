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
    <div class="container">  <!-- Error message panel -->
    <?php
    if (isset($_GET['error'])) {
        echo "<div id=error_box>";
        switch ($_GET['error']) {
            case 1:
                echo "Error: Image greater than 750KB!";
                break;
            case 2:
                echo "Error: Image upload failed.  Please contact System Administrator.";
                break;
            case 3:
                echo "Error: Image file not .jpg or .jpeg.";
                break;
            case 4:
                echo "Error: Could not create new project.  Please contact System Administrator.";
                break;
            default:
                echo "Error: Unknown error.  Please contact System Administrator.";
        }
    }
    echo "</div>";
    ?>
    </div>

    <div class = "container">
        <div id="controls">
            <form name="controls" method="post">
                <input type="text" name="search" placeholder="Search"><br/>
                <!-- Tag selector?-->
                <!-- Deadline selector?-->
                <br/>
                <input id="go" type="submit" value="Search!">
            </form><br/>
            <a href='projects.php' type='button'>View all Projects</a><br/>
        <?php /* Checks for a logged-in, Cause user */
            if(isset($_SESSION['logged-in']) && ($_SESSION['logged-in'] == TRUE)){
                if ($_SESSION['type'] == 0) {
                    echo "<br/><a href='new-project.php' type='button'>Create a New Project</a>";
                }
            }
        ?>
        </div>
        <div id="projectlist">
            <?php
                include_once 'Scripts/connection.php';
                $sql = "SELECT name, tags, summary, deadline, image, projectNo
                        FROM projects
                        WHERE status = 1";
                $result = mysqli_query($dbcon, $sql);
                echo "<table><tr><th></th><th>Project</th><th>Project Summary</th>";
                if (isset($_SESSION['logged-in']) && $_SESSION['type'] == 0) {
                    echo "<th>See More</th>";
                }
                echo "</tr>";

                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)){
                        echo "<tr><td><img src = '{$row['image']}' alt = 'Project image'></td><td>{$row['name']}</td><td><p>{$row['summary']}</p></td>";
                        if (isset($_SESSION['logged-in']) && $_SESSION['logged-in']) {
                            echo "<td><a href='project-details.php?project={$row['projectNo']}' type='button'>More</a></td>";
                        }
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><th colspan='4'>No projects found!</th></tr>";
                }
                echo "</table>";
            ?>
        </div>





    </div>
</body>
</html>