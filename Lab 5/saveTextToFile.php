<?php

$text = $_POST['text'].'<br>';

touch('./fileToWrite.txt');
chmod('./fileToWrite.txt', 777);
$f = file_put_contents('./fileToWrite.txt', $text, FILE_APPEND);
//fwrite($f, $text) or die("write not working");

echo file_get_contents('./fileToWrite.txt');
echo "<br>";
echo "<a href='saveFileForm.html'>Go back<a/>";
fclose();