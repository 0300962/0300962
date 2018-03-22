<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 16/03/2018
 * Time: 15:45
 */

function getUser($userNo) {
    include_once 'Scripts/connection.php';

    $sql = "SELECT name, image, reputation, userType
                FROM Users
                WHERE userNo = {$userNo}";
    $result = mysqli_query($dbcon, $sql);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($dbcon);

    $name = $row['name'];
    $image = $row['image'];
    $reputation = $row['reputation'];
    $userType = $row['userType'];
    $_SESSION['userFile'] = array($userNo, $name, $image, $reputation, $userType);

    header("Location: '{$_SESSION['last_page']}'");
}