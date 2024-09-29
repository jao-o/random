<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];

    
    $sql_check = "SELECT * FROM tasks WHERE title='$title' AND due_date='$due_date' AND id != $id";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        
        echo "<script>alert('Task already exists with the same title and due date.'); window.location.href='edit_task.php?id=$id';</script>";
    } else {
        
        $sql = "UPDATE tasks SET title='$title', description='$description', due_date='$due_date' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            header("Location: list_tasks.php");
        } else {
            echo "Error updating task: " . $conn->error;
        }
    }

    $conn->close();
}
?>
