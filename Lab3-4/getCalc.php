<?php

$firstNum = $_GET['firstNum'];
$secondNum = $_GET['secondNum'];
$mode = $_GET['mode'];

switch ($mode){
    case "Adding":
        echo $firstNum + $secondNum;
        break;
    case "Subtracting":
        echo $firstNum - $secondNum;
        break;
    case "Multiplying":
        echo $firstNum * $secondNum;
        break;
    case "Dividing":
        if($secondNum == 0){
            echo "Cannot divide by zero";
        } else {
            echo $firstNum / $secondNum;
        }
        break;
}

?>