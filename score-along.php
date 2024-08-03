<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taskmaster: What if? - Score Along at Home!</title>

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


<?php
require "config.php";

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


// NOW query the series for contestants

  $result1 = mysqli_query($conn,"SELECT * FROM series WHERE series = '$series' AND country LIKE '%$country%' LIMIT 1");

  while($row1 = mysqli_fetch_assoc($result1))

  {
  $chair_1 = $row1['chair_1'];
  $chair_2 = $row1['chair_2'];
  $chair_3 = $row1['chair_3'];
  $chair_4 = $row1['chair_4'];
  $chair_5 = $row1['chair_5'];
  $taskmaster = $row1['taskmaster'];
  $assistant = $row1['assistant'];

//  echo "<p style='text-align:center;margin-top:10px;font-size:14px;background-color: #9ACEEB;'>Contestants: " . $chair_1 . ", " . $chair_2 . ", " . $chair_3 . ", " . $chair_4 . ", and " . $chair_5 . "</p>";
  }

?>

<div class="container mt-5">

        <div class="col-md-12 p-2 mt-5 mb-5 bg-info bg-gradient">

    <?php include "nav-project.php"; ?>






    <h2 class="ms-5 mt-5 mb-2">What if? - Score Along at Home!</h2>
    <p class="ms-5 me-5 mb-2">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>


    <div class="col-12 mt-3 mb-4 pt-3 pb-2 text-center text-dark bg-light">
      <p class="fs-3">
          <?php echo $country; ?> Series: <?php echo $series; ?>, Episode: <?php echo $episode; ?>, "<?php echo $ep_title; ?>"
      </p>
      <p class="fs-5">
          Contestants:
          <?php echo $chair_1; ?>, <?php echo $chair_2; ?>, <?php echo $chair_3; ?>, <?php echo $chair_4; ?>, and <?php echo $chair_5; ?>
      </p>
      <p class="fs-5">
          Taskmaster & Assistant:
          <?php echo $taskmaster; ?> and <?php echo $assistant; ?>

      </p>
    </div>

  <form>
<!-- ROW FOR CHAIRS -->
<div class="form-row">
<table>

<tr>
  <td>
    <p style='text-align:center;'>Contestants</p>
  </td>
<td>
  <p style='text-align:center;'><b><?php echo $chair_1; ?></b></p>
</td>
<td>
  <p style='text-align:center;'><b><?php echo $chair_2; ?></b></p>
</td>
<td>
  <p style='text-align:center;'><b><?php echo $chair_3; ?></b></p>
</td>
<td>
  <p style='text-align:center;'><b><?php echo $chair_4; ?></b></p>
</td>
<td>
  <p style='text-align:center;'><b><?php echo $chair_5; ?></b></p>
</td>
</tr>

                      <tr>
                        <td>
                          <p style='text-align:center;'>Score Thus Far (Optional)</p>
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair1_STF" oninput="updateSum1()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair2_STF" oninput="updateSum2()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair3_STF" oninput="updateSum3()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair4_STF" oninput="updateSum4()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair5_STF" oninput="updateSum5()">
                        </td>
                      </tr>

                      <tr>
                        <td>
                          <p style='text-align:center;'>Task 1 (Prize)</p>
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair1_task1" oninput="updateSum1()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair2_task1" oninput="updateSum2()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair3_task1" oninput="updateSum3()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair4_task1" oninput="updateSum4()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair5_task1" oninput="updateSum5()">
                        </td>
                      </tr>


                      <tr>
                        <td>
                          <p style='text-align:center;'>Task 2</p>
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair1_task2" oninput="updateSum1()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair2_task2" oninput="updateSum2()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair3_task2" oninput="updateSum3()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair4_task2" oninput="updateSum4()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair5_task2" oninput="updateSum5()">
                        </td>
                      </tr>


                      <tr>
                        <td>
                          <p style='text-align:center;'>Task 3</p>
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair1_task3" oninput="updateSum1()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair2_task3" oninput="updateSum2()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair3_task3" oninput="updateSum3()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair4_task3" oninput="updateSum4()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair5_task3" oninput="updateSum5()">
                        </td>
                      </tr>


                      <tr>
                        <td>
                          <p style='text-align:center;'>Task 4</p>
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair1_task4" oninput="updateSum1()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair2_task4" oninput="updateSum2()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair3_task4" oninput="updateSum3()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair4_task4" oninput="updateSum4()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair5_task4" oninput="updateSum5()">
                        </td>
                      </tr>


                      <tr>
                        <td>
                          <p style='text-align:center;'>Task 5 (Live)</p>
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair1_task5" oninput="updateSum1()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair2_task5" oninput="updateSum2()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair3_task5" oninput="updateSum3()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair4_task5" oninput="updateSum4()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair5_task5" oninput="updateSum5()">
                        </td>
                      </tr>


                      <tr>
                        <td>
                          <p style='text-align:center;'>Task 6 (Opt. Solo)</p>
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair1_task6" oninput="updateSum1()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair2_task6" oninput="updateSum2()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair3_task6" oninput="updateSum3()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair4_task6" oninput="updateSum4()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair5_task6" oninput="updateSum5()">
                        </td>
                      </tr>


                      <tr>
                        <td>
                          <p style='text-align:center;'>Task 7 (Opt. Tiebreak)</p>
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair1_task7" oninput="updateSum1()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair2_task7" oninput="updateSum2()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair3_task7" oninput="updateSum3()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair4_task7" oninput="updateSum4()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair5_task7" oninput="updateSum5()">
                        </td>
                      </tr>


                      <tr>
                        <td>
                          <p style='text-align:center;'>Task 8 (Opt. Just in Case)</p>
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair1_task8" oninput="updateSum1()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair2_task8" oninput="updateSum2()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair3_task8" oninput="updateSum3()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair4_task8" oninput="updateSum4()">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair5_task8" oninput="updateSum5()">
                        </td>
                      </tr>


                      <tr>
                        <td>
                          <p style='text-align:center;'><b>Running Totals</b></p>
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair1total" readonly>
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair2total" readonly>
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair3total" readonly>
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair4total" readonly>
                        </td>
                        <td>
                          <input type="text" class="form-control" id="chair5total" readonly>
                        </td>
                      </tr>
</table>


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



    </div>
  </div>
</div>

</body>
</html>
