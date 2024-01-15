<?php 

include 'db.php';
$db = new Database();
if (isset($_GET['id'])) {
    try {
        $db->deleteCar($_GET['id']);
        header("Location:admin.php?Succes");
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header("Location:admin.php");
}
?>
