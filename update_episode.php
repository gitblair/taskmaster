<?php
require "config.php";

// Function to log messages to a custom log file
function custom_log($message) {
    $logfile = 'log.txt';
    file_put_contents($logfile, date("Y-m-d H:i:s") . " - " . $message . "\n", FILE_APPEND);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $data = $_POST['data'];

    // Check connection
    if ($conn->connect_error) {
        custom_log("Connection failed: " . $conn->connect_error);
        die("Connection failed: " . $conn->connect_error);
    }

    $decimal_fields = ['chair_1_ep_score', 'chair_2_ep_score', 'chair_3_ep_score', 'chair_4_ep_score', 'chair_5_ep_score'];
    $updateFields = [];

    foreach ($data as $field => $value) {
        // Handle decimal fields specifically
        if (in_array($field, $decimal_fields)) {
            $value = ($value === '') ? 'NULL' : $conn->real_escape_string($value);
        } else {
            $value = "'" . $conn->real_escape_string($value) . "'";
        }
        $updateFields[] = "$field = $value";
    }

    $updateFieldsStr = implode(', ', $updateFields);
    $sql = "UPDATE episodes SET $updateFieldsStr WHERE id = $id";

    // Log the SQL query for debugging
    custom_log("Update Episode SQL: $sql");

    if ($conn->query($sql) === TRUE) {
        echo "Episode updated successfully";
        custom_log("Episode updated successfully");
    } else {
        echo "Error updating Episode: " . $conn->error;
        custom_log("Error updating Episode: " . $conn->error);
    }

    $conn->close();
}
?>
