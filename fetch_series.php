<?php
require "config.php";

$sql = "SELECT * FROM series ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Calculate the maximum score for the current row
        $maxScore = max(
            $row['score_chair_1'],
            $row['score_chair_2'],
            $row['score_chair_3'],
            $row['score_chair_4'],
            $row['score_chair_5']
        );

        echo "<tr data-id='{$row['id']}'>";
        echo "<td contenteditable='false' data-field='id'>{$row['id']}</td>";
        foreach ($row as $key => $value) {
            if ($key != 'id') {
                echo "<td contenteditable='true' data-field='{$key}'>{$value}</td>";
            }
        }
        // Add a new column for the max score
        echo "<td>{$maxScore}</td>";
        echo "<td><button class='btn btn-primary save-btn'>Save</button></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='22'>No records found</td></tr>";
}

$conn->close();
?>
