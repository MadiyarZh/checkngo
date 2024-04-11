<?php
require_once "includes/connection.php";

class User {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function isEmailExists($email) {
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();

        // Если количество записей больше нуля, значит email уже существует в базе данных
        return $count > 0;
    }

    // public function addUser($name, $email) {
    //     $sql = "INSERT INTO users (name, email, amount_share) VALUES ('$name', '$email', 0)";
    //     if ($this->conn->query($sql) === TRUE) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    public function addUser($name, $email) {
        // Добавляем нового пользователя
        $sql = "INSERT INTO users (name, email, amount_share) VALUES (?, ?, 0)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $name, $email);
        if ($stmt->execute()) {
            // Получаем общее количество пользователей
            $totalUsersSql = "SELECT COUNT(*) as totalUsers FROM users";
            $totalUsersResult = $this->conn->query($totalUsersSql);
            $totalUsersRow = $totalUsersResult->fetch_assoc();
            $totalUsers = $totalUsersRow['totalUsers'];
    
            // Вычисляем новую долю для каждого пользователя
            $newShare = 100 / $totalUsers;
    
            // Обновляем долю для всех пользователей
            $updateSql = "UPDATE users SET amount_share = ?";
            $updateStmt = $this->conn->prepare($updateSql);
            $updateStmt->bind_param("d", $newShare);
            $updateStmt->execute();
    
            return true;
        } else {
            return false;
        }
    }

    public function resetUsers() {
        $sql = "TRUNCATE TABLE users";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function getUsers() {
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);
        $users = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }
        return $users;
    }
}
?>
