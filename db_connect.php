<?php

try {
    $host = "localhost";
    $dbname = "f0506120_Photogallery";
    $user = "f0506120_f0506120";
    $pass = "f0506120";

    $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

} catch (PDOException $e) {
    echo $e->getMessage();
}
