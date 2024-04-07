<?php
require_once "includes/connection.php";
require_once "User.php";

$user = new User($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["action"] == "add") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        
        // Проверяем, существует ли такой email уже в базе данных
        if ($user->isEmailExists($email)) {
            echo "Email already exists in the database";
        } else {
            if ($user->addUser($name, $email)) {
                echo "User added successfully";
            } else {
                echo "Error adding user";
            }
        }
    } elseif ($_POST["action"] == "reset") {
        if ($user->resetUsers()) {
            echo "Users reset successfully";
        } else {
            echo "Error resetting users";
        }
    }
}

// Получаем список пользователей после изменений
$users = $user->getUsers();
return $users;
?>
