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
        <script>
            function changemsg(event, threadNo) {
                var msgtab, msgpane;

                //Clears all open tabs
                msgpane = document.getElementsByClassName("threadContainer");
                for (var i=0; i < msgpane.length; i++) {
                    msgpane[i].style.display = "none";
                }
                //Sets message thread to be visible
                document.getElementById(threadNo).style.display = "block";
            }
        </script>
    </head>

    <body>

    <div class = "container">
    <?php //Have to check for login status
    if(isset($_SESSION['logged-in']) && ($_SESSION['logged-in'] == TRUE)){
        include_once 'Scripts/connection.php';

        $sql = "SELECT DISTINCT projectNo FROM Messages 
                WHERE fromUserNo = {$_SESSION['userno']}
                OR toUserNo = {$_SESSION['userno']}";
        $result = mysqli_query($dbcon, $sql);

        $projects = array();
        while ($row = mysqli_fetch_array($result)) { /* Creates navigation button for each project thread */
            echo "<div class='threadTitle'><div id='button{$row['projectNo']}' class='msgtab' onclick='changemsg(event, {$row['projectNo']})'>{$row['projectNo']}</div></div>";
            $projects[] = $row['projectNo'];
        }
        echo "</div><div class = 'container'>";

        foreach ($projects as $no => $pno) {
            $sql = "SELECT * FROM Messages 
                WHERE projectNo = {$pno}
                AND (fromUserNo = {$_SESSION['userno']}
                OR toUserNo = {$_SESSION['userno']} )
                ORDER BY projectNo ASC, msgDate DESC";
            $result = mysqli_query($dbcon, $sql);

            $tabNo = 0;
            echo "<div class='threadContainer' id='{$pno}'>";
            echo "<div class='messages'>";
            while ($row = mysqli_fetch_array($result)) {
                $tabNo = $row['projectNo'];
                if ($row['fromUserNo'] == $_SESSION['userno']) { /* Used for threaded display */
                    echo "<div class='rhs'>";
                    echo "<h4>Sent {$row['msgDate']}</h4>";
                } else {
                    echo "<div class='lhs'>";
                    echo "<h4>Received {$row['msgDate']}</h4>";
                }
                echo "<p>{$row['message']}</p>";
                echo "</div>";
            }
            echo "</div></div>";
        }

        if(isset($_GET['project'])) {
            /* Clicks the tab for the selected message thread */
            echo "<script>
                        document.getElementById('button{$_GET['project']}').click();
                 </script>";
        } else {
            /* Clicks the first tab in the list by default*/
            echo "<script>
                        document.getElementById('button{$projects[0]}').click();
                 </script>";
        }

    }  else {
        echo "<div id='error_box'>Error - User must be logged-in to use messaging!<br/>";
        echo "<a href='register.php' type='button'>Back</a><br/></div></div>";
    }
    ?>