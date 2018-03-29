<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 29-Mar-18
 * Time: 10:14 AM
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


?>
<html lang="en">
    <head>
        <link rel="stylesheet" href = "CSS/profile-style.css" type="text/css">
    </head>
    <body>

    <div class = "container">
        <?php //Have to check for login status
           if(isset($_SESSION['logged-in']) && ($_SESSION['logged-in'] == TRUE)){
                if(isset($_GET['project'])) { /* Gets project details */
                    $number = $_GET['project'];
                } else {
                    $number = 1;
                }
                include_once 'Scripts/connection.php';
                $sql = "SELECT P.name as pname, P.userNo as puserno, P.tags as ptags, P.summary as psummary, P.description as pdescription,
                              P.deadline as pdeadline, P.image as pimage, P.deadline as pdeadline, P.outputs as poutputs, P.helperNo as phelperNo, U.name as uname
                        FROM Projects P, Users U 
                        WHERE P.projectNo = {$number}
                        AND P.userNo = U.userNo";
                $result = mysqli_query($dbcon, $sql);
                $row = mysqli_fetch_array($result);
                ?>

                <div class = "profile-flex-c">
                    <div id = "lh-column">
                        <div id = "profile-pic">
                            <img src="<?php echo $row['pimage']; ?>" alt = "Project picture" width="200px" height="200px" >
                        </div>
                        <div id = "details">
                            Project Name: <?php echo $row['pname'] ?><br/>
                            Project Creator: <?php echo $row['uname']?><br/>

                            Category Tags: <?php echo $row['ptags']?><br/>
                            Current Helper: <?php
                                if ($row['phelperNo'] != NULL) {
                                    echo $row['phelperNo'];
                                } else {
                                    echo "No helpers yet!";
                                }

                                if ($_SESSION['type'] == 1) {   /* Calls script to add Helper to project */
                                    echo "<form name='accept' method='post' action='Scripts/accept.php'>
                                            <input id='projNo' type='hidden' value='{$number}'>
                                            <input id='accept' type='submit' value='Accept this Project'>
                                            </form>";
                                }
                                ?><br/>

                        </div>
                    </div>

                    <div id = "details-column">
                        <h2><?php echo $row['pname']?></h2>
                        <p><?php echo $row['psummary']?></p>
                        <p><?php echo $row['pdescription']?></p>
                        <h2>Required Outputs</h2>
                        <p><?php echo $row['poutputs']?></p>
                        <h3>Deadline - <?php echo $row['pdeadline']?></h3>
                    </div>

                </div>
                <?php
            } else {
                echo "<div id='error_box'>Error - User must be logged-in to view project details!<br/>";
                echo "<a href='projects.php' type='button'>Back</a><br/></div></div>";
            }
        ?>