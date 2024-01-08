<?php 

include 'db.php';
$db = new Database();
if (isset($_GET['ID'])) {
    try {
        $db->deleteUser($_GET['ID']);
        header("Location:home.php?Succes");
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header("Location:home.php");
}
?>
