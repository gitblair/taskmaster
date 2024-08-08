<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taskmaster: Leaderboards</title>

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

        <h2 class="ms-5 mt-5 mb-2">Taskmaster: Leaderboards</h2>
        <p class="ms-5 me-5 mb-2">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>

<hr />







<!-- NEW SQL -->
<?php


function getOrderedScoresByCountryVersion($conn, $country, $version, $order = 'DESC') {
    // Determine the ordering function based on the desired order
    $orderFunction = $order === 'ASC' ? 'LEAST' : 'GREATEST';

    $sql = "
    SELECT series,
        series_note,
        $orderFunction(score_chair_1, score_chair_2, score_chair_3, score_chair_4, score_chair_5) AS max_score,
        CASE
            WHEN score_chair_1 = $orderFunction(score_chair_1, score_chair_2, score_chair_3, score_chair_4, score_chair_5) THEN chair_1
            WHEN score_chair_2 = $orderFunction(score_chair_1, score_chair_2, score_chair_3, score_chair_4, score_chair_5) THEN chair_2
            WHEN score_chair_3 = $orderFunction(score_chair_1, score_chair_2, score_chair_3, score_chair_4, score_chair_5) THEN chair_3
            WHEN score_chair_4 = $orderFunction(score_chair_1, score_chair_2, score_chair_3, score_chair_4, score_chair_5) THEN chair_4
            WHEN score_chair_5 = $orderFunction(score_chair_1, score_chair_2, score_chair_3, score_chair_4, score_chair_5) THEN chair_5
        END AS contestant_name
    FROM series
    WHERE country = ? AND version = ?
    ORDER BY max_score $order
    LIMIT 10";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $country, $version);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $counter = 1; // Initialize counter
        // Output the top 10 scores, contestant names, and series
        while($row = $result->fetch_assoc()) {
            // Check if series_note contains any text
            $tooltip = !empty($row['series_note']) ?
                '<div class="tooltip-container">
                    <i class="fa fa-umbrella"></i>
                    <div class="tooltip-text">' . htmlspecialchars($row['series_note'], ENT_QUOTES, 'UTF-8') . '</div>
                </div>' : '';
            echo $counter . ". " . $row['contestant_name'] . " - " . $row['max_score'] . " - Series: " . $row['series'] . " " . $tooltip . "<br>";
            $counter++; // Increment counter
        }
    } else {
        echo "0 results";
    }

    $stmt->close();
}

// Example usage
//getOrderedScoresByCountryVersion($conn, 'UK', 'Regular Series', 'DESC'); // Greatest scores
//getOrderedScoresByCountryVersion($conn, 'AU', 'Regular Series', 'ASC');  // Lowest scores


?>





<!-- MY NEW -->
<div class="table-responsive mt-3">
  <table id="series-table" class="table table-bordered border-dark">



<!-- TOP SCORES - REGULAR SERIES -->
    <thead>
      <tr>
        <td class="col text-center mt-1 mb-1 bg-warning bg-gradient">
            Top 10 Highest Score UK
        </td>
        <td class="col text-center mt-1 mb-1 bg-warning bg-gradient">
            Top 10 Highest Score AU
        </td>
        <td class="col text-center mt-1 mb-1 bg-warning bg-gradient">
            Top 10 Highest Score NZ
        </td>
      </tr>
    </thead>
<tbody>

  <tr>
    <td class="col ps-5 mt-1 mb-1 bg-light bg-gradient">
      <?php getOrderedScoresByCountryVersion($conn, 'UK', 'Regular Series', 'DESC'); // Greatest scores ?>
    </td>
    <td class="col ps-5 mt-1 mb-1 bg-light bg-gradient">
      <?php getOrderedScoresByCountryVersion($conn, 'AU', 'Regular Series', 'DESC'); // Greatest scores ?>
    </td>
    <td class="col ps-5 mt-1 mb-1 bg-light bg-gradient">
      <?php getOrderedScoresByCountryVersion($conn, 'NZ', 'Regular Series', 'DESC'); // Greatest scores ?>
    </td>
  </tr>


  <!-- LOWEST SCORES - REGULAR SERIES -->
      <thead>
        <tr>
          <td class="col text-center mt-1 mb-1 bg-warning bg-gradient">
              Top 10 Lowest Score UK
          </td>
          <td class="col text-center mt-1 mb-1 bg-warning bg-gradient">
              Top 10 Lowest Score AU
          </td>
          <td class="col text-center mt-1 mb-1 bg-warning bg-gradient">
              Top 10 Lowest Score NZ
          </td>
        </tr>
      </thead>
  <tbody>

    <tr>
      <td class="col ps-5 mt-1 mb-1 bg-light bg-gradient">
        <?php getOrderedScoresByCountryVersion($conn, 'UK', 'Regular Series', 'ASC'); // Greatest scores ?>
      </td>
      <td class="col ps-5 mt-1 mb-1 bg-light bg-gradient">
        <?php getOrderedScoresByCountryVersion($conn, 'AU', 'Regular Series', 'ASC'); // Greatest scores ?>
      </td>
      <td class="col ps-5 mt-1 mb-1 bg-light bg-gradient">
        <?php getOrderedScoresByCountryVersion($conn, 'NZ', 'Regular Series', 'ASC'); // Greatest scores ?>
      </td>
    </tr>








    <!-- TOP SCORES - Champion of Champions & New Years Treat -->
        <thead>
          <tr>
            <td class="col text-center mt-1 mb-1 bg-warning bg-gradient">
                Top Scores UK Champion of Champions
            </td>
            <td class="col text-center mt-1 mb-1 bg-warning bg-gradient">
                Top Scores UK New Years Treat
            </td>
            <td class="col text-center mt-1 mb-1 bg-warning bg-gradient">

            </td>
          </tr>
        </thead>
    <tbody>

      <tr>
        <td class="col ps-5 mt-1 mb-1 bg-light bg-gradient">
          <?php getOrderedScoresByCountryVersion($conn, 'UK', 'Champion of Champions', 'DESC'); // Greatest scores ?>
        </td>
        <td class="col ps-5 mt-1 mb-1 bg-light bg-gradient">
          <?php getOrderedScoresByCountryVersion($conn, 'UK', 'New Years Treat', 'DESC'); // Greatest scores ?>
        </td>
        <td class="col ps-5 mt-1 mb-1 bg-light bg-gradient">

        </td>
      </tr>















</tbody>
</table>
</div>
<!-- MY NEW -->











<?php mysqli_close($conn); ?>


<!-- end container -->
</div>







</body>
</html>
