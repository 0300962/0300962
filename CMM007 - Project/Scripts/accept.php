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
    $projectNo = filter_var($_POST['projNo'], FILTER_SANITIZE_NUMBER_INT);

    $sql = "UPDATE projects
            SET helperNo =  {$_SESSION['userno']}
            WHERE projectNo = {$projectNo};";
    $result = mysqli_query($dbcon, $sql);

    echo "<script type='text/javascript'> location = '../project-details.php?project={$projectNo}'</script>";
} else {
    echo "Failed";
}

?>