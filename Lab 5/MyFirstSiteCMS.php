<?php
$site1Title = $_GET['MainSiteName'];
$site1Content = $_GET['MainSiteContent'];
$site2Title = $_GET['SecondSiteName'];
$site2Content = $_GET['SecondSiteContent'];
$site3Title = $_GET['ThirdSiteName'];
$site3Content = $_GET['ThirdSiteContent'];

$sitesList = [];
$f = fopen("./CMS.csv", "r");
$csvIndex = 0;
while(! feof($f)) {
    $ar=fgetcsv($f);
    array_push($sitesList, $ar);
}
fclose($f);

if(isset($site1Title) && !empty($site1Title)){
    $sitesList[0][0] = $site1Title;
}
if(isset($site1Content) && !empty($site1Content)){
    $sitesList[0][2] = $site1Content;
}
if(isset($site2Title) && !empty($site2Title)){
    $sitesList[1][0] = $site2Title;
}
if(isset($site2Content) && !empty($site2Content)){
    $sitesList[1][2] = $site2Content;
}
if(isset($site3Title) && !empty($site3Title)){
    $sitesList[2][0] = $site3Title;
}
if(isset($site3Content) && !empty($site3Content)){
    $sitesList[2][2] = $site3Content;
}

$f = fopen("./CMS.csv", "w");
foreach ($sitesList as $sites){
    fputcsv($f, $sites);
}
fclose($f);

function searchSite($array, $val) {
    foreach ($array as $item)
        if (isset($item[1]) && $item[1] == $val)
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
if(isset($_GET['link']) && searchSite($sitesList, $_GET['link'] )){
    foreach($sitesList as $sites){
        if($sites[1] == $_GET['link']){
            echo "<h1>".$sites[0]."</h1><br/>";
            $siteArr = $sites;
        }
    }
} else {
    echo "<h1>".$sitesList[0][0]."</h1><br/>";
}
foreach($sitesList as $sites){
    echo "<a href='MyFirstSiteCMS.php?link=".$sites[1]."'>".$sites[0]."</a><br/>";
}
if(isset($_GET['link']) && searchSite($sitesList, $_GET['link'] )){
    echo "<p>".$siteArr[2]."<p/>";
} else {
    echo "<p>".$sitesList[0][2]."<p/>";
}

?>
</body>
</html>