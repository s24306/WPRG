<?php
include 'functions.php';

$imgDir = "./imgGallery";

$dir = scandir($imgDir);
array_shift($dir);
array_shift($dir);
usort($dir, cmp());

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Najlepsze fury by Przemo</title>
</head>
<body>
<?php
foreach ($photoIndexArr as $index){
    $imgName = $dir["$index"];
    echo "<a href='Zdjecie.php?imgid=$index'>
                <img src=\"$imgDir/$imgName\" alt=\"$imgName\" style='height: 200px; width: 200px'/>
                </a>";
}
echo "<br>";
if($pageNum > 1){
    echo "<a href='index.php?pageNum=".($pageNum-1)."'>Poprzednia strona</a> ";
}
if ($pageNum < $numOfPages ){
    echo "<a href='index.php?pageNum=".($pageNum+1)."'>Następna strona</a> ";
}
?>
</body>
</html>
