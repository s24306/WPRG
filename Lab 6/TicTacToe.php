<?php
session_start();
$userPick = $_GET['userPick'];

if (!isset($_SESSION['round'])) {
    $_SESSION['round'] = 0;
}


if (!isset($_SESSION['record'])) { //Jeśli nie ma żadnego krzyżyka/kółka, tablica zostaje zapełniona polami do klikania
    for ($i = 0; $i < 3; $i++) {
        for ($y = 0; $y < 3; $y++) {
            $valueString = "$i" . "$y";
            $record[$i][$y] = " <INPUT type='radio' name='userPick' value='$valueString'>  ";
        }
    }
    $_SESSION['record'] = $record;
}

$correctPicks = ['00', '01', '02', '10', '11', '12', '20', '21', '22', 'reset'];
$PickIsCorrect = in_array($userPick, $correctPicks);

if ($userPick!='reset' && $userPick!=NULL) {
    if ($PickIsCorrect) {
        for ($i = 0; $i < 3; $i++) { //Odpowiednie miejsce w tablicy zastępywane jest wyborem użytkownika
            for ($y = 0; $y < 3; $y++) {
                $valueString = "$i" . "$y";
                if ($userPick == "$valueString") {
                    if ($_SESSION['record'][$i][$y] == 1 || $_SESSION['record'][$i][$y] == -1){
                        echo "Please stop cheating.";

                    }else
                    {
                        $_SESSION['round']++;
                        if ($_SESSION['round'] % 2 == 0) { //Parzyste tury to krzyżyki
                            $roundSymbol = -1;
                        } else {
                            $roundSymbol = 1;
                        }
                        $_SESSION['record'][$i][$y] = $roundSymbol;
                    }
                }
            }
        }
    } else { //jeśli użytkownik wpisze coś losowego w url, strona automatycznie się zresetuje
        $userPick = "reset";
    }
}


if (result($_SESSION['record']) == -1) { //obsługa wygranej i remisu
    echo "Victory of the crosses!";
    echo '<br/>';
    session_destroy();
} else if (result($_SESSION['record']) == 1) {
    echo "Victory of the noughts!";
    echo '<br/>';
    session_destroy();
} else if (result($_SESSION['record']) == 2) {
    echo "It's a draw!";
    echo '<br/>';
    session_destroy();
}

if ($userPick == 'reset') { //resetowanie gry
    session_destroy();
    unset($userPick);
    header("Refresh:0; url=TicTacToe.php");
}


function result($recordArray)
{
    $score = 0;

    for ($i = 0; $i < 3; $i++) {
        $horizontal = $recordArray[$i][0] + $recordArray[$i][1] + $recordArray[$i][2]; //Sprawdzanie potencjalnych wygranych w poziomie
        if ($horizontal == 3) {
            $score = 1;
            break;
        } else if ($horizontal == -3) {
            $score = -1;
            break;
        }

        $vertical = $recordArray[0][$i] + $recordArray[1][$i] + $recordArray[2][$i]; //... w pionie
        if ($vertical == 3) {
            $score = 1;
            break;
        } else if ($vertical == -3) {
            $score = -1;
            break;
        }
    }

    $diagonal1 = $recordArray[0][0] + $recordArray[1][1] + $recordArray[2][2]; //... po skosie typu [\]
    if ($diagonal1 == 3) {
        $score = 1;
    } else if ($diagonal1 == -3) {
        $score = -1;
    }

    $diagonal2 = $recordArray[2][0] + $recordArray[1][1] + $recordArray[0][2]; //... po skosie typu [/]
    if ($diagonal2 == 3) {
        $score = 1;
    } else if ($diagonal2 == -3) {
        $score = -1;
    }

    if ($score != -1 && $score != 1) { //sprawdzanie potencjalnego remisu
        $count = 0;
        for ($i = 0; $i < 3; $i++) {
            if ($recordArray[0][$i] == 0) {
                $count++;
            }
            if ($recordArray[1][$i] == 0) {
                $count++;
            }
            if ($recordArray[2][$i] == 0) {
                $count++;
            };
        }
        if ($count < 1) {
            $score = 2;
        }
    }

    return $score;


}


?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Noughts and Crosses</title>
</head>
<style>
    table, th, td {
        border: 1px solid black;
    }
</style>
<body>
<table>

    <FORM action="TicTacToe.php" method="get">
        <TABLE>

            <?php

            for ($i = 0; $i < 3; $i++) {

                echo '<TR>';

                for ($y = 0; $y < 3; $y++) {
                    echo '<td style="text-align: center; vertical-align: middle; height: 50px; width: 50px;">';
                    if ($_SESSION['record'][$i][$y] == 1) {
                        echo "O";
                    } else if ($_SESSION['record'][$i][$y] == -1) {
                        echo "X";
                    } else {
                        echo $_SESSION['record'][$i][$y];
                    }
                    echo '</td>';
                }
                echo '</TR>';
            }
            ?>


        </TABLE>

        <p>Reset: <INPUT type='radio' id='res' name='userPick' value='reset'></p><br>
        <INPUT type="submit" value="Submit">
    </FORM>

</table>
</body>
</html>


