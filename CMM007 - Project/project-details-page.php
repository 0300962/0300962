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
                              P.deadline as pdeadline, P.image as pimage, P.deadline as pdeadline, P.outputs as poutputs,
                              P.helperNo as phelperNo, P.status as status, U.name as uname
                        FROM Projects P, Users U 
                        WHERE P.projectNo = {$number}
                        AND P.userNo = U.userNo";
                $result = mysqli_query($dbcon, $sql);
                $row = mysqli_fetch_array($result);
                ?>

                <div class = "profile-flex-c">
                    <div id = "lh-column">
                        <div id = "profile-pic">
                            <a href="<?php echo $row['pimage']; ?>">
                                <img src="<?php echo $row['pimage']; ?>" alt = "Project picture" width="200px" height="200px" >
                            </a>
                        </div>
                        <div id = "details">
                            Project Name: <?php echo $row['pname'] ?><br/><br/>
                            Project Status: <?php if ($row['status'] == 1) {echo "Active";} else {echo "Closed";} ?><br/><br/>
                            Project Creator: <?php echo "<a href='profile.php?profile={$row['puserno']}' type='button'>{$row['uname']}</a>"?><br/><br/>
                            Category Tags: <?php echo $row['ptags']?><br/><br/>
                            Current Helper: <?php
                                if ($row['phelperNo'] != NULL) { /* Project already has a helper */
                                    echo "<a href='profile.php?profile={$row['phelperNo']}' type='button'>View</a><br/><br/>";
                                    if (($_SESSION['type'] == 1) && ($row['phelperNo'] == $_SESSION['userno'])) {
                                        /* User is the assigned helper for a project */
                                        echo "<form method='post' action='Scripts/accept.php'>
                                            <input name='projNo' type='hidden' value='{$number}'>
                                            <input name='withdraw' type='submit' value='Withdraw from Project'>
                                            </form><br/>";
                                        /* Allows project helper to contact project owner*/
                                        echo "<a href='messages.php?project={$number}' type='button'>Message Project Creator</a><br/>";
                                    }
                                } else {
                                    echo "No helpers yet! <br/><br/>";
                                    if ($_SESSION['type'] == 1) {   /* Calls script to add Helper to project */
                                        echo "<form method='post' action='Scripts/accept.php'>
                                            <input name='projNo' type='hidden' value='{$number}'>
                                            <input name='accept' type='submit' value='Accept this Project'>
                                            </form>";
                                    }
                                }

                                if (($_SESSION['type'] == 0) && ($row['puserno'] == $_SESSION['userno'])) {
                                    /* User is the project creator */
                                    echo "<form method='post' action='Scripts/accept.php'>
                                            <input name='projNo' type='hidden' value='{$number}'>
                                            <input name='close' type='submit' value='Mark Project as Closed'>
                                            </form><br/>";

                                    echo "<form method='post' action='Scripts/accept.php'>
                                            <input name='projNo' type='hidden' value='{$number}'>
                                            <input name='cancel' type='submit' value='Cancel this Project'>
                                            </form>";
                                }
                                ?><br/>

                        </div>
                    </div>

                    <div id = "details-column">
                        <h2><?php echo $row['pname']?></h2>
                        <p><?php echo $row['psummary']?></p>
                        <p><?php echo $row['pdescription']?></p>
                        <h3>Required Outputs</h3>
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