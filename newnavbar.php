<?php session_start();
if(!isset($_SESSION["Eemail"])&&!isset($_SESSION["Epswd"]))
{
    ?><script>location.replace("loginEmployee.php");</script><?php
}

include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <style>
        a:hover{
            color: #d0d0d0;
        }
    </style>
</head>
<body>
    
<link rel="stylesheet" href="ansronewebsite/style.css">
    <script src="ansronewebsite/indexjs.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500&family=Inter:wght@200&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
<div class="nav">
        <div class="logo"><img src="ansronewebsite/1_1-removebg-preview 1.png" alt="logo"></div>
        <div class="navbars">
            <a href="employee.php"  class="h1 home">Home</a>
            <a href="profile.php" class="h1 profile" >iBrigades-Profile</a>
            <a href="salary.php" class="h1 salary">Salary and Benefits</a>
            <div class="key">
                <div class="keyname">Key-Brigades</div>
                <div class="keybox">
                    <div class="keyglr"><a href="gallery.php">Gallery</a></div>
                    <div class="keyevt"><a href="event.php">Events</a></div>
                </div>
            </div>
            <a href="logoutEmp.php" class="h1" style="left:91rem; width:4%;">Logout</a>
            <!-- <div class="drop">
                <ul class="" style="list-style: none;">
                    <li><a href="gallery.html" class="gallery">Gallery</a></li>
                    <li><a href="event.html" class="events">Events</a></li>
                </ul>
            </div> -->
            <!-- <div class="dropdown">
                <button class="dropbtn ad"><img src="ant-design_caret-down-outlined.png" alt=""></button>
                <div class="dropdown-content">
                  <a href="gallery.html">Gallery</a>
                  <a href="event.html">Events</a>
                </div>
              </div> -->
            <div class="h1 assess">MyAssessments</div>
            <div class="h1 hp">HR-Policies</div>
            <!-- <div class="bar"><img src="ansronewebsite/align-right.png" alt=""></div> -->
        </div>
        
    </div>
</body>
</html>