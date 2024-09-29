<?php
include 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM tasks WHERE id=$id";
$result = $conn->query($sql);
$task = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
</head>
<body>
    <h2>Edit Task</h2>
    <form action="update_task.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
        <label for="title">Task Title:</label>
        <input type="text" id="title" name="title" value="<?php echo $task['title']; ?>" required><br>

        <label for="description">Task Description:</label>
        <textarea id="description" name="description" required><?php echo $task['description']; ?></textarea><br>

        <label for="due_date">Due Date:</label>
        <input type="date" id="due_date" name="due_date" value="<?php echo $task['due_date']; ?>" required><br>

        <input type="submit" value="Update Task">
    </form>

    <br>
    <a href="list_tasks.php">Back to Task List</a>
</body>
</html>
