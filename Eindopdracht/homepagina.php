<?php
include 'db.php';
$db = new Database();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrental-24/7</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <header class="header-divider">
        <h1>Carrental-<span>24/7</span></h1>
        <div class="menu-toggle" onclick="toggleMenu()">&#9776;</div>
    </header>

    <div class="sidebar" id="sidebar">
        <div class="close-btn" onclick="closeMenu()"><span>Close</span></div>
        <a href="" class="nav-link">Home</a>
        <a href="" class="nav-link">Cars</a>
        <a href="about-us.php" class="nav-link">About-us</a>
        <a href="" class="nav-link">Sign-in</a>
        <a href="" class="nav-link">Log-out</a>
    </div>

    <div class="content">
        <div id="carousel" class="carousel">
            <p id="carouselText">Welkom bij Carrental-24/7</p>
        </div>
    </div>

    <script src="script.js"></script>
    <script>
        var carouselText = document.getElementById('carouselText');
        var carouselIndex = 1;

        function updateCarousel() {
            if (carouselIndex === 1) {
                carouselText.innerHTML = "Welkom bij Carrental-24/7";
            } else if (carouselIndex === 2) {
                carouselText.innerHTML = "Carrental-24/7: Vrijheid op wielen, altijd binnen handbereik!";
            } else {
                carouselText.innerHTML = "Ontdek de wereld op jouw voorwaarden met Carrental-24/7 - altijd klaar voor jouw volgende avontuur!";
            }
            carouselIndex = (carouselIndex % 3) + 1; // Wissel tussen 1, 2 en 3
        }

        setInterval(updateCarousel, 5000); 
    </script>
</body>

</html>
