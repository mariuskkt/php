<?php

$now_time = date('H:i:s');
print $now_time;
$now_sec = date('s');
$now_min = date('i');
$now_hr = date('h');

$time_left = 20 - $now_min % 20;
$smoke_title = 'Kita kaseka rukysi už: ' . $time_left;

$sec_deg = $now_sec * 6;

$min_deg = $now_min * 6 - 5;

$hr_deg = (60 * $now_hr + $now_min) * 0.5;

$sec_img_src = 'assets/rsz_herbal-joints-1.png';
$min_img_src = 'assets/rsz_1047316.png';
$hr_img_src = 'assets/rsz_1unnamed.png';
?>

<html>
<head>
    <meta http-equiv="refresh" content="1">
    <style>
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
            left: 39%;
            top: 19%;
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
    </style>
</head>
<body>
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
    <h2><?php print $smoke_title; ?></h2>
</body>
</html>