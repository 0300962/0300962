<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 14/02/2018
 * Time: 15:04
 */

session_start();
$result = $_POST["answer1"];

if ($result == "horse") {
    $_SESSION["correct"] = 1;
} else {
    $_SESSION["correct"] = 0;
}


header("Location:test.php");

?>