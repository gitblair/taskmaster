<?php
require "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST['data'];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $fields = [];
    $values = [];
    foreach ($data as $field => $value) {
        if ($field !== 'id') { // Skip the id field
            $fields[] = $field;
            $values[] = $value !== '' ? "'{$conn->real_escape_string($value)}'" : "NULL";
        }
    }

    $fieldsStr = implode(', ', $fields);
    $valuesStr = implode(', ', $values);

    $sql = "INSERT INTO `episodes` ($fieldsStr) VALUES ($valuesStr)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
