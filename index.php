<?php

session_start();

?>

<?php include('db.php');

@$msg = @$_GET["msg"];



if (isset($msg)) {

?><script>
        alert("<?php echo $msg; ?>");
    </script><?php

            }

                ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="ansronewebsite/logincss.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <!-- <link href="ansronewebsite/style.css?php echo time(); ?>" rel="stylesheet" type="text/css" /> -->

</head>

<body>

    <div class="div1">
        <img src="ansronewebsite/Rectangle793.png" alt="">
        <div class="indiv1">
            <img src="ansronewebsite/Rectangle1.png" alt="">
            <div class="indiv2">
                <img src="ansronewebsite/1_1-removebg-preview 1.png" alt="">
            </div>
            <div class="indiv3">
                You Make a Difference.
            </div>

            <div class="indiv5">
                <img src="ansronewebsite/Vector3.png" alt="">
            </div>
            <div class="indiv6">
                <img src="ansronewebsite/Vector3.png" alt="" height="120%">
            </div>
            <div class="indiv7">
                <img src="ansronewebsite/Vector3.png" alt="" height="75%">
            </div>
            <div class="indiv8">
                <img src="ansronewebsite/Vector3.png" alt="" height="75%">
            </div>
            <div class="indiv9">
                <img src="ansronewebsite/Vector3.png" alt="" height="75%">
            </div>
            <div class="indiv10">
                <img src="ansronewebsite/Vector3.png" alt="" height="75%">
                <div class="indiv4">
                    <img src="ansronewebsite/57314-removebg-preview1.png" alt="">
                </div>
            </div>
            <div class="indiv11">
                <img src="ansronewebsite/Vector3.png" alt="" height="35%">
            </div>
            <div class="indiv12">
                <img src="ansronewebsite/Vector4.png" alt="">
            </div>
            <div class="indiv13">
                <img src="ansronewebsite/Vector4.png" alt="">
            </div>
        </div>
    </div>
    <form action="index.php" method="POST">
        <div class="div2">
            Login
        </div>
        <div class="div3">
            Welcome back! Login with your data entered during registration
        </div>
        <div class="div4">
            <button><img src="ansronewebsite/google1.png" alt="">
                <span>Sign in with Google</span></button>
        </div>
        <div class="div5">
            <button><img src="ansronewebsite/facebook1.png" alt="">
                <span>Sign in with Facebook</span></button>
        </div>
        <div class="div6">
        </div>
        <div class="div7">
            OR LOGIN WITH EMAIL
        </div>
        <div class="div8">
        </div>
        <div>
            <input type="email" class="div9" placeholder="Enter your Email here" id="email" name="Eemail">
            <img src="ansronewebsite/lock.png" alt="" id="lock">
        </div>
        <div>
            <input type="password" class="div9 div91" id="pwd" name="Epswd" placeholder="Enter the password">
            <img src="ansronewebsite/mail.png" alt="" id="mail">
            <a href="#" id="eye" onclick="myFunction()"><img src="ansronewebsite/eye.png" alt=""></a>
        </div>
        <div>
            <input type="checkbox" name="checkbox" id="checkbox">
            <div class="div10">Remember me</div>
            <div class="div10 div11"><a href="#">Forgot Password?</a></div>
        </div>
        <div>
            <button type="submit" name="btn" value="submit" class="div12">LOGIN</button>
        </div>
        <div class="div13">Don’t have an account? <a href="#">Register</a></div>
    </form>

    <?php

    if (isset($_POST["Eemail"]) && isset($_POST["Epswd"]) && !empty($_POST["Eemail"]) && !empty($_POST["Epswd"])) {

        $email = mysqli_real_escape_string($conn, @$_POST['Eemail']);
        $pswd = mysqli_real_escape_string($conn, @$_POST['Epswd']);

        $button = mysqli_real_escape_string($conn, @$_POST["btn"]);
        // $button=$_POST['btn'];

        if ($button == "submit") {

            $loginquery = "SELECT * FROM employee WHERE email='$email' and password='$pswd'";

            $result = mysqli_query($conn, $loginquery);
            
            if (mysqli_num_rows($result) > 0) {

                // output data of each row

                while ($row = mysqli_fetch_assoc($result)) {

                    $_SESSION["Eemail"] = $email;
                    $_SESSION["emp_id"] = $row["id"];
                    echo $_SESSION["emp_id"];
                    $_SESSION["Epswd"] = $pswd;

    ?>
    <script>
                        location.replace("employee.php?msg=Successful");
                    </script>

                <?php

                }
            }
             else {

                ?>
                <script>
                    alert("UnSuccessful");
                </script>

    <?php

            }
        }
    }



    ?>

<script src="ansronewebsite/loginjs.js?php echo time();"></script>

</body>

</html>