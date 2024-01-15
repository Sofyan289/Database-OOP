<?php
include 'db.php';

try {
    $db = new Database();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $db->updateAutos(
            $_POST['autonaam'],
            $_POST['automerk'],
            $_POST['automodel'],
            $_POST['bouwjaar'],
            $_POST['kenteken'],
            $_POST['autofoto'],
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
        <input type="text" name="autonaam" placeholder="autonaam"> <br>
        <input type="text" name="automerk" placeholder="automerk"> <br>
        <input type="text" name="automodel" placeholder="automodel"> <br>
        <input type="number" name="bouwjaar" placeholder="bouwjaar"> <br>
        <input type="text" name="kenteken" placeholder="kenteken"> <br>
        <input type="text" name="autofoto" placeholder="autofoto"> <br>
        <input type="submit">
    </form>
</body>

</html>