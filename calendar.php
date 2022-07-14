<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calendar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <?php include("newnavbar.php") ?>
    <!-- <link rel="stylesheet" href="calendar.css">
  <script src="calendar.js"></script> -->
    <style>
        table {
            border-collapse: collapse;
            background: white;
            color: black;
            text-align: center;
            width: 75%;
            height: 37rem;
        }

        th,
        td {
            font-weight: bold;
            border: solid 2px black;
            width: 13%;
        }

        .timings {
            margin: 16px;
            font-weight: 400;
        }
    </style>
</head>

<body>
    <h2 align="center" style="color: orange;    margin-top: 8rem;">
        <?php
            $month=date('m');
            $year=date('Y');
            $monthName = date('F', mktime(0, 0, 0, $month, 10)); 
            echo $monthName." ".$year;
        ?>
    </h2>
    <br />

    <table bgcolor="lightgrey" align="center" cellspacing="21" cellpadding="21">

        <!-- The tr tag is used to enter 
            rows in the table -->

        <!-- It is used to give the heading to the
            table. We can give the heading to the 
            top and bottom of the table -->

        <caption align="top">
            <!-- Here we have used the attribute 
                that is style and we have colored 
                the sentence to make it better 
                depending on the web page-->
        </caption>

        <!-- Here th stands for the heading of the
            table that comes in the first row-->

        <!-- The text in this table header tag will 
            appear as bold and is center aligned-->

        <thead>
            <tr>
                <!-- Here we have applied inline style 
                     to make it more attractive-->
                <th style="color: white; background: purple;">
                    Sun</th>
                <th style="color: white; background: purple;">
                    Mon</th>
                <th style="color: white; background: purple;">
                    Tue</th>
                <th style="color: white; background: purple;">
                    Wed</th>
                <th style="color: white; background: purple;">
                    Thu</th>
                <th style="color: white; background: purple;">
                    Fri</th>
                <th style="color: white; background: purple;">
                    Sat</th>
            </tr>
        </thead>

        <tbody>
            <!-- <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td> -->
            <!-- <td>1</td> -->
            <!-- <td>2</td> -->
            <!-- </tr> -->
            <!-- <tr></tr> -->
            <!-- <tr>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
            </tr>
            <tr>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>13</td>
                <td>14</td>
                <td>15</td>
                <td>16</td>
            </tr>
            <tr>
                <td>17</td>
                <td>18</td>
                <td>19</td>
                <td>20</td>
                <td>21</td>
                <td>22</td>
                <td>23</td>
            </tr>
            <tr>
                <td>24</td>
                <td>25</td>
                <td>26</td>
                <td>27</td>
                <td>28</td>
                <td>29</td>
                <td>30</td>
            </tr> -->
            <!-- <tr> -->
            <!-- <td>31</td> -->
            <!-- <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
            </tr> -->
            <!-- </tbody>
    </table> -->

            <?php
            @$empid = @$_GET["id"];
            $showquery1 = "SELECT * FROM check_in_out where emp_id='$empid'";
            $result1 = mysqli_query($conn, $showquery1);
            // $showquery2 = "SELECT date_format(date,'%Y-%m-%d') FROM check_in_out where emp_id='$empid'";
            // $result2 = mysqli_query($conn, $showquery2);
            $date = 1;
            $count = 0;
            if (mysqli_num_rows($result1) > 0) {
                while ($row1 = mysqli_fetch_assoc($result1)) {
                    $checkin = $row1['checkin'];
                    $checkout = $row1['checkout'];
                    $x = new DateTime($row1['date']);
                    $d = $x->format('d');
                    if ($d == $date) {
                        if ($count % 7 == 0) {
            ?>
                            <tr>
                                <td style="padding: 0px;">
                                    <?php
                                    echo $d;
                                    ?>
                                    <br>
                                    <p style="display: inline;">
                                        <span class="timings">Check In: <?php echo $checkin;?></span>
                                    </p>
                                    <br>
                                    <p style="display: inline;">
                                        <span class="timings">CheckOut: <?php echo $checkout;?></span>
                                    </p>
                                </td>
                            <?php
                        } else {
                            ?>
                                <td style="padding: 0px;">
                                    <?php
                                    echo $d;
                                    ?>
                                    <br>
                                    <p style="display: inline;">
                                        <span class="timings">Check In: <?php echo $checkin;?></span>
                                    </p>
                                    <br>
                                    <p style="display: inline;">
                                        <span class="timings">CheckOut: <?php echo $checkout;?></span>
                                    </p>
                                </td>
                                <?php
                            }
                            $date++;
                            $count++;
                        } else {
                            while ($date != $d) {
                                if ($count % 7 == 0) {
                                ?>
                            <tr>
                                <td>
                                    <?php
                                    echo $date;
                                    // echo "count:".$count;

                                    ?>
                                    <br>
                                    <span class="dash">-- --</span>
                                </td>
                            <?php
                                } else {
                            ?>
                                <td>
                                    <?php
                                    echo $date;
                                    // echo "\n-- --";
                                    // echo "count:".$count;

                                    ?>
                                    <br>
                                    <span class="dash">-- --</span>
                                </td>
                            <?php
                                }
                                $count++;
                                $date++;
                            }
                        }
                        if ($d == $date) {
                            if ($count % 7 == 0) {
                            ?>
                            <tr>
                                <td style="padding: 0px;">
                                    <?php
                                    echo $d;
                                    ?>
                                    <br>
                                    <p style="display: inline;">
                                        <span class="timings">Check In: <?php echo $checkin;?></span>
                                    </p>
                                    <br>
                                    <p style="display: inline;">
                                        <span class="timings">CheckOut: <?php echo $checkout;?></span>
                                    </p>
                                </td>
                            <?php
                            } else {
                            ?>
                                <td style="padding: 0px;">
                                    <?php
                                    echo $d;
                                    ?>
                                    <br>
                                    <p style="display: inline;">
                                        <span class="timings">Check In: <?php echo $checkin;?></span>
                                    </p>
                                    <br>
                                    <p style="display: inline;">
                                        <span class="timings">CheckOut: <?php echo $checkout;?></span>
                                    </p>
                                </td>
                        <?php
                            }
                            $date++;
                            $count++;
                        }
                    }
                }

                while ($date < 32) {
                    if ($count % 7 == 0) {
                        ?>
                            <tr>
                                <td>
                                    <?php
                                    echo $date;
                                    // echo "\n-- --";
                                    // echo "count:".$count;

                                    ?>
                                    <br>
                                    <span class="dash">-- --</span>
                                </td>
                            <?php
                        } else {
                            ?>
                                <td>
                                    <?php
                                    echo $date;
                                    // echo "\n-- --";
                                    // echo "count:".$count;

                                    ?>
                                    <br>
                                    <span class="dash">-- --</span>
                                </td>
                        <?php
                        }
                        $date++;
                        $count++;
                    }

                    // $d=date('Y/m/'.$date);
                    // echo $d;
                    // if (mysqli_num_rows($result1) > 0) {

                    //     while ($row1 = mysqli_fetch_assoc($result1)) {
                    //         $showquery2 = "SELECT date FROM check_in_out where emp_id='$empid'";
                    //         $result2 = mysqli_query($conn, $showquery2);
                    //         $row2 = mysqli_fetch_assoc($result2);
                    //         echo $row2['date'];
                    //         if($d==$row2['date']){
                    //             echo $row2["checkin"];
                    //             echo $row2["checkout"];
                    //         }
                    //         // $name = $row1["fname"] . " " . $row1["lname"];
                    //         $date=$date+1;
                    //     }
                    // }

                        ?>
        </tbody>
    </table>
</body>

</html>