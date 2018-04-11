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
    /* Adds Helper to the project */
    $sql = "UPDATE Projects
            SET helperNo =  {$_SESSION['userno']}
            WHERE projectNo = {$projectNo};";
    $result = mysqli_query($dbcon, $sql);

    /* Gets details of the project */
    $sql = "SELECT userNo
            FROM Projects
            WHERE projectNo = {$projectNo}";
    $result = mysqli_query($dbcon, $sql);
    $row = mysqli_fetch_array($result);
    $projectOwner = $row['userNo'];
    $date = getdate();
    $msgDate = $date['year']."-".$date['mon']."-".$date['mday'];
    /* Sends a message to the project owner that the helper has accepted the project */
    $sql = "INSERT INTO messages (projectNo, fromUserNo, toUserNo, msgDate, message)
            VALUES ('{$projectNo}', '{$_SESSION['userno']}', '{$projectOwner}', '{$msgDate}', 'User has accepted your project')";
    $result = mysqli_query($dbcon, $sql);

    echo "<script type='text/javascript'> location = '../project-details.php?project={$projectNo}'</script>";

} elseif(isset($_REQUEST['withdraw'])) {
    /* Helper has withdrawn from a project */
    $projectNo = filter_var($_POST['projNo'], FILTER_SANITIZE_NUMBER_INT);

    $sql = "UPDATE projects
            SET helperNo =  NULL
            WHERE projectNo = {$projectNo};";
    $result = mysqli_query($dbcon, $sql);

    /* Gets details of the project */
    $sql = "SELECT userNo
            FROM Projects
            WHERE projectNo = {$projectNo}";
    $result = mysqli_query($dbcon, $sql);
    $row = mysqli_fetch_array($result);
    $projectOwner = $row['userNo'];
    $date = getdate();
    $msgDate = $date['year']."-".$date['mon']."-".$date['mday'];
    /* Sends a message to the project owner that the helper has left the project */
    $sql = "INSERT INTO messages (projectNo, fromUserNo, toUserNo, msgDate, message)
            VALUES ('{$projectNo}', '{$_SESSION['userno']}', '{$projectOwner}', '{$msgDate}', 'User has withdrawn from your project')";
    $result = mysqli_query($dbcon, $sql);

    echo "<script type='text/javascript'> location = '../project-details.php?project={$projectNo}'</script>";

} elseif(isset($_REQUEST['close'])) {
    /* Project creator has marked a project as completed */
    $projectNo = filter_var($_POST['projNo'], FILTER_SANITIZE_NUMBER_INT);
    $sql = "UPDATE projects
            SET status =  0
            WHERE projectNo = {$projectNo};";
    $result = mysqli_query($dbcon, $sql);

    /* Gets details of the project */
    $sql = "SELECT helperNo
            FROM Projects
            WHERE projectNo = {$projectNo}";
    $result = mysqli_query($dbcon, $sql);
    $row = mysqli_fetch_array($result);
    $helper = $row['helperNo'];
    $date = getdate();
    $msgDate = $date['year']."-".$date['mon']."-".$date['mday'];
    /* Sends a message to the project owner that the owner has closed the project */
    $sql = "INSERT INTO messages (projectNo, fromUserNo, toUserNo, msgDate, message)
            VALUES ('{$projectNo}', '{$_SESSION['userno']}', '{$helper}', '{$msgDate}', 'Owner has marked this project as completed')";
    $result = mysqli_query($dbcon, $sql);

    echo "<script type='text/javascript'> location = '../project-details.php?project={$projectNo}'</script>";
    echo "Closed project";

} elseif(isset($_REQUEST['cancel'])) {
    /* Project creator has deleted a project */
    $projectNo = filter_var($_POST['projNo'], FILTER_SANITIZE_NUMBER_INT);
    /* Deletes message history from database */
    $sql = "DELETE FROM messages
            WHERE projectNo = {$projectNo};";
    $result = mysqli_query($dbcon, $sql);
    echo "Project messages deleted.";
    /* Deletes project details from database */
    $sql = "DELETE FROM projects
            WHERE projectNo = {$projectNo};";
    $result = mysqli_query($dbcon, $sql);
    echo "Project deleted.";

    echo "<script type='text/javascript'> location = '../projects.php'</script>";
}


?>