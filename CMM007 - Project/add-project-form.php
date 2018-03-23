<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 23/03/2018
 * Time: 14:57
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

//Have to check for login status
if (!$_SESSION['logged-in']) {
    echo "Error - User must be logged-in to add new projects!";
} else {
    /*Need to add IF to check for error status*/


    ?>
    <html lang="en">
    <head>
        <link rel="stylesheet" href = "CSS/add-project.css" type="text/css">
    </head>
    <body>
        <div class = "container">
            <div id="form">
                <form name="newProject" action="Scripts/addNewProject.php" method="post" enctype="multipart/form-data">
                    Project name =
                    <input name="name" type="text" placeholder="Project Name"><br/><br/>
                    Project Summary (visible to all) =
                    <textarea title="Project Summary" name="summary" rows="5" cols="50" placeholder="Brief outline of what you need"></textarea><br/><br/>
                    Project Description (only visible to logged-in Users) =
                    <textarea title ="Project Description" name="description" rows="5" cols="50" placeholder="Additional details of your requirement"></textarea><br/><br/>
                    Project Deadline =
                    <input title="Project Deadline" name="deadline" type="date"><br/><br/>
                    Required Outputs =
                    <textarea title="Outputs" name="outputs" rows="5" cols="50" placeholder="Website as .HTML files, etc"></textarea><br/><br/>
                    Tags associated with the project =
                    <input name="tags" type="text" placeholder="Change to tag picker"><br/><br/>
                    Project Image (.jpg or .jpeg only) =
                    <input name="image" type="file"><br/><br/>
                </form>
            </div>
        </div>
    </body>
    </html>
    <?php
}
?>