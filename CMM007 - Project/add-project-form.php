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
            if (!$_SESSION['logged-in']) {
                echo "<div id='error'>Error - User must be logged-in to add new projects!</div></div>";
            } else {
                if (isset($_GET['error'])) {
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
        <p>This is your chance to get someone's attention and their help.  Be concise, give details, and be honest about what you need and when you need it.</p>
        </div>
    </div>
    <div class="container">
        <div id="form">
            <form name="newProject" action="Scripts/addNewProject.php" method="post" enctype="multipart/form-data">
                Project name<br/>
                <input name="name" type="text" placeholder="Project Name"><br/><br/>
                Project Summary (visible to all)<br/>
                <textarea title="Project Summary" name="summary" rows="5" cols="60" placeholder="Brief outline of what you need"></textarea><br/><br/>
                Project Description (only visible to logged-in Users)<br/>
                <textarea title ="Project Description" name="description" rows="5" cols="60" placeholder="Additional details of your requirement"></textarea><br/><br/>
                Project Deadline<br/>
                <input title="Project Deadline" name="deadline" type="date"><br/><br/>
                Required Outputs<br/>
                <textarea title="Outputs" name="outputs" rows="5" cols="60" placeholder="Website as .HTML files, etc"></textarea><br/><br/>
                Tags associated with the project<br/>
                <input name="tags" type="text" placeholder="Change to tag picker"><br/><br/>
                Project Image (.jpg or .jpeg only)<br/>
                <input name="image" type="file"><br/><br/>
                <input name="submit" type="submit" value="Submit!">
            </form>
        </div>
    </div>
</body>
</html>
<?php
    }
?>