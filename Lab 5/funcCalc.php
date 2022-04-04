<?php

$firstNum = $_GET['firstNum'];
$secondNum = $_GET['secondNum'];
$mode = $_GET['mode'];

switch($mode){
    case "Adding":
        include("funcCalcAdding.php");
        echo Adding($firstNum, $secondNum);
        break;
    case "Subtracting":
        include("funcCalcSubtracting.php");
        echo Subtracting($firstNum, $secondNum);
        break;
    case "Multiplying":
        include("funcCalcMultiplying.php");
        echo Multiplying($firstNum, $secondNum);
        break;
    case "Dividing":
        include("funcCalcDividing.php");
        echo Dividing($firstNum, $secondNum);
        break;
}