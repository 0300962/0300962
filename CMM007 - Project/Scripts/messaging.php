<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 06-Apr-18
 * Time: 3:36 PM
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!$_SESSION['logged-in']) {  /* Redirects non-logged-in users to homepage */
    echo "<!DOCTYPE html><html lang='en'><head></head><body><script type='text/javascript'> location = '../index.php'</script></html>";
}

include_once 'connection.php';

$message = filter_var($_POST['message'],FILTER_SANITIZE_STRING);
$projectNo = filter_var($_GET['project'], FILTER_SANITIZE_NUMBER_INT);
$date = getdate();
$msgDate = $date['year']."-".$date['mon']."-".$date['mday'];

$sql = "SELECT userNo, helperNo
            FROM Projects
            WHERE projectNo = {$projectNo}";
$result = mysqli_query($dbcon, $sql);
$row = mysqli_fetch_array($result);
$source = $_SESSION['userno'];

/* Checks where to send the message */
if ($_SESSION['userno'] == $row['userNo']) {
    /* User is project owner*/
    $target = $row['helperNo'];
} elseif ($_SESSION['userno'] == $row['helperNo']) {
    /* User is the project helper */
    $target = $row['userNo'];
} else {
    /* Error condition */
    echo "<script type='text/javascript'> location = '../messages.php?project={$projectNo}'</script>";
}

/* Sends the message to the recipient */
$sql = "INSERT INTO messages (projectNo, fromUserNo, toUserNo, msgDate, message)
            VALUES ('{$projectNo}', '{$source}', '{$target}', '{$msgDate}', '{$message}')";
$result = mysqli_query($dbcon, $sql);

echo "<script type='text/javascript'> location = '../messages.php?project={$projectNo}'</script>";