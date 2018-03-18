<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 16/03/2018
 * Time: 14:38
 */

DEFINE ('DB_USER','0300962');
DEFINE ('DB_PSWD','0300962');
DEFINE ('DB_HOST','localhost');
DEFINE ('DB_NAME','cmm007');

$dbcon = mysqli_connect(DB_HOST,DB_USER,DB_PSWD,DB_NAME);

if (!$dbcon) {
    die('Problem connecting to the Database - Please contact system administrator');
}
?>