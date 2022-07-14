<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- <link rel="stylesheet" href="ansronewebsite/profilecss.css"> -->
    <!-- <link rel="stylesheet" href="ansronewebsite/style.css"> -->
    <link href="ansronewebsite/profilecss.css?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link href="ansronewebsite/style.css?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@200&family=Lato:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <?php include("newnavbar.php");?>

    <div class="pdiv1">
        <div class="pdiv2">Personal Profile</div>
        
<?php
// session_start();
$email=$_SESSION["Eemail"];

$showquery = "SELECT * FROM employee where email='$email'";

                    $result = mysqli_query($conn, $showquery);

                    if (mysqli_num_rows($result) > 0) {

                        // output data of each row 

                        while ($row = mysqli_fetch_assoc($result)) {

                            ?>

<?php if(empty($row["img"]))

{
    echo "No Image uploaded";
}

else{?>


        <div class="pdiv3"><img src="<?php echo $row["img"];?>" style="width: 100%;" alt=""></div>
        <?php }?>

        <div class="pdiv4"><?php echo $row["designation"];?></div>
        <div class="pdiv5 name">Name:</div>
        <div class="pdiv6 nd"><?php echo $row["fname"];?> <?php echo $row["lname"];?></div>
        
        <div class="pdiv5 lob">Mailing Address:</div>
        <div class="pdiv6 ld"><?php echo $row["mailing_address"];?></div>

        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Change Mailing Address
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Mailing Address</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="profile.php" method="POST">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">New Mailing Address</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Maddress"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="btn" value="btnpass" class="btn btn-primary">Save changes</button>
        </div>
    </form>
    </div>
  </div>
</div>
        <div class="pdiv5 loc">Office address:</div>
        <div class="pdiv6 lcd"><?php echo $row["office_address"];?></div>
        <div class="pdiv5 dept">Team Name:</div>
        <div class="pdiv6 dd">
        <?php

            if(isset($row["team_name"])&&!empty($row["team_name"]))

            {

                echo $row["team_name"]; 

            }



            if(isset($row["team_name1"])&&!empty($row["team_name1"]))

            {

                echo ", ".$row["team_name1"]; 

            }

            if(isset($row["team_name2"])&&!empty($row["team_name2"]))

            {

                echo ", ".$row["team_name2"];

            }

            ?>
        </div>
        <div class="pdiv5 bid">Reporting manager:</div>
        <div class="pdiv6 bd"><?php echo $row["manager"];?></div>
        <div class="pdiv5 mob">Mobile no.:</div>
        <div class="pdiv6 mod"><?php echo $row["mobile"];?></div>

        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mobile">
  Change Mobile no.
</button>

<!-- Modal -->
<div class="modal fade" id="mobile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Mobile no.</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="profile.php" method="POST">
      <div class="modal-body">

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">New Mobile no.</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Enter you phone no." name="mobile">

            </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            <!-- jonathan.bizzant@thepennbrothers.com -->
        </div>
    </form>
    </div>
  </div>
</div>
        <div class="pdiv5 email">Email:</div>
        <div class="pdiv6 emd"><?php echo $row["email"];?></div>

        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#email">
  Change Email
</button>

<!-- Modal -->
<div class="modal fade" id="email" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Email</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="profile.php" method="POST">
            
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </form>
    </div>
  </div>
</div>
    
<form action="profile.php" method="post" enctype="multipart/form-data">

Select profile picture to update:

<input type="file" name="fileToUpload" id="fileToUpload">

<input type="submit" value="Upload Image" name="submit">

</form>


  <?php

  @$button=@$_POST["submit"];

   if ($button == "Upload Image") {

      $showquery = "SELECT * FROM employee where email='$email'";

      $result = mysqli_query($conn, $showquery);

      if (mysqli_num_rows($result) > 0) {

          // output data of each row 

          while ($row1 = mysqli_fetch_assoc($result)) {

            if(isset($row1["img"])&&$row1["img"]){
              unlink($row1["img"]);
            }

          }

      }

  



      $target_dir = "employeeImage/";

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;

$imageFileType = strto1lower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

if (isset($_POST["submit"])) {

  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

  if ($check !== false) {

      echo "File is an image - " . $check["mime"] . ".";

      $uploadOk = 1;

  } else {

      echo "File is not an image.";

      $uploadOk = 0;

  }

}

// Check if file already exists

if (file_exists($target_file)) {

  echo "Sorry, file already exists.";

  $uploadOk = 0;

}

// Check file size

if ($_FILES["fileToUpload"]["size"] > 5000000) {

  echo "Sorry, your file is too large.";

  $uploadOk = 0;

}

// Allow certain file formats

if (

  $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"

  && $imageFileType != "gif"

) {

  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

  $uploadOk = 0;

}

// Check if $uploadOk is set to 0 by an error

if ($uploadOk == 0) {

  echo "Sorry, your file was not uploaded.";

  // if everything is ok, try to upload file

} else {

  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

  //    echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";

  $sql = "UPDATE employee SET img='$target_file' WHERE email='$email'";



  if (mysqli_query($conn, $sql)) {

      echo "Record updated successfully";

     ?> <script>location.replace("profile.php?msg=Updated Successfully");</script><?php

     

  } else {

      echo "Error updating record: " . mysqli_error($conn);

  }

     

  } else {

      echo "Sorry, there was an error uploading your file.";

  }

}
  }

?>
        <div class="pdiv7"><button><a href="organizationchart.php" class="astyle">Organization Chart</a></button></div>
        <div class="pdiv8"><button><a href="managerchart.php" class="astyle">Manager Heirarchy</a></button></div>
        <div class="pdiv9">
            <div class="pdiv91">WORK EXPERIENCE</div>
             <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#work">
  Add work experience
</button>

<!-- Modal -->
<div class="modal fade" id="work" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add work experience</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="profile.php" method="POST" enctype="multipart/form-data">
            
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Designation</label>
                <input type="text" class="form-control" id="exampleFormControlInput1"  name="designation">
                <label for="exampleFormControlInput1" class="form-label">Company Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1"  name="company_name">
                <label for="exampleFormControlInput1" class="form-label">Working Period from</label>
                <input type="date" class="form-control" id="exampleFormControlInput1"  name="duration_from">
                <label for="exampleFormControlInput1" class="form-label">Working Period to</label>
                <input type="date" class="form-control" id="exampleFormControlInput1"  name="duration_to">

Select Company Logo:
<!-- 2021-12-15
2022-04-14 -->

<input type="file" name="fileToUpload" id="fileToUpload">

<!-- <input type="submit" value="Upload Image" name="company_logo"> -->



                
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit"  value="Upload" name="company_logo" class="btn btn-primary">Save changes</button>
        </div>
    </form>
    </div>
  </div>
</div>


<?php
    if(isset($_POST["company_logo"])){
      $button=$_POST["company_logo"];
    }
    $id=$_SESSION["emp_id"];
   if ($button == "Upload") {

      $showquery1 = "SELECT company_logo FROM experience where emp_id='$id'";

      $result1 = mysqli_query($conn, $showquery1);

      if (mysqli_num_rows($result1) > 0) {

          // output data of each row 
        // echo "this means company logo already exist";
          while ($row1 = mysqli_fetch_assoc($result1)) {

            if(isset($row1["company_logo"])&&$row1["company_logo"]){
              unlink($row1["company_logo"]);
            }

          }

      }

  



      $target_dir = "companyLogo/";

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;

$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

if (isset($_POST["submit"])) {

  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

  if ($check !== false) {

      echo "File is an image - " . $check["mime"] . ".";

      $uploadOk = 1;

  } else {

      echo "File is not an image.";

      $uploadOk = 0;

  }

}

// Check if file already exists

if (file_exists($target_file)) {

  echo "Sorry, file already exists.";

  $uploadOk = 0;

}

// Check file size

if ($_FILES["fileToUpload"]["size"] > 5000000) {

  echo "Sorry, your file is too large.";

  $uploadOk = 0;

}

// Allow certain file formats

if (

  $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"

  && $imageFileType != "gif"

) {

  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

  $uploadOk = 0;

}

// Check if $uploadOk is set to 0 by an error

if ($uploadOk == 0) {

  echo "Sorry, your file was not uploaded.";

  // if everything is ok, try to upload file

} else {

  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

  //    echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";

  $sql = "UPDATE experience SET company_logo='$target_file' WHERE emp_id='$id'";
  


  if (mysqli_query($conn, $sql)) {

      echo "Record updated successfully";


     

  } else {

      echo "Error updating record: " . mysqli_error($conn);

  }

     

  } else {

      echo "Sorry, there was an error uploading your file.";

  }

}
  }

?>
        <?php
// session_start();
$id=$_SESSION["emp_id"];
// echo $emp_id;

$showquery1 = "SELECT * FROM experience where emp_id='$id'";

                    $result1 = mysqli_query($conn, $showquery1);

                    if (mysqli_num_rows($result1) > 0) {

                        // output data of each row 

                        while ($row1 = mysqli_fetch_assoc($result1)) {

                            ?>

            <div class="pdiv92 swbox">
                <div class="pdiv93"><img src="<?php echo $row1["company_logo"]; ?>" alt=""></div>
            </div>
            <div class="pdiv94 swhead"> <?php echo $row1["designation"];?></div>
            <div class="pdiv95 swdesc"> <?php echo $row1["company_name"];?><br> <?php

            $monthNum=date('m', strtotime($row1['duration_from']));
            $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
            echo $monthName." " .date('Y', strtotime($row1["duration_from"]))." ";
            // echo "shubhang";
            $monthNum=date('m', strtotime($row1['duration_to']));
            $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
            echo $monthName." " .date('Y', strtotime($row1["duration_to"]));
            ?></div>

<?php
    }
  }
?>
            <div class="pdiv92 mybox">
                <div class="pdiv96"><img src="ansronewebsite/download__1_-removebg-preview 1.png" alt=""></div>
            </div>
            <div class="pdiv94 myhead">Project Designer
                <!-- <?php echo $row["designation"];?> -->
            </div>
            <div class="pdiv95 mydesc">Myntra
                <!-- <?php echo $row["company_name"];?>  -->
                <br>Jan 2021-Dec 2022 | 12 months</div>
            <div class="pdiv92 bfbox">
                <div class="pdiv97"><img src="ansronewebsite/download__2_-removebg-preview 1.png" alt=""></div>
            </div>
            <div class="pdiv94 bfhead">UX Designer</div>
            <div class="pdiv95 bfdesc">Bajaj Finserv<br> March 2020-Nov 2021 | 1 yr 5 months</div>
           
            
          </div>
          
          <div class="pdiv10">
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#capability">
  Add CAPABILITIES
</button>

<!-- Modal -->
<div class="modal fade" id="capability" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add CAPABILITIES</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="profile.php" method="POST">
            
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Capability</label>
                <input type="text" class="form-control" id="exampleFormControlInput1"  name="capability">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="button_capability" value="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
    </div>
  </div>
</div>
            <div class="pdiv101">CAPABILITIES</div>

            <?php
// session_start();
$id=$_SESSION["emp_id"];
// echo $emp_id;

$showquery1 = "SELECT * FROM capabilities where emp_id='$id'";

                    $result1 = mysqli_query($conn, $showquery1);

                    if (mysqli_num_rows($result1) > 0) {

                        // output data of each row 

                        while ($row1 = mysqli_fetch_assoc($result1)) {

                            ?>

            <div class="pdiv94 comm"><?php echo $row1["skills"]; ?></div>
            
            <?php
              }
            }
            ?>
            </div>
            <!-- <div class="pdiv94 manage">Management</div>
            <div class="pdiv94 fig">Figma</div>
            <div class="pdiv94 ur">User Research</div>
            <div class="pdiv94 ue">User Experience</div> -->
        <div class="pdiv11">
            <div class="pdiv101">EDUCATION</div>
            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#education">
  Add Education
</button>

<!-- Modal -->
<div class="modal fade" id="education" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Education</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="profile.php" method="POST" enctype="multipart/form-data">
            
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Institute Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1"  name="institute_name">
                <label for="exampleFormControlInput1" class="form-label">Course name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1"  name="course_name">
                <label for="exampleFormControlInput1" class="form-label">Education Period from</label>
                <input type="date" class="form-control" id="exampleFormControlInput1"  name="duration_from">
                <label for="exampleFormControlInput1" class="form-label">Education Period to</label>
                <input type="date" class="form-control" id="exampleFormControlInput1"  name="duration_to">

<!-- Select Institute Logo: -->
<!-- 2021-12-15
2022-04-14 -->

<!-- <input type="file" name="fileToUpload" id="fileToUpload"> -->

<!-- <input type="submit" value="Upload Image" name="company_logo"> -->



                
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit"  value="submit" name="button_education" class="btn btn-primary">Save changes</button>
        </div>
    </form>
    </div>
  </div>
</div>

<?php
// session_start();
$id=$_SESSION["emp_id"];
// echo $emp_id;

$showquery1 = "SELECT * FROM education where emp_id='$id'";

                    $result1 = mysqli_query($conn, $showquery1);

                    if (mysqli_num_rows($result1) > 0) {

                        // output data of each row 

                        while ($row1 = mysqli_fetch_assoc($result1)) {

                            ?>

            <div class="pdiv92 vibox">
                <div class="vimg"><img src="ansronewebsite/image9.png" alt=""></div>
                <div class="pdiv94 vihead"><?php echo $row1["college_name"]; ?></div>
            <div class="pdiv95 videsc"><?php echo $row1["course"]; 
            
            $monthNum=date('m', strtotime($row1['duration_from']));
            $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
            echo $monthName." " .date('Y', strtotime($row1["duration_from"]))." ";
            // echo "shubhang";
            $monthNum=date('m', strtotime($row1['duration_to']));
            $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
            echo $monthName." " .date('Y', strtotime($row1["duration_to"]));
            
            ?>
                2016-2020</div>
            </div>

            <?php
                }
              }
            ?>
            <div class="pdiv92 kvbox">
                <div class="kvimg"><img src="ansronewebsite/image10.png" alt=""></div>
            </div>
            <div class="pdiv94 kvhead">Kendriya Vidyalaya</div>
            <div class="pdiv95 kvdesc">12th CBSE Jan 2021-Dec 2021 | 12 months</div>
        </div>

        
        <div class="pdiv12">
            <div class="pdiv101 techdiv">TECHBRIGADES DETAILS</div>
            <div class="pdiv5 jdiv">Hiring Date:</div>
            <div class="pdiv6 jd"><?php echo $row["hiring_date"];?></div>
            <div class="pdiv5 rdiv">Recognization:</div>
            <div class="pdiv6 rd"><?php echo $row["designation"];?></div>
        </div>

        <?php }

               }?>
        <div class="pdiv13">OTHER LINKS</div>
        <div class="pdiv14"><button>Benefits</button></div>
        <div class="pdiv15"><button>HR Policies</button></div>
        <div class="pdiv16"><button>Check Out</button></div>
    </div>
    <div class="footerpf">
        <div class="cr">Copyright © 2022<br> TechBrigades</div>
        <div class="connect">connect with us</div>
        <div class="fb"><img src="ansronewebsite/facebook2.png" alt=""></div>
        <div class="li"><img src="ansronewebsite/linkedin1.png" alt=""></div>
        <div class="tw"><img src="ansronewebsite/twitter1.png" alt=""></div>
        <div class="yt"><img src="ansronewebsite/youtube1.png" alt=""></div>
        <div class="policy">Privacy Policy | Terms & conditions</div>

    </div>
    
    <?php
        $email=$_SESSION["Eemail"];
        $id=$_SESSION["emp_id"];
        if(isset($_POST['btn'])){
            $button=$_POST['btn'];
        }
        if(isset($_POST['Maddress'])&& $button=='btnpass' ){
            // echo"hello";
            $showquery = "SELECT * FROM employee where email='$email'";
            $result = mysqli_query($conn, $showquery);

            if (mysqli_num_rows($result) > 0) {

                if ($row = mysqli_fetch_assoc($result)) {

                    $maddress=$_POST['Maddress'];
                    $sql = "UPDATE employee SET mailing_address ='$maddress' WHERE email='$email'";
                    mysqli_query($conn, $sql);
                    ?> <script>location.replace("profile.php?msg=Updated Successfully");</script><?php
                    
                }
        
            }
        }
        if(isset($_POST['mobile'])&& !empty($_POST['mobile']) ){
            $showquery = "SELECT * FROM employee where email='$email'";
            $result = mysqli_query($conn, $showquery);

            if (mysqli_num_rows($result) > 0) {

                if ($row = mysqli_fetch_assoc($result)) {

                    $mobile=$_POST['mobile'];
                    $sql = "UPDATE employee SET mobile ='$mobile' WHERE email='$email'";
                    mysqli_query($conn, $sql);
                    ?> <script>location.replace("profile.php?msg=Updated Successfully");</script><?php
                }
        
            }
        }
        if(isset($_POST['email'])&& !empty($_POST['email']) ){
            $showquery = "SELECT * FROM employee where email='$email'";
            $result = mysqli_query($conn, $showquery);

            if (mysqli_num_rows($result) > 0) {

                if ($row = mysqli_fetch_assoc($result)) {

                    $Email=$_POST['email'];
                    $sql = "UPDATE employee SET email ='$Email' WHERE email='$email'";
                    mysqli_query($conn, $sql);
                    ?> <script>location.replace("login.php?msg=Updated Successfully");</script><?php
                }
        
            }
        }
        if(isset($_POST["button_capability"])){
          $button=$_POST["button_capability"];
        }
        if(isset($_POST['capability'])&& !empty($_POST['capability']) &&$button=="submit"){
          $skill=$_POST["capability"];
          $insertquery = "INSERT INTO capabilities(skills,emp_id) VALUES('$skill','$id')";
          $result = mysqli_query($conn, $insertquery);
          ?> <script>location.replace("profile.php?msg=Updated Successfully");</script><?php
        }
        if(isset($_POST["button_education"])){
          $button=$_POST["button_education"];
        }
        if(isset($_POST['institute_name'])&& !empty($_POST['institute_name']) &&$button=="submit"){
          $ins=$_POST["college_name"];
          $course=$_POST["course_name"];
          $duration_from=$_POST["duration_from"];
          $duration_to=$_POST["duration_to"];
          $insertquery = "INSERT INTO education(college_name,course,duration_from,duration_to,emp_id) VALUES('$ins','$course','$duratin_from','$duratin_to','$id')";
          $result = mysqli_query($conn, $insertquery);
          ?> <script>location.replace("profile.php?msg=Updated Successfully");</script><?php
        }
        if(isset($_POST['company_logo'])){
            $button=$_POST['company_logo'];
        }
        if(isset($_POST['designation'])&& !empty($_POST['designation']) && $button="Upload Image" ){
            $designation=$_POST["designation"];
            $name=$_POST["company_name"];
            $duratin_from=$_POST["duration_from"];
            $duratin_to=$_POST["duration_to"];
            $logo=$target_file;
            $insertquery = "INSERT INTO experience(company_logo,designation,company_name,duration_from,duration_to,emp_id) VALUES('$logo','$designation','$name','$duratin_from','$duratin_to','$id')";
            $result = mysqli_query($conn, $insertquery);
            ?> <script>location.replace("profile.php?msg=Updated Successfully");</script><?php
        }
    ?>


</body>
</html>