<?php
  include 'db.php';
  session_start();
  $db = new Database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Admin Panel</title>
</head>
<body>
<header>
        <h1>Carrental-<span>24/7</span></h1>
        <div class="menu-toggle" onclick="toggleMenu()">&#9776;</div>
    </header>

    <div class="sidebar" id="sidebar">
        <div class="close-btn" onclick="closeMenu()"><span>Close</span></div>
        <a href="homepage.php" class="nav-link">Home</a>
        <a href="#" class="nav-link">Cars</a>
        <a href="#" class="nav-link">About-us</a>
        <?php if (empty($_SESSION['ID'])) {
            echo '<a href="login.php" class="nav-link">Sign-in</a>';
        };

        if (isset($_SESSION['ID'])) {
            echo '<a href="logout.php" class="nav-link">Log-out</a>';
            if ($_SESSION['rol'] == 'medewerker') {
                echo '<a href="staff.php" class="nav-link">klantenlijst</a>';
            }
            if ($_SESSION['rol'] == 'admin') {
                echo '<a href="admin.php" class="nav-link">admin panel</a>';
            }
        }

        ?>
    </div>

    <script src="script.js"></script>

<h1 class="panel-title">Admin Panel</h1>
<h2 class="panel-title">Users</h2>
  <table >
        <tr>
            <th>id</th>
            <th>voornaam</th>
            <th>achternaam</th>
            <th>email</th>
            <th>wachtwoord</th>
            <th>geboortedatum</th>
            <th>gebruikersnaam</th>
            <th>rol</th>
            <th colspan="2">Action</th>
        </tr>

        <tr> <?php
            $users = $db->select(); 
            if ($users) { 
                foreach ($users as $user) {?>
            <td><?php echo $user['ID'];?></td>
            <td><?php echo $user['voornaam']?></td>
            <td><?php echo $user['achternaam']?></td>
            <td><?php echo $user['email']?></td>
            <td><?php echo $user['wachtwoord']?></td>
            <td><?php echo $user['geboortedatum']?></td>
            <td><?php echo $user['gebruikersnaam']?></td>
            <td><?php echo $user['rol']?></td>
           <td><a href="edit-staff.php?id=<?php echo $user['ID']; ?>">Edit</a></td>
           <td><a href="delete-staff.php?id=<?php echo $user['ID']; ?>">Delete</a></td>
           <td></td>
        </tr> <?php } }?>
    </table>

    <a href="aanmelden-staff.php">
        <button id="addUserButton">Add User</button>
    </a>

</body>
</html>