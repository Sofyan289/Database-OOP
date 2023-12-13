<?php 

include 'db.php';
$db = new Database();
if (isset($_GET['user_id'])) {
    try {
        $db->deleteUser($_GET['user_id']);
        header("Location:home.php?Succes");
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header("Location:home.php");
}
?>
