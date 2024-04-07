<?php
require_once "includes/connection.php";

$sql = "TRUNCATE TABLE users";

if ($conn->query($sql) === TRUE) {
    echo "Users reset successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
