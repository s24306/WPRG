<!doctype html>
<html lang="en">
<head>
    <style>
        .center {
            margin-left: auto;
            margin-right: auto;
            width:100px;
        }
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fura</title>
</head>
<body>

<?php
include "Car.php";
session_start();

if(!isset($_SESSION['cars'])){
    header("Location: index.php");
}

$car = $_SESSION['cars'][$_GET["imgid"] - 1];

?>
<div>
    <div id="obraz" style="text-align:center">
        <?php
        echo "<img src=".$car->getPhotoLink()." alt=".$car->getId()." />";
        ?>
    </div>
    <table class="center">
        <tr>
            <th>Marka</th>
            <td><?php echo $car->getMake();?></td>
        </tr>
        <tr>
            <th>Model</th>
            <td><?php echo $car->getModel();?></td>
        </tr>
        <tr>
            <th>Rok produkcji</th>
            <td><?php echo $car->getYear(); ?></td>
        </tr>
        <tr>
            <th>Cena</th>
            <td><?php echo $car->getPrice(); ?>PLN</td>
        </tr>
        <tr>
            <th>Pojemność silnika</th>
            <td><?php echo $car->getCapacity(); ?></td>
        </tr>
    </table>
    <div id="nawigacja" style="text-align:center">
        <?php
        echo "<button onclick=location.href='index.php'>Powrót do galerii</button> ";
        ?>
    </div>
</div>
</body>
</html>