<!DOCTYPE html>
<?php
//
// Author: c. blair 2022 revised 2023, 2024.
//
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Taskmaster Contestants and Episodes - Score Along At Home">
    <title>Taskmaster Leaderboards</title>
    <meta name="robots" content="index,follow">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- personal styles -->
    <link rel="stylesheet" href="styles.css">
</head>

  <body>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

<?php
require "db.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$con=mysqli_connect($host, $username, $password, $dbname);
// Check connection

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>

<!-- container  -->

<div class="container">

<?php

// Test
//$country= 'UK';
//$series= '16';

$country= $_GET['country'];
$series= $_GET['series'];

  echo "<h1 style='margin-top:20px;'><a href='index.php'>Taskmaster Leaderboards</a></h1>";
  echo "<h2 style='margin-top:6px;'>$country Series: $series</h2>";

?>

<table border='1' style='width:100%;table-layout: fixed;'>

<?php

  $result1 = mysqli_query($con,"SELECT * FROM series WHERE series = '$series' AND country LIKE '%$country%' LIMIT 1");

  while($row1 = mysqli_fetch_assoc($result1))

  {
  $id = $row1['id'];
  $airdate_range = $row1['airdate_range'];
  $chair_1 = $row1['chair_1'];
  $chair_2 = $row1['chair_2'];
  $chair_3 = $row1['chair_3'];
  $chair_4 = $row1['chair_4'];
  $chair_5 = $row1['chair_5'];
  $champion = $row1['champion'];


  echo "<p style='text-align:center;margin-top:10px;font-size:14px;background-color: #9ACEEB;'>Contestants: " . $chair_1 . ", " . $chair_2 . ", " . $chair_3 . ", " . $chair_4 . ", and " . $chair_5 . "</p>";
  echo "<p style='text-align:center;margin-top:10px;font-size:16px;background-color: gold;'>Champion: <b>$champion</b></p>";

  }

              $result2 = mysqli_query($con,"SELECT * FROM episodes WHERE series = '$series' AND country LIKE '%$country%'");
              $num_rows = mysqli_num_rows($result2);

                      // If results are zero go back to index and die
                      if(!$num_rows){
                        //header( "Location: windex.php" );
                        die;
                      }

                      // If results are one or more display with table
                      else
                      {

                        echo "<tr>";
                        echo "<td width=10%><center><b>Ep</b></center></td>";
                        echo "<td width=50%><center><b>Title</b></center></td>";
                        echo "<td><center><b>Winner</b></center></td>";
                        echo "</tr>";


                              while($row = mysqli_fetch_assoc($result2))

                                {

                                $episode = $row['episode'];
                                $ep_airdate = $row['ep_airdate'];
                                $ep_title = $row['ep_title'];
                                $ep_winner = $row['ep_winner'];


                                echo "<tr>";

                                echo "<td><center><p style='font-size:4vw'><a href='score-along.php?country=$country&series=$series&episode=$episode'>$episode</a></p></center></td>";
                                echo "<td><center>" . $ep_title . "</center></td>";
                                echo "<td><center>" . $ep_winner . "</center></td>";
                                echo "</tr>";



                                }

                        }


echo "</table>";
mysqli_close($con);
?>


<!-- end container -->
</div>

</body>
</html>
