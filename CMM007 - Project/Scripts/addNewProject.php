<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 23/03/2018
 * Time: 15:35
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!$_SESSION['logged-in']) {  /* Redirects non-logged-in users to homepage */
    echo "<!DOCTYPE html><html lang='en'><head></head><body><script type='text/javascript'> location = '../index.php'</script></html>";
}

/* Returns to the new-project page with error code*/
function redirect($err_no) {
    echo "<!DOCTYPE html><html lang='en'><head></head><body><script type='text/javascript'> location = '../new-project.php?error={$err_no}'</script></html>";
}

include_once 'connection.php';

    $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $tags = filter_var($_POST['tags'], FILTER_SANITIZE_STRING);
    $summary = filter_var($_POST['summary'],FILTER_SANITIZE_STRING);
    $description = filter_var($_POST['description'],FILTER_SANITIZE_STRING);
    $deadline = filter_var($_POST['deadline'],FILTER_SANITIZE_STRING);
    $outputs = filter_var($_POST['outputs'],FILTER_SANITIZE_STRING);

    /* Checks image size, moves to directory */
    $imgfolder = "projectImages/";
    $savedimg = $imgfolder.basename($_FILES["image"]["name"]);
    if ($_FILES["image"]["size"] > 750000) {
        echo "Outsized image (>750Kb)";
        redirect(1);
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $savedimg)) {
            echo "Image uploaded ok";
        } else {
            echo "Image upload fail- duplicate name?";
            redirect(2); /* Bad filename */
        }
    }
    /* Checks file extension */
    $imgext = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
    if ($imgext != 'jpg' && $imgext != 'jpeg') {
        echo "Image file not JPG or JPEG";
        redirect(3); /* Wrong file type */
    } else {
        $sql = "INSERT INTO Projects (name, tags, description, summary, deadline, outputs, status, image)
                VALUES ('{$name}','{$tags}', '{$description}', '{$summary}', '{$deadline}', '{$outputs}','1','{$savedimg}')";
        $result = mysqli_query($dbcon, $sql);
        if ($result) {
            echo "<!DOCTYPE html><html lang='en'><head></head><body><script type='text/javascript'> location = '../projects.php'</script></html>";
        } else {
            echo $sql;
            redirect(4); /*Failed to add new project*/
        }
    }

?>