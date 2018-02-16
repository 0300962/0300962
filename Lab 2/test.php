<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz Page</title>
</head>
<body>
<section>
    <h2>Welcome to the Quiz</h2>
    <p>This quiz is meant to use PHP to determine if you were correct.</p>
</section>
<main>
    <h2>Question 1</h2>
    <form action="checker.php" method="post">
        <input type="text" name="answer1" placeholder="Type 'horse'">
        <input type="submit" value="Check">
    </form>


<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 09/02/2018
 * Time: 15:44
 */

if ($_SESSION["correct"] == 1) {
    echo "Correct!";
} else {
    echo "Incorrect or no answer";
}
echo $correct;
?>
</main>

</body>
</html>