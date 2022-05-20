<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        .container{
            display: flex;
            flex-wrap: wrap;
            gap: 0.5em;
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
        h4{
            margin: 0;
        }
    </style>
</head>
<body>
<div class="container">
<?php

$poke1 = new Fire('Charmander','Fire',30,5,'charmander.png');
$poke2 = new Electric('Pikachu','Electric',30,7,'pikachu.png');
$poke3 = new Water('Magikarp','Water',20,2,'magikarp.png');
$poke4 = new Psychic('Abra','Psychic',50,5,'Abra.png');
$poke5 = new Psychic('Abra','Psychic',50,5,'Abra.png');


$poke1->printCard();
$poke2->printCard();
$poke3->printCard();
$poke4->printCard();

$poke4->attack($poke4);

?>


</div>
</body>
</html>
