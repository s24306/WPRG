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
            width: 300px;
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
session_start();
$db = new SQLite3('LocalDB.db');
include "Car.php";

$carId = $_GET["imgid"];
$results = $db->query('SELECT * FROM cars WHERE id='.$carId);
$carInfo = $results->fetchArray();
$car = new Car($carInfo["id"], $carInfo["make"], $carInfo["model"], $carInfo["price"], $carInfo["year"], $carInfo["description"], "./imgGallery/".$carId);

?>
<div>
    <div id="obraz" style="text-align:center">
        <?php
        echo "<img src=".$car->getPhotoLink().".jpg alt=".$car->getId()." />";
        ?>
    </div>
    <table class="center">
        <tr>
            <th>Make</th>
            <td><?php echo $car->getMake();?></td>
        </tr>
        <tr>
            <th>Model</th>
            <td><?php echo $car->getModel();?></td>
        </tr>
        <tr>
            <th>Year produced</th>
            <td><?php echo $car->getYear(); ?></td>
        </tr>
        <tr>
            <th>Price</th>
            <td><?php echo $car->getPrice(); ?>USD</td>
        </tr>
        <tr>
            <th>Description</th>
            <td style="min-width: 300px"><?php echo $car->getDescription(); ?></td>
        </tr>
    </table>
    <div id="nawigacja" style="text-align:center">
        <?php
        echo "<button onclick=location.href='index.php?pageNum=".$_SESSION['pageNum']."'>Back</button> ";
        ?>
    </div>
</div>
</body>
</html>