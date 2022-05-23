<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon</title>
    <style>
        ul
        {
            display:flex;
            list-style:none;
            margin: auto;
        }
        .container{
            display: inline;
            justify-content: space-between;
        }
        .card {
            height: 300px;
            width: 200px;
            border: 3px solid #777;
            border-radius: 20px;
        }
        .cardImage{
            width: 190px;
            height: 190px;
        }
        .content {
            text-align: center;
        }
        .displayCardInline {
            display: inline-block;
            margin: auto;
            text-align:center
        }
        h4{
            margin: 0;
        }
    </style>
</head>
<body>
<?php
require "functions.php";
require "Pokemon.php";
require "Electric.php";
require "Fire.php";
require "Water.php";
require "Psychic.php";
require "Fight.php";

echo "<ul class=\"nav\">";
    $pokemon1 = new Fire('Charmander','Fire',39,8,'charmander.png');
    $pokemon2 = new Electric('Voltorb','Electric',40,4,'voltorb2.png');
    $pokemon3 = new Water('Squirtle','Water',44,6,'squirtle2.png');
    $pokemon4 = new Psychic('Mewtwo','Psychic',106,4,'mewtwo2.png');
    echo "<li><p>".$pokemon1->printCard()."</p></li>
    <li><p>".$pokemon2->printCard()."</p></li>
    <li><p>".$pokemon3->printCard()."</p></li>
    <li><p>".$pokemon4->printCard()."</p></li>
</ul>";
$fight = new Fight($pokemon2, $pokemon4);
echo"<h1>Fight</h1><br/>";
$fight->go();
?>

</body>
</html>
