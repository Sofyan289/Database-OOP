<?php
include 'db.php';







if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();

    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
        $fileExtension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));

        if (in_array($fileExtension, $allowedTypes)) {
            $name = $_FILES['file']['name'];
            $targetFilePath = "images/" . $name;
            try {
                $db->aanmeldenAuto(
                    $_POST['autoNaam'],
                    $_POST['autoMerk'],
                    $_POST['autoModel'],
                    $_POST['bouwjaar'],
                    $_POST['kenteken'],
                    $targetFilePath
                );
            } catch (\Exception $e) {
                echo "Error: " . $e->getMessage();
            }

            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            } else {
                echo "Er is een probleem opgetreden bij het verplaatsen van het bestand.";
            }
        } else {
            echo "Alleen JPG, JPEG, PNG en GIF-bestanden zijn toegestaan.";
        }
    } else {
        echo "Er is een probleem opgetreden bij het uploaden van het bestand.";
    }
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
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <input type="text" name="autoNaam" placeholder="autoNaam" required>
        </div>
        <div class="mb-3">
            <input type="text" name="autoMerk" placeholder="autoMerk" required>
        </div>
        <div class="mb-3">
            <input type="text" name="autoModel" placeholder="autoModel" required>
        </div>
        <div class="mb-3">
            <input type="number" name="bouwjaar" placeholder="bouwjaar" required>
        </div>
        <div class="mb-3">
            <input type="text" name="kenteken" placeholder="kenteken" required>
        </div>

        <input type="file" name="file"><br><br>
        <input type="submit">
    </form>

    <a href="admin.php"> <button>Terug</button>
    </a>
</body>

</html>