<?php
require "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $data = $_POST['data'];

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $updateFields = [];
    foreach ($data as $field => $value) {
        $updateFields[] = "$field = '{$conn->real_escape_string($value)}'";
    }

    $updateFieldsStr = implode(', ', $updateFields);
    $sql = "UPDATE series SET $updateFieldsStr WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>
