<?php
session_start();
include 'dbConn.php';

$sql = "SELECT * FROM questions
    ORDER BY random() 
    LIMIT 10";

$questionNum = 1;
$_SESSION['questions'] = [];
$questions = $db->query($sql);

echo "<form method='post' action='results.php' name='form1'>";
echo "<label for='surname'>Surname:</label><br>
      <input type='text' id='surname' name='surname'></br></br>";

while ($question = $questions->fetchArray(1)){
    array_push($_SESSION['questions'], $question);
    echo $questionNum.". ".$question['question']."</br>";
    $sql = "SELECT * FROM answers
        WHERE question_id=".$question['question_id']."";

    $answers = $db->query($sql);

    while ($answer = $answers->fetchArray(1)){
        echo "<input type='radio' id='".$answer['answer_id']."' name='".$answer['question_id']."' value='".$answer['answer']."'>
          <label for='".$answer['answer_id']."'>".highlight_string($answer['answer'], true)."</label><br>";
    }
    $questionNum++;
}
echo "<input type='submit' value='Submit'>";
echo "</form>";

include 'dbDisconnect.php'
?>