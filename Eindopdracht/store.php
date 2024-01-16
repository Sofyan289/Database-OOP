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
    <script src="script.js"></script>
    <header class="header-divider">
        <h1>Carrental-<span>24/7</span></h1>
        <div class="menu-toggle" onclick="toggleMenu()">&#9776;</div>
    </header>
    <div class="sidebar" id="sidebar">
        <div class="close-btn" onclick="closeMenu()"><span>Close</span></div>
        <a href="homepage.php" class="nav-link">Home</a>
        <a href="store.php" class="nav-link">Cars</a>
        <a href="about-us.php" class="nav-link">About-us</a>
        <a href="login.php" class="nav-link">Sign-in</a>
        <?php echo '<a href="logout.php" class="nav-link">Log-out</a>'; ?> 
    </div>
    <div id="body-elements">
        <div id="auto">
            <?php

            $autos = $db->selectAuto();
            if ($autos) {
                foreach ($autos as $auto) {
                    echo "<div id='autos'>";
                    echo "<div id='titel'><h2>{$auto[1]}</h2></div>";
                    echo "<img src='$auto[6]'>";
                    echo "<div id='auto-info'>Merk: {$auto[2]}</div>";
                    echo "<div id='auto-info'>Model: {$auto[3]}</div>";
                    echo "<div id='auto-info'>Bouwjaar: {$auto[4]}</div>";
                    echo "<div id='auto-info'><div class='background'></div><button id='reserveer-knop'><a href='login.php?'><h3>Reserveer</h3></a></button></div>";
                    echo "</div>";
                }
            }
            ?>
        </div>
    </div>

</body>

</html>