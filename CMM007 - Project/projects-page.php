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
            <form name="controls" action = "projects.php" method="post">
                <input type="text" name="search" placeholder="Search" required><br/>
                <!-- Tag selector?-->
                <!-- Deadline selector?-->
                <br/>
                <input name="submit" type="submit" value="Search!">
            </form><br/>
            <a href='projects.php' type='button'>View all Projects</a><br/> <!-- Clears search terms -->
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
                if (isset($_POST['search'])) {  /* User is performing a search */
                    $search = filter_var($_POST['search'], FILTER_SANITIZE_STRING);
                    $sql = "SELECT name, tags, summary, deadline, image, projectNo
                            FROM projects
                            WHERE status = 1
                            AND ((summary LIKE '%{$search}%') 
                              OR (name LIKE '%{$search}%') 
                              OR (tags LIKE '%{$search}%'))";
                } else {  /* Returns all active projects */
                    $sql = "SELECT name, tags, summary, deadline, image, projectNo
                            FROM projects
                            WHERE status = 1";
                }
                $result = mysqli_query($dbcon, $sql);
                echo "<table><tr><th></th><th>Project</th><th>Project Summary</th>";
                if (isset($_SESSION['logged-in']) && $_SESSION['logged-in']) { /* Adds header to view project details for registered users*/
                    echo "<th>See More</th>";
                }
                echo "</tr>";

                if(mysqli_num_rows($result) > 0) {  /* Populates project list */
                    while($row = mysqli_fetch_array($result)){
                        echo "<tr><td><img src = '{$row['image']}' alt = 'Project image'></td><td>{$row['name']}</td><td><p>{$row['summary']}</p></td>";
                        if (isset($_SESSION['logged-in']) && $_SESSION['logged-in']) {  /* Allows logged-in users to view details */
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