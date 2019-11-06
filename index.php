<?php
$months = 24;
$car_price_new = 30000;
$depreciation = 2;
$car_price = 30000;


for ($months = 0; $months < 24; $months++){
    
$car_price_new -= round ($car_price_new * $depreciation /100);
}

$procentai = ($car_price - $car_price_new) *100 / $car_price;

$h1 = 'Kiek nuvertes masina?';
$h2 = "Naujos masinos kaina: $car_price";
$h3 = "Po $months men, masinos verte bus: $car_price_new eur";
$h4 = "Masina nuvertes $procentai %";
?>
<html>
   <head>
       <title>Car</title>
   </head>
   <body>
       <h1><?php print $h1; ?></h1>
       <h2><?php print $h2; ?></h2>
       <h3><?php print $h3; ?></h3>
       <h4><?php print $h4; ?></h4>
   </body>
</html>
