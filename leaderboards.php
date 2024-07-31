

<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taskmaster: Leaderboards</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>




            <!-- Local Style -->
            <link rel="stylesheet" href="styles.css">

            <!-- Table Sorter -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/css/theme.bootstrap_4.min.css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.widgets.min.js"></script>

            <!-- Font Awesome CDN -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="styles.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/css/theme.bootstrap_4.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.widgets.min.js"></script>


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"> -->

</head>



<body>
    <div class="container mt-5">

      <?php include "nav-sitewide.php"; ?>

      <?php require "config.php"; ?>

      <div class="col-md-12 p-4 mt-5">

        <?php include "nav-project.php"; ?>

        <h2 class="mt-3">Taskmaster: Leaderboards</h2>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>






<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">

    <input type=hidden name="IP" value="REMOTE_ADDR">

    <select name="country" id="country">
            <option value="UK">UK</option>
            <option value="NZ">NZ</option>
            <option value="AU">AU</option>
    </select>

    <select name="version" id="version">
      <option value="Regular Series">Regular Series</option>
    	<option value="Champion of Champions">Champion of Champions</option>
    	<option value="New Years Treat">New Years Treat</option>
      <option value="All">All</option>

    </select>
    <input type="submit" value="Find">
</form>








<div class="table-responsive mt-3">
  <table id="series-table" class="table table-bordered">
    <thead>
      <tr>



<?php

// if index sent any query
if (!empty($_POST["country"]))
              {
              $country = $_POST["country"];
              $version = $_POST["version"];
                              if ($version == "All")
                              {$searchversion = "%";}
                              else
                              {$searchversion = $version;}
              $select = "SELECT * FROM series WHERE country LIKE '%$country%' AND version LIKE '%$searchversion%' ORDER BY id DESC";
              $headline = "<th colspan='2' class='text-center fw-bold fs-5 bg-light text-dark pt-2'>$country - $version</th>";
              }
              else {
              //$select = "SELECT * FROM series WHERE featured >0 ORDER BY id DESC";
              $select = "SELECT * FROM series WHERE country LIKE 'UK' AND version LIKE 'Regular Series' ORDER BY id DESC";
              $headline = "<th colspan='2' class='text-center fw-bold fs-5 bg-light text-dark pt-2'>UK - Regular Series</th>";
                }

              //$result = mysqli_query($con,"SELECT * FROM series WHERE country LIKE '%$country%' AND version LIKE '%$version%' ORDER BY id ASC");
              $result = mysqli_query($conn,$select);


              $num_rows = mysqli_num_rows($result);

                      // If results are zero go back to index and die
                      if(!$num_rows){

                        echo "<p style='text-align:center;margin-top:10px;font-weight: bold;font-size:16px;background-color: silver;'>Nothing Found</p>";
                        echo "<p style='text-align:center;'><img src='joe-horses-and-darkness.png' width=96% alt='Nothing found. Image of Joe Wilkerson. Text Horses and Darkness.'></p>";
                        die;
                      }

                      // If results are one or more display with table
                      else
                      {

                        echo $headline;
                                                echo "</td>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";


                              while($row = mysqli_fetch_assoc($result))

                                {

                                //$id = $row['id'];
                                $country = $row['country'];
                                //$taskmaster = $row['taskmaster'];
                                //$assistant = $row['assistant'];
                                $series = $row['series'];
                                $airdate_range = $row['airdate_range'];

                                $chair_1 = $row['chair_1'];
                                $chair_2 = $row['chair_2'];
                                $chair_3 = $row['chair_3'];
                                $chair_4 = $row['chair_4'];
                                $chair_5 = $row['chair_5'];

                                $score_chair_1 = $row['score_chair_1']+0;
                                $score_chair_2 = $row['score_chair_2']+0;
                                $score_chair_3 = $row['score_chair_3']+0;
                                $score_chair_4 = $row['score_chair_4']+0;
                                $score_chair_5 = $row['score_chair_5']+0;

                                $champion = $row['champion'];

                                $version = $row['version'];

                                $series_note = $row['series_note'];


                                echo "<tr>";

// link to series lookup

//echo "<td><center><p style='font-size:24px'><a href='series.php?series=$series&country=$country'>$country<br />Series $series</a></p>
//<p style='font-size:12px'>$airdate_range</p></center></td>";



echo "
<td class='d-flex justify-content-center align-items-center'>
  <div class='text-center'>
    <p style='font-size:24px'>
      <a href='series.php?series=$series&country=$country'>$country<br />Series $series</a>
    </p>
    <p style='font-size:12px'>$airdate_range</p>
  </div>
</td>";




$champ1 = "style='background: blue'";
$champ2 = "style='background: blue'";
$champ3 = "style='background: blue'";
$champ4 = "style='background: blue'";
$champ5 = "style='background: blue'";


if ($chair_1 == $champion)
{$champ1 = "style='background: gold'";}
else
{$champ1 = "style='background: white'";}

if ($chair_2 == $champion)
{$champ2 = "style='background: gold'";}
else
{$champ2 = "style='background: white'";}

if ($chair_3 == $champion)
{$champ3 = "style='background: gold'";}
else
{$champ3 = "style='background: white'";}

if ($chair_4 == $champion)
{$champ4 = "style='background: gold'";}
else
{$champ4 = "style='background: white'";}

if ($chair_5 == $champion)
{$champ5 = "style='background: gold'";}
else
{$champ5 = "style='background: white'";}


                                echo "<td style='width=50%'>";
                                echo "<p $champ1>" . $chair_1 . " [" . $score_chair_1 . "]</p>";
                                echo "<p $champ2>" . $chair_2 . " [" . $score_chair_2 . "]</p>";
                                echo "<p $champ3>" . $chair_3 . " [" . $score_chair_3 . "]</p>";
                                echo "<p $champ4>" . $chair_4 . " [" . $score_chair_4 . "]</p>";
                                echo "<p $champ5>" . $chair_5 . " [" . $score_chair_5 . "]</p>";
                                echo "<p style='text-align:center;margin-top:8px;font-size:12px;'>" . $series_note . "</p>";
                                echo "</td>";
                                echo "</tr>";


                                }

                        }
echo "</tbody>";
echo "</table>";
echo "</div>"; // end table-responsive
mysqli_close($conn);
?>


<!-- end container -->
</div>

</body>
</html>
