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
        $fields[] = $field;
        $values[] = "'{$conn->real_escape_string($value)}'";
    }

    $fieldsStr = implode(', ', $fields);
    $valuesStr = implode(', ', $values);



    //$sql = "INSERT INTO series ($fieldsStr) VALUES ($valuesStr)";

        //$sql = "INSERT INTO series series_note VALUES 'poop'";

$sql = "INSERT INTO `series` (`id`, `featured`, `country`, `taskmaster`, `assistant`, `series`, `airdate_range`, `version`, `num`, `chair_1`, `chair_2`, `chair_3`, `chair_4`, `chair_5`, `score_chair_1`, `score_chair_2`, `score_chair_3`, `score_chair_4`, `score_chair_5`, `champion`, `series_note`) VALUES (NULL, '0', 'UK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'poopwer')";




    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
