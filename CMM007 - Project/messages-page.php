<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 06-Apr-18
 * Time: 3:43 PM
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>
    <html lang="en">
    <head>
        <link rel="stylesheet" href = "CSS/message.css" type="text/css">
    </head>
    <body>

    <div class = "container">
    <?php //Have to check for login status
    if(isset($_SESSION['logged-in']) && ($_SESSION['logged-in'] == TRUE)){
        include_once 'Scripts/connection.php';

        $sql = "SELECT * FROM Messages 
                WHERE fromUserNo = {$_SESSION['userno']}
                OR toUserNo = {$_SESSION['userno']}
                ORDER BY msgDate DESC";
        $result = mysqli_query($dbcon, $sql);

        $tabNo = 0;

        while ($row = mysqli_fetch_array($result)) {
            if ($tabNo == 0) { /* First run only - sets headers */
                echo "<div class='threadContainer'><div class='threadTitle'>{$row['projectNo']}</div>";
                echo "<div class='messages'>";
                $tabNo = $row['projectNo'];
            }

            if ($row['projectNo'] != $tabNo) { /* Subsequent runs - paginates*/
                $tabNo = $row['projectNo'];
                echo "</div></div><div class='threadContainer'><div class='threadTitle'>{$row['projectNo']}</div>";
                echo "<div class='messages'>";
            }

            if ($row['fromUserNo'] == $_SESSION['userno']) { /* Used for threaded display */
                echo "<div class='rhs'>";
            } else {
                echo "<div class='lhs'>";
            }
            echo "<h4>Received {$row['msgDate']}</h4>";
            echo "<p>{$row['message']}</p>";
            echo "</div>";
        }
        echo "</div></div>";

        if(isset($_GET['project'])) {

        } else {

        }







    }  else {
        echo "<div id='error_box'>Error - User must be logged-in to use messaging!<br/>";
        echo "<a href='register.php' type='button'>Back</a><br/></div></div>";
    }
    ?>