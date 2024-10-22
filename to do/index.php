<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="todo-header">
            <h2>To-Do List</h2>
        </div>
        <div class="todo-body">
            <form action="add_task.php" method="POST">
                <input type="text" name="task" id="task-input" class="todo-input" placeholder="Add your task">
                <button type="submit" id="add-task-btn">Add Task</button>
            </form>
        </div>
        <ul id="task-list">
            <?php
            require_once 'db.php';
            $db = new Database();

            // Fetch tasks from database
            $result = $db->query("SELECT * FROM tasks");

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<li class='task'>";
                    echo "<span>" . $row['task'] . "</span>";
                    echo "<form method='POST' action='update_task.php' style='display:inline;'>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo "<button type='submit'>" . ($row['status'] == 'incomplete' ? 'Complete' : 'Undo') . "</button>";
                    echo "</form>";
                    echo "<form method='POST' action='delete_task.php' style='display:inline;'>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo "<button type='submit'>Delete</button>";
                    echo "</form>";
                    echo "</li>";
                }
            } else {
                echo "<li>No tasks found</li>";
            }

            $db->close();
            ?>
        </ul>
    </div>
</body>
</html>
