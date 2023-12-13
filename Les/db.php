<?php 

class Database {
    public $pdo;

    public function __construct($db = "webwinkel", $user="root", $pwd="", $host="localhost") {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch(PDOException $e) {
        echo "connection failed: " . $e->getMessage();
        }
    }
    public function insertUser($username, $password) {
        $stmt = $this->pdo->prepare("insert into users (username, password) values(?, ?)");
        $stmt->execute([$username, $password]);
    }       
    public function select($user_id = null) {
        if ($user_id) {
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE user_id = ?");
            $stmt->execute([$user_id]);
            $result = $stmt->fetch();
            return $result;
    } 
    $stmt = $this->pdo->query("SELECT * FROM users");
    $result = $stmt->fetchAll();
    return $result;
    }

    public function editUser ($user_id, $username, $password, $email) {
        $stmt = $this->pdo->prepare("UPDATE users SET username = ?, password = ? , email = ?");
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->execute([$username, $password, $email]);
    }
    public function deleteUser ($user_id) {
        $stmt = $this->pdo->prepare("DELETE FROM `users` WHERE user_id = ?");
        $stmt->execute([$user_id]);
    }
}


?>