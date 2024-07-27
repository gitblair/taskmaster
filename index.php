<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Series Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="container-fluid mt-5">
    <h2>Series Table</h2>
    <button class="btn btn-success mb-3" id="add-row-btn">Add New Row</button>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Featured</th>
                <th>Country</th>
                <th>Taskmaster</th>
                <th>Assistant</th>
                <th>Series</th>
                <th>Airdate Range</th>
                <th>Version</th>
                <th>Num</th>
                <th>Chair 1</th>
                <th>Chair 2</th>
                <th>Chair 3</th>
                <th>Chair 4</th>
                <th>Chair 5</th>
                <th>Score Chair 1</th>
                <th>Score Chair 2</th>
                <th>Score Chair 3</th>
                <th>Score Chair 4</th>
                <th>Score Chair 5</th>
                <th>Champion</th>
                <th>Series Note</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="series-table-body">
            <?php
            require "config.php";
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM series ORDER BY id DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr data-id='{$row['id']}'>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td contenteditable='true' data-field='featured'>{$row['featured']}</td>";
                    echo "<td contenteditable='true' data-field='country'>{$row['country']}</td>";
                    echo "<td contenteditable='true' data-field='taskmaster'>{$row['taskmaster']}</td>";
                    echo "<td contenteditable='true' data-field='assistant'>{$row['assistant']}</td>";
                    echo "<td contenteditable='true' data-field='series'>{$row['series']}</td>";
                    echo "<td contenteditable='true' data-field='airdate_range'>{$row['airdate_range']}</td>";
                    echo "<td contenteditable='true' data-field='version'>{$row['version']}</td>";
                    echo "<td contenteditable='true' data-field='num'>{$row['num']}</td>";
                    echo "<td contenteditable='true' data-field='chair_1'>{$row['chair_1']}</td>";
                    echo "<td contenteditable='true' data-field='chair_2'>{$row['chair_2']}</td>";
                    echo "<td contenteditable='true' data-field='chair_3'>{$row['chair_3']}</td>";
                    echo "<td contenteditable='true' data-field='chair_4'>{$row['chair_4']}</td>";
                    echo "<td contenteditable='true' data-field='chair_5'>{$row['chair_5']}</td>";
                    echo "<td contenteditable='true' data-field='score_chair_1'>{$row['score_chair_1']}</td>";
                    echo "<td contenteditable='true' data-field='score_chair_2'>{$row['score_chair_2']}</td>";
                    echo "<td contenteditable='true' data-field='score_chair_3'>{$row['score_chair_3']}</td>";
                    echo "<td contenteditable='true' data-field='score_chair_4'>{$row['score_chair_4']}</td>";
                    echo "<td contenteditable='true' data-field='score_chair_5'>{$row['score_chair_5']}</td>";
                    echo "<td contenteditable='true' data-field='champion'>{$row['champion']}</td>";
                    echo "<td contenteditable='true' data-field='series_note'>{$row['series_note']}</td>";
                    echo "<td><button class='btn btn-primary save-btn'>Save</button></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='22'>No records found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '.save-btn', function() {
            var row = $(this).closest('tr');
            var id = row.data('id');
            var data = {};

            row.find('td[data-field]').each(function() {
                var field = $(this).data('field');
                var value = $(this).text();
                data[field] = value;
            });

            $.ajax({
                url: 'update_series.php',
                method: 'POST',
                data: {id: id, data: data},
                success: function(response) {
                    alert('Update successful');
                },
                error: function() {
                    alert('Update failed');
                }
            });
        });

        $('#add-row-btn').on('click', function() {
            var newRow = `
                <tr>
                    <td></td>
                    <td contenteditable='true' data-field='featured'></td>
                    <td contenteditable='true' data-field='country'></td>
                    <td contenteditable='true' data-field='taskmaster'></td>
                    <td contenteditable='true' data-field='assistant'></td>
                    <td contenteditable='true' data-field='series'></td>
                    <td contenteditable='true' data-field='airdate_range'></td>
                    <td contenteditable='true' data-field='version'></td>
                    <td contenteditable='true' data-field='num'></td>
                    <td contenteditable='true' data-field='chair_1'></td>
                    <td contenteditable='true' data-field='chair_2'></td>
                    <td contenteditable='true' data-field='chair_3'></td>
                    <td contenteditable='true' data-field='chair_4'></td>
                    <td contenteditable='true' data-field='chair_5'></td>
                    <td contenteditable='true' data-field='score_chair_1'></td>
                    <td contenteditable='true' data-field='score_chair_2'></td>
                    <td contenteditable='true' data-field='score_chair_3'></td>
                    <td contenteditable='true' data-field='score_chair_4'></td>
                    <td contenteditable='true' data-field='score_chair_5'></td>
                    <td contenteditable='true' data-field='champion'></td>
                    <td contenteditable='true' data-field='series_note'></td>
                    <td><button class='btn btn-success save-new-btn'>Save</button></td>
                </tr>`;
            $('#series-table-body').prepend(newRow);
        });

        $(document).on('click', '.save-new-btn', function() {
            var row = $(this).closest('tr');
            var data = {};

            row.find('td[data-field]').each(function() {
                var field = $(this).data('field');
                var value = $(this).text();
                data[field] = value;
            });

            $.ajax({
                url: 'add_series.php',
                method: 'POST',
                data: {data: data},
                success: function(response) {
                    alert('Row added successfully');
                    location.reload();

                },
                error: function() {
                    alert('Failed to add row');
                }
            });
        });
    });
</script>
</body>
</html>
