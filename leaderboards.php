<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Taskmaster Contestants and Episodes - Score Along At Home">
    <title>Taskmaster Leaderboards</title>
    <meta name="robots" content="index,follow">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- personal styles -->
    <link rel="stylesheet" href="styles.css">
      </head>
  <body>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>


<?php
require "config.php";
?>

<!-- container  -->

<div class="container">

        <?php include "nav.php"; ?>

    <h1 style='margin-top:20px;'><a href="index.php">Taskmaster Leaderboards</a></h1>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">

    <input type=hidden name="IP" value="REMOTE_ADDR">

    <select name="country" id="country">
            <option value="UK">UK</option>
            <option value="NZ">NZ</option>
            <option value="AU">AU</option>
    </select>

    <select name="version" id="version">
      <option value="All">All</option>
    	<option value="Champion of Champions">Champion of Champions</option>
    	<option value="New Years Treat">New Years Treat</option>
    	<option value="Regular Series">Regular Series</option>
    </select>
    <input type="submit" value="Find">
</form>


<table border='1' style='width:100%;table-layout: fixed;'>


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
              $select = "SELECT * FROM series WHERE country LIKE '%$country%' AND version LIKE '%$searchversion%' ORDER BY id ASC";
              $headline = "<p style='text-align:center;margin-top:10px;font-weight: bold;font-size:16px;background-color: #9ACEEB;'>$country - $version Results</p>";
              }
              else {
              $select = "SELECT * FROM series WHERE featured >0 ORDER BY id ASC";
              $headline = "<p style='text-align:center;margin-top:10px;font-weight: bold;font-size:16px;background-color: #9ACEEB;'>Featured Series</p>";
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

echo "<td><center><p style='font-size:24px'><a href='series.php?series=$series&country=$country'>$country<br />Series $series</a></p>
<p style='font-size:12px'>$airdate_range</p></center></td>";


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


                                echo "<td width=60%>";
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

echo "</table>";

mysqli_close($conn);
?>


<!-- end container -->
</div>

</body>
</html>
