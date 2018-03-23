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


?>

<html lang="en">
<head>
    <link rel="stylesheet" href = "CSS/add-project.css" type="text/css">
</head>
<body>
    <div class = "container">
        <div id="form">
            <form name="newProject" action="#" method="post" enctype="multipart/form-data">
                Project name =
                <input name="name" type="text" placeholder="Project Name"><br/><br/>
                Project Summary (visible to all) =
                <input name="summary" type="text" placeholder="Brief outline of what you need"><br/><br/>
                Project Description (only visible to loged-in Users) =
                <input name="description" type="text" placeholder="Additional details of your reuquirement"><br/><br/>
                Project Deadline =

                Required Outputs =
                <input name="outputs" type="text" placeholder="Logo as .png, Website as .HTML files, etc"><br/><br/>
                Project Image (.jpg or .jpeg only) =
                <input name="image" type="file"><br/><br/>

            </form>


        </div>

    </div>

</body>
</html>
