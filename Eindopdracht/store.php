<?php
include 'db.php';
$db = new Database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
        }

        .header {
            background-color: #4caf50;
            padding: 20px;
            text-align: center;
            color: white;
            font-size: 35px;
        }
        img {
    width: 300px;
    height: 150px;
}

#autos {
    display: flex;
    flex-direction: row;
    width: 300px;
    height: auto;
    margin: 30px;
    flex-wrap: wrap;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    background-color: #0B3954;
  }

#auto {
    display: flex;
    flex-direction: row;
    width: 100%;
    flex-wrap: wrap;
    align-items: flex-end;
    background-color: #0B3954;
    height: 50%;
}

#filter-bar {
    display: flex;
    width: 20%;
    background-color: #0d1226;
    border-top: 2px solid black;
    flex-wrap: wrap;
}


#body-elements {
    width: 100%;
    display: flex;
    flex-direction: row;
    height: auto;
    color: blanchedalmond;
}

#reserveer-knop {
    background-color: #0B3954;
    border: none;
    width: 100%;
    height: 100%;
    transition: .5s;
}

#reserveer-knop:hover {
    background-color: midnightblue;
}

a {
    color: #C81D25;
}

#auto-info {
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    border: 2px solid black;
    text-align: center;
    width: 48.67%;
    height: 36px;
    align-items: center;
    justify-content: center;
}

#titel {
    display: flex;
    height: 50px;
}

.filter-individu {
    width: 60%;
    border: 3px solid  black;
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    height: 300px;
    margin: 20%;
}

.titel-filter {
    border-bottom: 2px solid black;
}

.sorteer-knoppen {
    display: flex;
    margin: 3px;
}

label {
    margin-left: 2px;
}

::-webkit-scrollbar {
    display: none;
}
    </style>
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