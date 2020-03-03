<?php
//esamo laiko + 20min
// 1min = 5%
// esama laika atimti is +20min, gauta minuciu skirtuma *5 ir atimti is 100%, gausi %kiek praejo
$now_time = date('H:i:s');
$next_joint_time = date('H:i:s', strtotime('+ 20min'));
print "$now_time  $next_joint_time";
$now_sec = date('s');
$now_min = date('i');
$now_hr = date('h');

$sec_deg = $now_sec * 6;

$min_deg = $now_min * 6;

$hr_deg = $now_hr * 30;

$sec_img_src = 'assets/rsz_herbal-joints-1.png';
$min_img_src = 'assets/rsz_1047316.png';
$hr_img_src = 'assets/rsz_1unnamed.png';
?>

<html>
<head>
    <style>
        .container {
            height: 200px;
            width: 500px;
            background-color: darkred;
            position: relative;
        }

        .watch_container {
            position: relative;
            background-image: url("assets/Analogue_clock_face.svg.webp");
            background-size: cover;
            background-position: center;
            height: 300px;
            width: 300px;
            display: inline-block;
        }

        .seconds {
            position: absolute;
            width: 60px;
            height: 150px;
            z-index: 1;
            left: 40%;
            transform-origin: bottom center;
            transform: rotate(<?php print $sec_deg; ?>deg);
        }

        .minutes {
            position: absolute;
            width: 70px;
            height: 100px;
            z-index: 1;
            left: 38%;
            top: 15%;
            transform-origin: bottom center;
            transform: rotate(<?php print $min_deg; ?>deg);
        }

        .hours {
            position: absolute;
            width: 40px;
            height: 80px;
            z-index: 1;
            left: 44%;
            top: 24%;
            transform-origin: bottom center;
            transform: rotate(<?php print $hr_deg; ?>deg);
        }

        .seconds_img, .minutes_img, .hours_img {
            height: 100%;
            width: 100%;
            object-position: center;

        }

        /*.filter{*/
        /*    position: absolute;*/
        /*    height: 17%;*/
        /*    width: 80%;*/
        /*    background-color: rgba(10, 10, 10, 0.3);*/
        /*    bottom:30%;*/
        /*    left: 10%;*/
        /*    transform: rotate(-15deg);*/
        /*}*/
    </style>
</head>
<body>
<!--<div class="container">-->
<!--    <img src="https://3f0861b6bc98c08770be-789248f0448453b835406008213ad4a2.ssl.cf2.rackcdn.com/cover_photo_265717_1423785275.png">-->
<!--    <div class="filter"></div>-->
<!--</div>-->
<div class="watch_container">
    <div class="seconds">
        <img class="seconds_img" src="<?php print $sec_img_src; ?>">
    </div>
    <div class="minutes">
        <img class="minutes_img" src="<?php print $min_img_src; ?>">
    </div>
    <div class="hours">
        <img class="hours_img" src="<?php print $hr_img_src; ?>">
    </div>
</div>
</body>
</html>
