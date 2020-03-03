<?php
$money = rand(10, 25);
$bokal_cost = 3;

$bokal_count = floor($money / $bokal_cost);
?>

<html>
<head>
    <style>
        div {
            display: inline-block;
            height: 300px;
            width: 300px;
            background-image: url("https://cdn.pixabay.com/photo/2016/09/14/11/36/beer-1669275_960_720.png");
            background-position: center;
            background-size: cover;
        }
    </style>
</head>
<body>

<?php for ($x = 0; $x < $bokal_count; $x++): ?>
    <div></div>
<?php endfor; ?>
</body>
</html>
