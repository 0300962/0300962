<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 18-Mar-18
 * Time: 11:01 PM
 */
session_start();
$_SESSION['last_page'] = 'about.php';
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
    <?php include 'about-page.php';?>
</div>

<div id = "Footer">
    <?php include 'footer.php';?>
</div>


</body>
</html>