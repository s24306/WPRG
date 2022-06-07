<?php
session_start();
include 'dbConn.php';

$points = 0;

foreach($_SESSION['questions'] as $question){
    $sql = "SELECT answer FROM answers
            WHERE question_id=".$question['question_id']."
            AND right_answer=1";

    $right_answer = $db->query($sql)->fetchArray(1)['answer'];
    
    if($_POST[$question['question_id']] == $right_answer){
        $points++;
    }
}

$sql = "INSERT INTO results (surname, points_got)
        VALUES ('".$_POST['surname']."', ".$points.")";

$db->exec($sql);

echo "You got ".$points." points</br>";

echo "<a href='index.php'>Go back</a>";
