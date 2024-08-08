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




        <!--

DO NOT DELETE BELOW - WORKING ON CUSTOMIZE COLUMNS
DO NOT DELETE BELOW - WORKING ON CUSTOMIZE COLUMNS
DO NOT DELETE BELOW - WORKING ON CUSTOMIZE COLUMNS
DO NOT DELETE BELOW - WORKING ON CUSTOMIZE COLUMNS
DO NOT DELETE BELOW - WORKING ON CUSTOMIZE COLUMNS
DO NOT DELETE BELOW - WORKING ON CUSTOMIZE COLUMNS


<hr />
        <form id="customize-view-form" class="ms-5 mt-3 mb-4">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="column-id" value="id" checked>
                <label class="form-check-label" for="column-id">ID</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="column-featured" value="featured" checked>
                <label class="form-check-label" for="column-featured">Featured</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="column-country" value="country" checked>
                <label class="form-check-label" for="column-country">Country</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="column-taskmaster" value="taskmaster" checked>
                <label class="form-check-label" for="column-taskmaster">Taskmaster</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="column-assistant" value="assistant" checked>
                <label class="form-check-label" for="column-assistant">Assistant</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="column-series" value="series" checked>
                <label class="form-check-label" for="column-series">Series</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="column-airdate-range" value="airdate-range" checked>
                <label class="form-check-label" for="column-airdate-range">Airdate Range</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="column-version" value="version" checked>
                <label class="form-check-label" for="column-version">Version</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="column-num" value="num" checked>
                <label class="form-check-label" for="column-num">Num</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="column-chair-1" value="chair-1" checked>
                <label class="form-check-label" for="column-chair-1">Chair 1</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="column-chair-2" value="chair-2" checked>
                <label class="form-check-label" for="column-chair-2">Chair 2</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="column-chair-3" value="chair-3" checked>
                <label class="form-check-label" for="column-chair-3">Chair 3</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="column-chair-4" value="chair-4" checked>
                <label class="form-check-label" for="column-chair-4">Chair 4</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="column-chair-5" value="chair-5" checked>
                <label class="form-check-label" for="column-chair-5">Chair 5</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="column-score-chair-1" value="score-chair-1" checked>
                <label class="form-check-label" for="column-score-chair-1">Score Chair 1</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="column-score-chair-2" value="score-chair-2" checked>
                <label class="form-check-label" for="column-score-chair-2">Score Chair 2</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="column-score-chair-3" value="score-chair-3" checked>
                <label class="form-check-label" for="column-score-chair-3">Score Chair 3</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="column-score-chair-4" value="score-chair-4" checked>
                <label class="form-check-label" for="column-score-chair-4">Score Chair 4</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="column-score-chair-5" value="score-chair-5" checked>
                <label class="form-check-label" for="column-score-chair-5">Score Chair 5</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="column-champion" value="champion" checked>
                <label class="form-check-label" for="column-champion">Champion</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="column-series-note" value="series-note" checked>
                <label class="form-check-label" for="column-series-note">Series Note</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="column-champ-score" value="champ-score" checked>
                <label class="form-check-label" for="column-champ-score">Champ Score</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="column-actions" value="actions" checked>
                <label class="form-check-label" for="column-actions">Actions</label>
            </div>
            <button type="button" id="customize-view-btn" class="btn btn-primary">Customize View</button>
        </form>

DO NOT DELETE ABOVE - WORKING ON CUSTOMIZE COLUMNS
DO NOT DELETE ABOVE - WORKING ON CUSTOMIZE COLUMNS
DO NOT DELETE ABOVE - WORKING ON CUSTOMIZE COLUMNS
DO NOT DELETE ABOVE - WORKING ON CUSTOMIZE COLUMNS
DO NOT DELETE ABOVE - WORKING ON CUSTOMIZE COLUMNS
DO NOT DELETE ABOVE - WORKING ON CUSTOMIZE COLUMNS
DO NOT DELETE ABOVE - WORKING ON CUSTOMIZE COLUMNS



      -->



        <div class="table-responsive">
              <table id="series-table" class="table table-bordered tablesorter">

                  <thead>
                      <tr>
                        <th class="column-id">ID</th>
                          <th class="column-featured">Featured</th>
                          <th class="column-country">Country</th>
                          <th class="column-taskmaster">Taskmaster</th>
                          <th class="column-assistant">Assistant</th>
                          <th class="column-series">Series</th>
                          <th class="column-airdate-range">Airdate Range</th>
                          <th class="column-version">Version</th>
                          <th class="column-num">Num</th>
                          <th class="column-chair-1">Chair 1</th>
                          <th class="column-chair-2">Chair 2</th>
                          <th class="column-chair-3">Chair 3</th>
                          <th class="column-chair-4">Chair 4</th>
                          <th class="column-chair-5">Chair 5</th>
                          <th class="column-score-chair-1">Score Chair 1</th>
                          <th class="column-score-chair-2">Score Chair 2</th>
                          <th class="column-score-chair-3">Score Chair 3</th>
                          <th class="column-score-chair-4">Score Chair 4</th>
                          <th class="column-score-chair-5">Score Chair 5</th>
                          <th class="column-champion">Champion</th>
                          <th class="column-series-note">Series Note</th>
                          <th class="column-champ-score">Champ Score</th>
                          <th>Action</th>

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
                    echo "<td class='column-id' contenteditable='false' data-field='id'>{$row['id']}</td>";
                    echo "<td class='column-featured' contenteditable='true' data-field='featured'>{$row['featured']}</td>";
                    echo "<td class='column-country' contenteditable='true' data-field='country'>{$row['country']}</td>";
                    echo "<td class='column-taskmaster' contenteditable='true' data-field='taskmaster'>{$row['taskmaster']}</td>";
                    echo "<td class='column-assistant' contenteditable='true' data-field='assistant'>{$row['assistant']}</td>";
                    echo "<td class='column-series' contenteditable='true' data-field='series'>{$row['series']}</td>";
                    echo "<td class='column-airdate_range' contenteditable='true' data-field='airdate_range'>{$row['airdate_range']}</td>";
                    echo "<td class='column-version' contenteditable='true' data-field='version'>{$row['version']}</td>";
                    echo "<td class='column-num' contenteditable='true' data-field='num'>{$row['num']}</td>";
                    echo "<td class='column-chair_1' contenteditable='true' data-field='chair_1'>{$row['chair_1']}</td>";
                    echo "<td class='column-chair_2' contenteditable='true' data-field='chair_2'>{$row['chair_2']}</td>";
                    echo "<td class='column-chair_3' contenteditable='true' data-field='chair_3'>{$row['chair_3']}</td>";
                    echo "<td class='column-chair_4' contenteditable='true' data-field='chair_4'>{$row['chair_4']}</td>";
                    echo "<td class='column-chair_5' contenteditable='true' data-field='chair_5'>{$row['chair_5']}</td>";
                    echo "<td class='column-score_chair_1' contenteditable='true' data-field='score_chair_1'>{$row['score_chair_1']}</td>";
                    echo "<td class='column-score_chair_2' contenteditable='true' data-field='score_chair_2'>{$row['score_chair_2']}</td>";
                    echo "<td class='column-score_chair_3' contenteditable='true' data-field='score_chair_3'>{$row['score_chair_3']}</td>";
                    echo "<td class='column-score_chair_4' contenteditable='true' data-field='score_chair_4'>{$row['score_chair_4']}</td>";
                    echo "<td class='column-score_chair_5' contenteditable='true' data-field='score_chair_5'>{$row['score_chair_5']}</td>";
                    echo "<td class='column-champion' contenteditable='true' data-field='champion'>{$row['champion']}</td>";
                    echo "<td class='column-series_note' contenteditable='true' data-field='series_note'>{$row['series_note']}</td>";
                    echo "<td class='column-champ_score'>{$maxScore}</td>";
                    echo "<td><button class='btn btn-primary save-row-btn'>Save</button></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='23'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>

</div>






<!-- Bootstrap Modal for confirming the addition of a new row -->
<!-- <div class="modal fade" id="addRowModal" tabindex="-1" aria-labelledby="addRowModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addRowModalLabel">Confirm Add New Row</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to add this new row?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" id="confirm-add-row" class="btn btn-primary">Confirm</button>
      </div>
    </div>
  </div>
</div> -->





</div>


<script>
$(document).ready(function() {
    // Handle Customize View button click
    $('#customize-view-btn').on('click', function() {
        // Hide all columns first
        $('#series-table th, #series-table td').hide();

        // Show columns based on selected checkboxes
        $('#customize-view-form input:checked').each(function() {
            var columnClass = '.column-' + $(this).val().toLowerCase().replace(/\s+/g, '_');
            $('#series-table th' + columnClass + ', #series-table td' + columnClass).show();
        });
    });

    // TableSorter script
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
            14: { sorter: 'digit' },
            15: { sorter: 'digit' },
            16: { sorter: 'digit' },
            17: { sorter: 'digit' },
            18: { sorter: 'digit' },
            19: { sorter: false },
            20: { sorter: false },
            21: { sorter: 'digit' }
        },
        sortList: [[0, 1]]
    });

    // Add New Row Script
    var newRowTemplate = `
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
            <td contenteditable="false"><button class='btn btn-primary save-row-btn'>Save</button></td>
        </tr>
    `;



  // Handle data submission for new row
  // $(document).on('click', '.add-row-btn', function() {
  //   $('#add-row-btn').on('click', function() {
  //
  //   });
  //
  //       var row = $(newRowTemplate);
  //       var data = {};
  //
  //       row.find('td[data-field]').each(function() {
  //           var field = $(this).data('field');
  //           var value = $(this).text();
  //           data[field] = value;
  //       });
  //
  //       $.ajax({
  //           url: 'add_series.php',
  //           method: 'POST',
  //           data: { data: data },
  //           success: function(response) {
  //               alert('Row added successfully');
  //               location.reload(); // Reload to show the new row with proper ID
  //           },
  //           error: function() {
  //               alert('Error adding row');
  //           }
  //       });
  //   });




  // Handle data submission for new row
$('#add-row-btn').on('click', function() {
    var row = $(newRowTemplate); // Ensure newRowTemplate is defined
    var data = {};

    row.find('td[data-field]').each(function() {
        var field = $(this).data('field');
        var value = $(this).text();
        data[field] = value;
    });

    $.ajax({
        url: 'add_series.php',
        method: 'POST',
        data: { data: data },
        success: function(response) {
            alert('Row added successfully');
            location.reload(); // Reload to show the new row with proper ID
        },
        error: function() {
            alert('Error adding row');
        }
    });
});















    // Handle Save Update Row button click
    $(document).on('click', '.save-row-btn', function() {
        var row = $(this).closest('tr');
        var rowData = { id: row.data('id') };

        row.find('[contenteditable=true]').each(function() {
            var field = $(this).data('field');
            var value = $(this).text();
            rowData[field] = value;
        });

        $.ajax({
            url: 'update_series.php',
            type: 'POST',
            data: { data: JSON.stringify([rowData]) }, // Send only this row's data
            success: function(response) {
                alert('Row updated successfully.');
                location.reload(); // Reload to show the updated changes
            },
            error: function(xhr, status, error) {
                alert('An error occurred while updating the row.');
            }
        });
    });




});

</script>




</body>
</html>
