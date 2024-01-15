<?php 

include 'db.php';
$db = new Database();
if (isset($_GET['id'])) {
    try {
        $db->deleteUser($_GET['id']);
        header("Location:staff.php?Succes");
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header("Location:staff.php");
}
?>
