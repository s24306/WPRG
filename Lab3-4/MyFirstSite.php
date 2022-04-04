<?php
$site1 = ['name' => 'Strona główna', 'link' => 'mainsite', 'content' => 'This is a main site'];
$site2 = ['name' => 'Strona druga', 'link' => 'secondsite', 'content' => 'This is a secondary site'];
$site3 = ['name' => 'Strona trzecia', 'link' => 'thirdsite', 'content' => 'This is a 3 site'];
$sitesList = [$site1, $site2, $site3];

function searchSite($array, $key, $val) {
    foreach ($array as $item)
        if (isset($item[$key]) && $item[$key] == $val)
            return true;
    return false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MyFirstSite :)</title>
</head>
<body>
    <?php
        if(isset($_GET['link']) && searchSite($sitesList, 'link', $_GET['link'] )){
            foreach($sitesList as $sites){
                if($sites['link'] == $_GET['link']){
                    echo "<h1>".$sites['name']."</h1><br/>";
                    $siteArr = array_search($sites['name'], array_column($sitesList, 'name'));
                }
            }
        } else {
            echo "<h1>".$sitesList[0]['name']."</h1><br/>";
        }
        foreach($sitesList as $sites){
            echo "<a href='MyFirstSite.php?link=".$sites['link']."'>".$sites['name']."</a><br/>";
            }
        if(isset($_GET['link']) && searchSite($sitesList, 'link', $_GET['link'] )){
            echo "<p>".$sitesList[$siteArr]['content']."<p/>";
        } else {
            echo "<p>".$sitesList[0]['content']."<p/>";
        }

    ?>
</body>
</html>
