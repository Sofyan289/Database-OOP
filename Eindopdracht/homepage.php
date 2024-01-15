<?php
include 'db.php';
session_start();

if (isset($_SESSION['ID'])) {
    echo "Ingelogd als: " . $_SESSION['rol'];
}

try {
    $db = new Database();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        // voer de functie insertUser uit en sla de return waarde op.
        $insertId = $db->insertUser($_POST['email'], $hash);
        // print de lastInsertId
        echo "Successfully added " . $insertId;
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoverhuur24</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <h1>Carrental-<span>24/7</span></h1>
        <div class="menu-toggle" onclick="toggleMenu()">&#9776;</div>
    </header>

    <div class="sidebar" id="sidebar">
        <div class="close-btn" onclick="closeMenu()"><span>Close</span></div>
        <a href="#" class="nav-link">Home</a>
        <a href="#" class="nav-link">Cars</a>
        <a href="#" class="nav-link">About-us</a>
        <?php if (empty($_SESSION['ID'])) {
            echo '<a href="login.php" class="nav-link">Sign-in</a>';
        };

        if (isset($_SESSION['ID'])) {
            echo '<a href="logout.php" class="nav-link">Log-out</a>';
            if ($_SESSION['rol'] == 'medewerker') {
                echo '<a href="staff.php" class="nav-link">klantenlijst</a>';
            }
            if ($_SESSION['rol'] == 'admin') {
                echo '<a href="admin.php" class="nav-link">admin panel</a>';
            }
        }
     
        ?>
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

        setInterval(updateCarousel, 5000); // Wijzig elke 5 seconden
    </script>
</body>

</html>
