<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CMS</title>
</head>
<body>
<form action="MyFirstSiteCMS.php" method="get">
    <p>Co chcesz zmienić wariacie?</p>
    <div>
        <h3>Main site</h3>
        <label for="MainSiteName">Main site name</label><br>
        <input type="text" name="MainSiteName" id="MainSiteName"><br>
        <label for="MainSiteContent">Main site content</label><br>
        <textarea name="MainSiteContent" id="MainSiteContent" rows="10" cols="40"></textarea>
    </div>

    <div>
        <h3>Second site</h3>
        <label for="SecondSiteName">Second site name</label><br>
        <input type="text" name="SecondSiteName" id="SSecondSiteName"><br>
        <label for="SecondSiteContent">Second site content</label><br>
        <textarea name="SecondSiteContent" id="SecondSiteContent" rows="10" cols="40"></textarea>
    </div>

    <div>
        <h3>Third site</h3>
        <label for="ThirdSiteName">Third site name</label><br>
        <input type="text" name="ThirdSiteName" id="ThirdSiteName"><br>
        <label for="ThirdSiteContent">Third site content</label><br>
        <textarea name="ThirdSiteContent" id="ThirdSiteContent" rows="10" cols="40"></textarea>
    </div><br>

    <div>
        <button type="submit">Update sites</button>
    </div>
</form>
</body>
</html>