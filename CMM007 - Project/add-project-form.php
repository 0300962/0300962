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

?>
<html lang="en">
<head>
    <link rel="stylesheet" href = "CSS/add-project.css" type="text/css">
</head>
<body>
<div class="container">
    <div id="banner">
        <img src="img/projects_banner2.jpg" alt="Create a new project">
    </div>
</div>
<div class = "container">
    <?php //Have to check for login status
        if ((!isset($_SESSION['logged-in'])) || (!$_SESSION['logged-in'])) {
            echo "<div id='error'>Error - User must be logged-in to add new projects!</div></div>";
        } else {
            if ($_SESSION['type'] == 0) { /* Checks for Cause user */
                if (isset($_GET['error'])) { /* Something went wrong during creation */
                    echo "<div id='error'>";
                    switch ($_GET['error']) {
                        case 1:
                            echo "Error: Image exceeds maximum size (750KB).";
                            break;
                        case 2:
                            echo "Error: Unable to add image. Please contact system administrator.";
                            break;
                        case 3:
                            echo "Error: Image file not .jpg or .jpeg.";
                            break;
                        case 4:
                            echo "Error: Could not create new Project. Please contact system administrator.";
                            break;
                        default:
                            echo "Unknown error.  Please contact system administrator.";
                            break;
                    }
                    echo "</div>";
                }
                ?>
                <div id="intro">
                <h3>Add a New Project!</h3>
                <p>This is your chance to get someone's attention and their help.  Be concise, give details, and be honest about what you need and when you need it.
                    Please remember that Labour For Change does not verify User identities; if you suspect misuse of the system please contact the System Administrator.</p>
                </div>
                </div>
                <div class="container">
                    <div id="form">
                        <form name="newProject" action="Scripts/addNewProject.php" method="post" enctype="multipart/form-data">
                            <label for="name">Project name</label>
                            <input name="name" type="text" placeholder="Project Name (30 characters)" maxlength="30" required><br/><br/>
                            <label for="summary">Project Summary (visible to all)</label>
                            <textarea title="Project Summary" name="summary" rows="5" cols="60" maxlength="500" placeholder="Brief outline of what you need (max 500 characters)" required></textarea><br/><br/>
                            <label for="description">Project Description (only visible to logged-in Users)</label>
                            <textarea title ="Project Description" name="description" rows="5" cols="60" maxlength="500" placeholder="Additional details of your requirement (max 500 characters)" required></textarea><br/><br/>
                            <label for="deadline">Project Deadline</label>
                            <input title="Project Deadline" name="deadline" type="date" required><br/><br/>
                            <label for="outputs">Required Outputs</label>
                            <textarea title="Outputs" name="outputs" rows="5" cols="60" maxlength="500" placeholder="Website as .HTML files, etc (max 500 characters)" required></textarea><br/><br/>
                            <label for="tags">Tags associated with the project</label>
                            <input name="tags" type="text" placeholder="Change to tag picker" maxlength="30" required><br/><br/>
                            <label for="image">Project Image (.jpg or .jpeg only, <750KB)</label>
                            <input name="image" type="file" required><br/><br/>
                            <input name="submit" type="submit" value="Submit!">
                        </form>
                    </div>
                </div>
            </body>
            </html>
            <?php
            } else {  /* Unauthorised access from a Helper user */
                echo "<div id='error'>Error - Only Cause users may create new projects!<br/></div></div>";
            }
        }
?>