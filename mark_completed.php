<?php
include 'db.php';

$id = $_POST['id'];
$status = isset($_POST['completed']) ? 'Completed' : 'Pending';

$sql = "UPDATE tasks SET status='$status' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: list_tasks.php");
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
