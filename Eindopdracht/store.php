<?php
include 'db.php';
$db = new Database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
<div class="header">
        Car Rental Website
    </div>
    <?php

    $autos = $db->selectAuto();
    if ($autos) {
        foreach ($autos as $auto) {
            echo "<div id='autos'>";
            echo "<div id='titel'><h2>{$auto[1]}</h2></div>";
            echo "<img src='images/{$auto[6]}'>";  
            echo "<div id='auto-info'>Merk: {$auto[2]}</div>";
            echo "<div id='auto-info'>Model: {$auto[3]}</div>";
            echo "<div id='auto-info'>Bouwjaar: {$auto[4]}</div>";
            echo "<div id='auto-info'><div class='background'></div><button id='reserveer-knop'><a href='reservering-maken.php?id=$auto[0]&&kenteken=$auto[5]'><h3>Reserveer</h3></a></button></div>";
            echo "</div>";
        }
    }

    ?>
</body>
</html>