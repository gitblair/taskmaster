<?php
require "config.php";

// Function to log messages to a custom log file
function custom_log($message) {
    $logfile = 'log.txt';
    file_put_contents($logfile, date("Y-m-d H:i:s") . " - " . $message . "\n", FILE_APPEND);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode($_POST['data'], true); // Decode the JSON data

    // Check connection
    if ($conn->connect_error) {
        custom_log("Connection failed: " . $conn->connect_error);
        die("Connection failed: " . $conn->connect_error);
    }

    $decimal_fields = ['score_chair_1', 'score_chair_2', 'score_chair_3', 'score_chair_4', 'score_chair_5'];

    foreach ($data as $row) {
        $id = $row['id'];
        $updateFields = [];

        foreach ($row as $field => $value) {
            // Handle decimal fields specifically
            if (in_array($field, $decimal_fields)) {
                $value = ($value === '') ? 'NULL' : $conn->real_escape_string($value);
            } else {
                $value = "'" . $conn->real_escape_string($value) . "'";
            }
            $updateFields[] = "$field = $value";
        }

        $updateFieldsStr = implode(', ', $updateFields);
        $sql = "UPDATE series SET $updateFieldsStr WHERE id = $id";

        // Log the SQL query for debugging
        custom_log("Update SQL: $sql");

        if ($conn->query($sql) === TRUE) {
            custom_log("Record with ID $id updated successfully");
        } else {
            custom_log("Error updating record with ID $id: " . $conn->error);
        }
    }

    echo "Records updated successfully";
    $conn->close();
}
?>
