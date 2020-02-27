<?php
    $ratai=[
        "https://static.thenounproject.com/png/122005-200.png",
        "https://dsonqtq9c1uhr.cloudfront.net/images/804/328/diablo_rosso_III_technology%2C0.png",
        "https://17ues91bad3b47yvra8jucw1-wpengine.netdna-ssl.com/wp-content/uploads/2018/07/hero-homepage-image.png"
    ];
    $ratai_rand = array_rand($ratai,1);
    $ratai_link = $ratai[$ratai_rand];

    $vairai = [
        "https://upload.wikimedia.org/wikipedia/commons/3/34/Steering_wheel_ship_1.png",
        "https://kohen123.files.wordpress.com/2011/05/joystick-icon.png",
        "https://momo.com/wp-content/uploads/2017/04/momo-heritage-super-grand-prix-steering-wheel-a-750x620.png"
    ];
    $vairai_rand = array_rand($vairai,1);
    $vairai_link = $vairai[$vairai_rand];

    $sedynes = [
        "https://www.station-beast.ch/components/com_jshopping/files/img_products/thumb_edfwesffdvgyrf.png",
        "https://www.derriereitalia.com/wp-content/uploads/2016/09/DSL_2_600x600_foto1.png",
        "http://classicsofttrim.com/wp-content/uploads/2016/02/2015-Dodge-Challenger-SXT.png"
    ];
    $sedynes_rand = array_rand($sedynes,1);
    $sedynes_link = $sedynes[$sedynes_rand];

    $img_src_frame = 'https://www.ribblecycles.co.uk/media/catalog/product/cache/1/image/1120x840/9df78eab33525d08d6e5fb8d27136e95/f/r/frame_cgr_ti.png';
?>

<html>
<head>
    <title>Bicycle</title>
    <style>
        body{
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container{
            position: relative;
            height: 300px;
            width: 500px;
            border: 1px solid black;
        }
        .ratai1{
            position: absolute;
            height: 130px;
            width: 100px;
            bottom: 6%;
            right: 22%;
        }
        .ratai2{
            position: absolute;
            height: 130px;
            width: 100px;
            bottom: 8%;
            left: 20%;
        }
        .sedyne{
            position: absolute;
            height: 50px;
            width: 50px;
            top: 28%;
            left: 35%;
            z-index: 1;
        }
        .vairas{
            position: absolute;
            height: 80px;
            width: 80px;
            top: 24%;
            right: 31%;
            z-index: 1;
        }
        .frame{
            position: absolute;
            height: 160px;
            width: 100%;
            top:30%;
        }
        img{
            position: absolute;
            height: 100%;
            width: 100%;
            object-fit: scale-down;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sedyne">
            <img src="<?php print $sedynes_link; ?>">
        </div>
        <div class="vairas">
            <img src="<?php print $vairai_link; ?>">
        </div>
        <div class="ratai1">
            <img src="<?php print $ratai_link; ?>">
        </div>
        <div class="ratai2">
            <img src="<?php print $ratai_link; ?>">
        </div>
        <div class="frame">
            <img src="<?php print $img_src_frame; ?>">
        </div>
    </div>
</body>
</html>
