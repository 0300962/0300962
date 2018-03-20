<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 20/03/2018
 * Time: 13:04
 */
session_start();
$_SESSION['last_page'] = 'projects.php';
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
    <?php include 'projects-page.php';?>
</div>

<div id = "Footer">
    <?php include 'footer.php';?>
</div>


</body>
</html>
