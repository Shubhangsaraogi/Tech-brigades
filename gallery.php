<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="gallerycss.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@200&family=Lato:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <?php include("newnavbar.php");?>

    <div class="body">
        <div class="b1">
            <div class="b2">
                Key Brigades &nbsp; >>
            </div>
            <div class="b3">
                Gallery
            </div>
        </div>

        <div class="box">
            <div id="lightbox"></div>
            <div class="b4 ">
                    <img src="ansronewebsite/pic22.png" class="zoomD" alt="" >                
            </div>
            <div class="b41">
                <div class="b42">Office</div>
            </div>

            <div class="b5 ">
                    <img src="ansronewebsite/Stacey_Finley_v2.png" alt=""class="zoomD">
            </div>
            <div class="b41 b51">
                <div class="b42">Awards</div>
            </div>
            <div class="b6 ">
                    <img src="ansronewebsite/image7.png" alt=""class="zoomD">
            </div>
           
            <div class="b41 b61">
                <div class="b42">Events</div>
            </div>

            <div class="b7 ">
                    <img src="ansronewebsite/image8.png" alt=""class="zoomD">                
            </div>
            <div class="b41 b71">
                <div class="b42">Teams</div>
            </div>
        </div>
    </div>
    <div class="pic" >
        <!-- <span>&times;</span> -->
        <img id="image" src="">
    </div>
    <div class="footer">
        <div class="cr">Copyright © 2022<br> TechBrigades</div>
        <div class="connect">connect with us</div>
        <div class="fb"><img src="ansronewebsite/facebook2.png" alt=""></div>
        <div class="li"><img src="ansronewebsite/linkedin1.png" alt=""></div>
        <div class="tw"><img src="ansronewebsite/twitter1.png" alt=""></div>
        <div class="yt"><img src="ansronewebsite/youtube1.png" alt=""></div>
        <div class="policy">Privacy Policy | Terms & conditions</div>

    </div>
<script src="galleryjs.js?php echo time(); ?>"></script>

</body>
</html>