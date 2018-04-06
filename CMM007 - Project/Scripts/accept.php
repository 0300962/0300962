<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 29-Mar-18
 * Time: 1:06 PM
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once 'connection.php';

if(isset($_REQUEST['accept'])) {
    /* Helper has accepted a project */
    $projectNo = filter_var($_POST['projNo'], FILTER_SANITIZE_NUMBER_INT);

    $sql = "UPDATE projects
            SET helperNo =  {$_SESSION['userno']}
            WHERE projectNo = {$projectNo};";
    $result = mysqli_query($dbcon, $sql);

    echo "<script type='text/javascript'> location = '../project-details.php?project={$projectNo}'</script>";

} elseif(isset($_REQUEST['withdraw'])) {
    /* Helper has withdrawn from a project */
    $projectNo = filter_var($_POST['projNo'], FILTER_SANITIZE_NUMBER_INT);

    $sql = "UPDATE projects
            SET helperNo =  NULL
            WHERE projectNo = {$projectNo};";
    $result = mysqli_query($dbcon, $sql);

    echo "<script type='text/javascript'> location = '../project-details.php?project={$projectNo}'</script>";

} elseif(isset($_REQUEST['close'])) {
    /* Project creator has marked a project as completed */
    $projectNo = filter_var($_POST['projNo'], FILTER_SANITIZE_NUMBER_INT);
    $sql = "UPDATE projects
            SET status =  0
            WHERE projectNo = {$projectNo};";
    $result = mysqli_query($dbcon, $sql);

    echo "<script type='text/javascript'> location = '../project-details.php?project={$projectNo}'</script>";
    echo "Closed project";

} elseif(isset($_REQUEST['cancel'])) {
    /* Project creator has deleted a project */
    $projectNo = filter_var($_POST['projNo'], FILTER_SANITIZE_NUMBER_INT);

    $sql = "DELETE FROM messages
            WHERE projectNo = {$projectNo};";
    $result = mysqli_query($dbcon, $sql);
    echo "Project messages deleted.";

    $sql = "DELETE FROM projects
            WHERE projectNo = {$projectNo};";
    $result = mysqli_query($dbcon, $sql);
    echo "Project deleted.";

    echo "<script type='text/javascript'> location = '../projects.php'</script>";
}


?>