<?php
require_once 'db.php';

if (isset($_POST['task']) && !empty($_POST['task'])) {
    $task = $_POST['task'];

    $db = new Database();

    // Insert task into the database
    $sql = "INSERT INTO tasks (task) VALUES ('$task')";
    if ($db->query($sql)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $db->conn->error;
    }

    $db->close();
}
?>
