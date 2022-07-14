<?php
//session_start();
include("newnavbar.php");
// include("sidenavEmpsal.php");
@$msg = @$_GET["msg"];
if (isset($msg)) {
?><script>
        alert("<?php echo $msg; ?>");
    </script><?php
            }
$email=$_SESSION["Eemail"];
$id="";
  $showquery = "SELECT * FROM employee where email='$email'";
  $result = mysqli_query($conn, $showquery);

  if (mysqli_num_rows($result) > 0) {
       if ($row = mysqli_fetch_assoc($result)) {
           $id=$row["id"];
       }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary And Banefits</title>
    <link rel="stylesheet" href="ansronewebsite/salarycss.css">
    <link rel="stylesheet" href="ansronewebsite/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@200&family=Lato:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    
  
<?php
  $showquery = "SELECT * FROM salary where emp_id='$id'";
  $result = mysqli_query($conn, $showquery);

  if (mysqli_num_rows($result) > 0) {
      // output data of each row
  ?><br>
      <table class="table table-responsive" >
         
      
      <?php
      while ($row = mysqli_fetch_assoc($result)) {

      ?>
    <div class="salarybox">
        <div class="tribox1"><img src="Rectangle826.png" alt=""></div>
        <div class="tribox2"><img src="Rectangle826.png" alt=""></div>
        <div class="sdiv1">Salary and Benefits</div>
            <div class="evdiv2 ev21">Base Salary:</div>
            <div class="evdiv2 ev22">First Festival Bonus:</div>
            <div class="evdiv2 ev23">Second Festival Bonus:</div>
            <div class="evdiv2 ev24">Yearly Bonus:</div>
            <div class="evdiv2 ev25">Perfermance Bonus:</div>
            <div class="evdiv3 ev31"><?php echo $row["base_salary"]; ?></div>
            <div class="evdiv3 ev32"><?php echo $row["one"]; ?></div>
            <div class="evdiv3 ev33"><?php echo $row["two"]; ?> </div>
            <div class="evdiv3 ev34"><?php echo $row["yearly_bonus"]; ?></div>
            <div class="evdiv3 ev35"><?php echo $row["perf_bonus"]; ?></div>

            <?php
      }
  } else {
      echo "0 results";    
  }

  
?>
            <div class="sdiv2"><img src="Rectangle816.png" alt=""></div>
            <div class="sdiv3">Adam Huson</div>
            <!-- <div class="sdiv4"></div>
            <div class="sdiv5"></div> -->
    </div>

</body>
</html>