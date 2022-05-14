<?php
include 'header.php'
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create new account</title>
</head>
<body>
    <form>
        <div>
            <label for="name">Name</label><br>
            <input type="text" id="name" name="name"><br>
        </div>
        <div>
            <label for="surname">Surname</label><br>
            <input type="text" id="surname" name="surname"><br>
        </div>
        <div>
            <label for="pesel">PESEL</label><br>
            <input type="text" id="pesel" name="pesel"><br>
        </div>
    </form>
</body>
</html>

<?php
include 'footer.php'
?>
