<?php
include 'db.php';

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $db = new Database();
        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $db->aanmeldenAdmin(
            $_POST['voornaam'],
            $_POST['achternaam'],
            $_POST['geboortedatum'],
            $_POST['gebruikersnaam'],
            $_POST['email'],
            $hash,
            $_POST['rol']
        );
        header("Location:admin.php?accountAangemaakt");
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="d-flex flex-column align-items-center">
        <h1>Register</h1>
        <form method="POST">
            <div class="mb-3">
                <input type="text" name="voornaam" placeholder="Naam" required>
            </div>
            <div class="mb-3">
                <input type="text" name="achternaam" placeholder="Achternaam" required>
            </div>
            <div class="mb-3">
                <input type="date" name="geboortedatum" required>
            </div>
            <div class="mb-3">
                <input type="text" name="gebruikersnaam" placeholder="Gebruikersnaam" required>
            </div>
            <div class="mb-3">
                <input type="text" name="email" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="mb-3">
                <input type="radio" id="rol" name="rol" value="klant">
                <label for="rol">klant</label><br>
                <input type="radio" id="rol" name="rol" value="medewerker">
                <label for="rol">medewerker</label><br>
            </div>
            <input type="submit" class="btn btn-primary">
        </form>
    </div>
</body>

</html>