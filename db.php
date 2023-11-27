<?php 

class Database {
    public $pdo;

    public function __construct($db = "webwinkel", $user="root", $pwd="", $host="localhost") {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "connected to database $db";
        
    } catch(PDOException $e) {
        echo "connection failed: " . $e->getMessage();
        }
    }
    public function insertUser($username, $password) {
        $stmt = $this->pdo->prepare("insert into users (username, password) values(?, ?)");
        $stmt->execute([$username, $password]);
    }
    
}

?>