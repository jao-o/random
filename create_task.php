<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];

    
    $sql_check = "SELECT * FROM tasks WHERE title='$title' AND due_date='$due_date'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        
        echo "<script>alert('Task already exists with the same title and due date.'); window.location.href='index.html';</script>";
    } else {
        
        $sql = "INSERT INTO tasks (title, description, due_date) VALUES ('$title', '$description', '$due_date')";

        if ($conn->query($sql) === TRUE) {
            header("Location: list_tasks.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>
