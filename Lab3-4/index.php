<?php

$firstNum = $_POST['firstNum'];
$secondNum = $_POST['secondNum'];
$mode = $_POST['mode'];

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
        echo $firstNum / $secondNum;
        break;
}

?>