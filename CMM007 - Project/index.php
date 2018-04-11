<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 15-Mar-18
 * Time: 1:17 PM
 */
session_start();
$_SESSION['last_page'] = 'index.php';
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
    <?php include 'front-page.php';?>
</div>

<div id = "Footer">
    <?php include 'footer.php';?>
</div>


</body>
</html>
