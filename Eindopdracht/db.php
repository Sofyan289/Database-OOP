<?php 

class Database {
    public $pdo;

    public function __construct($db = "Autoverhuur", $user="root", $pwd="", $host="localhost") {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch(PDOException $e) {
        echo "connection failed: " . $e->getMessage();
        }
    }
    public function insertUser($gebruikersnaam, $wachtwoord) {
        $stmt = $this->pdo->prepare("insert into klanten (gebruikersnaam, wachtwoord) values(?, ?)");
        $stmt->execute([$gebruikersnaam, $wachtwoord]);
    }       
    public function select($ID = null) {
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
    public function selectAuto($ID = null) {
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

    public function editUser ($ID, $gebruikersnaam, $wachtwoord, $email) {
        $stmt = $this->pdo->prepare("UPDATE klanten SET username = ?, wachtwoord = ? , email = ?");
        $wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
        $stmt->execute([$gebruikersnaam, $wachtwoord, $email]);
    }
    public function deleteUser ($ID) {
        $stmt = $this->pdo->prepare("DELETE FROM `klanten` WHERE ID = ?");
        $stmt->execute([$ID]);
    }
    public function aanmelden($voornaam, $achternaam, $geboortedatum, $gebruikersnaam ,$email, $password) {
        $stmt = $this->pdo->prepare("INSERT INTO klanten (voornaam,achternaam,geboortedatum, gebruikersnaam,email,wachtwoord) values (?,?,?,?,?,?)");
        $stmt->execute([$voornaam, $achternaam, $geboortedatum, $gebruikersnaam, $email, $password]);
    }
    public function aanmeldenAdmin($voornaam, $achternaam, $geboortedatum, $gebruikersnaam ,$email, $password, $rol) {
        $stmt = $this->pdo->prepare("INSERT INTO klanten (voornaam,achternaam,geboortedatum, gebruikersnaam,email,wachtwoord,rol) values (?,?,?,?,?,?,?)");
        $stmt->execute([$voornaam, $achternaam, $geboortedatum, $gebruikersnaam, $email, $password, $rol]);
    }
    public function login($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM klanten where email = ?");
        $stmt->execute([$email]);
        $result = $stmt->fetch();
        return $result;
    }

}


?>