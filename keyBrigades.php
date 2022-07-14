<?php
//session_start();
include("navEmployee.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Key Brigades</title>
    <link href="https://fonts.googleapis.com/css?family=Calistoga|Gelasio|Russo+One&display=swap" rel="stylesheet">
</head>
  <style>
    @import url('https://fonts.googleapis.com/css?family=Numans');

       .div1 {
          
  border: double;
}
    </style>
<body style=" background: #D7D7D8">
    
<div class="container" >
       <br>



       
<section class="text-gray-700 body-font"><br>
  <div class="container py-18 mx-auto div1" style="text-align: center;">
 
     <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900" style="text-align:center">Key-Brigades</h1><br> 
     <table class="table table-responsive">
     <?php
  $showquery = "SELECT * FROM key_brigades order by id";
  $result = mysqli_query($conn, $showquery);

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      ?>
    <div class="lg:w-full flex flex-col sm:flex-row sm:items-center items-start mx-auto">
       <tr>
        <td><img src="<?php echo $row["img"]; ?>" alt="" height="150px" width="150px"></td>
        <td><?php echo "<b>Name: </b>"."<br>"."<b>Position: </b>"."<br>".
      "<b>Department: </b>"."<br>"."<b>Mobile: </b>"."<br>"."<b>Email id: </b>"."<br>".
      "<b>Who we are: </b>";?></td>
      <td><p class="flex-grow    text-gray-900" ><?php echo $row["name"]."<br>".$row["position"]."<br>".
     $row["department"]."<br>".$row["mobile"]."<br>".$row["email"]."<br>".$row["who_we_are"];?></p></td>
     </tr>
    </div>
    <?php
      }
  }  
  mysqli_close($conn);
?>
    </table>
  </div>
</section>
      
   

      </div>
      
</body>
</html>