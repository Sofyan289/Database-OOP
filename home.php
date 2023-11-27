<?php
include 'db.php';
$db = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $db->insertUser($_POST['username'], $_POST['password']);
        echo "tooegevoegd";
    } catch (Exception $e) {
        echo $e->getMessage();
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
    <table>
        <tr>
            <th>UserID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <tr>
            <?php $users = $db->selectUser(4);?>

        </tr>
    </table>



    <form method="post">
        <input type="text" name="username">
        <input type="text" name="password">
        <input type="submit">
    </form>
</body>
</html>