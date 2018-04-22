<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 22-Apr-18
 * Time: 11:50 AM
 */
session_start();
$_SESSION['last_page'] = 'contact.php';
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
    <?php include 'contact-page.php';?>
</div>

<div id = "Footer">
    <?php include 'footer.php';?>
</div>


</body>
</html>
