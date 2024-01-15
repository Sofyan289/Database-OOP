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
           <td><a href="edit-admin.php?id=<?php echo $user['ID']; ?>">Edit</a></td>
           <td><a href="delete-admin.php?id=<?php echo $user['ID']; ?>">Delete</a></td>
        </tr> <?php } }?>
        
    </table>
    <h2 class="panel-title">Cars</h2>
  <table >
        <tr>
            <th>id</th>
            <th>autoNaam</th>
            <th>autoMerk</th>
            <th>autoModel</th>
            <th>bouwjaar</th>
            <th>kenteken</th>
            <th>autoFoto</th>
            <th colspan="3">Action</th>
        </tr>

        <tr> <?php
            $autos = $db->selectAuto(); 
            if ($autos) { 
                foreach ($autos as $auto) {?>
            <td><?php echo $auto['autoID'];?></td>
            <td><?php echo $auto['autoNaam']?></td>
            <td><?php echo $auto['autoMerk']?></td>
            <td><?php echo $auto['autoModel']?></td>
            <td><?php echo $auto['bouwjaar']?></td>
            <td><?php echo $auto['kenteken']?></td>
            <td><?php echo $auto['autoFoto']?></td>
           <td><a href="edit-cars.php?id=<?php echo $auto['autoID']; ?>">Edit</a></td>
           <td><a href="delete-cars.php?id=<?php echo $auto['autoID']; ?>">Delete</a></td>
        </tr> <?php } }?>
    </table>




</body>
</html>