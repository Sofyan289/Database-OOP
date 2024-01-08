<?php
include 'db.php';
$db = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $db->insertUser($_POST['username'], $_POST['password']);
        echo "toegevoegd";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
        </tr>
        <tr>
            <?php $users = $db->select();
            foreach ($users as $user) {?>
            <td><?php echo $user["ID"] ?></td>
            <td><?php echo $user["gebruikersnaam"] ?></td>
            <td><?php echo $user["wachtwoord"] ?></td>
            <td><button type="button" class="btn btn-light"><a href="edit.php?ID=<?php echo $user['ID']; ?>&gebruikersnaam=<?php echo $user['gebruikersnaam']?>">Edit</a></button></td>
            <td><button type="button" class="btn btn-light"><a href="delete.php?ID=<?php echo $user['ID']; ?>">Delete</a></button></td>
        </tr> <?php }?>

    </table>



    <form method="post">
        <input type="text" name="username">
        <input type="text" name="password">
        <input type="submit">
    </form>
</body>
</html>