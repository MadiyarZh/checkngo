<?php
require_once "includes/connection.php";
require_once "User.php";

$user = new User($conn);
$users = $user->getUsers();
echo json_encode($users);
?>
