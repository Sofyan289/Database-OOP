<?php
include 'db.php';

try {
    $db = new Database();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $db->updateUserAdmin(
            $_POST['voornaam'],
            $_POST['achternaam'],
            $_POST['email'],
            $hash,
            $_POST['geboortedatum'],
            $_POST['gebruikersnaam'],
            $_POST['rol'],
            $_GET['id']
        );
        header("Location:admin.php");
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
    <title>Document</title>
</head>

<body>
    <form method="POST">
        <div class="mb-3">
            <input type="text" name="voornaam" placeholder="Naam" required>
        </div>
        <div class="mb-3">
            <input type="text" name="achternaam" placeholder="Achternaam" required>
        </div>
        <div class="mb-3">
            <input type="email" name="email" placeholder="email" required>
        </div>
        <div class="mb-3">
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="mb-3">
            <input type="date" name="geboortedatum" placeholder="geboortedatum" required>
        </div>
        <div class="mb-3">
            <input type="text" name="gebruikersnaam" placeholder="gebruikersnaam" required>
        </div>

        <div class="mb-3">
            <input type="radio" id="rol" name="rol" value="klant">
            <label for="rol">klant</label><br>
            <input type="radio" id="rol" name="rol" value="medewerker">
            <label for="rol">medewerker</label><br>
            <input type="radio" id="rol" name="rol" value="admin">
            <label for="rol">admin</label>
        </div>
        <input type="submit" class="btn btn-primary">
    </form>
</body>

</html>