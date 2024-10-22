<?php
require_once 'db.php';
$db = new Database();
$sql = "CREATE TABLE IF NOT EXISTS tasks (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    task VARCHAR(255) NOT NULL,
    status ENUM('incomplete', 'complete') DEFAULT 'incomplete',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($db->query($sql) === TRUE) {
    echo "Table 'tasks' created successfully.";
} else {
    echo "Error creating table: " . $db->conn->error;
}
$db->close();
?>
