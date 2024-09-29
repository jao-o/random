<?php
include 'db.php';

$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
</head>
<body>
    <h2>All Tasks</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Complete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['title']}</td>
                        <td>{$row['description']}</td>
                        <td>{$row['due_date']}</td>
                        <td>{$row['status']}</td>
                        <td><a href='edit_task.php?id={$row['id']}'>Edit</a></td>
                        <td><a href='delete_task.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>
                        <td>
                            <form action='mark_completed.php' method='POST'>
                                <input type='hidden' name='id' value='{$row['id']}'>
                                <input type='checkbox' name='completed' value='Completed' " . ($row['status'] == 'Completed' ? 'checked' : '') . " onchange='this.form.submit();'>
                            </form>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No tasks found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <br>
    <a href="index.html">Create New Task</a>
</body>
</html>
