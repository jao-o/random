<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM tasks WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: list_tasks.php");
} else {
    echo "Error deleting task: " . $conn->error;
}

$conn->close();
?>
