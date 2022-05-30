<?php
session_start();
$db = new SQLite3('LocalDB.db');
$imgDir = "./imgGallery";

$dir = scandir($imgDir);
array_shift($dir);
array_shift($dir);

$results = $db->query('SELECT COUNT(*) FROM cars');
$row = $results->fetchArray();
$count = $row[0];
$numOfPages = ceil($count/5);

if(isset($_GET['pageNum']) && $_GET['pageNum'] <= $numOfPages && $_GET['pageNum'] >= 1){
    $pageNum = (int) $_GET['pageNum'];
} else if($_GET['pageNum'] > $numOfPages || $_GET['pageNum'] < 1 || !isset($_GET['pageNum'])) {
    $pageNum = 1;
}
$_SESSION['pageNum'] = $_GET['pageNum'];
$photoIndexArr = [];
$photosRange = $pageNum * 5;
if($photosRange > $count){
    $photosRange -= $count;
    for($i = 0; $i < 5-$photosRange; $i++){
        array_push($photoIndexArr, --$count);
    }
} else {
    for ($i = 0; $i < 5; $i++){
        if($photosRange == 0){
            break;
        } else {
            array_push($photoIndexArr, --$photosRange);
        }
    }
}
$results = $db->query('SELECT id, make, model
                             FROM cars 
                             WHERE id 
                             BETWEEN '.($photoIndexArr[count($photoIndexArr)-1]+1).' AND '.($photoIndexArr[0]+1).'
                             ORDER BY id');
$cars = array();
while ($res = $results->fetchArray(1)){
    array_push($cars, $res);
}
?>

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
    <title>Samochody używane</title>
</head>
<body>
<?php echo "<a href='Login.php'>Login</a>"?>
<table class="center">
    <?php
    foreach ($cars as $car){?>
        <tr>
            <td><?php echo $car["id"];?></td>
            <td><?php echo $car["make"];?></td>
            <td><?php echo $car["model"];?></td>
            <td><?php echo "<a href='car.php?imgid=".$car["id"]."'>Read more</a>"?></td>
        </tr>
        <?php
    }?>
</table>
    <?php echo "<br>";
    if($pageNum > 1){
        echo "<a href='index.php?pageNum=".($pageNum-1)."'>Poprzednia strona</a> ";
    }
    if ($pageNum < $numOfPages ){
        echo "<a href='index.php?pageNum=".($pageNum+1)."'>Następna strona</a> ";
    }
    ?>
</body>
</html>
