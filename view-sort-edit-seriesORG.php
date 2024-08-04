<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taskmaster: Series</title>

    <!-- Bootstrap Style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- APP Style -->
    <link rel="stylesheet" href="styles.css">

    <!-- Bootstrap Bundle JS contains both Bootstrap's JavaScript and Popper.js (required for dropdowns and tooltips). -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Application Specific JS -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Table Sorter -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/css/theme.bootstrap_4.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.widgets.min.js"></script>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>



<body>
    <div class="container mt-5">


      <?php require "config.php"; ?>

      <div class="col-md-12 p-2 mt-5 mb-5 bg-info bg-gradient">

        <?php include "nav-project.php"; ?>

        <h2 class="ms-5 mt-5 mb-2">Taskmaster: Series</h2>
        <p class="ms-5 me-5 mb-2">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>

<hr />

        <button id="add-row-btn" class="btn btn-success ms-5 mt-3 mb-4">Add New Row</button>
        <div class="table-responsive">
              <table id="series-table" class="table table-bordered tablesorter">

              <!-- <button id="add-row-btn" class="btn btn-success mb-3">Add New Row</button>
              <table class="table table-bordered"> -->
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
                          <th>Champ Score</th>
                          <th>Actions</th>
                      </tr>
                  </thead>


        <tbody>
            <?php
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

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
            ?>
        </tbody>
    </table>

</div>
</div>








<script>
    $(document).ready(function() {


      // TABLESORTER SCRIPT
      $("#series-table").tablesorter({
                      theme: 'bootstrap',
                      widgets: ['zebra', 'columns'],
                      headers: {
                          0: { sorter: 'digit' },
                          1: { sorter: 'text' },
                          2: { sorter: 'text' },
                          3: { sorter: 'text' },
                          4: { sorter: 'text' },
                          5: { sorter: 'text' },
                          6: { sorter: 'text' },
                          7: { sorter: 'text' },
                          8: { sorter: 'digit' },
                          9: { sorter: 'text' },
                          10: { sorter: 'text' },
                          11: { sorter: 'text' },
                          12: { sorter: 'text' },
                          13: { sorter: 'text' },
                          14: { sorter: 'digit' }, // score_chair_1
                          15: { sorter: 'digit' }, // score_chair_2
                          16: { sorter: 'digit' }, // score_chair_3
                          17: { sorter: 'digit' }, // score_chair_4
                          18: { sorter: 'digit' }, // score_chair_5
                          19: { sorter: false }, // Disable sorting for Champion
                          20: { sorter: false }, // Disable sorting for Series Note
                          21: { sorter: 'digit' }, // champ score
                          22: { sorter: false } // Disable sorting for the Actions column
                      }
                  });


        // ADD NEW ROW SCRIPT
        $('#add-row-btn').on('click', function() {
            var newRow = `
                <tr>
                    <td contenteditable="false" data-field="id"></td>
                    <td contenteditable="true" data-field="featured">0</td>
                    <td contenteditable="true" data-field="country"></td>
                    <td contenteditable="true" data-field="taskmaster"></td>
                    <td contenteditable="true" data-field="assistant"></td>
                    <td contenteditable="true" data-field="series"></td>
                    <td contenteditable="true" data-field="airdate_range"></td>
                    <td contenteditable="true" data-field="version"></td>
                    <td contenteditable="true" data-field="num"></td>
                    <td contenteditable="true" data-field="chair_1"></td>
                    <td contenteditable="true" data-field="chair_2"></td>
                    <td contenteditable="true" data-field="chair_3"></td>
                    <td contenteditable="true" data-field="chair_4"></td>
                    <td contenteditable="true" data-field="chair_5"></td>
                    <td contenteditable="true" data-field="score_chair_1"></td>
                    <td contenteditable="true" data-field="score_chair_2"></td>
                    <td contenteditable="true" data-field="score_chair_3"></td>
                    <td contenteditable="true" data-field="score_chair_4"></td>
                    <td contenteditable="true" data-field="score_chair_5"></td>
                    <td contenteditable="true" data-field="champion"></td>
                    <td contenteditable="true" data-field="series_note"></td>
                    <td contenteditable="false"></td>
                    <td><button class="btn btn-success add-btn">Add</button></td>
                </tr>
            `;
            $('table tbody').prepend(newRow);
        });

        $(document).on('click', '.add-btn', function() {
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
                    location.reload(); // Reload the page to see the new row with the proper ID
                },
                error: function() {
                    alert('Error adding row');
                }
            });
        });


          // SAVE EDITS SCRIPT
        $(document).ready(function() {
            // Save button click handler for existing rows
            $('.save-btn').on('click', function() {
                var row = $(this).closest('tr');
                var id = row.data('id');
                var data = {};

                row.find('td[data-field]').each(function() {
                    var field = $(this).data('field');
                    var value = $(this).text();
                    data[field] = value;
                });

                console.log('Data to be sent for update:', {id: id, data: data}); // Log the data

                $.ajax({
                    url: 'update_series.php',
                    method: 'POST',
                    data: {id: id, data: data},
                    success: function(response) {
                        console.log('Server response:', response); // Log the server response
                        alert('Update successful');
                    },
                    error: function() {
                        alert('Update failed');
                    }
                });
            });
        });


    });
</script>

</body>
</html>
