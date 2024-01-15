<?php
session_start(); // Start de sessie

// Controleer of de gebruiker is ingelogd
if (isset($_SESSION['ID'])) {
    // stop de sessievariabele
    unset($_SESSION['ID']);
    session_destroy();
    header("Location:homepage.php?uitgelogd");
    exit();
} else {
    // Als de gebruiker niet is ingelogd, stuur ze dan naar de inlogpagina
    header("Location:homepage.php?uitgelogd");
    exit();
}
