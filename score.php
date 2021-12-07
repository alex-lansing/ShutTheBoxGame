#!/usr/local/bin/php
<?php header('Content-Type: text/plain; charset=utf-8');

    $username = $_POST['username'];
    $score = $_POST['score'];
    $file = fopen('scores.txt', 'a');
    fwrite($file, $username . ' '. $score);
    fwrite($file, "\n");
    fclose($file);

?>

<!-- in HTML- must append scores to score page (scores.php) -->

<!-- write response text here
     notice: $_POST['username'] and $_POST['score'] access user and score values
     write username and score to a file -->