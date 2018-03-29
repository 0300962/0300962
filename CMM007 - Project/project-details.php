<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 29-Mar-18
 * Time: 10:12 AM
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$_SESSION['last_page'] = 'project-details.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
<div id = "Header">
    <?php include 'header.php';?>
</div>

<div id="Body">
    <?php include 'project-details-page.php';?>
</div>

<div id = "Footer">
    <?php include 'footer.php';?>
</div>


</body>
</html>
