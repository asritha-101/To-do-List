<?php
require_once 'db.php';

if (isset($_POST['id'])) {
    $taskId = $_POST['id'];

    $db = new Database();

    // Fetch current status of the task
    $result = $db->query("SELECT status FROM tasks WHERE id = $taskId");
    $row = $result->fetch_assoc();
    $newStatus = ($row['status'] == 'incomplete') ? 'complete' : 'incomplete';

    // Update task status in the database
    $sql = "UPDATE tasks SET status='$newStatus' WHERE id=$taskId";
    if ($db->query($sql)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $db->conn->error;
    }

    $db->close();
}
?>
