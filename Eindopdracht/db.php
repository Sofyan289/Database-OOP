<?php

class Database
{
    public $pdo;
    private string $klanten = "klanten";
    private string $autos = "autos";

    public function __construct($db = "Autoverhuur", $user = "root", $pwd = "", $host = "localhost")
    {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "connection failed: " . $e->getMessage();
        }
    }
    public function insertUser($gebruikersnaam, $wachtwoord)
    {
        $stmt = $this->pdo->prepare("insert into klanten (gebruikersnaam, wachtwoord) values(?, ?)");
        $stmt->execute([$gebruikersnaam, $wachtwoord]);
    }
    public function select($ID = null)
    {
        if ($ID) {
            $stmt = $this->pdo->prepare("SELECT * FROM klanten WHERE ID = ?");
            $stmt->execute([$ID]);
            $result = $stmt->fetch();
            return $result;
        }
        $stmt = $this->pdo->query("SELECT * FROM klanten");
        $result = $stmt->fetchAll();
        return $result;
    }
    public function selectAuto($ID = null)
    {
        if ($ID) {
            $stmt = $this->pdo->prepare("SELECT * FROM autos WHERE autoID = ?");
            $stmt->execute([$ID]);
            $result = $stmt->fetch();
            return $result;
        }
        $stmt = $this->pdo->query("SELECT * FROM autos");
        $result = $stmt->fetchAll();
        return $result;
    }
    public function upload($file)
    {
        $stmt = $this->pdo->prepare("INSERT INTO autos (autoFoto) values (?)");
        $stmt->execute([$file]);
    }
    public function editUser($ID, $gebruikersnaam, $wachtwoord, $email)
    {
        $stmt = $this->pdo->prepare("UPDATE klanten SET username = ?, wachtwoord = ? , email = ?");
        $wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
        $stmt->execute([$gebruikersnaam, $wachtwoord, $email]);
    }
    public function deleteUser($ID)
    {
        $stmt = $this->pdo->prepare("DELETE FROM `klanten` WHERE ID = ?");
        $stmt->execute([$ID]);
    }
    public function deleteCar($autoid)
    {
        $stmt = $this->pdo->prepare("DELETE FROM `autos` WHERE autoid = ?");
        $stmt->execute([$autoid]);
    }
    public function aanmelden($voornaam, $achternaam, $geboortedatum, $gebruikersnaam, $email, $password, $rol)
    {
        $stmt = $this->pdo->prepare("INSERT INTO klanten (voornaam,achternaam,geboortedatum, gebruikersnaam,email,wachtwoord, rol) values (?,?,?,?,?,?,?)");
        $stmt->execute([$voornaam, $achternaam, $geboortedatum, $gebruikersnaam, $email, $password, $rol]);
    }

    public function aanmeldenAdmin($voornaam, $achternaam, $geboortedatum, $gebruikersnaam, $email, $password, $rol)
    {
        $stmt = $this->pdo->prepare("INSERT INTO klanten (voornaam,achternaam,geboortedatum, gebruikersnaam,email,wachtwoord,rol) values (?,?,?,?,?,?,?)");
        $stmt->execute([$voornaam, $achternaam, $geboortedatum, $gebruikersnaam, $email, $password, $rol]);
    }
    public function aanmeldenAuto($autonaam, $automerk, $automodel, $bouwjaar, $kenteken, $autofoto)
    {
        $stmt = $this->pdo->prepare("INSERT INTO autos (autoNaam,autoMerk,autoModel, bouwjaar,kenteken,autoFoto) values (?,?,?,?,?,?)");
        $stmt->execute([$autonaam, $automerk, $automodel, $bouwjaar, $kenteken, $autofoto]);
    }
    public function login($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM klanten where email = ?");
        $stmt->execute([$email]);
        $result = $stmt->fetch();
        return $result;
    }
    public function updateUserAdmin($voornaam, $achternaam, $email, $wachtwoord, $geboortedatum, $gebruikersnaam, $rol, $id)
    {
        $stmt = $this->pdo->prepare("UPDATE $this->klanten SET voornaam = ?, achternaam = ?,
        email = ?, wachtwoord = ?, geboortedatum = ?, gebruikersnaam = ?, rol = ? WHERE id = ?");
        $stmt->execute([$voornaam, $achternaam, $email, $wachtwoord, $geboortedatum, $gebruikersnaam, $rol, $id]);
    }
    public function updateUser($voornaam, $achternaam, $email, $wachtwoord, $geboortedatum, $gebruikersnaam, $id)
    {
        $stmt = $this->pdo->prepare("UPDATE $this->klanten SET voornaam = ?, achternaam = ?,
        email = ?, wachtwoord = ?, geboortedatum = ?, gebruikersnaam = ? WHERE id = ?");
        $stmt->execute([$voornaam, $achternaam, $email, $wachtwoord, $geboortedatum, $gebruikersnaam, $id]);
    }
    public function updateAutos($autonaam, $automerk, $automodel, $bouwjaar, $kenteken, $autofoto, $id)
    {
        $stmt = $this->pdo->prepare("UPDATE $this->autos SET autoNaam = ?, autoMerk = ?,
        autoModel = ?, bouwjaar = ?, kenteken = ?, autoFoto = ? WHERE autoID = ?");
        $stmt->execute([$autonaam, $automerk, $automodel, $bouwjaar, $kenteken, $autofoto, $id]);
    }
}
