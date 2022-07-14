<?php
include("newnavbar.php");
@$msg = @$_GET["msg"];
if (isset($msg)) {
?>
    <script>
        alert("<?php echo $msg; ?>");
    </script>

<?php
}

@$email = @$_SESSION["Eemail"];
$empid = "";
$showquery1 = "SELECT * FROM employee where email='$email'";
$result1 = mysqli_query($conn, $showquery1);
if (mysqli_num_rows($result1) > 0) {

    while ($row1 = mysqli_fetch_assoc($result1)) {

        $empid = $row1["id"];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@200&family=Lato:wght@500&display=swap" rel="stylesheet">
<style>
    .time{
        padding: 2rem 0rem;
    }
</style>
</head>

<body>

    <div class="body">
    <div class="notice">
            <div class="n1">Notices</div>

            <?php $showquery1 = "SELECT * FROM notice where emp_id='$empid'";
            $result1 = mysqli_query($conn, $showquery1);
            if (mysqli_num_rows($result1) > 0) {

                while ($row1 = mysqli_fetch_assoc($result1)) { ?>
                    <?php echo '
                    <div class="pg1"><img src="ansronewebsite/propaganda4.png" alt=""></div>
                    <div class="n2">'
                        . $row1["notice"] .
                        '</div>
                    '; ?>

            <?php
                }
            } else {
                echo "Nothing to Show!!";
            }
            ?>
            <!--             
            <div class="pg2 p31"><img src="ansronewebsite/propaganda4.png" alt=""></div>
            <div class="n4 n41">Meeting today for client</div>
            <div class="n5 n51"><img src="ansronewebsite/Group46007.png" alt=""></div> -->
        </div>
        <form action="employee.php?id=<?php echo $empid; ?>" method="POST">
            <div class="attendencediv">
                <div class="attendence">Attendence</div>
                <div class="a2">Enter your Check-in and Check-out time to maintain your attendance details.</div>
                <div class="date">Date</div>
                <input type="text" id="date" class="d2">
                <div class="cin">Check In</div>
                <input type="time" name="checkIn" class="cin2 trigger_checkin">
                <div class="bn1 trigger_checkin">
                    <button style="left: 65px;" type="submit" value="checkin" name="btn">Submit Now</button>

                </div>
                <div class="cout">Check Out</div>
                <input type="time" name="checkOut" class="cout2 trigger">
                <div class="bn1 trigger">
                    <button type="submit" value="checkout" name="btn">Submit Now</button>

                </div>
                <div class="bn1 trigger">
                    <a href="calendar2.php?id=<?php echo $empid?>" style="text-decoration: none; color:white">
<button style="left: 38rem;" type="button"  >
History
</button>
</a>

                </div>
                <?php
                if (isset($_GET['checkin']) && $_GET['checkin'] == 'Successful') {
                ?>
                    <style>
                        .trigger_checkin {
                            display: none;
                        }
                    </style>
                    <?php
                    if (isset($_SESSION["checkinTime"])) {
                    ?>
                        <div class="time cin"><span><?php echo $_SESSION["checkinTime"]; ?></div></span>
                    <?php
                    } else {
                    ?>
                        <div class="time cin"><span><?php echo $_SESSION["checkIn"]; ?></div></span>
                    <?php
                    }
                    ?>

                <?php
                }
                ?>
                <?php
                if (isset($_GET['checkout']) && $_GET['checkout'] == 'Successful') {
                ?>
                    <style>
                        .trigger {
                            display: none;
                        }
                    </style>
                    <?php
                    if (isset($_SESSION["checkoutTime"])) {
                    ?>
                        <div class="time cout"><span><?php echo $_SESSION["checkoutTime"]; ?></div></span>
                    <?php
                    } else {
                    ?>
                        <div class="time cout"><span><?php echo $_SESSION["checkout"]; ?></div></span>
                    <?php
                    }
                    ?>
                <?php
                }
                ?>
                <?php
                @$empid = @$_GET["id"];
                $name = "";
                $showquery1 = "SELECT * FROM employee where email='$email'";
                $result1 = mysqli_query($conn, $showquery1);
                if (mysqli_num_rows($result1) > 0) {

                    while ($row1 = mysqli_fetch_assoc($result1)) {

                        $name = $row1["fname"] . " " . $row1["lname"];
                    }
                }
                if (isset($_POST["checkIn"]) && !empty($_POST["checkIn"])) {
                    if (!isset($_SESSION)) {
                        session_start();
                    }


                    $checkin = $_POST["checkIn"];
                    $_SESSION["checkIn"] = $checkin;
                    $btn = $_POST["btn"];
                    if ($btn == "checkin") {
                        $d = date("Y-m-d");
                        $showquery1 = "SELECT * FROM check_in_out where emp_id='$empid' and date_format(date,'%Y-%m-%d')='$d'";
                        $result1 = mysqli_query($conn, $showquery1);
                        $row1 = mysqli_fetch_assoc($result1);
                        $_SESSION["checkinTime"] = $row1["checkin"];
                        if (mysqli_num_rows($result1) > 0) {
                            // if ($row1 = mysqli_fetch_assoc($result1)) {
                            // }
                    ?>
                        <?php
                            if(isset($_SESSION['checkout'])||isset($_SESSION['ckeckoutTime'])){
                        ?>
                         <script>
                            location.replace("employee.php?checkin=Successful&checkout=Successful");
                        </script>       
                        <?php
                            }
                            else{
                        ?>
                        <script>
                            location.replace("employee.php?checkin=Successful");
                        </script>
                        <?php
                            }
                        ?>
                            

                        <script>
                            location.replace("employee.php?checkin=Successful");
                        </script>
                        <?php
                        }
                        else {

                        ?>
                            <?php
                            $insertquery = "INSERT INTO check_in_out(emp_id,emp_name,checkin,checkout) VALUES('$empid','$name','$checkin','')";

                            ?>
                            <?php
                            if (mysqli_query($conn, $insertquery)) {
                                // echo "New record created successfully";
                            ?>
                                <style>
                                    .trigger_checkin {
                                        display: none;
                                    }
                                </style>
                                <script>
                                    location.replace("employee.php?checkin=Successful");
                                </script>


                                <!-- <p><?php echo $checkin; ?></p> -->
                        <?php

                            } else {

                                die("Error: " . $insertquery . "<br>" . mysqli_error($conn));
                            }
                        }
                    } else {
                        ?>

                        <?php
                    }
                }

                if (isset($_POST["checkOut"]) && !empty($_POST["checkOut"])) {
                    $btn = $_POST["btn"];
                    $checkout = $_POST["checkOut"];
                    $_SESSION["checkout"] = $checkout;
                    if ($btn == "checkout") {

                        $d = date("Y-m-d");
                        $showquery1 = "SELECT * FROM check_in_out where emp_id='$empid' and date_format(date,'%Y-%m-%d')='$d'";
                        $result1 = mysqli_query($conn, $showquery1);
                        $row1 = mysqli_fetch_assoc($result1);
                        $_SESSION["checkoutTime"] = $row1["checkout"];
                        if (mysqli_num_rows($result1) > 0) {
                            if ($row1 = mysqli_fetch_assoc($result1)) {
                                if (empty($row1["checkout"])) {
                                    $sql = "UPDATE check_in_out SET checkout='$checkout' WHERE emp_id='$empid' and date_format(date,'%Y-%m-%d') ='$d'";

                                    if (mysqli_query($conn, $sql)) {
                                    } else {
                                        echo "Error updating record: " . mysqli_error($conn);
                                    }
                                } else {

                                            }
                                        }
                                        ?> 

                                        <script>
                                        location.replace("employee.php?checkin=Successful&checkout=Successful");
                                    </script>
                                    <?php
                                    }
                                                ?>
                        <style>
                            .trigger {
                                display: none;
                            }
                        </style>
                        <script>
                            location.replace("employee.php?checkin=Successful&checkout=Successful");
                        </script>
                <?php
                    }
                }
                ?>


                

                <div class="clock"><img src="ansronewebsite/undraw_time_management_re_tk5w 2.png" alt=""></div>

            </div>
        </form>
        <div class="month">
            <div class="stat">
                Your Monthly Statics
            </div>
            <input type="month" class="m1">

            <div class="present">Present</div>
            <div class="pdays">
                <div class="pday1">15</div>
                <div class="pday2">days</div>
            </div>
            <div class="absent">Absent</div>
            <div class="adays">
                <div class="aday1">01</div>
                <div class="aday2">days</div>
            </div>
            <div class="holiday">Holiday</div>
            <div class="hdays">
                <div class="hday1">04</div>
                <div class="hday2">days</div>
            </div>
            <div class="remain">Remains</div>
            <div class="rdays">
                <div class="rday1">10</div>
                <div class="rday2">days</div>
            </div>

        </div>
        
        <div class="pic2"><img src="ansronewebsite/pic2 1.png" alt="working people"></div>
        <div class="about">About TechBrigades</div>
        <div class="about2">TechBrigades is a leading tech-driven marketing agency that offers a wide gamut of services, including website design & development user interface (UI) & graphic designing, mobile app designing & development, DevOps, Quality Assurance & Testing, software maintenance, to name a few. Our customized business-centric solutions may facilitate a robust connection between your brand and your potential customers, leading to improved brand recall</div>
        <div class="body2">
        </div>
        <div class="body3">
        </div>
        <div class="body4"></div>
        <div class="body5"></div>
        <div class="body6"></div>
        <div class="body7"></div>
        <div class="body8"></div>
        <div class="body9"></div>
        <div class="body10"></div>
        <div class="body11"></div>
        <div class="body12"></div>
        <div class="body13"></div>
        <div class="ourteam">Our Team</div>
        <div>

            <?php
            // $showquery1 = "SELECT * FROM gallery order by id Desc limit 3 ";
            // $result1 = mysqli_query($conn, $showquery1);
            // if (mysqli_num_rows($result1) > 0) {

            //    while ($row2 = mysqli_fetch_assoc($result1)) {

            ?>
            <!-- <div class="img6"><img src="<?php echo $row2["img"]; ?>" alt="blog"></div> -->
            <div class="img6"><img src="ansronewebsite/image6.png" alt="blog"></div>
            <div class="team1">
                <!-- <div class="teamusa"><?php echo $row2["title"]; ?></div> -->
                <div class="teamusa">Team Usa</div>
                <!-- <div class="desc"><?php echo $row2["info"]; ?></div> -->
                <div class="desc">Lorem, ipsum dolor.</div>
                <div class="fulldesc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vulputate arcu semper sodales elit volutpat lorem. Phasellus nunc risus vestibulum rutrum nunc, enim semper netus. Pellentesque luctus dictum eleifend laoreet sit non scelerisque sed ipsum.</div>
                <div class="btn1">
                    <div class="see1">See More </div>
                </div>
            </div>
            <?php
            // }
            // }
            ?>
        </div>
        <div class="image5"><img src="ansronewebsite/image5.png" alt=""></div>
        <div class="team2">
            <div class="teamdhaka">Team Dhaka</div>
            <div class="desc2"> Outsourcing Team</div>
            <div class="fulldesc2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vulputate arcu semper sodales elit volutpat lorem. Phasellus nunc risus vestibulum rutrum nunc, enim semper netus. Pellentesque luctus dictum eleifend laoreet sit non scelerisque sed ipsum.</div>
            <div class="btn2">
                <div class="see2">See More </div>
            </div>
        </div>
        <div class="image4"><img src="ansronewebsite/image4.png" alt=""></div>
        <div class="team3">
            <div class="teambang">Team Banglore</div>
            <div class="desc3"> Technical Offshore Team</div>
            <div class="fulldesc3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vulputate arcu semper sodales elit volutpat lorem. Phasellus nunc risus vestibulum rutrum nunc, enim semper netus. Pellentesque luctus dictum eleifend laoreet sit non scelerisque sed ipsum.</div>
            <div class="btn3">
                <div class="see3">See More </div>
            </div>
        </div>

        <div class="footer">
            <div class="cr">Copyright © 2022<br> TechBrigades</div>
            <div class="connect">connect with us</div>
            <div class="fb"><img src="facebook2.png" alt=""></div>
            <div class="li"><img src="linkedin1.png" alt=""></div>
            <div class="tw"><img src="twitter1.png" alt=""></div>
            <div class="yt"><img src="youtube1.png" alt=""></div>
            <div class="policy">Privacy Policy | Terms & conditions</div>

        </div>


        <script src="ansronewebsite/indexjs.js?php echo time(); ?>"></script>


</body>

</html>