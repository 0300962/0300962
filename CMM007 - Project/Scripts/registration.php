<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 19-Mar-18
 * Time: 5:57 PM
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/* Returns to the register page with error code*/
function redirect($err_no) {
   echo "<!DOCTYPE html><html lang='en'><head></head><body><script type='text/javascript'> location = '../register.php?error={$err_no}'</script></html>";
}
/* Undoes the creation of login-details*/
function undoReg(){
    include_once 'connection.php';
    $sql = "DELETE * FROM LoginDetails
                        WHERE login = {$un}";
    $result = mysqli_query($dbcon, $sql);
}

include_once 'connection.php';

/* Sanitizes user inputs before processing */
$un = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$pw = filter_var($_POST['password1'], FILTER_SANITIZE_STRING);
$pw2 = filter_var($_POST['password2'], FILTER_SANITIZE_STRING);
$description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);

if ($pw != $pw2) { /* Checks consistency of password entry */
    echo "Passwords do not match!";
    redirect('1');
} else if(!filter_var($un, FILTER_VALIDATE_EMAIL)){  /* Checks for malicious email address */
    echo "Invalid email address!";
    redirect('2');
} else {
    /* Hashes sanitized password and connects to the DB*/
    $hashedPW = password_hash($pw, PASSWORD_DEFAULT);
    include_once 'connection.php';
    /*Checks if email address already in the database*/
    $sql = "SELECT login, userNo
                FROM LoginDetails
                WHERE login = {$un}";
    $result = mysqli_query($dbcon, $sql);

    if ($result) {
        echo "Username already registered!";
        redirect(3);
    } else { /* New email address, registration proceeds */
        $imgext = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
        if ($imgext != 'jpg' && $imgext != 'jpeg') {  /* Checks file format */
            echo "Image file not JPG or JPEG";
            redirect(7);
        } else {
            /* Creates login details in DB */
            $sql = "INSERT INTO LoginDetails (login, hashedPassword)
                VALUES ('{$un}','{$hashedPW}')";
            $result = mysqli_query($dbcon, $sql);
            if ($result) {
                /*Retrieves user number for just-added account*/
                $userNo = $dbcon->insert_id;
                /* Sanitizes remaining inputs */
                $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
                $type = filter_var($_POST['type'], FILTER_SANITIZE_NUMBER_INT);

                /* Sets up save location and generates new name for image based on the upload time */
                $imgfolder = "../projectImages/";
                $savedimg = $imgfolder.time().($_FILES['image']['name']);
                /* Checks image size */
                if ($_FILES["image"]["size"] > 750000) {
                    echo "Outsized image (>750Kb)";
                    undoReg();
                    redirect(8);
                } else { /* Moves image from temp directory */
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $savedimg)) {
                        echo "Image uploaded ok";
                    } else {
                        echo "Image upload fail- duplicate name?";  /* Should be almost impossible due to renaming */
                        undoReg();
                        redirect(9);
                    }
                }

                /*Checks whether the UserType flag has been tampered with*/
                if (!in_array($type, range(0, 1, 1))) {
                    echo "Invalid user type";
                    undoReg();
                    redirect(5);
                } else {
                    /* Trims the directory details from image path for future display */
                    $savedimg = ltrim($savedimg, './');
                    /*Adds new user details to the system*/
                    $sql = "INSERT INTO Users (userNo, name, image, description, reputation, userType)
                            VALUES ('{$userNo}', '{$name}', '{$savedimg}', '{$description}', '5', {$type})";
                    $result = mysqli_query($dbcon, $sql);

                    if ($result) { /* Sets session variables if registration was ok */
                        $_SESSION['logged-in'] = true;
                        $_SESSION['name'] = $name;
                        $_SESSION['userno'] = $userNo;
                        $_SESSION['rep'] = 5;  /* Don't bother to retrieve from DB as will still be default value */
                        $_SESSION['type'] = $type;
                        $_SESSION['image'] = $savedimg;
                        $_SESSION['desc'] = $description;
                        echo "<!DOCTYPE html><html lang='en'><head></head><body><script type='text/javascript'> location = '../index.php'</script></html>";
                    } else { /* Some problem with adding details to DB */
                        //echo $sql;
                        undoReg(); /* Removes previously-entered login details */
                        redirect(6);
                    }
                }
            } else {  /* Problem adding login details to first query */
                echo "Couldn't create login details";
                //echo "{$sql}";
                redirect(4);
            }
            mysqli_close($dbcon);
        }
    }
}
?>