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
        </tr>
        <tr>
            <?php $users = $db->selectUser(3);?>
            <td><?php echo $users['user_id']; ?></td>
            <td><?php echo $users['username']; ?></td>
            <td><?php echo $users['password']; ?></td>
        </tr>
    </table>



    <form method="post">
        <input type="text" name="username">
        <input type="text" name="password">
        <input type="submit">
    </form>
</body>
</html>