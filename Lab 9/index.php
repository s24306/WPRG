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
        /*.nav {*/
        /*    list-style-type: none;*/
        /*    text-align: center;*/
        /*    margin: 0;*/
        /*    padding: 0;*/
        /*}*/

        /*.nav li {*/
        /*    display: inline-block;*/
        /*    padding: 20px;*/
        /*}*/
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
            width: 200px;
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
<!--<div class="container">-->
<?php
require "functions.php";
require "Pokemon.php";
require "Electric.php";
require "Fire.php";
require "Water.php";
require "Psychic.php";
require "Fight.php";

echo "<ul class=\"nav\">";
    $poke1 = new Fire('Charmander','Fire',30,5,'charmander.png');
    $poke2 = new Electric('Pikachu','Electric',30,7,'pikachu.png');
    $poke3 = new Water('Magikarp','Water',20,2,'magikarp.png');
    $poke4 = new Psychic('Abra','Psychic',50,5,'abra.png');
    echo "<li><p>".$poke1->printCard()."</p></li>
    <li><p>".$poke2->printCard()."</p></li>
    <li><p>".$poke3->printCard()."</p></li>
    <li><p>".$poke4->printCard()."</p></li>
</ul>";
$fight = new Fight($poke2, $poke4);
$fight->go();
?>


<!--</div>-->
</body>
</html>
