<?php

$text = $_POST['text'].'<br>';

touch('./fileToWrite.txt');
chmod('./fileToWrite.txt', 777);
$f = file_put_contents('./fileToWrite.txt', $text, FILE_APPEND);

echo file_get_contents('./fileToWrite.txt');
echo "<br>";
echo "<a href='saveFileForm.html'>Go back<a/>";
fclose();