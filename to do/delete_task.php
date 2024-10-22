<?php
require_once 'db.php';

if (isset($_POST['id'])) {
    $taskId = $_POST['id'];

    $db = new Database();

    // Delete task from the database
    $sql = "DELETE FROM tasks WHERE id=$taskId";
    if ($db->query($sql)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $db->conn->error;
    }

    $db->close();
}
?>
