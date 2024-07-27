<!DOCTYPE html>
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
require "config.php";

?>

<!-- container  -->

<div class="container">

<?php

  $country= 'UK';
  $series= '16';
    $episode= '1';

  // $country= $_GET['country'];
  // $series= $_GET['series'];
  //$episode= $_GET['episode'];


//QUERY THE episodes for ep_title

  $result2 = mysqli_query($conn,"SELECT * FROM episodes WHERE country = '$country' AND series LIKE '$series' AND episode LIKE '$episode'");
  $num_rows = mysqli_num_rows($result2);

          // If results are zero go back to index and die
          if(!$num_rows){
            //header( "Location: windex.php" );
            die;
          }

          // If results are one or more display with table
          else
          {

                  while($row = mysqli_fetch_assoc($result2))

                    {
                    $ep_title = $row['ep_title'];
                    $ep_winner = $row['ep_winner'];
                    }

            }


  echo "<h1 style='margin-top:20px;'><a href='index.php'>Taskmaster Leaderboards</a></h1>";
  echo "<h2 style='margin-top:6px;'>$country Series: $series, Episode: $episode, $ep_title</h2>";

// NOW query the series for contestants

  $result1 = mysqli_query($conn,"SELECT * FROM series WHERE series = '$series' AND country LIKE '%$country%' LIMIT 1");

  while($row1 = mysqli_fetch_assoc($result1))

  {
  $chair_1 = $row1['chair_1'];
  $chair_2 = $row1['chair_2'];
  $chair_3 = $row1['chair_3'];
  $chair_4 = $row1['chair_4'];
  $chair_5 = $row1['chair_5'];

  echo "<p style='text-align:center;margin-top:10px;font-size:14px;background-color: #9ACEEB;'>Contestants: " . $chair_1 . ", " . $chair_2 . ", " . $chair_3 . ", " . $chair_4 . ", and " . $chair_5 . "</p>";
  }

?>



    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5" style='margin-bottom:20px;'>Score Along at Home!</h2>

                      <form>
                        <!-- ROW FOR CHAIRS -->
                        <div class="form-row">
                          <div class="col-3">
                            Contestants
                          </div>
                          <div class="col">
                            <p style='text-align:center;'><?php echo $chair_1; ?></p>
                          </div>
                          <div class="col">
                            <p style='text-align:center;'><?php echo $chair_2; ?></p>
                          </div>
                          <div class="col">
                            <p style='text-align:center;'><?php echo $chair_3; ?></p>
                          </div>
                          <div class="col">
                            <p style='text-align:center;'><?php echo $chair_4; ?></p>
                          </div>
                          <div class="col">
                            <p style='text-align:center;'><?php echo $chair_5; ?></p>
                        </div>
                        </div>



                        <!-- ROW FOR Score Thus Far-->
                        <div class="form-row">
                          <div class="col-3">
                            Score Thus Far (Optional)
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair1_STF" oninput="updateSum1()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair2_STF" oninput="updateSum2()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair3_STF" oninput="updateSum3()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair4_STF" oninput="updateSum4()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair5_STF" oninput="updateSum5()">
                        </div>
                        </div>




                        <!-- ROW FOR TASK 1 PRIZE-->
                        <div class="form-row">
                          <div class="col-3">
                            Task 1 (Prize)
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair1_task1" oninput="updateSum1()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair2_task1" oninput="updateSum2()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair3_task1" oninput="updateSum3()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair4_task1" oninput="updateSum4()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair5_task1" oninput="updateSum5()">
                        </div>
                        </div>

                        <!-- ROW FOR TASK 2 -->
                        <div class="form-row">
                          <div class="col-3">
                            Task
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair1_task2" oninput="updateSum1()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair2_task2" oninput="updateSum2()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair3_task2" oninput="updateSum3()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair4_task2" oninput="updateSum4()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair5_task2" oninput="updateSum5()">
                        </div>
                        </div>

                        <!-- ROW FOR TASK 3 -->
                        <div class="form-row">
                          <div class="col-3">
                            Task
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair1_task3" oninput="updateSum1()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair2_task3" oninput="updateSum2()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair3_task3" oninput="updateSum3()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair4_task3" oninput="updateSum4()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair5_task3" oninput="updateSum5()">
                        </div>
                        </div>


                        <!-- ROW FOR TASK 4 -->
                        <div class="form-row">
                          <div class="col-3">
                            Task
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair1_task4" oninput="updateSum1()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair2_task4" oninput="updateSum2()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair3_task4" oninput="updateSum3()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair4_task4" oninput="updateSum4()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair5_task4" oninput="updateSum5()">
                        </div>
                        </div>


                        <!-- ROW FOR TASK 5 LIVE TASK -->
                        <div class="form-row">
                          <div class="col-3">
                            Task (Live)
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair1_task5" oninput="updateSum1()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair2_task5" oninput="updateSum2()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair3_task5" oninput="updateSum3()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair4_task5" oninput="updateSum4()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair5_task5" oninput="updateSum5()">
                        </div>
                        </div>


                        <!-- TASK 6 ROW FOR SPECIAL SINGLED OUT TASK -->
                        <div class="form-row">
                          <div class="col-3">
                            Task (Opt. Solo)
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair1_task6" oninput="updateSum1()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair2_task6" oninput="updateSum2()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair3_task6" oninput="updateSum3()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair4_task6" oninput="updateSum4()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair5_task6" oninput="updateSum5()">
                        </div>
                        </div>


                        <!-- TASK 7 ROW FOR TIEBREAK -->
                        <div class="form-row">
                          <div class="col-3">
                            Task (Opt. Tiebreak)
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair1_task7" oninput="updateSum1()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair2_task7" oninput="updateSum2()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair3_task7" oninput="updateSum3()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair4_task7" oninput="updateSum4()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair5_task7" oninput="updateSum5()">
                        </div>
                        </div>

                        <!-- TASK 8 ROW FOR SPECIAL OTHER -->
                        <div class="form-row">
                          <div class="col-3">
                            Task (Opt. Just in Case)
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair1_task8" oninput="updateSum1()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair2_task8" oninput="updateSum2()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair3_task8" oninput="updateSum3()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair4_task8" oninput="updateSum4()">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair5_task8" oninput="updateSum5()">
                        </div>
                        </div>



                        <!-- ROW FOR EPISODE TOTALS -->
                        <div class="form-row">
                          <div class="col-3">
                            Totals
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair1total" readonly>
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair2total" readonly>
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair3total" readonly>
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair4total" readonly>
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="chair5total" readonly>
                        </div>
                        </div>



                        <!-- MATHS -->

                        <!-- Chair 1 Math -->
                        <script>
                        function updateSum1() {
                          let chair1_STF = document.getElementById("chair1_STF").value;
                          let chair1_task1 = document.getElementById("chair1_task1").value;
                          let chair1_task2 = document.getElementById("chair1_task2").value;
                          let chair1_task3 = document.getElementById("chair1_task3").value;
                          let chair1_task4 = document.getElementById("chair1_task4").value;
                          let chair1_task5 = document.getElementById("chair1_task5").value;
                          let chair1_task6 = document.getElementById("chair1_task6").value;
                          let chair1_task7 = document.getElementById("chair1_task7").value;
                          let chair1_task8 = document.getElementById("chair1_task8").value;
                          let sum1 = Number(chair1_STF) + Number(chair1_task1) + Number(chair1_task2) + Number(chair1_task3) + Number(chair1_task4) + Number(chair1_task5) + Number(chair1_task6) + Number(chair1_task7) + Number(chair1_task8);
                          document.getElementById("chair1total").value = sum1;
                        }
                        </script>

                        <!-- Chair 2 Math -->
                        <script>
                        function updateSum2() {
                          let chair2_STF = document.getElementById("chair2_STF").value;
                          let chair2_task1 = document.getElementById("chair2_task1").value;
                          let chair2_task2 = document.getElementById("chair2_task2").value;
                          let chair2_task3 = document.getElementById("chair2_task3").value;
                          let chair2_task4 = document.getElementById("chair2_task4").value;
                          let chair2_task5 = document.getElementById("chair2_task5").value;
                          let chair2_task6 = document.getElementById("chair2_task6").value;
                          let chair2_task7 = document.getElementById("chair2_task7").value;
                          let chair2_task8 = document.getElementById("chair2_task8").value;
                          let sum2 = Number(chair2_STF) + Number(chair2_task1) + Number(chair2_task2) + Number(chair2_task3) + Number(chair2_task4) + Number(chair2_task5) + Number(chair2_task6) + Number(chair2_task7) + Number(chair2_task8);
                          document.getElementById("chair2total").value = sum2;
                        }
                        </script>

                        <!-- Chair 3 Math -->
                        <script>
                        function updateSum3() {
                          let chair3_STF = document.getElementById("chair3_STF").value;
                          let chair3_task1 = document.getElementById("chair3_task1").value;
                          let chair3_task2 = document.getElementById("chair3_task2").value;
                          let chair3_task3 = document.getElementById("chair3_task3").value;
                          let chair3_task4 = document.getElementById("chair3_task4").value;
                          let chair3_task5 = document.getElementById("chair3_task5").value;
                          let chair3_task6 = document.getElementById("chair3_task6").value;
                          let chair3_task7 = document.getElementById("chair3_task7").value;
                          let chair3_task8 = document.getElementById("chair3_task8").value;
                          let sum3 = Number(chair3_STF) + Number(chair3_task1) + Number(chair3_task2) + Number(chair3_task3) + Number(chair3_task4) + Number(chair3_task5) + Number(chair3_task6) + Number(chair3_task7) + Number(chair3_task8);
                          document.getElementById("chair3total").value = sum3;
                        }
                        </script>

                        <!-- Chair 4 Math -->
                        <script>
                        function updateSum4() {
                          let chair4_STF = document.getElementById("chair4_STF").value;
                          let chair4_task1 = document.getElementById("chair4_task1").value;
                          let chair4_task2 = document.getElementById("chair4_task2").value;
                          let chair4_task3 = document.getElementById("chair4_task3").value;
                          let chair4_task4 = document.getElementById("chair4_task4").value;
                          let chair4_task5 = document.getElementById("chair4_task5").value;
                          let chair4_task6 = document.getElementById("chair4_task6").value;
                          let chair4_task7 = document.getElementById("chair4_task7").value;
                          let chair4_task8 = document.getElementById("chair4_task8").value;
                          let sum4 = Number(chair4_STF) + Number(chair4_task1) + Number(chair4_task2) + Number(chair4_task3) + Number(chair4_task4) + Number(chair4_task5) + Number(chair4_task6) + Number(chair4_task7) + Number(chair4_task8);
                          document.getElementById("chair4total").value = sum4;
                        }
                        </script>

                        <!-- Chair 5 Math -->
                        <script>
                        function updateSum5() {
                          let chair5_STF = document.getElementById("chair5_STF").value;
                          let chair5_task1 = document.getElementById("chair5_task1").value;
                          let chair5_task2 = document.getElementById("chair5_task2").value;
                          let chair5_task3 = document.getElementById("chair5_task3").value;
                          let chair5_task4 = document.getElementById("chair5_task4").value;
                          let chair5_task5 = document.getElementById("chair5_task5").value;
                          let chair5_task6 = document.getElementById("chair5_task6").value;
                          let chair5_task7 = document.getElementById("chair5_task7").value;
                          let chair5_task8 = document.getElementById("chair5_task8").value;
                          let sum5 = Number(chair5_STF) + Number(chair5_task1) + Number(chair5_task2) + Number(chair5_task3) + Number(chair5_task4) + Number(chair5_task5) + Number(chair5_task6) + Number(chair5_task7) + Number(chair5_task8);
                          document.getElementById("chair5total").value = sum5;
                        }
                        </script>


</form>


<!-- form div closers -->

    </div>
        </div>
            </div>
                </div>

<!-- my container closer -->
    </div>


</body>
</html>
