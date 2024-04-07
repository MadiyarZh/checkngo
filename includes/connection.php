<?php
$servername = "localhost";
$username = "root"; // Ваше имя пользователя
$password = "root"; // Ваш пароль
$dbname = "checkngo";

// Установка соединения с базой данных
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
